<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Order #{{ $order->id }} | PureDrop Water Station
    </title>


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
            padding: 30px;

            background:
                linear-gradient(
                    135deg,
                    #f2fbfa 0%,
                    #f7fcfc 50%,
                    #e9f6f5 100%
                );

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: #234344;
        }



        /* =====================================================
           PAGE
        ===================================================== */

        .page {
            width: 100%;
        }



        /* =====================================================
           RECEIPT
        ===================================================== */

        .receipt {

            width: 760px;

            max-width: 100%;

            margin: 0 auto;

            background: #ffffff;

            border: 1px solid #d9ecea;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px
                rgba(0, 90, 90, .08);
        }



        /* =====================================================
           HEADER
        ===================================================== */

        .receipt-header {

            background:
                linear-gradient(
                    135deg,
                    #0b6d6a,
                    #18817d
                );

            color: #ffffff;

            text-align: center;

            padding: 30px 20px;
        }


        .receipt-logo {

            width: 55px;

            height: 55px;

            margin: 0 auto 10px;

            border-radius: 15px;

            background: rgba(255, 255, 255, .15);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 27px;
        }


        .receipt-header h1 {

            margin: 0;

            font-size: 24px;

            font-weight: 700;
        }


        .receipt-header p {

            margin: 5px 0 0;

            font-size: 11px;

            opacity: .9;
        }



        /* =====================================================
           BODY
        ===================================================== */

        .receipt-body {

            padding: 28px;
        }



        /* =====================================================
           TITLE
        ===================================================== */

        .receipt-title {

            text-align: center;

            margin-bottom: 25px;
        }


        .receipt-title h2 {

            margin: 0;

            color: #126968;

            font-size: 21px;

            font-weight: 700;
        }


        .receipt-title p {

            margin: 5px 0 0;

            color: #789090;

            font-size: 11px;
        }



        /* =====================================================
           DETAILS
        ===================================================== */

        .details {

            border: 1px solid #d9ecea;

            border-radius: 12px;

            overflow: hidden;
        }


        .detail-row {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 14px 16px;

            border-bottom: 1px solid #edf3f2;
        }


        .detail-row:last-child {

            border-bottom: none;
        }


        .detail-label {

            color: #789090;

            font-size: 11px;

            font-weight: 600;
        }


        .detail-value {

            color: #234344;

            font-size: 12px;

            font-weight: 700;

            text-align: right;

            overflow-wrap: anywhere;
        }



        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 700;
        }


        .pending {

            background: #fff3d8;

            color: #a16207;
        }


        .confirmed {

            background: #e3f1ff;

            color: #2563a6;
        }


        .preparing {

            background: #eee7ff;

            color: #6542a5;
        }


        .out {

            background: #e2f4f7;

            color: #08716e;
        }


        .delivered {

            background: #e5f7ed;

            color: #19734a;
        }


        .cancelled {

            background: #ffe9e9;

            color: #c62828;
        }


        .default-status {

            background: #edf2f2;

            color: #617575;
        }



        /* =====================================================
           TOTAL
        ===================================================== */

        .total-box {

            margin-top: 20px;

            padding: 18px;

            background: #eff9f8;

            border: 1px solid #d4ece9;

            border-radius: 12px;

            text-align: right;
        }


        .total-label {

            display: block;

            color: #789090;

            font-size: 11px;
        }


        .total-value {

            display: block;

            margin-top: 3px;

            color: #08716e;

            font-size: 26px;

            font-weight: 700;
        }



        /* =====================================================
           FOOTER
        ===================================================== */

        .receipt-footer {

            margin-top: 28px;

            padding-top: 15px;

            border-top: 1px solid #edf3f2;

            text-align: center;

            color: #90a4ae;

            font-size: 10px;
        }



        /* =====================================================
           ACTION BUTTONS
        ===================================================== */

        .actions {

            display: flex;

            justify-content: center;

            align-items: center;

            flex-wrap: wrap;

            gap: 10px;

            margin-top: 25px;
        }


        .action-btn {

            border: none;

            border-radius: 9px;

            padding: 11px 18px;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            transition: .2s ease;
        }



        /* =====================================================
           PRINT BUTTON
        ===================================================== */

        .print-btn {

            background: #0b6d6a;

            color: #ffffff;

            box-shadow:
                0 4px 10px
                rgba(11, 109, 106, .20);
        }


        .print-btn:hover {

            background: #095a57;

            color: #ffffff;

            transform: translateY(-1px);
        }



        /* =====================================================
           REPRINT BUTTON
        ===================================================== */

        .reprint-btn {

            background: #18817d;

            color: #ffffff;

            box-shadow:
                0 4px 10px
                rgba(24, 129, 125, .20);
        }


        .reprint-btn:hover {

            background: #126d69;

            color: #ffffff;

            transform: translateY(-1px);
        }



        /* =====================================================
           BACK BUTTON
        ===================================================== */

        .back-btn {

            border: 1px solid #d6e5e3;

            background: #ffffff;

            color: #607d7d;
        }


        .back-btn:hover {

            background: #f5f9f9;

            color: #405858;
        }



        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 576px) {

            body {

                padding: 12px;
            }


            .receipt-body {

                padding: 18px;
            }


            .detail-row {

                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
            }


            .detail-value {

                text-align: left;
            }


            .actions {

                flex-direction: column;
            }


            .action-btn {

                width: 100%;
            }

        }



        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            @page {

                margin: 10mm;
            }


            body {

                padding: 0;

                margin: 0;

                background: #ffffff;
            }


            /* Hide buttons while printing */

            .actions {

                display: none !important;
            }


            .receipt {

                width: 100%;

                max-width: 100%;

                margin: 0;

                border: none;

                box-shadow: none;

                border-radius: 0;
            }


            .receipt-header {

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }


            .total-box {

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }


            .status {

                -webkit-print-color-adjust: exact;

                print-color-adjust: exact;
            }

        }

    </style>

