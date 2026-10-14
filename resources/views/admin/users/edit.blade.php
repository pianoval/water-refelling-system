<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit User | Water Station</title>


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
           SAME AS ADMIN DASHBOARD
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


        .sidebar a {

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


        .sidebar a i {

            width:
                20px;

            text-align:
                center;

            font-size:
                17px;

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
                900;

            box-shadow:
                0 3px 15px
                rgba(23,78,166,.05);

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
           PAGE HEADER
        ===================================================== */

        .page-header {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                15px;

            margin-bottom:
                22px;

        }


        .page-heading {

            display:
                flex;

            align-items:
                center;

            gap:
                13px;

        }


        .page-icon {

            width:
                48px;

            height:
                48px;

            border-radius:
                13px;

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
                22px;

        }


        .page-heading h1 {

            margin:
                0;

            font-size:
                26px;

            font-weight:
                700;

            color:
                #183b5b;

        }


        .page-heading p {

            margin:
                4px 0 0;

            color:
                #6b86a3;

            font-size:
                12px;

        }


        .back-btn {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                7px;

            padding:
                9px 13px;

            background:
                #ffffff;

            border:
                1px solid
                #d6e4f4;

            border-radius:
                9px;

            color:
                #174ea6;

            text-decoration:
                none;

            font-size:
                11px;

            font-weight:
                700;

            transition:
                .2s ease;

        }


        .back-btn:hover {

            background:
                #e8f1ff;

            color:
                #0d3b7a;

        }



        /* =====================================================
           ALERT
        ===================================================== */

        .custom-alert {

            border:
                none;

            border-radius:
                12px;

            padding:
                13px 16px;

            font-size:
                12px;

            margin-bottom:
                18px;

        }



        /* =====================================================
           EDIT CARD
        ===================================================== */

        .edit-card {

            background:
                #ffffff;

            border:
                1px solid
                #dce8f7;

            border-radius:
                17px;

            box-shadow:
                0 5px 20px
                rgba(23,78,166,.06);

            overflow:
                hidden;

        }


        .card-header-custom {

            padding:
                18px 22px;

            background:
                linear-gradient(
                    135deg,
                    #174ea6,
                    #2563b8
                );

            color:
                #ffffff;

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

        }


        .card-header-custom i {

            font-size:
                19px;

        }


        .card-header-custom h3 {

            margin:
                0;

            font-size:
                16px;

            font-weight:
                700;

        }


        .card-body-custom {

            padding:
                25px;

        }



        /* =====================================================
           USER PREVIEW
        ===================================================== */

        .user-preview {

            display:
                flex;

            align-items:
                center;

            gap:
                15px;

            margin-bottom:
                24px;

            padding:
                15px;

            background:
                #f7faff;

            border:
                1px solid
                #e0eaf7;

            border-radius:
                12px;

        }


        .preview-image {

            width:
                62px;

            height:
                62px;

            border-radius:
                50%;

            object-fit:
                cover;

            border:
                3px solid
                #e3efff;

        }


        .preview-placeholder {

            width:
                62px;

            height:
                62px;

            border-radius:
                50%;

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
                25px;

        }


        .preview-name {

            margin:
                0 0 3px;

            color:
                #183b5b;

            font-size:
                17px;

            font-weight:
                700;

        }


        .preview-email {

            margin:
                0;

            color:
                #6b86a3;

            font-size:
                11px;

        }


        .role-badge {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                5px;

            margin-top:
                6px;

            padding:
                5px 9px;

            border-radius:
                20px;

            background:
                #e8f1ff;

            color:
                #174ea6;

            font-size:
                9px;

            font-weight:
                700;

        }



        /* =====================================================
           FORM
        ===================================================== */

        .form-label {

            margin-bottom:
                7px;

            color:
                #355979;

            font-size:
                12px;

            font-weight:
                700;

        }


        .form-control,
        .form-select {

            min-height:
                43px;

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


        .form-control:focus,
        .form-select:focus {

            border-color:
                #5792d6;

            box-shadow:
                0 0 0 .2rem
                rgba(37,99,184,.10);

        }


        textarea.form-control {

            min-height:
                100px;

            resize:
                vertical;

        }


        .readonly-field {

            background:
                #f5f8fc !important;

            border-color:
                #dce6f2 !important;

            color:
                #607d8b !important;

            cursor:
                not-allowed;

        }



        /* =====================================================
           BUTTONS
        ===================================================== */

        .button-row {

            display:
                flex;

            justify-content:
                flex-end;

            gap:
                8px;

            margin-top:
                24px;

            padding-top:
                20px;

            border-top:
                1px solid
                #e8eef6;

        }


        .cancel-btn {

            padding:
                10px 17px;

            border:
                1px solid
                #d6e2f0;

            border-radius:
                9px;

            background:
                #ffffff;

            color:
                #607d8b;

            text-decoration:
                none;

            font-size:
                12px;

            font-weight:
                700;

        }


        .cancel-btn:hover {

            background:
                #f4f7fa;

            color:
                #455a64;

        }


        .update-btn {

            padding:
                10px 18px;

            border:
                none;

            border-radius:
                9px;

            background:
                linear-gradient(
                    135deg,
                    #174ea6,
                    #2563b8
                );

            color:
                #ffffff;

            font-size:
                12px;

            font-weight:
                700;

            cursor:
                pointer;

            transition:
                .2s ease;

        }


        .update-btn:hover {

            background:
                linear-gradient(
                    135deg,
                    #0d3b7a,
                    #174ea6
                );

            transform:
                translateY(-1px);

        }



        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 991px) {

            .sidebar {

                left:
                    -260px;

                transform:
                    none;

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


            .page-header {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }


            .page-heading h1 {

                font-size:
                    23px;

            }


            .edit-card {

                border-radius:
                    14px;

            }


            .card-body-custom {

                padding:
                    18px;

            }


            .button-row {

                flex-direction:
                    column-reverse;

            }


            .cancel-btn,
            .update-btn {

                width:
                    100%;

                text-align:
                    center;

            }

        }


        @media (max-width: 576px) {

            .profile-name,
            .profile-role {

                display:
                    none;

            }


            .user-preview {

                align-items:
                    flex-start;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
     SAME AS ADMIN DASHBOARD
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


        <!-- SAME X BUTTON AS DASHBOARD -->

        <button
            type="button"
            class="close-sidebar"
            id="closeSidebarBtn"
            title="Close Sidebar"
            aria-label="Close Sidebar"

            onclick="
                if (window.innerWidth <= 991) {
                    document.getElementById('sidebar').classList.remove('open');
                } else {
                    document.getElementById('sidebar').classList.add('hidden');
                    document.getElementById('main').classList.add('expanded');
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

            Dashboard

        </a>



        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('admin.users.index') }}"
            class="active"
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



        <!-- ACCOUNT -->

        <div class="menu-title mt-3">

            Account

        </div>



        <!-- MY ACCOUNT -->

        <a
            href="{{ route('admin.account') }}"
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


    <!-- NAVBAR -->

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


            @if(auth()->user()->profile_picture)

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



    <!-- CONTENT -->

    <main class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-heading">


                <div class="page-icon">

                    <i class="bi bi-person-gear"></i>

                </div>


                <div>

                    <h1>
                        Edit User
                    </h1>


                    <p>
                        Update the user's account information.
                    </p>

                </div>


            </div>


            <!-- BACK -->

            <a
                href="{{ route('admin.users.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Users

            </a>


        </div>



        <!-- ERRORS -->

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


                <ul class="mb-0 mt-2">

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



        <!-- EDIT USER CARD -->

        <div class="edit-card">


            <!-- CARD HEADER -->

            <div class="card-header-custom">

                <i class="bi bi-person-vcard"></i>

                <h3>
                    User Information
                </h3>

            </div>



            <!-- CARD BODY -->

            <div class="card-body-custom">


                <!-- USER PREVIEW -->

                <div class="user-preview">


                    @if($user->profile_picture)

                        <img
                            src="{{ asset(
                                'storage/' .
                                $user->profile_picture
                            ) }}"
                            class="preview-image"
                            alt="User Profile"
                        >

                    @else

                        <div class="preview-placeholder">

                            <i
                                class="bi bi-person-fill"
                            ></i>

                        </div>

                    @endif


                    <div>

                        <p class="preview-name">

                            {{ $user->name }}

                        </p>


                        <p class="preview-email">

                            {{ $user->email }}

                        </p>


                        <span class="role-badge">

                            <i class="bi bi-shield-check"></i>

                            {{ ucfirst($user->role) }}

                        </span>

                    </div>


                </div>



                <!-- UPDATE FORM -->

                <form
                    action="{{ route(
                        'admin.users.update',
                        $user->id
                    ) }}"
                    method="POST"
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
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{ $user->name }}"
                                readonly
                            >

                        </div>



                        <!-- EMAIL -->

                        <div class="col-md-6">

                            <label class="form-label">

                                Email Address

                            </label>


                            <input
                                type="email"
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{ $user->email }}"
                                readonly
                            >

                        </div>



                        <!-- AGE -->

                        <div class="col-md-4">

                            <label class="form-label">

                                Age

                            </label>


                            <input
                                type="text"
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{
                                    $user->age
                                    ?? 'Not provided'
                                }}"
                                readonly
                            >

                        </div>



                        <!-- BIRTHDATE -->

                        <div class="col-md-4">

                            <label class="form-label">

                                Birthdate

                            </label>


                            <input
                                type="text"
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{
                                    $user->birthdate
                                    ?? 'Not provided'
                                }}"
                                readonly
                            >

                        </div>



                        <!-- PHONE -->

                        <div class="col-md-4">

                            <label class="form-label">

                                Phone Number

                            </label>


                            <input
                                type="text"
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{
                                    $user->phone_number
                                    ?? 'Not provided'
                                }}"
                                readonly
                            >

                        </div>



                        <!-- ADDRESS -->

                        <div class="col-12">

                            <label class="form-label">

                                Address

                            </label>


                            <textarea
                                class="
                                    form-control
                                    readonly-field
                                "
                                readonly
                            >{{ $user->address ?? 'Not provided' }}</textarea>

                        </div>



                        <!-- PROFILE PICTURE -->

                        <div class="col-md-6">

                            <label class="form-label">

                                Profile Picture

                            </label>


                            <input
                                type="text"
                                class="
                                    form-control
                                    readonly-field
                                "
                                value="{{
                                    $user->profile_picture
                                        ? 'Profile picture uploaded'
                                        : 'No profile picture'
                                }}"
                                readonly
                            >

                        </div>



                        <!-- ROLE ONLY EDITABLE -->

                        <div class="col-md-6">

                            <label class="form-label">

                                Role

                            </label>


                            <select
                                name="role"
                                class="form-select"
                                required
                            >

                                <option
                                    value="customer"

                                    {{
                                        old(
                                            'role',
                                            $user->role
                                        ) === 'customer'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Customer

                                </option>


                                <option
                                    value="staff"

                                    {{
                                        old(
                                            'role',
                                            $user->role
                                        ) === 'staff'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Staff

                                </option>


                                <option
                                    value="admin"

                                    {{
                                        old(
                                            'role',
                                            $user->role
                                        ) === 'admin'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Admin

                                </option>

                            </select>

                        </div>


                    </div>



                    <!-- BUTTONS -->

                    <div class="button-row">


                        <a
                            href="{{ route(
                                'admin.users.index'
                            ) }}"
                            class="cancel-btn"
                        >

                            <i class="bi bi-x-circle me-1"></i>

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="update-btn"
                        >

                            <i class="bi bi-shield-check me-1"></i>

                            Update Role

                        </button>


                    </div>


                </form>


            </div>


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