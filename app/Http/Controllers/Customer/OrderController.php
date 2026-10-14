<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */

    public function products()
    {
        $products = Product::all();

        return view(
            'customer.products',
            compact('products')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PLACE ORDER PAGE
    |--------------------------------------------------------------------------
    */

    public function create(Product $product)
    {
        return view(
            'customer.PLACEORDER',
            compact('product')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE ORDER
    |--------------------------------------------------------------------------
    */

    public function store(
        Request $request,
        Product $product
    ) {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:' . $product->stock,
            ],
        ]);

        $quantity = (int) $request->quantity;

        $totalPrice =
            $product->price * $quantity;

        $order = Order::create([
            'customer_name' =>
                auth()->user()->name,

            'product_name' =>
                $product->name,

            'quantity' =>
                $quantity,

            'total_amount' =>
                $totalPrice,

            'status' =>
                'pending',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DECREASE STOCK
        |--------------------------------------------------------------------------
        */

        $product->decrement(
            'stock',
            $quantity
        );

        return redirect()
            ->route('customer.orders')
            ->with(
                'success',
                'Order #' .
                $order->id .
                ' placed successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | MY ORDERS
    |--------------------------------------------------------------------------
    */

    public function orders()
    {
        $orders = Order::where(
            'customer_name',
            auth()->user()->name
        )
        ->latest()
        ->get();

        return view(
            'customer.myorder',
            compact('orders')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT ORDER
    |--------------------------------------------------------------------------
    |
    | Customer can edit ONLY Pending orders.
    |
    */

    public function edit(Order $order)
    {
        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $order->customer_name !==
            auth()->user()->name
        ) {
            abort(
                403,
                'Unauthorized access.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GET STATUS
        |--------------------------------------------------------------------------
        */

        $status = strtolower(
            trim(
                $order->status ?? ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | ONLY PENDING ORDERS CAN BE EDITED
        |--------------------------------------------------------------------------
        */

        if ($status !== 'pending') {

            return redirect()
                ->route('customer.orders')
                ->with(
                    'error',
                    'This order can no longer be edited because it is already being processed.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | FIND PRODUCT
        |--------------------------------------------------------------------------
        */

        $product = Product::where(
            'name',
            $order->product_name
        )->first();


        if (!$product) {

            return redirect()
                ->route('customer.orders')
                ->with(
                    'error',
                    'The product for this order could not be found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | EDIT VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'customer.orders.edit',
            compact(
                'order',
                'product'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ORDER
    |--------------------------------------------------------------------------
    |
    | Customer can update ONLY Pending orders.
    |
    */

    public function update(
        Request $request,
        Order $order
    ) {
        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $order->customer_name !==
            auth()->user()->name
        ) {
            abort(
                403,
                'Unauthorized access.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GET STATUS
        |--------------------------------------------------------------------------
        */

        $status = strtolower(
            trim(
                $order->status ?? ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | ONLY PENDING ORDERS CAN BE UPDATED
        |--------------------------------------------------------------------------
        */

        if ($status !== 'pending') {

            return redirect()
                ->route('customer.orders')
                ->with(
                    'error',
                    'This order can no longer be updated.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | FIND PRODUCT
        |--------------------------------------------------------------------------
        */

        $product = Product::where(
            'name',
            $order->product_name
        )->first();


        if (!$product) {

            return redirect()
                ->route('customer.orders')
                ->with(
                    'error',
                    'The product for this order could not be found.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | AVAILABLE STOCK
        |--------------------------------------------------------------------------
        |
        | Current product stock + old order quantity
        | gives the maximum quantity the customer can choose.
        |
        */

        $availableStock =
            $product->stock +
            $order->quantity;


        /*
        |--------------------------------------------------------------------------
        | VALIDATE NEW QUANTITY
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:' . $availableStock,
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | OLD / NEW QUANTITY
        |--------------------------------------------------------------------------
        */

        $oldQuantity =
            (int) $order->quantity;

        $newQuantity =
            (int) $request->quantity;


        /*
        |--------------------------------------------------------------------------
        | RETURN OLD QUANTITY TO STOCK
        |--------------------------------------------------------------------------
        */

        $product->increment(
            'stock',
            $oldQuantity
        );


        /*
        |--------------------------------------------------------------------------
        | DECREASE NEW QUANTITY FROM STOCK
        |--------------------------------------------------------------------------
        */

        $product->decrement(
            'stock',
            $newQuantity
        );


        /*
        |--------------------------------------------------------------------------
        | RECALCULATE TOTAL
        |--------------------------------------------------------------------------
        */

        $newTotal =
            $product->price *
            $newQuantity;


        /*
        |--------------------------------------------------------------------------
        | UPDATE ORDER
        |--------------------------------------------------------------------------
        */

        $order->update([
            'quantity' =>
                $newQuantity,

            'total_amount' =>
                $newTotal,
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('customer.orders')
            ->with(
                'success',
                'Order #' .
                $order->id .
                ' updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | TRACK ORDER
    |--------------------------------------------------------------------------
    */

    public function tracking(Order $order)
    {
        if (
            $order->customer_name !==
            auth()->user()->name
        ) {
            abort(
                403,
                'Unauthorized access.'
            );
        }

        return view(
            'customer.tracking',
            compact('order')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CANCEL ORDER
    |--------------------------------------------------------------------------
    |
    | Customer can cancel ONLY Pending orders.
    |
    */

    public function cancel(Order $order)
    {
        /*
        |--------------------------------------------------------------------------
        | SECURITY CHECK
        |--------------------------------------------------------------------------
        */

        if (
            $order->customer_name !==
            auth()->user()->name
        ) {
            abort(
                403,
                'Unauthorized access.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | GET STATUS
        |--------------------------------------------------------------------------
        */

        $status = strtolower(
            trim(
                $order->status ?? ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | ONLY PENDING ORDERS CAN BE CANCELLED
        |--------------------------------------------------------------------------
        */

        if ($status !== 'pending') {

            return redirect()
                ->route('customer.orders')
                ->with(
                    'error',
                    'Only pending orders can be cancelled.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | FIND PRODUCT
        |--------------------------------------------------------------------------
        */

        $product = Product::where(
            'name',
            $order->product_name
        )->first();


        /*
        |--------------------------------------------------------------------------
        | RETURN STOCK
        |--------------------------------------------------------------------------
        */

        if ($product) {

            $product->increment(
                'stock',
                $order->quantity
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CHANGE STATUS
        |--------------------------------------------------------------------------
        */

        $order->update([
            'status' =>
                'cancelled',
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('customer.orders')
            ->with(
                'success',
                'Order #' .
                $order->id .
                ' cancelled successfully. Stock has been returned.'
            );
    }
}