</head>


<body>


@php

    /*
    |--------------------------------------------------------------------------
    | ORDER STATUS
    |--------------------------------------------------------------------------
    */

    $status =
        strtolower(
            trim(
                $order->status ?? 'pending'
            )
        );


    /*
    |--------------------------------------------------------------------------
    | TOTAL AMOUNT
    |--------------------------------------------------------------------------
    */

    $total =
        $order->total_amount
        ??
        $order->total_price
        ??
        0;

@endphp



<div class="page">


    <!-- =====================================================
         RECEIPT
    ===================================================== -->

    <div class="receipt">


        <!-- HEADER -->

        <div class="receipt-header">

            <div class="receipt-logo">

                <i class="bi bi-droplet-fill"></i>

            </div>


            <h1>
                PureDrop Water Station
            </h1>


            <p>
                Customer Order Receipt
            </p>

        </div>



        <!-- BODY -->

        <div class="receipt-body">


            <!-- TITLE -->

            <div class="receipt-title">

                <h2>
                    Order #{{ $order->id }}
                </h2>


                <p>
                    Official Customer Receipt
                </p>

            </div>



            <!-- DETAILS -->

            <div class="details">


                <!-- CUSTOMER -->

                <div class="detail-row">

                    <span class="detail-label">
                        Customer Name
                    </span>


                    <span class="detail-value">

                        {{ $order->customer_name }}

                    </span>

                </div>



                <!-- EMAIL -->

                @if($order->customer_email)

                    <div class="detail-row">

                        <span class="detail-label">
                            Email
                        </span>


                        <span class="detail-value">

                            {{ $order->customer_email }}

                        </span>

                    </div>

                @endif



                <!-- PHONE -->

                @if($order->phone_number)

                    <div class="detail-row">

                        <span class="detail-label">
                            Phone Number
                        </span>


                        <span class="detail-value">

                            {{ $order->phone_number }}

                        </span>

                    </div>

                @endif



                <!-- DELIVERY ADDRESS -->

                @if($order->delivery_address)

                    <div class="detail-row">

                        <span class="detail-label">
                            Delivery Address
                        </span>


                        <span class="detail-value">

                            {{ $order->delivery_address }}

                        </span>

                    </div>

                @endif



                <!-- PRODUCT -->

                <div class="detail-row">

                    <span class="detail-label">
                        Product
                    </span>


                    <span class="detail-value">

                        {{ $order->product_name }}

                    </span>

                </div>



                <!-- QUANTITY -->

                <div class="detail-row">

                    <span class="detail-label">
                        Quantity
                    </span>


                    <span class="detail-value">

                        {{ $order->quantity }}

                    </span>

                </div>



                <!-- ORDER DATE -->

                <div class="detail-row">

                    <span class="detail-label">
                        Order Date
                    </span>


                    <span class="detail-value">

                        @if($order->order_date)

                            {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}

                        @elseif($order->created_at)

                            {{ $order->created_at->format('M d, Y h:i A') }}

                        @else

                            N/A

                        @endif

                    </span>

                </div>



                <!-- STATUS -->

                <div class="detail-row">

                    <span class="detail-label">
                        Status
                    </span>


                    <span class="detail-value">


                        @if($status === 'pending')

                            <span class="status pending">

                                <i class="bi bi-clock"></i>

                                Pending

                            </span>


                        @elseif($status === 'confirmed')

                            <span class="status confirmed">

                                <i class="bi bi-check-circle"></i>

                                Confirmed

                            </span>


                        @elseif($status === 'preparing')

                            <span class="status preparing">

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

                            <span class="status out">

                                <i class="bi bi-truck"></i>

                                Out for Delivery

                            </span>


                        @elseif($status === 'delivered')

                            <span class="status delivered">

                                <i class="bi bi-check-circle-fill"></i>

                                Delivered

                            </span>


                        @elseif(
                            $status === 'cancelled'
                            ||
                            $status === 'canceled'
                        )

                            <span class="status cancelled">

                                <i class="bi bi-x-circle"></i>

                                Cancelled

                            </span>


                        @else

                            <span class="status default-status">

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



            <!-- TOTAL -->

            <div class="total-box">

                <span class="total-label">
                    Total Amount
                </span>


                <span class="total-value">

                    ₱{{ number_format($total, 2) }}

                </span>

            </div>



            <!-- FOOTER -->

            <div class="receipt-footer">

                Thank you for choosing
                <strong>PureDrop Water Station</strong>.

                <br>

                Please keep this receipt for your records.

            </div>


        </div>

    </div>



    <!-- =====================================================
         ACTION BUTTONS
    ===================================================== -->

    <div class="actions">


        <!-- PRINT RECEIPT -->

        <button
            type="button"
            class="action-btn print-btn"
            onclick="printReceipt()"
        >

            <i class="bi bi-printer-fill"></i>

            Print Receipt

        </button>



        <!-- REPRINT -->

        <button
            type="button"
            class="action-btn reprint-btn"
            onclick="reprintReceipt()"
        >

            <i class="bi bi-arrow-repeat"></i>

            Reprint

        </button>



        <!-- BACK TO ORDERS -->

        <button
            type="button"
            class="action-btn back-btn"
            onclick="returnToOrders()"
        >

            <i class="bi bi-arrow-left"></i>

            Back to Orders

        </button>

    </div>


