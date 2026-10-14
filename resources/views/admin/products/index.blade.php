@extends('layouts.admin')

@section('title', 'Products')

@section('content')

<style>

    /* =========================================
       PRODUCTS PAGE
    ========================================= */

    .products-page {
        width: 100%;
    }


    /* =========================================
       PAGE HEADER
    ========================================= */

    .products-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .products-header h1 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #183b5b;
    }

    .products-header p {
        margin: 6px 0 0;
        color: #6b8299;
        font-size: 14px;
    }


    /* =========================================
       SUMMARY GRID
    ========================================= */

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-bottom: 24px;
    }

    .summary-card {
        position: relative;
        overflow: hidden;

        min-height: 125px;

        background: #ffffff;

        border: 1px solid #d8e5f5;

        border-radius: 16px;

        padding: 18px;

        box-shadow:
            0 5px 18px
            rgba(23,78,166,.055);

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }

    .summary-card::after {
        content: "";

        position: absolute;

        width: 85px;
        height: 85px;

        border-radius: 50%;

        right: -32px;
        top: -32px;

        background: #f3f7ff;

        pointer-events: none;
    }

    .summary-card:hover {
        transform: translateY(-3px);

        border-color: #cbdced;

        box-shadow:
            0 9px 23px
            rgba(23,78,166,.09);
    }


    /* =========================================
       SUMMARY ICON
    ========================================= */

    .summary-icon {
        position: relative;
        z-index: 2;

        width: 48px;
        height: 48px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

        margin-bottom: 12px;
    }

    .summary-icon.blue {
        background: #e8f1ff;
        color: #174ea6;
    }

    .summary-icon.green {
        background: #e8f7f3;
        color: #087f6b;
    }

    .summary-icon.orange {
        background: #fff4df;
        color: #a76500;
    }

    .summary-icon.red {
        background: #fff0f0;
        color: #c0392b;
    }


    /* =========================================
       SUMMARY TEXT
    ========================================= */

    .summary-label {
        position: relative;
        z-index: 2;

        font-size: 11px;

        font-weight: 700;

        color: #6b8299;

        text-transform: uppercase;

        letter-spacing: .3px;

        margin-bottom: 5px;
    }

    .summary-value {
        position: relative;
        z-index: 2;

        font-size: 28px;

        font-weight: 800;

        color: #183b5b;

        line-height: 1;
    }


    /* =========================================
       PRODUCTS CARD
    ========================================= */

    .products-card {
        background: rgba(255,255,255,.96);

        border: 1px solid #d8e5f5;

        border-radius: 16px;

        box-shadow:
            0 5px 20px
            rgba(23,78,166,.06);

        overflow: hidden;
    }


    .products-card-header {
        padding: 18px 20px;

        border-bottom:
            1px solid #e4edf7;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;
    }


    .products-card-title {
        margin: 0;

        font-size: 17px;

        font-weight: 700;

        color: #183b5b;
    }


    .products-card-subtitle {
        margin: 4px 0 0;

        font-size: 12px;

        color: #7b91a5;
    }


    .products-count {
        background: #e8f1ff;

        color: #174ea6;

        padding: 7px 11px;

        border-radius: 20px;

        font-size: 11px;

        font-weight: 700;

        white-space: nowrap;
    }


    /* =========================================
       TABLE WRAPPER
    ========================================= */

    .products-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    /* =========================================
       TABLE
    ========================================= */

    .products-table {
        width: 100%;

        border-collapse: collapse;

        margin: 0;
    }


    .products-table thead th {
        background: #f5f9ff;

        color: #49677f;

        font-size: 11px;

        text-transform: uppercase;

        letter-spacing: .4px;

        font-weight: 700;

        padding: 14px 16px;

        border-bottom:
            1px solid #d8e5f5;

        white-space: nowrap;

        text-align: left;
    }


    .products-table tbody td {
        padding: 14px 16px;

        color: #36566f;

        font-size: 13px;

        border-bottom:
            1px solid #edf2f7;

        vertical-align: middle;
    }


    .products-table tbody tr:last-child td {
        border-bottom: none;
    }


    .products-table tbody tr:hover {
        background: #f8fbff;
    }


    /* =========================================
       PRODUCT IMAGE
    ========================================= */

    .product-image {
        width: 55px;

        height: 55px;

        object-fit: cover;

        border-radius: 10px;

        border:
            1px solid #d7e5f5;

        background: #f3f8ff;
    }


    .no-image {
        width: 55px;

        height: 55px;

        border-radius: 10px;

        background: #eaf2ff;

        color: #5d85b0;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

        border:
            1px solid #d7e5f5;
    }


    /* =========================================
       PRODUCT INFORMATION
    ========================================= */

    .product-name {
        font-weight: 700;

        color: #183b5b;

        margin-bottom: 3px;
    }


    .product-id {
        font-size: 10px;

        color: #8aa0b5;
    }


    .product-description {
        font-size: 11px;

        color: #7b91a5;

        margin-top: 3px;

        max-width: 250px;

        line-height: 1.4;
    }


    /* =========================================
       CATEGORY BADGE
    ========================================= */

    .category-badge {
        display: inline-block;

        background: #e8f1ff;

        color: #174ea6;

        padding: 5px 9px;

        border-radius: 7px;

        font-size: 11px;

        font-weight: 600;

        white-space: nowrap;
    }


    .no-category {
        color: #9aabba;

        font-size: 12px;
    }


    /* =========================================
       PRICE
    ========================================= */

    .price {
        font-weight: 700;

        color: #174ea6;

        white-space: nowrap;
    }


    /* =========================================
       STOCK BADGES
    ========================================= */

    .stock-badge {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 11px;

        font-weight: 700;

        white-space: nowrap;
    }


    .stock-good {
        background: #e8f7ee;

        color: #25804a;
    }


    .stock-low {
        background: #fff4dc;

        color: #a56a00;
    }


    .stock-out {
        background: #ffe8e8;

        color: #b42323;
    }


    /* =========================================
       STOCK NUMBER
    ========================================= */

    .stock-number {
        font-weight: 700;

        color: #183b5b;
    }


    /* =========================================
       VIEW ONLY BADGE
    ========================================= */

    .view-only-badge {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        background: #f1f5f9;

        color: #64748b;

        padding: 6px 10px;

        border-radius: 8px;

        font-size: 11px;

        font-weight: 600;

        white-space: nowrap;
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-state {
        text-align: center;

        padding: 60px 20px;

        color: #7d94aa;
    }


    .empty-state-icon {
        width: 70px;

        height: 70px;

        border-radius: 18px;

        background: #eaf2ff;

        color: #7fa9df;

        display: flex;

        align-items: center;

        justify-content: center;

        margin: 0 auto 15px;

        font-size: 30px;
    }


    .empty-state h5 {
        margin: 0 0 6px;

        color: #4d6880;

        font-size: 16px;
    }


    .empty-state p {
        margin: 0;

        color: #7b91a5;

        font-size: 13px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1200px) {

        .summary-grid {
            grid-template-columns:
                repeat(2, 1fr);

            gap: 10px;
        }

    }


    @media (max-width: 767px) {

        .products-header {
            flex-direction: column;
        }

        .products-header h1 {
            font-size: 22px;
        }

        .summary-grid {
            grid-template-columns:
                1fr;

            gap: 10px;
        }

        .summary-card {
            min-height: 112px;
        }

        .products-card-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .products-table {
            min-width: 950px;
        }

    }

</style>


<div class="products-page">


    {{-- =========================================
         PAGE HEADER
    ========================================= --}}

    <div class="products-header">

        <div>

            <h1>
                Products
            </h1>

            <p>
                Monitor product information, prices, and current stock levels.
            </p>

        </div>

    </div>


    {{-- =========================================
         CALCULATE PRODUCT SUMMARY
    ========================================= --}}

    @php

        $totalProducts =
            $products->count();

        $availableProducts =
            $products
                ->where('stock', '>', 10)
                ->count();

        $lowStockProducts =
            $products
                ->where('stock', '>', 0)
                ->where('stock', '<=', 10)
                ->count();

        $outOfStockProducts =
            $products
                ->where('stock', '<=', 0)
                ->count();

    @endphp


    {{-- =========================================
         SUMMARY CARDS
    ========================================= --}}

    <div class="summary-grid">


        {{-- TOTAL PRODUCTS --}}

        <div class="summary-card">

            <div class="summary-icon blue">

                <i class="bi bi-droplet-fill"></i>

            </div>

            <div class="summary-label">

                Total Products

            </div>

            <div class="summary-value">

                {{ $totalProducts }}

            </div>

        </div>


        {{-- AVAILABLE PRODUCTS --}}

        <div class="summary-card">

            <div class="summary-icon green">

                <i class="bi bi-check-circle-fill"></i>

            </div>

            <div class="summary-label">

                Available

            </div>

            <div class="summary-value">

                {{ $availableProducts }}

            </div>

        </div>


        {{-- LOW STOCK --}}

        <div class="summary-card">

            <div class="summary-icon orange">

                <i class="bi bi-exclamation-triangle-fill"></i>

            </div>

            <div class="summary-label">

                Low Stock

            </div>

            <div class="summary-value">

                {{ $lowStockProducts }}

            </div>

        </div>


        {{-- OUT OF STOCK --}}

        <div class="summary-card">

            <div class="summary-icon red">

                <i class="bi bi-x-circle-fill"></i>

            </div>

            <div class="summary-label">

                Out of Stock

            </div>

            <div class="summary-value">

                {{ $outOfStockProducts }}

            </div>

        </div>


    </div>


    {{-- =========================================
         PRODUCT LIST CARD
    ========================================= --}}

    <div class="products-card">


        {{-- CARD HEADER --}}

        <div class="products-card-header">

            <div>

                <h2 class="products-card-title">

                    <i class="bi bi-box-seam-fill me-2"></i>

                    Product List

                </h2>

                <p class="products-card-subtitle">

                    Current products and inventory status

                </p>

            </div>


            <span class="products-count">

                {{ $totalProducts }} product(s)

            </span>

        </div>


        {{-- =====================================
             CHECK IF PRODUCTS EXIST
        ====================================== --}}

        @if($products->count() > 0)


            {{-- TABLE --}}

            <div class="products-table-wrapper">

                <table class="products-table">

                    <thead>

                        <tr>

                            <th>
                                Product
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Stock
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Added
                            </th>

                            <th>
                                Access
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($products as $product)


                            <tr>


                                {{-- PRODUCT --}}

                                <td>

                                    <div class="d-flex align-items-center gap-3">


                                        @if($product->image)

                                            <img
                                                src="{{ asset(
                                                    'storage/' .
                                                    $product->image
                                                ) }}"
                                                alt="{{ $product->name }}"
                                                class="product-image"
                                            >

                                        @else

                                            <div class="no-image">

                                                <i class="bi bi-droplet"></i>

                                            </div>

                                        @endif


                                        <div>

                                            <div class="product-name">

                                                {{ $product->name }}

                                            </div>


                                            <div class="product-id">

                                                Product #{{ $product->id }}

                                            </div>


                                            @if($product->description)

                                                <div class="product-description">

                                                    {{ $product->description }}

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                </td>


                                {{-- CATEGORY --}}

                                <td>

                                    @if($product->category)

                                        <span class="category-badge">

                                            {{ $product->category }}

                                        </span>

                                    @else

                                        <span class="no-category">

                                            No category

                                        </span>

                                    @endif

                                </td>


                                {{-- PRICE --}}

                                <td>

                                    <span class="price">

                                        ₱{{
                                            number_format(
                                                $product->price,
                                                2
                                            )
                                        }}

                                    </span>

                                </td>


                                {{-- STOCK NUMBER --}}

                                <td>

                                    <span class="stock-number">

                                        {{ $product->stock }}

                                    </span>

                                </td>


                                {{-- STOCK STATUS --}}

                                <td>


                                    @if($product->stock <= 0)

                                        <span class="stock-badge stock-out">

                                            <i class="bi bi-x-circle-fill"></i>

                                            Out of Stock

                                        </span>


                                    @elseif($product->stock <= 10)

                                        <span class="stock-badge stock-low">

                                            <i class="bi bi-exclamation-triangle-fill"></i>

                                            Low Stock

                                        </span>


                                    @else

                                        <span class="stock-badge stock-good">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Available

                                        </span>

                                    @endif


                                </td>


                                {{-- DATE ADDED --}}

                                <td>

                                    @if($product->created_at)

                                        {{ $product->created_at->format('M d, Y') }}

                                    @else

                                        —

                                    @endif

                                </td>


                                {{-- ACCESS --}}

                                <td>

                                    <span class="view-only-badge">

                                        <i class="bi bi-eye-fill"></i>

                                        View Only

                                    </span>

                                </td>


                            </tr>


                        @endforeach


                    </tbody>

                </table>

            </div>


        @else


            {{-- EMPTY STATE --}}

            <div class="empty-state">

                <div class="empty-state-icon">

                    <i class="bi bi-droplet"></i>

                </div>


                <h5>

                    No Products Yet

                </h5>


                <p>

                    There are currently no products available to monitor.

                </p>

            </div>


        @endif


    </div>


</div>

@endsection