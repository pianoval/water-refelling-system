<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Order</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">

            <span class="navbar-brand">
                Staff Dashboard
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-light">
                    Logout
                </button>
            </form>

        </div>
    </nav>


    <div class="container py-5">

        <div class="card shadow-sm">

            <div class="card-body">

                <h1 class="mb-4">
                    ✏️ Edit Order
                </h1>


                <form
                    action="{{ route('staff.orders.update', $order) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <!-- CUSTOMER -->
                    <div class="mb-3">

                        <label
                            for="customer_name"
                            class="form-label"
                        >
                            Customer Name
                        </label>

                        <input
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            class="form-control"
                            value="{{ old('customer_name', $order->customer_name) }}"
                        >

                        @error('customer_name')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- PRODUCT -->
                    <div class="mb-3">

                        <label
                            for="product_name"
                            class="form-label"
                        >
                            Product Name
                        </label>

                        <input
                            type="text"
                            name="product_name"
                            id="product_name"
                            class="form-control"
                            value="{{ old('product_name', $order->product_name) }}"
                        >

                        @error('product_name')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- QUANTITY -->
                    <div class="mb-3">

                        <label
                            for="quantity"
                            class="form-label"
                        >
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            class="form-control"
                            min="1"
                            value="{{ old('quantity', $order->quantity) }}"
                        >

                        @error('quantity')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- TOTAL PRICE -->
                    <div class="mb-3">

                        <label
                            for="total_price"
                            class="form-label"
                        >
                            Total Price
                        </label>

                        <input
                            type="number"
                            name="total_price"
                            id="total_price"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ old('total_price', $order->total_price) }}"
                        >

                        @error('total_price')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- STATUS -->
                    <div class="mb-4">

                        <label
                            for="status"
                            class="form-label"
                        >
                            Status
                        </label>

                        <select
                            name="status"
                            id="status"
                            class="form-select"
                        >

                            <option
                                value="pending"
                                {{ old('status', $order->status) === 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                            <option
                                value="confirmed"
                                {{ old('status', $order->status) === 'confirmed' ? 'selected' : '' }}
                            >
                                Confirmed
                            </option>

                            <option
                                value="delivered"
                                {{ old('status', $order->status) === 'delivered' ? 'selected' : '' }}
                            >
                                Delivered
                            </option>

                            <option
                                value="cancelled"
                                {{ old('status', $order->status) === 'cancelled' ? 'selected' : '' }}
                            >
                                Cancelled
                            </option>

                        </select>

                        @error('status')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update Order
                    </button>

                    <a
                        href="{{ route('staff.orders.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>
</html>