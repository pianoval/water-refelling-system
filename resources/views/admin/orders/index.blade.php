
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Orders | Admin | Water Station
    </title>


    <!-- Bootstrap 5 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


<style>

    * {
        box-sizing: border-box;
    }

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
        z-index: 3000;
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
        width: 30px;
        height: 30px;
        border: none;
        background: transparent;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        font-size: 26px;
        font-weight: 400;
        line-height: 1;
        cursor: pointer;
        padding: 0;
        margin: 0;
        transition: .2s ease;
    }

    .close-sidebar:hover {
        color: #ffffff;
        transform: scale(1.08);
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

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255,255,255,.88);
        text-decoration: none;
        padding: 11px 13px;
        border-radius: 11px;
        margin-bottom: 5px;
        font-size: 14px;
        transition: .2s;
        cursor: pointer;
    }

    .sidebar-menu a i {
        width: 20px;
        text-align: center;
        font-size: 17px;
    }

    .sidebar-menu a:hover,
    .sidebar-menu a.active {
        background:
            rgba(255,255,255,.17);
        color: white;
        transform: translateX(2px);
        box-shadow:
            0 4px 12px
            rgba(0,0,0,.06);
    }

    .logout-link {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255,255,255,.88);
        background: transparent;
        border: none;
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
        transform: translateX(2px);
    }

    .main {
        margin-left: 260px;
        min-height: 100vh;
        transition: .3s ease;
    }

    .main.expanded {
        margin-left: 0;
    }

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
        z-index: 1500;
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
        border: 1px solid #bdd4f5;
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

    .content {
        padding: 28px;
    }

    .orders-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .page-heading {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .orders-title-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #dceaff
            );
        color: #174ea6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        border: 1px solid #d5e5f8;
        box-shadow:
            0 4px 14px
            rgba(23,78,166,.06);
    }

    .page-title h1 {
        margin: 0;
        color: #183b5b;
        font-size: 28px;
        font-weight: 700;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-bottom: 25px;
    }

    .summary-card {
        position: relative;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #dce8f5;
        border-radius: 16px;
        min-height: 125px;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow:
            0 5px 18px
            rgba(23,78,166,.055);
        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 85px;
        height: 85px;
        border-radius: 50%;
        right: -32px;
        top: -32px;
        background: #f3f7ff;
        pointer-events: none;
    }

    .summary-card:hover {
        transform: translateY(-3px);
        border-color: #cbdced;
        box-shadow:
            0 9px 23px
            rgba(23,78,166,.09);
    }

    .summary-icon {
        position: relative;
        z-index: 2;
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .summary-icon.total {
        background: #e8f1ff;
        color: #174ea6;
    }

    .summary-icon.pending {
        background: #fff5df;
        color: #c47a00;
    }

    .summary-icon.processing {
        background: #e8f1ff;
        color: #2563b8;
    }

    .summary-icon.delivered {
        background: #e9f8ef;
        color: #198754;
    }

    .summary-card-content {
        position: relative;
        z-index: 2;
    }

    .summary-label {
        color: #71869a;
        font-size: 10px;
        font-weight: 700;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .summary-value {
        color: #183b5b;
        font-size: 28px;
        font-weight: 800;
        line-height: 1;
    }

    .orders-card {
        background:
            rgba(255,255,255,.98);
        border: 1px solid #dce8f5;
        border-radius: 18px;
        box-shadow:
            0 5px 22px
            rgba(23,78,166,.06);
        overflow: hidden;
    }

    .orders-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e3edf7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .orders-card-header h2 {
        margin: 0;
        color: #183b5b;
        font-size: 18px;
        font-weight: 700;
    }

    .orders-card-header p {
        margin: 4px 0 0;
        color: #71869a;
        font-size: 12px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .orders-table {
        width: 100%;
        min-width: 950px;
        border-collapse: collapse;
    }

    .orders-table thead th {
        background: #f5f9ff;
        color: #56718b;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 14px 17px;
        border-bottom: 1px solid #dce8f5;
        white-space: nowrap;
    }

    .orders-table tbody td {
        padding: 15px 17px;
        border-bottom: 1px solid #edf2f7;
        color: #36536d;
        font-size: 13px;
        vertical-align: middle;
    }

    .orders-table tbody tr {
        transition: .15s ease;
    }

    .orders-table tbody tr:hover {
        background: #f8fbff;
    }

    .orders-table tbody tr:last-child td {
        border-bottom: none;
    }

    .order-id {
        color: #174ea6;
        font-weight: 700;
        white-space: nowrap;
    }

    .customer-name {
        color: #183b5b;
        font-weight: 700;
        font-size: 13px;
    }

    .quantity {
        color: #183b5b;
        font-weight: 600;
    }

    .amount {
        color: #174ea6;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-badge i {
        font-size: 7px;
    }

    .status-pending {
        background: #fff5df;
        color: #c47a00;
    }

    .status-confirmed {
        background: #e8f1ff;
        color: #2563b8;
    }

    .status-preparing {
        background: #eef0ff;
        color: #5157a6;
    }

    .status-delivery {
        background: #e8f7fb;
        color: #087f9c;
    }

    .status-delivered {
        background: #e9f8ef;
        color: #198754;
    }

    .status-cancelled {
        background: #ffe9e9;
        color: #dc3545;
    }

    .order-date {
        color: #71869a;
        font-size: 12px;
        white-space: nowrap;
    }

    .empty-state {
        text-align: center;
        padding: 65px 20px;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: #e8f1ff;
        color: #174ea6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        font-size: 29px;
    }

    .empty-state h3 {
        color: #183b5b;
        font-size: 18px;
        margin: 0 0 7px;
    }

    .empty-state p {
        color: #71869a;
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 1100px) {

        .summary-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
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

        .page-title h1 {
            font-size: 23px;
        }

        .orders-title-icon {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .summary-card {
            min-height: 112px;
        }

        .summary-value {
            font-size: 26px;
        }

        .orders-card-header {
            flex-direction: column;
            align-items: flex-start;
        }

    }

    @media (max-width: 576px) {

        .profile-info {
            display: none;
        }

    }

</style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

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
                    Admin Panel
                </small>

            </div>


        </div>


        <button
            type="button"
            class="close-sidebar"
            id="closeSidebarBtn"
            title="Close Sidebar"
            aria-label="Close Sidebar"
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
            href="{{ route('admin.dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('admin.users.index') }}"
        >

            <i class="bi bi-people"></i>

            User Management

        </a>


        <!-- ORDERS -->

        <a
            href="{{ route('admin.orders.index') }}"
            class="active"
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>


        <!-- INVENTORY -->

        <a
            href="{{ route('admin.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>


        <!-- REPORTS -->

        <a
            href="{{ route('admin.reports') }}"
        >

            <i class="bi bi-bar-chart"></i>

            Reports & Analytics

        </a>


        <div class="menu-title mt-3">

            Account

        </div>


        <!-- MY ACCOUNT -->

        <a
            href="{{ route('admin.account') }}"
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



<!-- =====================================================
     MAIN
===================================================== -->

<div
    class="main"
    id="main"
>


    <!-- NAVBAR -->

    <nav class="navbar-custom">


        <button
            type="button"
            class="menu-btn"
            id="menuButton"
            title="Open Sidebar"
            aria-label="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>


        <div class="admin-profile">


            @if(
                auth()->user()->profile_picture
            )

                <img
                    src="{{ asset(
                        'storage/' .
                        auth()->user()->profile_picture
                    ) }}"
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



    <!-- CONTENT -->

    <main class="content">


        <div class="orders-page">


            <!-- PAGE HEADER -->

            <div class="page-header">


                <div class="page-heading">


                    <div class="orders-title-icon">

                        <i class="bi bi-cart3"></i>

                    </div>


                    <div class="page-title">

                        <h1>

                            Orders

                        </h1>

                    </div>


                </div>


            </div>



            <!-- SUMMARY CARDS -->

            <div class="summary-grid">


                <!-- TOTAL -->

                <div class="summary-card">

                    <div class="summary-icon total">

                        <i class="bi bi-cart-check"></i>

                    </div>


                    <div class="summary-card-content">

                        <div class="summary-label">
                            Total Orders
                        </div>


                        <div class="summary-value">

                            {{ $totalOrders }}

                        </div>

                    </div>

                </div>



                <!-- PENDING -->

                <div class="summary-card">

                    <div class="summary-icon pending">

                        <i class="bi bi-hourglass-split"></i>

                    </div>


                    <div class="summary-card-content">

                        <div class="summary-label">
                            Pending
                        </div>


                        <div class="summary-value">

                            {{ $pendingOrders }}

                        </div>

                    </div>

                </div>



                <!-- PROCESSING -->

                <div class="summary-card">

                    <div class="summary-icon processing">

                        <i class="bi bi-arrow-repeat"></i>

                    </div>


                    <div class="summary-card-content">

                        <div class="summary-label">
                            Processing
                        </div>


                        <div class="summary-value">

                            {{ $processingOrders }}

                        </div>

                    </div>

                </div>



                <!-- DELIVERED -->

                <div class="summary-card">

                    <div class="summary-icon delivered">

                        <i class="bi bi-check-circle"></i>

                    </div>


                    <div class="summary-card-content">

                        <div class="summary-label">
                            Delivered
                        </div>


                        <div class="summary-value">

                            {{ $deliveredOrders }}

                        </div>

                    </div>

                </div>


            </div>



            <!-- ORDERS CARD -->

            <div class="orders-card">


                <div class="orders-card-header">

                    <div>

                        <h2>
                            Customer Orders
                        </h2>


                        <p>
                            View and monitor all customer orders.
                        </p>

                    </div>

                </div>



                @if($orders->count() > 0)


                    <div class="table-wrapper">

                        <table class="orders-table">


                            <thead>

                                <tr>

                                    <th>
                                        Order ID
                                    </th>

                                    <th>
                                        Customer
                                    </th>

                                    <th>
                                        Quantity
                                    </th>

                                    <th>
                                        Total Amount
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Date
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach($orders as $order)


                                    @php

                                        $status = strtolower(
                                            trim(
                                                $order->status ?? 'pending'
                                            )
                                        );

                                    @endphp


                                    <tr>


                                        <td>

                                            <span class="order-id">

                                                #{{ $order->id }}

                                            </span>

                                        </td>


                                        <td>

                                            <div class="customer-name">

                                                {{ $order->customer_name }}

                                            </div>

                                        </td>


                                        <td>

                                            <span class="quantity">

                                                {{ $order->quantity }}

                                            </span>

                                        </td>


                                        <td>

                                            <span class="amount">

                                                ₱{{
                                                    number_format(
                                                        $order->total_amount ?? 0,
                                                        2
                                                    )
                                                }}

                                            </span>

                                        </td>


                                        <td>


                                            @if(
                                                $status === 'pending'
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-pending
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Pending

                                                </span>


                                            @elseif(
                                                $status === 'confirmed'
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-confirmed
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Confirmed

                                                </span>


                                            @elseif(
                                                $status === 'preparing'
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-preparing
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Preparing

                                                </span>


                                            @elseif(
                                                in_array(
                                                    $status,
                                                    [
                                                        'out_for_delivery',
                                                        'out for delivery',
                                                        'out'
                                                    ]
                                                )
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-delivery
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Out for Delivery

                                                </span>


                                            @elseif(
                                                $status === 'delivered'
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-delivered
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Delivered

                                                </span>


                                            @elseif(
                                                in_array(
                                                    $status,
                                                    [
                                                        'cancelled',
                                                        'canceled'
                                                    ]
                                                )
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-cancelled
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    Cancelled

                                                </span>


                                            @else

                                                <span
                                                    class="
                                                        status-badge
                                                        status-pending
                                                    "
                                                >

                                                    <i class="bi bi-circle-fill"></i>

                                                    {{
                                                        ucfirst(
                                                            str_replace(
                                                                '_',
                                                                ' ',
                                                                $status
                                                            )
                                                        )
                                                    }}

                                                </span>

                                            @endif


                                        </td>


                                        <td>

                                            <span class="order-date">

                                                {{
                                                    $order->created_at
                                                        ? $order->created_at->format(
                                                            'M d, Y h:i A'
                                                        )
                                                        : '—'
                                                }}

                                            </span>

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>

                    </div>


                @else


                    <div class="empty-state">


                        <div class="empty-icon">

                            <i class="bi bi-cart-x"></i>

                        </div>


                        <h3>

                            No Orders Found

                        </h3>


                        <p>

                            There are currently no customer orders.

                        </p>


                    </div>


                @endif


            </div>


        </div>


    </main>


</div>



<!-- JAVASCRIPT -->

<script>

    const sidebar =
        document.getElementById(
            'sidebar'
        );


    const main =
        document.getElementById(
            'main'
        );


    const menuButton =
        document.getElementById(
            'menuButton'
        );


    const closeSidebarBtn =
        document.getElementById(
            'closeSidebarBtn'
        );


    function openSidebar() {

        if (
            window.innerWidth <= 991
        ) {

            sidebar.classList.add(
                'open'
            );

            sidebar.classList.remove(
                'hidden'
            );

        } else {

            sidebar.classList.remove(
                'hidden'
            );

            main.classList.remove(
                'expanded'
            );

        }

    }


    function closeSidebar() {

        if (
            window.innerWidth <= 991
        ) {

            sidebar.classList.remove(
                'open'
            );

        } else {

            sidebar.classList.add(
                'hidden'
            );

            main.classList.add(
                'expanded'
            );

        }

    }


    if (
        menuButton
    ) {

        menuButton.addEventListener(
            'click',
            function () {

                openSidebar();

            }
        );

    }


    if (
        closeSidebarBtn
    ) {

        closeSidebarBtn.addEventListener(
            'click',
            function () {

                closeSidebar();

            }
        );

    }


    window.addEventListener(
        'resize',
        function () {

            if (
                window.innerWidth > 991
            ) {

                sidebar.classList.remove(
                    'open'
                );

            }

        }
    );

</script>


</body>

</html>



