<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Staff Products | Water Station</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

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
            color: #ffffff;
            z-index: 3000;
            overflow-y: auto;
            transition: .3s ease;
            box-shadow: 6px 0 22px rgba(0,78,79,.16);
        }

        .sidebar.hidden {
            left: -260px;
        }

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
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 19px;
        }

        .close-sidebar:hover {
            background: rgba(255,255,255,.10);
            border-radius: 8px;
        }

        .sidebar-menu {
            padding: 18px 12px;
        }

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
            color: #ffffff;
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
            transition: .2s ease;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.15);
            color: #ffffff;
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

        .main.expanded {
            margin-left: 0;
        }

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

        .topbar-left {
            display: flex;
            align-items: center;
        }

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

        .menu-btn:hover {
            background: #d2efec;
            transform: scale(1.03);
        }

        .profile {
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
            border: 2px solid #b9dfdc;
        }

        .profile-placeholder {
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .profile-name {
            margin: 0;
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            margin: 2px 0 0;
            color: #08716e;
            font-size: 10px;
        }

        /* CONTENT */
        .content {
            padding: 26px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .page-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 27px;
            font-weight: 700;
            color: #126968;
        }

        /* ADD BUTTON */
        .add-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 15px;
            border-radius: 9px;
            background: linear-gradient(135deg, #0b6d6a, #18817d);
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #095b59, #126e6b);
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* ALERT */
        .custom-alert {
            border: none;
            border-radius: 11px;
            font-size: 12px;
            margin-bottom: 18px;
        }

        /* PRODUCT CARD */
        .product-card {
            background: #ffffff;
            border: 1px solid #d9ecea;
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
            height: 100%;
            transition: .25s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(0,90,90,.10);
        }

        .product-image {
            width: 100%;
            height: 190px;
            object-fit: cover;
            background: #e0f3f1;
        }

        .no-image {
            width: 100%;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e0f3f1;
            color: #08716e;
            font-size: 45px;
        }

        .product-body {
            padding: 18px;
        }

        .product-name {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #234344;
        }

        .product-category {
            font-size: 11px;
            color: #789090;
            margin-bottom: 8px;
        }

        .product-price {
            font-size: 19px;
            font-weight: 700;
            color: #08716e;
        }

        .product-stock {
            font-size: 11px;
            margin-top: 5px;
        }

        .button-row {
            margin-top: 15px;
            display: flex;
            gap: 6px;
        }

        .edit-btn {
            background: #e0f3f1;
            color: #08716e;
            border: none;
        }

        .edit-btn:hover {
            background: #d1ece9;
            color: #075c59;
        }

        .delete-btn {
            background: #ffebee;
            color: #c62828;
            border: none;
        }

        .delete-btn:hover {
            background: #ffcdd2;
            color: #b71c1c;
        }

        /* EMPTY STATE */
        .empty-card {
            background: #ffffff;
            border: 1px solid #d9ecea;
            border-radius: 17px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
        }

        .empty-card i {
            font-size: 48px;
            color: #90aaa9;
        }

        .empty-card h5 {
            margin-top: 15px;
            font-size: 17px;
            font-weight: 700;
        }

        .empty-card p {
            color: #789090;
            font-size: 12px;
        }

        /* RESPONSIVE */
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

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .profile-name,
            .profile-role {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar" id="sidebar">

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
        >
            <i class="bi bi-x-lg"></i>
        </button>

    </div>

    <div class="sidebar-menu">

        <div class="menu-title">
            Main Menu
        </div>

        <!-- DASHBOARD -->
        <a href="{{ route('staff.dashboard') }}">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <!-- ORDERS -->
        <a href="{{ route('staff.orders.index') }}">
            <i class="bi bi-cart-check-fill"></i>
            Orders
        </a>

        <!-- PRODUCTS -->
        <a
            href="{{ route('staff.products.index') }}"
            class="active"
        >
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>

        <!-- INVENTORY -->
        <a href="{{ route('staff.inventory.index') }}">
            <i class="bi bi-boxes"></i>
            Inventory
        </a>

        <!-- DELIVERIES -->
        <a
            href="{{ route('staff.deliveries.index') }}"
            class="{{ request()->routeIs('staff.deliveries.*') ? 'active' : '' }}"
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
        <a href="{{ route('staff.account') }}">
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

<div class="main" id="main">

    <!-- TOPBAR -->
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
                <p class="profile-name">
                    {{ auth()->user()->name }}
                </p>

                <p class="profile-role">
                    Staff
                </p>
            </div>

        </div>
    </nav>

    <!-- CONTENT -->
    <main class="content">

        <!-- PAGE HEADER -->
        <div class="page-header">

            <div class="page-heading">

                <div class="page-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>

                <div>
                    <h1>
                        Water Products
                    </h1>
                </div>

            </div>

            <a
                href="{{ route('staff.products.create') }}"
                class="add-btn"
            >
                <i class="bi bi-plus-circle"></i>
                Add Product
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success custom-alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="alert alert-danger custom-alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- PRODUCT GRID -->
        <div class="row g-4">

            @forelse($products as $product)

                <div class="col-xl-4 col-lg-4 col-md-6">

                    <div class="product-card">

                        <!-- PRODUCT IMAGE -->
                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                class="product-image"
                                alt="{{ $product->name }}"
                            >

                        @else

                            <div class="no-image">
                                <i class="bi bi-droplet-fill"></i>
                            </div>

                        @endif

                        <!-- PRODUCT BODY -->
                        <div class="product-body">

                            <div class="product-name">
                                {{ $product->name }}
                            </div>

                            <div class="product-category">
                                {{ $product->category ?? 'Water Product' }}
                            </div>

                            <div class="product-price">
                                ₱{{ number_format($product->price, 2) }}
                            </div>

                            <!-- STOCK -->
                            <div class="product-stock">

                                @if($product->stock <= 0)

                                    <span class="text-danger">
                                        <i class="bi bi-x-circle me-1"></i>
                                        Out of Stock
                                    </span>

                                @elseif($product->stock <= 10)

                                    <span class="text-warning">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        {{ $product->stock }} remaining
                                    </span>

                                @else

                                    <span class="text-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        {{ $product->stock }} available
                                    </span>

                                @endif

                            </div>

                            <!-- BUTTONS -->
                            <div class="button-row">

                                <!-- EDIT -->
                                <a
                                    href="{{ route('staff.products.edit', $product->id) }}"
                                    class="btn btn-sm edit-btn"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form
                                    action="{{ route('staff.products.destroy', $product->id) }}"
                                    method="POST"
                                    class="m-0"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this product?');"
                                    >
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">

                    <div class="empty-card">

                        <i class="bi bi-droplet"></i>

                        <h5>
                            No Products Available
                        </h5>

                        <p>
                            There are currently no water products.
                        </p>

                        <a
                            href="{{ route('staff.products.create') }}"
                            class="add-btn"
                        >
                            <i class="bi bi-plus-circle"></i>
                            Add Product
                        </a>

                    </div>
                </div>

            @endforelse

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
                sidebar.classList.remove('hidden');

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