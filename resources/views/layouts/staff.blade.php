<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Staff Dashboard | Water Refilling Station')
    </title>


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

        body {

            margin: 0;

            font-family:
                "Segoe UI",
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
                #183b5b;

            overflow-x:
                hidden;

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
                #ffffff;

            z-index:
                3000;

            overflow-y:
                auto;

            transition:
                .3s ease;

            box-shadow:
                6px 0 25px
                rgba(23,78,166,.18);

        }


        .sidebar.hidden {

            left:
                -260px;

        }


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

            font-size:
                24px;

            cursor:
                pointer;

        }


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

            color:
                rgba(255,255,255,.65);

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
                rgba(255,255,255,.17);

            color:
                white;

            transform:
                translateX(2px);

        }


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

            padding:
                11px 13px;

            border-radius:
                11px;

            margin-bottom:
                5px;

            font-size:
                14px;

            cursor:
                pointer;

            text-align:
                left;

            transition:
                .2s;

        }


        .logout-link:hover {

            background:
                rgba(255,255,255,.17);

            color:
                white;

            transform:
                translateX(2px);

        }


        .logout-link i {

            width:
                20px;

            text-align:
                center;

            font-size:
                17px;

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
                1px solid #d8e5f5;

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
                2500;

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
                1px solid #bdd4f5;

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
           COMMON
        ===================================================== */

        .section-title {

            font-size:
                21px;

            font-weight:
                700;

            margin-top:
                27px;

            margin-bottom:
                14px;

            color:
                #17457d;

        }


        .custom-alert {

            border:
                none;

            border-radius:
                12px;

            font-size:
                12px;

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

        }


        @media (max-width: 576px) {

            .profile-name,
            .profile-role {

                display:
                    none;

            }

        }

    </style>

    @yield('styles')

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
                    Staff Panel
                </small>

            </div>


        </div>


        <button
            class="close-sidebar"
            id="closeSidebarBtn"
            type="button"
        >

            <i class="bi bi-x-lg"></i>

        </button>


    </div>



    <div class="sidebar-menu">


        <div class="menu-title">

            Main Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('staff.dashboard') }}"
            class="{{ request()->routeIs('staff.dashboard') ? 'active' : '' }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            Dashboard

        </a>



        <!-- ORDERS -->

        <a
            href="{{ route('staff.orders.index') }}"
            class="{{ request()->routeIs('staff.orders.*') ? 'active' : '' }}"
        >

            <i class="bi bi-cart-check-fill"></i>

            Orders

        </a>



        <!-- PRODUCTS -->

        <a
            href="{{ route('staff.products.index') }}"
            class="{{ request()->routeIs('staff.products.*') ? 'active' : '' }}"
        >

            <i class="bi bi-droplet-fill"></i>

            Products

        </a>



        <!-- INVENTORY -->

        <a
            href="{{ route('staff.inventory.index') }}"
            class="{{ request()->routeIs('staff.inventory.*') ? 'active' : '' }}"
        >

            <i class="bi bi-boxes"></i>

            Inventory

        </a>



        <!-- DELIVERIES -->

        <a
            href="{{ route('staff.deliveries.index') }}"
            class="{{ request()->routeIs('staff.deliveries.*') ? 'active' : '' }}"
        >

            <i class="bi bi-truck"></i>

            Deliveries

        </a>



        <div class="menu-title mt-3">

            Account

        </div>



        <!-- ACCOUNT -->

        <a
            href="{{ route('staff.account') }}"
            class="{{ request()->routeIs('staff.account') ? 'active' : '' }}"
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
    ================================================== -->

    <nav class="navbar-custom">


        <button
            class="menu-btn"
            id="menuButton"
            type="button"
        >

            <i class="bi bi-list"></i>

        </button>



        <!-- STAFF PROFILE -->

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


            <div>

                <div class="profile-name">

                    {{ auth()->user()->name }}

                </div>


                <div class="profile-role">

                    Staff

                </div>

            </div>


        </div>


    </nav>



    <!-- =================================================
         PAGE CONTENT
    ================================================== -->

    <main class="content">

        @yield('content')

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


    menuButton.addEventListener(
        'click',
        openSidebar
    );


    closeSidebarBtn.addEventListener(
        'click',
        closeSidebar
    );


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


@yield('scripts')

</body>

</html>