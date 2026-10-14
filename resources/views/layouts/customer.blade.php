<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Customer')
        | Water Station
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


    @yield('styles')


<style>

    * {
        box-sizing: border-box;
    }


    html,
    body {

        margin: 0;
        padding: 0;
        min-height: 100%;

    }


    body {

        font-family:
            Arial,
            Helvetica,
            sans-serif;

        background:
            linear-gradient(
                135deg,
                #f4fcfd 0%,
                #eefafb 50%,
                #f8ffff 100%
            );

        color:
            #263238;

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
            #ffffff;

        border-right:
            1px solid #dceff1;

        z-index:
            3000;

        overflow-y:
            auto;

        transition:
            transform .3s ease;

        box-shadow:
            5px 0 20px
            rgba(0,121,133,.06);

    }


    .sidebar.hidden {

        transform:
            translateX(-100%);

    }


    .sidebar::-webkit-scrollbar {

        width:
            5px;

    }


    .sidebar::-webkit-scrollbar-thumb {

        background:
            #cdecef;

        border-radius:
            10px;

    }



    /* =====================================================
       SIDEBAR HEADER
    ===================================================== */

    .sidebar-header {

        height:
            70px;

        padding:
            0 20px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        border-bottom:
            1px solid #edf2f4;

    }


    .brand {

        display:
            flex;

        align-items:
            center;

        gap:
            10px;

        color:
            #0097a7;

        font-weight:
            700;

        font-size:
            18px;

    }


    .brand-icon {

        width:
            38px;

        height:
            38px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        border-radius:
            10px;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            20px;

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
            #607d8b;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-family:
            Arial,
            Helvetica,
            sans-serif;

        font-size:
            26px;

        font-weight:
            400;

        line-height:
            1;

        padding:
            0;

        margin:
            0;

        cursor:
            pointer;

        position:
            relative;

        z-index:
            999999;

        pointer-events:
            auto !important;

        transition:
            .2s ease;

    }


    .close-sidebar:hover {

        background:
            transparent;

        color:
            #00838f;

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
            20px 14px;

    }


    .menu-label {

        font-size:
            11px;

        font-weight:
            700;

        color:
            #90a4ae;

        text-transform:
            uppercase;

        padding:
            0 12px;

        margin-bottom:
            9px;

        letter-spacing:
            .5px;

    }


    .sidebar-menu a {

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

        padding:
            12px 13px;

        margin-bottom:
            5px;

        border-radius:
            10px;

        color:
            #546e7a;

        text-decoration:
            none;

        font-size:
            14px;

        font-weight:
            600;

        transition:
            .2s ease;

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
            #e0f7fa;

        color:
            #00838f;

        transform:
            translateX(2px);

    }



    /* =====================================================
       SIDEBAR BOTTOM
    ===================================================== */

    .sidebar-bottom {

        margin-top:
            20px;

        border-top:
            1px solid #edf2f4;

        padding-top:
            15px;

    }


    .logout-btn {

        width:
            100%;

        border:
            none;

        background:
            transparent;

        text-align:
            left;

        color:
            #e53935 !important;

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

        padding:
            12px 13px;

        border-radius:
            10px;

        font-size:
            14px;

        font-weight:
            600;

        cursor:
            pointer;

        transition:
            .2s ease;

    }


    .logout-btn i {

        width:
            20px;

        text-align:
            center;

        font-size:
            17px;

    }


    .logout-btn:hover {

        background:
            #ffebee !important;

        color:
            #c62828 !important;

    }



    /* =====================================================
       MAIN
    ===================================================== */

    .main {

        margin-left:
            260px;

        min-height:
            100vh;

        padding:
            94px 24px 40px;

        transition:
            margin-left .3s ease;

    }


    .main.expanded {

        margin-left:
            0;

    }



    /* =====================================================
       SHARED CUSTOMER NAVBAR
    ===================================================== */

    .topbar {

        height:
            68px;

        background:
            rgba(255,255,255,.97);

        border-bottom:
            1px solid #e2f0f2;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        padding:
            0 28px;

        position:
            fixed;

        top:
            0;

        left:
            260px;

        right:
            0;

        z-index:
            2500;

        box-shadow:
            0 3px 15px
            rgba(0,121,133,.05);

        transition:
            left .3s ease;

    }


    .main.expanded .topbar {

        left:
            0;

    }


    .topbar-left {

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

    }


    .open-sidebar {

        width:
            40px;

        height:
            40px;

        border:
            none;

        border-radius:
            10px;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            20px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        cursor:
            pointer;

        transition:
            .2s ease;

    }


    .open-sidebar:hover {

        background:
            #ccf3f6;

        transform:
            scale(1.03);

    }


    .topbar-title h2 {

        margin:
            0;

        font-size:
            18px;

        font-weight:
            700;

        color:
            #263238;

    }


    .topbar-title p {

        margin:
            2px 0 0;

        font-size:
            10px;

        color:
            #0097a7;

    }


    .profile {

        display:
            flex;

        align-items:
            center;

        gap:
            10px;

    }


    .profile img {

        width:
            38px;

        height:
            38px;

        border-radius:
            50%;

        object-fit:
            cover;

        border:
            2px solid #b2ebf2;

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
                #e0f7fa,
                #b2ebf2
            );

        color:
            #00838f;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            19px;

        border:
            1px solid #b2ebf2;

    }


    .profile-name {

        margin:
            0;

        font-size:
            13px;

        font-weight:
            700;

        color:
            #263238;

    }


    .profile-role {

        margin:
            2px 0 0;

        font-size:
            10px;

        color:
            #0097a7;

    }



    /* =====================================================
       PAGE CONTENT
    ===================================================== */

    .customer-content {

        width:
            100%;

    }



    /* =====================================================
       MOBILE
    ===================================================== */

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

            padding:
                88px 22px 40px;

        }


        .topbar {

            left:
                0 !important;

            right:
                0 !important;

            top:
                0 !important;

            height:
                68px;

            border-radius:
                0;

        }


        .main.expanded .topbar {

            left:
                0 !important;

            right:
                0 !important;

        }

    }


    @media (max-width: 576px) {

        .main {

            padding:
                82px 12px 35px;

        }


        .topbar {

            left:
                0 !important;

            right:
                0 !important;

            top:
                0 !important;

            height:
                68px;

            padding:
                0 15px;

        }


        .main.expanded .topbar {

            left:
                0 !important;

            right:
                0 !important;

        }


        .topbar-title h2 {

            font-size:
                17px;

        }


        .topbar-title p {

            font-size:
                9px;

        }


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
     CUSTOMER SIDEBAR
===================================================== -->

<aside
    class="sidebar"
    id="sidebar"
>


    <!-- HEADER -->

    <div class="sidebar-header">


        <div class="brand">


            <div class="brand-icon">

                <i class="bi bi-droplet-fill"></i>

            </div>


            <span>
                Water Station
            </span>


        </div>


        <!-- X BUTTON -->

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



    <!-- MENU -->

    <div class="sidebar-menu">


        <div class="menu-label">

            Customer Menu

        </div>



        <!-- DASHBOARD -->

        <a
            href="{{ route('customer.dashboard') }}"
            class="{{
                request()->routeIs('customer.dashboard')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-grid-1x2-fill"></i>

            <span>
                Dashboard
            </span>

        </a>



        <!-- PRODUCTS -->

        <a
            href="{{ route('customer.products') }}"
            class="{{
                request()->routeIs('customer.products')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-droplet-fill"></i>

            <span>
                Products
            </span>

        </a>



        <!-- MY ORDERS -->

        <a
            href="{{ route('customer.orders') }}"
            class="{{
                request()->routeIs('customer.orders*')
                    ? 'active'
                    : ''
            }}"
        >

            <i class="bi bi-bag-check-fill"></i>

            <span>
                My Orders
            </span>

        </a>



        <!-- ACCOUNT -->

        <div class="sidebar-bottom">


            <a
                href="{{ route('customer.account') }}"
                class="{{
                    request()->routeIs('customer.account*')
                        ? 'active'
                        : ''
                }}"
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
                class="m-0"
            >

                @csrf


                <button
                    type="submit"
                    class="logout-btn"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        Logout
                    </span>

                </button>


            </form>


        </div>


    </div>

