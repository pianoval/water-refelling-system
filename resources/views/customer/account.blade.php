@extends('layouts.customer')


@section('title', 'Customer Account')


@section('navbar_title', 'My Account')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    /* =====================================================
       CUSTOMER ACCOUNT
    ===================================================== */

    .customer-account {

        width: 100%;

    }


    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .section-heading {

        display:
            flex;

        align-items:
            center;

        justify-content:
            space-between;

        margin-bottom:
            14px;

    }


    .section-heading h4 {

        margin: 0;

        color:
            #263238;

        font-size:
            20px;

        font-weight:
            700;

    }


    .section-heading p {

        margin:
            4px 0 0;

        color:
            #90a4ae;

        font-size:
            12px;

    }


    /* =====================================================
       ACCOUNT CARD
    ===================================================== */

    .account-card {

        border:
            none;

        border-radius:
            15px;

        background:
            #ffffff;

        box-shadow:
            0 3px 12px
            rgba(
                0,
                0,
                0,
                .04
            );

        overflow:
            hidden;

        margin-bottom:
            22px;

    }


    .account-card-header {

        padding:
            16px 18px;

        border-bottom:
            1px solid #edf2f4;

        display:
            flex;

        align-items:
            center;

        gap:
            12px;

    }


    .account-icon {

        width:
            43px;

        height:
            43px;

        border-radius:
            11px;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            19px;

    }


    .account-card-header h5 {

        margin:
            0;

        font-size:
            16px;

        font-weight:
            700;

        color:
            #263238;

    }


    .account-card-header p {

        margin:
            3px 0 0;

        font-size:
            11px;

        color:
            #90a4ae;

    }


    .account-card-body {

        padding:
            20px;

    }


    /* =====================================================
       PROFILE
    ===================================================== */

    .profile-section {

        display:
            flex;

        align-items:
            center;

        gap:
            17px;

        padding-bottom:
            20px;

        margin-bottom:
            20px;

        border-bottom:
            1px solid #edf2f4;

    }


    .profile-image {

        width:
            82px;

        height:
            82px;

        border-radius:
            50%;

        object-fit:
            cover;

        border:
            4px solid #e0f7fa;

    }


    .profile-placeholder {

        width:
            82px;

        height:
            82px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #e0f7fa,
                #b2ebf2
            );

        color:
            #00838f;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            34px;

        border:
            4px solid #e0f7fa;

    }


    .profile-info h4 {

        margin:
            0 0 4px;

        color:
            #263238;

        font-size:
            19px;

        font-weight:
            700;

    }


    .profile-info p {

        margin:
            0;

        color:
            #90a4ae;

        font-size:
            11px;

    }


    .role-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            5px;

        margin-top:
            8px;

        padding:
            6px 11px;

        border-radius:
            20px;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            10px;

        font-weight:
            700;

    }


    /* =====================================================
       FORM
    ===================================================== */

    .form-label {

        font-size:
            11px;

        font-weight:
            700;

        color:
            #455a64;

        margin-bottom:
            6px;

    }


    .form-control {

        min-height:
            43px;

        border:
            1px solid #cfd8dc;

        border-radius:
            9px;

        font-size:
            12px;

        color:
            #37474f;

    }


    textarea.form-control {

        min-height:
            auto;

    }


    .form-control:focus {

        border-color:
            #00acc1;

        box-shadow:
            0 0 0 .2rem
            rgba(
                0,
                172,
                193,
                .10
            );

    }


    .form-text {

        font-size:
            10px;

        color:
            #90a4ae;

    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .save-btn {

        border:
            none;

        border-radius:
            9px;

        padding:
            10px 18px;

        background:
            #00acc1;

        color:
            #ffffff;

        font-size:
            13px;

        font-weight:
            700;

        transition:
            .2s ease;

    }


    .save-btn:hover {

        background:
            #00838f;

        color:
            #ffffff;

    }


    .password-btn {

        border:
            none;

        border-radius:
            9px;

        padding:
            10px 18px;

        background:
            #e0f7fa;

        color:
            #00838f;

        font-size:
            13px;

        font-weight:
            700;

        transition:
            .2s ease;

    }


    .password-btn:hover {

        background:
            #b2ebf2;

        color:
            #006064;

    }


    /* =====================================================
       ALERT
    ===================================================== */

    .alert {

        border-radius:
            10px;

        font-size:
            12px;

    }


    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 576px) {

        .section-heading h4 {

            font-size:
                18px;

        }


        .profile-section {

            align-items:
                flex-start;

            flex-direction:
                column;

        }


        .save-btn,
        .password-btn {

            width:
                100%;

        }

    }

</style>

@endsection



@section('content')

