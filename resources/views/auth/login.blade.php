<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PureDrop Water Station</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --blue: #087eae;
            --dark-blue: #075985;
            --cyan: #20c4df;
            --light-blue: #e8faff;
            --text: #153e54;
        }

        * {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: #f2fbff;
            overflow-x: hidden;
        }

        /* ANIMATED BACKGROUND */
        .background-effects {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            background:
                radial-gradient(circle at 10% 20%, rgba(32,196,223,.16), transparent 25%),
                radial-gradient(circle at 90% 70%, rgba(8,126,174,.13), transparent 30%),
                linear-gradient(135deg, #f4fcff, #e5f8ff);
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            border: 1px solid rgba(255,255,255,.8);
            background: rgba(255,255,255,.25);
            border-radius: 50%;
            box-shadow: inset 0 0 12px rgba(255,255,255,.7);
            animation: rise linear infinite;
        }

        .bubble:nth-child(1) { left: 8%; width: 25px; height: 25px; animation-duration: 17s; }
        .bubble:nth-child(2) { left: 20%; width: 13px; height: 13px; animation-duration: 12s; animation-delay: 2s; }
        .bubble:nth-child(3) { left: 38%; width: 35px; height: 35px; animation-duration: 20s; animation-delay: 4s; }
        .bubble:nth-child(4) { left: 56%; width: 18px; height: 18px; animation-duration: 14s; animation-delay: 1s; }
        .bubble:nth-child(5) { left: 72%; width: 30px; height: 30px; animation-duration: 19s; animation-delay: 3s; }
        .bubble:nth-child(6) { left: 88%; width: 16px; height: 16px; animation-duration: 13s; animation-delay: 5s; }

        @keyframes rise {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% { opacity: .8; }
            50% { transform: translateY(-55vh) translateX(25px); }
            100% {
                transform: translateY(-115vh) translateX(-20px);
                opacity: 0;
            }
        }

        .glow-orb {
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            filter: blur(2px);
            opacity: .4;
            animation: floatOrb 9s ease-in-out infinite alternate;
        }

        .orb-one {
            top: 12%;
            right: -100px;
            background: radial-gradient(circle, #8cecff, transparent 70%);
        }

        .orb-two {
            bottom: 5%;
            left: -100px;
            background: radial-gradient(circle, #8bdcf3, transparent 70%);
            animation-delay: 2s;
        }

        @keyframes floatOrb {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(-35px, 30px) scale(1.15); }
        }

        /* NAVBAR */
        .navbar {
            padding: 10px 6%;
            background: rgba(255,255,255,.82);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,.8);
            box-shadow: 0 5px 25px rgba(8,126,174,.06);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--dark-blue);
            font-size: 17px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            color: white;
            background: linear-gradient(135deg, #32d6e9, #087eae);
            box-shadow: 0 5px 12px rgba(8,126,174,.2);
            font-size: 20px;
        }

        .navbar-nav {
            gap: 5px;
        }

        .navbar .nav-link {
            color: #557687;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 11px !important;
            transition: .2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--blue);
        }

        .nav-login,
        .nav-register {
            border-radius: 25px;
            padding: 7px 17px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .nav-login {
            border: 1px solid var(--blue);
            color: var(--blue);
            background: white;
        }

        .nav-login:hover {
            color: white;
            background: var(--blue);
        }

        .nav-register {
            border: none;
            color: white;
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            box-shadow: 0 5px 13px rgba(8,126,174,.17);
        }

        .nav-register:hover {
            color: white;
            transform: translateY(-2px);
        }

        /* BUTTONS */
        .btn-blue {
            color: white;
            background: linear-gradient(135deg, #28c9e3, #087eae);
            border: none;
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(8,126,174,.2);
            transition: .25s;
        }

        .btn-blue:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(8,126,174,.3);
        }

        .btn-outline-blue {
            color: var(--blue);
            background: rgba(255,255,255,.75);
            border: 1px solid var(--blue);
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 700;
            transition: .25s;
        }

        .btn-outline-blue:hover {
            color: white;
            background: var(--blue);
            transform: translateY(-3px);
        }

        /* HERO */
        .hero {
            min-height: 620px;
            display: flex;
            align-items: center;
            padding: 65px 7%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(115,225,245,.12);
            top: -230px;
            left: -180px;
        }

        .hero-content {
            max-width: 590px;
            position: relative;
            z-index: 2;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border-radius: 30px;
            color: var(--dark-blue);
            background: rgba(255,255,255,.75);
            border: 1px solid rgba(32,196,223,.25);
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 20px;
            box-shadow: 0 5px 18px rgba(8,126,174,.06);
        }

        .hero-label i {
            color: #12b8d5;
        }

        .hero h1 {
            color: #123e56;
            font-size: clamp(40px, 5.5vw, 68px);
            font-weight: 800;
            line-height: 1.08;
            margin-bottom: 20px;
            letter-spacing: -1.5px;
        }

        .hero h1 span {
            color: #079ac1;
            display: inline-block;
        }

        .hero p {
            max-width: 510px;
            color: #607d8b;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .hero-visual {
            min-height: 430px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .water-circle {
            width: 310px;
            height: 310px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(145deg, rgba(255,255,255,.8), rgba(137,231,246,.65));
            border: 1px solid rgba(255,255,255,.9);
            box-shadow: 0 25px 70px rgba(8,126,174,.14), inset 0 0 30px rgba(255,255,255,.7);
            position: relative;
            animation: gentleFloat 5s ease-in-out infinite;
        }

        .water-circle::before,
        .water-circle::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(8,126,174,.17);
            border-radius: 50%;
            animation: pulseRing 4s ease-in-out infinite;
        }

        .water-circle::before {
            width: 370px;
            height: 370px;
        }

        .water-circle::after {
            width: 430px;
            height: 430px;
            animation-delay: 1s;
        }

        @keyframes pulseRing {
            0%, 100% { transform: scale(1); opacity: .65; }
            50% { transform: scale(1.04); opacity: .2; }
        }

        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-13px); }
        }

        .water-symbol {
            width: 165px;
            height: 165px;
            border-radius: 55% 45% 60% 40%;
            transform: rotate(45deg);
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(145deg, #48d4e8, #087eae);
            box-shadow: 0 20px 40px rgba(8,126,174,.3);
            animation: dropMove 6s ease-in-out infinite;
        }

        .water-symbol i {
            color: white;
            font-size: 75px;
            transform: rotate(-45deg);
            filter: drop-shadow(0 4px 5px rgba(0,0,0,.1));
        }

        @keyframes dropMove {
            0%, 100% { transform: rotate(45deg) scale(1); }
            50% { transform: rotate(50deg) scale(1.04); }
        }

        .floating-card {
            position: absolute;
            background: rgba(255,255,255,.85);
            backdrop-filter: blur(10px);
            padding: 13px 17px;
            border: 1px solid white;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(20,90,120,.12);
            font-size: 13px;
            font-weight: 700;
            animation: cardFloat 4s ease-in-out infinite;
        }

        .floating-card i {
            color: var(--blue);
            font-size: 20px;
            margin-right: 6px;
        }

        .card-one {
            top: 12%;
            right: 0;
        }

        .card-two {
            bottom: 12%;
            left: 0;
            animation-delay: 1s;
        }

        @keyframes cardFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-9px); }
        }

        /* WAVE DIVIDER */
        .wave-divider {
            width: 100%;
            height: 75px;
            overflow: hidden;
            margin-top: -1px;
        }

        .wave-divider svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .wave-motion {
            animation: waveMove 9s ease-in-out infinite alternate;
            transform-origin: center;
        }

        @keyframes waveMove {
            from { transform: translateX(-2%); }
            to { transform: translateX(2%); }
        }

        /* SECTIONS */
        .section-padding {
            padding: 75px 7%;
        }

        .section-label {
            color: var(--blue);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-title {
            color: #123e56;
            font-size: clamp(28px, 4vw, 40px);
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-description {
            color: #718b98;
            font-size: 15px;
            line-height: 1.8;
        }

        /* ABOUT */
        .about-section {
            background: rgba(255,255,255,.75);
            position: relative;
        }

        .about-icon {
            width: 100%;
            min-height: 280px;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dff9ff, #a9eaf5);
            box-shadow: 0 18px 40px rgba(8,126,174,.1);
            position: relative;
            overflow: hidden;
        }

        .about-icon::before,
        .about-icon::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 50%;
        }

        .about-icon::before {
            width: 230px;
            height: 230px;
        }

        .about-icon::after {
            width: 300px;
            height: 300px;
        }

        .about-icon i {
            position: relative;
            z-index: 1;
            font-size: 115px;
            color: var(--blue);
            animation: gentleFloat 4s ease-in-out infinite;
        }

        .about-points {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 17px;
        }

        .about-points i {
            color: var(--blue);
            font-size: 20px;
        }

        .about-points span {
            color: #456879;
            font-size: 14px;
        }

        /* SERVICES */
        .services-section {
            background: linear-gradient(180deg, #eafaff, #f6fcff);
        }

        .service-card {
            height: 100%;
            padding: 28px;
            background: rgba(255,255,255,.85);
            border: 1px solid rgba(255,255,255,.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(20,90,120,.06);
            transition: .3s ease;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(20,90,120,.12);
        }

        .service-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            color: var(--blue);
            background: #e3f8fd;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .service-card h5 {
            color: #17465d;
            font-weight: 700;
            font-size: 17px;
        }

        .service-card p {
            color: #718b98;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* CONTACT */
        .contact-section {
            background: rgba(255,255,255,.85);
        }

        .contact-box {
            height: 100%;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 19px;
            background: white;
            border: 1px solid #e5f2f7;
            border-radius: 17px;
            box-shadow: 0 8px 22px rgba(20,90,120,.04);
            transition: .25s;
        }

        .contact-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(20,90,120,.09);
        }

        .contact-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 14px;
            color: var(--blue);
            background: var(--light-blue);
            font-size: 20px;
        }

        .contact-box h6 {
            font-weight: 700;
            margin-bottom: 4px;
            color: #17465d;
        }

        .contact-box p {
            color: #718b98;
            font-size: 13px;
            margin: 0;
        }

        /* AUTH MODAL */
        .auth-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(7,45,65,.62);
            backdrop-filter: blur(7px);
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-y: auto;
        }

        .auth-overlay.show {
            display: flex;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255,255,255,.97);
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 24px;
            padding: 32px;
            position: relative;
            box-shadow: 0 25px 70px rgba(0,40,65,.3);
            animation: appear .25s ease;
            margin: auto;
        }

        @keyframes appear {
            from { opacity: 0; transform: translateY(15px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .close-auth {
            position: absolute;
            top: 15px;
            right: 16px;
            border: none;
            background: #edf7fa;
            color: #477184;
            width: 34px;
            height: 34px;
            border-radius: 50%;
        }

        .auth-logo {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            background: linear-gradient(135deg, var(--cyan), var(--blue));
            font-size: 27px;
            margin-bottom: 18px;
            box-shadow: 0 8px 18px rgba(8,126,174,.2);
        }

        .auth-card h2 {
            color: #17465d;
            font-weight: 800;
            font-size: 26px;
            margin-bottom: 6px;
        }

        .auth-subtitle {
            color: #78909c;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .form-label {
            color: #31596b;
            font-weight: 600;
            font-size: 13px;
        }

        .form-control {
            border: 1px solid #dcebf0;
            border-radius: 10px;
            padding: 11px 13px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(32,184,213,.13);
        }

        .input-group .form-control {
            border-radius: 10px 0 0 10px;
        }

        .input-group .btn {
            border: 1px solid #dcebf0;
            border-left: 0;
            border-radius: 0 10px 10px 0;
            color: #547889;
        }

        .auth-submit {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            margin-top: 7px;
        }

        .auth-switch {
            text-align: center;
            color: #78909c;
            font-size: 13px;
            margin-top: 20px;
            margin-bottom: 0;
        }

        .auth-switch button {
            border: none;
            background: none;
            color: var(--blue);
            font-weight: 700;
        }

        .auth-switch button:hover {
            text-decoration: underline;
        }

        .alert {
            font-size: 13px;
            border-radius: 10px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .navbar-collapse { padding-top: 12px; }
            .navbar-nav { padding-bottom: 10px; }
            .nav-buttons { display: flex; gap: 8px; padding-bottom: 8px; }
        }

        @media (max-width: 768px) {
            .hero {
                text-align: center;
                padding-top: 45px;
            }

            .hero-content,
            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-visual {
                min-height: 350px;
                margin-top: 25px;
            }

            .water-circle {
                width: 250px;
                height: 250px;
            }

            .water-circle::before {
                width: 300px;
                height: 300px;
            }

            .water-circle::after {
                width: 340px;
                height: 340px;
            }

            .water-symbol {
                width: 135px;
                height: 135px;
            }

            .water-symbol i { font-size: 60px; }

            .card-one { right: 2%; }
            .card-two { left: 2%; }

            .section-padding { padding: 55px 6%; }
        }

        @media (max-width: 420px) {
            .brand { font-size: 15px; }
            .auth-card { padding: 27px 21px; }
        }

        /* REDUCE MOTION FOR USERS WHO PREFER IT */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- MOVING BACKGROUND -->
    <div class="background-effects">
        <div class="glow-orb orb-one"></div>
        <div class="glow-orb orb-two"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>


    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid p-0">

            <a href="#home" class="brand">
                <span class="brand-icon"><i class="bi bi-droplet-fill"></i></span>
                <span>PureDrop Water Station</span>
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                <div class="nav-buttons d-flex align-items-center gap-2">
                    <button type="button" class="btn nav-login" onclick="openAuth('login')">Log In</button>
                    <button type="button" class="btn nav-register" onclick="openAuth('register')">Register</button>
                </div>
            </div>
        </div>
    </nav>


    <!-- HOME -->
    <section class="hero" id="home">
        <div class="container-fluid p-0">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="hero-content">

                        <div class="hero-label">
                            <i class="bi bi-stars"></i>
                            CLEAN WATER, BETTER LIVING
                        </div>

                        <h1>
                            Refresh Your Day With
                            <span>Pure Water.</span>
                        </h1>

                        <p>
                            Welcome to PureDrop Water Station! Your convenient
                            water refilling partner for clean, refreshing, and
                            accessible drinking water.
                        </p>

                        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                            <button type="button" class="btn btn-blue" onclick="openAuth('login')">
                                Get Started <i class="bi bi-arrow-right ms-2"></i>
                            </button>

                            <a href="#about" class="btn btn-outline-blue">
                                Discover More
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual">

                        <div class="water-circle">
                            <div class="water-symbol">
                                <i class="bi bi-droplet-fill"></i>
                            </div>
                        </div>

                        <div class="floating-card card-one">
                            <i class="bi bi-shield-check"></i>
                            Clean & Fresh
                        </div>

                        <div class="floating-card card-two">
                            <i class="bi bi-truck"></i>
                            Convenient Service
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- MOVING WAVE -->
    <div class="wave-divider">
        <svg viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path class="wave-motion"
                  d="M0,35 C180,90 330,0 520,35 C720,75 850,15 1040,40 C1220,65 1320,20 1440,35 L1440,100 L0,100 Z"
                  fill="#ffffff"/>
        </svg>
    </div>


    <!-- ABOUT US -->
    <section class="about-section section-padding" id="about">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-5">

                <div class="col-lg-5">
                    <div class="about-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="section-label">About Us</div>

                    <h2 class="section-title">
                        Your Everyday Partner for Refreshing Water
                    </h2>

                    <p class="section-description">
                        PureDrop Water Station is a water refilling service
                        designed to make ordering and managing water products
                        more convenient for our customers.
                    </p>

                    <p class="section-description">
                        Through our online system, customers can view available
                        products, place orders, and monitor their order status.
                        Our goal is to provide a simple and convenient way to
                        access our water refilling services.
                    </p>

                    <div class="about-points">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Convenient online ordering</span>
                    </div>

                    <div class="about-points">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Easy access to product information</span>
                    </div>

                    <div class="about-points">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Order status monitoring</span>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- SERVICES -->
    <section class="services-section section-padding" id="services">
        <div class="container-fluid p-0">

            <div class="text-center mb-5">
                <div class="section-label">What We Offer</div>
                <h2 class="section-title">Our Services</h2>
                <p class="section-description">
                    Simple and convenient features for your water refilling needs.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-basket2"></i></div>
                        <h5>Water Product Ordering</h5>
                        <p>
                            Browse available water products and place your order
                            through your customer account.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-clipboard-check"></i></div>
                        <h5>Order Management</h5>
                        <p>
                            View your orders and check their current status
                            through the online system.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-truck"></i></div>
                        <h5>Delivery Updates</h5>
                        <p>
                            Stay informed about the progress of your water
                            orders and delivery status.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CONTACT -->
    <section class="contact-section section-padding" id="contact">
        <div class="container-fluid p-0">

            <div class="text-center mb-5">
                <div class="section-label">Get In Touch</div>
                <h2 class="section-title">Contact Us</h2>
                <p class="section-description">
                    Have questions about our services? You may reach us through
                    the contact details below.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-md-4">
                    <div class="contact-box">
                        <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div>
                            <h6>Our Location</h6>
                            <p>Brgy. Eastern Hilongos, Leyte</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box">
                        <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div>
                            <h6>Phone Number</h6>
                            <p>09759089698</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-box">
                        <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div>
                            <h6>Email Address</h6>
                            <p>puredrop@gmail.com</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-5">
                <button type="button" class="btn btn-blue" onclick="openAuth('register')">
                    Create Your Account <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </div>

        </div>
    </section>


    <!-- LOGIN / REGISTER OVERLAY -->
    <div class="auth-overlay" id="authOverlay" onclick="closeOnOutside(event)">

        <!-- LOGIN CARD -->
        <div class="auth-card" id="loginCard" role="dialog" aria-modal="true" aria-labelledby="loginTitle">

            <button type="button" class="close-auth" onclick="closeAuth()" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="auth-logo"><i class="bi bi-droplet-fill"></i></div>

            <h2 id="loginTitle">Welcome Back!</h2>
            <p class="auth-subtitle">Log in to continue to your account.</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="loginEmail"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autocomplete="email"
                    >
                </div>

                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>

                    <div class="input-group">
                        <input
                            type="password"
                            class="form-control"
                            id="loginPassword"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >

                        <button class="btn" type="button" onclick="togglePassword('loginPassword', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-blue auth-submit">
                    Log In <i class="bi bi-box-arrow-in-right ms-1"></i>
                </button>
            </form>

            <p class="auth-switch">
                Don't have an account?
                <button type="button" onclick="switchAuth('register')">Register here</button>
            </p>
        </div>


        <!-- REGISTER CARD -->
        <div class="auth-card" id="registerCard" role="dialog" aria-modal="true" aria-labelledby="registerTitle" style="display: none;">

            <button type="button" class="close-auth" onclick="closeAuth()" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="auth-logo"><i class="bi bi-person-plus-fill"></i></div>

            <h2 id="registerTitle">Create Account</h2>
            <p class="auth-subtitle">Register to start using our water station system.</p>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <div class="mb-3">
                    <label for="registerName" class="form-label">Full Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="registerName"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                        autocomplete="name"
                    >
                </div>

                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="registerEmail"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autocomplete="email"
                    >
                </div>

                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <input
                            type="password"
                            class="form-control"
                            id="registerPassword"
                            name="password"
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                        >
                        <button class="btn" type="button" onclick="togglePassword('registerPassword', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <!-- Role is set to customer in the registration controller. -->

                <button type="submit" class="btn btn-blue auth-submit">
                    Create Account <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </form>

            <p class="auth-switch">
                Already have an account?
                <button type="button" onclick="switchAuth('login')">Log in here</button>
            </p>
        </div>

    </div>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const authOverlay = document.getElementById('authOverlay');
        const loginCard = document.getElementById('loginCard');
        const registerCard = document.getElementById('registerCard');

        function openAuth(type) {
            authOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';

            if (type === 'register') {
                loginCard.style.display = 'none';
                registerCard.style.display = 'block';
            } else {
                registerCard.style.display = 'none';
                loginCard.style.display = 'block';
            }
        }

        function switchAuth(type) {
            openAuth(type);
        }

        function closeAuth() {
            authOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        function closeOnOutside(event) {
            if (event.target === authOverlay) {
                closeAuth();
            }
        }

        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeAuth();
            }
        });

        document.querySelectorAll('.navbar .nav-link').forEach(function(link) {
            link.addEventListener('click', function() {
                const navbar = document.getElementById('mainNavbar');
                const bsCollapse = bootstrap.Collapse.getInstance(navbar);

                if (bsCollapse) {
                    bsCollapse.hide();
                }
            });
        });

        @if ($errors->any() || session('error'))
            openAuth('login');
        @endif
    </script>

</body>
</html>