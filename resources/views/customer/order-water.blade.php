<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Order Water | Water Station
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


        html,
        body {

            margin: 0;

            padding: 0;

            min-height: 100%;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f4fcfd 0%,
                    #eefafb 50%,
                    #f8ffff 100%
                );

            color: #263238;
        }


        body {

            overflow-x: hidden;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed !important;

            top: 0 !important;

            left: 0 !important;

            width: 260px;

            height: 100vh;

            background: #ffffff;

            border-right:
                1px solid #dceff1;

            z-index: 3000;

            overflow-y: auto;

            transition:
                transform .3s ease;

            box-shadow:
                5px 0 20px
                rgba(0,121,133,.05);
        }


        .sidebar.hidden {

            transform:
                translateX(-100%);
        }


        .sidebar::-webkit-scrollbar {

            width: 5px;
        }


        .sidebar::-webkit-scrollbar-thumb {

            background:
                #cdecef;

            border-radius:
                10px;
        }


        /* =====================================================
           SIDEBAR HEADER
        ===================================================== */

        .sidebar-header {

            height: 70px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 20px;

            border-bottom:
                1px solid #edf4f5;
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 10px;

            color:
                #00838f;

            font-weight:
                700;

            font-size:
                18px;
        }


        .brand-icon {

            width:
                38px;

            height:
                38px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                10px;

            background:
                #e0f7fa;

            color:
                #00838f;

            font-size:
                20px;
        }


        .close-sidebar {

            border:
                none;

            background:
                transparent;

            font-size:
                23px;

            color:
                #78909c;

            cursor:
                pointer;

            transition:
                .2s;
        }


        .close-sidebar:hover {

            color:
                #00838f;

            transform:
                rotate(90deg);
        }


        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

        .sidebar-menu {

            padding:
                20px 14px;
        }


        .menu-label {

            font-size:
                11px;

            font-weight:
                700;

            color:
                #90a4ae;

            text-transform:
                uppercase;

            padding:
                0 12px;

            margin-bottom:
                9px;

            letter-spacing:
                .5px;
        }


        .sidebar-menu a {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                12px 13px;

            margin-bottom:
                5px;

            border-radius:
                10px;

            color:
                #546e7a;

            text-decoration:
                none;

            font-size:
                14px;

            font-weight:
                600;

            transition:
                .2s ease;
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
                #e0f7fa;

            color:
                #00838f;

            transform:
                translateX(2px);
        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .sidebar-bottom {

            margin-top:
                20px;

            border-top:
                1px solid #edf2f4;

            padding-top:
                15px;
        }


        .logout-btn {

            width:
                100%;

            border:
                none;

            background:
                transparent;

            text-align:
                left;

            color:
                #e53935 !important;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            padding:
                12px 13px;

            border-radius:
                10px;

            font-size:
                14px;

            font-weight:
                600;

            cursor:
                pointer;

            transition:
                .2s ease;
        }


        .logout-btn:hover {

            background:
                #ffebee !important;

            color:
                #c62828 !important;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            position:
                relative;

            margin-left:
                260px;

            min-height:
                100vh;

            transition:
                margin-left .3s ease;

            padding:
                94px 24px 40px;
        }


        .main.expanded {

            margin-left:
                0;
        }


        /* =====================================================
           FIXED TOPBAR
        ===================================================== */

        .topbar {

            position:
                fixed !important;

            top:
                18px !important;

            left:
                284px !important;

            right:
                24px !important;

            width:
                auto !important;

            height:
                58px;

            margin:
                0 !important;

            padding:
                8px 17px;

            background:
                rgba(255,255,255,.98);

            border:
                1px solid #e2f0f2;

            border-radius:
                13px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            z-index:
                2500;

            box-shadow:
                0 4px 16px
                rgba(0,121,133,.08);

            backdrop-filter:
                blur(12px);

            -webkit-backdrop-filter:
                blur(12px);
        }


        .main.expanded .topbar {

            left:
                24px !important;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar-left {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;
        }


        .open-sidebar {

            width:
                38px;

            height:
                38px;

            border:
                none;

            border-radius:
                9px;

            background:
                #e0f7fa;

            color:
                #00838f;

            font-size:
                19px;

            display:
                none;

            align-items:
                center;

            justify-content:
                center;

            cursor:
                pointer;
        }


        .topbar-title h2 {

            font-size:
                18px;

            font-weight:
                700;

            margin:
                0;

            color:
                #263238;
        }


        .topbar-title p {

            font-size:
                10px;

            margin:
                2px 0 0;

            color:
                #0097a7;
        }


        /* =====================================================
           PROFILE
        ===================================================== */

        .profile {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;
        }


        .profile img {

            width:
                37px;

            height:
                37px;

            border-radius:
                50%;

            object-fit:
                cover;

            border:
                2px solid #b2ebf2;
        }


        .profile-placeholder {

            width:
                37px;

            height:
                37px;

            border-radius:
                50%;

            background:
                #e0f7fa;

            color:
                #00838f;

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

            font-size:
                13px;

            font-weight:
                700;

            margin:
                0;
        }


        .profile-role {

            font-size:
                10px;

            color:
                #0097a7;

            margin:
                0;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .order-header {

            margin-bottom:
                22px;
        }


        .order-header h1 {

            margin:
                0;

            font-size:
                27px;

            font-weight:
                700;

            color:
                #263238;
        }


        .order-header p {

            margin:
                5px 0 0;

            font-size:
                12px;

            color:
                #90a4ae;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-card {

            background:
                #ffffff;

            border:
                1px solid #e4f1f3;

            border-radius:
                15px;

            padding:
                14px 16px;

            margin-bottom:
                22px;

            box-shadow:
                0 3px 12px
                rgba(0,0,0,.04);
        }


        .search-box {

            position:
                relative;
        }


        .search-box i {

            position:
                absolute;

            left:
                13px;

            top:
                50%;

            transform:
                translateY(-50%);

            color:
                #90a4ae;
        }


        .search-box input {

            width:
                100%;

            border:
                1px solid #dceff1;

            border-radius:
                10px;

            padding:
                10px 12px 10px 38px;

            font-size:
                13px;

            outline:
                none;

            background:
                #fbfeff;

            color:
                #455a64;
        }


        .search-box input:focus {

            border-color:
                #80deea;

            box-shadow:
                0 0 0 3px
                rgba(0,188,212,.08);
        }


        /* =====================================================
           PRODUCTS GRID
        ===================================================== */

        .products-grid {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                18px;
        }


        /* =====================================================
           PRODUCT CARD
        ===================================================== */

        .product-card {

            background:
                #ffffff;

            border:
                1px solid #e4f1f3;

            border-radius:
                17px;

            overflow:
                hidden;

            box-shadow:
                0 4px 14px
                rgba(0,0,0,.045);

            transition:
                .25s ease;

            display:
                flex;

            flex-direction:
                column;
        }


        .product-card:hover {

            transform:
                translateY(-4px);

            box-shadow:
                0 9px 22px
                rgba(0,121,133,.10);
        }


        /* =====================================================
           PRODUCT IMAGE
        ===================================================== */

        .product-image {

            height:
                210px;

            background:
                linear-gradient(
                    135deg,
                    #eefbfd,
                    #e0f7fa
                );

            position:
                relative;

            overflow:
                hidden;
        }


        .product-image img {

            width:
                100%;

            height:
                100%;

            object-fit:
                cover;

            transition:
                transform .3s ease;
        }


        .product-card:hover
        .product-image img {

            transform:
                scale(1.03);
        }


        .placeholder-image {

            height:
                100%;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            color:
                #80deea;

            font-size:
                60px;
        }


        /* =====================================================
           STOCK BADGE
        ===================================================== */

        .stock-badge {

            position:
                absolute;

            top:
                12px;

            right:
                12px;

            padding:
                6px 10px;

            border-radius:
                20px;

            font-size:
                10px;

            font-weight:
                700;

            backdrop-filter:
                blur(6px);
        }


        .available-badge {

            background:
                rgba(232,245,233,.95);

            color:
                #2e7d32;
        }


        .low-badge {

            background:
                rgba(255,243,224,.95);

            color:
                #ef6c00;
        }


        .out-badge {

            background:
                rgba(255,235,238,.95);

            color:
                #c62828;
        }


        /* =====================================================
           PRODUCT CONTENT
        ===================================================== */

        .product-content {

            padding:
                18px;

            display:
                flex;

            flex-direction:
                column;

            flex: 1;
        }


        .category {

            font-size:
                10px;

            text-transform:
                uppercase;

            letter-spacing:
                .5px;

            color:
                #0097a7;

            font-weight:
                700;

            margin-bottom:
                5px;
        }


        .product-name {

            font-size:
                18px;

            font-weight:
                700;

            color:
                #263238;

            margin-bottom:
                7px;
        }


        .description {

            font-size:
                11px;

            line-height:
                1.5;

            color:
                #90a4ae;

            min-height:
                34px;

            margin-bottom:
                13px;
        }


        .price-row {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            margin-bottom:
                13px;
        }


        .price {

            font-size:
                20px;

            font-weight:
                700;

            color:
                #00838f;
        }


        .stock-text {

            font-size:
                10px;

            color:
                #78909c;
        }


        .stock-text strong {

            color:
                #455a64;
        }


        /* =====================================================
           ORDER BUTTON
        ===================================================== */

        .order-btn {

            width:
                100%;

            padding:
                11px;

            border:
                none;

            border-radius:
                10px;

            background:
                linear-gradient(
                    135deg,
                    #00acc1,
                    #0097a7
                );

            color:
                #ffffff;

            text-decoration:
                none;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                7px;

            font-size:
                12px;

            font-weight:
                700;

            transition:
                .2s ease;
        }


        .order-btn:hover {

            color:
                #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #00838f,
                    #006064
                );

            transform:
                translateY(-1px);
        }


        .disabled-btn {

            background:
                #eceff1 !important;

            color:
                #90a4ae !important;

            cursor:
                not-allowed;

            pointer-events:
                none;
        }


        /* =====================================================
           NO SEARCH RESULTS
        ===================================================== */

        #noSearchResults {

            display:
                none !important;

            background:
                #ffffff;

            border:
                1px solid #e4f1f3;

            border-radius:
                16px;

            padding:
                55px 20px;

            text-align:
                center;

            margin-top:
                20px;
        }


        #noSearchResults .empty-icon {

            width:
                65px;

            height:
                65px;

            margin:
                0 auto 14px;

            border-radius:
                18px;

            background:
                #e0f7fa;

            color:
                #80deea;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                27px;
        }


        #noSearchResults h4 {

            margin:
                0 0 6px;

            font-size:
                18px;

            color:
                #455a64;
        }


        #noSearchResults p {

            margin:
                0;

            color:
                #90a4ae;

            font-size:
                12px;
        }


        /* =====================================================
           EMPTY DATABASE
        ===================================================== */

        .database-empty {

            background:
                #ffffff;

            border:
                1px solid #e4f1f3;

            border-radius:
                16px;

            padding:
                60px 20px;

            text-align:
                center;

            box-shadow:
                0 3px 13px
                rgba(0,0,0,.04);
        }


        .database-empty-icon {

            width:
                70px;

            height:
                70px;

            border-radius:
                20px;

            background:
                #e0f7fa;

            color:
                #80deea;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            margin:
                0 auto 15px;

            font-size:
                30px;
        }


        .database-empty h4 {

            font-size:
                18px;

            font-weight:
                700;

            color:
                #455a64;

            margin-bottom:
                6px;
        }


        .database-empty p {

            margin:
                0;

            font-size:
                12px;

            color:
                #90a4ae;
        }


        /* =====================================================
           INFO
        ===================================================== */

        .info-box {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                10px;

            background:
                #eafafb;

            border:
                1px solid #d3f0f2;

            border-radius:
                12px;

            padding:
                13px 15px;

            margin-top:
                22px;

            color:
                #607d8b;

            font-size:
                11px;

            line-height:
                1.5;
        }


        .info-box i {

            color:
                #00838f;

            font-size:
                16px;
        }


        .info-box strong {

            color:
                #455a64;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1100px) {

            .products-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 991px) {

            .sidebar {

                transform:
                    translateX(-100%);
            }


            .sidebar.show {

                transform:
                    translateX(0);
            }


            .main {

                margin-left:
                    0;

                padding:
                    88px 22px 40px;
            }


            .topbar {

                left:
                    20px !important;

                right:
                    20px !important;

                top:
                    14px !important;
            }


            .main.expanded .topbar {

                left:
                    20px !important;
            }


            .open-sidebar {

                display:
                    flex;
            }

        }


        @media (max-width: 700px) {

            .products-grid {

                grid-template-columns:
                    1fr;
            }


            .product-image {

                height:
                    220px;
            }

        }


        @media (max-width: 576px) {

            .main {

                padding:
                    82px 12px 35px;
            }


            .topbar {

                left:
                    12px !important;

                right:
                    12px !important;

                top:
                    10px !important;
            }


            .main.expanded .topbar {

                left:
                    12px !important;

                right:
                    12px !important;
            }


            .topbar-title h2 {

                font-size:
                    17px;
            }


            .topbar-title p {

                font-size:
                    9px;
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


<!-- =====================================================
     SIDEBAR
===================================================== -->

<div
    class="sidebar"
    id="sidebar"
>


    <div class="sidebar-header">


        <div class="brand">


            <div class="brand-icon">

                <i class="bi bi-droplet-fill"></i>

            </div>


            <span>

                Water Station

            </span>


        </div>


        <button
            class="close-sidebar"
            onclick="closeSidebar()"
            type="button"
        >

            <i class="bi bi-x-lg"></i>

        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-label">

            Customer Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>



        <!-- PRODUCTS -->

        <a
            href="{{ route('customer.products') }}"
        >

            <i class="bi bi-droplet-fill"></i>

            <span>
                Products
            </span>

        </a>



        <!-- ORDER WATER -->

        <a
            href="{{ route('customer.order-water') }}"
            class="active"
        >

            <i class="bi bi-cart-plus-fill"></i>

            <span>
                Order Water
            </span>

        </a>



        <!-- MY ORDERS -->

        <a
            href="{{ route('customer.orders') }}"
        >

            <i class="bi bi-bag-check-fill"></i>

            <span>
                My Orders
            </span>

        </a>



        <!-- TRACK ORDERS -->

        <a
            href="{{ route('customer.deliveries') }}"
        >

            <i class="bi bi-search"></i>

            <span>
                Track Orders
            </span>

        </a>



        <!-- ACCOUNT -->

        <div class="sidebar-bottom">


            <a
                href="{{ route('account') }}"
            >

                <i class="bi bi-person-circle"></i>

                <span>
                    My Account
                </span>

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
                    class="logout-btn"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>


            </form>


        </div>


    </div>

</div>



<!-- =====================================================
     MAIN
===================================================== -->

<div
    class="main"
    id="main"
>


    <!-- =================================================
         FIXED NAVBAR
    ================================================== -->

    <div
        class="topbar"
        id="topbar"
    >


        <div class="topbar-left">


            <button
                class="open-sidebar"
                id="openSidebar"
                onclick="openSidebar()"
                type="button"
            >

                <i class="bi bi-list"></i>

            </button>


            <div class="topbar-title">


                <h2>
                    Water Station
                </h2>


                <p>
                    Fresh Water • Easy Ordering
                </p>


            </div>


        </div>



        <!-- PROFILE -->

        <div class="profile">


            @if(auth()->user()->profile_picture)


                <img
                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                    alt="Profile"
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

                    Customer

                </p>


            </div>


        </div>


    </div>



    <!-- =================================================
         PAGE CONTENT
    ================================================== -->


    <div class="order-header">


        <h1>

            Order Water

        </h1>


        <p>

            Choose a water product below to start your order.

        </p>


    </div>



    <!-- =================================================
         SEARCH
    ================================================== -->

    <div class="search-card">


        <div class="search-box">


            <i class="bi bi-search"></i>


            <input
                type="text"
                id="productSearch"
                placeholder="Search water products..."
                autocomplete="off"
            >


        </div>


    </div>



    <!-- =================================================
         PRODUCTS
    ================================================== -->

    @if($products->count() > 0)


        <div
            class="products-grid"
            id="productsGrid"
        >


            @foreach($products as $product)


                <div
                    class="product-card product-item"
                    data-name="{{ strtolower($product->name) }}"
                    data-category="{{ strtolower($product->category ?? '') }}"
                >


                    <!-- PRODUCT IMAGE -->

                    <div class="product-image">


                        @if($product->image)


                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >


                        @else


                            <div class="placeholder-image">

                                <i
                                    class="bi bi-droplet-fill"
                                ></i>

                            </div>


                        @endif



                        <!-- STOCK BADGE -->

                        @if($product->stock <= 0)


                            <span
                                class="stock-badge out-badge"
                            >

                                <i
                                    class="bi bi-x-circle me-1"
                                ></i>

                                Out of Stock

                            </span>


                        @elseif($product->stock <= 10)


                            <span
                                class="stock-badge low-badge"
                            >

                                <i
                                    class="bi bi-exclamation-circle me-1"
                                ></i>

                                Low Stock

                            </span>


                        @else


                            <span
                                class="stock-badge available-badge"
                            >

                                <i
                                    class="bi bi-check-circle me-1"
                                ></i>

                                Available

                            </span>


                        @endif


                    </div>



                    <!-- PRODUCT CONTENT -->

                    <div class="product-content">


                        <!-- CATEGORY -->

                        <div class="category">

                            {{ $product->category
                                ?? 'Water Product'
                            }}

                        </div>


                        <!-- NAME -->

                        <div class="product-name">

                            {{ $product->name }}

                        </div>


                        <!-- DESCRIPTION -->

                        <div class="description">

                            {{ $product->description
                                ?? 'Clean and quality water from our station.'
                            }}

                        </div>



                        <!-- PRICE + STOCK -->

                        <div class="price-row">


                            <div class="price">

                                ₱{{ number_format(
                                    $product->price,
                                    2
                                ) }}

                            </div>


                            <div class="stock-text">


                                @if($product->stock > 0)


                                    <i
                                        class="bi bi-box-seam me-1"
                                    ></i>

                                    <strong>
                                        {{ $product->stock }}
                                    </strong>

                                    available


                                @else


                                    <span
                                        class="stock-out-text"
                                    >

                                        No stock

                                    </span>


                                @endif


                            </div>


                        </div>



                        <!-- ORDER -->

                        @if($product->stock > 0)


                            <a
                                href="{{ route(
                                    'customer.orders.create',
                                    ['product' => $product->id]
                                ) }}"
                                class="order-btn"
                            >

                                <i
                                    class="bi bi-cart-plus"
                                ></i>

                                Order Now

                            </a>


                        @else


                            <span
                                class="order-btn disabled-btn"
                            >

                                <i
                                    class="bi bi-x-circle"
                                ></i>

                                Out of Stock

                            </span>


                        @endif


                    </div>


                </div>


            @endforeach


        </div>



        <!-- =================================================
             SEARCH EMPTY
        ================================================== -->

        <div
            id="noSearchResults"
        >


            <div class="empty-icon">

                <i class="bi bi-search"></i>

            </div>


            <h4>

                No Products Found

            </h4>


            <p>

                No water products match your search.

            </p>


        </div>


    @else


        <!-- =================================================
             DATABASE EMPTY
        ================================================== -->

        <div
            class="database-empty"
        >


            <div
                class="database-empty-icon"
            >

                <i class="bi bi-droplet"></i>

            </div>


            <h4>

                No Products Available

            </h4>


            <p>

                There are currently no water products
                available for ordering.

            </p>


        </div>


    @endif



    <!-- =================================================
         INFO
    ================================================== -->

    <div class="info-box">


        <i class="bi bi-info-circle-fill"></i>


        <div>


            <strong>
                Ordering reminder:
            </strong>

            Choose your product and click
            <strong>Order Now</strong>.
            You can cancel your order while its status
            is still <strong>Pending</strong>.

        </div>


    </div>


