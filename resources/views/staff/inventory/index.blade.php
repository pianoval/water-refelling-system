<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Inventory | Water Station</title>

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
            color: #ffffff;
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
            color: #234344;
        }

        .profile-role {
            margin: 2px 0 0;
            color: #08716e;
            font-size: 10px;
        }

        /* CONTENT */
        .content {
            padding: 14px 26px 26px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
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

        .page-heading p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #789090;
        }

        /* SUMMARY CARDS */
        .summary-card {
            background: #ffffff;
            border: 1px solid #d9ecea;
            border-radius: 17px;
            padding: 20px;
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .summary-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 26px rgba(0,90,90,.13);
            border-color: #add7d3;
        }

        .summary-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 12px;
            transition: transform .25s ease;
        }

        .summary-card:hover .summary-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .summary-label {
            color: #789090;
            font-size: 11px;
            font-weight: 600;
        }

        .summary-number {
            margin-top: 3px;
            color: #126968;
            font-size: 28px;
            font-weight: 700;
        }

        .summary-card.low {
            border-color: #f5dfb4;
        }

        .summary-card.low .summary-icon {
            background: #fff4df;
            color: #ef6c00;
        }

        .summary-card.low .summary-number {
            color: #ef6c00;
        }

        .summary-card.low:hover {
            border-color: #f0c875;
            box-shadow: 0 12px 26px rgba(239,108,0,.12);
        }

        .summary-card.out {
            border-color: #f0cece;
        }

        .summary-card.out .summary-icon {
            background: #ffebee;
            color: #c62828;
        }

        .summary-card.out .summary-number {
            color: #c62828;
        }

        .summary-card.out:hover {
            border-color: #e5aaaa;
            box-shadow: 0 12px 26px rgba(198,40,40,.12);
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            right: -35px;
            top: -35px;
            background: rgba(24,129,125,.05);
            pointer-events: none;
        }

        .summary-card.low::after {
            background: rgba(239,108,0,.06);
        }

        .summary-card.out::after {
            background: rgba(198,40,40,.06);
        }

        /* INVENTORY TABLE */
        .inventory-card {
            margin-top: 22px;
            background: #ffffff;
            border: 1px solid #d9ecea;
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,90,90,.06);
        }

        .inventory-header {
            padding: 18px 20px;
            border-bottom: 1px solid #edf3f2;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inventory-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #234344;
        }

        .inventory-header span {
            padding: 6px 10px;
            border-radius: 20px;
            background: #e0f3f1;
            color: #08716e;
            font-size: 10px;
            font-weight: 700;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .inventory-table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
        }

        .inventory-table th {
            padding: 13px 14px;
            background: #edf8f7;
            color: #567575;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .inventory-table td {
            padding: 14px;
            border-top: 1px solid #edf3f2;
            font-size: 12px;
            color: #526f6f;
            vertical-align: middle;
        }

        .inventory-table tbody tr:hover {
            background: #f9fdfd;
        }

        /* STOCK BADGES */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .stock-good {
            background: #e5f7ed;
            color: #19734a;
        }

        .stock-low {
            background: #fff3d8;
            color: #a16207;
        }

        .stock-out {
            background: #ffe9e9;
            color: #c62828;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #789090;
        }

        .empty-state i {
            font-size: 43px;
            color: #9ab5b3;
            margin-bottom: 10px;
        }

        .empty-state h5 {
            margin: 0 0 5px;
            color: #516e6e;
            font-size: 15px;
            font-weight: 700;
        }

        .empty-state p {
            margin: 0;
            font-size: 11px;
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
                padding: 14px 22px 22px;
            }
        }

        @media (max-width: 767px) {
            .content {
                padding: 14px 16px 18px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 12px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }
        }

        /* ACCESSIBILITY */
        @media (prefers-reduced-motion: reduce) {
            .summary-card,
            .summary-icon {
                transition: none;
            }
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
        <a href="{{ route('staff.products.index') }}">
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>

        <!-- INVENTORY -->
        <a
            href="{{ route('staff.inventory.index') }}"
            class="active"
        >
            <i class="bi bi-boxes"></i>
            Inventory
        </a>

        <!-- DELIVERIES -->
        <a href="{{ route('staff.deliveries.index') }}">
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
                    <i class="bi bi-boxes"></i>
                </div>

                <div>
                    <h1>Inventory</h1>

                    <p>
                        Monitor water product stock levels.
                    </p>
                </div>

            </div>
        </div>

        <!-- SUMMARY CARDS -->
        <div class="row g-3">

            <!-- TOTAL PRODUCTS -->
            <div class="col-xl-3 col-md-6">
                <div class="summary-card">

                    <div class="summary-icon">
                        <i class="bi bi-droplet-fill"></i>
                    </div>

                    <div class="summary-label">
                        Total Products
                    </div>

                    <div class="summary-number">
                        {{ $totalProducts }}
                    </div>

                </div>
            </div>

            <!-- TOTAL STOCK -->
            <div class="col-xl-3 col-md-6">
                <div class="summary-card">

                    <div class="summary-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div class="summary-label">
                        Total Stock
                    </div>

                    <div class="summary-number">
                        {{ $totalStock }}
                    </div>

                </div>
            </div>

            <!-- LOW STOCK -->
            <div class="col-xl-3 col-md-6">
                <div class="summary-card low">

                    <div class="summary-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>

                    <div class="summary-label">
                        Low Stock
                    </div>

                    <div class="summary-number">
                        {{ $lowStock }}
                    </div>

                </div>
            </div>

            <!-- OUT OF STOCK -->
            <div class="col-xl-3 col-md-6">
                <div class="summary-card out">

                    <div class="summary-icon">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>

                    <div class="summary-label">
                        Out of Stock
                    </div>

                    <div class="summary-number">
                        {{ $outOfStock }}
                    </div>

                </div>
            </div>

        </div>

        <!-- INVENTORY TABLE -->
        <div class="inventory-card">

            <div class="inventory-header">

                <h3>
                    Product Stock Monitoring
                </h3>

                <span>
                    {{ $totalProducts }} Products
                </span>

            </div>

            <div class="table-wrapper">

                @if($products->count() > 0)

                    <table class="inventory-table">

                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Current Stock</th>
                                <th>Stock Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($products as $product)

                                <tr>

                                    <!-- PRODUCT -->
                                    <td>
                                        <strong>
                                            {{ $product->name }}
                                        </strong>
                                    </td>

                                    <!-- CATEGORY -->
                                    <td>
                                        {{ $product->category ?? 'Water Product' }}
                                    </td>

                                    <!-- PRICE -->
                                    <td>
                                        ₱{{ number_format($product->price, 2) }}
                                    </td>

                                    <!-- STOCK -->
                                    <td>
                                        <strong>
                                            {{ $product->stock }}
                                        </strong>
                                    </td>

                                    <!-- STATUS -->
                                    <td>

                                        @if($product->stock <= 0)

                                            <span class="stock-badge stock-out">
                                                <i class="bi bi-x-circle"></i>
                                                Out of Stock
                                            </span>

                                        @elseif($product->stock <= 10)

                                            <span class="stock-badge stock-low">
                                                <i class="bi bi-exclamation-circle"></i>
                                                Low Stock
                                            </span>

                                        @else

                                            <span class="stock-badge stock-good">
                                                <i class="bi bi-check-circle"></i>
                                                Available
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty-state">

                        <i class="bi bi-boxes"></i>

                        <h5>
                            No Products in Inventory
                        </h5>

                        <p>
                            Add products first to monitor their stock levels.
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