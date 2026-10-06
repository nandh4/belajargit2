<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Tambah Data - Data Tagging BPS
    </title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                #fbf8fa;

            color:
                #40393d;

        }


        /* =========================================================
           SIDEBAR
           PERSIS SEPERTI DASHBOARD
        ========================================================= */

        .sidebar {

            width: 250px;

            height: 100vh;

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            display: flex;

            flex-direction: column;

            padding: 24px 15px;

            background:
                linear-gradient(
                    180deg,
                    #efb6c8 0%,
                    #e5a5bb 55%,
                    #d98fa8 100%
                );

            color: white;

            box-shadow:
                4px 0 18px
                rgba(
                    126,
                    72,
                    91,
                    0.10
                );

            z-index: 1000;

            overflow: hidden;

        }


        /* =========================================================
           SIDEBAR BRAND
        ========================================================= */

        .sidebar-brand {

            text-align: center;

            margin-bottom: 25px;

            flex-shrink: 0;

        }


        .brand-icon {

            width: 52px;
            height: 52px;

            margin:
                0 auto 10px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.22
                );

            border-radius: 14px;

            font-size: 25px;

            box-shadow:
                0 4px 12px
                rgba(
                    126,
                    72,
                    91,
                    0.08
                );

        }


        .sidebar-brand h2 {

            margin: 0;

            font-size: 16px;

            font-weight: 700;

            letter-spacing: 0.5px;

        }


        .sidebar-brand p {

            margin:
                5px 0 0;

            font-size: 11px;

            line-height: 1.5;

            opacity: 0.9;

        }


        /* =========================================================
           MENU TITLE
        ========================================================= */

        .menu-title {

            margin-bottom: 10px;

            padding-left: 8px;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            opacity: 0.75;

            flex-shrink: 0;

        }


        /* =========================================================
           SIDEBAR MENU
        ========================================================= */

        .sidebar-menu {

            display: flex;

            flex-direction: column;

            gap: 5px;

            flex-shrink: 0;

        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                11px 13px;

            border-radius: 9px;

            color: white;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;

        }


        .sidebar-menu a:hover {

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.16
                );

        }


        .sidebar-menu a.active {

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.25
                );

            box-shadow:
                0 4px 10px
                rgba(
                    126,
                    72,
                    91,
                    0.08
                );

        }


        .menu-icon {

            width: 22px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 16px;

            flex-shrink: 0;

        }


        /* =========================================================
           BAGIAN BAWAH SIDEBAR
        ========================================================= */

        .sidebar-bottom {

            margin-top: auto;

            flex-shrink: 0;

        }


        /* =========================================================
           USER MINI
        ========================================================= */

        .user-mini {

            padding:
                12px 13px;

            margin-bottom: 8px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.12
                );

            border-radius: 9px;

        }


        .user-mini-name {

            font-size: 13px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .user-mini-role {

            margin-top: 3px;

            font-size: 11px;

            opacity: 0.8;

        }


        /* =========================================================
           LOGOUT BUTTON
           PERSIS SEPERTI DASHBOARD
        ========================================================= */

        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                11px 13px;

            border: none;

            border-radius: 9px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.12
                );

            color: white;

            cursor: pointer;

            font-size: 14px;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            font-weight: normal;

            text-align: left;

            transition: 0.2s;

            min-width: 0;

            height: auto;

            box-shadow: none;

            transform: none;

        }


        .logout-button:hover {

            background:
                #c96f89;

            box-shadow: none;

            transform: none;

        }


        /* =========================================================
           MAIN CONTENT
        ========================================================= */

        .main-content {

            width:
                calc(100% - 250px);

            margin-left:
                250px;

            padding:
                28px 34px 40px;

            min-height:
                100vh;

        }


        /* =========================================================
           HEADER
        ========================================================= */

        .top-bar {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 20px;

        }


        .page-title h1 {

            margin:
                0 0 5px;

            font-size: 25px;

            color:
                #383236;

        }


        .page-title p {

            margin: 0;

            color:
                #81767c;

            font-size: 13px;

        }


        .system-badge {

            display: flex;

            align-items: center;

            gap: 7px;

            padding:
                9px 12px;

            border:
                1px solid #eee1e7;

            border-radius: 10px;

            background:
                white;

            color:
                #81767c;

            font-size: 10px;

            white-space: nowrap;

        }


        .system-badge span {

            color:
                #d98fa8;

            font-size: 10px;

        }


        /* =========================================================
           WELCOME CARD
        ========================================================= */

        .welcome-card {

            position: relative;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            padding:
                25px 29px;

            margin-bottom:
                29px;

            border-radius:
                17px;

            background:
                linear-gradient(
                    120deg,
                    #d88ea7,
                    #ecb2c5
                );

            color: white;

            box-shadow:
                0 8px 22px
                rgba(
                    190,
                    105,
                    132,
                    0.15
                );

        }


        .welcome-card::before {

            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            right: -80px;
            top: -130px;

            border-radius: 50%;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.10
                );

        }


        .welcome-card::after {

            content: "";

            position: absolute;

            width: 110px;
            height: 110px;

            right: 150px;
            bottom: -80px;

            border-radius: 50%;

            background:
                rgba(
                    169,
                    216,
                    234,
                    0.22
                );

        }


        .welcome-content {

            position: relative;

            z-index: 2;

        }


        .welcome-label {

            display: inline-block;

            margin-bottom: 7px;

            color:
                #ffeef4;

            font-size: 10px;

            font-weight: bold;

            letter-spacing:
                0.8px;

            text-transform:
                uppercase;

        }


        .welcome-card h2 {

            margin:
                0 0 6px;

            font-size: 22px;

        }


        .welcome-card p {

            margin: 0;

            color:
                #fff2f6;

            font-size: 12px;

            line-height: 1.5;

        }


        /* =========================================================
           FORM CONTAINER
        ========================================================= */

        .form-container {

            background:
                white;

            border:
                1px solid #eee5e9;

            border-radius:
                14px;

            padding:
                25px;

            box-shadow:
                0 3px 12px
                rgba(
                    80,
                    50,
                    62,
                    0.03
                );

        }


        .form-header {

            margin-bottom:
                22px;

        }


        .form-header h3 {

            margin:
                0 0 5px;

            font-size:
                17px;

            color:
                #443c40;

        }


        .form-header p {

            margin: 0;

            color:
                #81767c;

            font-size:
                11px;

        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error {

            background:
                #fff3f6;

            border:
                1px solid #efc2cf;

            color:
                #a64e6b;

            padding:
                13px 16px;

            margin-bottom:
                22px;

            border-radius:
                9px;

            font-size:
                13px;

        }


        .error strong {

            display: block;

            margin-bottom:
                7px;

        }


        .error ul {

            margin: 0;

            padding-left:
                20px;

        }


        .error li {

            margin-bottom:
                3px;

        }


        /* =========================================================
           DATA SECTION
        ========================================================= */

        .data-section {

            margin-bottom:
                24px;

            padding:
                21px;

            border:
                1px solid #eee5e9;

            border-radius:
                12px;

            background:
                #fdfafb;

        }


        .data-section:last-of-type {

            margin-bottom:
                0;

        }


        /* =========================================================
           SECTION HEADING
        ========================================================= */

        .section-heading {

            display: flex;

            align-items:
                flex-start;

            gap: 12px;

            margin-bottom:
                20px;

            padding-bottom:
                15px;

            border-bottom:
                1px solid #eee5e9;

        }


        .section-number {

            width: 34px;
            height: 34px;

            min-width: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius:
                9px;

            background:
                #d98fa8;

            color:
                white;

            font-size:
                13px;

            font-weight:
                bold;

        }


        .section-heading h4 {

            margin:
                1px 0 4px;

            color:
                #40393d;

            font-size:
                15px;

        }


        .section-heading p {

            margin: 0;

            color:
                #81767c;

            font-size:
                11px;

            line-height:
                1.5;

        }


        /* =========================================================
           FORM GRID
        ========================================================= */

        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(
                        0,
                        1fr
                    )
                );

            gap:
                18px 20px;

        }


        .form-group {

            min-width:
                0;

        }


        label {

            display:
                block;

            margin-bottom:
                7px;

            color:
                #5f565b;

            font-size:
                12px;

            font-weight:
                bold;

        }


        .required {

            color:
                #d85f7d;

        }


        input {

            width:
                100%;

            height:
                42px;

            padding:
                0 12px;

            border:
                1px solid #e2d9de;

            border-radius:
                8px;

            background:
                white;

            color:
                #4a4247;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            font-size:
                13px;

            outline:
                none;

            transition:
                0.2s;

        }


        input:focus {

            border-color:
                #d98fa8;

            box-shadow:
                0 0 0 3px
                rgba(
                    217,
                    143,
                    168,
                    0.12
                );

        }


        input::placeholder {

            color:
                #a59ba0;

        }


        .input-help {

            margin-top:
                5px;

            color:
                #9a9096;

            font-size:
                10px;

            line-height:
                1.4;

        }


        .field-error {

            margin-top:
                5px;

            color:
                #d85f7d;

            font-size:
                11px;

        }


        /* =========================================================
           FORM BUTTONS
        ========================================================= */

        .buttons {

            display: flex;

            justify-content:
                flex-end;

            gap:
                10px;

            margin-top:
                24px;

            padding-top:
                20px;

            border-top:
                1px solid #eee5e9;

        }


        .save-button,
        .back {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            min-width:
                115px;

            height:
                42px;

            padding:
                0 17px;

            border-radius:
                8px;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            font-size:
                13px;

            font-weight:
                bold;

            text-decoration:
                none;

            cursor:
                pointer;

        }


        .save-button {

            border:
                none;

            background:
                #c8738e;

            color:
                white;

            transition:
                0.2s;

        }


        .save-button:hover {

            background:
                #b9627d;

            transform:
                translateY(-1px);

            box-shadow:
                0 4px 10px
                rgba(
                    126,
                    72,
                    91,
                    0.15
                );

        }


        .back {

            border:
                1px solid #e4d8de;

            background:
                #fdfafb;

            color:
                #a95472;

            transition:
                0.2s;

        }


        .back:hover {

            background:
                #f7dce5;

            color:
                #8f4561;

            border-color:
                #e2b6c5;

            transform:
                translateY(-1px;

        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1150px) {

            .main-content {

                padding:
                    25px;

            }

        }


        @media (max-width: 950px) {

            .top-bar {

                align-items:
                    flex-start;

            }


            .system-badge {

                margin-top:
                    2px;

            }

        }


        @media (max-width: 750px) {

            .form-grid {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width: 700px) {

            .sidebar {

                position:
                    relative;

                width:
                    100%;

                height:
                    auto;

                min-height:
                    auto;

                padding:
                    20px 15px;

                overflow:
                    visible;

            }


            .main-content {

                width:
                    100%;

                margin-left:
                    0;

                padding:
                    20px 16px 30px;

            }


            .sidebar-menu {

                display:
                    grid;

                grid-template-columns:
                    repeat(
                        2,
                        minmax(
                            0,
                            1fr
                        )
                    );

                gap:
                    5px;

            }


            .sidebar-bottom {

                margin-top:
                    20px;

            }


            .top-bar {

                flex-direction:
                    column;

            }


            .system-badge {

                width:
                    fit-content;

            }


            .form-container {

                padding:
                    18px;

            }


            .data-section {

                padding:
                    17px;

            }


            .welcome-card {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }

        }


        @media (max-width: 430px) {

            .sidebar-menu {

                grid-template-columns:
                    1fr;

            }


            .main-content {

                padding:
                    15px;

            }


            .welcome-card {

                padding:
                    20px;

            }


            .welcome-card h2 {

                font-size:
                    19px;

            }


            .buttons {

                flex-direction:
                    column-reverse;

            }


            .save-button,
            .back {

                width:
                    100%;

            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
         SAMA PERSIS DENGAN DASHBOARD
    ===================================================== -->

    <aside class="sidebar">


        <div class="sidebar-brand">

            <div class="brand-icon">
                📊
            </div>

            <h2>
                DATA TAGGING BPS
            </h2>

            <p>
                Sistem Pengelolaan<br>
                Data Tagging
            </p>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="sidebar-menu">


            <!-- DASHBOARD -->

            <a
                href="{{ route('dashboard') }}"
            >

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- DATA TAGGING -->

            <a
                href="{{ route('tagging.index') }}"
            >

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            <!-- IMPORT CSV -->

            <a
                href="{{ route('tagging.import') }}"
            >

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            <!-- LIHAT PETA -->

            <a
                href="{{ route('tagging.map') }}"
            >

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


            <!-- TAMBAH DATA -->

            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('tagging.create') }}"
                    class="active"
                >

                    <span class="menu-icon">
                        ➕
                    </span>

                    <span>
                        Tambah Data
                    </span>

                </a>

            @endif


            <!-- PENGATURAN AKUN -->

            <a
                href="{{ route('account.settings') }}"
            >

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Pengaturan Akun
                </span>

            </a>


        </nav>


        <!-- =================================================
             SIDEBAR BOTTOM
        ================================================= -->

        <div class="sidebar-bottom">


            <div class="user-mini">

                <div class="user-mini-name">

                    {{ auth()->user()->name }}

                </div>


                <div class="user-mini-role">

                    {{ ucfirst(auth()->user()->role) }}

                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span class="menu-icon">
                        🚪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>


        </div>


    </aside>



    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <main class="main-content">


        <!-- =================================================
             HEADER
        ================================================= -->

        <div class="top-bar">


            <div class="page-title">

                <h1>
                    Tambah Data
                </h1>

                <p>
                    Menambahkan data tagging secara manual
                </p>

            </div>


            <div class="system-badge">

                <span>
                    ●
                </span>

                Sistem Data Tagging

            </div>


        </div>



        <!-- =================================================
             WELCOME
        ================================================= -->

        <section class="welcome-card">


            <div class="welcome-content">

                <span class="welcome-label">
                    Sistem Pengelolaan Data
                </span>


                <h2>
                    Tambah Data Tagging
                </h2>


                <p>
                    Masukkan data tagging secara manual sesuai
                    dengan struktur data yang digunakan dalam sistem.
                </p>

            </div>


        </section>



        <!-- =================================================
             FORM
        ================================================= -->

        <div class="form-container">


            <div class="form-header">

                <h3>
                    Form Data Tagging
                </h3>


                <p>

                    Lengkapi setiap bagian data berikut.
                    Kolom bertanda
                    <span class="required">*</span>
                    wajib diisi.

                </p>

            </div>



            <!-- =================================================
                 ERROR
            ================================================= -->

            @if ($errors->any())

                <div class="error">

                    <strong>
                        Terjadi kesalahan:
                    </strong>


                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <!-- =================================================
                 FORM DATA
            ================================================= -->

            <form
                action="{{ route('tagging.store') }}"
                method="POST"
            >

                @csrf



                <!-- =================================================
                     BAGIAN 1
                ================================================= -->

                <div class="data-section">


                    <div class="section-heading">


                        <div class="section-number">
                            01
                        </div>


                        <div>

                            <h4>
                                Identitas Data
                            </h4>


                            <p>
                                Masukkan identitas utama yang digunakan
                                untuk mengenali data tagging.
                            </p>

                        </div>


                    </div>



                    <div class="form-grid">


                        <!-- ASSIGNMENT ID -->

                        <div class="form-group">


                            <label for="assignment_id">

                                Assignment ID

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                id="assignment_id"
                                name="assignment_id"
                                value="{{ old('assignment_id') }}"
                                placeholder="Masukkan Assignment ID"
                                required
                            >


                            <div class="input-help">
                                ID harus unik untuk setiap data tagging.
                            </div>


                            @error('assignment_id')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror


                        </div>



                        <!-- LEVEL 6 FULL CODE -->

                        <div class="form-group">


                            <label for="level_6_full_code">

                                Level 6 Full Code

                            </label>


                            <input
                                type="text"
                                id="level_6_full_code"
                                name="level_6_full_code"
                                value="{{ old('level_6_full_code') }}"
                                placeholder="Masukkan Level 6 Full Code"
                            >


                        </div>


                    </div>


                </div>



                <!-- =================================================
                     BAGIAN 2
                ================================================= -->

                <div class="data-section">


                    <div class="section-heading">


                        <div class="section-number">
                            02
                        </div>


                        <div>

                            <h4>
                                Status dan Informasi
                            </h4>


                            <p>
                                Masukkan status assignment serta informasi
                                usaha, bangunan, dan keluarga.
                            </p>

                        </div>


                    </div>



                    <div class="form-grid">


                        <!-- STATUS -->

                        <div class="form-group">


                            <label for="assignment_status_alias">

                                Status Assignment

                            </label>


                            <input
                                type="text"
                                id="assignment_status_alias"
                                name="assignment_status_alias"
                                value="{{ old('assignment_status_alias') }}"
                                placeholder="Contoh: APPROVED BY Pengawas"
                            >


                            <div class="input-help">
                                Isi sesuai status pada data tagging.
                            </div>


                        </div>



                        <!-- NAMA USAHA -->

                        <div class="form-group">


                            <label for="nama_usaha_bang">

                                Nama Usaha / Bangunan

                            </label>


                            <input
                                type="text"
                                id="nama_usaha_bang"
                                name="nama_usaha_bang"
                                value="{{ old('nama_usaha_bang') }}"
                                placeholder="Masukkan nama usaha atau bangunan"
                            >


                        </div>



                        <!-- NAMA KK -->

                        <div class="form-group">


                            <label for="nama_kk">

                                Nama KK

                            </label>


                            <input
                                type="text"
                                id="nama_kk"
                                name="nama_kk"
                                value="{{ old('nama_kk') }}"
                                placeholder="Masukkan nama kepala keluarga"
                            >


                        </div>



                        <!-- ADA KELUARGA -->

                        <div class="form-group">


                            <label for="ada_keluarga_label">

                                Ada Keluarga

                            </label>


                            <input
                                type="text"
                                id="ada_keluarga_label"
                                name="ada_keluarga_label"
                                value="{{ old('ada_keluarga_label') }}"
                                placeholder="Contoh: 1. Ditemukan"
                            >


                            <div class="input-help">
                                Gunakan format sesuai data CSV.
                            </div>


                        </div>



                        <!-- ADA BANGUNAN USAHA -->

                        <div class="form-group">


                            <label for="ada_bang_usaha_label">

                                Ada Bangunan Usaha

                            </label>


                            <input
                                type="text"
                                id="ada_bang_usaha_label"
                                name="ada_bang_usaha_label"
                                value="{{ old('ada_bang_usaha_label') }}"
                                placeholder="Contoh: 2. Baru"
                            >


                            <div class="input-help">
                                Gunakan format sesuai data CSV.
                            </div>


                        </div>


                    </div>


                </div>



                <!-- =================================================
                     BAGIAN 3
                ================================================= -->

                <div class="data-section">


                    <div class="section-heading">


                        <div class="section-number">
                            03
                        </div>


                        <div>

                            <h4>
                                Informasi Lokasi
                            </h4>


                            <p>
                                Masukkan informasi koordinat dan ketelitian
                                lokasi data tagging.
                            </p>

                        </div>


                    </div>



                    <div class="form-grid">


                        <!-- ACCURACY -->

                        <div class="form-group">


                            <label for="geotag_accuracy">

                                Geotag Accuracy

                            </label>


                            <input
                                type="number"
                                step="any"
                                id="geotag_accuracy"
                                name="geotag_accuracy"
                                value="{{ old('geotag_accuracy') }}"
                                placeholder="Contoh: 3.790092"
                            >


                        </div>



                        <!-- LATITUDE -->

                        <div class="form-group">


                            <label for="geotag_latitude">

                                Latitude

                            </label>


                            <input
                                type="number"
                                step="any"
                                id="geotag_latitude"
                                name="geotag_latitude"
                                value="{{ old('geotag_latitude') }}"
                                placeholder="Contoh: -3.00937952"
                            >


                        </div>



                        <!-- LONGITUDE -->

                        <div class="form-group">


                            <label for="geotag_longitude">

                                Longitude

                            </label>


                            <input
                                type="number"
                                step="any"
                                id="geotag_longitude"
                                name="geotag_longitude"
                                value="{{ old('geotag_longitude') }}"
                                placeholder="Contoh: 104.78702540"
                            >


                        </div>


                    </div>


                </div>



                <!-- =================================================
                     BUTTON
                ================================================= -->

                <div class="buttons">


                    <a
                        href="{{ route('tagging.index') }}"
                        class="back"
                    >

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="save-button"
                    >

                        💾
                        Simpan Data

                    </button>


                </div>


            </form>


        </div>


    </main>


</body>

</html>