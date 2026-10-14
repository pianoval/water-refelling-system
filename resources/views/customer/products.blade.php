@extends('layouts.customer')


@section('title', 'Products')


@section('navbar_title', 'Products')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    * {
        box-sizing: border-box;
    }


    /* =====================================================
       PRODUCTS PAGE
    ===================================================== */

    .products-page {

        width: 100%;

    }



    /* =====================================================
       SEARCH BAR
    ===================================================== */

    .filter-card {

        background: #ffffff;

        border: 1px solid #e5f1f3;

        border-radius: 15px;

        padding: 15px 17px;

        margin-top: -12px;

        margin-bottom: 22px;

        box-shadow:
            0 3px 12px
            rgba(0,0,0,.04);

    }


    .search-box {

        position: relative;

        width: 100%;

    }


    .search-box i {

        position: absolute;

        left: 13px;

        top: 50%;

        transform: translateY(-50%);

        color: #90a4ae;

        font-size: 14px;

        z-index: 2;

        pointer-events: none;

    }


    .search-box input {

        width: 100%;

        height: 44px;

        border: 1px solid #dceff1;

        border-radius: 10px;

        padding: 10px 12px 10px 38px;

        font-size: 13px;

        outline: none;

        color: #455a64;

        background: #fbfeff;

    }


    .search-box input::placeholder {

        color: #90a4ae;

        opacity: 1;

    }


    .search-box input:focus {

        border-color: #80deea;

        box-shadow:
            0 0 0 3px
            rgba(0,188,212,.08);

        background: #ffffff;

    }



    /* =====================================================
       PRODUCT GRID
    ===================================================== */

    .product-grid {

        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 18px;

    }



    /* =====================================================
       PRODUCT CARD
    ===================================================== */

    .product-card {

        background: #ffffff;

        border: 1px solid #e4f1f3;

        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 3px 13px
            rgba(0,0,0,.045);

        transition: .25s ease;

        height: 100%;

        display: flex;

        flex-direction: column;

    }


    .product-card:hover {

        transform: translateY(-4px);

        box-shadow:
            0 9px 22px
            rgba(0,121,133,.10);

    }



    /* =====================================================
       IMAGE
    ===================================================== */

    .product-image {

        height: 205px;

        background:
            linear-gradient(
                135deg,
                #eefbfd,
                #e0f7fa
            );

        position: relative;

        overflow: hidden;

    }


    .product-image img {

        width: 100%;

        height: 100%;

        object-fit: cover;

        transition: transform .3s ease;

    }


    .product-card:hover
    .product-image img {

        transform: scale(1.03);

    }


    .image-placeholder {

        width: 100%;

        height: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #80deea;

        font-size: 55px;

    }



    /* =====================================================
       STOCK
    ===================================================== */

    .stock-label {

        position: absolute;

        top: 12px;

        right: 12px;

        padding: 6px 9px;

        border-radius: 20px;

        font-size: 10px;

        font-weight: 700;

        backdrop-filter: blur(5px);

    }


    .stock-good {

        background:
            rgba(232,245,233,.95);

        color: #2e7d32;

    }


    .stock-low {

        background:
            rgba(255,243,224,.95);

        color: #ef6c00;

    }


    .stock-out {

        background:
            rgba(255,235,238,.95);

        color: #c62828;

    }



    /* =====================================================
       PRODUCT BODY
    ===================================================== */

    .product-body {

        padding: 17px;

        display: flex;

        flex-direction: column;

        flex: 1;

    }


    .product-category {

        font-size: 10px;

        text-transform: uppercase;

        color: #0097a7;

        font-weight: 700;

        letter-spacing: .5px;

        margin-bottom: 5px;

    }


    .product-name {

        font-size: 17px;

        font-weight: 700;

        color: #263238;

        margin-bottom: 6px;

    }


    .product-description {

        color: #90a4ae;

        font-size: 11px;

        line-height: 1.5;

        min-height: 33px;

        margin-bottom: 10px;

    }


    .product-bottom {

        margin-top: auto;

    }


    .price {

        color: #00838f;

        font-size: 19px;

        font-weight: 700;

        margin-bottom: 12px;

    }


    .stock-text {

        font-size: 11px;

        margin-bottom: 12px;

        color: #78909c;

    }


    .stock-available-text {

        color: #2e7d32;

        font-weight: 700;

    }


    .stock-low-text {

        color: #ef6c00;

        font-weight: 700;

    }


    .stock-out-text {

        color: #c62828;

        font-weight: 700;

    }



    /* =====================================================
       ORDER BUTTON
    ===================================================== */

    .order-btn {

        width: 100%;

        border: none;

        border-radius: 10px;

        padding: 10px 12px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color: #ffffff;

        text-decoration: none;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        font-size: 12px;

        font-weight: 700;

        transition: .2s ease;

    }


    .order-btn:hover {

        background:
            linear-gradient(
                135deg,
                #00838f,
                #006064
            );

        color: #ffffff;

        transform: translateY(-1px);

    }


    .disabled-btn {

        background: #eceff1 !important;

        color: #90a4ae !important;

        pointer-events: none;

    }



    /* =====================================================
       NO SEARCH RESULTS
    ===================================================== */

    #noSearchResults {

        display: none;

        background: #ffffff;

        border: 1px solid #e4f1f3;

        border-radius: 16px;

        padding: 55px 20px;

        text-align: center;

        margin-top: 20px;

        box-shadow:
            0 3px 13px
            rgba(0,0,0,.04);

    }


    #noSearchResults .empty-icon {

        width: 65px;

        height: 65px;

        margin: 0 auto 14px;

        border-radius: 18px;

        background: #e0f7fa;

        color: #80deea;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 27px;

    }


    #noSearchResults h4 {

        margin: 0 0 6px;

        font-size: 18px;

        color: #455a64;

    }


    #noSearchResults p {

        margin: 0;

        color: #90a4ae;

        font-size: 12px;

    }



    /* =====================================================
       DATABASE EMPTY
    ===================================================== */

    .empty-state {

        background: #ffffff;

        border: 1px solid #e4f1f3;

        border-radius: 16px;

        padding: 60px 20px;

        text-align: center;

        box-shadow:
            0 3px 13px
            rgba(0,0,0,.04);

    }


    .empty-icon {

        width: 70px;

        height: 70px;

        border-radius: 20px;

        background: #e0f7fa;

        color: #80deea;

        display: flex;

        align-items: center;

        justify-content: center;

        margin: 0 auto 15px;

        font-size: 29px;

    }


    .empty-state h4 {

        font-size: 18px;

        font-weight: 700;

        color: #455a64;

        margin-bottom: 6px;

    }


    .empty-state p {

        color: #90a4ae;

        font-size: 12px;

        margin: 0;

    }



    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1100px) {

        .product-grid {

            grid-template-columns:
                repeat(2, 1fr);

        }

    }


    @media (max-width: 700px) {

        .product-grid {

            grid-template-columns:
                1fr;

        }


        .product-image {

            height: 210px;

        }

    }


    @media (max-width: 576px) {

        .filter-card {

            margin-top: -6px;

            padding: 12px;

            margin-bottom: 18px;

        }


        .search-box input {

            height: 42px;

        }

    }

