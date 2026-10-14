<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Staff Account | Water Station</title>

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

        /* BODY */
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #f2fbfa 0%, #f7fcfc 50%, #e9f6f5 100%);
            color: #234344;
            min-height: 100vh;
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
            box-shadow: 6px 0 22px rgba(0, 78, 79, .16);
        }

        .sidebar.hidden {
            left: -260px;
        }

        /* SIDEBAR HEADER */
        .sidebar-header {
            height: 70px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, .16);
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
            background: rgba(255, 255, 255, .14);
            border: 1px solid rgba(255, 255, 255, .18);
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* SIDEBAR MENU */
        .sidebar-menu {
            padding: 18px 12px;
        }

        .menu-title {
            padding: 8px 12px;
            margin-bottom: 5px;
            color: rgba(255, 255, 255, .58);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: rgba(255, 255, 255, .88);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255, 255, 255, .15);
            color: #ffffff;
            transform: translateX(2px);
        }

        /* LOGOUT */
        .logout-link {
            width: 100%;
            border: none;
            background: transparent;
            color: rgba(255, 255, 255, .88);
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
            background: rgba(255, 255, 255, .15);
            color: #ffffff;
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
            background: rgba(255, 255, 255, .97);
            border-bottom: 1px solid #d8eceb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 2500;
            box-shadow: 0 3px 15px rgba(0, 100, 100, .05);
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
        }

        /* STAFF PROFILE TOPBAR */
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
            text-transform: capitalize;
        }

        /* CONTENT */
        .content {
            padding: 26px;
        }

        /* ACCOUNT CARD */
        .account-card {
            background: rgba(255, 255, 255, .98);
            border: 1px solid #d9ecea;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 6px 18px rgba(0, 90, 90, .07);
        }

        /* CARD HEADER */
        .card-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 21px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e3f0ef;
        }

        .card-heading-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            background: #e0f3f1;
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .card-heading h3 {
            margin: 0;
            color: #126968;
            font-size: 18px;
            font-weight: 700;
        }

        .card-heading p {
            margin: 3px 0 0;
            color: #789090;
            font-size: 11px;
        }

        /* STAFF PROFILE */
        .profile-section {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e3f0ef;
        }

        .account-profile-image {
            width: 92px;
            height: 92px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #dcefed;
            box-shadow: 0 5px 18px rgba(0, 90, 90, .10);
        }

        .account-profile-placeholder {
            width: 92px;
            height: 92px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e0f3f1, #d4eeeb);
            color: #08716e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            border: 4px solid #dcefed;
            box-shadow: 0 5px 18px rgba(0, 90, 90, .10);
        }

        .profile-details h4 {
            margin: 0 0 5px;
            color: #126968;
            font-size: 20px;
            font-weight: 700;
        }

        .profile-details p {
            margin: 0;
            color: #789090;
            font-size: 12px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 9px;
            padding: 6px 11px;
            border-radius: 20px;
            background: #e0f3f1;
            color: #08716e;
            font-size: 10px;
            font-weight: 700;
        }

        /* FORM */
        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #416667;
            margin-bottom: 7px;
        }

        .form-control {
            min-height: 44px;
            border: 1px solid #cfe3e1;
            border-radius: 10px;
            background: #fbfefe;
            color: #234344;
            font-size: 13px;
        }

        .form-control:focus {
            border-color: #49a39e;
            box-shadow: 0 0 0 .2rem rgba(8, 113, 110, .10);
        }

        textarea.form-control {
            min-height: 105px;
            resize: vertical;
        }

        .form-text {
            margin-top: 6px;
            font-size: 10px;
            color: #789090;
        }

        /* STAFF BUTTONS */
        .save-btn {
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            background: linear-gradient(135deg, #18817d, #08716e);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .save-btn:hover {
            background: linear-gradient(135deg, #126968, #075c59);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .password-btn {
            border: 1px solid #bcdedb;
            border-radius: 10px;
            padding: 10px 18px;
            background: #e0f3f1;
            color: #08716e;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .password-btn:hover {
            background: #d0ece8;
            color: #075c59;
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

            .topbar {
                padding: 0 20px;
            }

        }

        @media (max-width: 767px) {

            .content {
                padding: 16px;
            }

            .topbar {
                height: 62px;
                padding: 0 15px;
            }

            .profile-section {
                align-items: flex-start;
                gap: 15px;
            }

            .account-profile-image,
            .account-profile-placeholder {
                width: 78px;
                height: 78px;
            }

            .account-profile-placeholder {
                font-size: 31px;
            }

            .profile-details h4 {
                font-size: 18px;
            }

        }

        @media (max-width: 576px) {

            .profile-name,
            .profile-role {
                display: none;
            }

            .save-btn,
            .password-btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     STAFF SIDEBAR
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
            id="closeSidebarBtn"
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
        <a href="{{ route('staff.products.index') }}">

            <i class="bi bi-droplet-fill"></i>
            Products

        </a>


        <!-- INVENTORY -->
        <a href="{{ route('staff.inventory.index') }}">

            <i class="bi bi-boxes"></i>
            Inventory

        </a>


        <!-- DELIVERIES -->
        <a href="{{ route('staff.deliveries.index') }}">

            <i class="bi bi-truck"></i>
            Deliveries

        </a>


        <!-- EMAIL NOTIFICATIONS -->
        <a href="{{ route('staff.emails.create') }}">

            <i class="bi bi-envelope-fill"></i>
            Email Notifications

        </a>


        <div class="menu-title mt-3">
            Account
        </div>


        <!-- ACCOUNT -->
        <a
            href="{{ route('staff.account') }}"
            class="active"
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


        <!-- STAFF PROFILE -->
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


        <!-- SUCCESS -->
        @if(session('success'))

            <div class="alert alert-success custom-alert mb-3">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

            </div>

        @endif



        <!-- ERROR -->
        @if(session('error'))

            <div class="alert alert-danger custom-alert mb-3">

                <i class="bi bi-exclamation-circle-fill me-2"></i>

                {{ session('error') }}

            </div>

        @endif



        <!-- VALIDATION -->
        @if($errors->any())

            <div class="alert alert-danger custom-alert mb-3">

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



        <!-- =================================================
             PERSONAL INFORMATION
        ================================================= -->

        <div class="account-card">

            <div class="card-heading">

                <div class="card-heading-icon">
                    <i class="bi bi-person-vcard"></i>
                </div>

                <div>

                    <h3>
                        Personal Information
                    </h3>

                    <p>
                        Keep your staff information up to date.
                    </p>

                </div>

            </div>



            <!-- PROFILE -->
            <div class="profile-section">

                @if($user->profile_picture)

                    <img
                        src="{{ asset('storage/' . $user->profile_picture) }}"
                        alt="Staff Profile"
                        class="account-profile-image"
                    >

                @else

                    <div class="account-profile-placeholder">
                        <i class="bi bi-person-fill"></i>
                    </div>

                @endif


                <div class="profile-details">

                    <h4>
                        {{ $user->name }}
                    </h4>

                    <p>
                        {{ $user->email }}
                    </p>

                    <span class="role-badge">

                        <i class="bi bi-person-badge-fill"></i>
                        Staff

                    </span>

                </div>

            </div>



            <!-- UPDATE PROFILE -->
            <form
                action="{{ route('staff.account.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="row g-3">


                    <div class="col-md-6">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $user->name) }}"
                            required
                        >

                    </div>



                    <div class="col-md-6">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $user->email) }}"
                            required
                        >

                    </div>



                    <div class="col-md-4">

                        <label class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            name="age"
                            class="form-control"
                            value="{{ old('age', $user->age) }}"
                            min="1"
                            max="120"
                        >

                    </div>



                    <div class="col-md-4">

                        <label class="form-label">
                            Birthdate
                        </label>

                        <input
                            type="date"
                            name="birthdate"
                            class="form-control"
                            value="{{ old('birthdate', $user->birthdate) }}"
                        >

                    </div>



                    <div class="col-md-4">

                        <label class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ old('phone_number', $user->phone_number) }}"
                        >

                    </div>



                    <div class="col-12">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                        >{{ old('address', $user->address) }}</textarea>

                    </div>



                    <div class="col-12">

                        <label class="form-label">
                            Profile Picture
                        </label>

                        <input
                            type="file"
                            name="profile_picture"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="form-text">
                            JPG, JPEG, PNG, or WEBP.
                            Maximum file size: 2MB.
                        </div>

                    </div>


                </div>



                <div class="mt-4">

                    <button
                        type="submit"
                        class="save-btn"
                    >

                        <i class="bi bi-check2-circle me-1"></i>
                        Save Changes

                    </button>

                </div>

            </form>

        </div>



        <!-- =================================================
             CHANGE PASSWORD
        ================================================= -->

        <div class="account-card">

            <div class="card-heading">

                <div class="card-heading-icon">
                    <i class="bi bi-lock"></i>
                </div>

                <div>

                    <h3>
                        Change Password
                    </h3>

                    <p>
                        Update your staff account password securely.
                    </p>

                </div>

            </div>



            <form
                action="{{ route('staff.account.password') }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div class="row g-3">


                    <div class="col-md-4">

                        <label class="form-label">
                            Current Password
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required
                        >

                    </div>



                    <div class="col-md-4">

                        <label class="form-label">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>



                    <div class="col-md-4">

                        <label class="form-label">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >

                    </div>


                </div>



                <div class="mt-4">

                    <button
                        type="submit"
                        class="password-btn"
                    >

                        <i class="bi bi-shield-lock me-1"></i>
                        Update Password

                    </button>

                </div>

            </form>

        </div>


    </main>

</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

    const sidebar = document.getElementById('sidebar');

    const main = document.getElementById('main');

    const menuButton = document.getElementById('menuButton');

    const closeSidebarBtn = document.getElementById('closeSidebarBtn');


    function openSidebar() {

        if (window.innerWidth <= 991) {

            sidebar.classList.add('open');
            sidebar.classList.remove('hidden');

        } else {

            sidebar.classList.remove('hidden');
            main.classList.remove('expanded');

        }

    }


    function closeSidebar() {

        if (window.innerWidth <= 991) {

            sidebar.classList.remove('open');

        } else {

            sidebar.classList.add('hidden');
            main.classList.add('expanded');

        }

    }


    if (menuButton) {

        menuButton.addEventListener('click', openSidebar);

    }


    if (closeSidebarBtn) {

        closeSidebarBtn.addEventListener('click', closeSidebar);

    }


    window.addEventListener('resize', function () {

        if (window.innerWidth > 991) {

            sidebar.classList.remove('open');

        }

    });

</script>


</body>

</html>