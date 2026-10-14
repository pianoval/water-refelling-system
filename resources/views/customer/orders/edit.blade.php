@extends('layouts.customer')

@section('title', 'Edit Order')

@section('navbar_title', 'Edit Order')

@section('navbar_subtitle', 'Water Refilling Station')

@section('styles')

<style>

    .edit-order-page {
        width: 100%;
    }

    .edit-order-card {
        max-width: 700px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e4f1f3;
        border-radius: 18px;
        padding: 28px;
        box-shadow:
            0 6px 20px
            rgba(0,121,133,.07);
    }

    .edit-title {
        margin: 0;
        color: #00838f;
        font-size: 25px;
        font-weight: 700;
    }

    .edit-subtitle {
        margin: 5px 0 25px;
        color: #90a4ae;
        font-size: 12px;
    }

    .info-grid {
        display: grid;
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 22px;
    }

    .info-box {
        padding: 15px;
        background: #f8fcfd;
        border: 1px solid #e1eff1;
        border-radius: 12px;
    }

    .info-label {
        margin-bottom: 5px;
        color: #90a4ae;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .info-value {
        color: #263238;
        font-size: 14px;
        font-weight: 700;
    }

    .pending-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 10px;
        border-radius: 20px;
        background: #fff4dc;
        color: #b45309;
        font-size: 10px;
        font-weight: 700;
    }

    .form-label {
        color: #546e7a;
        font-size: 12px;
        font-weight: 700;
    }

    .form-control {
        min-height: 46px;
        border: 1px solid #cfe5e8;
        border-radius: 10px;
        font-size: 13px;
    }

    .form-control:focus {
        border-color: #26a69a;
        box-shadow:
            0 0 0 .2rem
            rgba(38,166,154,.10);
    }

    .quantity-note {
        margin-top: 6px;
        color: #90a4ae;
        font-size: 10px;
    }

    .button-row {
        display: flex;
        gap: 10px;
        margin-top: 24px;
    }

    .save-btn {
        flex: 1;
        border: none;
        border-radius: 10px;
        padding: 11px 16px;
        background:
            linear-gradient(
                135deg,
                #00838f,
                #0097a7
            );
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
    }

    .save-btn:hover {
        background:
            linear-gradient(
                135deg,
                #006c75,
                #00838f
            );
        color: #ffffff;
    }

    .back-btn {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: 1px solid #d6e7e9;
        border-radius: 10px;
        padding: 11px 16px;
        background: #ffffff;
        color: #546e7a;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .back-btn:hover {
        background: #f5fafb;
        color: #263238;
    }

    @media (max-width: 576px) {

        .edit-order-card {
            padding: 20px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .button-row {
            flex-direction: column;
        }

    }

</style>

@endsection


@section('content')

<div class="edit-order-page">

    <div class="edit-order-card">

        <h1 class="edit-title">

            <i class="bi bi-pencil-square me-1"></i>

            Edit Order

        </h1>


        <p class="edit-subtitle">

            You can modify this order while it is still pending.

        </p>


        @if($errors->any())

            <div class="alert alert-danger">

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


        <div class="info-grid">

            <!-- ORDER ID -->

            <div class="info-box">

                <div class="info-label">
                    Order ID
                </div>

                <div class="info-value">
                    #{{ $order->id }}
                </div>

            </div>


            <!-- CUSTOMER -->

            <div class="info-box">

                <div class="info-label">
                    Customer
                </div>

                <div class="info-value">
                    {{ $order->customer_name }}
                </div>

            </div>


            <!-- PRODUCT -->

            <div class="info-box">

                <div class="info-label">
                    Product
                </div>

                <div class="info-value">
                    {{ $order->product_name }}
                </div>

            </div>


            <!-- PRICE -->

            <div class="info-box">

                <div class="info-label">
                    Price per Unit
                </div>

                <div class="info-value">

                    ₱{{
                        number_format(
                            $product->price,
                            2
                        )
                    }}

                </div>

            </div>


            <!-- STATUS -->

            <div class="info-box">

                <div class="info-label">
                    Current Status
                </div>

                <div class="info-value">

                    <span class="pending-badge">

                        <i class="bi bi-clock"></i>

                        Pending

                    </span>

                </div>

            </div>


            <!-- CURRENT QUANTITY -->

            <div class="info-box">

                <div class="info-label">
                    Current Quantity
                </div>

                <div class="info-value">

                    {{ $order->quantity }}

                </div>

            </div>

        </div>


        <!-- UPDATE FORM -->

        <form
            action="{{ route(
                'customer.orders.update',
                $order->id
            ) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="mb-3">

                <label
                    for="quantity"
                    class="form-label"
                >
                    New Quantity
                </label>


                <input
                    type="number"
                    name="quantity"
                    id="quantity"
                    class="form-control"
                    value="{{ old(
                        'quantity',
                        $order->quantity
                    ) }}"
                    min="1"
                    max="{{
                        $product->stock +
                        $order->quantity
                    }}"
                    required
                >


                <div class="quantity-note">

                    Available maximum:
                    {{
                        $product->stock +
                        $order->quantity
                    }}
                    units

                </div>

            </div>


            <div class="button-row">

                <button
                    type="submit"
                    class="save-btn"
                >

                    <i class="bi bi-check-circle me-1"></i>

                    Save Changes

                </button>


                <a
                    href="{{ route(
                        'customer.orders'
                    ) }}"
                    class="back-btn"
                >

                    <i class="bi bi-arrow-left"></i>

                    Back to My Orders

                </a>

            </div>

        </form>

    </div>

</div>

@endsection