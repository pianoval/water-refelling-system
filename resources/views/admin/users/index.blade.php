<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        User Management | Admin | Water Station
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

        box-shadow:
            0 5px 15px
            rgba(
                0,
                0,
                0,
                .08
            );

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

        text-align:
            center;

        cursor:
            pointer;

        position:
            relative;

        z-index:
            999999;

        pointer-events:
            auto !important;

        padding:
            0;

        margin:
            0;

        flex-shrink:
            0;

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
            scale(
                1.03
            );

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

        justify-content:
            space-between;

        align-items:
            center;

        gap:
            20px;

        margin-bottom:
            24px;

    }


    .page-heading {

        display:
            flex;

        align-items:
            center;

        gap:
            15px;

    }


    .page-icon {

        width:
            52px;

        height:
            52px;

        border-radius:
            14px;

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
            24px;

        border:
            1px solid
            #d5e5f8;

    }


    .page-heading h1 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            28px;

        font-weight:
            700;

    }


    /* =====================================================
       ADD USER
    ===================================================== */

    .add-user-btn {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            7px;

        padding:
            10px 15px;

        background:
            linear-gradient(
                135deg,
                #2563b8,
                #174ea6
            );

        color:
            white;

        border:
            none;

        border-radius:
            10px;

        text-decoration:
            none;

        font-size:
            12px;

        font-weight:
            700;

        transition:
            .2s ease;

        white-space:
            nowrap;

    }


    .add-user-btn:hover {

        color:
            white;

        background:
            linear-gradient(
                135deg,
                #174ea6,
                #0d3b7a
            );

        transform:
            translateY(-1px);

    }


    /* =====================================================
       ALERTS
    ===================================================== */

    .custom-alert {

        border:
            none;

        border-radius:
            12px;

        padding:
            13px 16px;

        margin-bottom:
            18px;

        font-size:
            12px;

    }


    /* =====================================================
       USERS CARD
    ===================================================== */

    .users-card {

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

        box-shadow:
            0 6px 18px
            rgba(
                23,
                78,
                166,
                .08
            );

        overflow:
            hidden;

    }


    .users-card-header {

        padding:
            20px 22px;

        border-bottom:
            1px solid
            #e3edf7;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        gap:
            15px;

    }


    .users-card-header h2 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            18px;

        font-weight:
            700;

    }


    .users-card-header p {

        margin:
            4px 0 0;

        color:
            #71869a;

        font-size:
            12px;

    }


    .users-count {

        background:
            #e8f1ff;

        color:
            #174ea6;

        padding:
            7px 11px;

        border-radius:
            20px;

        font-size:
            11px;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    /* =====================================================
       TABLE
    ===================================================== */

    .table-wrapper {

        width:
            100%;

        overflow-x:
            auto;

    }


    .users-table {

        width:
            100%;

        min-width:
            850px;

        border-collapse:
            collapse;

    }


    .users-table thead th {

        background:
            #f5f9ff;

        color:
            #56718b;

        font-size:
            10px;

        font-weight:
            700;

        text-transform:
            uppercase;

        letter-spacing:
            .5px;

        padding:
            14px 17px;

        border-bottom:
            1px solid
            #dce8f5;

        white-space:
            nowrap;

    }


    .users-table tbody td {

        padding:
            15px 17px;

        border-bottom:
            1px solid
            #edf2f7;

        color:
            #36536d;

        font-size:
            13px;

        vertical-align:
            middle;

    }


    .users-table tbody tr {

        transition:
            .15s ease;

    }


    .users-table tbody tr:hover {

        background:
            #f8fbff;

    }


    .users-table tbody tr:last-child td {

        border-bottom:
            none;

    }


    /* =====================================================
       USER DATA
    ===================================================== */

    .user-id {

        color:
            #174ea6;

        font-weight:
            700;

    }


    .user-name {

        color:
            #183b5b;

        font-weight:
            700;

    }


    .user-email {

        color:
            #71869a;

        font-size:
            12px;

    }


    /* =====================================================
       ROLE BADGES
    ===================================================== */

    .role-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            5px;

        padding:
            6px 10px;

        border-radius:
            20px;

        font-size:
            10px;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    .role-admin {

        background:
            #e8f1ff;

        color:
            #174ea6;

    }


    .role-staff {

        background:
            #e8f7f3;

        color:
            #087f6b;

    }


    .role-customer {

        background:
            #fff4df;

        color:
            #a76500;

    }


    /* =====================================================
       ACTION BUTTONS
    ===================================================== */

    .action-buttons {

        display:
            flex;

        align-items:
            center;

        gap:
            7px;

    }


    .action-btn {

        width:
            34px;

        height:
            34px;

        border-radius:
            9px;

        display:
            inline-flex;

        align-items:
            center;

        justify-content:
            center;

        text-decoration:
            none;

        border:
            none;

        cursor:
            pointer;

        transition:
            .2s;

        font-size:
            14px;

    }


    .edit-btn {

        background:
            #e8f1ff;

        color:
            #174ea6;

    }


    .edit-btn:hover {

        background:
            #d7e6ff;

        color:
            #0d3b7a;

    }


    .delete-btn {

        background:
            #ffe9e9;

        color:
            #dc3545;

    }


    .delete-btn:hover:not(:disabled) {

        background:
            #ffd8d8;

        color:
            #b42323;

    }


    .delete-btn:disabled {

        opacity:
            .45;

        cursor:
            not-allowed;

        transform:
            none;

    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {

        text-align:
            center;

        padding:
            65px 20px;

    }


    .empty-icon {

        width:
            70px;

        height:
            70px;

        border-radius:
            20px;

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

        margin:
            0 auto 18px;

        font-size:
            29px;

    }


    .empty-state h3 {

        color:
            #183b5b;

        font-size:
            18px;

        margin:
            0 0 7px;

    }


    .empty-state p {

        color:
            #71869a;

        font-size:
            13px;

        margin:
            0;

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


        .add-user-btn {

            align-self:
                flex-start;

        }


        .users-card-header {

            flex-direction:
                column;

            align-items:
                flex-start;

        }

    }


    @media (max-width: 576px) {

        .profile-name,
        .profile-role {

            display:
                none;

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
            id="closeSidebarBtn"
            title="Close Sidebar"
            aria-label="Close Sidebar"
        >

            ×

        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>


        <a
            href="{{ route('admin.dashboard') }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>


        <a
            href="{{ route('admin.users.index') }}"
            class="active"
        >

            <i class="bi bi-people-fill"></i>

            User Management

        </a>


        <a
            href="{{ route('admin.orders.index') }}"
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>


        <a
            href="{{ route('admin.inventory.index') }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>


        <a
            href="{{ route('admin.reports') }}"
        >

            <i class="bi bi-bar-chart"></i>

            Reports & Analytics

        </a>


        <div class="menu-title mt-3">

            Account

        </div>


        <a
            href="{{ route('admin.account') }}"
        >

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
            id="menuButton"
            title="Open Sidebar"
            aria-label="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>


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



    <!-- CONTENT -->

    <main class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-heading">


                <div class="page-icon">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div>

                    <h1>

                        User Management

                    </h1>

                </div>


            </div>



            <!-- ADD USER -->

            <a
                href="{{ route('admin.users.create') }}"
                class="add-user-btn"
            >

                <i class="bi bi-person-plus-fill"></i>

                Add User

            </a>


        </div>



        <!-- SUCCESS MESSAGE -->

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



        <!-- ERROR MESSAGE -->

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



        <!-- VALIDATION ERRORS -->

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



        <!-- USERS CARD -->

        <div class="users-card">


            <!-- CARD HEADER -->

            <div class="users-card-header">


                <div>

                    <h2>

                        Registered Users

                    </h2>


                    <p>

                        View all users and their assigned roles.

                    </p>

                </div>


                <span class="users-count">

                    {{ $users->count() }}

                    user(s)

                </span>


            </div>



            <!-- USERS -->

            @if($users->count() > 0)


                <div class="table-wrapper">


                    <table class="users-table">


                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach(
                                $users
                                as $user
                            )


                                @php

                                    $userRole =
                                        strtolower(
                                            trim(
                                                $user->role ?? ''
                                            )
                                        );

                                @endphp


                                <tr>


                                    <!-- ID -->

                                    <td>

                                        <span class="user-id">

                                            #{{ $user->id }}

                                        </span>

                                    </td>



                                    <!-- NAME -->

                                    <td>

                                        <div class="user-name">

                                            {{ $user->name }}

                                        </div>

                                    </td>



                                    <!-- EMAIL -->

                                    <td>

                                        <div class="user-email">

                                            {{ $user->email }}

                                        </div>

                                    </td>



                                    <!-- ROLE -->

                                    <td>


                                        @if(
                                            $userRole === 'admin'
                                        )

                                            <span
                                                class="
                                                    role-badge
                                                    role-admin
                                                "
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-shield-fill
                                                    "
                                                ></i>

                                                Admin

                                            </span>


                                        @elseif(
                                            $userRole === 'staff'
                                        )

                                            <span
                                                class="
                                                    role-badge
                                                    role-staff
                                                "
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-person-badge-fill
                                                    "
                                                ></i>

                                                Staff

                                            </span>


                                        @else

                                            <span
                                                class="
                                                    role-badge
                                                    role-customer
                                                "
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-person-fill
                                                    "
                                                ></i>

                                                Customer

                                            </span>

                                        @endif


                                    </td>



                                    <!-- ACTIONS -->

                                    <td>


                                        <div class="action-buttons">


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route(
                                                    'admin.users.edit',
                                                    $user->id
                                                ) }}"
                                                class="
                                                    action-btn
                                                    edit-btn
                                                "
                                                title="Edit User"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-pencil-fill
                                                    "
                                                ></i>

                                            </a>



                                            <!-- DELETE -->

                                            @if(
                                                $userRole !== 'admin'
                                            )


                                                <form
                                                    action="{{ route(
                                                        'admin.users.destroy',
                                                        $user->id
                                                    ) }}"
                                                    method="POST"
                                                    class="m-0"
                                                    onsubmit="
                                                        return confirm(
                                                            'Are you sure you want to delete this user?'
                                                        );
                                                    "
                                                >

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="
                                                            action-btn
                                                            delete-btn
                                                        "
                                                        title="Delete User"
                                                    >

                                                        <i
                                                            class="
                                                                bi
                                                                bi-trash-fill
                                                            "
                                                        ></i>

                                                    </button>


                                                </form>


                                            @else


                                                <!-- PROTECTED ADMIN -->

                                                <button
                                                    type="button"
                                                    class="
                                                        action-btn
                                                        delete-btn
                                                    "
                                                    title="Admin users cannot be deleted"
                                                    disabled
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-lock-fill
                                                        "
                                                    ></i>

                                                </button>


                                            @endif


                                        </div>


                                    </td>


                                </tr>


                            @endforeach


                        </tbody>

                    </table>


                </div>


            @else


                <!-- EMPTY STATE -->

                <div class="empty-state">


                    <div class="empty-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <h3>

                        No Users Found

                    </h3>


                    <p>

                        There are currently no registered users.

                    </p>


                </div>


            @endif


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


    /*
    |--------------------------------------------------------------------------
    | OPEN SIDEBAR
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | CLOSE SIDEBAR
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | MENU BUTTON
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | CLOSE BUTTON
    |--------------------------------------------------------------------------
    */

    if (
        closeSidebarBtn
    ) {

        closeSidebarBtn.addEventListener(
            'click',
            function () {

                closeSidebar();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | RESIZE
    |--------------------------------------------------------------------------
    */

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