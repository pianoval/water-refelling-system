<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display delivery orders.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DELIVERY ORDERS
        |--------------------------------------------------------------------------
        | We only show orders that are already in the delivery workflow.
        |
        | Confirmed
        | Preparing
        | Out for Delivery
        | Delivered
        |--------------------------------------------------------------------------
        */

        $deliveries = Order::whereIn(
            'status',
            [
                'Confirmed',
                'Preparing',
                'Out for Delivery',
                'Delivered',
            ]
        )
        ->latest()
        ->get();


        /*
        |--------------------------------------------------------------------------
        | DELIVERY COUNTS
        |--------------------------------------------------------------------------
        */

        $totalDeliveries =
            Order::whereIn(
                'status',
                [
                    'Confirmed',
                    'Preparing',
                    'Out for Delivery',
                    'Delivered',
                ]
            )->count();


        $pendingDeliveries =
            Order::whereIn(
                'status',
                [
                    'Confirmed',
                    'Preparing',
                ]
            )->count();


        $outForDelivery =
            Order::where(
                'status',
                'Out for Delivery'
            )->count();


        $delivered =
            Order::where(
                'status',
                'Delivered'
            )->count();


        return view(
            'staff.deliveries.index',
            compact(
                'deliveries',
                'totalDeliveries',
                'pendingDeliveries',
                'outForDelivery',
                'delivered'
            )
        );
    }


    /**
     * Update delivery status.
     */
    public function updateStatus(
        Request $request,
        Order $order
    ) {

        $request->validate([
            'status' => [
                'required',
                'in:Confirmed,Preparing,Out for Delivery,Delivered',
            ],
        ]);


        $order->update([
            'status' => $request->status,
        ]);


        return redirect()
            ->route('staff.deliveries.index')
            ->with(
                'success',
                'Delivery status updated successfully!'
            );
    }
}