</style>

@endsection



@section('content')

<div class="products-page">


    <!-- =================================================
         SEARCH
    ================================================= -->

    <div class="filter-card">


        <div class="search-box">


            <i class="bi bi-search"></i>


            <input
                type="text"
                id="productSearch"
                placeholder="Search water products..."
                autocomplete="off"
            >


        </div>


    </div>



    <!-- =================================================
         PRODUCTS
    ================================================= -->

    @if($products->count() > 0)


        <div
            class="product-grid"
            id="productGrid"
        >


            @foreach($products as $product)


                <div
                    class="
                        product-card
                        product-item
                    "
                    data-name="{{
                        strtolower(
                            $product->name
                        )
                    }}"
                    data-category="{{
                        strtolower(
                            $product->category ?? ''
                        )
                    }}"
                >


                    <!-- IMAGE -->

                    <div class="product-image">


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
                                class="image-placeholder"
                            >

                                <i
                                    class="
                                        bi
                                        bi-droplet-fill
                                    "
                                ></i>

                            </div>


                        @endif



                        <!-- STOCK -->

                        @if($product->stock <= 0)


                            <span
                                class="
                                    stock-label
                                    stock-out
                                "
                            >

                                <i
                                    class="
                                        bi
                                        bi-x-circle
                                        me-1
                                    "
                                ></i>

                                Out of Stock

                            </span>


                        @elseif($product->stock <= 10)


                            <span
                                class="
                                    stock-label
                                    stock-low
                                "
                            >

                                <i
                                    class="
                                        bi
                                        bi-exclamation-circle
                                        me-1
                                    "
                                ></i>

                                Low Stock

                            </span>


                        @else


                            <span
                                class="
                                    stock-label
                                    stock-good
                                "
                            >

                                <i
                                    class="
                                        bi
                                        bi-check-circle
                                        me-1
                                    "
                                ></i>

                                Available

                            </span>


                        @endif


                    </div>



                    <!-- BODY -->

                    <div
                        class="product-body"
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
                            class="product-description"
                        >

                            {{
                                $product->description
                                ??
                                'Clean and quality water from our station.'
                            }}

                        </div>


                        <div
                            class="product-bottom"
                        >


                            <!-- PRICE -->

                            <div class="price">

                                ₱{{
                                    number_format(
                                        $product->price,
                                        2
                                    )
                                }}

                            </div>



                            <!-- STOCK -->

                            <div
                                class="stock-text"
                            >


                                @if(
                                    $product->stock <= 0
                                )


                                    <span
                                        class="
                                            stock-out-text
                                        "
                                    >

                                        <i
                                            class="
                                                bi
                                                bi-x-circle
                                                me-1
                                            "
                                        ></i>

                                        Out of Stock

                                    </span>


                                @elseif(
                                    $product->stock <= 10
                                )


                                    <span
                                        class="
                                            stock-low-text
                                        "
                                    >

                                        <i
                                            class="
                                                bi
                                                bi-exclamation-circle
                                                me-1
                                            "
                                        ></i>

                                        {{ $product->stock }}

                                        remaining

                                    </span>


                                @else


                                    <span
                                        class="
                                            stock-available-text
                                        "
                                    >

                                        <i
                                            class="
                                                bi
                                                bi-check-circle
                                                me-1
                                            "
                                        ></i>

                                        {{ $product->stock }}

                                        available

                                    </span>


                                @endif


                            </div>



                            <!-- ORDER -->

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
                                        class="
                                            bi
                                            bi-cart-plus
                                        "
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
                                        class="
                                            bi
                                            bi-x-circle
                                        "
                                    ></i>

                                    Out of Stock

                                </span>


                            @endif


                        </div>


                    </div>


                </div>


            @endforeach


        </div>



        <!-- =================================================
             NO SEARCH RESULTS
        ================================================= -->

        <div
            id="noSearchResults"
        >


            <div class="empty-icon">

                <i class="bi bi-search"></i>

            </div>


            <h4>

                No Products Found

            </h4>


            <p>

                No water products match your search.

            </p>


        </div>


    @else


        <!-- =================================================
             NO PRODUCTS
        ================================================= -->

        <div
            class="empty-state"
        >


            <div class="empty-icon">

                <i class="bi bi-droplet"></i>

            </div>


            <h4>

                No Products Available

            </h4>


            <p>

                There are currently no water products
                available for ordering.

            </p>


        </div>


    @endif