</aside>



<!-- =====================================================
     MAIN
===================================================== -->

<main
    class="main"
    id="main"
>


    <!-- =================================================
         SHARED CUSTOMER NAVBAR
    ================================================= -->

    <div
        class="topbar"
        id="topbar"
    >


        <!-- LEFT -->

        <div class="topbar-left">


            <button
                type="button"
                class="open-sidebar"
                id="openSidebar"
                title="Open Sidebar"
                aria-label="Open Sidebar"
            >

                <i class="bi bi-list"></i>

            </button>


            <div class="topbar-title">

                <h2>

                    @yield(
                        'navbar_title',
                        'Customer Dashboard'
                    )

                </h2>


                <p>

                    @yield(
                        'navbar_subtitle',
                        'Water Refilling Station'
                    )

                </p>

            </div>


        </div>



        <!-- PROFILE -->

        <div class="profile">


            @if(
                auth()->user()->profile_picture
            )

                <img
                    src="{{ asset(
                        'storage/' .
                        auth()->user()->profile_picture
                    ) }}"
                    alt="Profile"
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

                    Customer

                </p>

            </div>


        </div>


    </div>



    <!-- =================================================
         CONTENT
    ================================================= -->

    <div class="customer-content">

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


    const main =
        document.getElementById(
            'main'
        );


    const openSidebarBtn =
        document.getElementById(
            'openSidebar'
        );


    const closeSidebarBtn =
        document.getElementById(
            'closeSidebarBtn'
        );


    function openSidebar() {

        sidebar.classList.remove(
            'hidden'
        );

        sidebar.classList.add(
            'show'
        );

        main.classList.remove(
            'expanded'
        );

    }


    function closeSidebar() {

        sidebar.classList.add(
            'hidden'
        );

        sidebar.classList.remove(
            'show'
        );

        main.classList.add(
            'expanded'
        );

    }


    if (openSidebarBtn) {

        openSidebarBtn.addEventListener(
            'click',
            function () {

                openSidebar();

            }
        );

    }


    if (closeSidebarBtn) {

        closeSidebarBtn.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                closeSidebar();

            }
        );

    }


    function updateLayout() {

        if (
            window.innerWidth <= 991
        ) {

            sidebar.classList.add(
                'hidden'
            );

            sidebar.classList.remove(
                'show'
            );

            main.classList.add(
                'expanded'
            );

        } else {

            sidebar.classList.remove(
                'hidden'
            );

            sidebar.classList.remove(
                'show'
            );

            main.classList.remove(
                'expanded'
            );

        }

    }


    updateLayout();


    window.addEventListener(
        'resize',
        updateLayout
    );

</script>


@stack('scripts')


</body>

</html>