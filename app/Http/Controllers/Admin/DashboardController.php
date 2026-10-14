<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // BASIC DASHBOARD COUNTS
        // =========================

        $totalUsers = User::count();

        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $deliveredCount = Order::where('status', 'delivered')->count();


        // =========================
        // INVENTORY OVERVIEW
        // =========================

        $products = Product::latest()->get();

        $totalStock = $products->sum('stock');

        $lowStock = $products
            ->where('stock', '>', 0)
            ->where('stock', '<=', 10)
            ->count();

        $outOfStock = $products
            ->where('stock', '<=', 0)
            ->count();


        // =========================
        // SALES & REVENUE ANALYTICS
        // DELIVERED ORDERS ONLY
        // =========================

        $deliveredOrders = Order::where('status', 'delivered');

        // Total Revenue
        $totalRevenue = (clone $deliveredOrders)->sum('total_price');

        // Total Water Units Sold
        $waterUnitsSold = (clone $deliveredOrders)->sum('quantity');

        // Number of delivered orders
        $deliveredOrdersCount = (clone $deliveredOrders)->count();

        // Average Order Value
        $averageOrderValue = $deliveredOrdersCount > 0
            ? $totalRevenue / $deliveredOrdersCount
            : 0;


        // =========================
        // CARD FILL
        // 1 = tiny
        // 50 = half
        // 100 = full
        // =========================

        $usersFill = min($totalUsers, 100);

        $productsFill = min($totalProducts, 100);

        $ordersFill = min($totalOrders, 100);

        $deliveredFill = min($deliveredCount, 100);


        // =========================
        // RECENT ORDERS
        // =========================

        $recentOrders = Order::latest()
            ->take(5)
            ->get();


        // =========================
        // RETURN DASHBOARD
        // =========================

        return view('admin.users.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalOrders',
            'deliveredCount',

            'totalStock',
            'lowStock',
            'outOfStock',

            'totalRevenue',
            'waterUnitsSold',
            'averageOrderValue',

            'usersFill',
            'productsFill',
            'ordersFill',
            'deliveredFill',

            'recentOrders'
        ));
    }
}