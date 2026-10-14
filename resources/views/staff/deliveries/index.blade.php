<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries | Staff | Water Station</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #f2fbfa 0%, #f7fcfc 50%, #e9f6f5 100%);
            color: #234344;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #0b4f50 0%, #126968 48%, #18817d 100%);
            color: #fff;
            z-index: 3000;
            overflow-y: auto;
            transition: .3s ease;
            box-shadow: 6px 0 22px rgba(0,78,79,.16);
        }

        .sidebar.hidden { left: -260px; }

        .sidebar-header {
            height: 70px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,.16);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(255,255,255,.14);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.18);
            font-size: 20px;
        }

        .close-sidebar {
            width: 34px;
            height: 34px;
            border: none;
            background: transparent;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 19px;
            border-radius: 8px;
        }

        .close-sidebar:hover { background: rgba(255,255,255,.10); }

        .sidebar-menu { padding: 18px 12px; }

        .menu-title {
            padding: 8px 12px;
            margin-bottom: 5px;
            color: rgba(255,255,255,.58);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: rgba(255,255,255,.88);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar a i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.15);
            color: #fff;
            transform: translateX(2px);
        }

        .logout-link {
            width: 100%;
            border: none;
            background: transparent;
            color: rgba(255,255,255,.88);
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.15);
            color: #fff;
        }

        .logout-link i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        /* MAIN */
        .main {
            margin-left: 260px;
            min-height: 100vh;
            transition: .3s ease;
        }

        .main.expanded { margin-left: 0; }

        /* TOPBAR */
        .topbar {
            height: 68px;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid #d8eceb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 2500;
            box-shadow: 0 3px 15px rgba(0,100,100,.05);
        }

        .topbar-left { display: flex; align-items: center; }

        .menu-btn {
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 9px;
            background: #e2f5f3;
            color: #08716e;
            font-size: 21px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s ease;
        }

        .menu-btn:hover { background: #d2efec; transform: scale(1.03); }

        .profile { display: flex; align-items: center; gap: 10px; }

        .profile-image,
        .profile-placeholder {
            width: 38px;
            height: 38px;
            border-radius: 50%;
        }

        .profile-image { object-fit: cover; border: 2px solid #b9dfdc; }

        .profile-placeholder {
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .profile-name { margin: 0; font-size: 13px; font-weight: 700; }
        .profile-role { margin: 2px 0 0; color: #08716e; font-size: 10px; }

        /* CONTENT */
        .content { padding: 14px 26px 28px; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .page-heading { display: flex; align-items: center; gap: 13px; }

        .page-icon {
            width: 52px;
            height: 52px;
            border-radius: 15px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 27px;
            font-weight: 700;
            color: #126968;
        }

        /* DELIVERY STAT CARDS */
        .delivery-stat {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid #d9ecea;
            border-radius: 18px;
            padding: 20px;
            min-height: 145px;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
            transition: .25s ease;
        }

        .delivery-stat:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 13px 27px rgba(0,90,90,.13);
        }

        .delivery-stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 12px;
        }

        .delivery-stat.total .delivery-stat-icon { background: #e0f3f1; color: #08716e; }
        .delivery-stat.pending .delivery-stat-icon { background: #fff4df; color: #ef6c00; }
        .delivery-stat.transit .delivery-stat-icon { background: #e4f1ff; color: #2563a6; }
        .delivery-stat.done .delivery-stat-icon { background: #e5f7ed; color: #19734a; }

        .delivery-stat-label { color: #789090; font-size: 11px; font-weight: 600; }

        .delivery-stat-number {
            margin-top: 3px;
            font-size: 29px;
            font-weight: 700;
            color: #126968;
        }

        .delivery-stat.pending .delivery-stat-number { color: #ef6c00; }
        .delivery-stat.transit .delivery-stat-number { color: #2563a6; }
        .delivery-stat.done .delivery-stat-number { color: #19734a; }

        .delivery-stat::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            right: -35px;
            top: -40px;
            background: rgba(24,129,125,.05);
        }

        /* DELIVERY FLOW */
        .flow-card {
            margin-top: 20px;
            background: #fff;
            border: 1px solid #d9ecea;
            border-radius: 18px;
            padding: 20px 22px;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
        }

        .flow-title { margin-bottom: 18px; }
        .flow-title h3 { margin: 0; font-size: 16px; color: #234344; font-weight: 700; }
        .flow-title p { margin: 4px 0 0; color: #829898; font-size: 11px; }

        .flow {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .flow-item { display: flex; align-items: center; flex: 1; min-width: 0; }

        .flow-step {
            width: 43px;
            height: 43px;
            min-width: 43px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e8f2f1;
            color: #08716e;
            font-size: 16px;
            border: 2px solid #d2e7e5;
        }

        .flow-text { margin-left: 9px; }
        .flow-text strong { display: block; font-size: 11px; color: #476969; white-space: nowrap; }
        .flow-line { height: 2px; background: #dcecea; flex: 1; margin: 0 8px; }

        /* DELIVERY QUEUE */
        .queue-card {
            margin-top: 20px;
            background: #fff;
            border: 1px solid #d9ecea;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
        }

        .queue-header {
            padding: 18px 20px;
            border-bottom: 1px solid #edf3f2;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .queue-header h3 { margin: 0; font-size: 16px; font-weight: 700; color: #234344; }

        .queue-header span {
            padding: 6px 10px;
            border-radius: 20px;
            background: #e0f3f1;
            color: #08716e;
            font-size: 10px;
            font-weight: 700;
        }

        .table-wrapper { overflow-x: auto; }

        .delivery-table {
            width: 100%;
            min-width: 1150px;
            border-collapse: collapse;
        }

        .delivery-table th {
            padding: 13px 14px;
            background: #edf8f7;
            color: #567575;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .delivery-table td {
            padding: 14px;
            border-top: 1px solid #edf3f2;
            font-size: 12px;
            color: #526f6f;
            vertical-align: middle;
        }

        .delivery-table tbody tr { transition: .2s ease; }
        .delivery-table tbody tr:hover { background: #f9fdfd; }

        .customer-cell { display: flex; align-items: center; gap: 9px; }

        .customer-avatar {
            width: 34px;
            height: 34px;
            min-width: 34px;
            border-radius: 50%;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .customer-name { font-weight: 700; color: #294949; }
        .customer-phone { margin-top: 2px; font-size: 9px; color: #90a1a1; }
        .product-name { font-weight: 700; color: #476969; }
        .delivery-address { max-width: 200px; line-height: 1.4; }
        .amount { font-weight: 700; color: #08716e; }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-confirmed { background: #e3f1ff; color: #2563a6; }
        .status-preparing { background: #eee7ff; color: #6542a5; }
        .status-out { background: #e2f4f7; color: #08716e; }
        .status-delivered { background: #e5f7ed; color: #19734a; }
        .status-cancelled { background: #ffe9e9; color: #c62828; }

        .status-form { display: flex; align-items: center; gap: 5px; }

        .status-select {
            min-width: 150px;
            border: 1px solid #d5e8e6;
            border-radius: 8px;
            padding: 7px 9px;
            background: #fbfefe;
            color: #526f6f;
            font-size: 10px;
        }

        .status-select:focus {
            outline: none;
            border-color: #66aaa6;
            box-shadow: 0 0 0 .15rem rgba(24,129,125,.10);
        }

        .update-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 8px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s ease;
        }

        .update-btn:hover { background: #cfece9; color: #075c59; }

        /* EMPTY STATE */
        .empty-state { text-align: center; padding: 60px 20px; color: #789090; }

        .empty-state-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 14px;
            border-radius: 20px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-state h5 { margin: 0 0 5px; color: #516e6e; font-size: 17px; font-weight: 700; }
        .empty-state p { margin: 0; font-size: 11px; }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .sidebar { left: -260px; }
            .sidebar.open { left: 0; }
            .main { margin-left: 0; }
            .content { padding: 14px 22px 22px; }
            .flow { overflow-x: auto; padding-bottom: 5px; }
            .flow-item { min-width: 190px; }
        }

        @media (max-width: 767px) {
            .content { padding: 14px 16px 18px; }
            .page-header { align-items: flex-start; flex-direction: column; }
            .flow-card { padding: 17px; }
        }

        @media (max-width: 576px) {
            .content { padding: 12px; }
            .profile-name, .profile-role { display: none; }
            .flow { display: grid; grid-template-columns: 1fr; gap: 9px; }
            .flow-item { min-width: 0; }
            .flow-line { display: none; }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">
        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-droplet-fill"></i>
            </div>
            <div>Water Station</div>
        </div>

        <button type="button" class="close-sidebar" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="sidebar-menu">

        <div class="menu-title">Main Menu</div>

        <a href="{{ route('staff.dashboard') }}">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('staff.orders.index') }}">
            <i class="bi bi-cart-check-fill"></i>
            Orders
        </a>

        <a href="{{ route('staff.products.index') }}">
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>

        <a href="{{ route('staff.inventory.index') }}">
            <i class="bi bi-boxes"></i>
            Inventory
        </a>

        <a href="{{ route('staff.deliveries.index') }}" class="active">
            <i class="bi bi-truck"></i>
            Deliveries
        </a>

        <!-- EMAIL NOTIFICATIONS -->
        <a href="{{ route('staff.emails.create') }}"
           class="{{ request()->routeIs('staff.emails.*') ? 'active' : '' }}">
            <i class="bi bi-envelope-fill"></i>
            Email Notifications
        </a>

        <div class="menu-title mt-3">Account</div>

        <a href="{{ route('staff.account') }}">
            <i class="bi bi-person-circle"></i>
            My Account
        </a>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="logout-link">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>

    </div>
</aside>

<!-- MAIN -->
<div class="main" id="main">

    <!-- TOPBAR -->
    <nav class="topbar">
        <div class="topbar-left">
            <button type="button" class="menu-btn" id="menuButton" title="Open Sidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <!-- PROFILE -->
        <div class="profile">
            @if(auth()->user()->profile_picture)
                <img
                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                    alt="Profile"
                    class="profile-image"
                >
            @else
                <div class="profile-placeholder">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif

            <div>
                <p class="profile-name">{{ auth()->user()->name }}</p>
                <p class="profile-role">Staff</p>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="content">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <div class="page-heading">
                <div class="page-icon">
                    <i class="bi bi-truck"></i>
                </div>
                <div>
                    <h1>Delivery Center</h1>
                </div>
            </div>
        </div>

        <!-- SUCCESS -->
        @if(session('success'))
            <div class="alert alert-success mb-3 border-0">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR -->
        @if(session('error'))
            <div class="alert alert-danger mb-3 border-0">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- SUMMARY -->
        <div class="row g-3">

            <div class="col-xl-3 col-md-6">
                <div class="delivery-stat total">
                    <div class="delivery-stat-icon"><i class="bi bi-truck"></i></div>
                    <div class="delivery-stat-label">Total Deliveries</div>
                    <div class="delivery-stat-number">{{ $totalDeliveries }}</div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="delivery-stat pending">
                    <div class="delivery-stat-icon"><i class="bi bi-clock-history"></i></div>
                    <div class="delivery-stat-label">Waiting / Preparing</div>
                    <div class="delivery-stat-number">{{ $pendingDeliveries }}</div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="delivery-stat transit">
                    <div class="delivery-stat-icon"><i class="bi bi-truck"></i></div>
                    <div class="delivery-stat-label">Out for Delivery</div>
                    <div class="delivery-stat-number">{{ $outForDelivery }}</div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="delivery-stat done">
                    <div class="delivery-stat-icon"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="delivery-stat-label">Successfully Delivered</div>
                    <div class="delivery-stat-number">{{ $delivered }}</div>
                </div>
            </div>

        </div>

        <!-- DELIVERY FLOW -->
        <div class="flow-card">
            <div class="flow-title">
                <h3>Delivery Workflow</h3>
                <p>Follow the order through each delivery stage.</p>
            </div>

            <div class="flow">

                <div class="flow-item">
                    <div class="flow-step"><i class="bi bi-check-circle"></i></div>
                    <div class="flow-text"><strong>Confirmed</strong></div>
                </div>

                <div class="flow-line"></div>

                <div class="flow-item">
                    <div class="flow-step"><i class="bi bi-box-seam"></i></div>
                    <div class="flow-text"><strong>Preparing</strong></div>
                </div>

                <div class="flow-line"></div>

                <div class="flow-item">
                    <div class="flow-step"><i class="bi bi-truck"></i></div>
                    <div class="flow-text"><strong>Out for Delivery</strong></div>
                </div>

                <div class="flow-line"></div>

                <div class="flow-item">
                    <div class="flow-step"><i class="bi bi-house-check"></i></div>
                    <div class="flow-text"><strong>Delivered</strong></div>
                </div>

            </div>
        </div>

        <!-- DELIVERY QUEUE -->
        <div class="queue-card">

            <div class="queue-header">
                <h3>Active Delivery Queue</h3>
                <span>{{ $totalDeliveries }} Orders</span>
            </div>

            <div class="table-wrapper">

                @if($deliveries->count() > 0)

                    <table class="delivery-table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Delivery Address</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Update</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($deliveries as $delivery)

                                @php
                                    $status = strtolower(trim($delivery->status ?? 'confirmed'));

                                    $customerName = $delivery->customer_name ?? 'Customer';

                                    $firstLetter = strtoupper(substr($customerName, 0, 1));
                                @endphp

                                <tr>

                                    <td>
                                        <strong>#{{ $delivery->id }}</strong>
                                    </td>

                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">{{ $firstLetter }}</div>

                                            <div>
                                                <div class="customer-name">{{ $customerName }}</div>

                                                @if($delivery->phone_number)
                                                    <div class="customer-phone">{{ $delivery->phone_number }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="product-name">{{ $delivery->product_name }}</div>
                                        <small class="text-muted">
                                            {{ $delivery->quantity }} unit/s
                                        </small>
                                    </td>

                                    <td>{{ $delivery->quantity }}</td>

                                    <td>
                                        <div class="delivery-address">
                                            @if($delivery->delivery_address)
                                                <i class="bi bi-geo-alt-fill text-success me-1"></i>
                                                {{ $delivery->delivery_address }}
                                            @else
                                                <span class="text-muted">No address provided</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        @if($delivery->phone_number)
                                            <i class="bi bi-telephone-fill text-success me-1"></i>
                                            {{ $delivery->phone_number }}
                                        @else
                                            <span class="text-muted">No phone</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="amount">
                                            ₱{{ number_format($delivery->total_amount ?? $delivery->total_price ?? 0, 2) }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($status === 'confirmed')
                                            <span class="status status-confirmed">
                                                <i class="bi bi-check-circle"></i>
                                                Confirmed
                                            </span>

                                        @elseif($status === 'preparing')
                                            <span class="status status-preparing">
                                                <i class="bi bi-box-seam"></i>
                                                Preparing
                                            </span>

                                        @elseif(in_array($status, ['out for delivery', 'out_for_delivery', 'out']))
                                            <span class="status status-out">
                                                <i class="bi bi-truck"></i>
                                                Out for Delivery
                                            </span>

                                        @elseif($status === 'delivered')
                                            <span class="status status-delivered">
                                                <i class="bi bi-house-check-fill"></i>
                                                Delivered
                                            </span>

                                        @elseif(in_array($status, ['cancelled', 'canceled']))
                                            <span class="status status-cancelled">
                                                <i class="bi bi-x-circle"></i>
                                                Cancelled
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($delivery->order_date || $delivery->created_at)
                                            {{ \Carbon\Carbon::parse($delivery->order_date ?? $delivery->created_at)->format('M d, Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if(in_array($status, ['cancelled', 'canceled']))
                                            <span class="status status-cancelled">
                                                <i class="bi bi-lock-fill"></i>
                                                Locked
                                            </span>

                                        @elseif($status === 'delivered')
                                            <span class="status status-delivered">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Completed
                                            </span>

                                        @else
                                            <form
                                                action="{{ route('staff.deliveries.updateStatus', $delivery->id) }}"
                                                method="POST"
                                                class="status-form"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <select name="status" class="status-select" required>
                                                    <option value="Confirmed" {{ $status === 'confirmed' ? 'selected' : '' }}>
                                                        Confirmed
                                                    </option>

                                                    <option value="Preparing" {{ $status === 'preparing' ? 'selected' : '' }}>
                                                        Preparing
                                                    </option>

                                                    <option
                                                        value="Out for Delivery"
                                                        {{ in_array($status, ['out for delivery', 'out_for_delivery', 'out']) ? 'selected' : '' }}
                                                    >
                                                        Out for Delivery
                                                    </option>

                                                    <option value="Delivered" {{ $status === 'delivered' ? 'selected' : '' }}>
                                                        Delivered
                                                    </option>
                                                </select>

                                                <button
                                                    type="submit"
                                                    class="update-btn"
                                                    title="Update delivery status"
                                                >
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                @else

                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="bi bi-truck"></i>
                        </div>

                        <h5>No Deliveries Yet</h5>

                        <p>
                            Confirmed orders will appear here when they enter the
                            delivery workflow.
                        </p>
                    </div>

                @endif

            </div>
        </div>

    </main>
</div>

<!-- JAVASCRIPT -->
<script>
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');
    const menuButton = document.getElementById('menuButton');
    const closeSidebar = document.getElementById('closeSidebar');

    if (menuButton) {
        menuButton.addEventListener('click', function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.add('open');
            } else {
                sidebar.classList.toggle('hidden');
                main.classList.toggle('expanded');
            }
        });
    }

    if (closeSidebar) {
        closeSidebar.addEventListener('click', function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.remove('open');
            } else {
                sidebar.classList.add('hidden');
                main.classList.add('expanded');
            }
        });
    }

    window.addEventListener('resize', function () {
        if (window.innerWidth > 991) {
            sidebar.classList.remove('open');
        }
    });
</script>

</body>
</html>