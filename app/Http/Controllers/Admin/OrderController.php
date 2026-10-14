<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display all orders.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | ALL ORDERS
        |--------------------------------------------------------------------------
        */

        $orders = Order::latest()->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL ORDERS
        |--------------------------------------------------------------------------
        */

        $totalOrders = Order::count();


        /*
        |--------------------------------------------------------------------------
        | PENDING ORDERS
        |--------------------------------------------------------------------------
        */

        $pendingOrders = Order::where(
            'status',
            'Pending'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | CONFIRMED ORDERS
        |--------------------------------------------------------------------------
        */

        $confirmedOrders = Order::where(
            'status',
            'Confirmed'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PREPARING ORDERS
        |--------------------------------------------------------------------------
        */

        $preparingOrders = Order::where(
            'status',
            'Preparing'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | OUT FOR DELIVERY
        |--------------------------------------------------------------------------
        */

        $outForDeliveryOrders = Order::where(
            'status',
            'Out for Delivery'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PROCESSING ORDERS
        |--------------------------------------------------------------------------
        | Confirmed + Preparing + Out for Delivery
        |--------------------------------------------------------------------------
        */

        $processingOrders =
            $confirmedOrders
            +
            $preparingOrders
            +
            $outForDeliveryOrders;


        /*
        |--------------------------------------------------------------------------
        | DELIVERED ORDERS
        |--------------------------------------------------------------------------
        */

        $deliveredOrders = Order::where(
            'status',
            'Delivered'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | CANCELLED ORDERS
        |--------------------------------------------------------------------------
        */

        $cancelledOrders = Order::whereIn(
            'status',
            [
                'Cancelled',
                'Canceled'
            ]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL REVENUE
        |--------------------------------------------------------------------------
        | ONLY DELIVERED ORDERS ARE INCLUDED.
        |--------------------------------------------------------------------------
        */

        $totalRevenue = Order::where(
            'status',
            'Delivered'
        )->sum('total_amount');


        /*
        |--------------------------------------------------------------------------
        | WATER UNITS SOLD
        |--------------------------------------------------------------------------
        */

        $waterUnitsSold = Order::where(
            'status',
            'Delivered'
        )->sum('quantity');


        /*
        |--------------------------------------------------------------------------
        | AVERAGE ORDER VALUE
        |--------------------------------------------------------------------------
        */

        $averageOrderValue =
            $deliveredOrders > 0
                ? $totalRevenue / $deliveredOrders
                : 0;


        /*
        |--------------------------------------------------------------------------
        | RETURN ORDERS VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.orders.index',
            compact(
                'orders',

                'totalOrders',

                'pendingOrders',

                'confirmedOrders',

                'preparingOrders',

                'outForDeliveryOrders',

                'processingOrders',

                'deliveredOrders',

                'cancelledOrders',

                'totalRevenue',

                'waterUnitsSold',

                'averageOrderValue'
            )
        );
    }


    /**
     * Display a specific order.
     */
    public function show(
        Order $order
    ) {
        return view(
            'admin.orders.show',
            compact('order')
        );
    }


    /**
     * Show create order page.
     */
    public function create()
    {
        return view(
            'admin.orders.create'
        );
    }


    /**
     * Store a new order.
     */
    public function store(
        Request $request
    ) {
        $validated = $request->validate([
            'customer_name' => [
                'required',
                'string',
                'max:255',
            ],

            'customer_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'product_name' => [
                'required',
                'string',
                'max:255',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'delivery_address' => [
                'nullable',
                'string',
            ],

            'phone_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'status' => [
                'required',
                'in:Pending,Confirmed,Preparing,Out for Delivery,Delivered,Cancelled',
            ],
        ]);


        Order::create(
            $validated
        );


        return redirect()
            ->route(
                'admin.orders.index'
            )
            ->with(
                'success',
                'Order created successfully!'
            );
    }


    /**
     * Show edit order page.
     */
    public function edit(
        Order $order
    ) {
        return view(
            'admin.orders.edit',
            compact('order')
        );
    }


    /**
     * Update an order.
     */
    public function update(
        Request $request,
        Order $order
    ) {
        $validated = $request->validate([
            'customer_name' => [
                'required',
                'string',
                'max:255',
            ],

            'customer_email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'product_name' => [
                'required',
                'string',
                'max:255',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'delivery_address' => [
                'nullable',
                'string',
            ],

            'phone_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'status' => [
                'required',
                'in:Pending,Confirmed,Preparing,Out for Delivery,Delivered,Cancelled',
            ],
        ]);


        $order->update(
            $validated
        );


        return redirect()
            ->route(
                'admin.orders.index'
            )
            ->with(
                'success',
                'Order updated successfully!'
            );
    }


    /**
     * Delete an order.
     */
    public function destroy(
        Order $order
    ) {
        $order->delete();


        return redirect()
            ->route(
                'admin.orders.index'
            )
            ->with(
                'success',
                'Order deleted successfully!'
            );
    }
}