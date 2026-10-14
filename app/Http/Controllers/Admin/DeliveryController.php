<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DeliveryController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        // =========================
        // SUMMARY
        // =========================

        // Total number of orders
        $totalOrders = Order::count();

        // Active deliveries
        $activeDeliveries = Order::whereIn('status', [
            'Confirmed',
            'Preparing',
            'Out for Delivery'
        ])->count();

        // Delivered today
        $deliveredToday = Order::where('status', 'Delivered')
            ->whereDate('updated_at', today())
            ->count();

        // Cancelled orders
        $cancelledOrders = Order::where('status', 'Cancelled')->count();


        // =========================
        // STATUS COUNTS
        // =========================

        $pending = Order::where('status', 'Pending')->count();

        $confirmed = Order::where('status', 'Confirmed')->count();

        $preparing = Order::where('status', 'Preparing')->count();

        $outForDelivery = Order::where(
            'status',
            'Out for Delivery'
        )->count();

        $delivered = Order::where('status', 'Delivered')->count();

        $cancelled = Order::where('status', 'Cancelled')->count();


        return view('admin.deliveries.index', compact(
            'orders',
            'totalOrders',
            'activeDeliveries',
            'deliveredToday',
            'cancelledOrders',
            'pending',
            'confirmed',
            'preparing',
            'outForDelivery',
            'delivered',
            'cancelled'
        ));
    }
}