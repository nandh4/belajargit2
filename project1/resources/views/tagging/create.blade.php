<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Data Tagging</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f8fb;
            color: #172033;
        }


        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            padding: 24px 15px;
            background: linear-gradient(
                180deg,
                #075985 0%,
                #0b6fa8 55%,
                #087bb9 100%
            );
            color: white;
            box-shadow: 4px 0 18px rgba(0, 0, 0, 0.08);
            z-index: 1000;
        }


        .sidebar-brand {
            padding: 5px 12px 25px;
            margin-bottom: 22px;
            border-bottom: 1px solid rgba(
                255,
                255,
                255,
                0.18
            );
        }


        .brand-icon {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            border-radius: 12px;
            background-color: rgba(
                255,
                255,
                255,
                0.17
            );
            font-size: 23px;
        }


        .sidebar-brand h2 {
            margin: 0 0 5px;
            font-size: 18px;
            letter-spacing: 0.4px;
        }


        .sidebar-brand p {
            margin: 0;
            color: #d8effc;
            font-size: 11px;
            line-height: 1.5;
        }


        .menu-title {
            padding: 0 12px;
            margin-bottom: 9px;
            color: #b9dff3;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }


        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }


        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 13px;
            color: #e8f6ff;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            transition: all 0.2s ease;
        }


        .sidebar-menu a:hover {
            background-color: rgba(
                255,
                255,
                255,
                0.13
            );
            color: white;
            transform: translateX(2px);
        }


        .sidebar-menu a.active {
            background-color: white;
            color: #075985;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(
                0,
                0,
                0,
                0.08
            );
        }


        .menu-icon {
            width: 23px;
            text-align: center;
            font-size: 17px;
            flex-shrink: 0;
        }


        .sidebar-bottom {
            margin-top: auto;
        }


        .user-mini {
            padding: 13px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: rgba(
                255,
                255,
                255,
                0.10
            );
        }


        .user-mini-name {
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .user-mini-role {
            margin-top: 4px;
            color: #cce9f8;
            font-size: 11px;
        }


        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            border: none;
            border-radius: 9px;
            background-color: rgba(
                255,
                255,
                255,
                0.10
            );
            color: white;
            cursor: pointer;
            font-size: 14px;
            text-align: left;
            transition: 0.2s;
        }


        .logout-button:hover {
            background-color: #dc3545;
        }


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-content {
            width: calc(100% - 250px);
            margin-left: 250px;
            padding: 30px 35px;
        }


        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }


        .page-title h1 {
            margin: 0 0 5px;
            font-size: 25px;
            color: #172033;
        }


        .page-title p {
            margin: 0;
            color: #718096;
            font-size: 14px;
        }


        .system-badge {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            background-color: white;
            border: 1px solid #dfe8ef;
            border-radius: 9px;
            color: #64748b;
            font-size: 12px;
        }


        /* =========================================
           WELCOME
        ========================================= */

        .welcome-card {
            position: relative;
            overflow: hidden;
            padding: 25px 29px;
            margin-bottom: 25px;
            border-radius: 15px;
            background: linear-gradient(
                120deg,
                #096da5,
                #2196d3
            );
            color: white;
            box-shadow: 0 7px 20px rgba(
                8,
                112,
                168,
                0.18
            );
        }


        .welcome-card::before {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -75px;
            top: -105px;
            border-radius: 50%;
            background-color: rgba(
                255,
                255,
                255,
                0.08
            );
        }


        .welcome-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            right: 100px;
            bottom: -65px;
            border-radius: 50%;
            background-color: rgba(
                255,
                255,
                255,
                0.05
            );
        }


        .welcome-card h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 7px;
            font-size: 22px;
        }


        .welcome-card p {
            position: relative;
            z-index: 1;
            margin: 0;
            color: #dff3ff;
            font-size: 14px;
        }


        /* =========================================
           FORM
        ========================================= */

        .form-container {
            background-color: white;
            border: 1px solid #dfe8ef;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(
                0,
                0,
                0,
                0.04
            );
        }


        .form-header {
            margin-bottom: 22px;
        }


        .form-header h3 {
            margin: 0 0 5px;
            font-size: 17px;
            color: #172033;
        }


        .form-header p {
            margin: 0;
            color: #718096;
            font-size: 12px;
        }


        /* =========================================
           ERROR
        ========================================= */

        .error {
            background-color: #fff2f3;
            border: 1px solid #f1b8bd;
            color: #a52834;
            padding: 13px 16px;
            margin-bottom: 22px;
            border-radius: 9px;
            font-size: 13px;
        }


        .error strong {
            display: block;
            margin-bottom: 7px;
        }


        .error ul {
            margin: 0;
            padding-left: 20px;
        }


        .error li {
            margin-bottom: 3px;
        }


        /* =========================================
           DATA SECTION
        ========================================= */

        .data-section {
            margin-bottom: 24px;
            padding: 21px;
            border: 1px solid #dce8ef;
            border-radius: 12px;
            background-color: #fbfdfe;
        }


        .data-section:last-of-type {
            margin-bottom: 0;
        }


        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dfe8ef;
        }


        .section-number {
            width: 34px;
            height: 34px;
            min-width: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background-color: #075985;
            color: white;
            font-size: 13px;
            font-weight: bold;
        }


        .section-heading h4 {
            margin: 1px 0 4px;
            color: #172033;
            font-size: 15px;
        }


        .section-heading p {
            margin: 0;
            color: #718096;
            font-size: 11px;
            line-height: 1.5;
        }


        .form-grid {
            display: grid;
            grid-template-columns: repeat(
                2,
                minmax(0, 1fr)
            );
            gap: 18px 20px;
        }


        .form-group {
            min-width: 0;
        }


        label {
            display: block;
            margin-bottom: 7px;
            color: #475569;
            font-size: 12px;
            font-weight: bold;
        }


        .required {
            color: #dc3545;
        }


        input {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid #d5e0e7;
            border-radius: 8px;
            background-color: white;
            color: #334155;
            font-family: Arial, sans-serif;
            font-size: 13px;
            outline: none;
        }


        input:focus {
            border-color: #0b79b5;
            box-shadow: 0 0 0 3px rgba(
                11,
                121,
                181,
                0.10
            );
        }


        input::placeholder {
            color: #a0aec0;
        }


        .input-help {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 10px;
            line-height: 1.4;
        }


        .field-error {
            margin-top: 5px;
            color: #dc3545;
            font-size: 11px;
        }


        /* =========================================
           BUTTONS
        ========================================= */

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e1e9ee;
        }


        button,
        .back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 115px;
            height: 42px;
            padding: 0 17px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }


        button {
            border: none;
            background-color: #075985;
            color: white;
        }


        button:hover {
            background-color: #064d70;
        }


        .back {
            border: 1px solid #d8e2e9;
            background-color: white;
            color: #64748b;
        }


        .back:hover {
            background-color: #f5f8fa;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1000px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

        }


        @media (max-width: 750px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 20px;
            }

            .top-bar {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .form-container {
                padding: 18px;
            }

            .data-section {
                padding: 17px;
            }

        }


        @media (max-width: 480px) {

            .main-content {
                padding: 15px;
            }

            .welcome-card {
                padding: 20px;
            }

            .welcome-card h2 {
                font-size: 19px;
            }

            .buttons {
                flex-direction: column-reverse;
            }

            button,
            .back {
                width: 100%;
            }

        }

    </style>

