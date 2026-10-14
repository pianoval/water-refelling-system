<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view(
            'staff.orders.index',
            compact('orders')
        );
    }

    public function show(Order $order)
    {
        // Once printed, the order becomes receipt-only.
        if ($order->is_printed) {
            return redirect()->route(
                'staff.orders.print',
                $order->id
            );
        }

        return view(
            'staff.orders.show',
            compact('order')
        );
    }

    public function print(Order $order)
    {
        $status = strtolower(
            trim(
                $order->status ?? ''
            )
        );

        // Only delivered orders can be printed.
        if ($status !== 'delivered') {
            return redirect()
                ->route(
                    'staff.orders.show',
                    $order->id
                )
                ->with(
                    'error',
                    'Only delivered orders can be printed.'
                );
        }

        // Permanently lock the order the first time it is printed.
        if (!$order->is_printed) {
            $order->forceFill([
                'is_printed' => true,
            ])->save();
        }

        return view(
            'staff.orders.print',
            compact('order')
        );
    }

    public function updateStatus(
        Request $request,
        Order $order
    ) {
        $request->validate([
            'status' => [
                'required',
                'in:Pending,Confirmed,Preparing,Out for Delivery,Delivered,Cancelled',
            ],
        ]);

        $currentStatus = strtolower(
            trim(
                $order->status ?? ''
            )
        );

        // Cancelled orders cannot be updated.
        if (
            in_array(
                $currentStatus,
                [
                    'cancelled',
                    'canceled'
                ]
            )
        ) {
            return redirect()
                ->route(
                    'staff.orders.show',
                    $order->id
                )
                ->with(
                    'error',
                    'This order was cancelled by the customer and can no longer be updated.'
                );
        }

        // Printed orders are permanently locked.
        if ($order->is_printed) {
            return redirect()
                ->route(
                    'staff.orders.print',
                    $order->id
                )
                ->with(
                    'error',
                    'This order has already been printed and can no longer be changed.'
                );
        }

        // Update the order status.
        $order->update([
            'status' => $request->status,
        ]);

        // After updating, go directly back to Orders.
        // This prevents duplicate history entries on the Order Details page.
        return redirect()
            ->route(
                'staff.orders.index'
            )
            ->with(
                'success',
                'Order status updated successfully!'
            );
    }
}