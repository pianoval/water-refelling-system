
@extends('layouts.customer')


@section('title', 'My Orders')


@section('navbar_title', 'My Orders')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    /* =====================================================
       MY ORDERS PAGE
    ===================================================== */

    .my-orders-page {

        width:
            100%;

    }



    /* =====================================================
       ALERT
    ===================================================== */

    .custom-alert {

        border:
            none;

        border-radius:
            12px;

        margin-bottom:
            20px;

        padding:
            13px 16px;

        font-size:
            12px;

    }



    /* =====================================================
       ORDERS CARD
    ===================================================== */

    .orders-card {

        margin-top:
            -12px;

        background:
            #ffffff;

        border:
            1px solid #e4f1f3;

        border-radius:
            17px;

        overflow:
            hidden;

        box-shadow:
            0 4px 15px
            rgba(0,0,0,.045);

    }


    .orders-header {

        padding:
            20px 22px;

        border-bottom:
            1px solid #edf3f4;

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        gap:
            15px;

    }


    .orders-header-left {

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

    }


    .orders-icon {

        width:
            42px;

        height:
            42px;

        border-radius:
            11px;

        background:
            #e0f7fa;

        color:
            #00838f;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

    }


    .orders-title h3 {

        margin:
            0;

        font-size:
            17px;

        font-weight:
            700;

        color:
            #263238;

    }


    .orders-title p {

        margin:
            4px 0 0;

        font-size:
            11px;

        color:
            #90a4ae;

    }


    .orders-count {

        background:
            #e0f7fa;

        color:
            #00838f;

        border-radius:
            20px;

        padding:
            6px 11px;

        font-size:
            10px;

        font-weight:
            700;

        white-space:
            nowrap;

    }



    /* =====================================================
       TABLE
    ===================================================== */

    .table-wrapper {

        width:
            100%;

        overflow-x:
            auto;

    }


    .orders-table {

        width:
            100%;

        min-width:
            900px;

        border-collapse:
            collapse;

    }


    .orders-table th {

        padding:
            13px 15px;

        background:
            #f7fbfc;

        border-bottom:
            1px solid #e1edef;

        color:
            #78909c;

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
            14px 15px;

        border-bottom:
            1px solid #edf3f4;

        font-size:
            12px;

        color:
            #546e7a;

        vertical-align:
            middle;

    }


    .orders-table tr:last-child td {

        border-bottom:
            none;

    }


    .orders-table tbody tr:hover {

        background:
            #fbfeff;

    }



    /* =====================================================
       ORDER DATA
    ===================================================== */

    .order-number {

        color:
            #00838f;

        font-weight:
            700;

    }


    .product-cell {

        color:
            #263238;

        font-weight:
            700;

    }


    .quantity-badge {

        display:
            inline-flex;

        align-items:
            center;

        justify-content:
            center;

        min-width:
            30px;

        padding:
            5px 8px;

        border-radius:
            8px;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-weight:
            700;

    }


    .amount-cell {

        color:
            #00838f;

        font-weight:
            700;

        white-space:
            nowrap;

    }


    .date-cell {

        white-space:
            nowrap;

        font-size:
            11px;

        color:
            #78909c;

    }



    /* =====================================================
       STATUS BADGES
    ===================================================== */

    .status-badge {

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

        white-space:
            nowrap;

    }


    .status-pending {

        background:
            #fff4dc;

        color:
            #b45309;

    }


    .status-confirmed {

        background:
            #e7f0ff;

        color:
            #2563eb;

    }


    .status-preparing {

        background:
            #f0e9ff;

        color:
            #6d28d9;

    }


    .status-out {

        background:
            #e4f8fc;

        color:
            #0e7490;

    }


    .status-delivered {

        background:
            #e5f8ed;

        color:
            #15803d;

    }


    .status-cancelled {

        background:
            #ffe9e9;

        color:
            #dc2626;

    }


    .status-default {

        background:
            #eef2f4;

        color:
            #607d8b;

    }



    /* =====================================================
       ACTION BUTTONS
    ===================================================== */

    .action-group {

        display:
            flex;

        align-items:
            center;

        gap:
            5px;

        flex-wrap:
            wrap;

    }


    .action-btn {

        display:
            inline-flex;

        align-items:
            center;

        justify-content:
            center;

        gap:
            4px;

        padding:
            7px 9px;

        border:
            none;

        border-radius:
            8px;

        text-decoration:
            none;

        font-size:
            10px;

        font-weight:
            700;

        cursor:
            pointer;

        transition:
            .2s ease;

    }


    .track-btn {

        background:
            #e0f7fa;

        color:
            #00838f;

    }


    .track-btn:hover {

        background:
            #ccf3f6;

        color:
            #006064;

    }


    .edit-btn {

        background:
            #e8f1ff;

        color:
            #2563eb;

    }


    .edit-btn:hover {

        background:
            #dbeafe;

        color:
            #1d4ed8;

    }


    .cancel-btn {

        background:
            #ffebee;

        color:
            #c62828;

    }


    .cancel-btn:hover {

        background:
            #ffcdd2;

        color:
            #b71c1c;

    }


    .locked-btn {

        background:
            #eef2f4;

        color:
            #78909c;

        cursor:
            default;

    }



    /* =====================================================
       EMPTY STATE
    ===================================================== */

    .empty-state {

        text-align:
            center;

        padding:
            65px 20px;

    }


    .empty-icon {

        width:
            70px;

        height:
            70px;

        margin:
            0 auto 15px;

        border-radius:
            20px;

        background:
            #e0f7fa;

        color:
            #80deea;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            30px;

    }


    .empty-state h4 {

        margin:
            0 0 6px;

        font-size:
            18px;

        font-weight:
            700;

        color:
            #455a64;

    }


    .empty-state p {

        margin:
            0;

        font-size:
            12px;

        color:
            #90a4ae;

    }


    .browse-btn {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            7px;

        margin-top:
            18px;

        padding:
            10px 17px;

        background:
            #00acc1;

        color:
            #ffffff;

        text-decoration:
            none;

        border-radius:
            9px;

        font-size:
            12px;

        font-weight:
            700;

    }


    .browse-btn:hover {

        background:
            #00838f;

        color:
            #ffffff;

    }



    /* =====================================================
       INFO NOTE
    ===================================================== */

    .info-note {

        margin-top:
            20px;

        padding:
            13px 15px;

        border-radius:
            12px;

        background:
            #eafafb;

        border:
            1px solid #d3f0f2;

        display:
            flex;

        gap:
            10px;

        color:
            #607d8b;

        font-size:
            11px;

        line-height:
            1.5;

    }


    .info-note i {

        color:
            #00838f;

        font-size:
            16px;

    }


    .info-note strong {

        color:
            #455a64;

    }



    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 576px) {

        .orders-card {

            margin-top:
                -6px;

        }


        .orders-header {

            flex-direction:
                column;

            align-items:
                flex-start;

        }

    }

