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
            height: 100%;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(25, 151, 215, 0.12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(8, 107, 164, 0.10),
                    transparent 30%
                ),
                #eef5f9;

            display: flex;
            align-items: center;
            justify-content: center;

            min-height: 100vh;

            overflow: hidden;

            color: #172033;
        }


        /* =====================================================
           MAIN LOGIN CONTAINER
        ===================================================== */

        .login-wrapper {

            width: min(1120px, calc(100% - 60px));

            height: min(650px, calc(100vh - 60px));

            min-height: 570px;

            display: grid;

            grid-template-columns: 57% 43%;

            background: white;

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(8, 70, 110, 0.16),
                0 8px 25px rgba(0, 0, 0, 0.05);

            position: relative;
        }


        /* =====================================================
           LEFT BLUE BANNER
        ===================================================== */

        .banner {

            position: relative;

            overflow: hidden;

            padding: 34px 40px 30px;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #064e75 0%,
                    #075f8e 42%,
                    #087bb9 100%
                );

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            min-width: 0;
        }


        /* decorative circles */

        .banner::before {

            content: "";

            position: absolute;

            width: 330px;
            height: 330px;

            border-radius: 50%;

            right: -150px;
            top: -155px;

            background: rgba(255,255,255,0.07);
        }


        .banner::after {

            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            left: -145px;
            bottom: -150px;

            background: rgba(255,255,255,0.055);
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

            background: rgba(255,255,255,0.15);

            border: 1px solid rgba(255,255,255,0.18);

            font-size: 23px;

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.15);
        }


        .brand-text h2 {

            font-size: 17px;

            letter-spacing: 0.8px;

            margin-bottom: 3px;
        }


        .brand-text p {

            font-size: 11px;

            color: #c9e8f8;

            line-height: 1.4;
        }


        /* =====================================================
           HERO CONTENT
        ===================================================== */

        .banner-content {

            position: relative;

            z-index: 2;

            margin-top: 5px;
        }


        .small-label {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 6px 11px;

            margin-bottom: 13px;

            border-radius: 30px;

            background: rgba(255,255,255,0.11);

            border: 1px solid rgba(255,255,255,0.13);

            color: #d8f2ff;

            font-size: 10px;

            font-weight: 600;

            letter-spacing: 0.8px;

            text-transform: uppercase;
        }


        .status-dot {

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #8ee8b1;

            box-shadow: 0 0 8px rgba(142,232,177,0.8);
        }


        .banner-content h1 {

            max-width: 500px;

            font-size: 34px;

            line-height: 1.12;

            letter-spacing: -0.8px;

            margin-bottom: 10px;
        }


        .banner-content h1 span {

            color: #9edfff;
        }


        .banner-content > p {

            max-width: 500px;

            color: #d4edf9;

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
                    rgba(255,255,255,0.025),
                    rgba(255,255,255,0.025)
                ),
                rgba(2, 52, 78, 0.35);

            border: 1px solid rgba(255,255,255,0.12);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.06);
        }


        /* grid */

        .map-grid {

            position: absolute;

            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255,255,255,0.055) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255,255,255,0.055) 1px,
                    transparent 1px
                );

            background-size: 27px 27px;
        }


        /* map lines */

        .map-line {

            position: absolute;

            height: 2px;

            background: rgba(141, 218, 249, 0.35);

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


        /* map points */

        .map-point {

            position: absolute;

            width: 10px;
            height: 10px;

            border-radius: 50%;

            background: #fff;

            border: 3px solid #45c8f5;

            box-shadow:
                0 0 0 5px rgba(69,200,245,0.13),
                0 0 15px rgba(69,200,245,0.65);
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

            background: rgba(0,0,0,0.20);

            color: #bfeaff;

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

            background: rgba(255,255,255,0.08);

            border: 1px solid rgba(255,255,255,0.09);
        }


        .mini-stat strong {

            display: block;

            font-size: 14px;

            margin-bottom: 2px;
        }


        .mini-stat span {

            color: #bfe4f5;

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

            border-top: 1px solid rgba(255,255,255,0.13);

            color: #bfe1ef;

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

            background: #79e3a2;

            box-shadow: 0 0 8px rgba(121,227,162,0.7);
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

            background: #eaf6fc;

            color: #0873a9;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 0.8px;

            text-transform: uppercase;

            margin-bottom: 14px;
        }


        .login-content h2 {

            font-size: 28px;

            color: #172033;

            margin-bottom: 7px;

            letter-spacing: -0.4px;
        }


        .login-description {

            color: #7b8798;

            font-size: 12px;

            line-height: 1.6;

            margin-bottom: 25px;
        }


        /* ERROR */

        .error {

            padding: 10px 12px;

            margin-bottom: 17px;

            border-radius: 8px;

            background: #fff1f2;

            border: 1px solid #fecdd3;

            color: #be123c;

            font-size: 11px;
        }


        /* FORM */

        .form-group {

            margin-bottom: 17px;
        }


        .form-group label {

            display: block;

            margin-bottom: 7px;

            color: #334155;

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

            color: #94a3b8;

            font-size: 14px;

            pointer-events: none;
        }


        .form-group input {

            width: 100%;

            height: 46px;

            padding: 0 42px;

            border: 1px solid #d9e3eb;

            border-radius: 9px;

            background: #fbfdff;

            color: #1e293b;

            font-family: inherit;

            font-size: 12px;

            outline: none;

            transition: 0.2s;
        }


        .form-group input::placeholder {

            color: #a8b4c2;
        }


        .form-group input:focus {

            border-color: #1594cf;

            background: white;

            box-shadow:
                0 0 0 3px rgba(21,148,207,0.10);
        }


        .password-toggle {

            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #94a3b8;

            cursor: pointer;

            font-size: 13px;

            padding: 5px;
        }


        .password-toggle:hover {

            color: #0873a9;
        }


        /* LOGIN BUTTON */

        .login-button {

            width: 100%;

            height: 47px;

            margin-top: 5px;

            border: none;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #086c9f,
                    #1598d3
                );

            color: white;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 8px 18px rgba(8,108,159,0.20);

            transition: 0.2s;
        }


        .login-button:hover {

            transform: translateY(-1px);

            box-shadow:
                0 10px 22px rgba(8,108,159,0.27);
        }


        .login-button:active {

            transform: translateY(0);
        }


        .login-note {

            margin-top: 18px;

            text-align: center;

            color: #a0acb9;

            font-size: 10px;

            line-height: 1.5;
        }


        .login-divider {

            display: flex;

            align-items: center;

            gap: 10px;

            margin: 20px 0 15px;

            color: #c0c9d2;

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 0.7px;
        }


        .login-divider::before,
        .login-divider::after {

            content: "";

            flex: 1;

            height: 1px;

            background: #e8edf2;
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

                height: auto;

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