</head>


<body>


    <!-- SIDEBAR -->

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


            <a href="{{ route('dashboard') }}">

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="{{ route('tagging.index') }}">

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            <a href="{{ route('tagging.import') }}">

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            <a href="{{ route('tagging.map') }}">

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


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


        </nav>


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



    <!-- MAIN CONTENT -->

    <main class="main-content">


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



        <div class="welcome-card">

            <h2>
                Tambah Data Tagging
            </h2>

            <p>
                Masukkan data tagging secara manual sesuai
                dengan struktur data yang digunakan dalam sistem.
            </p>

        </div>



        <!-- FORM CONTAINER -->

        <div class="form-container">


            <div class="form-header">

                <h3>
                    Form Data Tagging
                </h3>

                <p>
                    Lengkapi setiap bagian data berikut.
                    Kolom bertanda <span class="required">*</span>
                    wajib diisi.
                </p>

            </div>



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



            <form
                action="{{ route('tagging.store') }}"
                method="POST"
            >

                @csrf



                <!-- =================================
                     BAGIAN 1
                ================================= -->

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



                <!-- =================================
                     BAGIAN 2
                ================================= -->

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



                <!-- =================================
                     BAGIAN 3
                ================================= -->

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



                <!-- BUTTON -->

                <div class="buttons">


                    <a
                        href="{{ route('tagging.index') }}"
                        class="back"
                    >
                        Kembali
                    </a>


                    <button type="submit">
                        💾 Simpan Data
                    </button>


                </div>


            </form>


        </div>


    </main>


</body>

</html>