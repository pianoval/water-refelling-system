<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Add Order | Water Station
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
           NAVBAR
        ===================================================== */

        .staff-navbar {

            background:
                linear-gradient(
                    135deg,
                    #0b4f50,
                    #126968,
                    #18817d
                );

            box-shadow:
                0 5px 18px
                rgba(0,80,80,.12);

        }


        .staff-brand {

            font-size:
                17px;

            font-weight:
                700;

            color:
                #ffffff !important;

        }


        .staff-subtitle {

            display:
                block;

            font-size:
                10px;

            color:
                rgba(255,255,255,.70);

            margin-top:
                1px;

        }


        .logout-btn {

            border:
                none;

            border-radius:
                9px;

            padding:
                8px 13px;

            font-size:
                12px;

            font-weight:
                700;

        }



        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .page-wrapper {

            padding:
                35px 15px 45px;

        }


        .page-container {

            max-width:
                950px;

            margin:
                0 auto;

        }



        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            margin-bottom:
                22px;

        }


        .page-header h1 {

            margin:
                0;

            font-size:
                27px;

            font-weight:
                700;

            color:
                #126968;

        }


        .page-header p {

            margin:
                5px 0 0;

            font-size:
                13px;

            color:
                #789090;

        }



        /* =====================================================
           MAIN CARD
        ===================================================== */

        .order-card {

            background:
                #ffffff;

            border:
                1px solid
                #d9ecea;

            border-radius:
                18px;

            overflow:
                hidden;

            box-shadow:
                0 7px 22px
                rgba(0,90,90,.07);

        }


        .order-card-header {

            background:
                linear-gradient(
                    135deg,
                    #e3f5f3,
                    #f3fbfa
                );

            border-bottom:
                1px solid
                #d9ecea;

            padding:
                19px 22px;

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

        }


        .header-icon {

            width:
                44px;

            height:
                44px;

            border-radius:
                12px;

            background:
                #ffffff;

            color:
                #08716e;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                20px;

            box-shadow:
                0 3px 10px
                rgba(0,90,90,.06);

        }


        .order-card-header h3 {

            margin:
                0;

            font-size:
                17px;

            font-weight:
                700;

            color:
                #234344;

        }


        .order-card-header p {

            margin:
                3px 0 0;

            font-size:
                11px;

            color:
                #789090;

        }


        .order-card-body {

            padding:
                25px;

        }



        /* =====================================================
           FORM
        ===================================================== */

        .form-label {

            font-size:
                12px;

            font-weight:
                700;

            color:
                #476969;

            margin-bottom:
                7px;

        }


        .form-control,
        .form-select {

            min-height:
                44px;

            border:
                1px solid
                #d5e8e6;

            border-radius:
                10px;

            background:
                #fbfefe;

            color:
                #294949;

            font-size:
                13px;

            box-shadow:
                none;

        }


        .form-control:focus,
        .form-select:focus {

            border-color:
                #66aaa6;

            box-shadow:
                0 0 0 .2rem
                rgba(24,129,125,.10);

        }


        .form-text {

            font-size:
                10px;

            color:
                #8ca1a1;

        }


        .input-group-text {

            background:
                #eff8f7;

            border:
                1px solid
                #d5e8e6;

            color:
                #08716e;

        }



        /* =====================================================
           PRICE PREVIEW
        ===================================================== */

        .total-box {

            background:
                #f0faf9;

            border:
                1px solid
                #d4ece9;

            border-radius:
                12px;

            padding:
                14px 16px;

            margin-top:
                5px;

        }


        .total-label {

            font-size:
                11px;

            color:
                #769090;

            margin-bottom:
                3px;

        }


        .total-amount {

            font-size:
                21px;

            font-weight:
                700;

            color:
                #08716e;

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
                25px;

            padding-top:
                20px;

            border-top:
                1px solid
                #edf3f2;

        }


        .btn-cancel {

            border:
                1px solid
                #d6e5e3;

            background:
                #ffffff;

            color:
                #607d7d;

            border-radius:
                9px;

            padding:
                10px 16px;

            font-size:
                12px;

            font-weight:
                700;

        }


        .btn-cancel:hover {

            background:
                #f5f9f9;

            color:
                #405858;

        }


        .btn-save {

            border:
                none;

            background:
                linear-gradient(
                    135deg,
                    #0b6d6a,
                    #18817d
                );

            color:
                #ffffff;

            border-radius:
                9px;

            padding:
                10px 18px;

            font-size:
                12px;

            font-weight:
                700;

        }


        .btn-save:hover {

            background:
                linear-gradient(
                    135deg,
                    #095b59,
                    #126e6b
                );

            color:
                #ffffff;

        }



        /* =====================================================
           ALERT
        ===================================================== */

        .custom-alert {

            border:
                none;

            border-radius:
                11px;

            font-size:
                12px;

        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 576px) {

            .page-wrapper {

                padding:
                    24px 12px 35px;

            }


            .order-card-body {

                padding:
                    18px;

            }


            .page-header h1 {

                font-size:
                    23px;

            }


            .button-row {

                flex-direction:
                    column-reverse;

            }


            .btn-cancel,
            .btn-save {

                width:
                    100%;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav
    class="navbar staff-navbar"
>

    <div
        class="container-fluid px-3 px-md-4"
    >


        <!-- BRAND -->

        <div>

            <div class="staff-brand">

                <i class="bi bi-droplet-fill me-2"></i>

                Water Refilling Station

            </div>

            <span class="staff-subtitle">

                Staff Order Management

            </span>

        </div>



        <!-- LOGOUT -->

        <form
            action="{{ route('logout') }}"
            method="POST"
            class="m-0"
        >

            @csrf

            <button
                type="submit"
                class="
                    btn
                    btn-light
                    logout-btn
                "
            >

                <i class="bi bi-box-arrow-right me-1"></i>

                Logout

            </button>

        </form>


    </div>

</nav>



<!-- =====================================================
     PAGE
===================================================== -->

<div class="page-wrapper">


    <div class="page-container">


        <!-- PAGE HEADER -->

        <div class="page-header">


            <h1>

                Add New Order

            </h1>


            <p>

                Enter the customer's order information below.

            </p>


        </div>



        <!-- VALIDATION ERRORS -->

        @if($errors->any())

            <div
                class="
                    alert
                    alert-danger
                    custom-alert
                    mb-3
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



        <!-- SUCCESS -->

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



        <!-- MAIN CARD -->

        <div class="order-card">


            <!-- CARD HEADER -->

            <div class="order-card-header">


                <div class="header-icon">

                    <i class="bi bi-cart-plus-fill"></i>

                </div>


                <div>

                    <h3>

                        Order Information

                    </h3>


                    <p>

                        Fill in the details for the new customer order.

                    </p>

                </div>


            </div>



            <!-- CARD BODY -->

            <div class="order-card-body">


                <form
                    action="{{ route('staff.orders.store') }}"
                    method="POST"
                >

                    @csrf



                    <div class="row g-3">


                        <!-- CUSTOMER -->

                        <div class="col-md-6">

                            <label
                                for="customer_name"
                                class="form-label"
                            >

                                Customer Name

                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text"
                                >

                                    <i
                                        class="
                                            bi
                                            bi-person-fill
                                        "
                                    ></i>

                                </span>


                                <input
                                    type="text"
                                    name="customer_name"
                                    id="customer_name"
                                    class="form-control"
                                    value="{{ old('customer_name') }}"
                                    placeholder="Enter customer name"
                                    required
                                >

                            </div>


                            @error('customer_name')

                                <div
                                    class="
                                        text-danger
                                        mt-1
                                        small
                                    "
                                >

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- PRODUCT -->

                        <div class="col-md-6">

                            <label
                                for="product_name"
                                class="form-label"
                            >

                                Product Name

                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text"
                                >

                                    <i
                                        class="
                                            bi
                                            bi-droplet-fill
                                        "
                                    ></i>

                                </span>


                                <input
                                    type="text"
                                    name="product_name"
                                    id="product_name"
                                    class="form-control"
                                    value="{{ old('product_name') }}"
                                    placeholder="Enter product name"
                                    required
                                >

                            </div>


                            @error('product_name')

                                <div
                                    class="
                                        text-danger
                                        mt-1
                                        small
                                    "
                                >

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- QUANTITY -->

                        <div class="col-md-6">

                            <label
                                for="quantity"
                                class="form-label"
                            >

                                Quantity

                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text"
                                >

                                    <i
                                        class="
                                            bi
                                            bi-box-seam
                                        "
                                    ></i>

                                </span>


                                <input
                                    type="number"
                                    name="quantity"
                                    id="quantity"
                                    class="form-control"
                                    value="{{ old('quantity') }}"
                                    min="1"
                                    placeholder="Enter quantity"
                                    required
                                >

                            </div>


                            @error('quantity')

                                <div
                                    class="
                                        text-danger
                                        mt-1
                                        small
                                    "
                                >

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- TOTAL PRICE -->

                        <div class="col-md-6">

                            <label
                                for="total_price"
                                class="form-label"
                            >

                                Total Price

                            </label>


                            <div class="input-group">

                                <span
                                    class="input-group-text"
                                >

                                    ₱

                                </span>


                                <input
                                    type="number"
                                    name="total_price"
                                    id="total_price"
                                    class="form-control"
                                    value="{{ old('total_price') }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0.00"
                                    required
                                >

                            </div>


                            @error('total_price')

                                <div
                                    class="
                                        text-danger
                                        mt-1
                                        small
                                    "
                                >

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- STATUS -->

                        <div class="col-md-6">

                            <label
                                for="status"
                                class="form-label"
                            >

                                Order Status

                            </label>


                            <select
                                name="status"
                                id="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="pending"
                                    {{
                                        old('status', 'pending') === 'pending'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Pending

                                </option>


                                <option
                                    value="confirmed"
                                    {{
                                        old('status') === 'confirmed'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Confirmed

                                </option>


                                <option
                                    value="preparing"
                                    {{
                                        old('status') === 'preparing'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Preparing

                                </option>


                                <option
                                    value="out_for_delivery"
                                    {{
                                        old('status') === 'out_for_delivery'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Out for Delivery

                                </option>


                                <option
                                    value="delivered"
                                    {{
                                        old('status') === 'delivered'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Delivered

                                </option>


                                <option
                                    value="cancelled"
                                    {{
                                        old('status') === 'cancelled'
                                            ? 'selected'
                                            : ''
                                    }}
                                >

                                    Cancelled

                                </option>

                            </select>


                            @error('status')

                                <div
                                    class="
                                        text-danger
                                        mt-1
                                        small
                                    "
                                >

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <!-- TOTAL PREVIEW -->

                        <div class="col-md-6">

                            <div class="total-box">


                                <div class="total-label">

                                    Order Amount

                                </div>


                                <div
                                    class="total-amount"
                                    id="totalPreview"
                                >

                                    ₱0.00

                                </div>


                            </div>

                        </div>


                    </div>



                    <!-- BUTTONS -->

                    <div class="button-row">


                        <a
                            href="{{ route('staff.orders.index') }}"
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

                            Save Order

                        </button>


                    </div>


                </form>


            </div>


        </div>


    </div>


</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

    const totalPriceInput =
        document.getElementById(
            'total_price'
        );


    const totalPreview =
        document.getElementById(
            'totalPreview'
        );


    function updateTotalPreview() {

        const value =
            parseFloat(
                totalPriceInput.value
            ) || 0;


        totalPreview.textContent =
            '₱' +
            value.toLocaleString(
                'en-PH',
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            );

    }


    totalPriceInput.addEventListener(
        'input',
        updateTotalPreview
    );


    updateTotalPreview();

</script>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>