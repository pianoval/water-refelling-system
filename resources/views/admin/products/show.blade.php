<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>View Product - Water Station Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

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

            z-index: 1000;

            overflow-y: auto;

            transition: .3s ease;

            box-shadow:
                6px 0 25px rgba(23,78,166,.18);
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
                1px solid rgba(255,255,255,.18);
        }

        .brand {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;

            background: rgba(255,255,255,.15);

            border:
                1px solid rgba(255,255,255,.20);

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;
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
        }

        .sidebar a {
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
        }

        .sidebar a i {
            width: 20px;

            text-align: center;

            font-size: 17px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255,255,255,.17);

            color: white;

            transform: translateX(2px);
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

            font-size: 14px;

            cursor: pointer;

            text-align: left;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.17);

            color: white;
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

            background: rgba(255,255,255,.97);

            border-bottom: 1px solid #d8e5f5;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;

            top: 0;

            z-index: 900;

            box-shadow:
                0 3px 15px rgba(23,78,166,.05);
        }

        .menu-btn {
            border: none;

            background: #e8f1ff;

            color: #174ea6;

            font-size: 24px;

            padding: 5px 9px;

            border-radius: 9px;
        }

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .profile-image,
        .profile-placeholder {
            width: 38px;

            height: 38px;

            border-radius: 50%;
        }

        .profile-image {
            object-fit: cover;

            border: 2px solid #b9d2f5;
        }

        .profile-placeholder {
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

            border: 1px solid #bdd4f5;
        }

        .profile-info {
            line-height: 1.1;
        }

        .profile-name {
            font-size: 14px;

            font-weight: 700;
        }

        .profile-role {
            font-size: 11px;

            color: #2563b8;

            text-transform: capitalize;
        }


        .content {
            padding: 28px;

            max-width: 1100px;

            margin: auto;
        }

        .page-title {
            font-size: 26px;

            font-weight: 700;

            margin-bottom: 5px;
        }

        .page-subtitle {
            font-size: 13px;

            color: #6b8299;

            margin-bottom: 24px;
        }


        .product-card {
            background: white;

            border: 1px solid #dce8f6;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(23,78,166,.06);

            overflow: hidden;
        }

        .product-card-body {
            padding: 28px;
        }


        .product-photo {
            width: 100%;

            max-width: 360px;

            height: 300px;

            object-fit: cover;

            border-radius: 15px;

            border: 1px solid #d7e5f5;
        }

        .no-image {
            width: 100%;

            max-width: 360px;

            height: 300px;

            border-radius: 15px;

            background: #eaf2ff;

            color: #5d85b0;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 65px;

            border: 1px solid #d7e5f5;
        }


        .product-name {
            font-size: 25px;

            font-weight: 700;

            color: #183b5b;

            margin-bottom: 8px;
        }

        .category-badge {
            display: inline-block;

            background: #e8f1ff;

            color: #174ea6;

            padding: 6px 10px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 600;

            margin-bottom: 22px;
        }

        .detail-row {
            padding: 13px 0;

            border-bottom: 1px solid #edf3fa;

            display: flex;

            justify-content: space-between;

            gap: 20px;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #71889d;

            font-size: 12px;
        }

        .detail-value {
            color: #183b5b;

            font-size: 13px;

            font-weight: 600;

            text-align: right;
        }

        .price-value {
            color: #174ea6;

            font-size: 19px;

            font-weight: 700;
        }

        .stock-badge {
            padding: 6px 10px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 700;
        }

        .stock-good {
            background: #e8f7ee;

            color: #25804a;
        }

        .stock-low {
            background: #fff4dc;

            color: #a56a00;
        }

        .stock-out {
            background: #ffe8e8;

            color: #b42323;
        }

        .btn-primary {
            background: #174ea6;

            border-color: #174ea6;

            border-radius: 9px;

            font-size: 13px;

            padding: 10px 18px;
        }

        .btn-primary:hover {
            background: #0d3b7a;

            border-color: #0d3b7a;
        }

        .btn-light {
            border: 1px solid #d8e5f5;

            border-radius: 9px;

            font-size: 13px;
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

        }

        @media (max-width: 767px) {

            .content {
                padding: 16px;
            }

            .navbar-custom {
                height: 62px;

                padding: 0 15px;
            }

            .product-card-body {
                padding: 18px;
            }

            .product-photo,
            .no-image {
                max-width: 100%;

                height: 240px;
            }

            .product-name {
                font-size: 22px;
            }

        }

    </style>

