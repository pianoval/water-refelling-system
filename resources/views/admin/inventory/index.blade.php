<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Inventory | Admin | Water Station
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


    /* =====================================================
       BODY
    ===================================================== */

    body {

        margin: 0;

        font-family:
            "Segoe UI",
            sans-serif;

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

        z-index: 3000;

        overflow-y: auto;

        transition: .3s ease;

        box-shadow:
            6px 0 25px
            rgba(23,78,166,.18);

    }


    .sidebar.hidden {
        left: -260px;
    }


    /* =====================================================
       SIDEBAR HEADER
    ===================================================== */

    .sidebar-header {

        padding:
            25px 20px 20px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        border-bottom:
            1px solid
            rgba(255,255,255,.18);

    }


    .brand {

        display:
            flex;

        align-items:
            center;

        gap:
            10px;

    }


    .brand-icon {

        width:
            40px;

        height:
            40px;

        background:
            rgba(255,255,255,.15);

        border:
            1px solid
            rgba(255,255,255,.20);

        border-radius:
            13px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            20px;

        box-shadow:
            0 5px 15px
            rgba(0,0,0,.08);

    }


    .brand-text {

        font-size:
            17px;

        font-weight:
            700;

        line-height:
            1.1;

    }


    .brand-text small {

        display:
            block;

        font-size:
            10px;

        font-weight:
            400;

        opacity:
            .8;

        margin-top:
            3px;

    }


    /* =====================================================
       CLOSE BUTTON
    ===================================================== */

    .close-sidebar {

        width:
            30px;

        height:
            30px;

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

        font-family:
            Arial,
            sans-serif;

        font-size:
            26px;

        line-height:
            1;

        cursor:
            pointer;

        padding:
            0;

        margin:
            0;

        transition:
            .2s ease;

    }


    .close-sidebar:hover {

        color:
            #ffffff;

        transform:
            scale(1.08);

    }


    /* =====================================================
       SIDEBAR MENU
    ===================================================== */

    .sidebar-menu {

        padding:
            20px 12px;

    }


    .menu-title {

        font-size:
            10px;

        text-transform:
            uppercase;

        letter-spacing:
            1px;

        opacity:
            .65;

        padding:
            8px 13px;

        margin-top:
            5px;

    }


    .sidebar-menu a {

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

        color:
            rgba(
                255,
                255,
                255,
                .88
            );

        text-decoration:
            none;

        padding:
            11px 13px;

        border-radius:
            11px;

        margin-bottom:
            5px;

        font-size:
            14px;

        transition:
            .2s;

        cursor:
            pointer;

    }


    .sidebar-menu a i {

        width:
            20px;

        text-align:
            center;

        font-size:
            17px;

    }


    .sidebar-menu a:hover,
    .sidebar-menu a.active {

        background:
            rgba(
                255,
                255,
                255,
                .17
            );

        color:
            white;

        transform:
            translateX(2px);

        box-shadow:
            0 4px 12px
            rgba(0,0,0,.06);

    }


    /* =====================================================
       LOGOUT
    ===================================================== */

    .logout-link {

        width:
            100%;

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

        color:
            rgba(
                255,
                255,
                255,
                .88
            );

        background:
            transparent;

        border:
            none;

        padding:
            11px 13px;

        border-radius:
            11px;

        margin-bottom:
            5px;

        font-size:
            14px;

        transition:
            .2s;

        cursor:
            pointer;

        text-align:
            left;

    }


    .logout-link i {

        width:
            20px;

        text-align:
            center;

        font-size:
            17px;

    }


    .logout-link:hover {

        background:
            rgba(
                255,
                255,
                255,
                .17
            );

        color:
            white;

        transform:
            translateX(2px);

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
       NAVBAR
    ===================================================== */

    .navbar-custom {

        height:
            68px;

        background:
            rgba(
                255,
                255,
                255,
                .97
            );

        border-bottom:
            1px solid
            #d8e5f5;

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
            1500;

        box-shadow:
            0 3px 15px
            rgba(
                23,
                78,
                166,
                .05
            );

    }


    .menu-btn {

        border:
            none;

        background:
            #e8f1ff;

        color:
            #174ea6;

        font-size:
            24px;

        cursor:
            pointer;

        padding:
            5px 9px;

        border-radius:
            9px;

        transition:
            .2s;

    }


    .menu-btn:hover {

        background:
            #d7e6ff;

        transform:
            scale(
                1.03
            );

    }


    /* =====================================================
       ADMIN PROFILE
    ===================================================== */

    .admin-profile {

        display:
            flex;

        align-items:
            center;

        gap:
            10px;

    }


    .profile-image {

        width:
            38px;

        height:
            38px;

        border-radius:
            50%;

        object-fit:
            cover;

        border:
            2px solid
            #b9d2f5;

    }


    .profile-placeholder {

        width:
            38px;

        height:
            38px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #d5e5ff
            );

        color:
            #174ea6;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            19px;

        border:
            1px solid
            #bdd4f5;

    }


    .profile-info {

        line-height:
            1.1;

    }


    .profile-name {

        font-size:
            14px;

        font-weight:
            700;

        color:
            #183b5b;

    }


    .profile-role {

        font-size:
            11px;

        color:
            #2563b8;

        text-transform:
            capitalize;

    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .content {

        padding:
            28px;

    }


    /* =====================================================
       INVENTORY PAGE
    ===================================================== */

    .inventory-page {

        width:
            100%;

        max-width:
            1400px;

        margin:
            0 auto;

    }


    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .page-header {

        display:
            flex;

        justify-content:
            space-between;

        align-items:
            center;

        margin-bottom:
            24px;

    }


    .page-heading {

        display:
            flex;

        align-items:
            center;

        gap:
            14px;

    }


    .inventory-title-icon {

        width:
            52px;

        height:
            52px;

        border-radius:
            14px;

        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #dceaff
            );

        color:
            #174ea6;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            23px;

        border:
            1px solid #d5e5f8;

        box-shadow:
            0 4px 14px
            rgba(23,78,166,.06);

    }


    .page-title h1 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            28px;

        font-weight:
            700;

    }


    .page-title p {

        margin:
            4px 0 0;

        color:
            #71869a;

        font-size:
            12px;

    }


    /* =====================================================
       SUMMARY GRID
    ===================================================== */

    .summary-grid {

        display:
            grid;

        grid-template-columns:
            repeat(
                4,
                minmax(
                    0,
                    1fr
                )
            );

        gap:
            10px;

        margin-bottom:
            24px;

    }


    /* =====================================================
       SUMMARY CARD
    ===================================================== */

    .summary-card {

        position:
            relative;

        min-height:
            135px;

        padding:
            20px 18px;

        display:
            flex;

        align-items:
            center;

        gap:
            15px;

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            16px;

        box-shadow:
            0 5px 18px
            rgba(23,78,166,.055);

        overflow:
            hidden;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;

    }


    .summary-card::after {

        content:
            "";

        position:
            absolute;

        width:
            90px;

        height:
            90px;

        border-radius:
            50%;

        right:
            -32px;

        top:
            -32px;

        background:
            #f3f7ff;

        pointer-events:
            none;

    }


    .summary-card:hover {

        transform:
            translateY(-3px);

        border-color:
            #c9d9ec;

        box-shadow:
            0 10px 24px
            rgba(23,78,166,.09);

    }


    /* =====================================================
       SUMMARY ICON
    ===================================================== */

    .summary-icon {

        position:
            relative;

        z-index:
            2;

        width:
            54px;

        height:
            54px;

        min-width:
            54px;

        border-radius:
            14px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            21px;

    }


    .summary-icon.total {

        background:
            #e8f1ff;

        color:
            #174ea6;

    }


    .summary-icon.available {

        background:
            #e9f8ef;

        color:
            #198754;

    }


    .summary-icon.low {

        background:
            #fff5df;

        color:
            #c47a00;

    }


    .summary-icon.out {

        background:
            #ffe9e9;

        color:
            #dc3545;

    }


    /* =====================================================
       SUMMARY CONTENT
    ===================================================== */

    .summary-card-content {

        position:
            relative;

        z-index:
            2;

        min-width:
            0;

    }


    .summary-label {

        margin-bottom:
            6px;

        color:
            #71869a;

        font-size:
            10px;

        font-weight:
            700;

        text-transform:
            uppercase;

        letter-spacing:
            .35px;

    }


    .summary-value {

        color:
            #183b5b;

        font-size:
            30px;

        font-weight:
            800;

        line-height:
            1;

    }


    /* =====================================================
       INVENTORY CARD
    ===================================================== */

    .inventory-card {

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            17px;

        box-shadow:
            0 5px 20px
            rgba(23,78,166,.055);

        overflow:
            hidden;

    }


    .inventory-card-header {

        padding:
            19px 21px;

        border-bottom:
            1px solid #e3edf7;

        display:
            flex;

        justify-content:
            space-between;

        align-items:
            center;

        gap:
            12px;

    }


    .inventory-card-header h2 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            18px;

        font-weight:
            700;

    }


    .inventory-card-header p {

        margin:
            3px 0 0;

        color:
            #71869a;

        font-size:
            11px;

    }


    /* =====================================================
       TABLE WRAPPER
    ===================================================== */

    .table-wrapper {

        width:
            100%;

        overflow-x:
            auto;

    }


    /* =====================================================
       TABLE
    ===================================================== */

    .inventory-table {

        width:
            100%;

        min-width:
            850px;

        border-collapse:
            collapse;

    }


    .inventory-table thead th {

        background:
            #f5f9ff;

        color:
            #56718b;

        font-size:
            10px;

        font-weight:
            700;

        text-transform:
            uppercase;

        letter-spacing:
            .5px;

        padding:
            13px 16px;

        border-bottom:
            1px solid #dce8f5;

        white-space:
            nowrap;

    }


    .inventory-table tbody td {

        padding:
            14px 16px;

        border-bottom:
            1px solid #edf2f7;

        color:
            #36536d;

        font-size:
            12px;

        vertical-align:
            middle;

    }


    .inventory-table tbody tr {

        transition:
            .15s ease;

    }


    .inventory-table tbody tr:hover {

        background:
            #f8fbff;

    }


    .inventory-table tbody tr:last-child td {

        border-bottom:
            none;

    }


    /* =====================================================
       PRODUCT
    ===================================================== */

    .product-info {

        display:
            flex;

        align-items:
            center;

        gap:
            11px;

        min-width:
            200px;

    }


    .product-image {

        width:
            46px;

        height:
            46px;

        border-radius:
            10px;

        object-fit:
            cover;

        border:
            1px solid #d8e5f5;

        background:
            #f1f6fc;

        flex-shrink:
            0;

    }


    .product-placeholder {

        width:
            46px;

        height:
            46px;

        border-radius:
            10px;

        background:
            #e8f1ff;

        color:
            #174ea6;

        border:
            1px solid #d8e5f5;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            19px;

        flex-shrink:
            0;

    }


    .product-name {

        color:
            #183b5b;

        font-weight:
            700;

        font-size:
            12px;

    }


    .product-id {

        color:
            #8a9bad;

        font-size:
            10px;

        margin-top:
            2px;

    }


    /* =====================================================
       CATEGORY
    ===================================================== */

    .category-text {

        color:
            #56718b;

        font-size:
            12px;

    }


    /* =====================================================
       PRICE
    ===================================================== */

    .price {

        color:
            #174ea6;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    /* =====================================================
       STOCK
    ===================================================== */

    .stock-number {

        color:
            #183b5b;

        font-size:
            15px;

        font-weight:
            700;

    }


    .stock-label {

        display:
            block;

        color:
            #8a9bad;

        font-size:
            9px;

        margin-top:
            2px;

    }


    /* =====================================================
       STATUS
    ===================================================== */

    .status-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            6px;

        padding:
            5px 10px;

        border-radius:
            20px;

        font-size:
            9px;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    .status-badge i {

        font-size:
            6px;

    }


    .status-available {

        background:
            #e9f8ef;

        color:
            #198754;

    }


    .status-low {

        background:
            #fff5df;

        color:
            #c47a00;

    }


    .status-out {

        background:
            #ffe9e9;

        color:
            #dc3545;

    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {

        text-align:
            center;

        padding:
            60px 20px;

    }


    .empty-icon {

        width:
            68px;

        height:
            68px;

        border-radius:
            18px;

        background:
            #e8f1ff;

        color:
            #174ea6;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        margin:
            0 auto 16px;

        font-size:
            28px;

    }


    .empty-state h3 {

        color:
            #183b5b;

        font-size:
            17px;

        margin:
            0 0 6px;

    }


    .empty-state p {

        color:
            #71869a;

        font-size:
            12px;

        margin:
            0;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1150px) {

        .summary-grid {

            grid-template-columns:
                repeat(
                    2,
                    minmax(
                        0,
                        1fr
                    )
                );

            gap:
                10px;

        }

    }


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


        .page-header {

            margin-bottom:
                18px;

        }


        .page-title h1 {

            font-size:
                23px;

        }


        .page-title p {

            font-size:
                11px;

        }


        .inventory-title-icon {

            width:
                45px;

            height:
                45px;

            font-size:
                20px;

        }


        .summary-grid {

            grid-template-columns:
                1fr;

            gap:
                10px;

        }


        .summary-card {

            min-height:
                115px;

            padding:
                18px;

        }


        .summary-icon {

            width:
                50px;

            height:
                50px;

            min-width:
                50px;

        }


        .summary-value {

            font-size:
                28px;

        }


        .inventory-card-header {

            flex-direction:
                column;

            align-items:
                flex-start;

        }

    }


    @media (max-width: 576px) {

        .profile-info {

            display:
                none;

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
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>


        <!-- INVENTORY - ACTIVE -->

        <a
            href="{{ route('admin.inventory.index') }}"
            class="active"
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


    <!-- =================================================
         DASHBOARD-STYLE NAVBAR
    ================================================= -->

    <nav class="navbar-custom">


        <!-- MENU BUTTON -->

        <button
            type="button"
            class="menu-btn"
            id="menuButton"
            title="Open Sidebar"
            aria-label="Open Sidebar"
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



    <!-- =================================================
         INVENTORY CONTENT
    ================================================= -->

    <main class="content">


        <div class="inventory-page">


            <!-- =========================================
                 PAGE HEADER
            ========================================== -->

            <div class="page-header">

                <div class="page-heading">

                    <div class="inventory-title-icon">

                        <i class="bi bi-boxes"></i>

                    </div>


                    <div class="page-title">

                        <h1>
                            Inventory
                        </h1>

                        <p>
                            Monitor product stock levels and inventory status.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 SUMMARY CARDS
            ========================================== -->

            <div class="summary-grid">


                <!-- TOTAL PRODUCTS -->

                <div class="summary-card">

                    <div class="summary-icon total">

                        <i class="bi bi-box-seam"></i>

                    </div>

                    <div class="summary-card-content">

                        <div class="summary-label">
                            Total Products
                        </div>

                        <div class="summary-value">

                            {{
                                $totalProducts
                                ??
                                $products->count()
                            }}

                        </div>

                    </div>

                </div>


                <!-- AVAILABLE STOCK -->

                <div class="summary-card">

                    <div class="summary-icon available">

                        <i class="bi bi-check-circle"></i>

                    </div>

                    <div class="summary-card-content">

                        <div class="summary-label">
                            Available Stock
                        </div>

                        <div class="summary-value">

                            {{
                                $availableProducts
                                ??
                                $products
                                    ->where('stock', '>', 10)
                                    ->count()
                            }}

                        </div>

                    </div>

                </div>


                <!-- LOW STOCK -->

                <div class="summary-card">

                    <div class="summary-icon low">

                        <i class="bi bi-exclamation-triangle"></i>

                    </div>

                    <div class="summary-card-content">

                        <div class="summary-label">
                            Low Stock
                        </div>

                        <div class="summary-value">

                            {{
                                $lowStockProducts
                                ??
                                $products
                                    ->whereBetween(
                                        'stock',
                                        [1, 10]
                                    )
                                    ->count()
                            }}

                        </div>

                    </div>

                </div>


                <!-- OUT OF STOCK -->

                <div class="summary-card">

                    <div class="summary-icon out">

                        <i class="bi bi-x-circle"></i>

                    </div>

                    <div class="summary-card-content">

                        <div class="summary-label">
                            Out of Stock
                        </div>

                        <div class="summary-value">

                            {{
                                $outOfStockProducts
                                ??
                                $products
                                    ->where(
                                        'stock',
                                        '<=',
                                        0
                                    )
                                    ->count()
                            }}

                        </div>

                    </div>

                </div>


            </div>


            <!-- =========================================
                 INVENTORY TABLE
            ========================================== -->

            <div class="inventory-card">


                <!-- CARD HEADER -->

                <div class="inventory-card-header">

                    <div>

                        <h2>
                            Product Inventory
                        </h2>

                        <p>
                            Current stock information for all products.
                        </p>

                    </div>

                </div>


                <!-- =====================================
                     PRODUCTS EXIST
                ====================================== -->

                @if($products->count() > 0)


                    <div class="table-wrapper">

                        <table class="inventory-table">


                            <thead>

                                <tr>

                                    <th>
                                        Product
                                    </th>

                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Stock
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach($products as $product)


                                    <tr>


                                        <!-- PRODUCT -->

                                        <td>

                                            <div class="product-info">


                                                @if($product->image)

                                                    <img
                                                        src="{{ asset(
                                                            'storage/' .
                                                            $product->image
                                                        ) }}"
                                                        alt="{{ $product->name }}"
                                                        class="product-image"
                                                    >

                                                @else

                                                    <div
                                                        class="product-placeholder"
                                                    >

                                                        <i
                                                            class="
                                                                bi
                                                                bi-droplet-fill
                                                            "
                                                        ></i>

                                                    </div>

                                                @endif


                                                <div>

                                                    <div
                                                        class="product-name"
                                                    >

                                                        {{ $product->name }}

                                                    </div>


                                                    <div
                                                        class="product-id"
                                                    >

                                                        Product #{{ $product->id }}

                                                    </div>

                                                </div>


                                            </div>

                                        </td>


                                        <!-- CATEGORY -->

                                        <td>

                                            <span
                                                class="category-text"
                                            >

                                                {{
                                                    $product->category
                                                    ??
                                                    'Water Product'
                                                }}

                                            </span>

                                        </td>


                                        <!-- PRICE -->

                                        <td>

                                            <span class="price">

                                                ₱{{
                                                    number_format(
                                                        $product->price,
                                                        2
                                                    )
                                                }}

                                            </span>

                                        </td>


                                        <!-- STOCK -->

                                        <td>

                                            <span
                                                class="stock-number"
                                            >

                                                {{ $product->stock }}

                                            </span>


                                            <span
                                                class="stock-label"
                                            >

                                                units

                                            </span>

                                        </td>


                                        <!-- STATUS -->

                                        <td>


                                            @if(
                                                $product->stock <= 0
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-out
                                                    "
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-circle-fill
                                                        "
                                                    ></i>

                                                    Out of Stock

                                                </span>


                                            @elseif(
                                                $product->stock <= 10
                                            )

                                                <span
                                                    class="
                                                        status-badge
                                                        status-low
                                                    "
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-circle-fill
                                                        "
                                                    ></i>

                                                    Low Stock

                                                </span>


                                            @else

                                                <span
                                                    class="
                                                        status-badge
                                                        status-available
                                                    "
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-circle-fill
                                                        "
                                                    ></i>

                                                    Available

                                                </span>

                                            @endif


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

                            <i class="bi bi-box-seam"></i>

                        </div>


                        <h3>

                            No Products Found

                        </h3>


                        <p>

                            There are currently no products available in the inventory.

                        </p>


                    </div>


                @endif


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