</style>

@endsection


@section('content')

<div class="my-orders-page">


    <!-- =====================================================
         SUCCESS
    ===================================================== -->

    @if(session('success'))

        <div
            class="alert alert-success custom-alert"
        >

            <i
                class="bi bi-check-circle-fill me-2"
            ></i>

            {{ session('success') }}

        </div>

    @endif



    <!-- =====================================================
         ERROR
    ===================================================== -->

    @if(session('error'))

        <div
            class="alert alert-danger custom-alert"
        >

            <i
                class="bi bi-exclamation-circle-fill me-2"
            ></i>

            {{ session('error') }}

        </div>

    @endif



    <!-- =====================================================
         ORDER HISTORY
    ===================================================== -->

    <div class="orders-card">


        <div class="orders-header">


            <div class="orders-header-left">


                <div class="orders-icon">

                    <i
                        class="bi bi-bag-check-fill"
                    ></i>

                </div>


                <div class="orders-title">

                    <h3>
                        Order History
                    </h3>


                    <p>
                        Your recent water orders
                    </p>

                </div>


            </div>


            <div class="orders-count">

                {{ $orders->count() }}

                Orders

            </div>


        </div>



        @if($orders->count() > 0)


            <div class="table-wrapper">


                <table class="orders-table">


                    <thead>

                        <tr>

                            <th>
                                Order
                            </th>

                            <th>
                                Product
                            </th>

                            <th>
                                Qty
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


                        @foreach($orders as $order)


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


                                <!-- ORDER -->

                                <td>

                                    <span
                                        class="order-number"
                                    >

                                        #{{ $order->id }}

                                    </span>

                                </td>



                                <!-- PRODUCT -->

                                <td>

                                    <span
                                        class="product-cell"
                                    >

                                        {{
                                            $order->product_name
                                        }}

                                    </span>

                                </td>



                                <!-- QUANTITY -->

                                <td>

                                    <span
                                        class="quantity-badge"
                                    >

                                        {{
                                            $order->quantity
                                        }}

                                    </span>

                                </td>



                                <!-- TOTAL -->

                                <td>

                                    <span
                                        class="amount-cell"
                                    >

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

                                    </span>

                                </td>



                                <!-- STATUS -->

                                <td>


                                    @if(
                                        $status === 'pending'
                                    )

                                        <span
                                            class="
                                                status-badge
                                                status-pending
                                            "
                                        >

                                            <i
                                                class="bi bi-clock"
                                            ></i>

                                            Pending

                                        </span>


                                    @elseif(
                                        $status === 'confirmed'
                                    )

                                        <span
                                            class="
                                                status-badge
                                                status-confirmed
                                            "
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-check-circle
                                                "
                                            ></i>

                                            Confirmed

                                        </span>


                                    @elseif(
                                        $status === 'preparing'
                                    )

                                        <span
                                            class="
                                                status-badge
                                                status-preparing
                                            "
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-box-seam
                                                "
                                            ></i>

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
                                                status-badge
                                                status-out
                                            "
                                        >

                                            <i
                                                class="bi bi-truck"
                                            ></i>

                                            Out for Delivery

                                        </span>


                                    @elseif(
                                        $status === 'delivered'
                                    )

                                        <span
                                            class="
                                                status-badge
                                                status-delivered
                                            "
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-check-circle-fill
                                                "
                                            ></i>

                                            Delivered

                                        </span>


                                    @elseif(
                                        $status === 'cancelled'
                                        ||
                                        $status === 'canceled'
                                    )

                                        <span
                                            class="
                                                status-badge
                                                status-cancelled
                                            "
                                        >

                                            <i
                                                class="
                                                    bi
                                                    bi-x-circle
                                                "
                                            ></i>

                                            Cancelled

                                        </span>


                                    @else

                                        <span
                                            class="
                                                status-badge
                                                status-default
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

                                    <span
                                        class="date-cell"
                                    >

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

                                    </span>

                                </td>



                                <!-- ACTION -->

                                <td>


                                    <div
                                        class="action-group"
                                    >


                                        <!-- TRACK -->

                                        <a
                                            href="{{ route(
                                                'customer.orders.tracking',
                                                [
                                                    'order' =>
                                                        $order->id
                                                ]
                                            ) }}"
                                            class="
                                                action-btn
                                                track-btn
                                            "
                                            title="Track this order"
                                        >

                                            <i
                                                class="bi bi-geo-alt"
                                            ></i>

                                            Track

                                        </a>



                                        <!-- PENDING ACTIONS -->

                                        @if(
                                            $status === 'pending'
                                        )


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route(
                                                    'customer.orders.edit',
                                                    [
                                                        'order' =>
                                                            $order->id
                                                    ]
                                                ) }}"
                                                class="
                                                    action-btn
                                                    edit-btn
                                                "
                                                title="Edit Order"
                                            >

                                                <i
                                                    class="
                                                        bi
                                                        bi-pencil-square
                                                    "
                                                ></i>

                                                Edit

                                            </a>



                                            <!-- CANCEL -->

                                            <form
                                                action="{{
                                                    route(
                                                        'customer.orders.cancel',
                                                        [
                                                            'order' =>
                                                                $order->id
                                                        ]
                                                    )
                                                }}"
                                                method="POST"
                                                class="m-0 cancel-form"
                                            >

                                                @csrf

                                                @method('PATCH')


                                                <button
                                                    type="submit"
                                                    class="
                                                        action-btn
                                                        cancel-btn
                                                    "
                                                    title="Cancel Order"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-x-lg
                                                        "
                                                    ></i>

                                                    Cancel

                                                </button>

                                            </form>


                                        @else


                                            <!-- LOCKED -->

                                            @if(
                                                $status === 'confirmed'
                                                ||
                                                $status === 'preparing'
                                                ||
                                                $status === 'out for delivery'
                                                ||
                                                $status === 'out_for_delivery'
                                                ||
                                                $status === 'out'
                                            )

                                                <span
                                                    class="
                                                        action-btn
                                                        locked-btn
                                                    "
                                                    title="Order is already being processed"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-lock-fill
                                                        "
                                                    ></i>

                                                    Locked

                                                </span>


                                            @elseif(
                                                $status === 'delivered'
                                            )

                                                <span
                                                    class="
                                                        action-btn
                                                        locked-btn
                                                    "
                                                    title="Delivered orders cannot be edited"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-lock-fill
                                                        "
                                                    ></i>

                                                    Locked

                                                </span>


                                            @elseif(
                                                $status === 'cancelled'
                                                ||
                                                $status === 'canceled'
                                            )

                                                <span
                                                    class="
                                                        action-btn
                                                        locked-btn
                                                    "
                                                    title="Cancelled orders cannot be edited"
                                                >

                                                    <i
                                                        class="
                                                            bi
                                                            bi-lock-fill
                                                        "
                                                    ></i>

                                                    Locked

                                                </span>

                                            @endif

                                        @endif


                                    </div>


                                </td>


                            </tr>


                        @endforeach


                    </tbody>


                </table>


            </div>


        @else


            <!-- EMPTY -->

            <div
                class="empty-state"
            >

                <div
                    class="empty-icon"
                >

                    <i
                        class="bi bi-bag-x"
                    ></i>

                </div>


                <h4>
                    No Orders Yet
                </h4>


                <p>
                    You have not placed any water orders yet.
                </p>


                <a
                    href="{{ route('customer.products') }}"
                    class="browse-btn"
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



    <!-- =====================================================
         INFO
    ===================================================== -->

    <div
        class="info-note"
    >

        <i
            class="bi bi-info-circle-fill"
        ></i>


        <div>

            <strong>
                Order reminder:
            </strong>

            Pending orders can be edited or cancelled.

            Once the staff confirms an order,
            it becomes locked and can no longer be modified.

        </div>

    </div>


</div>

@endsection


@section('scripts')

<script>

    document
        .querySelectorAll('.cancel-form')
        .forEach(function(form) {

            form.addEventListener(
                'submit',
                function(event) {

                    const confirmed =
                        confirm(
                            'Are you sure you want to cancel this order?'
                        );


                    if (!confirmed) {

                        event.preventDefault();

                    }

                }
            );

        });

</script>

@endsection

