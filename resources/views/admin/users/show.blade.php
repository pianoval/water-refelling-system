<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>View User | Water Refilling Station</title>

    <!-- Bootstrap -->
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

            border-bottom:
                1px solid
                rgba(255,255,255,.18);
        }


        .brand {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .brand-icon {
            width: 40px;
            height: 40px;

            background:
                rgba(255,255,255,.15);

            border:
                1px solid
                rgba(255,255,255,.20);

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


        /* CLOSE BUTTON */

        .close-sidebar {
            border: none;

            background: transparent;

            color: white;

            font-size: 25px;

            cursor: pointer;

            line-height: 1;

            padding: 0;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .close-sidebar:hover {
            opacity: .75;
        }


        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

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

            color:
                rgba(
                    255,
                    255,
                    255,
                    .88
                );

            text-decoration: none;

            padding: 11px 13px;

            border-radius: 11px;

            margin-bottom: 5px;

            font-size: 14px;

            transition: .2s;

            cursor: pointer;
        }


        .sidebar a i {
            width: 20px;

            text-align: center;

            font-size: 17px;
        }


        .sidebar a:hover,
        .sidebar a.active {
            background:
                rgba(
                    255,
                    255,
                    255,
                    .17
                );

            color: white;

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
            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    .88
                );

            background: transparent;

            border: none;

            text-decoration: none;

            padding: 11px 13px;

            border-radius: 11px;

            margin-bottom: 5px;

            font-size: 14px;

            transition: .2s;

            cursor: pointer;

            text-align: left;
        }


        .logout-link i {
            width: 20px;

            text-align: center;

            font-size: 17px;
        }


        .logout-link:hover {
            background:
                rgba(
                    255,
                    255,
                    255,
                    .17
                );

            color: white;

            transform:
                translateX(2px);
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 260px;

            min-height: 100vh;

            transition: .3s ease;
        }


        .main.expanded {
            margin-left: 0;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar-custom {
            height: 68px;

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

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;

            top: 0;

            z-index: 900;

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
            border: none;

            background:
                #e8f1ff;

            color: #174ea6;

            font-size: 24px;

            cursor: pointer;

            padding: 5px 9px;

            border-radius: 9px;

            transition: .2s;
        }


        .menu-btn:hover {
            background: #d7e6ff;

            transform: scale(1.03);
        }


        /* =====================================================
           ADMIN PROFILE
        ===================================================== */

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .profile-image {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            object-fit: cover;

            border:
                2px solid
                #b9d2f5;
        }


        .profile-placeholder {
            width: 38px;
            height: 38px;

            border-radius: 50%;

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

            border:
                1px solid
                #bdd4f5;
        }


        .profile-info {
            line-height: 1.1;
        }


        .profile-name {
            font-size: 14px;

            font-weight: 700;

            color: #183b5b;
        }


        .profile-role {
            font-size: 11px;

            color: #2563b8;

            text-transform: capitalize;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 28px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 22px;
        }


        .page-title {
            margin: 0;

            color: #17457d;

            font-size: 26px;

            font-weight: 700;
        }


        .page-subtitle {
            margin-top: 5px;

            margin-bottom: 0;

            color: #7189a3;

            font-size: 14px;
        }


        .back-btn {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 10px 15px;

            border-radius: 10px;

            background: #e8f1ff;

            color: #174ea6;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: .2s;
        }


        .back-btn:hover {
            background: #d7e6ff;

            color: #174ea6;
        }


        /* =====================================================
           USER CARD
        ===================================================== */

        .user-card {
            background:
                rgba(
                    255,
                    255,
                    255,
                    .98
                );

            border:
                1px solid
                #d5e3f5;

            border-radius: 18px;

            box-shadow:
                0 6px 18px
                rgba(
                    23,
                    78,
                    166,
                    .08
                );

            overflow: hidden;
        }


        .user-card-header {
            background:
                linear-gradient(
                    135deg,
                    #0d3b7a 0%,
                    #174ea6 48%,
                    #2563b8 100%
                );

            padding: 28px;

            color: white;

            display: flex;

            align-items: center;

            gap: 20px;
        }


        .user-photo {
            width: 90px;
            height: 90px;

            border-radius: 50%;

            object-fit: cover;

            border:
                4px solid
                rgba(
                    255,
                    255,
                    255,
                    .75
                );

            box-shadow:
                0 5px 15px
                rgba(0,0,0,.12);
        }


        .user-photo-placeholder {
            width: 90px;
            height: 90px;

            border-radius: 50%;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .15
                );

            border:
                4px solid
                rgba(
                    255,
                    255,
                    255,
                    .60
                );

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 42px;
        }


        .user-name {
            font-size: 24px;

            font-weight: 700;

            margin-bottom: 6px;
        }


        .user-email {
            font-size: 14px;

            opacity: .9;

            margin-bottom: 10px;
        }


        .role-badge {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    .18
                );

            color: white;

            font-size: 12px;

            font-weight: 600;

            text-transform: capitalize;
        }


        /* =====================================================
           INFORMATION
        ===================================================== */

        .information-body {
            padding: 28px;
        }


        .section-heading {
            color: #17457d;

            font-size: 18px;

            font-weight: 700;

            margin-bottom: 18px;
        }


        .info-box {
            background: #f7faff;

            border:
                1px solid
                #e0ebf8;

            border-radius: 13px;

            padding: 16px;

            height: 100%;

            transition: .2s;
        }


        .info-box:hover {
            border-color: #c8daf0;

            background: #f3f8ff;
        }


        .info-label {
            display: block;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .5px;

            color: #7189a3;

            margin-bottom: 5px;

            font-weight: 600;
        }


        .info-value {
            color: #183b5b;

            font-size: 14px;

            font-weight: 600;

            word-break: break-word;
        }


        .info-icon {
            color: #2563b8;

            margin-right: 5px;
        }


        /* =====================================================
           ADMIN NOTICE
        ===================================================== */

        .view-only-notice {
            margin-top: 22px;

            padding: 14px 16px;

            background: #edf4ff;

            border:
                1px solid
                #d5e3f5;

            border-radius: 12px;

            color: #4f6d8b;

            font-size: 13px;

            display: flex;

            align-items: center;

            gap: 9px;
        }


        .view-only-notice i {
            color: #2563b8;

            font-size: 18px;
        }


        /* =====================================================
           MOBILE
        ===================================================== */

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

            .navbar-custom {
                padding: 0 20px;
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

            .page-header {
                align-items: flex-start;

                gap: 12px;

                flex-direction: column;
            }

            .page-title {
                font-size: 22px;
            }

            .user-card-header {
                padding: 22px;

                flex-direction: column;

                text-align: center;
            }

            .user-name {
                font-size: 21px;
            }

            .information-body {
                padding: 20px;
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


        <!-- DASHBOARD -->

        <a href="{{ route('admin.dashboard') }}">

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- USERS -->

        <a
            href="{{ route('admin.users.index') }}"
            class="active"
        >

            <i class="bi bi-people"></i>

            User Management

        </a>


        <!-- PRODUCTS -->

        <a href="{{ route('admin.products.index') }}">

            <i class="bi bi-droplet-fill"></i>

            Products

        </a>


        <!-- ORDERS -->

        @if(Route::has('admin.orders.index'))

            <a href="{{ route('admin.orders.index') }}">

                <i class="bi bi-cart3"></i>

                Orders

            </a>

        @endif


        <!-- DELIVERIES -->

        @if(Route::has('admin.deliveries.index'))

            <a href="{{ route('admin.deliveries.index') }}">

                <i class="bi bi-truck"></i>

                Deliveries

            </a>

        @endif


        <!-- INVENTORY -->

        @if(Route::has('admin.inventory.index'))

            <a href="{{ route('admin.inventory.index') }}">

                <i class="bi bi-boxes"></i>

                Inventory

            </a>

        @endif


        <!-- REPORTS -->

        @if(Route::has('admin.reports'))

            <a href="{{ route('admin.reports') }}">

                <i class="bi bi-bar-chart"></i>

                Reports & Analytics

            </a>

        @endif


        <!-- ACCOUNT -->

        <div class="menu-title mt-3">

            Account

        </div>


        <a href="{{ route('admin.account') }}">

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


    <!-- NAVBAR -->

    <nav class="navbar-custom">


        <button
            type="button"
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
         CONTENT
    ================================================= -->

    <main class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div>

                <h1 class="page-title">

                    View User

                </h1>

                <p class="page-subtitle">

                    View the complete personal information of this user.

                </p>

            </div>


            <a
                href="{{ route('admin.users.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Users

            </a>

        </div>


        <!-- =================================================
             USER CARD
        ================================================= -->

        <div class="user-card">


            <!-- HEADER -->

            <div class="user-card-header">


                @if($user->profile_picture)

                    <img
                        src="{{ asset('storage/' . $user->profile_picture) }}"
                        alt="Profile Picture"
                        class="user-photo"
                    >

                @else

                    <div class="user-photo-placeholder">

                        <i class="bi bi-person-fill"></i>

                    </div>

                @endif


                <div>

                    <div class="user-name">

                        {{ $user->name }}

                    </div>


                    <div class="user-email">

                        <i class="bi bi-envelope"></i>

                        {{ $user->email }}

                    </div>


                    <span class="role-badge">

                        {{ ucfirst($user->role) }}

                    </span>

                </div>


            </div>


            <!-- INFORMATION -->

            <div class="information-body">


                <div class="section-heading">

                    <i class="bi bi-person-vcard info-icon"></i>

                    Personal Information

                </div>


                <div class="row g-3">


                    <!-- FULL NAME -->

                    <div class="col-md-6">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-person info-icon"></i>

                                Full Name

                            </span>

                            <div class="info-value">

                                {{ $user->name ?: 'Not provided' }}

                            </div>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="col-md-6">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-envelope info-icon"></i>

                                Email Address

                            </span>

                            <div class="info-value">

                                {{ $user->email ?: 'Not provided' }}

                            </div>

                        </div>

                    </div>


                    <!-- AGE -->

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-calendar3 info-icon"></i>

                                Age

                            </span>

                            <div class="info-value">

                                {{ $user->age ?? 'Not provided' }}

                            </div>

                        </div>

                    </div>


                    <!-- BIRTHDATE -->

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-calendar-event info-icon"></i>

                                Birthdate

                            </span>

                            <div class="info-value">

                                @if($user->birthdate)

                                    {{ \Carbon\Carbon::parse($user->birthdate)->format('F d, Y') }}

                                @else

                                    Not provided

                                @endif

                            </div>

                        </div>

                    </div>


                    <!-- PHONE -->

                    <div class="col-md-4">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-telephone info-icon"></i>

                                Phone Number

                            </span>

                            <div class="info-value">

                                {{ $user->phone_number ?? 'Not provided' }}

                            </div>

                        </div>

                    </div>


                    <!-- ADDRESS -->

                    <div class="col-md-12">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-geo-alt info-icon"></i>

                                Address

                            </span>

                            <div class="info-value">

                                {{ $user->address ?? 'Not provided' }}

                            </div>

                        </div>

                    </div>


                    <!-- ROLE -->

                    <div class="col-md-6">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-shield-check info-icon"></i>

                                Role

                            </span>

                            <div class="info-value">

                                {{ ucfirst($user->role) }}

                            </div>

                        </div>

                    </div>


                    <!-- USER ID -->

                    <div class="col-md-6">

                        <div class="info-box">

                            <span class="info-label">

                                <i class="bi bi-hash info-icon"></i>

                                User ID

                            </span>

                            <div class="info-value">

                                {{ $user->id }}

                            </div>

                        </div>

                    </div>


                </div>


                <!-- VIEW ONLY NOTICE -->

                <div class="view-only-notice">

                    <i class="bi bi-eye-fill"></i>

                    <span>

                        This page is for viewing user information only.

                        Personal information is displayed based on the information saved by the user in their account.

                    </span>

                </div>


            </div>

        </div>


    </main>

</div>


<script>

    function openSidebar() {

        document
            .getElementById('sidebar')
            .classList.add('open');

    }


    function closeSidebar() {

        document
            .getElementById('sidebar')
            .classList.remove('open');

    }

</script>


</body>

</html>