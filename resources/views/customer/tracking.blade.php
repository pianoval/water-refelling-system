@extends('layouts.customer')


@section('title', 'Track Order')


@section('navbar_title', 'Track Order')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    * {
        box-sizing: border-box;
    }


    /* =====================================================
       TRACKING PAGE
    ===================================================== */

    .tracking-page {

        width: 100%;

    }


    /* =====================================================
       MAIN CARD
    ===================================================== */

    .tracking-card {

        max-width: 850px;

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
       HEADER
    ===================================================== */

    .tracking-header {

        padding: 22px 24px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color: #ffffff;

    }


    .tracking-header h3 {

        margin: 0;

        font-size: 20px;

        font-weight: 700;

    }


    .tracking-header p {

        margin: 5px 0 0;

        font-size: 11px;

        opacity: .92;

    }


    /* =====================================================
       BODY
    ===================================================== */

    .tracking-body {

        padding: 25px;

    }


    /* =====================================================
       ORDER SUMMARY
    ===================================================== */

    .order-summary {

        background: #f8fcfd;

        border: 1px solid #e4f1f3;

        border-radius: 14px;

        padding: 18px;

        margin-bottom: 24px;

    }


    .summary-row {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        padding: 10px 0;

        border-bottom:
            1px solid #edf3f4;

    }


    .summary-row:last-child {

        border-bottom: none;

    }


    .summary-label {

        font-size: 11px;

        color: #90a4ae;

        font-weight: 600;

    }


    .summary-value {

        font-size: 12px;

        color: #455a64;

        font-weight: 700;

        text-align: right;

    }


    .price-value {

        color: #00838f;

        font-size: 16px;

    }


    /* =====================================================
       STATUS BADGES
    ===================================================== */

    .status-badge {

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 7px 11px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 700;

    }


    .status-pending {

        background: #fff3e0;

        color: #ef6c00;

    }


    .status-confirmed {

        background: #e3f2fd;

        color: #1565c0;

    }


    .status-preparing {

        background: #ede7f6;

        color: #6a1b9a;

    }


    .status-out {

        background: #e0f7fa;

        color: #00838f;

    }


    .status-delivered {

        background: #e8f5e9;

        color: #2e7d32;

    }


    .status-cancelled {

        background: #ffebee;

        color: #c62828;

    }


    .status-default {

        background: #eceff1;

        color: #607d8b;

    }


    /* =====================================================
       SECTION TITLE
    ===================================================== */

    .tracking-section-title {

        font-size: 14px;

        font-weight: 700;

        color: #455a64;

        margin-bottom: 18px;

    }


    /* =====================================================
       TRACKING TIMELINE
    ===================================================== */

    .tracking-list {

        position: relative;

        margin-left: 5px;

    }


    .tracking-item {

        position: relative;

        display: flex;

        gap: 14px;

        padding-bottom: 24px;

    }


    .tracking-item:last-child {

        padding-bottom: 0;

    }


    .tracking-item::before {

        content: '';

        position: absolute;

        left: 14px;

        top: 30px;

        width: 2px;

        height: calc(100% - 6px);

        background: #e0f2f3;

    }


    .tracking-item:last-child::before {

        display: none;

    }


    .tracking-icon {

        width: 30px;

        height: 30px;

        border-radius: 50%;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #e0f7fa;

        color: #00838f;

        font-size: 13px;

        z-index: 1;

    }


    .tracking-item.completed .tracking-icon {

        background: #e8f5e9;

        color: #2e7d32;

    }


    .tracking-item.active .tracking-icon {

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color: #ffffff;

    }


    .tracking-content {

        padding-top: 2px;

    }


    .tracking-content h5 {

        margin: 0 0 3px;

        font-size: 13px;

        font-weight: 700;

        color: #455a64;

    }


    .tracking-content p {

        margin: 0;

        font-size: 10px;

        color: #90a4ae;

        line-height: 1.5;

    }


    /* =====================================================
       CANCELLED ALERT
    ===================================================== */

    .custom-alert {

        border: none;

        border-radius: 11px;

        font-size: 12px;

    }


    /* =====================================================
       BUTTON
    ===================================================== */

    .button-row {

        display: flex;

        gap: 10px;

        margin-top: 25px;

        padding-top: 20px;

        border-top:
            1px solid #edf3f4;

    }


    .back-btn {

        width: 100%;

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


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 576px) {

        .tracking-body {

            padding: 18px;

        }


        .summary-row {

            align-items: flex-start;

            flex-direction: column;

            gap: 4px;

        }


        .summary-value {

            text-align: left;

        }


    }

</style>

@endsection



@section('content')

<div class="tracking-page">


    <div class="tracking-card">


        <!-- =================================================
             HEADER
        ================================================= -->

        <div class="tracking-header">

            <h3>

                Track Order #{{ $order->id }}

            </h3>


            <p>

                Check the current status of your water order.

            </p>

        </div>



        <!-- =================================================
             BODY
        ================================================= -->

        <div class="tracking-body">


            @php

                $status = strtolower(
                    trim(
                        $order->status ?? 'pending'
                    )
                );

            @endphp



            <!-- =================================================
                 ORDER SUMMARY
            ================================================= -->

            <div class="order-summary">


                <div class="summary-row">

                    <span class="summary-label">

                        Customer

                    </span>


                    <span class="summary-value">

                        {{ $order->customer_name }}

                    </span>

                </div>



                <div class="summary-row">

                    <span class="summary-label">

                        Product

                    </span>


                    <span class="summary-value">

                        {{ $order->product_name }}

                    </span>

                </div>



                <div class="summary-row">

                    <span class="summary-label">

                        Quantity

                    </span>


                    <span class="summary-value">

                        {{ $order->quantity }}

                    </span>

                </div>



                <div class="summary-row">

                    <span class="summary-label">

                        Total Amount

                    </span>


                    <span class="summary-value price-value">

                        ₱{{
                            number_format(
                                $order->total_amount
                                ?? $order->total_price
                                ?? 0,
                                2
                            )
                        }}

                    </span>

                </div>



                <div class="summary-row">

                    <span class="summary-label">

                        Current Status

                    </span>


                    <span class="summary-value">


                        @if($status === 'pending')

                            <span class="status-badge status-pending">

                                <i class="bi bi-clock"></i>

                                Pending

                            </span>


                        @elseif($status === 'confirmed')

                            <span class="status-badge status-confirmed">

                                <i class="bi bi-check-circle"></i>

                                Confirmed

                            </span>


                        @elseif($status === 'preparing')

                            <span class="status-badge status-preparing">

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

                            <span class="status-badge status-out">

                                <i class="bi bi-truck"></i>

                                Out for Delivery

                            </span>


                        @elseif($status === 'delivered')

                            <span class="status-badge status-delivered">

                                <i class="bi bi-check-circle-fill"></i>

                                Delivered

                            </span>


                        @elseif(
                            $status === 'cancelled'
                            ||
                            $status === 'canceled'
                        )

                            <span class="status-badge status-cancelled">

                                <i class="bi bi-x-circle"></i>

                                Cancelled

                            </span>


                        @else

                            <span class="status-badge status-default">

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


                    </span>

                </div>

            </div>



            <!-- =================================================
                 ORDER PROGRESS
            ================================================= -->

            <div class="tracking-section-title">

                Order Progress

            </div>


            <div class="tracking-list">


                <!-- ORDER PLACED -->

                <div class="tracking-item completed">

                    <div class="tracking-icon">

                        <i class="bi bi-check-lg"></i>

                    </div>


                    <div class="tracking-content">

                        <h5>
                            Order Placed
                        </h5>


                        <p>

                            Your order has been successfully submitted.

                        </p>

                    </div>

                </div>



                <!-- CONFIRMED -->

                <div
                    class="
                        tracking-item
                        {{
                            in_array(
                                $status,
                                [
                                    'confirmed',
                                    'preparing',
                                    'out for delivery',
                                    'out_for_delivery',
                                    'out',
                                    'delivered'
                                ]
                            )
                                ? 'completed'
                                : ''
                        }}
                    "
                >

                    <div class="tracking-icon">

                        <i class="bi bi-check-circle"></i>

                    </div>


                    <div class="tracking-content">

                        <h5>
                            Order Confirmed
                        </h5>


                        <p>

                            Staff has confirmed your order.

                        </p>

                    </div>

                </div>



                <!-- PREPARING -->

                <div
                    class="
                        tracking-item
                        {{
                            in_array(
                                $status,
                                [
                                    'preparing',
                                    'out for delivery',
                                    'out_for_delivery',
                                    'out',
                                    'delivered'
                                ]
                            )
                                ? 'completed'
                                : ''
                        }}
                    "
                >

                    <div class="tracking-icon">

                        <i class="bi bi-box-seam"></i>

                    </div>


                    <div class="tracking-content">

                        <h5>
                            Preparing Order
                        </h5>


                        <p>

                            Your water order is being prepared.

                        </p>

                    </div>

                </div>



                <!-- OUT FOR DELIVERY -->

                <div
                    class="
                        tracking-item
                        {{
                            in_array(
                                $status,
                                [
                                    'out for delivery',
                                    'out_for_delivery',
                                    'out',
                                    'delivered'
                                ]
                            )
                                ? 'completed'
                                : ''
                        }}
                    "
                >

                    <div class="tracking-icon">

                        <i class="bi bi-truck"></i>

                    </div>


                    <div class="tracking-content">

                        <h5>
                            Out for Delivery
                        </h5>


                        <p>

                            Your order is on its way.

                        </p>

                    </div>

                </div>



                <!-- DELIVERED -->

                <div
                    class="
                        tracking-item
                        {{
                            $status === 'delivered'
                                ? 'completed'
                                : ''
                        }}
                    "
                >

                    <div class="tracking-icon">

                        <i class="bi bi-check-circle-fill"></i>

                    </div>


                    <div class="tracking-content">

                        <h5>
                            Delivered
                        </h5>


                        <p>

                            Your order has been delivered successfully.

                        </p>

                    </div>

                </div>


            </div>



            <!-- =================================================
                 CANCELLED
            ================================================= -->

            @if(
                $status === 'cancelled'
                ||
                $status === 'canceled'
            )

                <div
                    class="
                        alert
                        alert-danger
                        custom-alert
                        mt-4
                    "
                >

                    <i
                        class="
                            bi
                            bi-x-circle-fill
                            me-2
                        "
                    ></i>

                    This order has been cancelled.

                </div>

            @endif



            <!-- =================================================
                 BACK BUTTON
            ================================================= -->

            <div class="button-row">

                <a
                    href="{{ route('customer.orders') }}"
                    class="back-btn"
                >

                    <i
                        class="
                            bi
                            bi-arrow-left
                            me-1
                        "
                    ></i>

                    Back to My Orders

                </a>

            </div>


        </div>

    </div>


</div>

@endsection