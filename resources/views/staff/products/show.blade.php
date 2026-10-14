<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - Staff</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        @if($product->image)

                            <img src="{{ asset('storage/' . $product->image) }}"
                                 class="img-fluid rounded"
                                 style="max-height:250px;"
                                 alt="{{ $product->name }}">

                        @else

                            <div class="bg-light border rounded p-5">
                                <span style="font-size:70px;">💧</span>
                            </div>

                        @endif

                    </div>

                    <h2 class="text-center fw-bold">
                        {{ $product->name }}
                    </h2>

                    <div class="text-center mb-4">
                        <span class="badge bg-info text-dark">
                            {{ $product->category }}
                        </span>
                    </div>

                    <div class="row text-center">

                        <div class="col-6">
                            <p class="text-muted mb-1">Product ID</p>
                            <h5>#{{ $product->id }}</h5>
                        </div>

                        <div class="col-6">
                            <p class="text-muted mb-1">Price</p>
                            <h5>₱{{ number_format($product->price, 2) }}</h5>
                        </div>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('staff.products.index') }}"
                           class="btn btn-outline-secondary">
                            ← Back
                        </a>

                        <a href="{{ route('staff.products.edit', $product) }}"
                           class="btn btn-primary">
                            Edit Product
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>