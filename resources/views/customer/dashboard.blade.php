@extends('layouts.customer')


@section('title', 'Customer Dashboard')


@section('navbar_title', 'Customer Dashboard')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    /* =====================================================
       DASHBOARD
    ===================================================== */

    .customer-dashboard {

        width: 100%;

    }


    /* =====================================================
       WELCOME BANNER
       ADJUSTED CLOSER TO NAVBAR
    ===================================================== */

    .welcome-banner {

        min-height:
            155px;

        padding:
            30px 35px;

        border-radius:
            17px;

        margin-top:
            -12px;

        margin-bottom:
            25px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #26c6da
            );

        color:
            #ffffff;

        display:
            flex;

        align-items:
            center;

        position:
            relative;

        overflow:
            hidden;

        box-shadow:
            0 7px 20px
            rgba(0,172,193,.16);

    }


    .welcome-banner::after {

        content:
            "";

        position:
            absolute;

        width:
            220px;

        height:
            220px;

        right:
            -70px;

        top:
            -75px;

        background:
            rgba(255,255,255,.10);

        border-radius:
            50%;

    }


    .welcome-content {

        position:
            relative;

        z-index:
            2;

    }


    .welcome-content h4 {

        font-size:
            29px;

        font-weight:
            700;

        margin-bottom:
            7px;

    }


    .welcome-content p {

        font-size:
            15px;

        margin:
            0;

        opacity:
            .95;

    }



    /* =====================================================
       SECTION HEADING
    ===================================================== */

    .section-heading {

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        margin-bottom:
            14px;

    }


    .section-heading h4 {

        margin:
            0;

        color:
            #263238;

        font-size:
            20px;

        font-weight:
            700;

    }


    .section-heading p {

        margin:
            4px 0 0;

        color:
            #90a4ae;

        font-size:
            12px;

    }


    .see-more {

        color:
            #00838f;

        text-decoration:
            none;

        font-size:
            13px;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    .see-more:hover {

        color:
            #006064;

    }



    /* =====================================================
       PRODUCT CARD
    ===================================================== */

    .product-card {

        height:
            100%;

        background:
            #ffffff;

        border:
            none;

        border-radius:
            15px;

        overflow:
            hidden;

        box-shadow:
            0 3px 13px
            rgba(0,0,0,.05);

        transition:
            .2s ease;

    }


    .product-card:hover {

        transform:
            translateY(-3px);

        box-shadow:
            0 7px 18px
            rgba(0,0,0,.08);

    }


    .product-image {

        height:
            180px;

        background:
            #eefbfd;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        overflow:
            hidden;

    }


    .product-image img {

        width:
            100%;

        height:
            100%;

        object-fit:
            cover;

    }


    .product-image-placeholder {

        font-size:
            55px;

        color:
            #80deea;

    }


    .product-info {

        padding:
            16px;

    }


    .product-category {

        font-size:
            10px;

        text-transform:
            uppercase;

        color:
            #0097a7;

        font-weight:
            700;

        margin-bottom:
            5px;

    }


    .product-name {

        font-size:
            17px;

        font-weight:
            700;

        color:
            #263238;

        margin-bottom:
            6px;

    }


    .product-price {

        font-size:
            18px;

        font-weight:
            700;

        color:
            #00838f;

        margin-bottom:
            13px;

    }


    .order-btn {

        width:
            100%;

        border:
            none;

        border-radius:
            9px;

        padding:
            10px;

        background:
            #00acc1;

        color:
            #ffffff;

        text-decoration:
            none;

        text-align:
            center;

        display:
            block;

        font-size:
            13px;

        font-weight:
            700;

        transition:
            .2s ease;

    }


    .order-btn:hover {

        background:
            #00838f;

        color:
            #ffffff;

    }


    .disabled-btn {

        background:
            #eceff1;

        color:
            #90a4ae;

        pointer-events:
            none;

    }



    /* =====================================================
       SUMMARY
    ===================================================== */

    .summary-section {

        margin-top:
            30px;

        margin-bottom:
            25px;

    }


    .summary-card {

        height:
            100%;

        border:
            none;

        border-radius:
            14px;

        background:
            #ffffff;

        box-shadow:
            0 3px 12px
            rgba(0,0,0,.045);

    }


    .summary-card .card-body {

        padding:
            18px 20px;

    }


    .summary-icon {

        width:
            43px;

        height:
            43px;

        border-radius:
            11px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            19px;

        margin-bottom:
            12px;

    }


    .summary-card h6 {

        font-size:
            12px;

        font-weight:
            700;

        color:
            #78909c;

        margin-bottom:
            5px;

    }


    .summary-card h2 {

        font-size:
            28px;

        font-weight:
            700;

        margin:
            0;

    }



    /* =====================================================
       RECENT ORDERS
    ===================================================== */

    .content-card {

        border:
            none;

        border-radius:
            15px;

        background:
            #ffffff;

        box-shadow:
            0 3px 12px
            rgba(0,0,0,.04);

        overflow:
            hidden;

    }


    .content-card-header {

        padding:
            16px 18px;

        border-bottom:
            1px solid #edf2f4;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

    }


    .content-card-header h5 {

        font-size:
            16px;

        margin:
            0;

        font-weight:
            700;

    }


    .table {

        margin:
            0;

    }


    .table thead th {

        font-size:
            11px;

        color:
            #78909c;

        font-weight:
            700;

        padding:
            12px 14px;

        background:
            #fafcfd;

    }


    .table tbody td {

        font-size:
            13px;

        padding:
            13px 14px;

        vertical-align:
            middle;

    }


    .badge {

        font-size:
            10px;

        padding:
            6px 9px;

        border-radius:
            20px;

    }


    .empty-state {

        text-align:
            center;

        padding:
            35px 20px;

    }


    .empty-state i {

        font-size:
            35px;

        color:
            #b0bec5;

    }


    .empty-state h5 {

        font-size:
            18px;

        margin-top:
            10px;

        font-weight:
            700;

    }


    .empty-state p {

        font-size:
            13px;

        color:
            #90a4ae;

    }



    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 576px) {

        .welcome-banner {

            margin-top:
                -6px;

            padding:
                25px 22px;

            min-height:
                140px;

        }


        .welcome-content h4 {

            font-size:
                22px;

        }


        .welcome-content p {

            font-size:
                13px;

        }


        .section-heading h4 {

            font-size:
                18px;

        }


        .product-image {

            height:
                190px;

        }

    }