</head>

<body>


<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">

        <div class="brand">

            <div class="brand-icon">
                <i class="bi bi-droplet-fill"></i>
            </div>

            <div class="brand-text">
                Water Station
                <small>Admin Panel</small>
            </div>

        </div>

        <button
            class="close-sidebar"
            onclick="closeSidebar()"
        >
            ×
        </button>

    </div>


    <div class="sidebar-menu">

        <div class="menu-title">
            Main Menu
        </div>

        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.users.index') }}">
            <i class="bi bi-people"></i>
            User Management
        </a>

        <a
            href="{{ route('admin.products.index') }}"
            class="active"
        >
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>

        <a href="{{ route('admin.orders.index') }}">
            <i class="bi bi-cart3"></i>
            Orders
        </a>

        <a href="{{ route('admin.deliveries.index') }}">
            <i class="bi bi-truck"></i>
            Deliveries
        </a>

        <a href="{{ route('admin.inventory.index') }}">
            <i class="bi bi-boxes"></i>
            Inventory
        </a>

        <a href="{{ route('admin.reports') }}">
            <i class="bi bi-bar-chart"></i>
            Reports & Analytics
        </a>

        <div class="menu-title mt-3">
            Account
        </div>

        <a href="{{ route('admin.account') }}">
            <i class="bi bi-person-circle"></i>
            My Account
        </a>

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


<div class="main" id="main">


    <nav class="navbar-custom">

        <button
            class="menu-btn"
            onclick="openSidebar()"
        >
            <i class="bi bi-list"></i>
        </button>


        <div class="admin-profile">

            @if(auth()->user()->profile_picture)

                <img
                    src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                    class="profile-image"
                    alt="Profile"
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


    <main class="content">

        <h1 class="page-title">
            Product Details
        </h1>

        <p class="page-subtitle">
            View complete information about this product.
        </p>


        <div class="product-card">

            <div class="product-card-body">

                <div class="row g-4 align-items-center">


                    <!-- IMAGE -->

                    <div class="col-lg-5 text-center">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="product-photo"
                            >

                        @else

                            <div class="no-image">
                                <i class="bi bi-droplet"></i>
                            </div>

                        @endif

                    </div>


                    <!-- DETAILS -->

                    <div class="col-lg-7">

                        <h2 class="product-name">
                            {{ $product->name }}
                        </h2>


                        <span class="category-badge">
                            {{ $product->category }}
                        </span>


                        <div class="detail-row">

                            <span class="detail-label">
                                Product ID
                            </span>

                            <span class="detail-value">
                                #{{ $product->id }}
                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="detail-label">
                                Price
                            </span>

                            <span class="price-value">
                                ₱{{ number_format($product->price, 2) }}
                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="detail-label">
                                Current Stock
                            </span>

                            <span class="detail-value">

                                @if($product->stock <= 0)

                                    <span class="stock-badge stock-out">
                                        Out of Stock
                                    </span>

                                @elseif($product->stock <= 10)

                                    <span class="stock-badge stock-low">
                                        {{ $product->stock }} left
                                    </span>

                                @else

                                    <span class="stock-badge stock-good">
                                        {{ $product->stock }} available
                                    </span>

                                @endif

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="detail-label">
                                Date Added
                            </span>

                            <span class="detail-value">
                                {{ $product->created_at->format('F d, Y h:i A') }}
                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="detail-label">
                                Last Updated
                            </span>

                            <span class="detail-value">
                                {{ $product->updated_at->format('F d, Y h:i A') }}
                            </span>

                        </div>


                        <div class="d-flex gap-2 mt-4">

                            <a
                                href="{{ route('admin.products.index') }}"
                                class="btn btn-light"
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Back
                            </a>

                            <a
                                href="{{ route('admin.products.edit', $product) }}"
                                class="btn btn-primary"
                            >
                                <i class="bi bi-pencil-square me-1"></i>
                                Edit Product
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>


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


    window.addEventListener('resize', function () {

        const sidebar =
            document.getElementById('sidebar');

        const main =
            document.getElementById('main');

        if (window.innerWidth <= 991) {

            sidebar.classList.remove('hidden');

            main.classList.remove('expanded');

        }

    });

</script>

</body>
</html>