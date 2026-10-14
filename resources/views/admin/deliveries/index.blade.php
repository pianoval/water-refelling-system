<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Delivery Management | Water Station
    </title>


    <!-- Bootstrap 5 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           SAME ADMIN DASHBOARD THEME
        ===================================================== */

        body {

            margin: 0;

            font-family: "Segoe UI", sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f5f9ff 0%,
                    #f8fbff 50%,
                    #eaf2ff 100%
                );

            color: #183b5b;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 260px;
            height: 100vh;

            background:
                linear-gradient(
                    180deg,
                    #0d3b7a 0%,
                    #174ea6 48%,
                    #2563b8 100%
                );

            color: white;

            z-index: 1000;

            overflow-y: auto;

            transition: .3s ease;

            box-shadow:
                6px 0 25px
                rgba(23, 78, 166, .18);
        }


        .sidebar.hidden {

            left: -260px;
        }


        .sidebar-header {

            padding: 25px 20px 20px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid
                rgba(255,255,255,.18);
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .brand-icon {

            width: 40px;
            height: 40px;

            background:
                rgba(255,255,255,.15);

            border:
                1px solid
                rgba(255,255,255,.20);

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.08);
        }


        .brand-text {

            font-size: 17px;

            font-weight: 700;

            line-height: 1.1;
        }


        .brand-text small {

            display: block;

            font-size: 10px;

            font-weight: 400;

            opacity: .8;

            margin-top: 3px;
        }


        .close-sidebar {

            border: none;

            background: transparent;

            color: white;

            font-size: 25px;

            cursor: pointer;

            line-height: 1;
        }


        .sidebar-menu {

            padding: 20px 12px;
        }


        .menu-title {

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1px;

            opacity: .65;

            padding: 8px 13px;

            margin-top: 5px;
        }


        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            color:
                rgba(255,255,255,.88);

            text-decoration: none;

            padding: 11px 13px;

            border-radius: 11px;

            margin-bottom: 5px;

            font-size: 14px;

            transition: .2s;

            cursor: pointer;
        }


        .sidebar a i {

            width: 20px;

            text-align: center;

            font-size: 17px;
        }


        .sidebar a:hover,
        .sidebar a.active {

            background:
                rgba(255,255,255,.17);

            color: white;

            transform:
                translateX(2px);

            box-shadow:
                0 4px 12px
                rgba(0,0,0,.06);
        }


        .logout-link {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            color:
                rgba(255,255,255,.88);

            background: transparent;

            border: none;

            text-decoration: none;

            padding: 11px 13px;

            border-radius: 11px;

            margin-bottom: 5px;

            font-size: 14px;

            transition: .2s;

            cursor: pointer;

            text-align: left;
        }


        .logout-link i {

            width: 20px;

            text-align: center;

            font-size: 17px;
        }


        .logout-link:hover {

            background:
                rgba(255,255,255,.17);

            color: white;

            transform:
                translateX(2px);
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 260px;

            min-height: 100vh;

            transition: .3s ease;
        }


        .main.expanded {

            margin-left: 0;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar-custom {

            height: 68px;

            background:
                rgba(255,255,255,.97);

            border-bottom:
                1px solid #d8e5f5;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;

            top: 0;

            z-index: 900;

            box-shadow:
                0 3px 15px
                rgba(23,78,166,.05);
        }


        .menu-btn {

            border: none;

            background: #e8f1ff;

            color: #174ea6;

            font-size: 24px;

            cursor: pointer;

            padding: 5px 9px;

            border-radius: 9px;

            transition: .2s;
        }


        .menu-btn:hover {

            background: #d7e6ff;

            transform: scale(1.03);
        }


        .admin-profile {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .profile-image {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            object-fit: cover;

            border: 2px solid #b9d2f5;
        }


        .profile-placeholder {

            width: 38px;
            height: 38px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #e8f1ff,
                    #d5e5ff
                );

            color: #174ea6;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;

            border:
                1px solid #bdd4f5;
        }


        .profile-info {

            line-height: 1.1;
        }


        .profile-name {

            font-size: 14px;

            font-weight: 700;

            color: #183b5b;
        }


        .profile-role {

            font-size: 11px;

            color: #2563b8;

            text-transform: capitalize;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding: 28px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;
        }


        .page-title-area {

            display: flex;

            align-items: center;

            gap: 15px;
        }


        .page-icon {

            width: 52px;
            height: 52px;

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    #e8f1ff,
                    #d7e8ff
                );

            color: #174ea6;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 25px;

            border:
                1px solid #c7dcf7;

            box-shadow:
                0 5px 15px
                rgba(23,78,166,.08);
        }


        .page-title {

            margin: 0;

            font-size: 26px;

            font-weight: 700;

            color: #183b5b;
        }


        .page-subtitle {

            margin: 4px 0 0;

            font-size: 13px;

            color: #6c86a0;
        }


        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            text-decoration: none;

            color: #174ea6;

            background: #ffffff;

            border: 1px solid #d3e2f4;

            padding: 9px 15px;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;
        }


        .back-btn:hover {

            background: #eaf2ff;

            color: #0d3b7a;

            transform: translateY(-1px);
        }


        /* =====================================================
           SUMMARY CARDS
        ===================================================== */

        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 16px;

            margin-bottom: 25px;
        }


        .summary-card {

            background:
                rgba(255,255,255,.96);

            border: 1px solid #dbe8f7;

            border-radius: 16px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 15px;

            box-shadow:
                0 7px 22px
                rgba(23,78,166,.07);

            transition: .2s;
        }


        .summary-card:hover {

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px
                rgba(23,78,166,.10);
        }


        .summary-icon {

            width: 48px;
            height: 48px;

            flex-shrink: 0;

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;
        }


        .icon-blue {

            background: #e8f1ff;

            color: #174ea6;
        }


        .icon-orange {

            background: #fff2dc;

            color: #d97706;
        }


        .icon-green {

            background: #e4f8ed;

            color: #15803d;
        }


        .icon-red {

            background: #ffe8e8;

            color: #dc2626;
        }


        .summary-label {

            font-size: 12px;

            color: #7590aa;

            margin-bottom: 3px;
        }


        .summary-value {

            font-size: 25px;

            font-weight: 700;

            color: #183b5b;

            line-height: 1;
        }


        /* =====================================================
           STATUS OVERVIEW
        ===================================================== */

        .section-card {

            background:
                rgba(255,255,255,.97);

            border:
                1px solid #dbe8f7;

            border-radius: 16px;

            box-shadow:
                0 7px 22px
                rgba(23,78,166,.06);

            margin-bottom: 25px;

            overflow: hidden;
        }


        .section-header {

            padding: 18px 22px;

            border-bottom:
                1px solid #e4edf7;

            display: flex;

            align-items: center;

            justify-content: space-between;
        }


        .section-title {

            margin: 0;

            font-size: 16px;

            font-weight: 700;

            color: #183b5b;
        }


        .section-title i {

            color: #174ea6;

            margin-right: 7px;
        }


        .status-overview {

            padding: 20px 22px;

            display: grid;

            grid-template-columns:
                repeat(6, 1fr);

            gap: 12px;
        }


        .status-box {

            border: 1px solid #e1ebf7;

            border-radius: 12px;

            padding: 15px 12px;

            text-align: center;

            background: #f9fbff;
        }


        .status-number {

            font-size: 22px;

            font-weight: 700;

            color: #183b5b;
        }


        .status-name {

            font-size: 11px;

            color: #7189a1;

            margin-top: 3px;
        }


        .status-dot {

            width: 9px;
            height: 9px;

            border-radius: 50%;

            display: inline-block;

            margin-right: 4px;
        }


        .dot-pending {

            background: #f59e0b;
        }


        .dot-confirmed {

            background: #3b82f6;
        }


        .dot-preparing {

            background: #8b5cf6;
        }


        .dot-delivery {

            background: #06b6d4;
        }


        .dot-delivered {

            background: #22c55e;
        }


        .dot-cancelled {

            background: #ef4444;
        }


        /* =====================================================
           DELIVERY TABLE
        ===================================================== */

        .table-container {

            padding: 0 22px 22px;

            overflow-x: auto;
        }


        .delivery-table {

            width: 100%;

            border-collapse: separate;

            border-spacing: 0;

            min-width: 900px;
        }


        .delivery-table thead th {

            background: #f4f8fd;

            color: #5c7893;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .4px;

            font-weight: 700;

            padding: 13px 12px;

            border-bottom:
                1px solid #dce8f5;

            white-space: nowrap;
        }


        .delivery-table thead th:first-child {

            border-radius: 10px 0 0 0;
        }


        .delivery-table thead th:last-child {

            border-radius: 0 10px 0 0;
        }


        .delivery-table tbody td {

            padding: 14px 12px;

            border-bottom:
                1px solid #edf2f8;

            font-size: 13px;

            color: #36546e;

            vertical-align: middle;
        }


        .delivery-table tbody tr:hover {

            background: #f8fbff;
        }


        .order-id {

            font-weight: 700;

            color: #174ea6;
        }


        .customer-name {

            font-weight: 600;

            color: #183b5b;
        }


        .customer-phone {

            display: block;

            color: #8195a8;

            font-size: 11px;

            margin-top: 2px;
        }


        .product-name {

            font-weight: 600;

            color: #36546e;
        }


        .quantity-badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 32px;

            padding: 4px 8px;

            border-radius: 8px;

            background: #edf5ff;

            color: #174ea6;

            font-weight: 700;

            font-size: 11px;
        }


        .amount {

            font-weight: 700;

            color: #183b5b;

            white-space: nowrap;
        }


        /* =====================================================
           STATUS BADGES
        ===================================================== */

        .status-badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;
        }


        .status-pending {

            background: #fff4dc;

            color: #b45309;
        }


        .status-confirmed {

            background: #e8f1ff;

            color: #1d4ed8;
        }


        .status-preparing {

            background: #f0eaff;

            color: #6d28d9;
        }


        .status-out {

            background: #e4f8fc;

            color: #0e7490;
        }


        .status-delivered {

            background: #e5f8ed;

            color: #15803d;
        }


        .status-cancelled {

            background: #ffe9e9;

            color: #dc2626;
        }


        .delivery-address {

            max-width: 180px;

            color: #6d849a;

            font-size: 11px;

            line-height: 1.4;
        }


        .order-date {

            white-space: nowrap;

            color: #71879d;

            font-size: 11px;
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .empty-state {

            text-align: center;

            padding: 55px 20px;

            color: #7890a7;
        }


        .empty-icon {

            width: 65px;
            height: 65px;

            margin: 0 auto 15px;

            border-radius: 18px;

            background: #edf4fd;

            color: #4c78a6;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;
        }


        .empty-state h5 {

            color: #36546e;

            font-size: 16px;

            margin-bottom: 5px;
        }


        .empty-state p {

            margin: 0;

            font-size: 12px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .summary-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .status-overview {

                grid-template-columns:
                    repeat(3, 1fr);
            }

        }


        @media (max-width: 991px) {

            .sidebar {

                left: -260px;
            }


            .sidebar.open {

                left: 0;
            }


            .main {

                margin-left: 0;
            }


            .content {

                padding: 22px;
            }


            .navbar-custom {

                padding: 0 20px;
            }

        }


        @media (max-width: 767px) {

            .content {

                padding: 16px;
            }


            .navbar-custom {

                height: 62px;

                padding: 0 15px;
            }


            .profile-name {

                font-size: 13px;
            }


            .profile-role {

                font-size: 10px;
            }


            .page-header {

                align-items: flex-start;

                flex-direction: column;
            }


            .page-title {

                font-size: 22px;
            }


            .summary-grid {

                grid-template-columns: 1fr;
            }


            .status-overview {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .section-header {

                padding: 16px;
            }


            .table-container {

                padding:
                    0 16px 16px;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     STAFF SIDEBAR
========================================================= -->

<aside
    class="sidebar"
    id="sidebar"
>


    <div class="sidebar-header">


        <div class="brand">


            <div class="brand-icon">

                <i class="bi bi-droplet-fill"></i>

            </div>


            <div class="brand-text">

                Water Station

                <small>
                    Staff Panel
                </small>

            </div>


        </div>


        <button
            class="close-sidebar"
            onclick="closeSidebar()"
            title="Close Sidebar"
        >
            ×
        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('staff.dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>



        <!-- PRODUCTS -->

        <a
            href="{{ route('staff.products.index') }}"
        >

            <i class="bi bi-droplet-fill"></i>

            Products

        </a>



        <!-- ORDERS -->

        <a
            href="{{ route('staff.orders.index') }}"
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>



        <!-- DELIVERIES -->

        <a
            href="{{ route('staff.deliveries.index') }}"
            class="active"
        >

            <i class="bi bi-truck"></i>

            Deliveries

        </a>



        <!-- INVENTORY -->

        <a
            href="{{ route('staff.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>



        <!-- ACCOUNT -->

        <div class="menu-title mt-3">

            Account

        </div>



        <!-- MY ACCOUNT -->

        <a
            href="{{ route('staff.account') }}"
        >

            <i class="bi bi-person-circle"></i>

            My Account

        </a>



        <!-- LOGOUT -->

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="m-0"
        >

            @csrf

            <button
                type="submit"
                class="logout-link"
            >

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </button>

        </form>


    </div>

</aside>



<!-- =========================================================
     MAIN
========================================================= -->

<div
    class="main"
    id="main"
>



    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <nav class="navbar-custom">


        <button
            class="menu-btn"
            onclick="openSidebar()"
            title="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>



        <div class="admin-profile">


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



            <div class="profile-info">


                <div class="profile-name">

                    {{ auth()->user()->name }}

                </div>


                <div class="profile-role">

                    {{ auth()->user()->role }}

                </div>


            </div>


        </div>


    </nav>



    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <main class="content">



        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-title-area">


                <div class="page-icon">

                    <i class="bi bi-truck"></i>

                </div>


                <div>


                    <h1 class="page-title">

                        Delivery Management

                    </h1>


                    <p class="page-subtitle">

                        Monitor and manage customer deliveries
                        and order status.

                    </p>


                </div>


            </div>



            <a
                href="{{ route('staff.dashboard') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Dashboard

            </a>


        </div>



        <!-- =================================================
             SUMMARY CARDS
        ================================================== -->

        <div class="summary-grid">



            <!-- TOTAL ORDERS -->

            <div class="summary-card">


                <div class="summary-icon icon-blue">

                    <i class="bi bi-box-seam"></i>

                </div>


                <div>


                    <div class="summary-label">

                        Total Orders

                    </div>


                    <div class="summary-value">

                        {{ $totalOrders }}

                    </div>


                </div>


            </div>



            <!-- ACTIVE DELIVERIES -->

            <div class="summary-card">


                <div class="summary-icon icon-orange">

                    <i class="bi bi-truck"></i>

                </div>


                <div>


                    <div class="summary-label">

                        Active Deliveries

                    </div>


                    <div class="summary-value">

                        {{ $activeDeliveries }}

                    </div>


                </div>


            </div>



            <!-- DELIVERED TODAY -->

            <div class="summary-card">


                <div class="summary-icon icon-green">

                    <i class="bi bi-check-circle"></i>

                </div>


                <div>


                    <div class="summary-label">

                        Delivered Today

                    </div>


                    <div class="summary-value">

                        {{ $deliveredToday }}

                    </div>


                </div>


            </div>



            <!-- CANCELLED -->

            <div class="summary-card">


                <div class="summary-icon icon-red">

                    <i class="bi bi-x-circle"></i>

                </div>


                <div>


                    <div class="summary-label">

                        Cancelled Orders

                    </div>


                    <div class="summary-value">

                        {{ $cancelledOrders }}

                    </div>


                </div>


            </div>


        </div>



        <!-- =================================================
             DELIVERY STATUS OVERVIEW
        ================================================== -->

        <div class="section-card">


            <div class="section-header">


                <h2 class="section-title">

                    <i class="bi bi-bar-chart-line"></i>

                    Delivery Status Overview

                </h2>


            </div>



            <div class="status-overview">



                <!-- PENDING -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $pending }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-pending"
                        ></span>

                        Pending

                    </div>


                </div>



                <!-- CONFIRMED -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $confirmed }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-confirmed"
                        ></span>

                        Confirmed

                    </div>


                </div>



                <!-- PREPARING -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $preparing }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-preparing"
                        ></span>

                        Preparing

                    </div>


                </div>



                <!-- OUT FOR DELIVERY -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $outForDelivery }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-delivery"
                        ></span>

                        Out for Delivery

                    </div>


                </div>



                <!-- DELIVERED -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $delivered }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-delivered"
                        ></span>

                        Delivered

                    </div>


                </div>



                <!-- CANCELLED -->

                <div class="status-box">


                    <div class="status-number">

                        {{ $cancelled }}

                    </div>


                    <div class="status-name">

                        <span
                            class="status-dot dot-cancelled"
                        ></span>

                        Cancelled

                    </div>


                </div>


            </div>

        </div>



        <!-- =================================================
             DELIVERY TABLE
        ================================================== -->

        <div class="section-card">


            <div class="section-header">


                <h2 class="section-title">

                    <i class="bi bi-list-check"></i>

                    Delivery Orders

                </h2>


                <span class="text-muted small">

                    {{ $orders->count() }} orders

                </span>


            </div>



            @if($orders->count() > 0)


                <div class="table-container">


                    <table class="delivery-table">


                        <thead>


                            <tr>


                                <th>
                                    Order ID
                                </th>


                                <th>
                                    Customer
                                </th>


                                <th>
                                    Product
                                </th>


                                <th>
                                    Qty
                                </th>


                                <th>
                                    Total
                                </th>


                                <th>
                                    Delivery Address
                                </th>


                                <th>
                                    Status
                                </th>


                                <th>
                                    Order Date
                                </th>


                            </tr>


                        </thead>



                        <tbody>


                            @foreach($orders as $order)


                                <tr>


                                    <!-- ORDER ID -->

                                    <td>

                                        <span class="order-id">

                                            #{{ $order->id }}

                                        </span>

                                    </td>



                                    <!-- CUSTOMER -->

                                    <td>

                                        <span class="customer-name">

                                            {{ $order->customer_name }}

                                        </span>


                                        @if($order->phone_number)

                                            <span class="customer-phone">

                                                <i class="bi bi-telephone"></i>

                                                {{ $order->phone_number }}

                                            </span>

                                        @endif

                                    </td>



                                    <!-- PRODUCT -->

                                    <td>

                                        <span class="product-name">

                                            {{ $order->product_name }}

                                        </span>

                                    </td>



                                    <!-- QUANTITY -->

                                    <td>

                                        <span class="quantity-badge">

                                            {{ $order->quantity }}

                                        </span>

                                    </td>



                                    <!-- TOTAL -->

                                    <td>

                                        <span class="amount">

                                            ₱{{ number_format($order->total_amount, 2) }}

                                        </span>

                                    </td>



                                    <!-- DELIVERY ADDRESS -->

                                    <td>


                                        @if($order->delivery_address)

                                            <div class="delivery-address">

                                                <i class="bi bi-geo-alt"></i>

                                                {{ $order->delivery_address }}

                                            </div>

                                        @else

                                            <span class="text-muted">

                                                No address

                                            </span>

                                        @endif


                                    </td>



                                    <!-- STATUS -->

                                    <td>


                                        @if($order->status === 'Pending')


                                            <span
                                                class="status-badge status-pending"
                                            >

                                                <i class="bi bi-clock"></i>

                                                Pending

                                            </span>


                                        @elseif($order->status === 'Confirmed')


                                            <span
                                                class="status-badge status-confirmed"
                                            >

                                                <i class="bi bi-check2"></i>

                                                Confirmed

                                            </span>


                                        @elseif($order->status === 'Preparing')


                                            <span
                                                class="status-badge status-preparing"
                                            >

                                                <i class="bi bi-box-seam"></i>

                                                Preparing

                                            </span>


                                        @elseif($order->status === 'Out for Delivery')


                                            <span
                                                class="status-badge status-out"
                                            >

                                                <i class="bi bi-truck"></i>

                                                Out for Delivery

                                            </span>


                                        @elseif($order->status === 'Delivered')


                                            <span
                                                class="status-badge status-delivered"
                                            >

                                                <i class="bi bi-check-circle"></i>

                                                Delivered

                                            </span>


                                        @elseif($order->status === 'Cancelled')


                                            <span
                                                class="status-badge status-cancelled"
                                            >

                                                <i class="bi bi-x-circle"></i>

                                                Cancelled

                                            </span>


                                        @else


                                            <span
                                                class="status-badge status-pending"
                                            >

                                                <i class="bi bi-question-circle"></i>

                                                {{ $order->status }}

                                            </span>


                                        @endif


                                    </td>



                                    <!-- DATE -->

                                    <td>

                                        <span class="order-date">


                                            @if($order->order_date)


                                                {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}


                                            @else


                                                {{ $order->created_at->format('M d, Y') }}


                                            @endif


                                        </span>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>


            @else


                <!-- EMPTY STATE -->

                <div class="empty-state">


                    <div class="empty-icon">

                        <i class="bi bi-truck"></i>

                    </div>


                    <h5>

                        No Delivery Orders Yet

                    </h5>


                    <p>

                        Customer orders will appear here
                        once they are placed.

                    </p>


                </div>


            @endif


        </div>


    </main>


</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>


    function openSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const main =
            document.getElementById('main');


        if (window.innerWidth <= 991) {

            sidebar.classList.add('open');

            sidebar.classList.remove('hidden');

        } else {

            sidebar.classList.remove('hidden');

            main.classList.remove('expanded');

        }

    }



    function closeSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const main =
            document.getElementById('main');


        if (window.innerWidth <= 991) {

            sidebar.classList.remove('open');

        } else {

            sidebar.classList.add('hidden');

            main.classList.add('expanded');

        }

    }



    window.addEventListener(
        'resize',
        function () {

            const sidebar =
                document.getElementById('sidebar');

            const main =
                document.getElementById('main');


            if (window.innerWidth <= 991) {

                sidebar.classList.remove('hidden');

                main.classList.remove('expanded');

            }

        }
    );


</script>


</body>

</html>