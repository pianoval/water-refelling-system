<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard | Water Refilling Station</title>


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


    /* =====================================================
       BODY
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



    /* =====================================================
       SIDEBAR HEADER
    ===================================================== */

    .sidebar-header {

        padding: 25px 20px 20px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        border-bottom:
            1px solid
            rgba(255, 255, 255, .18);

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
            rgba(255, 255, 255, .15);

        border:
            1px solid
            rgba(255, 255, 255, .20);

        border-radius: 13px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

        box-shadow:
            0 5px 15px
            rgba(0, 0, 0, .08);

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

        position: relative;

        z-index: 999999;

        padding: 0;

        margin: 0;

        flex-shrink: 0;

        pointer-events: auto !important;

        opacity: 1 !important;

        visibility: visible !important;

        transition: .2s ease;

    }


    .close-sidebar:hover {

        background: transparent;

        color: #ffffff;

        transform: scale(1.08);

    }


    .close-sidebar:active {

        background: transparent;

        transform: scale(.95);

    }



    /* =====================================================
       SIDEBAR MENU
    ===================================================== */

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
            rgba(
                255,
                255,
                255,
                .88
            );

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
            rgba(
                255,
                255,
                255,
                .17
            );

        color: white;

        transform:
            translateX(2px);

        box-shadow:
            0 4px 12px
            rgba(0, 0, 0, .06);

    }



    /* =====================================================
       LOGOUT
    ===================================================== */

    .logout-link {

        width: 100%;

        display: flex;

        align-items: center;

        gap: 12px;

        color:
            rgba(
                255,
                255,
                255,
                .88
            );

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
            rgba(
                255,
                255,
                255,
                .17
            );

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
            rgba(255, 255, 255, .97);

        border-bottom:
            1px solid
            #d8e5f5;

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 0 28px;

        position: sticky;

        top: 0;

        z-index: 900;

        box-shadow:
            0 3px 15px
            rgba(23, 78, 166, .05);

    }


    .menu-btn {

        border: none;

        background:
            #e8f1ff;

        color: #174ea6;

        font-size: 24px;

        cursor: pointer;

        padding: 5px 9px;

        border-radius: 9px;

        transition: .2s;

    }


    .menu-btn:hover {

        background:
            #d7e6ff;

        transform: scale(1.03);

    }



    /* =====================================================
       ADMIN PROFILE
    ===================================================== */

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

        border:
            2px solid
            #b9d2f5;

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
       WELCOME BANNER
    ===================================================== */

    .welcome-banner {

        min-height: 165px;

        background:
            linear-gradient(
                135deg,
                #0d3b7a 0%,
                #174ea6 48%,
                #2563b8 100%
            );

        color: white;

        border-radius: 22px;

        padding: 40px 42px;

        margin-bottom: 26px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        position: relative;

        overflow: hidden;

        box-shadow:
            0 12px 30px
            rgba(23, 78, 166, .20);

    }


    .welcome-banner::after {

        content: "";

        position: absolute;

        width: 200px;
        height: 200px;

        border-radius: 50%;

        background:
            rgba(
                255,
                255,
                255,
                .08
            );

        right: 30px;

        top: -85px;

    }


    .welcome-banner::before {

        content: "";

        position: absolute;

        width: 140px;
        height: 140px;

        border-radius: 50%;

        background:
            rgba(
                255,
                255,
                255,
                .06
            );

        right: 170px;

        bottom: -80px;

    }


    .welcome-banner h2 {

        margin: 0 0 10px;

        font-size: 30px;

        font-weight: 700;

        position: relative;

        z-index: 2;

    }


    .welcome-banner p {

        margin: 0;

        font-size: 16px;

        opacity: .92;

        position: relative;

        z-index: 2;

    }



    /* =====================================================
       SECTION TITLE
    ===================================================== */

    .section-title {

        font-size: 21px;

        font-weight: 700;

        margin-top: 27px;

        margin-bottom: 14px;

        color: #17457d;

    }



    /* =====================================================
       BOX SPACING
    ===================================================== */

    .row.g-4 {

        --bs-gutter-x: .75rem;

        --bs-gutter-y: .75rem;

    }



    /* =====================================================
       STAT CARDS
    ===================================================== */

    .stat-card {

        position: relative;

        height: 155px;

        overflow: hidden;

        background:
            rgba(
                255,
                255,
                255,
                .98
            );

        border-radius: 18px;

        padding: 22px;

        border:
            1px solid
            #d5e3f5;

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

        transition: .25s;

    }


    .stat-card:hover {

        transform:
            translateY(-3px);

        border-color:
            #b7cef0;

        box-shadow:
            0 12px 26px
            rgba(
                23,
                78,
                166,
                .14
            );

    }


    .stat-card h6 {

        position: relative;

        z-index: 3;

        color: #607c9a;

        font-weight: 600;

        margin: 0;

    }


    .stat-card h2 {

        position: relative;

        z-index: 3;

        font-size: 35px;

        font-weight: bold;

        margin-top: 10px;

        margin-bottom: 0;

        color: #17457d;

    }


    .stat-icon {

        position: absolute;

        right: 20px;

        top: 20px;

        z-index: 3;

        font-size: 35px;

        color: #2563b8;

    }



    /* =====================================================
       CARD FILL
    ===================================================== */

    .card-fill {

        position: absolute;

        left: 0;

        bottom: 0;

        width: 100%;

        height: var(--fill-height);

        background:
            linear-gradient(
                180deg,
                rgba(37, 99, 184, .07),
                rgba(37, 99, 184, .23)
            );

        z-index: 1;

        transition:
            height .5s ease;

    }


    .card-fill::before {

        content: "";

        position: absolute;

        left: -5%;

        top: -10px;

        width: 110%;

        height: 20px;

        background:
            rgba(
                37,
                99,
                184,
                .14
            );

        border-radius: 50%;

    }



    /* =====================================================
       SALES CARDS
       ONLY THIS PART WAS UPDATED
    ===================================================== */

    .sales-card {

        background:
            rgba(
                255,
                255,
                255,
                .98
            );

        border-radius:
            17px;

        padding:
            24px;

        height:
            160px;

        min-height:
            160px;

        border:
            1px solid
            #d5e3f5;

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

        transition:
            .2s;

        overflow:
            visible;

    }


    .sales-card:hover {

        transform:
            translateY(-3px);

        border-color:
            #b7cef0;

        box-shadow:
            0 11px 25px
            rgba(
                23,
                78,
                166,
                .13
            );

    }


    .sales-card i {

        font-size:
            28px;

        color:
            #2563b8;

        display:
            block;

        margin-bottom:
            6px;

    }


    .sales-card small {

        color:
            #7189a3;

        font-size:
            13px;

        display:
            block;

    }


    .sales-card h3 {

        font-weight:
            bold;

        font-size:
            30px;

        margin-top:
            8px;

        margin-bottom:
            0;

        color:
            #17457d;

        line-height:
            1.1;

    }



    /* =====================================================
       INVENTORY
    ===================================================== */

    .inventory-card {

        display:
            block;

        height:
            155px;

        background:
            rgba(
                255,
                255,
                255,
                .98
            );

        border-radius:
            18px;

        padding:
            25px;

        text-decoration:
            none;

        color:
            inherit;

        border:
            1px solid
            #d5e3f5;

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

        transition:
            .25s;

    }


    .inventory-card:hover {

        transform:
            translateY(-4px);

        color:
            inherit;

        border-color:
            #b7cef0;

        box-shadow:
            0 12px 28px
            rgba(
                23,
                78,
                166,
                .14
            );

    }


    .inventory-icon {

        font-size:
            32px;

        color:
            #2563b8;

    }


    .inventory-card h2 {

        font-weight:
            bold;

        margin-top:
            8px;

        margin-bottom:
            3px;

        color:
            #17457d;

    }


    .inventory-card small {

        color:
            #7189a3;

    }



    /* =====================================================
       TABLE
    ===================================================== */

    .table-card {

        background:
            rgba(
                255,
                255,
                255,
                .98
            );

        border-radius:
            18px;

        padding:
            18px;

        border:
            1px solid
            #d5e3f5;

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

        overflow:
            hidden;

    }


    .table-card table {

        margin-bottom:
            0;

    }


    .table-card thead th {

        background:
            #edf4ff;

        color:
            #4f6d8b;

        font-size:
            12px;

        text-transform:
            uppercase;

        letter-spacing:
            .3px;

        font-weight:
            600;

        padding:
            13px;

        border-bottom:
            1px solid
            #d8e5f5;

    }


    .table-card tbody td {

        padding:
            15px 13px;

        font-size:
            13px;

        vertical-align:
            middle;

        color:
            #455f78;

    }


    .table-card tbody tr {

        border-color:
            #e8eff8;

    }


    .table-card tbody tr:hover {

        background:
            #f7faff;

    }



    /* =====================================================
       BADGES
    ===================================================== */

    .badge {

        padding:
            7px 10px;

        border-radius:
            8px;

        font-weight:
            500;

    }



    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 991px) {

        .sidebar {

            left:
                -260px;

        }


        .sidebar.open {

            left:
                0;

        }


        .main {

            margin-left:
                0;

        }


        .content {

            padding:
                22px;

        }


        .navbar-custom {

            padding:
                0 20px;

        }

    }


    @media (max-width: 767px) {

        .content {

            padding:
                16px;

        }


        .navbar-custom {

            height:
                62px;

            padding:
                0 15px;

        }


        .welcome-banner {

            min-height:
                145px;

            padding:
                30px 25px;

            border-radius:
                18px;

        }


        .welcome-banner h2 {

            font-size:
                22px;

        }


        .welcome-banner p {

            font-size:
                14px;

        }


        .stat-card {

            height:
                145px;

        }


        .stat-card h2 {

            font-size:
                28px;

        }


        .section-title {

            font-size:
                18px;

        }


        .profile-name {

            font-size:
                13px;

        }


        .profile-role {

            font-size:
                10px;

        }


        .sales-card {

            height:
                155px;

            min-height:
                155px;

        }

    }

