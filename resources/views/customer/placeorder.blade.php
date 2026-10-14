@extends('layouts.customer')


@section('title', 'Place Order')


@section('navbar_title', 'Place Order')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    /* =====================================================
       PLACE ORDER PAGE
    ===================================================== */

    .order-page {

        width: 100%;

    }


    /* =====================================================
       MAIN ORDER CARD
    ===================================================== */

    .order-card {

        max-width: 800px;

        margin: 0 auto;

        background: #ffffff;

        border: 1px solid #e4f1f3;

        border-radius: 18px;

        overflow: hidden;

        box-shadow:
            0 5px 20px
            rgba(0,0,0,.05);

    }


    /* =====================================================
       CARD HEADER
    ===================================================== */

    .order-card-header {

        padding: 22px 24px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color: #ffffff;

    }


    .order-card-header h3 {

        margin: 0;

        font-size: 20px;

        font-weight: 700;

    }


    .order-card-header p {

        margin: 5px 0 0;

        font-size: 11px;

        opacity: .92;

    }


    /* =====================================================
       BODY
    ===================================================== */

    .order-card-body {

        padding: 25px;

    }


    /* =====================================================
       PRODUCT PREVIEW
    ===================================================== */

    .product-preview {

        display: flex;

        align-items: center;

        gap: 16px;

        padding: 15px;

        margin-bottom: 23px;

        border: 1px solid #e4f1f3;

        border-radius: 13px;

        background: #f8fcfd;

    }


    .product-preview-image {

        width: 90px;

        height: 90px;

        border-radius: 12px;

        overflow: hidden;

        background: #e0f7fa;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

    }


    .product-preview-image img {

        width: 100%;

        height: 100%;

        object-fit: cover;

    }


    .product-preview-placeholder {

        color: #80deea;

        font-size: 32px;

    }


    .product-preview-info h4 {

        margin: 0 0 5px;

        font-size: 18px;

        font-weight: 700;

        color: #263238;

    }


    .product-preview-info p {

        margin: 3px 0;

        font-size: 11px;

        color: #78909c;

    }


    .price-text {

        color: #00838f !important;

        font-size: 15px !important;

        font-weight: 700;

    }


    /* =====================================================
       FORM
    ===================================================== */

    .form-label {

        font-size: 12px;

        font-weight: 700;

        color: #546e7a;

        margin-bottom: 7px;

    }


    .form-control {

        min-height: 44px;

        border: 1px solid #dceff1;

        border-radius: 10px;

        background: #fbfeff;

        color: #455a64;

        font-size: 13px;

    }


    .form-control:focus {

        border-color: #80deea;

        box-shadow:
            0 0 0 3px
            rgba(0,188,212,.08);

    }


    .form-control[readonly] {

        background: #f5fafb;

        color: #607d8b;

    }


    .form-text {

        margin-top: 6px;

        font-size: 10px;

        color: #90a4ae;

    }


    /* =====================================================
       TOTAL BOX
    ===================================================== */

    .total-box {

        padding: 17px;

        margin-top: 6px;

        border-radius: 12px;

        background: #eafafb;

        border: 1px solid #d3f0f2;

    }


    .total-label {

        color: #607d8b;

        font-size: 11px;

        font-weight: 600;

    }


    .total-value {

        color: #00838f;

        font-size: 24px;

        font-weight: 700;

        margin-top: 3px;

    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .button-row {

        display: flex;

        gap: 10px;

        margin-top: 22px;

    }


    .back-btn {

        flex: 1;

        border: 1px solid #dceff1;

        border-radius: 9px;

        background: #ffffff;

        color: #607d8b;

        text-decoration: none;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 11px;

        font-size: 12px;

        font-weight: 700;

        transition: .2s ease;

    }


    .back-btn:hover {

        background: #f5fbfc;

        color: #455a64;

    }


    .place-btn {

        flex: 1;

        border: none;

        border-radius: 9px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color: #ffffff;

        padding: 11px;

        font-size: 12px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;

    }


    .place-btn:hover {

        background:
            linear-gradient(
                135deg,
                #00838f,
                #006064
            );

        color: #ffffff;

        transform: translateY(-1px);

    }


    /* =====================================================
       INFO NOTE
    ===================================================== */

    .info-note {

        margin-top: 20px;

        padding: 12px 14px;

        border-radius: 10px;

        background: #f8fcfd;

        border: 1px solid #e6f1f3;

        color: #78909c;

        font-size: 10px;

        line-height: 1.5;

    }


    .info-note i {

        color: #0097a7;

        margin-right: 5px;

    }


    /* =====================================================
       SUCCESS / ERROR
    ===================================================== */

    .custom-alert {

        border: none;

        border-radius: 11px;

        font-size: 12px;

        margin-bottom: 18px;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 767px) {

        .order-card-body {

            padding: 18px;

        }


        .product-preview {

            align-items: flex-start;

        }


        .product-preview-image {

            width: 75px;

            height: 75px;

        }

    }


    @media (max-width: 576px) {

        .button-row {

            flex-direction: column;

        }


        .back-btn,
        .place-btn {

            width: 100%;

        }


        .order-card-header {

            padding: 18px;

        }

    }

</style>

@endsection



@section('content')

<div class="order-page">


    <!-- =================================================
         ORDER CARD
    ================================================= -->

    <div class="order-card">


        <!-- HEADER -->

        <div class="order-card-header">

            <h3>

                Place Your Order

            </h3>


            <p>

                Review your selected water product
                before placing your order.

            </p>

        </div>



        <!-- BODY -->

        <div class="order-card-body">


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



            <!-- PRODUCT PREVIEW -->

            <div class="product-preview">


                <div class="product-preview-image">


                    @if($product->image)

                        <img
                            src="{{ asset(
                                'storage/' .
                                $product->image
                            ) }}"
                            alt="{{ $product->name }}"
                        >

                    @else

                        <div
                            class="
                                product-preview-placeholder
                            "
                        >

                            <i
                                class="
                                    bi
                                    bi-droplet-fill
                                "
                            ></i>

                        </div>

                    @endif


                </div>



                <div class="product-preview-info">


                    <h4>

                        {{ $product->name }}

                    </h4>


                    <p>

                        Category:
                        {{ $product->category }}

                    </p>


                    <p class="price-text">

                        ₱{{
                            number_format(
                                $product->price,
                                2
                            )
                        }}

                        per unit

                    </p>


                    <p>

                        <i
                            class="
                                bi
                                bi-box-seam
                                me-1
                            "
                        ></i>

                        {{ $product->stock }}

                        available

                    </p>


                </div>

            </div>



            <!-- ORDER FORM -->

            <form
                action="{{ route(
                    'customer.orders.store',
                    [
                        'product' =>
                            $product->id
                    ]
                ) }}"
                method="POST"
            >

                @csrf



                <!-- CUSTOMER NAME -->

                <div class="mb-3">

                    <label
                        for="customer_name"
                        class="form-label"
                    >

                        Customer Name

                    </label>


                    <input
                        type="text"
                        id="customer_name"
                        class="form-control"
                        value="{{ auth()->user()->name }}"
                        readonly
                    >

                </div>



                <!-- EMAIL -->

                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >

                        Email

                    </label>


                    <input
                        type="email"
                        id="email"
                        class="form-control"
                        value="{{ auth()->user()->email }}"
                        readonly
                    >

                </div>



                <!-- QUANTITY -->

                <div class="mb-3">

                    <label
                        for="quantity"
                        class="form-label"
                    >

                        Quantity

                    </label>


                    <input
                        type="number"
                        name="quantity"
                        id="quantity"
                        class="form-control"
                        min="1"
                        max="{{ $product->stock }}"
                        value="{{ old('quantity', 1) }}"
                        required
                    >


                    <div class="form-text">

                        Maximum available:
                        {{ $product->stock }}

                    </div>

                </div>



                <!-- TOTAL -->

                <div class="total-box">

                    <div class="total-label">

                        Total Amount

                    </div>


                    <div
                        class="total-value"
                        id="total"
                    >

                        ₱{{
                            number_format(
                                $product->price,
                                2
                            )
                        }}

                    </div>

                </div>



                <!-- BUTTONS -->

                <div class="button-row">


                    <a
                        href="{{ route(
                            'customer.products'
                        ) }}"
                        class="back-btn"
                    >

                        <i
                            class="
                                bi
                                bi-arrow-left
                                me-1
                            "
                        ></i>

                        Back to Products

                    </a>


                    <button
                        type="submit"
                        class="place-btn"
                    >

                        <i
                            class="
                                bi
                                bi-cart-check
                                me-1
                            "
                        ></i>

                        Place Order

                    </button>


                </div>


            </form>



            <!-- INFO -->

            <div class="info-note">

                <i
                    class="
                        bi
                        bi-info-circle-fill
                    "
                ></i>

                Your order will be submitted as
                <strong>Pending</strong>.
                You may cancel it from
                <strong>My Orders</strong>
                while it is still pending.

            </div>


        </div>


    </div>


</div>

@endsection



@push('scripts')

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            const quantityInput =
                document.getElementById(
                    'quantity'
                );


            const totalElement =
                document.getElementById(
                    'total'
                );


            const price =
                {{ $product->price }};


            if (
                quantityInput &&
                totalElement
            ) {


                function updateTotal() {


                    let quantity =
                        parseInt(
                            quantityInput.value
                        );


                    if (
                        isNaN(quantity)
                        ||
                        quantity < 1
                    ) {

                        quantity = 1;

                    }


                    const maximum =
                        parseInt(
                            quantityInput.max
                        );


                    if (
                        quantity > maximum
                    ) {

                        quantity = maximum;

                        quantityInput.value =
                            maximum;

                    }


                    const total =
                        price * quantity;


                    totalElement.textContent =
                        '₱' +
                        total.toFixed(2);

                }


                quantityInput.addEventListener(
                    'input',
                    updateTotal
                );


                updateTotal();

            }

        }
    );

</script>

@endpush