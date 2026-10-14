<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Update Order - Water Station</title>

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

        .form-card {
            background: white;
            border: 1px solid #dbe8f7;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 18px rgba(23,78,166,.06);
            max-width: 700px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #375875;
        }

        .form-control,
        .form-select {
            border: 1px solid #cdddec;
            border-radius: 9px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #7ca9dc;
            box-shadow: 0 0 0 .2rem rgba(23,78,166,.08);
        }

        .order-summary {
            background: #f5f9ff;
            border: 1px solid #dceafa;
            border-radius: 11px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .summary-label {
            font-size: 11px;
            color: #71869b;
        }

        .summary-value {
            font-size: 14px;
            font-weight: 600;
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
            Update Order
        </div>

        <div class="page-subtitle">
            Update the current status of this customer order.
        </div>


        <div class="form-card">

            <div class="order-summary">

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="summary-label">
                            Order ID
                        </div>

                        <div class="summary-value">
                            #{{ $order->id }}
                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="summary-label">
                            Customer
                        </div>

                        <div class="summary-value">
                            {{ $order->customer_name }}
                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="summary-label">
                            Product
                        </div>

                        <div class="summary-value">
                            {{ $order->product_name }}
                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="summary-label">
                            Quantity
                        </div>

                        <div class="summary-value">
                            {{ $order->quantity }}
                        </div>

                    </div>

                </div>

            </div>


            <form
                action="{{ route('admin.orders.update', $order) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="mb-4">

                    <label class="form-label">
                        Order Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="Pending"
                            {{ $order->status === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Confirmed"
                            {{ $order->status === 'Confirmed' ? 'selected' : '' }}
                        >
                            Confirmed
                        </option>

                        <option
                            value="Preparing"
                            {{ $order->status === 'Preparing' ? 'selected' : '' }}
                        >
                            Preparing
                        </option>

                        <option
                            value="Out for Delivery"
                            {{ $order->status === 'Out for Delivery' ? 'selected' : '' }}
                        >
                            Out for Delivery
                        </option>

                        <option
                            value="Delivered"
                            {{ $order->status === 'Delivered' ? 'selected' : '' }}
                        >
                            Delivered
                        </option>

                        <option
                            value="Cancelled"
                            {{ $order->status === 'Cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                    @error('status')

                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.orders.index') }}"
                        class="btn btn-light"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Update Status
                    </button>

                </div>

            </form>

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