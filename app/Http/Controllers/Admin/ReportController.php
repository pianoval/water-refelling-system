<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display reports and analytics.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | DATE RANGE
        |--------------------------------------------------------------------------
        | Used mainly for the monthly graph and filtered report sections.
        |--------------------------------------------------------------------------
        */

        $startDate = $request->filled('start_date')
            ? Carbon::parse($request->start_date)->startOfDay()
            : now()->startOfYear();

        $endDate = $request->filled('end_date')
            ? Carbon::parse($request->end_date)->endOfDay()
            : now()->endOfDay();


        /*
        |--------------------------------------------------------------------------
        | TOTAL ORDERS
        |--------------------------------------------------------------------------
        */

        $totalOrders = Order::count();


        /*
        |--------------------------------------------------------------------------
        | ORDER STATUS COUNTS
        |--------------------------------------------------------------------------
        */

        $pendingOrders = Order::where(
            'status',
            'Pending'
        )->count();


        $confirmedOrders = Order::where(
            'status',
            'Confirmed'
        )->count();


        $preparingOrders = Order::where(
            'status',
            'Preparing'
        )->count();


        $outForDeliveryOrders = Order::where(
            'status',
            'Out for Delivery'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DELIVERED ORDERS
        |--------------------------------------------------------------------------
        | Same logic as Admin Dashboard.
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
        | PROCESSING ORDERS
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
        | TOTAL REVENUE
        |--------------------------------------------------------------------------
        | IMPORTANT:
        | Same exact logic as Admin Dashboard.
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
        | Same Delivered-only logic.
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
        | TOTAL CUSTOMERS
        |--------------------------------------------------------------------------
        */

        $totalCustomers = User::where(
            'role',
            'customer'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | LOW STOCK
        |--------------------------------------------------------------------------
        */

        $lowStockCount = Product::where(
            'stock',
            '>',
            0
        )
        ->where(
            'stock',
            '<=',
            10
        )
        ->count();


        /*
        |--------------------------------------------------------------------------
        | OUT OF STOCK
        |--------------------------------------------------------------------------
        */

        $outOfStockCount = Product::where(
            'stock',
            '<=',
            0
        )->count();


        /*
        |--------------------------------------------------------------------------
        | LOW STOCK PRODUCTS
        |--------------------------------------------------------------------------
        */

        $lowStockProducts = Product::where(
            'stock',
            '<=',
            10
        )
        ->orderBy(
            'stock',
            'asc'
        )
        ->get();


        /*
        |--------------------------------------------------------------------------
        | MONTHLY REVENUE GRAPH
        |--------------------------------------------------------------------------
        | This part DOES use the selected date range.
        | Only Delivered orders are included.
        |--------------------------------------------------------------------------
        */

        $monthlySales = [];

        $currentMonth =
            $startDate
                ->copy()
                ->startOfMonth();

        $lastMonth =
            $endDate
                ->copy()
                ->startOfMonth();


        while (
            $currentMonth->lessThanOrEqualTo(
                $lastMonth
            )
        ) {

            $monthSales = Order::where(
                'status',
                'Delivered'
            )
            ->whereYear(
                'created_at',
                $currentMonth->year
            )
            ->whereMonth(
                'created_at',
                $currentMonth->month
            )
            ->whereBetween(
                'created_at',
                [
                    $startDate,
                    $endDate
                ]
            )
            ->sum('total_amount');


            $monthlySales[] = [

                'month' =>
                    $currentMonth->format('M'),

                'sales' =>
                    (float) $monthSales,

            ];


            $currentMonth->addMonth();
        }


        /*
        |--------------------------------------------------------------------------
        | RECENT DELIVERED ORDERS
        |--------------------------------------------------------------------------
        | Same Delivered-only logic.
        |--------------------------------------------------------------------------
        */

        $recentOrders = Order::where(
            'status',
            'Delivered'
        )
        ->latest()
        ->take(5)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | RECENT DELIVERED SALES
        |--------------------------------------------------------------------------
        */

        $recentSales = Order::where(
            'status',
            'Delivered'
        )
        ->latest()
        ->take(10)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.reports.index',
            compact(
                'startDate',
                'endDate',

                'totalOrders',

                'pendingOrders',
                'confirmedOrders',
                'preparingOrders',
                'outForDeliveryOrders',
                'deliveredOrders',
                'cancelledOrders',
                'processingOrders',

                'totalRevenue',
                'waterUnitsSold',
                'averageOrderValue',

                'totalCustomers',

                'lowStockCount',
                'outOfStockCount',
                'lowStockProducts',

                'monthlySales',

                'recentOrders',
                'recentSales'
            )
        );
    }
}