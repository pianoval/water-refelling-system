<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Order - Water Station</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(
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
            background: linear-gradient(
                180deg,
                #0d3b7a 0%,
                #174ea6 48%,
                #2563b8 100%
            );
            color: white;
            z-index: 1000;
            overflow-y: auto;
            transition: .3s ease;
            box-shadow: 6px 0 25px rgba(23,78,166,.18);
        }

        .sidebar.hidden {
            left: -260px;
        }

        .sidebar-header {
            padding: 25px 20px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,.18);
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
            border: 1px solid rgba(255,255,255,.20);
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
            margin-top: 5px;
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
            text-align: left;
        }

        .logout-link i {
            width: 20px;
            text-align: center;
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
            background: linear-gradient(135deg,#e8f1ff,#d5e5ff);
            color: #174ea6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
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
        }

        .page-title {
            font-size: 25px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #6b849d;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .order-card {
            background: white;
            border: 1px solid #dbe8f7;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(23,78,166,.06);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 18px;
            border-bottom: 1px solid #edf3fa;
            margin-bottom: 20px;
        }

        .order-id {
            font-size: 20px;
            font-weight: 700;
        }

        .info-label {
            font-size: 11px;
            color: #7b91a8;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #183b5b;
        }

        .info-box {
            background: #f7faff;
            border: 1px solid #e2edf9;
            border-radius: 11px;
            padding: 14px;
            height: 100%;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #e8f1ff;
            color: #174ea6;
            font-size: 12px;
            font-weight: 600;
        }

        .back-btn {
            background: #e8f1ff;
            color: #174ea6;
            border: none;
            border-radius: 9px;
            padding: 9px 14px;
            text-decoration: none;
            font-size: 13px;
        }

        @media (max-width:991px) {
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

        @media (max-width:767px) {
            .content {
                padding: 16px;
            }

            .navbar-custom {
                height: 62px;
                padding: 0 15px;
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
            title="Close Sidebar"
        >
            ×
        </button>

    </div>

    <div class="sidebar-menu">

        <div class="menu-title">Main Menu</div>

        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.users.index') }}">
            <i class="bi bi-people"></i>
            User Management
        </a>

        <a href="{{ route('admin.products.index') }}">
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>

        <a href="{{ route('admin.orders.index') }}" class="active">
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

        <div class="menu-title mt-3">Account</div>

        <a href="{{ route('admin.account') }}">
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


<div class="main" id="main">

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
                    class="profile-image"
                    alt="Profile"
                >

            @else

                <div class="profile-placeholder">
                    <i class="bi bi-person-fill"></i>
                </div>

            @endif

            <div>
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

        <div class="page-title">
            View Order
        </div>

        <div class="page-subtitle">
            View complete order information.
        </div>


        <div class="order-card">

            <div class="order-header">

                <div class="order-id">
                    Order #{{ $order->id }}
                </div>

                <span class="status-badge">
                    {{ $order->status }}
                </span>

            </div>


            <div class="row g-3">

                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-label">Customer Name</div>
                        <div class="info-value">
                            {{ $order->customer_name }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-label">Customer Email</div>
                        <div class="info-value">
                            {{ $order->customer_email ?? 'Not provided' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value">
                            {{ $order->phone_number ?? 'Not provided' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-box">
                        <div class="info-label">Product</div>
                        <div class="info-value">
                            {{ $order->product_name }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <div class="info-label">Quantity</div>
                        <div class="info-value">
                            {{ $order->quantity }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <div class="info-label">Total Amount</div>
                        <div class="info-value">
                            ₱{{ number_format($order->total_amount, 2) }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box">
                        <div class="info-label">Order Date</div>
                        <div class="info-value">
                            {{ $order->order_date
                                ? $order->order_date->format('M d, Y')
                                : $order->created_at->format('M d, Y')
                            }}
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="info-box">
                        <div class="info-label">Delivery Address</div>
                        <div class="info-value">
                            {{ $order->delivery_address ?? 'Not provided' }}
                        </div>
                    </div>
                </div>

            </div>


            <div class="mt-4">

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="back-btn"
                >
                    <i class="bi bi-arrow-left me-1"></i>
                    Back to Orders
                </a>

                <a
                    href="{{ route('admin.orders.edit', $order) }}"
                    class="btn btn-primary ms-2"
                >
                    <i class="bi bi-pencil-square me-1"></i>
                    Update Status
                </a>

            </div>

        </div>

    </main>

</div>


<script>

function openSidebar() {

    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    if (window.innerWidth <= 991) {

        sidebar.classList.add('open');
        sidebar.classList.remove('hidden');

    } else {

        sidebar.classList.remove('hidden');
        main.classList.remove('expanded');

    }
}

function closeSidebar() {

    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    if (window.innerWidth <= 991) {

        sidebar.classList.remove('open');

    } else {

        sidebar.classList.add('hidden');
        main.classList.add('expanded');

    }
}

window.addEventListener('resize', function () {

    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    if (window.innerWidth <= 991) {

        sidebar.classList.remove('hidden');
        main.classList.remove('expanded');

    }

});

</script>

</body>
</html>