</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>


    /* =====================================================
       SIDEBAR
    ===================================================== */

    const sidebar =
        document.getElementById('sidebar');


    const main =
        document.getElementById('main');


    const openButton =
        document.getElementById('openSidebar');



    function openSidebar() {

        sidebar.classList.remove('hidden');

        sidebar.classList.add('show');

        main.classList.remove('expanded');

    }



    function closeSidebar() {

        sidebar.classList.add('hidden');

        sidebar.classList.remove('show');

        main.classList.add('expanded');

    }



    function updateLayout() {


        if (window.innerWidth <= 991) {


            sidebar.classList.add('hidden');

            sidebar.classList.remove('show');

            main.classList.add('expanded');


            if (openButton) {

                openButton.style.display =
                    'flex';

            }


        } else {


            sidebar.classList.remove('hidden');

            sidebar.classList.remove('show');

            main.classList.remove('expanded');


            if (openButton) {

                openButton.style.display =
                    'none';

            }


        }

    }



    updateLayout();


    window.addEventListener(
        'resize',
        updateLayout
    );



    /* =====================================================
       SEARCH
    ===================================================== */

    const searchInput =
        document.getElementById('productSearch');


    const productItems =
        document.querySelectorAll('.product-item');


    const noSearchResults =
        document.getElementById('noSearchResults');



    if (searchInput) {


        searchInput.addEventListener(
            'input',
            function () {


                const keyword =
                    this.value
                        .toLowerCase()
                        .trim();


                let visibleCount =
                    0;


                productItems.forEach(
                    function (item) {


                        const name =
                            item.dataset.name
                            || '';


                        const category =
                            item.dataset.category
                            || '';


                        const matches =
                            name.includes(keyword)
                            ||
                            category.includes(keyword);


                        if (matches) {


                            item.style.display =
                                '';


                            visibleCount++;


                        } else {


                            item.style.display =
                                'none';

                        }


                    }
                );


                if (noSearchResults) {


                    if (
                        keyword !== ''
                        &&
                        visibleCount === 0
                    ) {


                        noSearchResults.style.setProperty(
                            'display',
                            'block',
                            'important'
                        );


                    } else {


                        noSearchResults.style.setProperty(
                            'display',
                            'none',
                            'important'
                        );


                    }

                }


            }
        );

    }


</script>


</body>

</html>