</style>

@endsection



@section('content')

<div class="customer-dashboard">


    <!-- =================================================
         WELCOME
    ================================================= -->

    <div class="welcome-banner">


        <div class="welcome-content">


            <h4>

                Welcome back,
                {{ auth()->user()->name }}! 💧

            </h4>


            <p>

                What would you like to order today?
                Browse our available water products below.

            </p>


        </div>


    </div>



    <!-- =================================================
         WATER PRODUCTS
    ================================================= -->

    <div class="section-heading">


        <div>


            <h4>

                <i
                    class="bi bi-droplet-fill"
                    style="color:#00acc1;"
                ></i>

                Water Products

            </h4>


            <p>

                Choose from our available water products.

            </p>


        </div>


        <a
            href="{{ route('customer.products') }}"
            class="see-more"
        >

            See More

            <i
                class="bi bi-arrow-right"
            ></i>

        </a>


    </div>



    <!-- =================================================
         PRODUCT CARDS
    ================================================= -->

    <div class="row g-3 mb-4">


        @forelse(
            $products
            as $product
        )


            <div
                class="
                    col-xl-4
                    col-lg-4
                    col-md-6
                    col-sm-6
                "
            >


                <div
                    class="product-card"
                >


                    <!-- IMAGE -->

                    <div
                        class="product-image"
                    >


                        @if(
                            $product->image
                        )


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
                                    product-image-placeholder
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



                    <!-- INFO -->

                    <div
                        class="product-info"
                    >


                        <div
                            class="product-category"
                        >

                            {{
                                $product->category
                                ??
                                'Water Product'
                            }}

                        </div>


                        <div
                            class="product-name"
                        >

                            {{ $product->name }}

                        </div>


                        <div
                            class="product-price"
                        >

                            ₱{{
                                number_format(
                                    $product->price,
                                    2
                                )
                            }}

                        </div>



                        @if(
                            $product->stock > 0
                        )


                            <a
                                href="{{ route(
                                    'customer.orders.create',
                                    [
                                        'product' =>
                                            $product->id
                                    ]
                                ) }}"
                                class="order-btn"
                            >

                                <i
                                    class="bi bi-cart-plus"
                                ></i>

                                Order Now

                            </a>


                        @else


                            <span
                                class="
                                    order-btn
                                    disabled-btn
                                "
                            >

                                <i
                                    class="bi bi-x-circle"
                                ></i>

                                Out of Stock

                            </span>


                        @endif


                    </div>


                </div>


            </div>


        @empty


            <div
                class="col-12"
            >


                <div
                    class="content-card"
                >


                    <div
                        class="empty-state"
                    >

                        <i
                            class="bi bi-droplet"
                        ></i>


                        <h5>

                            No Products Available

                        </h5>


                        <p>

                            There are currently
                            no water products available.

                        </p>

                    </div>


                </div>


            </div>


        @endforelse


    </div>



    <!-- =================================================
         ORDER SUMMARY
    ================================================= -->

    <div
        class="summary-section"
    >


        <div
            class="section-heading"
        >


            <div>


                <h4>

                    My Order Summary

                </h4>


                <p>

                    Keep track of your orders.

                </p>


            </div>


        </div>



        <div
            class="row g-3"
        >


            <!-- TOTAL ORDERS -->

            <div
                class="
                    col-lg-4
                    col-md-4
                    col-12
                "
            >


                <div
                    class="summary-card"
                >

                    <div
                        class="card-body"
                    >


                        <div
                            class="summary-icon"
                        >

                            <i
                                class="
                                    bi
                                    bi-bag-check-fill
                                "
                            ></i>

                        </div>


                        <h6>

                            My Orders

                        </h6>


                        <h2>

                            {{ $totalOrders }}

                        </h2>


                    </div>

                </div>


            </div>



            <!-- PENDING -->

            <div
                class="
                    col-lg-4
                    col-md-4
                    col-12
                "
            >


                <div
                    class="summary-card"
                >

                    <div
                        class="card-body"
                    >


                        <div
                            class="summary-icon"
                        >

                            <i
                                class="
                                    bi
                                    bi-clock-fill
                                "
                            ></i>

                        </div>


                        <h6>

                            Pending Orders

                        </h6>


                        <h2>

                            {{ $pendingOrders }}

                        </h2>


                    </div>

                </div>


            </div>



            <!-- DELIVERED -->

            <div
                class="
                    col-lg-4
                    col-md-4
                    col-12
                "
            >


                <div
                    class="summary-card"
                >

                    <div
                        class="card-body"
                    >


                        <div
                            class="summary-icon"
                        >

                            <i
                                class="
                                    bi
                                    bi-check-circle-fill
                                "
                            ></i>

                        </div>


                        <h6>

                            Delivered

                        </h6>


                        <h2>

                            {{ $deliveredOrders }}

                        </h2>


                    </div>

                </div>


            </div>


        </div>


    </div>



    <!-- =================================================
         RECENT ORDERS
    ================================================= -->

    <div
        class="content-card"
    >


        <div
            class="content-card-header"
        >


            <h5>

                Recent Orders

            </h5>


            <a
                href="{{ route('customer.orders') }}"
                class="see-more"
            >

                See All

                <i
                    class="bi bi-arrow-right"
                ></i>

            </a>


        </div>



        @if(
            $recentOrders->count() > 0
        )


            <div
                class="table-responsive"
            >


                <table
                    class="table"
                >


                    <thead>

                        <tr>

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

                        </tr>

                    </thead>


                    <tbody>


                        @foreach(
                            $recentOrders
                            as $order
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

                            @endphp


                            <tr>


                                <td>

                                    {{
                                        $order->product_name
                                    }}

                                </td>


                                <td>

                                    {{
                                        $order->quantity
                                    }}

                                </td>


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


                                <td>


                                    @if(
                                        $status === 'pending'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-warning
                                                text-dark
                                            "
                                        >

                                            Pending

                                        </span>


                                    @elseif(
                                        $status === 'confirmed'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-info
                                                text-dark
                                            "
                                        >

                                            Confirmed

                                        </span>


                                    @elseif(
                                        $status === 'preparing'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-primary
                                            "
                                        >

                                            Preparing

                                        </span>


                                    @elseif(
                                        $status === 'out_for_delivery'
                                        ||
                                        $status === 'out for delivery'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-info
                                            "
                                        >

                                            Out for Delivery

                                        </span>


                                    @elseif(
                                        $status === 'delivered'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-success
                                            "
                                        >

                                            Delivered

                                        </span>


                                    @elseif(
                                        $status === 'cancelled'
                                        ||
                                        $status === 'canceled'
                                    )

                                        <span
                                            class="
                                                badge
                                                bg-danger
                                            "
                                        >

                                            Cancelled

                                        </span>


                                    @else

                                        <span
                                            class="
                                                badge
                                                bg-secondary
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


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            </div>


        @else


            <div
                class="empty-state"
            >


                <i
                    class="bi bi-bag-x"
                ></i>


                <h5>

                    No Orders Yet

                </h5>


                <p>

                    Browse our water products
                    and place your first order.

                </p>


                <a
                    href="{{ route('customer.products') }}"
                    class="order-btn"
                    style="
                        max-width:220px;
                        margin:18px auto 0;
                    "
                >

                    <i
                        class="
                            bi
                            bi-droplet-fill
                        "
                    ></i>

                    Browse Products

                </a>


            </div>


        @endif


    </div>


</div>

@endsection