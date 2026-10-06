<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Data Tagging BPS</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;

            background:
                radial-gradient(
                    circle at 10% 15%,
                    rgba(239, 182, 200, 0.22),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 85%,
                    rgba(216, 143, 168, 0.16),
                    transparent 32%
                ),
                #fff7fa;

            display: flex;
            align-items: center;
            justify-content: center;

            min-height: 100vh;

            padding: 30px;

            color: #3f2932;
        }


        /* =====================================================
           MAIN LOGIN CONTAINER
        ===================================================== */

        .login-wrapper {

            width: min(1120px, 100%);

            min-height: 650px;

            display: grid;

            grid-template-columns: 57% 43%;

            background: #ffffff;

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(139, 74, 96, 0.14),
                0 8px 25px rgba(0, 0, 0, 0.05);

            position: relative;
        }


        /* =====================================================
           LEFT BANNER
        ===================================================== */

        .banner {

            position: relative;

            overflow: hidden;

            padding: 36px 40px 30px;

            color: white;

            background:
                linear-gradient(
                    145deg,
                    #c97894 0%,
                    #d98fa8 45%,
                    #e5a5bb 100%
                );

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            min-width: 0;
        }


        .banner::before {

            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            right: -165px;
            top: -175px;

            background: rgba(255,255,255,0.10);
        }


        .banner::after {

            content: "";

            position: absolute;

            width: 290px;
            height: 290px;

            border-radius: 50%;

            left: -165px;
            bottom: -170px;

            background: rgba(255,255,255,0.07);
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            gap: 13px;
        }


        .brand-icon {

            width: 48px;
            height: 48px;

            flex-shrink: 0;

            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,0.18);

            border: 1px solid rgba(255,255,255,0.24);

            font-size: 23px;

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.18);
        }


        .brand-text h2 {

            font-size: 17px;

            letter-spacing: 0.8px;

            margin-bottom: 3px;
        }


        .brand-text p {

            font-size: 11px;

            color: #fff0f5;

            line-height: 1.4;
        }


        /* =====================================================
           HERO CONTENT
        ===================================================== */

        .banner-content {

            position: relative;

            z-index: 2;

            margin-top: 8px;
        }


        .small-label {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 6px 11px;

            margin-bottom: 13px;

            border-radius: 30px;

            background: rgba(255,255,255,0.13);

            border: 1px solid rgba(255,255,255,0.16);

            color: #fff4f7;

            font-size: 10px;

            font-weight: 600;

            letter-spacing: 0.8px;

            text-transform: uppercase;
        }


        .status-dot {

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #b9f2ca;

            box-shadow:
                0 0 8px rgba(185,242,202,0.8);
        }


        .banner-content h1 {

            max-width: 500px;

            font-size: 34px;

            line-height: 1.12;

            letter-spacing: -0.8px;

            margin-bottom: 10px;
        }


        .banner-content h1 span {

            color: #fff0f5;
        }


        .banner-content > p {

            max-width: 500px;

            color: #fff0f5;

            font-size: 13px;

            line-height: 1.65;
        }


        /* =====================================================
           MAP VISUAL
        ===================================================== */

        .map-visual {

            position: relative;

            z-index: 2;

            height: 150px;

            margin-top: 17px;

            border-radius: 15px;

            overflow: hidden;

            background:
                linear-gradient(
                    rgba(105, 45, 65, 0.18),
                    rgba(105, 45, 65, 0.18)
                ),
                rgba(113, 54, 75, 0.22);

            border: 1px solid rgba(255,255,255,0.18);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.08);
        }


        .map-grid {

            position: absolute;

            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255,255,255,0.075) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255,255,255,0.075) 1px,
                    transparent 1px
                );

            background-size: 27px 27px;
        }


        .map-line {

            position: absolute;

            height: 2px;

            background: rgba(255,240,246,0.42);

            transform-origin: left center;

            border-radius: 20px;
        }


        .line-one {

            width: 190px;

            left: 5%;
            top: 68%;

            transform: rotate(-18deg);
        }


        .line-two {

            width: 230px;

            left: 28%;
            top: 47%;

            transform: rotate(14deg);
        }


        .line-three {

            width: 170px;

            left: 56%;
            top: 66%;

            transform: rotate(-23deg);
        }


        .line-four {

            width: 130px;

            left: 45%;
            top: 30%;

            transform: rotate(31deg);
        }


        .map-point {

            position: absolute;

            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: #ffffff;

            border: 3px solid #f8d5e1;

            box-shadow:
                0 0 0 5px rgba(248,213,225,0.13),
                0 0 15px rgba(255,225,236,0.60);
        }


        .point-one {
            left: 18%;
            top: 56%;
        }

        .point-two {
            left: 39%;
            top: 35%;
        }

        .point-three {
            left: 58%;
            top: 58%;
        }

        .point-four {
            left: 75%;
            top: 34%;
        }

        .point-five {
            left: 83%;
            top: 70%;
        }


        .map-label {

            position: absolute;

            right: 14px;
            bottom: 11px;

            padding: 5px 9px;

            border-radius: 6px;

            background: rgba(87, 34, 53, 0.28);

            color: #ffe8f0;

            font-size: 9px;

            letter-spacing: 1px;

            font-weight: 600;
        }


        /* =====================================================
           MINI STATISTICS
        ===================================================== */

        .mini-stats {

            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 9px;

            margin-top: 13px;
        }


        .mini-stat {

            padding: 10px 11px;

            border-radius: 10px;

            background: rgba(255,255,255,0.11);

            border: 1px solid rgba(255,255,255,0.12);
        }


        .mini-stat strong {

            display: block;

            font-size: 14px;

            margin-bottom: 2px;
        }


        .mini-stat span {

            color: #ffe7ef;

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 0.7px;
        }


        /* =====================================================
           BANNER FOOTER
        ===================================================== */

        .banner-footer {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding-top: 15px;

            margin-top: 14px;

            border-top: 1px solid rgba(255,255,255,0.18);

            color: #ffe6ee;

            font-size: 10px;
        }


        .active-status {

            display: flex;

            align-items: center;

            gap: 7px;
        }


        .active-status::before {

            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #b9f2ca;

            box-shadow:
                0 0 8px rgba(185,242,202,0.7);
        }


        /* =====================================================
           RIGHT LOGIN PANEL
        ===================================================== */

        .login-panel {

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 48px;

            background: #ffffff;

            min-width: 0;
        }


        .login-content {

            width: 100%;

            max-width: 350px;
        }


        .login-tag {

            display: inline-block;

            padding: 6px 10px;

            border-radius: 7px;

            background: #fff0f4;

            color: #b95d7c;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 0.8px;

            text-transform: uppercase;

            margin-bottom: 14px;
        }


        .login-content h2 {

            font-size: 28px;

            color: #402b34;

            margin-bottom: 7px;

            letter-spacing: -0.4px;
        }


        .login-description {

            color: #8a7880;

            font-size: 12px;

            line-height: 1.6;

            margin-bottom: 25px;
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error {

            padding: 10px 12px;

            margin-bottom: 17px;

            border-radius: 8px;

            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            font-size: 11px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {

            margin-bottom: 17px;
        }


        .form-group label {

            display: block;

            margin-bottom: 7px;

            color: #55424a;

            font-size: 12px;

            font-weight: 600;
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #b38d9c;

            font-size: 14px;

            pointer-events: none;
        }


        .form-group input {

            width: 100%;

            height: 46px;

            padding: 0 42px;

            border: 1px solid #ead9df;

            border-radius: 9px;

            background: #fffafb;

            color: #43333a;

            font-family: inherit;

            font-size: 12px;

            outline: none;

            transition: 0.2s;
        }


        .form-group input::placeholder {

            color: #b8a8af;
        }


        .form-group input:focus {

            border-color: #d98fa8;

            background: white;

            box-shadow:
                0 0 0 3px rgba(217,143,168,0.12);
        }


        .password-toggle {

            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #b38d9c;

            cursor: pointer;

            font-size: 13px;

            padding: 5px;
        }


        .password-toggle:hover {

            color: #b95d7c;
        }


        /* =====================================================
           LOGIN BUTTON
        ===================================================== */

        .login-button {

            width: 100%;

            height: 47px;

            margin-top: 5px;

            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #c97894,
                    #d98fa8
                );

            color: white;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 18px rgba(201,120,148,0.22);

            transition: 0.2s;
        }


        .login-button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 10px 22px rgba(201,120,148,0.30);
        }


        .login-button:active {

            transform: translateY(0);
        }


        /* =====================================================
           LOGIN FOOTER
        ===================================================== */

        .login-note {

            margin-top: 18px;

            text-align: center;

            color: #a8959e;

            font-size: 10px;

            line-height: 1.5;
        }


        .login-divider {

            display: flex;

            align-items: center;

            gap: 10px;

            margin: 20px 0 15px;

            color: #c1afb7;

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 0.7px;
        }


        .login-divider::before,
        .login-divider::after {

            content: "";

            flex: 1;

            height: 1px;

            background: #eee3e7;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            body {
                overflow: auto;
                padding: 25px 0;
            }

            .login-wrapper {

                width: min(650px, calc(100% - 35px));

                min-height: 0;

                grid-template-columns: 1fr;
            }

            .banner {

                min-height: 500px;
            }

            .login-panel {

                min-height: 500px;
            }
        }


        @media (max-width: 560px) {

            body {
                padding: 15px 0;
            }

            .login-wrapper {

                width: calc(100% - 24px);

                border-radius: 18px;
            }

            .banner {

                padding: 27px 24px 23px;

                min-height: 470px;
            }

            .banner-content h1 {

                font-size: 27px;
            }

            .map-visual {

                height: 125px;
            }

            .login-panel {

                padding: 35px 25px;
            }

            .mini-stats {

                gap: 6px;
            }

            .banner-footer {

                flex-direction: column;

                align-items: flex-start;

                gap: 7px;
            }
        }

    </style>

