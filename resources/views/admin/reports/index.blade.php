
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Reports & Analytics | Admin | Water Station
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


    <!-- Chart.js -->

    <script
        src="https://cdn.jsdelivr.net/npm/chart.js"
    ></script>


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

        color:
            #ffffff;

        transform:
            scale(1.08);

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


    .reports-page {

        width:
            100%;

        max-width:
            1400px;

        margin:
            0 auto;

    }


    /* =====================================================
       HEADER
    ===================================================== */

    .reports-header {

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        margin-bottom:
            24px;

    }


    .reports-header-left {

        display:
            flex;

        align-items:
            center;

        gap:
            14px;

    }


    .reports-title-icon {

        width:
            54px;

        height:
            54px;

        border-radius:
            15px;

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
            23px;

        border:
            1px solid
            #d5e5f8;

        box-shadow:
            0 5px 15px
            rgba(
                23,
                78,
                166,
                .07
            );

    }


    .reports-header h1 {

        margin:
            0;

        font-size:
            28px;

        font-weight:
            700;

        color:
            #183b5b;

    }


    /* =====================================================
       FILTER
    ===================================================== */

    .filter-card {

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            15px;

        padding:
            16px 18px;

        margin-bottom:
            24px;

        box-shadow:
            0 5px 18px
            rgba(
                23,
                78,
                166,
                .055
            );

    }


    .filter-form {

        display:
            flex;

        align-items:
            flex-end;

        gap:
            12px;

        flex-wrap:
            wrap;

    }


    .filter-group {

        display:
            flex;

        flex-direction:
            column;

        gap:
            6px;

    }


    .filter-group label {

        color:
            #49677f;

        font-size:
            11px;

        font-weight:
            700;

    }


    .filter-group input {

        min-width:
            155px;

        border:
            1px solid #d8e5f5;

        border-radius:
            9px;

        padding:
            9px 11px;

        font-size:
            12px;

        color:
            #36566f;

        outline:
            none;

        background:
            #fbfdff;

    }


    .filter-group input:focus {

        border-color:
            #7fa9df;

        box-shadow:
            0 0 0 3px
            rgba(
                23,
                78,
                166,
                .08
            );

        background:
            #ffffff;

    }


    .filter-btn {

        border:
            none;

        background:
            linear-gradient(
                135deg,
                #174ea6,
                #2563a6
            );

        color:
            #ffffff;

        border-radius:
            9px;

        padding:
            10px 17px;

        font-size:
            12px;

        font-weight:
            700;

        cursor:
            pointer;

        transition:
            .2s ease;

    }


    .filter-btn:hover {

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
       SUMMARY GRID
    ===================================================== */

    .summary-grid {

        display:
            grid;

        grid-template-columns:
            repeat(
                4,
                minmax(
                    0,
                    1fr
                )
            );

        gap:
            12px;

        margin-bottom:
            22px;

    }


    .summary-card {

        position:
            relative;

        min-height:
            145px;

        padding:
            20px;

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            17px;

        box-shadow:
            0 5px 18px
            rgba(
                23,
                78,
                166,
                .055
            );

        overflow:
            hidden;

        transition:
            transform .2s ease,
            box-shadow .2s ease;

    }


    .summary-card:hover {

        transform:
            translateY(-3px);

        box-shadow:
            0 10px 24px
            rgba(
                23,
                78,
                166,
                .10
            );

    }


    .summary-card::after {

        content:
            "";

        position:
            absolute;

        width:
            85px;

        height:
            85px;

        border-radius:
            50%;

        right:
            -28px;

        top:
            -28px;

        background:
            #f2f7ff;

        pointer-events:
            none;

    }


    .summary-icon {

        position:
            relative;

        z-index:
            2;

        width:
            45px;

        height:
            45px;

        border-radius:
            12px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            19px;

        margin-bottom:
            14px;

    }


    .revenue-icon {

        background:
            #e8f1ff;

        color:
            #174ea6;

    }


    .orders-icon {

        background:
            #e8f7f3;

        color:
            #087f6b;

    }


    .units-icon {

        background:
            #eee8ff;

        color:
            #6542a5;

    }


    .average-icon {

        background:
            #e9f5ff;

        color:
            #0d6efd;

    }


    .summary-label {

        position:
            relative;

        z-index:
            2;

        color:
            #71869a;

        font-size:
            10px;

        font-weight:
            700;

        text-transform:
            uppercase;

        letter-spacing:
            .4px;

        margin-bottom:
            4px;

    }


    .summary-value {

        position:
            relative;

        z-index:
            2;

        font-size:
            25px;

        line-height:
            1.1;

        font-weight:
            800;

        color:
            #183b5b;

        white-space:
            nowrap;

    }


    .summary-sub {

        position:
            relative;

        z-index:
            2;

        margin-top:
            6px;

        font-size:
            10px;

        color:
            #8a9bad;

    }


    /* =====================================================
       STATUS OVERVIEW
    ===================================================== */

    .analytics-card {

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            17px;

        box-shadow:
            0 5px 18px
            rgba(
                23,
                78,
                166,
                .055
            );

        overflow:
            hidden;

        margin-bottom:
            22px;

    }


    .analytics-card-header {

        padding:
            18px 21px;

        border-bottom:
            1px solid #e3edf7;

    }


    .analytics-card-header h2 {

        margin:
            0;

        font-size:
            17px;

        font-weight:
            700;

        color:
            #183b5b;

    }


    .analytics-card-header p {

        margin:
            3px 0 0;

        font-size:
            10px;

        color:
            #71869a;

    }


    .status-grid {

        display:
            grid;

        grid-template-columns:
            repeat(
                6,
                1fr
            );

        gap:
            10px;

        padding:
            19px;

    }


    .status-item {

        padding:
            14px;

        background:
            #f8fbff;

        border:
            1px solid #e0eaf5;

        border-radius:
            12px;

        transition:
            .2s ease;

    }


    .status-item:hover {

        transform:
            translateY(-2px);

        border-color:
            #cadbec;

    }


    .status-label {

        font-size:
            9px;

        font-weight:
            700;

        color:
            #71869a;

        text-transform:
            uppercase;

        letter-spacing:
            .35px;

    }


    .status-number {

        margin-top:
            5px;

        font-size:
            22px;

        font-weight:
            800;

        color:
            #183b5b;

    }


    /* =====================================================
       CHART GRID
    ===================================================== */

    .reports-grid {

        display:
            grid;

        grid-template-columns:
            2fr 1fr;

        gap:
            18px;

        margin-bottom:
            22px;

    }


    .report-card {

        background:
            #ffffff;

        border:
            1px solid #d8e5f5;

        border-radius:
            17px;

        box-shadow:
            0 5px 20px
            rgba(
                23,
                78,
                166,
                .06
            );

        overflow:
            hidden;

    }


    .report-card-header {

        padding:
            18px 20px;

        border-bottom:
            1px solid #e4edf7;

    }


    .report-card-header h2 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            17px;

        font-weight:
            700;

    }


    .report-card-header p {

        margin:
            4px 0 0;

        color:
            #7b91a5;

        font-size:
            10px;

    }


    /* =====================================================
       MONTHLY SALES GRAPH
    ===================================================== */

    .chart-area {

        padding:
            20px;

    }


    .chart-bars {

        height:
            255px;

        display:
            flex;

        align-items:
            flex-end;

        gap:
            12px;

        padding:
            10px 5px 0;

        border-bottom:
            1px solid #d8e5f5;

    }


    .chart-column {

        flex:
            1;

        height:
            100%;

        display:
            flex;

        flex-direction:
            column;

        justify-content:
            flex-end;

        align-items:
            center;

        gap:
            7px;

    }


    .bar-value {

        font-size:
            9px;

        color:
            #6b8299;

        min-height:
            12px;

        white-space:
            nowrap;

    }


    .bar {

        width:
            68%;

        max-width:
            42px;

        min-height:
            3px;

        background:
            linear-gradient(
                180deg,
                #5c94dc,
                #174ea6
            );

        border-radius:
            7px 7px 0 0;

        transition:
            height .3s ease,
            opacity .2s ease;

    }


    .bar:hover {

        opacity:
            .78;

    }


    .bar-label {

        font-size:
            10px;

        color:
            #6b8299;

    }


    /* =====================================================
       STATUS CHART
    ===================================================== */

    .status-chart-area {

        height:
            295px;

        padding:
            18px 20px 20px;

    }


    .status-chart-wrapper {

        position:
            relative;

        width:
            100%;

        height:
            100%;

    }


    /* =====================================================
       RECENT SALES TABLE
    ===================================================== */

    .sales-table-card {

        background:
            #ffffff;

        border:
            1px solid #dce8f5;

        border-radius:
            17px;

        box-shadow:
            0 5px 20px
            rgba(
                23,
                78,
                166,
                .055
            );

        overflow:
            hidden;

    }


    .sales-table-header {

        padding:
            19px 21px;

        border-bottom:
            1px solid #e3edf7;

    }


    .sales-table-header h2 {

        margin:
            0;

        color:
            #183b5b;

        font-size:
            18px;

        font-weight:
            700;

    }


    .sales-table-header p {

        margin:
            3px 0 0;

        color:
            #71869a;

        font-size:
            11px;

    }


    .table-wrapper {

        width:
            100%;

        overflow-x:
            auto;

    }


    .sales-table {

        width:
            100%;

        min-width:
            800px;

        border-collapse:
            collapse;

    }


    .sales-table thead th {

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
            13px 16px;

        border-bottom:
            1px solid #dce8f5;

        white-space:
            nowrap;

    }


    .sales-table tbody td {

        padding:
            14px 16px;

        border-bottom:
            1px solid #edf2f7;

        color:
            #36536d;

        font-size:
            12px;

        vertical-align:
            middle;

    }


    .sales-table tbody tr {

        transition:
            .15s ease;

    }


    .sales-table tbody tr:hover {

        background:
            #f8fbff;

    }


    .sales-table tbody tr:last-child td {

        border-bottom:
            none;

    }


    .sale-amount {

        color:
            #198754;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    .delivered-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            5px;

        padding:
            5px 9px;

        border-radius:
            20px;

        background:
            #e9f8ef;

        color:
            #198754;

        font-size:
            9px;

        font-weight:
            700;

    }


    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {

        text-align:
            center;

        padding:
            60px 20px;

    }


    .empty-icon {

        width:
            68px;

        height:
            68px;

        border-radius:
            18px;

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
            0 auto 16px;

        font-size:
            28px;

    }


    .empty-state h3 {

        color:
            #183b5b;

        font-size:
            17px;

        margin:
            0 0 6px;

    }


    .empty-state p {

        color:
            #71869a;

        font-size:
            12px;

        margin:
            0;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1150px) {

        .summary-grid {

            grid-template-columns:
                repeat(
                    2,
                    1fr
                );

        }


        .status-grid {

            grid-template-columns:
                repeat(
                    3,
                    1fr
                );

        }

    }


    @media (max-width: 1000px) {

        .reports-grid {

            grid-template-columns:
                1fr;

        }

    }


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


        .reports-header h1 {

            font-size:
                23px;

        }


        .summary-grid {

            grid-template-columns:
                1fr;

        }


        .status-grid {

            grid-template-columns:
                repeat(
                    2,
                    1fr
                );

        }

    }


    @media (max-width: 576px) {

        .filter-form {

            flex-direction:
                column;

            align-items:
                stretch;

        }


        .filter-group input,
        .filter-btn {

            width:
                100%;

        }


        .status-grid {

            grid-template-columns:
                1fr;

        }


        .chart-bars {

            gap:
                6px;

        }


        .profile-info {

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
        >

            <i class="bi bi-people"></i>

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
            class="active"
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



    <!-- REPORT CONTENT -->

    <main class="content">


        <div class="reports-page">


            <!-- HEADER -->

            <div class="reports-header">

                <div class="reports-header-left">

                    <div class="reports-title-icon">

                        <i class="bi bi-bar-chart-fill"></i>

                    </div>


                    <div>

                        <h1>
                            Reports & Analytics
                        </h1>

                    </div>

                </div>

            </div>



            <!-- FILTER -->

            <div class="filter-card">

                <form
                    action="{{ route('admin.reports') }}"
                    method="GET"
                    class="filter-form"
                >

                    <div class="filter-group">

                        <label for="start_date">
                            Start Date
                        </label>


                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{
                                request(
                                    'start_date',
                                    $startDate->format('Y-m-d')
                                )
                            }}"
                        >

                    </div>


                    <div class="filter-group">

                        <label for="end_date">
                            End Date
                        </label>


                        <input
                            type="date"
                            id="end_date"
                            name="end_date"
                            value="{{
                                request(
                                    'end_date',
                                    $endDate->format('Y-m-d')
                                )
                            }}"
                        >

                    </div>


                    <button
                        type="submit"
                        class="filter-btn"
                    >

                        <i
                            class="
                                bi
                                bi-funnel-fill
                                me-1
                            "
                        ></i>

                        Apply Filter

                    </button>

                </form>

            </div>



            <!-- SUMMARY -->

            <div class="summary-grid">


                <!-- TOTAL REVENUE -->

                <div class="summary-card">

                    <div class="summary-icon revenue-icon">

                        <i class="bi bi-cash-stack"></i>

                    </div>


                    <div>

                        <div class="summary-label">
                            Total Revenue
                        </div>


                        <div class="summary-value">

                            ₱{{
                                number_format(
                                    $totalRevenue ?? 0,
                                    2
                                )
                            }}

                        </div>


                        <div class="summary-sub">
                            Delivered orders only
                        </div>

                    </div>

                </div>



                <!-- DELIVERED ORDERS -->

                <div class="summary-card">

                    <div class="summary-icon orders-icon">

                        <i class="bi bi-check-circle-fill"></i>

                    </div>


                    <div>

                        <div class="summary-label">
                            Delivered Orders
                        </div>


                        <div class="summary-value">

                            {{ $deliveredOrders ?? 0 }}

                        </div>


                        <div class="summary-sub">
                            Successfully delivered
                        </div>

                    </div>

                </div>



                <!-- WATER UNITS -->

                <div class="summary-card">

                    <div class="summary-icon units-icon">

                        <i class="bi bi-droplet-fill"></i>

                    </div>


                    <div>

                        <div class="summary-label">
                            Water Units Sold
                        </div>


                        <div class="summary-value">

                            {{ $waterUnitsSold ?? 0 }}

                        </div>


                        <div class="summary-sub">
                            Delivered orders
                        </div>

                    </div>

                </div>



                <!-- AVERAGE -->

                <div class="summary-card">

                    <div class="summary-icon average-icon">

                        <i class="bi bi-graph-up-arrow"></i>

                    </div>


                    <div>

                        <div class="summary-label">
                            Average Order Value
                        </div>


                        <div class="summary-value">

                            ₱{{
                                number_format(
                                    $averageOrderValue ?? 0,
                                    2
                                )
                            }}

                        </div>


                        <div class="summary-sub">
                            Average delivered order
                        </div>

                    </div>

                </div>


            </div>



            <!-- STATUS OVERVIEW -->

            <div class="analytics-card">


                <div class="analytics-card-header">

                    <h2>
                        Order Status Overview
                    </h2>


                    <p>
                        Current order distribution.
                    </p>

                </div>


                <div class="status-grid">


                    <div class="status-item">

                        <div class="status-label">
                            Total Orders
                        </div>


                        <div class="status-number">

                            {{ $totalOrders ?? 0 }}

                        </div>

                    </div>



                    <div class="status-item">

                        <div class="status-label">
                            Pending
                        </div>


                        <div class="status-number">

                            {{ $pendingOrders ?? 0 }}

                        </div>

                    </div>



                    <div class="status-item">

                        <div class="status-label">
                            Confirmed
                        </div>


                        <div class="status-number">

                            {{ $confirmedOrders ?? 0 }}

                        </div>

                    </div>



                    <div class="status-item">

                        <div class="status-label">
                            Preparing
                        </div>


                        <div class="status-number">

                            {{ $preparingOrders ?? 0 }}

                        </div>

                    </div>



                    <div class="status-item">

                        <div class="status-label">
                            Out for Delivery
                        </div>


                        <div class="status-number">

                            {{ $outForDeliveryOrders ?? 0 }}

                        </div>

                    </div>



                    <div class="status-item">

                        <div class="status-label">
                            Delivered
                        </div>


                        <div class="status-number">

                            {{ $deliveredOrders ?? 0 }}

                        </div>

                    </div>


                </div>

            </div>



            <!-- CHARTS -->

            <div class="reports-grid">


                <!-- MONTHLY REVENUE -->

                <div class="report-card">


                    <div class="report-card-header">

                        <h2>

                            <i
                                class="
                                    bi
                                    bi-graph-up-arrow
                                    me-2
                                "
                            ></i>

                            Monthly Revenue

                        </h2>


                        <p>
                            Revenue from delivered orders by month.
                        </p>

                    </div>


                    <div class="chart-area">


                        @php

                            $maxSales =
                                collect(
                                    $monthlySales ?? []
                                )->max(
                                    'sales'
                                );

                            $maxSales =
                                $maxSales > 0
                                    ? $maxSales
                                    : 1;

                        @endphp


                        <div class="chart-bars">


                            @foreach(
                                ($monthlySales ?? [])
                                as $month
                            )


                                @php

                                    $height =
                                        (
                                            $month['sales']
                                            /
                                            $maxSales
                                        )
                                        *
                                        100;

                                @endphp


                                <div class="chart-column">


                                    <div class="bar-value">

                                        @if(
                                            $month['sales'] > 0
                                        )

                                            ₱{{
                                                number_format(
                                                    $month['sales'],
                                                    0
                                                )
                                            }}

                                        @endif

                                    </div>


                                    <div
                                        class="bar"
                                        style="
                                            height:
                                            {{ max(
                                                $height,
                                                2
                                            ) }}%;
                                        "
                                        title="₱{{
                                            number_format(
                                                $month['sales'],
                                                2
                                            )
                                        }}"
                                    ></div>


                                    <div class="bar-label">

                                        {{ $month['month'] }}

                                    </div>


                                </div>


                            @endforeach


                        </div>

                    </div>

                </div>



                <!-- ORDER STATUS -->

                <div class="report-card">


                    <div class="report-card-header">

                        <h2>

                            <i
                                class="
                                    bi
                                    bi-pie-chart-fill
                                    me-2
                                "
                            ></i>

                            Order Status

                        </h2>


                        <p>
                            Orders within the selected period.
                        </p>

                    </div>


                    <div class="status-chart-area">

                        <div class="status-chart-wrapper">

                            <canvas
                                id="orderStatusChart"
                            ></canvas>

                        </div>

                    </div>

                </div>


            </div>



            <!-- RECENT DELIVERED SALES -->

            <div class="sales-table-card">


                <div class="sales-table-header">

                    <h2>
                        Recent Delivered Sales
                    </h2>


                    <p>
                        Latest 8 delivered orders included in total revenue.
                    </p>

                </div>


                @if(
                    isset($recentSales)
                    &&
                    $recentSales->count() > 0
                )


                    <div class="table-wrapper">

                        <table class="sales-table">


                            <thead>

                                <tr>

                                    <th>
                                        Order
                                    </th>

                                    <th>
                                        Customer
                                    </th>

                                    <th>
                                        Product
                                    </th>

                                    <th>
                                        Quantity
                                    </th>

                                    <th>
                                        Revenue
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @foreach(
                                    $recentSales->take(8)
                                    as $sale
                                )


                                    <tr>


                                        <td>

                                            <strong>
                                                #{{ $sale->id }}
                                            </strong>

                                        </td>


                                        <td>

                                            {{ $sale->customer_name }}

                                        </td>


                                        <td>

                                            {{ $sale->product_name }}

                                        </td>


                                        <td>

                                            {{ $sale->quantity }}

                                        </td>


                                        <td>

                                            <span class="sale-amount">

                                                ₱{{
                                                    number_format(
                                                        $sale->total_amount
                                                        ??
                                                        $sale->total_price
                                                        ??
                                                        0,
                                                        2
                                                    )
                                                }}

                                            </span>

                                        </td>


                                        <td>

                                            <span class="delivered-badge">

                                                <i
                                                    class="
                                                        bi
                                                        bi-check-circle-fill
                                                    "
                                                ></i>

                                                Delivered

                                            </span>

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-receipt"></i>

                        </div>


                        <h3>
                            No Delivered Sales Yet
                        </h3>


                        <p>
                            Sales will automatically appear here when an order is marked Delivered.
                        </p>

                    </div>


                @endif


            </div>


        </div>


    </main>


