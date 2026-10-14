@extends('layouts.customer')


@section('title', 'My Account')


@section('navbar_title', 'My Account')


@section('navbar_subtitle', 'Water Refilling Station')


@section('styles')

<style>

    * {
        box-sizing: border-box;
    }


    /* =====================================================
       ACCOUNT PAGE
    ===================================================== */

    .account-page {

        width:
            100%;

    }



    /* =====================================================
       ALERTS
    ===================================================== */

    .custom-alert {

        border:
            none;

        border-radius:
            12px;

        font-size:
            12px;

        padding:
            13px 16px;

        margin-bottom:
            18px;

    }



    /* =====================================================
       ACCOUNT CARD
       MOVED CLOSER TO NAVBAR
    ===================================================== */

    .account-card {

        background:
            #ffffff;

        border:
            1px solid #e4f1f3;

        border-radius:
            17px;

        box-shadow:
            0 4px 15px
            rgba(0,0,0,.045);

        padding:
            22px;

        margin-top:
            -12px;

        margin-bottom:
            20px;

    }


    .account-card + .account-card {

        margin-top:
            0;

    }



    /* =====================================================
       CARD HEADER
    ===================================================== */

    .card-heading {

        display:
            flex;

        align-items:
            center;

        gap:
            10px;

        margin-bottom:
            20px;

        padding-bottom:
            15px;

        border-bottom:
            1px solid #edf3f4;

    }


    .card-heading-icon {

        width:
            42px;

        height:
            42px;

        border-radius:
            11px;

        background:
            #e0f7fa;

        color:
            #00838f;

        display:
            flex;

        align-items:
            center;

        justify-content:
            center;

        font-size:
            19px;

    }


    .card-heading h3 {

        margin:
            0;

        color:
            #263238;

        font-size:
            17px;

        font-weight:
            700;

    }


    .card-heading p {

        margin:
            3px 0 0;

        color:
            #90a4ae;

        font-size:
            11px;

    }



    /* =====================================================
       PROFILE SECTION
    ===================================================== */

    .profile-section {

        display:
            flex;

        align-items:
            center;

        gap:
            20px;

        padding-bottom:
            20px;

        margin-bottom:
            20px;

        border-bottom:
            1px solid #edf3f4;

    }


    .account-profile-image {

        width:
            90px;

        height:
            90px;

        border-radius:
            50%;

        object-fit:
            cover;

        border:
            4px solid #e0f7fa;

        box-shadow:
            0 4px 14px
            rgba(0,121,133,.08);

    }


    .account-profile-placeholder {

        width:
            90px;

        height:
            90px;

        border-radius:
            50%;

        background:
            linear-gradient(
                135deg,
                #e0f7fa,
                #d5f6f8
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
            38px;

        border:
            4px solid #eafafb;

        box-shadow:
            0 4px 14px
            rgba(0,121,133,.08);

    }


    .profile-details h4 {

        margin:
            0 0 5px;

        color:
            #263238;

        font-size:
            20px;

        font-weight:
            700;

    }


    .profile-details p {

        margin:
            0;

        color:
            #90a4ae;

        font-size:
            12px;

    }


    .role-badge {

        display:
            inline-flex;

        align-items:
            center;

        gap:
            6px;

        margin-top:
            9px;

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
            12px;

        font-weight:
            700;

        color:
            #546e7a;

        margin-bottom:
            7px;

    }


    .form-control {

        min-height:
            43px;

        border:
            1px solid #dceff1;

        border-radius:
            10px;

        background:
            #fbfeff;

        color:
            #455a64;

        font-size:
            13px;

    }


    .form-control:focus {

        border-color:
            #80deea;

        box-shadow:
            0 0 0 3px
            rgba(0,188,212,.08);

    }


    textarea.form-control {

        min-height:
            100px;

        resize:
            vertical;

    }


    .form-text {

        font-size:
            10px;

        color:
            #90a4ae;

        margin-top:
            6px;

    }



    /* =====================================================
       BUTTONS
    ===================================================== */

    .save-btn {

        border:
            none;

        border-radius:
            9px;

        background:
            linear-gradient(
                135deg,
                #00acc1,
                #0097a7
            );

        color:
            #ffffff;

        padding:
            10px 16px;

        font-size:
            12px;

        font-weight:
            700;

        transition:
            .2s ease;

    }


    .save-btn:hover {

        background:
            linear-gradient(
                135deg,
                #00838f,
                #006064
            );

        color:
            #ffffff;

        transform:
            translateY(-1px);

    }


    .password-btn {

        border:
            1px solid #bfecef;

        border-radius:
            9px;

        background:
            #e0f7fa;

        color:
            #00838f;

        padding:
            10px 16px;

        font-size:
            12px;

        font-weight:
            700;

        transition:
            .2s ease;

    }


    .password-btn:hover {

        background:
            #ccf3f6;

        color:
            #006064;

    }



    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 767px) {

        .account-card {

            margin-top:
                -6px;

            padding:
                18px;

        }


        .account-card + .account-card {

            margin-top:
                0;

        }


        .profile-section {

            align-items:
                flex-start;

            gap:
                14px;

        }


        .account-profile-image,
        .account-profile-placeholder {

            width:
                75px;

            height:
                75px;

        }


        .account-profile-placeholder {

            font-size:
                30px;

        }


        .profile-details h4 {

            font-size:
                17px;

        }

    }


    @media (max-width: 576px) {

        .save-btn,
        .password-btn {

            width:
                100%;

        }

    }

</style>

@endsection


@section('content')

