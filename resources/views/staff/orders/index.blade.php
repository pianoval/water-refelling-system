<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>
        Orders | Staff | Water Station
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
    /* =====================================================
       BODY
    ===================================================== */
    body {
        margin: 0;
        font-family:
            Arial,
            Helvetica,
            sans-serif;
        background:
            linear-gradient(
                135deg,
                #f2fbfa 0%,
                #f7fcfc 50%,
                #e9f6f5 100%
            );
        color:
            #234344;
        min-height:
            100vh;
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
                #0b4f50 0%,
                #126968 48%,
                #18817d 100%
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
            6px 0 22px
            rgba(
                0,
                78,
                79,
                .16
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
        height:
            70px;
        padding:
            0 18px;
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
                .16
            );
    }
    .brand {
        display:
            flex;
        align-items:
            center;
        gap:
            10px;
        color:
            #ffffff;
        font-size:
            17px;
        font-weight:
            700;
    }
    .brand-icon {
        width:
            40px;
        height:
            40px;
        border-radius:
            12px;
        background:
            rgba(
                255,
                255,
                255,
                .14
            );
        display:
            flex;
        align-items:
            center;
        justify-content:
            center;
        border:
            1px solid
            rgba(
                255,
                255,
                255,
                .18
            );
    }
    .close-sidebar {
        width:
            34px;
        height:
            34px;
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
        cursor:
            pointer;
        font-size:
            19px;
    }
    /* =====================================================
       SIDEBAR MENU
    ===================================================== */
    .sidebar-menu {
        padding:
            18px 12px;
    }
    .menu-title {
        padding:
            8px 12px;
        margin-bottom:
            5px;
        color:
            rgba(
                255,
                255,
                255,
                .58
            );
        font-size:
            10px;
        text-transform:
            uppercase;
        letter-spacing:
            1px;
    }
    .sidebar a {
        display:
            flex;
        align-items:
            center;
        gap:
            12px;
        padding:
            11px 13px;
        margin-bottom:
            5px;
        border-radius:
            10px;
        color:
            rgba(
                255,
                255,
                255,
                .88
            );
        text-decoration:
            none;
        font-size:
            14px;
        font-weight:
            600;
        transition:
            .2s ease;
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
                .15
            );
        color:
            #ffffff;
        transform:
            translateX(2px);
    }
    /* =====================================================
       LOGOUT
    ===================================================== */
    .logout-link {
        width:
            100%;
        border:
            none;
        background:
            transparent;
        color:
            rgba(
                255,
                255,
                255,
                .88
            );
        display:
            flex;
        align-items:
            center;
        gap:
            12px;
        padding:
            11px 13px;
        border-radius:
            10px;
        font-size:
            14px;
        font-weight:
            600;
        text-align:
            left;
        cursor:
            pointer;
    }
    .logout-link:hover {
        background:
            rgba(
                255,
                255,
                255,
                .15
            );
        color:
            #ffffff;
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
       TOPBAR
    ===================================================== */
    .topbar {
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
            #d8eceb;
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
            rgba(
                0,
                100,
                100,
                .05
            );
    }
    .topbar-left {
        display:
            flex;
        align-items:
            center;
    }
    .menu-btn {
        width:
            42px;
        height:
            42px;
        border:
            none;
        border-radius:
            9px;
        background:
            #e2f5f3;
        color:
            #08716e;
        font-size:
            21px;
        display:
            flex;
        align-items:
            center;
        justify-content:
            center;
        cursor:
            pointer;
    }
    /* =====================================================
       STAFF PROFILE
    ===================================================== */
    .profile {
        display:
            flex;
        align-items:
            center;
        gap:
            10px;
    }
    .profile-image,
    .profile-placeholder {
        width:
            38px;
        height:
            38px;
        border-radius:
            50%;
    }
    .profile-image {
        object-fit:
            cover;
        border:
            2px solid
            #b9dfdc;
    }
    .profile-placeholder {
        background:
            #e0f3f1;
        color:
            #08716e;
        display:
            flex;
        align-items:
            center;
        justify-content:
            center;
    }
    .profile-name {
        margin:
            0;
        font-size:
            13px;
        font-weight:
            700;
        color:
            #234344;
    }
    .profile-role {
        margin:
            2px 0 0;
        color:
            #08716e;
        font-size:
            10px;
    }
    /* =====================================================
       CONTENT
    ===================================================== */
    .content {
        padding:
            26px;
    }
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
            20px;
    }
    .page-header-left {
        display:
            flex;
        align-items:
            center;
        gap:
            14px;
    }
    .page-icon {
        width:
            54px;
        height:
            54px;
        border-radius:
            15px;
        background:
            linear-gradient(
                135deg,
                #e0f3f1,
                #d4eeeb
            );
        color:
            #08716e;
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
            #c6e5e1;
    }
    .page-header h1 {
        margin:
            0;
        font-size:
            28px;
        font-weight:
            700;
        color:
            #126968;
    }
    /* =====================================================
       ALERTS
    ===================================================== */
    .custom-alert {
        border:
            none;
        border-radius:
            11px;
        font-size:
            12px;
        padding:
            13px 16px;
    }
    /* =====================================================
       ORDERS CARD
    ===================================================== */
    .orders-card {
        background:
            #ffffff;
        border:
            1px solid
            #d9ecea;
        border-radius:
            17px;
        overflow:
            hidden;
        box-shadow:
            0 5px 15px
            rgba(
                0,
                90,
                90,
                .06
            );
    }
    .orders-header {
        padding:
            18px 20px;
        display:
            flex;
        align-items:
            center;
        justify-content:
            space-between;
        border-bottom:
            1px solid
            #edf3f2;
    }
    .orders-header h3 {
        margin:
            0;
        font-size:
            16px;
        font-weight:
            700;
        color:
            #234344;
    }
    .orders-count {
        padding:
            6px 10px;
        border-radius:
            20px;
        background:
            #e0f3f1;
        color:
            #08716e;
        font-size:
            10px;
        font-weight:
            700;
    }
    /* =====================================================
       TABLE
    ===================================================== */
    .table-wrapper {
        overflow-x:
            auto;
    }
    .orders-table {
        width:
            100%;
        min-width:
            950px;
        border-collapse:
            collapse;
    }
    .orders-table th {
        padding:
            12px 14px;
        background:
            #edf8f7;
        color:
            #617f7e;
        font-size:
            10px;
        font-weight:
            700;
        text-transform:
            uppercase;
        white-space:
            nowrap;
    }
    .orders-table td {
        padding:
            14px;
        border-top:
            1px solid
            #edf3f2;
        font-size:
            12px;
        color:
            #516e6e;
        vertical-align:
            middle;
    }
    .orders-table tbody tr:hover {
        background:
            #f9fdfd;
    }
    /* =====================================================
       STATUS
    ===================================================== */
    .status {
        display:
            inline-flex;
        align-items:
            center;
        gap:
            5px;
        padding:
            6px 9px;
        border-radius:
            20px;
        font-size:
            10px;
        font-weight:
            700;
    }
    .pending {
        background:
            #fff3d8;
        color:
            #a16207;
    }
    .confirmed {
        background:
            #e3f1ff;
        color:
            #2563a6;
    }
    .preparing {
        background:
            #eee7ff;
        color:
            #6542a5;
    }
    .out {
        background:
            #e2f4f7;
        color:
            #08716e;
    }
    .delivered {
        background:
            #e5f7ed;
        color:
            #19734a;
    }
    .cancelled {
        background:
            #ffe9e9;
        color:
            #c62828;
    }
    .default-status {
        background:
            #edf2f2;
        color:
            #617575;
    }
    /* =====================================================
       VIEW / UPDATE BUTTON
    ===================================================== */
    .view-btn {
        display:
            inline-flex;
        align-items:
            center;
        gap:
            5px;
        padding:
            7px 10px;
        border-radius:
            8px;
        background:
            #e0f3f1;
        color:
            #08716e;
        text-decoration:
            none;
        font-size:
            10px;
        font-weight:
            700;
    }
    .view-btn:hover {
        background:
            #d0ece8;
        color:
            #075c59;
    }
    /* =====================================================
       LOCKED BUTTON
    ===================================================== */
    .locked-btn {
        display:
            inline-flex;
        align-items:
            center;
        gap:
            5px;
        padding:
            7px 10px;
        border-radius:
            8px;
        background:
            #f1f3f3;
        color:
            #758181;
        font-size:
            10px;
        font-weight:
            700;
        cursor:
            not-allowed;
        border:
            1px solid
            #e0e5e5;
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
        .topbar {
            padding:
                0 20px;
        }
    }
    @media (max-width: 576px) {
        .content {
            padding:
                14px;
        }
        .profile-name,
        .profile-role {
            display:
                none;
        }
        .page-header {
            align-items:
                flex-start;
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
        <a
            href="{{ route('staff.dashboard') }}"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>
        <!-- ORDERS -->
        <a
            href="{{ route('staff.orders.index') }}"
            class="active"
        >
            <i class="bi bi-cart-check-fill"></i>
            Orders
        </a>
        <!-- PRODUCTS -->
        <a
            href="{{ route('staff.products.index') }}"
        >
            <i class="bi bi-droplet-fill"></i>
            Products
        </a>
        <!-- INVENTORY -->
        <a
            href="{{ route('staff.inventory.index') }}"
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
        <!-- EMAIL NOTIFICATIONS -->
        <a
            href="{{ route('staff.emails.create') }}"
            class="{{ request()->routeIs('staff.emails.*') ? 'active' : '' }}"
        >
            <i class="bi bi-envelope-fill"></i>
            Email Notifications
        </a>
        <div class="menu-title mt-3">
            Account
        </div>
        <!-- ACCOUNT -->
        <a
            href="{{ route('staff.account') }}"
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
         TOPBAR
    ================================================= -->
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
                <p class="profile-name">
                    {{ auth()->user()->name }}
                </p>
                <p class="profile-role">
                    Staff
                </p>
            </div>
        </div>
    </nav>
    <!-- =================================================
         CONTENT
    ================================================= -->
    <main class="content">
        <!-- PAGE HEADER -->
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="bi bi-cart3"></i>
                </div>
                <div>
                    <h1>
                        Orders
                    </h1>
                </div>
            </div>
        </div>
        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div
                class="
                    alert
                    alert-success
                    custom-alert
                    mb-3
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
                    mb-3
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
        <!-- ORDERS CARD -->
        <div class="orders-card">
            <!-- HEADER -->
            <div class="orders-header">
                <h3>
                    Customer Orders
                </h3>
                <div class="orders-count">
                    {{ $orders->count() }}
                    Orders
                </div>
            </div>
            <!-- TABLE -->
            <div class="table-wrapper">
                <table class="orders-table">
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
                                Total
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(
                            $orders as $order
                        )
                            @php
                                $status =
                                    strtolower(
                                        trim(
                                            $order->status
                                            ??
                                            'pending'
                                        )
                                    );
                                $isCancelled =
                                    in_array(
                                        $status,
                                        [
                                            'cancelled',
                                            'canceled'
                                        ]
                                    );
                            @endphp
                            <tr>
                                <!-- ORDER -->
                                <td>
                                    <strong>
                                        #{{ $order->id }}
                                    </strong>
                                </td>
                                <!-- CUSTOMER -->
                                <td>
                                    {{ $order->customer_name }}
                                </td>
                                <!-- PRODUCT -->
                                <td>
                                    {{ $order->product_name }}
                                </td>
                                <!-- QUANTITY -->
                                <td>
                                    {{ $order->quantity }}
                                </td>
                                <!-- TOTAL -->
                                <td>
                                    ₱{{
                                        number_format(
                                            $order->total_amount
                                            ??
                                            $order->total_price
                                            ??
                                            0,
                                            2
                                        )
                                    }}
                                </td>
                                <!-- STATUS -->
                                <td>
                                    @if(
                                        $status === 'pending'
                                    )
                                        <span
                                            class="
                                                status
                                                pending
                                            "
                                        >
                                            <i class="bi bi-clock"></i>
                                            Pending
                                        </span>
                                    @elseif(
                                        $status === 'confirmed'
                                    )
                                        <span
                                            class="
                                                status
                                                confirmed
                                            "
                                        >
                                            <i class="bi bi-check-circle"></i>
                                            Confirmed
                                        </span>
                                    @elseif(
                                        $status === 'preparing'
                                    )
                                        <span
                                            class="
                                                status
                                                preparing
                                            "
                                        >
                                            <i class="bi bi-box-seam"></i>
                                            Preparing
                                        </span>
                                    @elseif(
                                        $status === 'out for delivery'
                                        ||
                                        $status === 'out_for_delivery'
                                        ||
                                        $status === 'out'
                                    )
                                        <span
                                            class="
                                                status
                                                out
                                            "
                                        >
                                            <i class="bi bi-truck"></i>
                                            Out for Delivery
                                        </span>
                                    @elseif(
                                        $status === 'delivered'
                                    )
                                        <span
                                            class="
                                                status
                                                delivered
                                            "
                                        >
                                            <i class="bi bi-check-circle-fill"></i>
                                            Delivered
                                        </span>
                                    @elseif(
                                        $isCancelled
                                    )
                                        <span
                                            class="
                                                status
                                                cancelled
                                            "
                                        >
                                            <i class="bi bi-x-circle"></i>
                                            Cancelled
                                        </span>
                                    @else
                                        <span
                                            class="
                                                status
                                                default-status
                                            "
                                        >
                                            {{
                                                ucfirst(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $status
                                                    )
                                                )
                                            }}
                                        </span>
                                    @endif
                                </td>
                                <!-- DATE -->
                                <td>
                                    @if(
                                        $order->created_at
                                    )
                                        {{
                                            $order->created_at
                                                ->format(
                                                    'M d, Y'
                                                )
                                        }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <!-- ACTION -->
                                <td>
                                    @if(
                                        $isCancelled
                                    )
                                        <span
                                            class="locked-btn"
                                            title="This order was cancelled by the customer and cannot be updated."
                                        >
                                            <i class="bi bi-lock-fill"></i>
                                            Cancelled
                                        </span>
                                    @elseif(
                                        (bool) ($order->is_printed ?? false)
                                    )
                                        {{-- Already printed: receipt view only --}}
                                        <a
                                            href="{{ route(
                                                'staff.orders.print',
                                                $order->id
                                            ) }}"
                                            class="view-btn"
                                            title="View receipt"
                                        >
                                            <i class="bi bi-receipt"></i>
                                            View
                                        </a>
                                    @elseif(
                                        $status === 'delivered'
                                    )
                                        {{-- Delivered but not yet printed --}}
                                        <div
                                            class="d-flex gap-2 align-items-center"
                                        >
                                            <a
                                                href="{{ route(
                                                    'staff.orders.show',
                                                    $order->id
                                                ) }}"
                                                class="view-btn"
                                            >
                                                <i class="bi bi-eye"></i>
                                                View / Update
                                            </a>
                                            <a
                                                href="{{ route(
                                                    'staff.orders.print',
                                                    $order->id
                                                ) }}"
                                                class="view-btn"
                                                title="Print receipt"
                                            >
                                                <i class="bi bi-printer"></i>
                                                Print
                                            </a>
                                        </div>
                                    @else
                                        <a
                                            href="{{ route(
                                                'staff.orders.show',
                                                $order->id
                                            ) }}"
                                            class="view-btn"
                                        >
                                            <i class="bi bi-eye"></i>
                                            View / Update
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    colspan="8"
                                    class="
                                        text-center
                                        text-muted
                                        py-5
                                    "
                                >
                                    <i
                                        class="
                                            bi
                                            bi-cart-x
                                            d-block
                                            mb-2
                                        "
                                        style="
                                            font-size:35px;
                                        "
                                    ></i>
                                    No customer orders yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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