<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Add Product | Staff | Water Station
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
                    #f2fbfa 0%,
                    #f7fcfc 50%,
                    #e9f6f5 100%
                );

            color: #234344;

            overflow-x: hidden;

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
                    #0b4f50 0%,
                    #126968 48%,
                    #18817d 100%
                );

            color: #ffffff;

            z-index: 3000;

            overflow-y: auto;

            transition: .3s ease;

            box-shadow:
                6px 0 22px
                rgba(0,78,79,.16);

        }


        .sidebar.hidden {

            left: -260px;

        }


        .sidebar-header {

            height: 70px;

            padding: 0 18px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid
                rgba(255,255,255,.16);

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 17px;

            font-weight: 700;

        }


        .brand-icon {

            width: 40px;
            height: 40px;

            border-radius: 12px;

            background:
                rgba(255,255,255,.14);

            display: flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid
                rgba(255,255,255,.18);

            font-size: 20px;

        }


        .close-sidebar {

            width: 34px;
            height: 34px;

            border: none;

            background: transparent;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            font-size: 19px;

            transition: .2s ease;

        }


        .close-sidebar:hover {

            background:
                rgba(255,255,255,.10);

            border-radius: 8px;

        }


        .sidebar-menu {

            padding: 18px 12px;

        }


        .menu-title {

            padding: 8px 12px;

            margin-bottom: 5px;

            color:
                rgba(255,255,255,.58);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 1px;

        }


        .sidebar a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            margin-bottom: 5px;

            border-radius: 10px;

            color:
                rgba(255,255,255,.88);

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition: .2s ease;

        }


        .sidebar a i {

            width: 20px;

            text-align: center;

            font-size: 17px;

        }


        .sidebar a:hover,
        .sidebar a.active {

            background:
                rgba(255,255,255,.15);

            color: #ffffff;

            transform:
                translateX(2px);

        }


        .logout-link {

            width: 100%;

            border: none;

            background: transparent;

            color:
                rgba(255,255,255,.88);

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border-radius: 10px;

            font-size: 14px;

            font-weight: 600;

            text-align: left;

            cursor: pointer;

            transition: .2s ease;

        }


        .logout-link:hover {

            background:
                rgba(255,255,255,.15);

            color: #ffffff;

        }


        .logout-link i {

            width: 20px;

            text-align: center;

            font-size: 17px;

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
           TOPBAR
        ===================================================== */

        .topbar {

            height: 68px;

            background:
                rgba(255,255,255,.97);

            border-bottom:
                1px solid #d8eceb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;

            top: 0;

            z-index: 2500;

            box-shadow:
                0 3px 15px
                rgba(0,100,100,.05);

        }


        .topbar-left {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .menu-btn {

            width: 42px;
            height: 42px;

            border: none;

            border-radius: 9px;

            background: #e2f5f3;

            color: #08716e;

            font-size: 21px;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: .2s ease;

        }


        .menu-btn:hover {

            background: #d2efec;

            transform: scale(1.03);

        }


        .topbar-title h2 {

            margin: 0;

            font-size: 18px;

            font-weight: 700;

            color: #234344;

        }


        .topbar-title p {

            margin: 2px 0 0;

            font-size: 10px;

            color: #6f8e8e;

        }


        .profile {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .profile-image,
        .profile-placeholder {

            width: 38px;
            height: 38px;

            border-radius: 50%;

        }


        .profile-image {

            object-fit: cover;

            border:
                2px solid #b9dfdc;

        }


        .profile-placeholder {

            background: #e0f3f1;

            color: #08716e;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

        }


        .profile-name {

            margin: 0;

            font-size: 13px;

            font-weight: 700;

            color: #234344;

        }


        .profile-role {

            margin: 2px 0 0;

            color: #08716e;

            font-size: 10px;

        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding: 26px;

        }


        .page-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 20px;

        }


        .page-heading {

            display: flex;

            align-items: center;

            gap: 13px;

        }


        .page-icon {

            width: 50px;
            height: 50px;

            border-radius: 14px;

            background: #e0f3f1;

            color: #08716e;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

        }


        .page-heading h1 {

            margin: 0;

            font-size: 27px;

            font-weight: 700;

            color: #126968;

        }


        .back-btn {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 9px 13px;

            background: #ffffff;

            border:
                1px solid #d5e8e6;

            border-radius: 9px;

            color: #08716e;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;

            transition: .2s ease;

        }


        .back-btn:hover {

            background: #e0f3f1;

            color: #075c59;

        }


        /* =====================================================
           ALERT
        ===================================================== */

        .custom-alert {

            border: none;

            border-radius: 11px;

            font-size: 12px;

            margin-bottom: 18px;

        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .form-card {

            background: #ffffff;

            border:
                1px solid #d9ecea;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 6px 18px
                rgba(0,90,90,.07);

        }


        .form-card-body {

            padding: 25px;

        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-label {

            font-size: 12px;

            font-weight: 700;

            color: #476969;

            margin-bottom: 7px;

        }


        .form-control,
        .form-select {

            min-height: 44px;

            border:
                1px solid #d5e8e6;

            border-radius: 10px;

            background: #fbfefe;

            color: #294949;

            font-size: 13px;

            box-shadow: none;

        }


        .form-control:focus,
        .form-select:focus {

            border-color: #66aaa6;

            box-shadow:
                0 0 0 .2rem
                rgba(24,129,125,.10);

        }


        textarea.form-control {

            min-height: 110px;

            resize: vertical;

        }


        .form-text {

            margin-top: 6px;

            font-size: 10px;

            color: #8ca1a1;

        }


        .input-group-text {

            background: #eff8f7;

            border:
                1px solid #d5e8e6;

            color: #08716e;

        }


        /* =====================================================
           IMAGE PREVIEW
        ===================================================== */

        .image-preview-wrapper {

            display: none;

            margin-top: 12px;

        }


        .image-preview {

            width: 180px;

            height: 130px;

            object-fit: cover;

            border-radius: 12px;

            border:
                2px solid #d5e8e6;

        }


        /* =====================================================
           BUTTONS
        ===================================================== */

        .button-row {

            display: flex;

            justify-content: flex-end;

            gap: 8px;

            margin-top: 25px;

            padding-top: 20px;

            border-top:
                1px solid #edf3f2;

        }


        .btn-cancel {

            border:
                1px solid #d6e5e3;

            background: #ffffff;

            color: #607d7d;

            border-radius: 9px;

            padding: 10px 16px;

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;

            transition: .2s ease;

        }


        .btn-cancel:hover {

            background: #f5f9f9;

            color: #405858;

        }


        .btn-save {

            border: none;

            background:
                linear-gradient(
                    135deg,
                    #0b6d6a,
                    #18817d
                );

            color: #ffffff;

            border-radius: 9px;

            padding: 10px 18px;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;

        }


        .btn-save:hover {

            background:
                linear-gradient(
                    135deg,
                    #095b59,
                    #126e6b
                );

            color: #ffffff;

            transform:
                translateY(-1px);

        }


        /* =====================================================
           RESPONSIVE
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

        }


        @media (max-width: 767px) {

            .content {

                padding: 16px;

            }


            .page-header {

                align-items: flex-start;

                flex-direction: column;

            }


            .form-card-body {

                padding: 18px;

            }


            .button-row {

                flex-direction: column-reverse;

            }


            .btn-cancel,
            .btn-save {

                width: 100%;

                text-align: center;

            }

        }


        @media (max-width: 576px) {

            .profile-name,
            .profile-role {

                display: none;

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


            <div>
                Water Station
            </div>

        </div>


        <button
            type="button"
            class="close-sidebar"
            id="closeSidebar"
            title="Close Sidebar"
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
        >

            <i class="bi bi-cart-check-fill"></i>

            Orders

        </a>


        <!-- PRODUCTS -->

        <a
            href="{{ route('staff.products.index') }}"
            class="active"
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
        >

            <i class="bi bi-truck"></i>

            Deliveries

        </a>


        <div class="menu-title mt-3">
            Account
        </div>


        <!-- MY ACCOUNT -->

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


    <!-- TOPBAR -->

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


            <div class="topbar-title">

                <h2>
                    Add Product
                </h2>

                <p>
                    Water Refilling Station
                </p>

            </div>

        </div>



        <!-- PROFILE -->

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
    ================================================== -->

    <main class="content">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <div class="page-heading">


                <div class="page-icon">

                    <i class="bi bi-plus-circle-fill"></i>

                </div>


                <div>

                    <h1>
                        Add New Product
                    </h1>

                </div>


            </div>


            <a
                href="{{ route('staff.products.index') }}"
                class="back-btn"
            >

                <i class="bi bi-arrow-left"></i>

                Back to Products

            </a>


        </div>



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


                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



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



        <!-- FORM -->

        <div class="form-card">


            <div class="form-card-body">


                <form
                    action="{{ route('staff.products.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    <div class="row g-3">


                        <!-- PRODUCT NAME -->

                        <div class="col-md-6">

                            <label
                                for="name"
                                class="form-label"
                            >
                                Product Name
                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i
                                        class="bi bi-droplet-fill"
                                    ></i>

                                </span>


                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Example: Distilled Water"
                                    required
                                >

                            </div>


                            @error('name')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- CATEGORY -->

                        <div class="col-md-6">

                            <label
                                for="category"
                                class="form-label"
                            >
                                Category
                            </label>


                            <select
                                name="category"
                                id="category"
                                class="form-select"
                                required
                            >

                                <option
                                    value=""
                                    disabled
                                    {{ old('category') == '' ? 'selected' : '' }}
                                >
                                    Select Water Category
                                </option>


                                <option
                                    value="Purified Water"
                                    {{ old('category') == 'Purified Water' ? 'selected' : '' }}
                                >
                                    Purified Water
                                </option>


                                <option
                                    value="Distilled Water"
                                    {{ old('category') == 'Distilled Water' ? 'selected' : '' }}
                                >
                                    Distilled Water
                                </option>


                                <option
                                    value="Mineral Water"
                                    {{ old('category') == 'Mineral Water' ? 'selected' : '' }}
                                >
                                    Mineral Water
                                </option>


                                <option
                                    value="Alkaline Water"
                                    {{ old('category') == 'Alkaline Water' ? 'selected' : '' }}
                                >
                                    Alkaline Water
                                </option>


                                <option
                                    value="Drinking Water"
                                    {{ old('category') == 'Drinking Water' ? 'selected' : '' }}
                                >
                                    Drinking Water
                                </option>

                            </select>


                            @error('category')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- PRICE -->

                        <div class="col-md-6">

                            <label
                                for="price"
                                class="form-label"
                            >
                                Price
                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text"
                                >
                                    ₱
                                </span>


                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    class="form-control"
                                    value="{{ old('price') }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0.00"
                                    required
                                >

                            </div>


                            @error('price')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- STOCK -->

                        <div class="col-md-6">

                            <label
                                for="stock"
                                class="form-label"
                            >
                                Stock Quantity
                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-boxes"></i>

                                </span>


                                <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    class="form-control"
                                    value="{{ old('stock', 0) }}"
                                    min="0"
                                    placeholder="Enter stock quantity"
                                    required
                                >

                            </div>


                            @error('stock')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- DESCRIPTION -->

                        <div class="col-12">

                            <label
                                for="description"
                                class="form-label"
                            >
                                Description
                            </label>


                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                placeholder="Enter product description"
                            >{{ old('description') }}</textarea>


                            @error('description')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- IMAGE -->

                        <div class="col-12">

                            <label
                                for="image"
                                class="form-label"
                            >
                                Product Image
                            </label>


                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                            >


                            <div class="form-text">

                                JPG, JPEG, PNG, or WEBP.
                                Maximum file size: 2MB.

                            </div>


                            @error('image')

                                <div class="text-danger mt-1 small">

                                    {{ $message }}

                                </div>

                            @enderror


                            <!-- IMAGE PREVIEW -->

                            <div
                                id="imagePreviewWrapper"
                                class="image-preview-wrapper"
                            >

                                <img
                                    id="imagePreview"
                                    class="image-preview"
                                    src="#"
                                    alt="Product Preview"
                                >

                            </div>

                        </div>

                    </div>



                    <!-- BUTTONS -->

                    <div class="button-row">


                        <a
                            href="{{ route('staff.products.index') }}"
                            class="btn-cancel"
                        >

                            <i
                                class="
                                    bi
                                    bi-arrow-left
                                    me-1
                                "
                            ></i>

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="btn-save"
                        >

                            <i
                                class="
                                    bi
                                    bi-check2-circle
                                    me-1
                                "
                            ></i>

                            Add Product

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
        document.getElementById('sidebar');


    const main =
        document.getElementById('main');


    const menuButton =
        document.getElementById('menuButton');


    const closeSidebar =
        document.getElementById('closeSidebar');


    const imageInput =
        document.getElementById('image');


    const imagePreview =
        document.getElementById('imagePreview');


    const imagePreviewWrapper =
        document.getElementById('imagePreviewWrapper');


    menuButton.addEventListener(
        'click',
        function () {

            if (window.innerWidth <= 991) {

                sidebar.classList.add('open');

            } else {

                sidebar.classList.toggle('hidden');

                main.classList.toggle('expanded');

            }

        }
    );


    closeSidebar.addEventListener(
        'click',
        function () {

            if (window.innerWidth <= 991) {

                sidebar.classList.remove('open');

            } else {

                sidebar.classList.add('hidden');

                main.classList.add('expanded');

            }

        }
    );


    imageInput.addEventListener(
        'change',
        function (event) {

            const file =
                event.target.files[0];


            if (!file) {

                imagePreviewWrapper.style.display =
                    'none';

                return;

            }


            const reader =
                new FileReader();


            reader.onload =
                function (e) {

                    imagePreview.src =
                        e.target.result;

                    imagePreviewWrapper.style.display =
                        'block';

                };


            reader.readAsDataURL(file);

        }
    );

</script>


</body>

</html>