</div>

@endsection



{{-- IMPORTANT:
     layouts.customer uses @stack('scripts')
--}}

@push('scripts')

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            const searchInput =
                document.getElementById(
                    'productSearch'
                );


            const productItems =
                document.querySelectorAll(
                    '.product-item'
                );


            const noSearchResults =
                document.getElementById(
                    'noSearchResults'
                );


            if (!searchInput) {

                return;

            }


            function filterProducts() {


                const keyword =
                    searchInput.value
                        .toLowerCase()
                        .trim();


                let visibleCount = 0;


                productItems.forEach(
                    function (item) {


                        const name =
                            (
                                item.dataset.name
                                || ''
                            ).toLowerCase();


                        const category =
                            (
                                item.dataset.category
                                || ''
                            ).toLowerCase();


                        const matches =
                            keyword === ''
                            ||
                            name.includes(keyword)
                            ||
                            category.includes(keyword);


                        if (matches) {

                            item.style.display = '';

                            visibleCount++;

                        } else {

                            item.style.display =
                                'none';

                        }

                    }
                );


                if (noSearchResults) {


                    if (
                        keyword !== ''
                        &&
                        visibleCount === 0
                    ) {

                        noSearchResults.style.display =
                            'block';

                    } else {

                        noSearchResults.style.display =
                            'none';

                    }

                }

            }


            searchInput.addEventListener(
                'input',
                filterProducts
            );


        }
    );

</script>

@endpush