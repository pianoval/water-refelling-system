<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Change Password - Water Refilling Station</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f4f6fb;
        }

        .card {
            border: none;
            border-radius: 20px;
        }

    </style>

</head>

<body>


<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="{{ route('account.password') }}">
            💧 Water Refilling Station
        </a>

        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="btn btn-outline-light btn-sm"
            >
                Logout
            </button>

        </form>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <h2 class="fw-bold mb-2">
                        🔐 Change Password
                    </h2>

                    <p class="text-muted mb-4">
                        Keep your account secure by using a strong password.
                    </p>


                    {{-- ERRORS --}}
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>Please check the following:</strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('account.password.update') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- CURRENT PASSWORD --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control"
                                required
                            >

                        </div>


                        {{-- NEW PASSWORD --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >

                            <small class="text-muted">
                                Password must be at least 8 characters.
                            </small>

                        </div>


                        {{-- CONFIRM PASSWORD --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-warning"
                            >
                                🔐 Change Password
                            </button>


                            <a
                                href="{{ route(
                                    auth()->user()->role === 'admin'
                                        ? 'admin.account'
                                        : (auth()->user()->role === 'staff'
                                            ? 'staff.account'
                                            : 'customer.account')
                                ) }}"
                                class="btn btn-secondary"
                            >
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>