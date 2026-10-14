
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Order | Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>
        body {
            background: #f4f8fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #075985, #0891b2);
        }

        .page-title {
            color: #123b50;
            font-weight: 700;
        }

        .form-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(20, 70, 90, .08);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 11px 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0891b2;
            box-shadow: 0 0 0 .2rem rgba(8, 145, 178, .15);
        }

        .order-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: #e0f2fe;
            color: #0369a1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .total-box {
            background: #f0fdfa;
            border: 1px solid #99f6e4;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark navbar-custom shadow-sm">

    <div class="container-fluid px-4">

        <a
            href="{{ route('admin.dashboard') }}"
            class="navbar-brand fw-bold">

            <i class="bi bi-droplet-fill me-2"></i>

            Water Refilling Station

        </a>

        <div class="d-flex align-items-center gap-3">

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-light btn-sm">

                <i class="bi bi-grid-fill me-1"></i>
                Dashboard

            </a>

            <span class="text-white d-none d-md-inline">
                {{ auth()->user()->name }}
            </span>

        </div>

    </div>

</nav>


<!-- MAIN -->
<div class="container py-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <a
            href="{{ route('admin.orders.index') }}"
            class="text-decoration-none text-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Back to Orders

        </a>

        <h2 class="page-title mt-3 mb-1">

            <i class="bi bi-plus-circle-fill text-primary me-2"></i>

            Add New Order

        </h2>

        <p class="text-muted">
            Create a new customer order.
        </p>

    </div>


    <!-- VALIDATION ERRORS -->
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                Please fix the following errors:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- FORM CARD -->
    <div class="card form-card">

        <div class="card-body p-4 p-md-5">

            <div class="d-flex align-items-center gap-3 mb-4">

                <div class="order-icon">

                    <i class="bi bi-box-seam-fill"></i>

                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Order Information
                    </h5>

                    <small class="text-muted">
                        Enter the details of the customer order.
                    </small>

                </div>

            </div>


            <form
                action="{{ route('admin.orders.store') }}"
                method="POST">

                @csrf


                <div class="row g-4">


                    <!-- CUSTOMER NAME -->
                    <div class="col-md-6">

                        <label
                            for="customer_name"
                            class="form-label">

                            <i class="bi bi-person-fill me-1"></i>
                            Customer Name

                        </label>

                        <input
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            class="form-control @error('customer_name') is-invalid @enderror"
                            value="{{ old('customer_name') }}"
                            placeholder="Enter customer name"
                            required>

                        @error('customer_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- PRODUCT NAME -->
                    <div class="col-md-6">

                        <label
                            for="product_name"
                            class="form-label">

                            <i class="bi bi-droplet-fill me-1"></i>
                            Product Name

                        </label>

                        <input
                            type="text"
                            name="product_name"
                            id="product_name"
                            class="form-control @error('product_name') is-invalid @enderror"
                            value="{{ old('product_name') }}"
                            placeholder="Example: Mineral Water"
                            required>

                        @error('product_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- QUANTITY -->
                    <div class="col-md-6">

                        <label
                            for="quantity"
                            class="form-label">

                            <i class="bi bi-123 me-1"></i>
                            Quantity

                        </label>

                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            class="form-control @error('quantity') is-invalid @enderror"
                            value="{{ old('quantity', 1) }}"
                            min="1"
                            required>

                        @error('quantity')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- TOTAL PRICE -->
                    <div class="col-md-6">

                        <label
                            for="total_price"
                            class="form-label">

                            <i class="bi bi-cash-stack me-1"></i>
                            Total Price

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                ₱
                            </span>

                            <input
                                type="number"
                                name="total_price"
                                id="total_price"
                                class="form-control @error('total_price') is-invalid @enderror"
                                value="{{ old('total_price') }}"
                                step="0.01"
                                min="0"
                                placeholder="0.00"
                                required>

                        </div>

                        @error('total_price')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label
                            for="status"
                            class="form-label">

                            <i class="bi bi-info-circle-fill me-1"></i>
                            Order Status

                        </label>

                        <select
                            name="status"
                            id="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                            <option value="">
                                Select status
                            </option>

                            <option
                                value="pending"
                                {{ old('status') === 'pending' ? 'selected' : '' }}>

                                Pending

                            </option>

                            <option
                                value="confirmed"
                                {{ old('status') === 'confirmed' ? 'selected' : '' }}>

                                Confirmed

                            </option>

                            <option
                                value="delivered"
                                {{ old('status') === 'delivered' ? 'selected' : '' }}>

                                Delivered

                            </option>

                            <option
                                value="cancelled"
                                {{ old('status') === 'cancelled' ? 'selected' : '' }}>

                                Cancelled

                            </option>

                        </select>

                        @error('status')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- INFORMATION -->
                    <div class="col-md-6">

                        <div class="alert alert-info h-100 mb-0">

                            <i class="bi bi-info-circle-fill me-2"></i>

                            <strong>Order Status Guide</strong>

                            <ul class="small mb-0 mt-2">

                                <li>
                                    <strong>Pending</strong> – waiting for confirmation
                                </li>

                                <li>
                                    <strong>Confirmed</strong> – order approved
                                </li>

                                <li>
                                    <strong>Delivered</strong> – order completed
                                </li>

                                <li>
                                    <strong>Cancelled</strong> – order cancelled
                                </li>

                            </ul>

                        </div>

                    </div>


                    <!-- BUTTONS -->
                    <div class="col-12">

                        <hr class="my-2">

                        <div class="d-flex justify-content-end gap-2">

                            <a
                                href="{{ route('admin.orders.index') }}"
                                class="btn btn-outline-secondary">

                                <i class="bi bi-x-lg me-1"></i>

                                Cancel

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="bi bi-check-lg me-1"></i>

                                Save Order

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>

