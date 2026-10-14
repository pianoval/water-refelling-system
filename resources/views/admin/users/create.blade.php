<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Add User | Water Station
    </title>


    <!-- Bootstrap 5 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
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


    /* =====================================================
       BODY
    ===================================================== */

    body {

        margin: 0;

        min-height: 100vh;

        font-family:
            Arial,
            Helvetica,
            sans-serif;

        background:
            linear-gradient(
                135deg,
                #f5f9ff 0%,
                #f8fbff 50%,
                #eaf2ff 100%
            );

        color:
            #183b5d;

    }



    /* =====================================================
       SIDEBAR
    ===================================================== */

    .sidebar {

        position:
            fixed;

        top:
            0;

        left:
            0;

        width:
            260px;

        height:
            100vh;

        background:
            linear-gradient(
                180deg,
                #0d3b7a 0%,
                #174ea6 50%,
                #2563b8 100%
            );

        color:
            white;

        z-index:
            3000;

        overflow-y:
            auto;

        box-shadow:
            6px 0 25px
            rgba(23,78,166,.18);

        transition:
            .3s ease;

    }


    .sidebar.hidden {

        transform:
            translateX(-100%);

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
       X BUTTON
       PLAIN / NO BOX
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

        font-weight:
            400;

        line-height:
            1;

        cursor:
            pointer;

        position:
            relative;

        z-index:
            999999;

        padding:
            0;

        margin:
            0;

        flex-shrink:
            0;

        pointer-events:
            auto !important;

        opacity:
            1 !important;

        visibility:
            visible !important;

        transition:
            .2s ease;

    }


    .close-sidebar:hover {

        background:
            transparent;

        color:
            #ffffff;

        transform:
            scale(1.08);

    }


    .close-sidebar:active {

        background:
            transparent;

        transform:
            scale(.95);

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
            rgba(255,255,255,.88);

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
            rgba(255,255,255,.17);

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
            rgba(255,255,255,.88);

        background:
            transparent;

        border:
            none;

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
            rgba(255,255,255,.17);

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
            rgba(255,255,255,.97);

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
            rgba(23,78,166,.05);

    }


    .menu-btn {

        width:
            41px;

        height:
            41px;

        border:
            none;

        border-radius:
            10px;

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

        font-size:
            20px;

        cursor:
            pointer;

        transition:
            .2s;

    }


    .menu-btn:hover {

        background:
            #d7e6ff;

        transform:
            translateY(-1px);

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
            40px;

        height:
            40px;

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
            40px;

        height:
            40px;

        border-radius:
            50%;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #d5e5ff
            );

        color:
            #174ea6;

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
            13px;

        font-weight:
            700;

        color:
            #24485f;

    }


    .profile-role {

        font-size:
            10px;

        color:
            #2563b8;

        margin-top:
            3px;

    }



    /* =====================================================
       PAGE
    ===================================================== */

    .page-container {

        padding:
            22px 25px 35px;

    }



    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .page-header {

        background:
            linear-gradient(
                135deg,
                #0d3b7a,
                #174ea6,
                #2563b8
            );

        border-radius:
            17px;

        padding:
            20px 22px;

        color:
            white;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        margin-bottom:
            18px;

        box-shadow:
            0 10px 25px
            rgba(23,78,166,.16);

    }


    .page-header-left {

        display:
            flex;

        align-items:
            center;

        gap:
            13px;

    }


    .page-header-icon {

        width:
            45px;

        height:
            45px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        border-radius:
            12px;

        background:
            rgba(255,255,255,.15);

        font-size:
            21px;

    }


    .page-title {

        margin:
            0;

        font-size:
            21px;

        font-weight:
            800;

    }


    .page-subtitle {

        margin:
            4px 0 0;

        font-size:
            12px;

        color:
            rgba(255,255,255,.76);

    }



    /* =====================================================
       FORM CARD
    ===================================================== */

    .form-card {

        max-width:
            850px;

        margin:
            0 auto;

        background:
            white;

        border:
            1px solid
            #d5e3f5;

        border-radius:
            16px;

        box-shadow:
            0 8px 25px
            rgba(23,78,166,.08);

    }


    .form-header {

        padding:
            18px 22px;

        border-bottom:
            1px solid
            #e4edf8;

    }


    .form-header h5 {

        margin:
            0;

        font-size:
            15px;

        font-weight:
            800;

        color:
            #17457d;

    }


    .form-header p {

        margin:
            4px 0 0;

        font-size:
            11px;

        color:
            #78909c;

    }


    .form-body {

        padding:
            22px;

    }


    .form-label {

        font-size:
            12px;

        font-weight:
            700;

        color:
            #315666;

        margin-bottom:
            6px;

    }


    .form-control,
    .form-select {

        border:
            1px solid
            #cbdced;

        border-radius:
            9px;

        padding:
            10px 12px;

        font-size:
            12px;

        color:
            #24485f;

        background:
            #fbfdff;

    }


    .form-control:focus,
    .form-select:focus {

        border-color:
            #2563b8;

        box-shadow:
            0 0 0 .2rem
            rgba(37,99,184,.12);

        background:
            white;

    }


    .input-icon {

        position:
            relative;

    }


    .input-icon i {

        position:
            absolute;

        left:
            12px;

        top:
            50%;

        transform:
            translateY(-50%);

        color:
            #2563b8;

        font-size:
            14px;

    }


    .input-icon .form-control {

        padding-left:
            36px;

    }


    .role-select {

        padding-left:
            12px;

    }


    .invalid-feedback {

        font-size:
            10px;

    }



    /* =====================================================
       BUTTONS
    ===================================================== */

    .form-actions {

        display:
            flex;

        justify-content:
            flex-end;

        gap:
            9px;

        padding-top:
            20px;

        margin-top:
            5px;

        border-top:
            1px solid
            #edf3fa;

    }


    .cancel-btn,
    .save-btn {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            6px;

        padding:
            9px 15px;

        border-radius:
            9px;

        font-size:
            11px;

        font-weight:
            800;

        text-decoration:
            none;

        transition:
            .2s;

    }


    .cancel-btn {

        background:
            #f1f5f9;

        color:
            #526b7a;

        border:
            1px solid
            #dbe5ed;

    }


    .cancel-btn:hover {

        background:
            #e4ebf1;

        color:
            #315666;

    }


    .save-btn {

        background:
            #174ea6;

        color:
            white;

        border:
            1px solid
            #174ea6;

    }


    .save-btn:hover {

        background:
            #0d3b7a;

        color:
            white;

        transform:
            translateY(-1px);

    }



    /* =====================================================
       MOBILE
    ===================================================== */

    .mobile-overlay {

        display:
            none;

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

        }


        .mobile-overlay {

            position:
                fixed;

            inset:
                0;

            background:
                rgba(0,0,0,.25);

            z-index:
                2999;

        }


        .mobile-overlay.show {

            display:
                block;

        }

    }


    @media (max-width: 767px) {

        .page-container {

            padding:
                18px 16px 30px;

        }


        .page-header {

            padding:
                18px;

        }


        .form-body {

            padding:
                18px;

        }

    }


    @media (max-width: 576px) {

        .profile-name,
        .profile-role {

            display:
                none;

        }


        .form-actions {

            flex-direction:
                column-reverse;

        }


        .cancel-btn,
        .save-btn {

            width:
                100%;

            justify-content:
                center;

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


    <!-- SIDEBAR HEADER -->

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


        <!-- PLAIN X -->

        <button
            type="button"
            class="close-sidebar"
            id="closeSidebarBtn"
            title="Close Sidebar"
            aria-label="Close Sidebar"
            onclick="
                if (window.innerWidth <= 991) {
                    document.getElementById('sidebar').classList.remove('show');
                    document.getElementById('mobileOverlay').classList.remove('show');
                } else {
                    document.getElementById('sidebar').classList.add('hidden');
                    document.querySelector('.main').classList.add('expanded');
                }
            "
        >
            ×
        </button>


    </div>



    <!-- SIDEBAR MENU -->

    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('admin.dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>

                Dashboard

            </span>

        </a>



        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('admin.users.index') }}"
            class="active"
        >

            <i class="bi bi-people-fill"></i>

            <span>

                User Management

            </span>

        </a>



        <!-- ORDERS -->

        <a
            href="{{ route('admin.orders.index') }}"
        >

            <i class="bi bi-cart-check-fill"></i>

            <span>

                Orders

            </span>

        </a>



        <!-- INVENTORY -->

        <a
            href="{{ route('admin.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            <span>

                Inventory

            </span>

        </a>



        <!-- REPORTS -->

        <a
            href="{{ route('admin.reports') }}"
        >

            <i class="bi bi-bar-chart-fill"></i>

            <span>

                Reports & Analytics

            </span>

        </a>


    </div>



    <!-- DIVIDER -->

    <div class="sidebar-divider"></div>



    <!-- ACCOUNT -->

    <div class="menu-title">

        Account

    </div>



    <div class="sidebar-menu">


        <!-- MY ACCOUNT -->

        <a
            href="{{ route('admin.account') }}"
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
            style="margin: 0;"
        >

            @csrf

            <button
                type="submit"
                class="logout-link"
            >

                <i class="bi bi-box-arrow-right"></i>

                <span>

                    Logout

                </span>

            </button>

        </form>


    </div>


</aside>



<!-- =====================================================
     MOBILE OVERLAY
===================================================== -->

<div
    class="mobile-overlay"
    id="mobileOverlay"
></div>



<!-- =====================================================
     MAIN
===================================================== -->

<main
    class="main"
>


    <!-- =================================================
         NAVBAR
    ================================================= -->

    <nav class="navbar-custom">


        <!-- MENU BUTTON -->

        <button
            class="menu-btn"
            id="menuButton"
            type="button"
            title="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>



        <!-- ADMIN PROFILE -->

        <div class="admin-profile">


            @if(
                auth()->user()->profile_picture
            )

                <img
                    src="{{
                        asset(
                            'storage/' .
                            auth()->user()->profile_picture
                        )
                    }}"
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

                    Administrator

                </div>

            </div>


        </div>


    </nav>



    <!-- =================================================
         PAGE
    ================================================= -->

    <div class="page-container">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-header-left">


                <div class="page-header-icon">

                    <i class="bi bi-person-plus-fill"></i>

                </div>


                <div>

                    <h1 class="page-title">

                        Add New User

                    </h1>


                    <p class="page-subtitle">

                        Create a new account and assign a system role

                    </p>

                </div>


            </div>


        </div>



        <!-- FORM CARD -->

        <div class="form-card">


            <div class="form-header">

                <h5>

                    <i class="bi bi-person-plus-fill me-1"></i>

                    User Information

                </h5>


                <p>

                    Fill in the required information below.

                </p>

            </div>



            <div class="form-body">


                <form
                    action="{{ route('admin.users.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="row g-3">


                        <!-- NAME -->

                        <div class="col-md-6">


                            <label class="form-label">

                                Full Name

                            </label>


                            <div class="input-icon">

                                <i class="bi bi-person-fill"></i>


                                <input
                                    type="text"
                                    name="name"
                                    class="
                                        form-control
                                        @error('name')
                                            is-invalid
                                        @enderror
                                    "
                                    value="{{ old('name') }}"
                                    placeholder="Enter full name"
                                    required
                                >

                            </div>


                            @error('name')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- EMAIL -->

                        <div class="col-md-6">


                            <label class="form-label">

                                Email Address

                            </label>


                            <div class="input-icon">

                                <i class="bi bi-envelope-fill"></i>


                                <input
                                    type="email"
                                    name="email"
                                    class="
                                        form-control
                                        @error('email')
                                            is-invalid
                                        @enderror
                                    "
                                    value="{{ old('email') }}"
                                    placeholder="Enter email address"
                                    required
                                >

                            </div>


                            @error('email')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- ROLE -->

                        <div class="col-md-6">


                            <label class="form-label">

                                User Role

                            </label>


                            <select
                                name="role"
                                class="
                                    form-select
                                    role-select
                                    @error('role')
                                        is-invalid
                                    @enderror
                                "
                                required
                            >

                                <option value="">

                                    Select a role

                                </option>


                                <option
                                    value="admin"
                                    {{ old('role') === 'admin' ? 'selected' : '' }}
                                >

                                    Admin

                                </option>


                                <option
                                    value="staff"
                                    {{ old('role') === 'staff' ? 'selected' : '' }}
                                >

                                    Staff

                                </option>


                                <option
                                    value="customer"
                                    {{ old('role') === 'customer' ? 'selected' : '' }}
                                >

                                    Customer

                                </option>

                            </select>


                            @error('role')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- PASSWORD -->

                        <div class="col-md-6">


                            <label class="form-label">

                                Password

                            </label>


                            <div class="input-icon">

                                <i class="bi bi-lock-fill"></i>


                                <input
                                    type="password"
                                    name="password"
                                    class="
                                        form-control
                                        @error('password')
                                            is-invalid
                                        @enderror
                                    "
                                    placeholder="Minimum 8 characters"
                                    required
                                >

                            </div>


                            @error('password')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                        <!-- CONFIRM PASSWORD -->

                        <div class="col-md-6">


                            <label class="form-label">

                                Confirm Password

                            </label>


                            <div class="input-icon">

                                <i class="bi bi-shield-lock-fill"></i>


                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    required
                                >

                            </div>


                        </div>


                    </div>



                    <!-- ACTIONS -->

                    <div class="form-actions">


                        <a
                            href="{{ route('admin.users.index') }}"
                            class="cancel-btn"
                        >

                            <i class="bi bi-arrow-left"></i>

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="save-btn"
                        >

                            <i class="bi bi-check-circle-fill"></i>

                            Create User

                        </button>


                    </div>


                </form>


            </div>


        </div>


    </div>


</main>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

    const sidebar =
        document.getElementById(
            'sidebar'
        );


    const menuButton =
        document.getElementById(
            'menuButton'
        );


    const closeSidebarBtn =
        document.getElementById(
            'closeSidebarBtn'
        );


    const mobileOverlay =
        document.getElementById(
            'mobileOverlay'
        );


    const main =
        document.querySelector(
            '.main'
        );


    function openSidebar() {

        sidebar.classList.add(
            'show'
        );

        sidebar.classList.remove(
            'hidden'
        );

        mobileOverlay.classList.add(
            'show'
        );

        if (
            window.innerWidth > 991
        ) {

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
                'show'
            );

            mobileOverlay.classList.remove(
                'show'
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
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                closeSidebar();

            }
        );

    }


    if (
        mobileOverlay
    ) {

        mobileOverlay.addEventListener(
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
                    'show'
                );

                mobileOverlay.classList.remove(
                    'show'
                );

            }

        }
    );

</script>


</body>

</html>