</style>


@php

    /*
    |--------------------------------------------------------------------------
    | Dashboard Percentages
    |--------------------------------------------------------------------------
    */

    $usersFill =
        min(
            max(
                (int) $totalUsers,
                0
            ),
            100
        );


    $productsFill =
        min(
            max(
                (int) $totalProducts,
                0
            ),
            100
        );


    $ordersFill =
        min(
            max(
                (int) $totalOrders,
                0
            ),
            100
        );


    $deliveredFill =
        min(
            max(
                (int) $deliveredOrders,
                0
            ),
            100
        );

@endphp


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside
    class="sidebar"
    id="sidebar"
>


    <!-- SIDEBAR HEADER -->

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


        <!-- X BUTTON -->

        <button
            type="button"
            class="close-sidebar"
            id="closeSidebarBtn"
            title="Close Sidebar"
            aria-label="Close Sidebar"

            onclick="
                if (window.innerWidth <= 991) {
                    document.getElementById('sidebar').classList.remove('open');
                } else {
                    document.getElementById('sidebar').classList.add('hidden');
                    document.getElementById('main').classList.add('expanded');
                }
            "
        >

            ×

        </button>


    </div>



    <!-- SIDEBAR MENU -->

    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('admin.dashboard') }}"
            class="active"
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



        <!-- ACCOUNT -->

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


        <!-- MENU BUTTON -->

        <button
            class="menu-btn"
            id="menuButton"
            type="button"
            title="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>



        <!-- ADMIN PROFILE -->

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


        <!-- WELCOME -->

        <div class="welcome-banner">


            <h2>

                Welcome back,
                {{ auth()->user()->name }}! 👋

            </h2>


            <p>

                Here's what's happening in your
                water refilling station today.

            </p>


        </div>



        <!-- OVERVIEW -->

        <div class="section-title">

            Overview

        </div>



        <div class="row g-4">


            <!-- TOTAL USERS -->

            <div class="col-md-6 col-xl-3">


                <div
                    class="stat-card"
                    style="
                        --fill-height:
                        {{ $usersFill }}%;
                    "
                >


                    <div class="card-fill"></div>


                    <div class="stat-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <h6>

                        Total Users

                    </h6>


                    <h2>

                        {{ $totalUsers }}

                    </h2>


                </div>


            </div>



            <!-- TOTAL PRODUCTS -->

            <div class="col-md-6 col-xl-3">


                <div
                    class="stat-card"
                    style="
                        --fill-height:
                        {{ $productsFill }}%;
                    "
                >


                    <div class="card-fill"></div>


                    <div class="stat-icon">

                        <i class="bi bi-droplet-fill"></i>

                    </div>


                    <h6>

                        Total Products

                    </h6>


                    <h2>

                        {{ $totalProducts }}

                    </h2>


                </div>


            </div>



            <!-- TOTAL ORDERS -->

            <div class="col-md-6 col-xl-3">


                <div
                    class="stat-card"
                    style="
                        --fill-height:
                        {{ $ordersFill }}%;
                    "
                >


                    <div class="card-fill"></div>


                    <div class="stat-icon">

                        <i class="bi bi-cart3"></i>

                    </div>


                    <h6>

                        Total Orders

                    </h6>


                    <h2>

                        {{ $totalOrders }}

                    </h2>


                </div>


            </div>



            <!-- DELIVERED ORDERS -->

            <div class="col-md-6 col-xl-3">


                <div
                    class="stat-card"
                    style="
                        --fill-height:
                        {{ $deliveredFill }}%;
                    "
                >


                    <div class="card-fill"></div>


                    <div class="stat-icon">

                        <i class="bi bi-check-circle"></i>

                    </div>


                    <h6>

                        Delivered Orders

                    </h6>


                    <h2>

                        {{ $deliveredOrders }}

                    </h2>


                </div>


            </div>


        </div>



        <!-- SALES & REVENUE ANALYTICS -->

        <div class="section-title">

            Sales & Revenue Analytics

        </div>



        <!-- ONLY THIS ROW WAS CHANGED -->

        <div class="row gx-3 gy-4">



            <!-- TOTAL REVENUE -->

            <div class="col-md-4">


                <div class="sales-card">


                    <i class="bi bi-cash-stack"></i>


                    <small class="d-block">

                        Total Revenue

                    </small>


                    <h3>

                        ₱{{
                            number_format(
                                $totalRevenue,
                                2
                            )
                        }}

                    </h3>


                </div>


            </div>



            <!-- WATER UNITS SOLD -->

            <div class="col-md-4">


                <div class="sales-card">


                    <i class="bi bi-droplet-fill"></i>


                    <small class="d-block">

                        Water Units Sold

                    </small>


                    <h3>

                        {{
                            number_format(
                                $waterUnitsSold
                            )
                        }}

                    </h3>


                </div>


            </div>



            <!-- AVERAGE ORDER VALUE -->

            <div class="col-md-4">


                <div class="sales-card">


                    <i class="bi bi-receipt"></i>


                    <small class="d-block">

                        Average Order Value

                    </small>


                    <h3>

                        ₱{{
                            number_format(
                                $averageOrderValue,
                                2
                            )
                        }}

                    </h3>


                </div>


            </div>


        </div>



        <!-- INVENTORY OVERVIEW -->

        <div class="section-title">

            Inventory Overview

        </div>



        <div class="row g-4">


            <!-- TOTAL STOCK -->

            <div class="col-md-4">


                <a
                    href="{{ route('admin.inventory.index') }}"
                    class="inventory-card"
                >


                    <i class="bi bi-boxes inventory-icon"></i>


                    <h2>

                        {{
                            number_format(
                                $totalStock
                            )
                        }}

                    </h2>


                    <small>

                        Total Stock

                    </small>


                </a>


            </div>



            <!-- LOW STOCK -->

            <div class="col-md-4">


                <a
                    href="{{ route('admin.inventory.index') }}"
                    class="inventory-card"
                >


                    <i class="bi bi-exclamation-triangle inventory-icon"></i>


                    <h2>

                        {{ $lowStock }}

                    </h2>


                    <small>

                        Low Stock

                    </small>


                </a>


            </div>



            <!-- OUT OF STOCK -->

            <div class="col-md-4">


                <a
                    href="{{ route('admin.inventory.index') }}"
                    class="inventory-card"
                >


                    <i class="bi bi-x-circle inventory-icon"></i>


                    <h2>

                        {{ $outOfStock }}

                    </h2>


                    <small>

                        Out of Stock

                    </small>


                </a>


            </div>


        </div>



        <!-- RECENT ORDERS -->

        <div class="section-title">

            Recent Orders

        </div>



        <div class="table-card">


            <div class="table-responsive">


                <table class="table align-middle">


                    <thead>


                        <tr>

                            <th>

                                Customer

                            </th>

                            <th>

                                Product

                            </th>

                            <th>

                                Quantity

                            </th>

                            <th>

                                Total

                            </th>

                            <th>

                                Status

                            </th>

                        </tr>


                    </thead>



                    <tbody>


                        @forelse(
                            $recentOrders
                            as $order
                        )


                            @php

                                $status =
                                    strtolower(
                                        trim(
                                            $order->status
                                            ??
                                            'pending'
                                        )
                                    );

                            @endphp


                            <tr>


                                <!-- CUSTOMER -->

                                <td>

                                    {{ $order->customer_name }}

                                </td>



                                <!-- PRODUCT -->

                                <td>

                                    {{ $order->product_name }}

                                </td>



                                <!-- QUANTITY -->

                                <td>

                                    {{ $order->quantity }}

                                </td>



                                <!-- TOTAL -->

                                <td>

                                    ₱{{
                                        number_format(
                                            $order->total_amount ?? 0,
                                            2
                                        )
                                    }}

                                </td>



                                <!-- STATUS -->

                                <td>


                                    @if(
                                        $status ===
                                        'delivered'
                                    )

                                        <span
                                            class="badge bg-success"
                                        >

                                            Delivered

                                        </span>


                                    @elseif(
                                        $status ===
                                        'confirmed'
                                    )

                                        <span
                                            class="badge bg-primary"
                                        >

                                            Confirmed

                                        </span>


                                    @elseif(
                                        $status ===
                                        'preparing'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-info
                                                text-dark
                                            "
                                        >

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
                                                badge
                                                bg-info
                                            "
                                        >

                                            Out for Delivery

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
                                                badge
                                                bg-danger
                                            "
                                        >

                                            Cancelled

                                        </span>


                                    @else

                                        <span
                                            class="
                                                badge
                                                bg-warning
                                                text-dark
                                            "
                                        >

                                            Pending

                                        </span>

                                    @endif


                                </td>


                            </tr>


                        @empty


                            <tr>


                                <td
                                    colspan="5"
                                    class="
                                        text-center
                                        text-muted
                                        py-4
                                    "
                                >

                                    No orders yet.

                                </td>


                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </main>


</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

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