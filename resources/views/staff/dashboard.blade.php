<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Staff Dashboard | Water Station
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

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f2fbfa 0%,
                    #f7fcfc 50%,
                    #e9f6f5 100%
                );

            color:
                #234344;

            min-height:
                100vh;

            overflow-x:
                hidden;

        }



        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position:
                fixed;

            top:
                0;

            left:
                0;

            width:
                260px;

            height:
                100vh;

            background:
                linear-gradient(
                    180deg,
                    #0b4f50 0%,
                    #126968 48%,
                    #18817d 100%
                );

            color:
                #ffffff;

            z-index:
                3000;

            overflow-y:
                auto;

            transition:
                .3s ease;

            box-shadow:
                6px 0 22px
                rgba(0,78,79,.16);

        }


        .sidebar.hidden {

            left:
                -260px;

        }


        .sidebar-header {

            height:
                70px;

            padding:
                0 18px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            border-bottom:
                1px solid
                rgba(255,255,255,.16);

        }


        .brand {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            color:
                #ffffff;

            font-size:
                17px;

            font-weight:
                700;

        }


        .brand-icon {

            width:
                40px;

            height:
                40px;

            border-radius:
                12px;

            background:
                rgba(255,255,255,.14);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border:
                1px solid
                rgba(255,255,255,.18);

            font-size:
                20px;

        }


        .close-sidebar {

            width:
                34px;

            height:
                34px;

            border:
                none;

            background:
                transparent;

            color:
                #ffffff;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            cursor:
                pointer;

            font-size:
                19px;

        }


        .close-sidebar:hover {

            background:
                rgba(255,255,255,.10);

            border-radius:
                8px;

        }


        .sidebar-menu {

            padding:
                18px 12px;

        }


        .menu-title {

            padding:
                8px 12px;

            margin-bottom:
                5px;

            color:
                rgba(255,255,255,.58);

            font-size:
                10px;

            text-transform:
                uppercase;

            letter-spacing:
                1px;

        }


        .sidebar a {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                11px 13px;

            margin-bottom:
                5px;

            border-radius:
                10px;

            color:
                rgba(255,255,255,.88);

            text-decoration:
                none;

            font-size:
                14px;

            font-weight:
                600;

            transition:
                .2s ease;

        }


        .sidebar a i {

            width:
                20px;

            text-align:
                center;

            font-size:
                17px;

        }


        .sidebar a:hover,
        .sidebar a.active {

            background:
                rgba(255,255,255,.15);

            color:
                #ffffff;

            transform:
                translateX(2px);

        }


        .logout-link {

            width:
                100%;

            border:
                none;

            background:
                transparent;

            color:
                rgba(255,255,255,.88);

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                11px 13px;

            border-radius:
                10px;

            font-size:
                14px;

            font-weight:
                600;

            text-align:
                left;

            cursor:
                pointer;

        }


        .logout-link:hover {

            background:
                rgba(255,255,255,.15);

            color:
                #ffffff;

        }


        .logout-link i {

            width:
                20px;

            text-align:
                center;

            font-size:
                17px;

        }



        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left:
                260px;

            min-height:
                100vh;

            transition:
                .3s ease;

        }


        .main.expanded {

            margin-left:
                0;

        }



        /* =====================================================
           TOPBAR
           CLEAN TOPBAR
           Removed:
           Staff Dashboard
           Water Refilling Station
        ===================================================== */

        .topbar {

            height:
                68px;

            background:
                rgba(255,255,255,.97);

            border-bottom:
                1px solid #d8eceb;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            padding:
                0 28px;

            position:
                sticky;

            top:
                0;

            z-index:
                2500;

            box-shadow:
                0 3px 15px
                rgba(0,100,100,.05);

        }


        .topbar-left {

            display:
                flex;

            align-items:
                center;

        }


        .menu-btn {

            width:
                42px;

            height:
                42px;

            border:
                none;

            border-radius:
                9px;

            background:
                #e2f5f3;

            color:
                #08716e;

            font-size:
                21px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            cursor:
                pointer;

            transition:
                .2s ease;

        }


        .menu-btn:hover {

            background:
                #d2efec;

            transform:
                scale(1.03);

        }


        .profile {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

        }


        .profile-image,
        .profile-placeholder {

            width:
                38px;

            height:
                38px;

            border-radius:
                50%;

        }


        .profile-image {

            object-fit:
                cover;

            border:
                2px solid #b9dfdc;

        }


        .profile-placeholder {

            background:
                #e0f3f1;

            color:
                #08716e;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                18px;

        }


        .profile-name {

            margin:
                0;

            font-size:
                13px;

            font-weight:
                700;

            color:
                #234344;

        }


        .profile-role {

            margin:
                2px 0 0;

            color:
                #08716e;

            font-size:
                10px;

        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding:
                14px 26px 26px;

        }



        /* =====================================================
           WELCOME
        ===================================================== */

        .welcome-banner {

            min-height:
                165px;

            background:
                linear-gradient(
                    135deg,
                    #0b4f50 0%,
                    #126968 48%,
                    #18817d 100%
                );

            color:
                white;

            border-radius:
                22px;

            padding:
                40px 42px;

            margin-bottom:
                26px;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                center;

            position:
                relative;

            overflow:
                hidden;

            box-shadow:
                0 12px 30px
                rgba(0,90,90,.18);

        }


        .welcome-banner::after {

            content:
                "";

            position:
                absolute;

            width:
                200px;

            height:
                200px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.08);

            right:
                30px;

            top:
                -85px;

        }


        .welcome-banner::before {

            content:
                "";

            position:
                absolute;

            width:
                140px;

            height:
                140px;

            border-radius:
                50%;

            background:
                rgba(255,255,255,.06);

            right:
                170px;

            bottom:
                -80px;

        }


        .welcome-banner h2 {

            margin:
                0 0 10px;

            font-size:
                30px;

            font-weight:
                700;

            position:
                relative;

            z-index:
                2;

        }


        .welcome-banner p {

            margin:
                0;

            font-size:
                15px;

            opacity:
                .92;

            position:
                relative;

            z-index:
                2;

        }



        /* =====================================================
           SECTION TITLE
        ===================================================== */

        .section-title {

            font-size:
                21px;

            font-weight:
                700;

            margin-top:
                27px;

            margin-bottom:
                14px;

            color:
                #126968;

        }



        /* =====================================================
           STAT CARD
        ===================================================== */

        .stat-card {

            position:
                relative;

            height:
                155px;

            overflow:
                hidden;

            background:
                rgba(255,255,255,.98);

            border-radius:
                18px;

            padding:
                22px;

            border:
                1px solid
                #d5e8e6;

            box-shadow:
                0 6px 18px
                rgba(0,90,90,.08);

            transition:
                .25s;

        }


        .stat-card:hover {

            transform:
                translateY(-3px);

            border-color:
                #add7d3;

            box-shadow:
                0 12px 26px
                rgba(0,90,90,.13);

        }


        .stat-card h6 {

            position:
                relative;

            z-index:
                3;

            color:
                #668282;

            font-weight:
                600;

            margin:
                0;

        }


        .stat-card h2 {

            position:
                relative;

            z-index:
                3;

            font-size:
                35px;

            font-weight:
                700;

            margin-top:
                10px;

            margin-bottom:
                0;

            color:
                #126968;

        }


        .stat-icon {

            position:
                absolute;

            right:
                20px;

            top:
                20px;

            z-index:
                3;

            font-size:
                35px;

            color:
                #18817d;

        }


        .card-fill {

            position:
                absolute;

            left:
                0;

            bottom:
                0;

            width:
                100%;

            height:
                var(--fill-height);

            background:
                linear-gradient(
                    180deg,
                    rgba(24,129,125,.07),
                    rgba(24,129,125,.20)
                );

            z-index:
                1;

        }


        .card-fill::before {

            content:
                "";

            position:
                absolute;

            left:
                -5%;

            top:
                -10px;

            width:
                110%;

            height:
                20px;

            background:
                rgba(24,129,125,.12);

            border-radius:
                50%;

        }



        /* =====================================================
           TABLE
        ===================================================== */

        .table-card {

            background:
                rgba(255,255,255,.98);

            border-radius:
                18px;

            padding:
                18px;

            border:
                1px solid
                #d5e8e6;

            box-shadow:
                0 6px 18px
                rgba(0,90,90,.08);

            overflow:
                hidden;

        }


        .table-card table {

            margin-bottom:
                0;

        }


        .table-card thead th {

            background:
                #eaf7f6;

            color:
                #567575;

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
                1px solid #d8ecea;

        }


        .table-card tbody td {

            padding:
                15px 13px;

            font-size:
                13px;

            vertical-align:
                middle;

            color:
                #526f6f;

        }


        .table-card tbody tr {

            border-color:
                #e8f0ef;

        }


        .table-card tbody tr:hover {

            background:
                #f7fbfb;

        }


        .badge {

            padding:
                7px 10px;

            border-radius:
                8px;

            font-weight:
                500;

        }



        /* =====================================================
           RESPONSIVE
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
                    14px 22px 22px;

            }


            .topbar {

                padding:
                    0 20px;

            }

        }


        @media (max-width: 767px) {

            .content {

                padding:
                    14px 16px 16px;

            }


            .topbar {

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
                    13px;

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

        }


        @media (max-width: 576px) {

            .content {

                padding:
                    12px 12px 16px;

            }


            .profile-name,
            .profile-role {

                display:
                    none;

            }

        }

    </style>

</head>


<body>


@php

    $ordersFill =
        min(
            max(
                (int) $totalOrders,
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

@endphp



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


            <div>

                Water Station

            </div>

        </div>


        <button
            type="button"
            class="close-sidebar"
            id="closeSidebar"
            title="Close Sidebar"
        >

            <i class="bi bi-x-lg"></i>

        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>


        <!-- DASHBOARD -->

        <a
            href="{{ route('staff.dashboard') }}"
            class="active"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- ORDERS -->

        <a
            href="{{ route('staff.orders.index') }}"
        >

            <i class="bi bi-cart-check-fill"></i>

            Orders

        </a>


        <!-- PRODUCTS -->

        <a
            href="{{ route('staff.products.index') }}"
        >

            <i class="bi bi-droplet-fill"></i>

            Products

        </a>


        <!-- INVENTORY -->

        <a
            href="{{ route('staff.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>


        <!-- DELIVERIES -->

        <a
            href="{{ route('staff.deliveries.index') }}"
        >

            <i class="bi bi-truck"></i>

            Deliveries

        </a>


        <!-- EMAIL NOTIFICATIONS -->

<a
    href="{{ route('staff.emails.create') }}"
    class="{{ request()->routeIs('staff.emails.*') ? 'active' : '' }}"
>

    <i class="bi bi-envelope-fill"></i>

    Email Notifications

</a>


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



<!-- =====================================================
     MAIN
===================================================== -->

<div
    class="main"
    id="main"
>


    <!-- =================================================
         TOPBAR
         CLEAN TOPBAR
    ================================================= -->

    <nav class="topbar">


        <div class="topbar-left">


            <button
                type="button"
                class="menu-btn"
                id="menuButton"
                title="Open Sidebar"
            >

                <i class="bi bi-list"></i>

            </button>


        </div>



        <!-- PROFILE -->

        <div class="profile">


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


            <div>

                <p class="profile-name">

                    {{ auth()->user()->name }}

                </p>


                <p class="profile-role">

                    Staff

                </p>

            </div>


        </div>


    </nav>



    <!-- =================================================
         CONTENT
    ================================================= -->

    <main class="content">


        <!-- WELCOME -->

        <div class="welcome-banner">


            <h2>

                Welcome back,
                {{ auth()->user()->name }}! 💧

            </h2>


            <p>

                Manage customer orders,
                products, inventory, and deliveries
                from here.

            </p>


        </div>



        <!-- OVERVIEW -->

        <div class="section-title">

            Overview

        </div>



        <div class="row g-4">


            <!-- TOTAL ORDERS -->

            <div class="col-md-6">


                <div
                    class="stat-card"
                    style="
                        --fill-height:
                        {{ $ordersFill }}%;
                    "
                >

                    <div class="card-fill"></div>


                    <div class="stat-icon">

                        <i class="bi bi-cart-check-fill"></i>

                    </div>


                    <h6>

                        Total Orders

                    </h6>


                    <h2>

                        {{ $totalOrders }}

                    </h2>

                </div>


            </div>



            <!-- TOTAL PRODUCTS -->

            <div class="col-md-6">


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


        </div>



        <!-- RECENT ORDERS -->

        <div class="section-title">

            Recent Orders

        </div>



        <div class="table-card">


            <div class="table-responsive">


                <table
                    class="table align-middle"
                >


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


                                <td>

                                    {{ $order->customer_name }}

                                </td>


                                <td>

                                    {{ $order->product_name }}

                                </td>


                                <td>

                                    {{ $order->quantity }}

                                </td>


                                <td>

                                    ₱{{
                                        number_format(
                                            $order->total_amount
                                            ??
                                            $order->total_price
                                            ??
                                            0,
                                            2
                                        )
                                    }}

                                </td>


                                <td>


                                    @if(
                                        $status === 'delivered'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-success
                                            "
                                        >

                                            Delivered

                                        </span>


                                    @elseif(
                                        $status === 'confirmed'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-primary
                                            "
                                        >

                                            Confirmed

                                        </span>


                                    @elseif(
                                        $status === 'preparing'
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
                                        $status === 'out for delivery'
                                        ||
                                        $status === 'out_for_delivery'
                                        ||
                                        $status === 'out'
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
                                        $status === 'cancelled'
                                        ||
                                        $status === 'canceled'
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


    const closeSidebar =
        document.getElementById(
            'closeSidebar'
        );


    if (menuButton) {

        menuButton.addEventListener(
            'click',
            function () {

                if (
                    window.innerWidth <= 991
                ) {

                    sidebar.classList.add(
                        'open'
                    );

                } else {

                    sidebar.classList.toggle(
                        'hidden'
                    );

                    main.classList.toggle(
                        'expanded'
                    );

                }

            }
        );

    }


    if (closeSidebar) {

        closeSidebar.addEventListener(
            'click',
            function () {

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