<div class="account-page">


    <!-- =================================================
         SUCCESS MESSAGE
    ================================================== -->

    @if(session('success'))

        <div
            class="
                alert
                alert-success
                custom-alert
            "
        >

            <i
                class="
                    bi
                    bi-check-circle-fill
                    me-2
                "
            ></i>

            {{ session('success') }}

        </div>

    @endif



    <!-- =================================================
         ERROR MESSAGE
    ================================================== -->

    @if($errors->any())

        <div
            class="
                alert
                alert-danger
                custom-alert
            "
        >

            <strong>

                Please check the following:

            </strong>


            <ul
                class="
                    mb-0
                    mt-2
                "
            >

                @foreach(
                    $errors->all()
                    as $error
                )

                    <li>

                        {{ $error }}

                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <!-- =================================================
         PERSONAL INFORMATION
    ================================================== -->

    <div class="account-card">


        <!-- CARD HEADER -->

        <div class="card-heading">


            <div class="card-heading-icon">

                <i
                    class="bi bi-person-vcard"
                ></i>

            </div>


            <div>

                <h3>

                    Personal Information

                </h3>


                <p>

                    Keep your account information up to date.

                </p>

            </div>


        </div>



        <!-- PROFILE -->

        <div class="profile-section">


            @if($user->profile_picture)

                <img
                    src="{{ asset(
                        'storage/' .
                        $user->profile_picture
                    ) }}"
                    alt="Profile Picture"
                    class="account-profile-image"
                >

            @else

                <div
                    class="
                        account-profile-placeholder
                    "
                >

                    <i
                        class="
                            bi
                            bi-person-fill
                        "
                    ></i>

                </div>

            @endif


            <div class="profile-details">


                <h4>

                    {{ $user->name }}

                </h4>


                <p>

                    {{ $user->email }}

                </p>


                <span class="role-badge">

                    <i
                        class="
                            bi
                            bi-person-check-fill
                        "
                    ></i>

                    {{ ucfirst($user->role) }}

                </span>


            </div>


        </div>



        <!-- UPDATE FORM -->

        <form
            action="{{ route('account.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            <div class="row g-3">


                <!-- NAME -->

                <div class="col-md-6">

                    <label
                        class="form-label"
                    >

                        Full Name

                    </label>


                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{
                            old(
                                'name',
                                $user->name
                            )
                        }}"
                        required
                    >

                </div>



                <!-- EMAIL -->

                <div class="col-md-6">

                    <label
                        class="form-label"
                    >

                        Email Address

                    </label>


                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{
                            old(
                                'email',
                                $user->email
                            )
                        }}"
                        required
                    >

                </div>



                <!-- AGE -->

                <div class="col-md-4">

                    <label
                        class="form-label"
                    >

                        Age

                    </label>


                    <input
                        type="number"
                        name="age"
                        class="form-control"
                        value="{{
                            old(
                                'age',
                                $user->age
                            )
                        }}"
                        min="1"
                        max="120"
                        placeholder="Enter your age"
                    >

                </div>



                <!-- BIRTHDATE -->

                <div class="col-md-4">

                    <label
                        class="form-label"
                    >

                        Birthdate

                    </label>


                    <input
                        type="date"
                        name="birthdate"
                        class="form-control"
                        value="{{
                            old(
                                'birthdate',
                                $user->birthdate
                            )
                        }}"
                    >

                </div>



                <!-- PHONE -->

                <div class="col-md-4">

                    <label
                        class="form-label"
                    >

                        Phone Number

                    </label>


                    <input
                        type="text"
                        name="phone_number"
                        class="form-control"
                        value="{{
                            old(
                                'phone_number',
                                $user->phone_number
                            )
                        }}"
                        placeholder="Enter phone number"
                    >

                </div>



                <!-- ADDRESS -->

                <div class="col-12">

                    <label
                        class="form-label"
                    >

                        Address

                    </label>


                    <textarea
                        name="address"
                        class="form-control"
                        placeholder="Enter your complete address"
                    >{{ old(
                        'address',
                        $user->address
                    ) }}</textarea>

                </div>



                <!-- PROFILE PICTURE -->

                <div class="col-12">

                    <label
                        class="form-label"
                    >

                        Profile Picture

                    </label>


                    <input
                        type="file"
                        name="profile_picture"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >


                    <div
                        class="form-text"
                    >

                        JPG, JPEG, PNG, or WEBP.
                        Maximum file size: 2MB.

                    </div>

                </div>


            </div>



            <!-- SAVE -->

            <div class="mt-4">

                <button
                    type="submit"
                    class="save-btn"
                >

                    <i
                        class="
                            bi
                            bi-check2-circle
                            me-1
                        "
                    ></i>

                    Save Changes

                </button>

            </div>


        </form>

    </div>



    <!-- =================================================
         CHANGE PASSWORD
    ================================================== -->

    <div class="account-card">


        <!-- HEADER -->

        <div class="card-heading">


            <div class="card-heading-icon">

                <i
                    class="bi bi-lock"
                ></i>

            </div>


            <div>

                <h3>

                    Change Password

                </h3>


                <p>

                    Update your password to keep your account secure.

                </p>

            </div>


        </div>



        <!-- PASSWORD FORM -->

        <form
            action="{{ route('account.password') }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="row g-3">


                <!-- CURRENT PASSWORD -->

                <div class="col-md-4">

                    <label
                        class="form-label"
                    >

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

                    <label
                        class="form-label"
                    >

                        New Password

                    </label>


                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >

                </div>



                <!-- CONFIRM -->

                <div class="col-md-4">

                    <label
                        class="form-label"
                    >

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



            <!-- PASSWORD BUTTON -->

            <div class="mt-4">

                <button
                    type="submit"
                    class="password-btn"
                >

                    <i
                        class="
                            bi
                            bi-shield-lock
                            me-1
                        "
                    ></i>

                    Update Password

                </button>

            </div>


        </form>

    </div>


</div>

@endsection