</head>


<body>


<div class="login-wrapper">


    <!-- =====================================================
         BANNER
    ====================================================== -->

    <section class="banner">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-icon">
                📊
            </div>

            <div class="brand-text">

                <h2>
                    DATA TAGGING BPS
                </h2>

                <p>
                    Sistem Pengelolaan Data Tagging
                </p>

            </div>

        </div>


        <!-- CONTENT -->

        <div class="banner-content">


            <div class="small-label">

                <span class="status-dot"></span>

                SISTEM DATA AKTIF

            </div>


            <h1>

                Kelola Data.
                <span>
                    Pahami Wilayah.
                </span>

            </h1>


            <p>

                Sistem pengelolaan data tagging untuk membantu
                proses pengolahan, pencarian, dan visualisasi
                data secara terstruktur.

            </p>


            <!-- MAP -->

            <div class="map-visual">

                <div class="map-grid"></div>

                <div class="map-line line-one"></div>
                <div class="map-line line-two"></div>
                <div class="map-line line-three"></div>
                <div class="map-line line-four"></div>

                <div class="map-point point-one"></div>
                <div class="map-point point-two"></div>
                <div class="map-point point-three"></div>
                <div class="map-point point-four"></div>
                <div class="map-point point-five"></div>

                <div class="map-label">
                    VISUALISASI DATA TAGGING
                </div>

            </div>


            <!-- STATISTICS -->

            <div class="mini-stats">

                <div class="mini-stat">

                    <strong>CSV</strong>

                    <span>
                        Import Data
                    </span>

                </div>


                <div class="mini-stat">

                    <strong>MAP</strong>

                    <span>
                        Visualisasi
                    </span>

                </div>


                <div class="mini-stat">

                    <strong>CRUD</strong>

                    <span>
                        Kelola Data
                    </span>

                </div>

            </div>


        </div>


        <!-- FOOTER -->

        <div class="banner-footer">

            <div class="active-status">
                Sistem Aktif
            </div>

            <span>
                BPS Provinsi Sumatera Selatan
            </span>

        </div>


    </section>



    <!-- =====================================================
         LOGIN
    ====================================================== -->

    <section class="login-panel">


        <div class="login-content">


            <div class="login-tag">
                AKSES SISTEM
            </div>


            <h2>
                Selamat Datang
            </h2>


            <p class="login-description">

                Silakan masuk menggunakan akun yang telah
                terdaftar untuk mengakses sistem data tagging.

            </p>


            @if ($errors->any())

                <div class="error">

                    {{ $errors->first() }}

                </div>

            @endif


            <form
                action="{{ route('login.process') }}"
                method="POST"
            >

                @csrf


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            👤
                        </span>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            autocomplete="username"
                            required
                        >

                    </div>

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <span class="input-icon">
                            🔒
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            👁
                        </button>

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="login-button"
                >
                    Masuk ke Sistem
                </button>


            </form>


            <div class="login-divider">
                DATA TAGGING
            </div>


            <p class="login-note">

                Akses sistem sesuai dengan hak pengguna
                yang telah ditentukan.

            </p>


        </div>


    </section>


</div>


<script>

    const passwordInput =
        document.getElementById("password");

    const togglePassword =
        document.getElementById("togglePassword");


    togglePassword.addEventListener("click", function () {

        if (passwordInput.type === "password") {

            passwordInput.type = "text";

            togglePassword.textContent = "🙈";

            togglePassword.setAttribute(
                "aria-label",
                "Sembunyikan password"
            );

        } else {

            passwordInput.type = "password";

            togglePassword.textContent = "👁";

            togglePassword.setAttribute(
                "aria-label",
                "Tampilkan password"
            );

        }

    });

</script>


</body>

</html>