</div>



<!-- JAVASCRIPT -->

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


    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const chart =
                document.getElementById(
                    'orderStatusChart'
                );


            if (!chart) {

                return;

            }


            new Chart(
                chart,
                {

                    type:
                        'doughnut',

                    data:
                    {

                        labels:
                        [

                            'Pending',

                            'Confirmed',

                            'Preparing',

                            'Out for Delivery',

                            'Delivered',

                            'Cancelled'

                        ],

                        datasets:
                        [

                            {

                                data:
                                [

                                    {{ $pendingOrders ?? 0 }},

                                    {{ $confirmedOrders ?? 0 }},

                                    {{ $preparingOrders ?? 0 }},

                                    {{ $outForDeliveryOrders ?? 0 }},

                                    {{ $deliveredOrders ?? 0 }},

                                    {{ $cancelledOrders ?? 0 }}

                                ],

                                backgroundColor:
                                [

                                    '#f0ad4e',

                                    '#4f8bd6',

                                    '#6542a5',

                                    '#087f6b',

                                    '#28a745',

                                    '#dc3545'

                                ],

                                borderWidth:
                                    0

                            }

                        ]

                    },


                    options:
                    {

                        responsive:
                            true,

                        maintainAspectRatio:
                            false,

                        cutout:
                            '62%',

                        plugins:
                        {

                            legend:
                            {

                                position:
                                    'bottom',

                                labels:
                                {

                                    boxWidth:
                                        11,

                                    padding:
                                        12,

                                    font:
                                    {
                                        size:
                                            9
                                    }

                                }

                            }

                        }

                    }

                }
            );

        }
    );

</script>


</body>

</html>

