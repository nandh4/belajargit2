<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import CSV - Data Tagging BPS</title>


    <style>

        /* =====================================================
           DASAR
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            background-color: #f3f7fb;

            color: #1e293b;
        }


        /* =====================================================
           LAYOUT
        ===================================================== */

        .dashboard-layout {

            display: flex;

            min-height: 100vh;
        }


        /* =====================================================
           SIDEBAR
           SAMA SEPERTI DASHBOARD
        ===================================================== */

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

            z-index: 100;
        }


        /* =====================================================
           IDENTITAS APLIKASI
        ===================================================== */

        .sidebar-brand {

            padding: 5px 12px 25px;

            margin-bottom: 22px;

            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }


        .brand-icon {

            width: 46px;
            height: 46px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 12px;

            border-radius: 12px;

            background-color: rgba(255, 255, 255, 0.17);

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


        /* =====================================================
           JUDUL MENU
        ===================================================== */

        .menu-title {

            padding: 0 12px;

            margin-bottom: 9px;

            color: #b9dff3;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =====================================================
           MENU SIDEBAR
        ===================================================== */

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

            background-color: rgba(255, 255, 255, 0.13);

            color: white;

            transform: translateX(2px);
        }


        .sidebar-menu a.active {

            background-color: white;

            color: #075985;

            font-weight: bold;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }


        .menu-icon {

            width: 23px;

            text-align: center;

            font-size: 17px;

            flex-shrink: 0;
        }


        /* =====================================================
           BAGIAN BAWAH SIDEBAR
        ===================================================== */

        .sidebar-bottom {

            margin-top: auto;
        }


        .user-mini {

            padding: 13px;

            margin-bottom: 10px;

            border-radius: 10px;

            background-color: rgba(255, 255, 255, 0.10);
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


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border: none;

            border-radius: 9px;

            background-color: rgba(255, 255, 255, 0.10);

            color: white;

            cursor: pointer;

            font-size: 14px;

            text-align: left;

            transition: 0.2s;
        }


        .logout-button:hover {

            background-color: #dc3545;
        }


        /* =====================================================
           KONTEN UTAMA
        ===================================================== */

        .main-content {

            width: calc(100% - 250px);

            margin-left: 250px;

            padding: 30px 35px;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

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


        /* =====================================================
           WELCOME CARD
           SAMA DENGAN DASHBOARD
        ===================================================== */

        .welcome-card {

            position: relative;

            overflow: hidden;

            padding: 26px 29px;

            margin-bottom: 25px;

            border-radius: 15px;

            background: linear-gradient(
                120deg,
                #096da5,
                #2196d3
            );

            color: white;

            box-shadow: 0 7px 20px rgba(8, 112, 168, 0.18);
        }


        .welcome-card::before {

            content: "";

            position: absolute;

            width: 210px;
            height: 210px;

            right: -75px;
            top: -105px;

            border-radius: 50%;

            background-color: rgba(255, 255, 255, 0.08);
        }


        .welcome-card::after {

            content: "";

            position: absolute;

            width: 100px;
            height: 100px;

            right: 100px;
            bottom: -65px;

            border-radius: 50%;

            background-color: rgba(255, 255, 255, 0.05);
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


        /* =====================================================
           IMPORT CARD
        ===================================================== */

        .import-card {

            background-color: white;

            border: 1px solid #dfe8ef;

            border-radius: 14px;

            padding: 25px;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.035);
        }


        .import-header {

            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 22px;
        }


        .import-icon {

            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background-color: #e6f3fb;

            color: #0b6fa8;

            font-size: 22px;
        }


        .import-header h3 {

            margin: 0 0 4px;

            color: #1e293b;

            font-size: 17px;
        }


        .import-header p {

            margin: 0;

            color: #8491a2;

            font-size: 11px;
        }


        /* =====================================================
           PESAN
        ===================================================== */

        .success {

            padding: 12px 15px;

            margin-bottom: 18px;

            border-radius: 9px;

            background-color: #eaf7ef;

            border: 1px solid #cdebd8;

            color: #287548;

            font-size: 12px;
        }


        .error {

            padding: 12px 15px;

            margin-bottom: 18px;

            border-radius: 9px;

            background-color: #fdf0f0;

            border: 1px solid #f0d0d0;

            color: #b44444;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =====================================================
           UPLOAD AREA
        ===================================================== */

        .upload-area {

            padding: 38px 25px;

            border: 2px dashed #b9dce9;

            border-radius: 13px;

            background-color: #f8fcfd;

            text-align: center;

            transition: all 0.2s ease;
        }


        .upload-area:hover {

            border-color: #2196d3;

            background-color: #f1f9fc;
        }


        .upload-icon {

            width: 60px;
            height: 60px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin: 0 auto 13px;

            border-radius: 15px;

            background-color: #e6f3fb;

            color: #0b6fa8;

            font-size: 27px;
        }


        .upload-area h4 {

            margin: 0 0 7px;

            color: #1e293b;

            font-size: 15px;
        }


        .upload-area p {

            margin: 0 0 17px;

            color: #8491a2;

            font-size: 11px;
        }


        .choose-file {

            display: inline-block;

            padding: 10px 18px;

            border-radius: 8px;

            background-color: #075985;

            color: white;

            font-size: 12px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }


        .choose-file:hover {

            background-color: #064c70;
        }


        #file {

            display: none;
        }


        /* =====================================================
           FILE TERPILIH
        ===================================================== */

        .file-info {

            display: none;

            align-items: center;

            gap: 11px;

            margin-top: 13px;

            padding: 12px 14px;

            border: 1px solid #d7eaf2;

            border-radius: 9px;

            background-color: #eef8fc;
        }


        .file-info.show {

            display: flex;
        }


        .file-icon {

            font-size: 18px;
        }


        .file-name {

            color: #17658e;

            font-size: 12px;

            font-weight: bold;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        .file-status {

            margin-left: auto;

            color: #29965c;

            font-size: 10px;

            white-space: nowrap;
        }


        /* =====================================================
           FORMAT DATA
        ===================================================== */

        .format-box {

            margin-top: 20px;

            padding: 16px;

            border-radius: 10px;

            background-color: #f8fafb;

            border: 1px solid #e3edf2;
        }


        .format-box h4 {

            margin: 0 0 11px;

            color: #1e293b;

            font-size: 12px;
        }


        .format-grid {

            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 8px 30px;
        }


        .format-item {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #718096;

            font-size: 10px;
        }


        .format-check {

            color: #2583c7;

            font-weight: bold;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .form-footer {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;

            margin-top: 22px;

            padding-top: 18px;

            border-top: 1px solid #e7edf2;
        }


        .back-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 10px 16px;

            border-radius: 8px;

            background-color: #f1f5f7;

            color: #607d8b;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;
        }


        .import-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 10px 18px;

            border: none;

            border-radius: 8px;

            background-color: #075985;

            color: white;

            cursor: pointer;

            font-size: 12px;

            font-weight: bold;
        }


        .import-button:hover {

            background-color: #064c70;
        }


        .import-button:disabled {

            background-color: #b0bec5;

            cursor: not-allowed;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .sidebar {

                width: 220px;
            }

            .main-content {

                width: calc(100% - 220px);

                margin-left: 220px;

                padding: 25px;
            }
        }


        @media (max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                min-height: auto;
            }

            .dashboard-layout {

                display: block;
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

            .format-grid {

                grid-template-columns: 1fr;
            }

            .form-footer {

                flex-direction: column-reverse;

                align-items: stretch;
            }

            .back-button,
            .import-button {

                width: 100%;
            }
        }


        @media (max-width: 480px) {

            .import-card {

                padding: 18px;
            }

            .welcome-card {

                padding: 22px;
            }

            .upload-area {

                padding: 30px 15px;
            }
        }

        .format-info {
            margin-top: 25px;
            padding: 20px;
            background-color: #f7fbfe;
            border: 1px solid #dcecf5;
            border-radius: 12px;
        }

        .format-title {
            color: #075985;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .format-description {
            margin: 0 0 12px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .format-rules {
            margin: 0 0 20px;
            padding-left: 20px;
            color: #475569;
            font-size: 13px;
            line-height: 1.7;
        }

        .format-rules li {
            margin-bottom: 3px;
        }

        .column-title {
            margin-bottom: 10px;
            color: #172033;
            font-size: 13px;
            font-weight: bold;
        }

        .column-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .column-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px;
            background-color: white;
            border: 1px solid #e2edf3;
            border-radius: 8px;
        }

        .column-number {
            width: 23px;
            height: 23px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 6px;
            background-color: #e6f4fb;
            color: #075985;
            font-size: 11px;
            font-weight: bold;
        }

        .column-item strong {
            display: block;
            margin-bottom: 2px;
            color: #334155;
            font-size: 12px;
        }

        .column-item small {
            display: block;
            color: #718096;
            font-size: 11px;
            line-height: 1.4;
        }

        @media (max-width: 700px) {
            .column-list {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    {{-- =====================================================
         SIDEBAR
         SAMA DENGAN DASHBOARD
    ====================================================== --}}

    <aside class="sidebar">


        {{-- IDENTITAS APLIKASI --}}

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


        {{-- MENU UTAMA --}}

        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="sidebar-menu">


            {{-- DASHBOARD --}}

            <a href="{{ route('dashboard') }}">

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            {{-- DATA TAGGING --}}

            <a href="{{ route('tagging.index') }}">

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            {{-- IMPORT CSV --}}

            <a
                href="{{ route('tagging.import') }}"
                class="active"
            >

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            {{-- PETA --}}

            <a href="{{ route('tagging.map') }}">

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


            {{-- TAMBAH DATA KHUSUS ADMIN --}}

            @if(auth()->user()->role === 'admin')

                <a href="{{ route('tagging.create') }}">

                    <span class="menu-icon">
                        ➕
                    </span>

                    <span>
                        Tambah Data
                    </span>

                </a>

            @endif


        </nav>


        {{-- =================================================
             BAGIAN BAWAH SIDEBAR
        ================================================== --}}

        <div class="sidebar-bottom">


            {{-- USER --}}

            <div class="user-mini">

                <div class="user-mini-name">

                    {{ auth()->user()->name }}

                </div>

                <div class="user-mini-role">

                    {{ ucfirst(auth()->user()->role) }}

                </div>

            </div>


            {{-- LOGOUT --}}

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


    {{-- =====================================================
         KONTEN UTAMA
    ====================================================== --}}

    <main class="main-content">


        {{-- =================================================
             TOP BAR
        ================================================== --}}

        <div class="top-bar">


            <div class="page-title">

                <h1>
                    Import CSV
                </h1>

                <p>
                    Masukkan data tagging ke dalam sistem
                </p>

            </div>


            <div class="system-badge">

                <span>
                    ●
                </span>

                Sistem Data Tagging

            </div>


        </div>


        {{-- =================================================
             WELCOME
        ================================================== --}}

        <div class="welcome-card">

            <h2>
                Import Data Tagging
            </h2>

            <p>
                Unggah file CSV untuk menambahkan data tagging Kota Palembang ke dalam sistem.
            </p>

        </div>


        {{-- =================================================
             CARD IMPORT
        ================================================== --}}

        <div class="import-card">


            <div class="import-header">

                <div class="import-icon">
                    📥
                </div>

                <div>

                    <h3>
                        Unggah File CSV
                    </h3>

                    <p>
                        Pilih file CSV yang ingin dimasukkan ke dalam sistem.
                    </p>

                </div>

            </div>


            {{-- SUCCESS --}}

            @if (session('success'))

                <div class="success">

                    ✓ &nbsp;

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}

            @if ($errors->any())

                <div class="error">

                    @foreach ($errors->all() as $error)

                        <div>
                            ! &nbsp; {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            {{-- FORM IMPORT --}}

            <form
                action="{{ route('tagging.import.process') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- UPLOAD --}}

                <div class="upload-area">


                    <div class="upload-icon">
                        📄
                    </div>


                    <h4>
                        Pilih File CSV
                    </h4>


                    <p>
                        Pastikan file yang dipilih memiliki format data tagging yang sesuai.
                    </p>


                    <label
                        for="file"
                        class="choose-file"
                    >
                        📁 Pilih File
                    </label>


                </div>


                <input
                    type="file"
                    name="file"
                    id="file"
                    accept=".csv,.txt"
                    required
                >


                {{-- FILE TERPILIH --}}

                <div
                    class="file-info"
                    id="fileInfo"
                >

                    <div class="file-icon">
                        📄
                    </div>

                    <div class="file-name" id="fileName">
                    </div>

                    <div class="file-status">
                        ✓ Siap diimport
                    </div>

                </div>


                <div class="format-info">

                    <div class="format-title">
                        📋 Ketentuan Format File CSV
                    </div>

                    <p class="format-description">
                        Pastikan file CSV yang akan diimpor memenuhi ketentuan berikut:
                    </p>

                    <ul class="format-rules">
                        <li>File harus menggunakan format <strong>CSV (.csv)</strong>.</li>
                        <li>File harus memiliki <strong>10 kolom</strong> sesuai format data tagging.</li>
                        <li>Nama header kolom harus sesuai dengan format yang telah ditentukan dan tidak boleh diubah.</li>
                        <li>Kolom yang tidak memiliki data dapat dibiarkan kosong.</li>
                        <li>Data koordinat menggunakan nilai <strong>latitude</strong> dan <strong>longitude</strong>.</li>
                        <li>Pastikan data yang diimpor sesuai dengan format dan struktur data tagging BPS.</li>
                    </ul>

                    <div class="column-title">
                        Kolom yang wajib tersedia:
                    </div>

                    <div class="column-list">

                        <div class="column-item">
                            <span class="column-number">1</span>
                            <div>
                                <strong>assignment_id</strong>
                                <small>ID unik data tagging.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">2</span>
                            <div>
                                <strong>assignment_status_alias</strong>
                                <small>Status data tagging, seperti Approved, Submitted, atau Rejected.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">3</span>
                            <div>
                                <strong>level_6_full_code</strong>
                                <small>Kode wilayah/SLS pada data tagging.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">4</span>
                            <div>
                                <strong>nama_usaha_bang</strong>
                                <small>Nama usaha atau bangunan.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">5</span>
                            <div>
                                <strong>nama_kk</strong>
                                <small>Nama kepala keluarga.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">6</span>
                            <div>
                                <strong>ada_keluarga_label</strong>
                                <small>Keterangan mengenai keberadaan keluarga.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">7</span>
                            <div>
                                <strong>ada_bang_usaha_label</strong>
                                <small>Keterangan mengenai keberadaan bangunan/usaha.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">8</span>
                            <div>
                                <strong>geotag_accuracy</strong>
                                <small>Nilai tingkat akurasi koordinat.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">9</span>
                            <div>
                                <strong>geotag_latitude</strong>
                                <small>Koordinat lintang lokasi.</small>
                            </div>
                        </div>

                        <div class="column-item">
                            <span class="column-number">10</span>
                            <div>
                                <strong>geotag_longitude</strong>
                                <small>Koordinat bujur lokasi.</small>
                            </div>
                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}

                <div class="form-footer">


                    <a
                        href="{{ route('tagging.index') }}"
                        class="back-button"
                    >
                        ← Kembali
                    </a>


                    <button
                        type="submit"
                        class="import-button"
                        id="importButton"
                        disabled
                    >
                        📥 Import Data
                    </button>


                </div>


            </form>


        </div>


    </main>


</div>


<script>

    const fileInput =
        document.getElementById('file');

    const fileInfo =
        document.getElementById('fileInfo');

    const fileName =
        document.getElementById('fileName');

    const importButton =
        document.getElementById('importButton');


    fileInput.addEventListener('change', function () {


        if (this.files.length > 0) {


            const file =
                this.files[0];


            fileName.textContent =
                file.name;


            fileInfo.classList.add('show');


            importButton.disabled =
                false;


        } else {


            fileName.textContent =
                '';


            fileInfo.classList.remove('show');


            importButton.disabled =
                true;

        }

    });

</script>


</body>

</html>