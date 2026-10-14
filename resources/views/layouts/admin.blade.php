<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin')
        | Water Station
    </title>


    <!-- Bootstrap 5 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    @yield('styles')


    <style>

        * {
            box-sizing: border-box;
        }


        /* =====================================================
           BODY
        ===================================================== */

        html,
        body {

            margin: 0;
            padding: 0;

            min-height: 100%;

        }


        body {

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

            overflow-x:
                hidden;

        }



        /* =====================================================
           SIDEBAR
           EXACT DASHBOARD STYLE
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
        .close-sidebar {

            width:
                30px;

            height:
                30px;

            min-width:
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
           MAIN CONTENT
        ===================================================== */

        .main-content {

            margin-left:
                260px;

            min-height:
                100vh;

            transition:
                .3s ease;

        }


        .main-content.expanded {

            margin-left:
                0;

        }



        /* =====================================================
           TOP NAVBAR
        ===================================================== */

        .top-navbar {

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
                rgba(
                    23,
                    78,
                    166,
                    .05
                );

        }


        .menu-button {

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


        .menu-button:hover {

            background:
                #d7e6ff;

            transform:
                scale(1.03);

        }



        /* =====================================================
           ADMIN PROFILE
        ===================================================== */

        .profile-area {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

        }


        .profile-picture {

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


        .profile-name {

            font-size:
                14px;

            font-weight:
                700;

            color:
                #183b5b;

        }


        .profile-role {

            margin-top:
                2px;

            font-size:
                11px;

            color:
                #2563b8;

            text-transform:
                capitalize;

        }



        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {

            padding:
                28px;

        }



        /* =====================================================
           MOBILE OVERLAY
        ===================================================== */

        .mobile-overlay {

            display:
                none;

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


            .sidebar.show {

                left:
                    0;

            }


            .main-content {

                margin-left:
                    0;

            }


            .main-content.expanded {

                margin-left:
                    0;

            }


            .mobile-overlay {

                position:
                    fixed;

                inset:
                    0;

                background:
                    rgba(
                        0,
                        0,
                        0,
                        .25
                    );

                z-index:
                    2999;

            }


            .mobile-overlay.show {

                display:
                    block;

            }

        }


        @media (max-width: 767px) {

            .top-navbar {

                height:
                    62px;

                padding:
                    0 15px;

            }


            .page-content {

                padding:
                    16px;

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


        <button
            class="close-sidebar"
            id="sidebarClose"
            type="button"
            title="Close Sidebar"
            aria-label="Close Sidebar"
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
            class="{{
                request()->routeIs('admin.dashboard')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>



        <!-- USER MANAGEMENT -->

        <a
            href="{{ route('admin.users.index') }}"
            class="{{
                request()->routeIs('admin.users.*')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-people"></i>

            User Management

        </a>



        <!-- ORDERS -->

        <a
            href="{{ route('admin.orders.index') }}"
            class="{{
                request()->routeIs('admin.orders.*')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-cart3"></i>

            Orders

        </a>



        <!-- INVENTORY -->

        <a
            href="{{ route('admin.inventory.index') }}"
            class="{{
                request()->routeIs('admin.inventory.*')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>



        <!-- REPORTS -->

        <a
            href="{{ route('admin.reports') }}"
            class="{{
                request()->routeIs('admin.reports')
                    ? 'active'
                    : ''
            }}"
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
            class="{{
                request()->routeIs('admin.account')
                    ? 'active'
                    : ''
            }}"
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



<!-- MOBILE OVERLAY -->

<div
    class="mobile-overlay"
    id="mobileOverlay"
></div>



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main
    class="main-content"
    id="mainContent"
>


    <!-- =================================================
         TOP NAVBAR
    ================================================= -->

    <nav class="top-navbar">


        <!-- MENU BUTTON -->

        <button
            type="button"
            class="menu-button"
            id="menuButton"
            title="Open Sidebar"
        >

            <i class="bi bi-list"></i>

        </button>



        <!-- ADMIN PROFILE -->

        <div class="profile-area">


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
                    class="profile-picture"
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

                    Administrator

                </div>

            </div>


        </div>


    </nav>



    <!-- =================================================
         PAGE CONTENT
    ================================================= -->

    <div class="page-content">

        @yield('content')

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


    const sidebarClose =
        document.getElementById(
            'sidebarClose'
        );


    const mobileOverlay =
        document.getElementById(
            'mobileOverlay'
        );


    const mainContent =
        document.getElementById(
            'mainContent'
        );


    function openSidebar() {

        if (
            window.innerWidth <= 991
        ) {

            sidebar.classList.add(
                'show'
            );

            sidebar.classList.remove(
                'hidden'
            );

            mobileOverlay.classList.add(
                'show'
            );

        } else {

            sidebar.classList.remove(
                'hidden'
            );

            mainContent.classList.remove(
                'expanded'
            );

            mobileOverlay.classList.remove(
                'show'
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

            mainContent.classList.add(
                'expanded'
            );

        }

    }


    menuButton.addEventListener(
        'click',
        function () {

            openSidebar();

        }
    );


    sidebarClose.addEventListener(
        'click',
        function () {

            closeSidebar();

        }
    );


    mobileOverlay.addEventListener(
        'click',
        function () {

            closeSidebar();

        }
    );


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

            } else {

                sidebar.classList.remove(
                    'hidden'
                );

                mainContent.classList.remove(
                    'expanded'
                );

            }

        }
    );

</script>


</body>

</html>