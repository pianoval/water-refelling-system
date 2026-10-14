<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Out of Stock</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f4f8fb;
        }

        .header {

            background: linear-gradient(
                135deg,
                #dc3545,
                #a71d2a
            );

            color: white;

            padding: 30px 0;

        }

        .box {

            background: white;

            border-radius: 18px;

            padding: 20px;

            box-shadow:
                0 5px 20px rgba(0,0,0,.06);

        }

        .product-image {

            width: 65px;
            height: 65px;

            object-fit: cover;

            border-radius: 10px;

        }

    </style>

</head>


<body>


<div class="header">

    <div class="container">


        <a
            href="{{ route('admin.dashboard') }}"
            class="text-white text-decoration-none"
        >

            <i class="bi bi-arrow-left"></i>

            Back to Dashboard

        </a>


        <h2 class="mt-3">

            <i class="bi bi-x-circle"></i>

            Out of Stock Products

        </h2>


        <p class="mb-0">

            Products that currently have no stock.

        </p>

    </div>

</div>



<div class="container py-4">


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    <div class="box">


        <div class="d-flex justify-content-between mb-4">

            <h4>
                Out of Stock List
            </h4>


            <a
                href="{{ route('admin.inventory.index') }}"
                class="btn btn-outline-secondary"
            >

                All Inventory

            </a>

        </div>



        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Image</th>

                        <th>Product</th>

                        <th>Category</th>

                        <th>Price</th>

                        <th>Stock</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        class="product-image"
                                    >

                                @else

                                    <i class="bi bi-image fs-2 text-muted"></i>

                                @endif

                            </td>


                            <td>

                                <strong>
                                    {{ $product->name }}
                                </strong>

                            </td>


                            <td>
                                {{ $product->category }}
                            </td>


                            <td>
                                ₱{{ number_format($product->price, 2) }}
                            </td>


                            <td>

                                <span class="badge bg-danger">

                                    Out of Stock

                                </span>

                            </td>


                            <td>


                                <a
                                    href="{{ route('admin.products.show', $product) }}"
                                    class="btn btn-sm btn-info text-white"
                                >

                                    View

                                </a>


                                <a
                                    href="{{ route('admin.products.edit', $product) }}"
                                    class="btn btn-sm btn-warning"
                                >

                                    Edit

                                </a>


                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Delete this product?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-sm btn-danger"
                                    >

                                        Delete

                                    </button>

                                </form>


                                <button
                                    class="btn btn-sm btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#restock{{ $product->id }}"
                                >

                                    <i class="bi bi-plus-circle"></i>

                                    Restock

                                </button>


                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <i
                                    class="bi bi-check-circle fs-1 text-success"
                                ></i>


                                <h5 class="mt-3">

                                    No Out of Stock Products

                                </h5>


                                <p class="text-muted">

                                    All products currently have stock.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>



<!-- RESTOCK MODALS -->

@foreach($products as $product)

<div
    class="modal fade"
    id="restock{{ $product->id }}"
    tabindex="-1"
>

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    Restock {{ $product->name }}

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <form
                action="{{ route('admin.products.restock', $product) }}"
                method="POST"
            >

                @csrf


                <div class="modal-body">

                    <p>

                        Current Stock:

                        <strong>
                            {{ $product->stock }}
                        </strong>

                    </p>


                    <label class="form-label">

                        Quantity to Add

                    </label>


                    <input
                        type="number"
                        name="quantity"
                        min="1"
                        class="form-control"
                        required
                    >

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="btn btn-success"
                    >

                        <i class="bi bi-plus-circle"></i>

                        Restock

                    </button>

                </div>

            </form>


        </div>

    </div>

</div>

@endforeach



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>