</div>



<script>

    /*
    |--------------------------------------------------------------------------
    | PREVENT DOUBLE RETURN
    |--------------------------------------------------------------------------
    */

    let returningToOrders = false;



    /*
    |--------------------------------------------------------------------------
    | AUTOMATIC PRINT
    |--------------------------------------------------------------------------
    |
    | When this receipt page opens, the browser's real print
    | dialog opens automatically.
    |
    */

    window.addEventListener('load', function () {

        setTimeout(function () {

            window.print();

        }, 500);

    });



    /*
    |--------------------------------------------------------------------------
    | AFTER PRINT / CANCEL
    |--------------------------------------------------------------------------
    |
    | When the browser print dialog closes:
    |
    | PRINT  -> Return to Orders
    | CANCEL -> Return to Orders
    |
    */

    window.addEventListener('afterprint', function () {

        returnToOrders();

    });



    /*
    |--------------------------------------------------------------------------
    | PRINT RECEIPT
    |--------------------------------------------------------------------------
    */

    function printReceipt() {

        window.print();

    }



    /*
    |--------------------------------------------------------------------------
    | REPRINT
    |--------------------------------------------------------------------------
    |
    | Reprints the SAME order.
    | Does NOT create a new order.
    |
    */

    function reprintReceipt() {

        window.print();

    }



    /*
    |--------------------------------------------------------------------------
    | RETURN TO ORDERS
    |--------------------------------------------------------------------------
    */

    function returnToOrders() {

        /*
        |--------------------------------------------------------------------------
        | Stop if already returning
        |--------------------------------------------------------------------------
        */

        if (returningToOrders) {

            return;

        }


        returningToOrders = true;



        /*
        |--------------------------------------------------------------------------
        | NEW TAB / WINDOW
        |--------------------------------------------------------------------------
        |
        | If Orders opened this receipt in a new tab,
        | focus Orders and close this receipt tab.
        |
        */

        if (
            window.opener &&
            !window.opener.closed
        ) {

            try {

                window.opener.focus();

            } catch (error) {

                // Ignore focus error

            }


            setTimeout(function () {

                window.close();

            }, 100);


            return;

        }



        /*
        |--------------------------------------------------------------------------
        | SAME TAB
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        | Do NOT use history.back().
        |
        | replace() removes the current receipt URL from the
        | navigation position instead of creating another entry.
        |
        */

        window.location.replace(
            "{{ route('staff.orders.index') }}"
        );

    }

</script>


</body>

</html>