@extends('layouts.admin')

@section('title', 'Reports & Analytics')

@section('content')

<style>
    .reports-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .reports-header h1 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #183b5b;
    }

    .reports-header p {
        margin: 6px 0 0;
        color: #6b8299;
        font-size: 14px;
    }

    .filter-card {
        background: rgba(255,255,255,.96);
        border: 1px solid #d8e5f5;
        border-radius: 14px;
        padding: 16px;
        margin-bottom: 24px;
        box-shadow: 0 5px 20px rgba(23,78,166,.06);
    }

    .filter-form {
        display: flex;
        align-items: flex-end;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .filter-group label {
        font-size: 12px;
        font-weight: 600;
        color: #49677f;
    }

    .filter-group input {
        border: 1px solid #d8e5f5;
        border-radius: 9px;
        padding: 9px 11px;
        font-size: 13px;
        color: #36566f;
        outline: none;
    }

    .filter-group input:focus {
        border-color: #7fa9df;
        box-shadow: 0 0 0 3px rgba(23,78,166,.08);
    }

    .filter-btn {
        border: none;
        background: #174ea6;
        color: white;
        border-radius: 9px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }

    .filter-btn:hover {
        background: #0d3b7a;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .summary-card {
        background: rgba(255,255,255,.96);
        border: 1px solid #d8e5f5;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(23,78,166,.06);
        position: relative;
        overflow: hidden;
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        right: -28px;
        top: -28px;
        background: #edf5ff;
    }

    .summary-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        margin-bottom: 14px;
    }

    .sales-icon {
        background: #e8f1ff;
        color: #174ea6;
    }

    .orders-icon {
        background: #e8f7f3;
        color: #087f6b;
    }

    .customers-icon {
        background: #fff4df;
        color: #a76500;
    }

    .stock-icon {
        background: #fff0f0;
        color: #c0392b;
    }

    .summary-label {
        font-size: 12px;
        color: #6b8299;
        margin-bottom: 4px;
    }

    .summary-value {
        font-size: 24px;
        font-weight: 700;
        color: #183b5b;
    }

    .summary-sub {
        font-size: 11px;
        color: #7b91a5;
        margin-top: 5px;
    }

    .reports-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .report-card {
        background: rgba(255,255,255,.96);
        border: 1px solid #d8e5f5;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(23,78,166,.06);
        overflow: hidden;
    }

    .report-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #e4edf7;
    }

    .report-card-header h2 {
        margin: 0;
        color: #183b5b;
        font-size: 17px;
        font-weight: 700;
    }

    .report-card-header p {
        margin: 4px 0 0;
        color: #7b91a5;
        font-size: 12px;
    }

    .chart-area {
        padding: 20px;
    }

    .chart-bars {
        height: 250px;
        display: flex;
        align-items: flex-end;
        gap: 12px;
        padding: 10px 5px 0;
        border-bottom: 1px solid #d8e5f5;
    }

    .chart-column {
        flex: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        gap: 7px;
    }

    .bar-value {
        font-size: 9px;
        color: #6b8299;
        min-height: 12px;
    }

    .bar {
        width: 70%;
        max-width: 42px;
        min-height: 3px;
        background: linear-gradient(180deg, #4f8bd6, #174ea6);
        border-radius: 7px 7px 0 0;
        transition: .2s;
    }

    .bar:hover {
        opacity: .8;
    }

    .bar-label {
        font-size: 10px;
        color: #6b8299;
    }

    .status-list {
        padding: 18px 20px;
    }

    .status-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .status-item:last-child {
        border-bottom: none;
    }

    .status-left {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        color: #36566f;
    }

    .status-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
    }

    .pending-dot {
        background: #f0ad4e;
    }

    .processing-dot {
        background: #4f8bd6;
    }

    .completed-dot {
        background: #28a745;
    }

    .cancelled-dot {
        background: #dc3545;
    }

    .status-number {
        font-weight: 700;
        color: #183b5b;
    }

    .bottom-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 20px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .report-table {
        width: 100%;
        margin: 0;
    }

    .report-table th {
        background: #f5f9ff;
        color: #49677f;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 13px 15px;
        border-bottom: 1px solid #d8e5f5;
        white-space: nowrap;
    }

    .report-table td {
        padding: 13px 15px;
        color: #36566f;
        font-size: 13px;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
    }

    .report-table tr:last-child td {
        border-bottom: none;
    }

    .product-name {
        font-weight: 700;
        color: #183b5b;
    }

    .stock-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .low-badge {
        background: #fff4df;
        color: #a76500;
    }

    .out-badge {
        background: #fff0f0;
        color: #c0392b;
    }

    .recent-list {
        padding: 8px 20px 16px;
    }

    .recent-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 13px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .recent-item:last-child {
        border-bottom: none;
    }

    .recent-customer {
        font-size: 13px;
        font-weight: 700;
        color: #183b5b;
    }

    .recent-date {
        font-size: 11px;
        color: #7b91a5;
        margin-top: 3px;
    }

    .recent-total {
        font-size: 13px;
        font-weight: 700;
        color: #174ea6;
        white-space: nowrap;
    }

    .empty-report {
        text-align: center;
        padding: 35px 20px;
        color: #7b91a5;
        font-size: 13px;
    }

    .empty-report i {
        display: block;
        font-size: 30px;
        margin-bottom: 8px;
        color: #b9d2f5;
    }

    @media (max-width: 1100px) {
        .summary-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .reports-grid,
        .bottom-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .reports-header {
            flex-direction: column;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .filter-form {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group input,
        .filter-btn {
            width: 100%;
        }

        .reports-header h1 {
            font-size: 22px;
        }
    }
</style>


{{-- HEADER --}}
<div class="reports-header">
    <div>
        <h1>Reports & Analytics</h1>
        <p>Monitor sales, orders, customers, and inventory performance.</p>
    </div>
</div>


{{-- DATE FILTER --}}
<div class="filter-card">
    <form action="{{ route('admin.reports') }}" method="GET" class="filter-form">

        <div class="filter-group">
            <label for="start_date">Start Date</label>
            <input
                type="date"
                id="start_date"
                name="start_date"
                value="{{ request('start_date', $startDate->format('Y-m-d')) }}"
            >
        </div>

        <div class="filter-group">
            <label for="end_date">End Date</label>
            <input
                type="date"
                id="end_date"
                name="end_date"
                value="{{ request('end_date', $endDate->format('Y-m-d')) }}"
            >
        </div>

        <button type="submit" class="filter-btn">
            <i class="bi bi-funnel-fill me-1"></i>
            Apply Filter
        </button>

    </form>
</div>


{{-- SUMMARY CARDS --}}
<div class="summary-grid">

    <div class="summary-card">
        <div class="summary-icon sales-icon">
            <i class="bi bi-cash-stack"></i>
        </div>

        <div class="summary-label">Total Sales</div>

        <div class="summary-value">
            ₱{{ number_format($totalSales, 2) }}
        </div>

        <div class="summary-sub">
            Completed orders only
        </div>
    </div>


    <div class="summary-card">
        <div class="summary-icon orders-icon">
            <i class="bi bi-cart-check-fill"></i>
        </div>

        <div class="summary-label">Total Orders</div>

        <div class="summary-value">
            {{ $totalOrders }}
        </div>

        <div class="summary-sub">
            Selected date range
        </div>
    </div>


    <div class="summary-card">
        <div class="summary-icon customers-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <div class="summary-label">Customers</div>

        <div class="summary-value">
            {{ $totalCustomers }}
        </div>

        <div class="summary-sub">
            Registered customers
        </div>
    </div>


    <div class="summary-card">
        <div class="summary-icon stock-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>

        <div class="summary-label">Low Stock</div>

        <div class="summary-value">
            {{ $lowStockCount }}
        </div>

        <div class="summary-sub">
            {{ $outOfStockCount }} out of stock
        </div>
    </div>

</div>


{{-- SALES + ORDER STATUS --}}
<div class="reports-grid">

    {{-- SALES OVERVIEW --}}
    <div class="report-card">

        <div class="report-card-header">
            <h2>
                <i class="bi bi-graph-up-arrow me-2"></i>
                Sales Overview
            </h2>

            <p>
                Completed sales for {{ now()->year }}
            </p>
        </div>

        <div class="chart-area">

            @php
                $maxSales = collect($monthlySales)->max('sales');
                $maxSales = $maxSales > 0 ? $maxSales : 1;
            @endphp

            <div class="chart-bars">

                @foreach($monthlySales as $month)

                    @php
                        $height = ($month['sales'] / $maxSales) * 100;
                    @endphp

                    <div class="chart-column">

                        <div class="bar-value">
                            {{ $month['sales'] > 0 ? '₱'.number_format($month['sales'], 0) : '' }}
                        </div>

                        <div
                            class="bar"
                            style="height: {{ max($height, 2) }}%;"
                            title="₱{{ number_format($month['sales'], 2) }}"
                        ></div>

                        <div class="bar-label">
                            {{ $month['month'] }}
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>


    {{-- ORDER STATUS --}}
    <div class="report-card">

        <div class="report-card-header">
            <h2>
                <i class="bi bi-pie-chart-fill me-2"></i>
                Order Status
            </h2>

            <p>
                Orders within selected period
            </p>
        </div>

        <div class="status-list">

            <div class="status-item">
                <div class="status-left">
                    <span class="status-dot pending-dot"></span>
                    Pending
                </div>

                <div class="status-number">
                    {{ $pendingOrders }}
                </div>
            </div>


            <div class="status-item">
                <div class="status-left">
                    <span class="status-dot processing-dot"></span>
                    Processing
                </div>

                <div class="status-number">
                    {{ $processingOrders }}
                </div>
            </div>


            <div class="status-item">
                <div class="status-left">
                    <span class="status-dot completed-dot"></span>
                    Completed
                </div>

                <div class="status-number">
                    {{ $completedOrders }}
                </div>
            </div>


            <div class="status-item">
                <div class="status-left">
                    <span class="status-dot cancelled-dot"></span>
                    Cancelled
                </div>

                <div class="status-number">
                    {{ $cancelledOrders }}
                </div>
            </div>

        </div>

    </div>

</div>


{{-- RECENT COMPLETED + LOW STOCK --}}
<div class="bottom-grid">

    {{-- RECENT COMPLETED ORDERS --}}
    <div class="report-card">

        <div class="report-card-header">
            <h2>
                <i class="bi bi-receipt-cutoff me-2"></i>
                Recent Completed Orders
            </h2>

            <p>
                Latest completed transactions
            </p>
        </div>

        @if($recentOrders->count() > 0)

            <div class="recent-list">

                @foreach($recentOrders as $order)

                    <div class="recent-item">

                        <div>
                            <div class="recent-customer">
                                {{ $order->user->name ?? 'Customer' }}
                            </div>

                            <div class="recent-date">
                                Order #{{ $order->id }}
                                •
                                {{ $order->created_at->format('M d, Y h:i A') }}
                            </div>
                        </div>

                        <div class="recent-total">
                            ₱{{ number_format($order->total_amount, 2) }}
                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-report">
                <i class="bi bi-receipt"></i>
                No completed orders found.
            </div>

        @endif

    </div>


    {{-- LOW STOCK --}}
    <div class="report-card">

        <div class="report-card-header">
            <h2>
                <i class="bi bi-box-seam-fill me-2"></i>
                Stock Alerts
            </h2>

            <p>
                Products that need attention
            </p>
        </div>

        <div class="table-wrapper">

            @if($lowStockProducts->count() > 0)

                <table class="table report-table">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($lowStockProducts as $product)

                            <tr>

                                <td>
                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>
                                </td>

                                <td>
                                    {{ $product->stock_quantity }}
                                </td>

                                <td>

                                    @if($product->stock_quantity <= 0)

                                        <span class="stock-badge out-badge">
                                            Out of Stock
                                        </span>

                                    @else

                                        <span class="stock-badge low-badge">
                                            Low Stock
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty-report">
                    <i class="bi bi-check-circle"></i>
                    All products have sufficient stock.
                </div>

            @endif

        </div>

    </div>

</div>

@endsection