<div class="customer-account">


    <!-- =================================================
         PAGE HEADING
    ================================================= -->

    <div class="section-heading">

        <div>

            <h4>
                My Account
            </h4>

            <p>
                Manage your customer account information.
            </p>

        </div>

    </div>



    <!-- =================================================
         SUCCESS MESSAGE
    ================================================= -->

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif



    <!-- =================================================
         ERROR MESSAGE
    ================================================= -->

    @if(session('error'))

        <div class="alert alert-danger">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            {{ session('error') }}

        </div>

    @endif



    <!-- =================================================
         VALIDATION ERRORS
    ================================================= -->

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Please check the following:
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



    <!-- =================================================
         ACCOUNT INFORMATION
    ================================================= -->

    <div class="account-card">


        <div class="account-card-header">

            <div class="account-icon">

                <i class="bi bi-person-circle"></i>

            </div>


            <div>

                <h5>
                    Account Information
                </h5>

                <p>
                    Update your personal information and profile picture.
                </p>

            </div>

        </div>



        <div class="account-card-body">


            <!-- =================================================
                 PROFILE
            ================================================= -->

            <div class="profile-section">


                @if($user->profile_picture)

                    <img
                        src="{{ asset(
                            'storage/' .
                            $user->profile_picture
                        ) }}"
                        alt="Profile"
                        class="profile-image"
                    >

                @else

                    <div class="profile-placeholder">

                        <i class="bi bi-person-fill"></i>

                    </div>

                @endif


                <div class="profile-info">

                    <h4>
                        {{ $user->name }}
                    </h4>

                    <p>
                        {{ $user->email }}
                    </p>


                    <span class="role-badge">

                        <i class="bi bi-person-fill"></i>

                        Customer

                    </span>

                </div>


            </div>



            <!-- =================================================
                 UPDATE ACCOUNT FORM
            ================================================= -->

            <form
                action="{{ route('customer.account.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <div class="row g-3">


                    <!-- NAME -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old(
                                'name',
                                $user->name
                            ) }}"
                            required
                        >

                    </div>



                    <!-- EMAIL -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old(
                                'email',
                                $user->email
                            ) }}"
                            required
                        >

                    </div>



                    <!-- AGE -->

                    <div class="col-md-4">

                        <label class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            name="age"
                            class="form-control"
                            value="{{ old(
                                'age',
                                $user->age
                            ) }}"
                            min="1"
                            max="120"
                        >

                    </div>



                    <!-- BIRTHDATE -->

                    <div class="col-md-4">

                        <label class="form-label">
                            Birthdate
                        </label>

                        <input
                            type="date"
                            name="birthdate"
                            class="form-control"
                            value="{{ old(
                                'birthdate',
                                $user->birthdate
                            ) }}"
                        >

                    </div>



                    <!-- PHONE -->

                    <div class="col-md-4">

                        <label class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ old(
                                'phone_number',
                                $user->phone_number
                            ) }}"
                        >

                    </div>



                    <!-- ADDRESS -->

                    <div class="col-12">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                        >{{ old(
                            'address',
                            $user->address
                        ) }}</textarea>

                    </div>



                    <!-- PROFILE PICTURE -->

                    <div class="col-12">

                        <label class="form-label">
                            Profile Picture
                        </label>

                        <input
                            type="file"
                            name="profile_picture"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <div class="form-text mt-1">
                            JPG, JPEG, PNG, or WEBP. Maximum 2MB.
                        </div>

                    </div>


                </div>



                <!-- SAVE -->

                <button
                    type="submit"
                    class="save-btn mt-4"
                >

                    <i class="bi bi-check-circle me-1"></i>

                    Save Changes

                </button>


            </form>


        </div>

    </div>



    <!-- =================================================
         CHANGE PASSWORD
    ================================================= -->

    <div class="account-card">


        <div class="account-card-header">

            <div class="account-icon">

                <i class="bi bi-lock-fill"></i>

            </div>


            <div>

                <h5>
                    Change Password
                </h5>

                <p>
                    Update your customer account password.
                </p>

            </div>

        </div>



        <div class="account-card-body">


            <form
                action="{{ route('customer.account.password') }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="row g-3">


                    <!-- CURRENT PASSWORD -->

                    <div class="col-md-4">

                        <label class="form-label">
                            Current Password
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required
                        >

                    </div>



                    <!-- NEW PASSWORD -->

                    <div class="col-md-4">

                        <label class="form-label">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>



                    <!-- CONFIRM PASSWORD -->

                    <div class="col-md-4">

                        <label class="form-label">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >

                    </div>


                </div>



                <!-- UPDATE PASSWORD -->

                <button
                    type="submit"
                    class="password-btn mt-4"
                >

                    <i class="bi bi-shield-lock me-1"></i>

                    Update Password

                </button>


            </form>


        </div>

    </div>


</div>

@endsection