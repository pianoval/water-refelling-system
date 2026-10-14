<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        My Account | Admin | Water Station
    </title>


    <!-- Bootstrap 5 -->

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


    /* =====================================================
       BODY
    ===================================================== */

    body {

        margin: 0;

        font-family:
            "Segoe UI",
            sans-serif;

        background:
            linear-gradient(
                135deg,
                #f5f9ff 0%,
                #f8fbff 50%,
                #eaf2ff 100%
            );

        color:
            #183b5b;

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
                #174ea6 48%,
                #2563b8 100%
            );

        color:
            white;

        z-index:
            3000;

        overflow-y:
            auto;

        transition:
            .3s ease;

        box-shadow:
            6px 0 25px
            rgba(
                23,
                78,
                166,
                .18
            );

    }


    .sidebar.hidden {

        left:
            -260px;

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
            rgba(
                255,
                255,
                255,
                .18
            );

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
            rgba(
                255,
                255,
                255,
                .15
            );

        border:
            1px solid
            rgba(
                255,
                255,
                255,
                .20
            );

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
       CLOSE SIDEBAR
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

        padding:
            0;

        margin:
            0;

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
            rgba(
                255,
                255,
                255,
                .88
            );

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
            rgba(
                255,
                255,
                255,
                .17
            );

        color:
            white;

        transform:
            translateX(2px);

        box-shadow:
            0 4px 12px
            rgba(
                0,
                0,
                0,
                .06
            );

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
            rgba(
                255,
                255,
                255,
                .88
            );

        background:
            transparent;

        border:
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
            rgba(
                255,
                255,
                255,
                .17
            );

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
            rgba(
                255,
                255,
                255,
                .97
            );

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
            rgba(
                23,
                78,
                166,
                .05
            );

    }


    .menu-btn {

        border:
            none;

        background:
            #e8f1ff;

        color:
            #174ea6;

        font-size:
            24px;

        cursor:
            pointer;

        padding:
            5px 9px;

        border-radius:
            9px;

        transition:
            .2s;

    }


    .menu-btn:hover {

        background:
            #d7e6ff;

        transform:
            scale(1.03);

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
            38px;

        height:
            38px;

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
            38px;

        height:
            38px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #d5e5ff
            );

        color:
            #174ea6;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

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
            14px;

        font-weight:
            700;

        color:
            #183b5b;

    }


    .profile-role {

        font-size:
            11px;

        color:
            #2563b8;

        text-transform:
            capitalize;

    }


    /* =====================================================
       CONTENT
    ===================================================== */

    .content {

        padding:
            28px;

    }


    /* =====================================================
       ALERTS
    ===================================================== */

    .custom-alert {

        border:
            none;

        border-radius:
            13px;

        padding:
            14px 17px;

        margin-bottom:
            20px;

        font-size:
            13px;

    }


    /* =====================================================
       ACCOUNT CARDS
    ===================================================== */

    .account-card {

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

        border-radius:
            18px;

        padding:
            24px;

        margin-bottom:
            22px;

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

    }


    /* =====================================================
       CARD HEADER
    ===================================================== */

    .card-heading {

        display:
            flex;

        align-items:
            center;

        gap:
            11px;

        margin-bottom:
            21px;

        padding-bottom:
            16px;

        border-bottom:
            1px solid
            #e6eef7;

    }


    .card-heading-icon {

        width:
            43px;

        height:
            43px;

        border-radius:
            11px;

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
            19px;

    }


    .card-heading h3 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            18px;

        font-weight:
            700;

    }


    .card-heading p {

        margin:
            3px 0 0;

        color:
            #71869a;

        font-size:
            11px;

    }


    /* =====================================================
       PROFILE SECTION
    ===================================================== */

    .profile-section {

        display:
            flex;

        align-items:
            center;

        gap:
            20px;

        padding-bottom:
            20px;

        margin-bottom:
            20px;

        border-bottom:
            1px solid
            #e6eef7;

    }


    .account-profile-image {

        width:
            92px;

        height:
            92px;

        border-radius:
            50%;

        object-fit:
            cover;

        border:
            4px solid
            #e3efff;

        box-shadow:
            0 5px 18px
            rgba(
                23,
                78,
                166,
                .12
            );

    }


    .account-profile-placeholder {

        width:
            92px;

        height:
            92px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #e8f1ff,
                #dceaff
            );

        color:
            #174ea6;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            38px;

        border:
            4px solid
            #e3efff;

        box-shadow:
            0 5px 18px
            rgba(
                23,
                78,
                166,
                .12
            );

    }


    .profile-details h4 {

        margin:
            0 0 5px;

        color:
            #183b5b;

        font-size:
            20px;

        font-weight:
            700;

    }


    .profile-details p {

        margin:
            0;

        color:
            #71869a;

        font-size:
            12px;

    }


    .role-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            6px;

        margin-top:
            9px;

        padding:
            6px 11px;

        border-radius:
            20px;

        background:
            #e8f1ff;

        color:
            #174ea6;

        font-size:
            10px;

        font-weight:
            700;

    }


    /* =====================================================
       FORM
    ===================================================== */

    .form-label {

        font-size:
            12px;

        font-weight:
            600;

        color:
            #355979;

        margin-bottom:
            7px;

    }


    .form-control {

        min-height:
            44px;

        border:
            1px solid
            #cddff2;

        border-radius:
            10px;

        background:
            #fbfdff;

        color:
            #183b5b;

        font-size:
            13px;

    }


    .form-control:focus {

        border-color:
            #5792d6;

        box-shadow:
            0 0 0 .2rem
            rgba(
                37,
                99,
                184,
                .10
            );

    }


    textarea.form-control {

        min-height:
            105px;

        resize:
            vertical;

    }


    .form-text {

        margin-top:
            6px;

        font-size:
            10px;

        color:
            #7890aa;

    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .save-btn {

        border:
            none;

        border-radius:
            10px;

        padding:
            10px 18px;

        background:
            linear-gradient(
                135deg,
                #2563b8,
                #174ea6
            );

        color:
            white;

        font-size:
            12px;

        font-weight:
            600;

        transition:
            .2s;

    }


    .save-btn:hover {

        background:
            linear-gradient(
                135deg,
                #174ea6,
                #0d3b7a
            );

        color:
            white;

        transform:
            translateY(-1px);

    }


    .password-btn {

        border:
            1px solid
            #cddff2;

        border-radius:
            10px;

        padding:
            10px 18px;

        background:
            #e8f1ff;

        color:
            #174ea6;

        font-size:
            12px;

        font-weight:
            600;

        transition:
            .2s;

    }


    .password-btn:hover {

        background:
            #d7e6ff;

        color:
            #174ea6;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 991px) {

        .sidebar {

            left:
                -260px;

        }


        .sidebar.open {

            left:
                0;

        }


        .main {

            margin-left:
                0;

        }


        .content {

            padding:
                22px;

        }


        .navbar-custom {

            padding:
                0 20px;

        }

    }


    @media (max-width: 767px) {

        .content {

            padding:
                16px;

        }


        .navbar-custom {

            height:
                62px;

            padding:
                0 15px;

        }


        .profile-section {

            align-items:
                flex-start;

            gap:
                15px;

        }


        .account-profile-image,
        .account-profile-placeholder {

            width:
                78px;

            height:
                78px;

        }


        .account-profile-placeholder {

            font-size:
                31px;

        }


        .profile-details h4 {

            font-size:
                18px;

        }

    }


    @media (max-width: 576px) {

        .profile-name,
        .profile-role {

            display:
                none;

        }


        .save-btn,
        .password-btn {

            width:
                100%;

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
            class="close-sidebar"
            id="closeSidebarBtn"
            title="Close Sidebar"
            type="button"
        >

            ×

        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>


        <!-- DASHBOARD -->

        <a
            href="{{ route('admin.dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('admin.users.index') }}"
        >

            <i class="bi bi-people"></i>

            User Management

        </a>


        <!-- ORDERS -->

        <a
            href="{{ route('admin.orders.index') }}"
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>


        <!-- INVENTORY -->

        <a
            href="{{ route('admin.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>


        <!-- REPORTS -->

        <a
            href="{{ route('admin.reports') }}"
        >

            <i class="bi bi-bar-chart"></i>

            Reports & Analytics

        </a>


        <div class="menu-title mt-3">

            Account

        </div>


        <!-- MY ACCOUNT ACTIVE -->

        <a
            href="{{ route('admin.account') }}"
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


    <!-- =================================================
         NAVBAR
    ================================================= -->

    <nav class="navbar-custom">


        <button
            class="menu-btn"
            id="menuButton"
            title="Open Sidebar"
            type="button"
        >

            <i class="bi bi-list"></i>

        </button>


        <!-- ADMIN PROFILE -->

        <div class="admin-profile">


            @if(
                auth()->user()->profile_picture
            )


                <img
                    src="{{ asset(
                        'storage/' .
                        auth()->user()->profile_picture
                    ) }}"
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


        <!-- SUCCESS -->

        @if(session('success'))

            <div
                class="
                    alert
                    alert-success
                    custom-alert
                "
            >

                <i
                    class="
                        bi
                        bi-check-circle-fill
                        me-2
                    "
                ></i>

                {{ session('success') }}

            </div>

        @endif



        <!-- ERROR -->

        @if(session('error'))

            <div
                class="
                    alert
                    alert-danger
                    custom-alert
                "
            >

                <i
                    class="
                        bi
                        bi-exclamation-circle-fill
                        me-2
                    "
                ></i>

                {{ session('error') }}

            </div>

        @endif



        @if($errors->any())

            <div
                class="
                    alert
                    alert-danger
                    custom-alert
                "
            >

                <strong>
                    Please check the following:
                </strong>

                <ul
                    class="
                        mb-0
                        mt-2
                    "
                >

                    @foreach(
                        $errors->all()
                        as $error
                    )

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
                        Keep your administrator
                        information up to date.
                    </p>

                </div>


            </div>



            <!-- PROFILE -->

            <div class="profile-section">


                @if($user->profile_picture)

                    <img
                        src="{{ asset(
                            'storage/' .
                            $user->profile_picture
                        ) }}"
                        alt="Profile Picture"
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

                        <i class="bi bi-shield-check"></i>

                        Administrator

                    </span>


                </div>


            </div>



            <!-- =================================================
                 ADMIN UPDATE FORM
            ================================================= -->

            <form
                action="{{ route('admin.account.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <div class="row g-3">


                    <!-- NAME -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Full Name

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old(
                                'name',
                                $user->name
                            ) }}"
                            required
                        >

                    </div>



                    <!-- EMAIL -->

                    <div class="col-md-6">

                        <label class="form-label">

                            Email Address

                        </label>


                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old(
                                'email',
                                $user->email
                            ) }}"
                            required
                        >

                    </div>



                    <!-- AGE -->

                    <div class="col-md-4">

                        <label class="form-label">

                            Age

                        </label>


                        <input
                            type="number"
                            name="age"
                            class="form-control"
                            value="{{ old(
                                'age',
                                $user->age
                            ) }}"
                            min="1"
                            max="120"
                        >

                    </div>



                    <!-- BIRTHDATE -->

                    <div class="col-md-4">

                        <label class="form-label">

                            Birthdate

                        </label>


                        <input
                            type="date"
                            name="birthdate"
                            class="form-control"
                            value="{{ old(
                                'birthdate',
                                $user->birthdate
                            ) }}"
                        >

                    </div>



                    <!-- PHONE -->

                    <div class="col-md-4">

                        <label class="form-label">

                            Phone Number

                        </label>


                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ old(
                                'phone_number',
                                $user->phone_number
                            ) }}"
                        >

                    </div>



                    <!-- ADDRESS -->

                    <div class="col-12">

                        <label class="form-label">

                            Address

                        </label>


                        <textarea
                            name="address"
                            class="form-control"
                        >{{ old(
                            'address',
                            $user->address
                        ) }}</textarea>

                    </div>



                    <!-- PROFILE PICTURE -->

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



                <!-- SAVE -->

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
                        Update your administrator
                        password securely.
                    </p>

                </div>


            </div>



            <!-- =================================================
                 ADMIN PASSWORD FORM
            ================================================= -->

            <form
                action="{{ route('admin.account.password') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="row g-3">


                    <!-- CURRENT PASSWORD -->

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



                    <!-- NEW PASSWORD -->

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



                    <!-- CONFIRM -->

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



                <!-- UPDATE -->

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

    const sidebar =
        document.getElementById(
            'sidebar'
        );


    const main =
        document.getElementById(
            'main'
        );


    const menuButton =
        document.getElementById(
            'menuButton'
        );


    const closeSidebarBtn =
        document.getElementById(
            'closeSidebarBtn'
        );


    function openSidebar() {

        if (
            window.innerWidth <= 991
        ) {

            sidebar.classList.add(
                'open'
            );

            sidebar.classList.remove(
                'hidden'
            );

        } else {

            sidebar.classList.remove(
                'hidden'
            );

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
                'open'
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


    if (menuButton) {

        menuButton.addEventListener(
            'click',
            function () {

                openSidebar();

            }
        );

    }


    if (closeSidebarBtn) {

        closeSidebarBtn.addEventListener(
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
                    'open'
                );

            }

        }
    );

</script>


</body>

</html>