<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Product - Water Station Admin</title>

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

        /* SIDEBAR */

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
                rgba(23,78,166,.18);
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

            line-height: 1;
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

        .logout-link i {
            width: 20px;

            text-align: center;

            font-size: 17px;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.17);

            color: white;
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


        /* NAVBAR */

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

            cursor: pointer;

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

            font-size: 19px;

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


        /* CONTENT */

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
            color: #6b8299;

            font-size: 13px;

            margin-bottom: 24px;
        }


        /* FORM CARD */

        .form-card {
            background: white;

            border: 1px solid #dce8f6;

            border-radius: 16px;

            box-shadow:
                0 5px 20px rgba(23,78,166,.06);

            overflow: hidden;
        }

        .form-card-header {
            padding: 18px 22px;

            border-bottom: 1px solid #e5eef8;

            font-size: 16px;

            font-weight: 700;
        }

        .form-body {
            padding: 25px;
        }

        .form-label {
            font-size: 12px;

            font-weight: 600;

            color: #35546e;

            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #d4e2f2;

            border-radius: 9px;

            padding: 10px 12px;

            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8db6e8;

            box-shadow:
                0 0 0 .2rem rgba(37,99,184,.10);
        }

        .form-text {
            font-size: 11px;

            color: #8297aa;
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

        .error-text {
            color: #b42323;

            font-size: 11px;

            margin-top: 5px;
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

            .profile-name {
                font-size: 13px;
            }

            .profile-role {
                font-size: 10px;
            }

            .form-body {
                padding: 18px;
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
            Add Product
        </h1>

        <p class="page-subtitle">
            Add a new water product to your inventory.
        </p>


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Please check the following:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="form-card">

            <div class="form-card-header">

                <i class="bi bi-droplet-fill me-2"></i>

                Product Information

            </div>


            <div class="form-body">

                <form
                    action="{{ route('admin.products.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    <div class="row g-4">


                        <!-- NAME -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Product Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="e.g. Purified Water 5 Gallons"
                                required
                            >

                            @error('name')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- CATEGORY -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Category
                            </label>

                            <input
                                type="text"
                                name="category"
                                class="form-control"
                                value="{{ old('category') }}"
                                placeholder="e.g. Purified Water"
                                required
                            >

                            @error('category')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- PRICE -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Price
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    ₱
                                </span>

                                <input
                                    type="number"
                                    name="price"
                                    class="form-control"
                                    value="{{ old('price') }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0.00"
                                    required
                                >

                            </div>

                            @error('price')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- STOCK -->

                        <div class="col-md-6">

                            <label class="form-label">
                                Initial Stock
                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control"
                                value="{{ old('stock', 0) }}"
                                min="0"
                                placeholder="Enter stock quantity"
                                required
                            >

                            @error('stock')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <!-- IMAGE -->

                        <div class="col-12">

                            <label class="form-label">
                                Product Image
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <div class="form-text">
                                JPG, JPEG, PNG, or WEBP. Maximum file size: 2MB.
                            </div>

                            @error('image')

                                <div class="error-text">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    <div class="d-flex justify-content-end gap-2 mt-4">

                        <a
                            href="{{ route('admin.products.index') }}"
                            class="btn btn-light"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Add Product
                        </button>

                    </div>

                </form>

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