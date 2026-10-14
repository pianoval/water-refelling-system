<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Profile - Water Refilling Station</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            background: #f5f7fb;
        }

        .edit-card {
            max-width: 800px;
            margin: auto;
            border: none;
            border-radius: 15px;
        }

        .profile-preview {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0d6efd;
        }

        .profile-placeholder {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #e9ecef;
            border: 4px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            margin: auto;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary shadow-sm">

    <div class="container">

        <span class="navbar-brand fw-bold">

            💧 Water Refilling Station

        </span>

    </div>

</nav>



<!-- MAIN -->

<div class="container py-5">


    <div class="card edit-card shadow-sm">

        <div class="card-body p-4 p-md-5">


            <!-- TITLE -->

            <div class="text-center mb-4">

                <h2 class="fw-bold">
                    Edit Profile
                </h2>

                <p class="text-muted">
                    Update your personal information
                </p>

            </div>



            <!-- VALIDATION ERRORS -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Please fix the following errors:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- FORM -->

            <form
                action="{{ route('account.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')



                <!-- PROFILE PICTURE -->

                <div class="text-center mb-4">


                    @if($user->profile_picture)

                        <img
                            id="preview"
                            src="{{ asset('storage/' . $user->profile_picture) }}"
                            alt="Profile Picture"
                            class="profile-preview">

                    @else

                        <div
                            id="placeholder"
                            class="profile-placeholder">

                            👤

                        </div>

                        <img
                            id="preview"
                            src=""
                            alt="Profile Preview"
                            class="profile-preview d-none">

                    @endif


                    <div class="mt-3">

                        <label
                            for="profile_picture"
                            class="form-label fw-semibold">

                            Profile Picture

                        </label>


                        <input
                            type="file"
                            name="profile_picture"
                            id="profile_picture"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">


                        <small class="text-muted">

                            JPG, JPEG, PNG, or WEBP. Maximum 2MB.

                        </small>

                    </div>

                </div>



                <!-- NAME -->

                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label fw-semibold">

                        Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required>

                </div>



                <!-- AGE -->

                <div class="mb-3">

                    <label
                        for="age"
                        class="form-label fw-semibold">

                        Age

                    </label>

                    <input
                        type="number"
                        name="age"
                        id="age"
                        class="form-control"
                        value="{{ old('age', $user->age) }}"
                        min="1"
                        max="120">

                </div>



                <!-- ADDRESS -->

                <div class="mb-3">

                    <label
                        for="address"
                        class="form-label fw-semibold">

                        Address

                    </label>

                    <textarea
                        name="address"
                        id="address"
                        class="form-control"
                        rows="3"
                        placeholder="Enter your address">{{ old('address', $user->address) }}</textarea>

                </div>



                <!-- EMAIL -->

                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label fw-semibold">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required>

                </div>



                <!-- BIRTHDATE -->

                <div class="mb-3">

                    <label
                        for="birthdate"
                        class="form-label fw-semibold">

                        Birthdate

                    </label>

                    <input
                        type="date"
                        name="birthdate"
                        id="birthdate"
                        class="form-control"
                        value="{{ old('birthdate', $user->birthdate) }}">

                </div>



                <!-- ROLE -->

                <div class="mb-4">

                    <label
                        class="form-label fw-semibold">

                        Account Role

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ ucfirst($user->role) }}"
                        readonly>

                    <small class="text-muted">

                        Your account role cannot be changed from this page.

                    </small>

                </div>



                <!-- BUTTONS -->

                <div class="d-flex flex-wrap gap-2">


                    <button
                        type="submit"
                        class="btn btn-primary">

                        💾 Save Changes

                    </button>


                    <a
                        href="{{ auth()->user()->role === 'admin'
                            ? route('admin.account')
                            : (auth()->user()->role === 'staff'
                                ? route('staff.account')
                                : route('customer.account')) }}"
                        class="btn btn-secondary">

                        Cancel

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- IMAGE PREVIEW SCRIPT -->

<script>

    const profileInput =
        document.getElementById('profile_picture');

    const preview =
        document.getElementById('preview');

    const placeholder =
        document.getElementById('placeholder');


    profileInput.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }


        const reader = new FileReader();


        reader.onload = function(e) {

            preview.src = e.target.result;

            preview.classList.remove('d-none');


            if (placeholder) {
                placeholder.classList.add('d-none');
            }

        };


        reader.readAsDataURL(file);

    });

</script>


</body>

</html>