<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Data Tagging - Data Tagging BPS</title>


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

            justify-content: flex-end;

            margin-bottom: 22px;
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
           BANNER DATA TAGGING
           STYLE MENGIKUTI WELCOME DASHBOARD
        ===================================================== */

        .welcome-card {

            position: relative;

            overflow: hidden;

            padding: 26px 29px;

            margin-bottom: 20px;

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


        .banner-system {

            position: relative;

            z-index: 1;

            margin-bottom: 7px;

            color: #dff3ff;

            font-size: 11px;

            font-weight: bold;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =====================================================
           TOMBOL AKSI
        ===================================================== */

        .action-row {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 10px;

            margin-bottom: 25px;
        }


        .action-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            min-height: 40px;

            padding: 0 15px;

            border: 1px solid #d7e3ec;

            border-radius: 8px;

            background-color: white;

            color: #075985;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;

            transition: all 0.2s ease;
        }


        .action-button:hover {

            background-color: #edf7fc;

            border-color: #9bc8e2;

            transform: translateY(-1px);
        }


        .action-button.primary {

            background-color: #0b6fa8;

            border-color: #0b6fa8;

            color: white;
        }


        .action-button.primary:hover {

            background-color: #075985;

            border-color: #075985;
        }


        /* =====================================================
           JUDUL SECTION
        ===================================================== */

        .section-heading {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 13px;
        }


        .section-heading h3 {

            margin: 0;

            font-size: 18px;

            color: #1e293b;
        }


        .section-heading span {

            color: #8a98a9;

            font-size: 12px;
        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {

            padding: 20px;

            margin-bottom: 20px;

            background-color: white;

            border: 1px solid #dfe8ef;

            border-radius: 14px;

            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.035);
        }


        .filter-heading {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 14px;
        }


        .filter-heading h3 {

            margin: 0;

            color: #1e293b;

            font-size: 16px;
        }


        .filter-heading span {

            color: #94a3b8;

            font-size: 11px;
        }


        .filter-form {

            display: grid;

            grid-template-columns: 1.7fr 1fr auto auto;

            gap: 10px;
        }


        .filter-input,
        .filter-select {

            width: 100%;

            height: 40px;

            padding: 0 12px;

            border: 1px solid #d9e3eb;

            border-radius: 8px;

            background-color: white;

            color: #334155;

            font-size: 12px;

            outline: none;
        }


        .filter-input:focus,
        .filter-select:focus {

            border-color: #2583c7;

            box-shadow: 0 0 0 3px rgba(37, 131, 199, 0.08);
        }


        .filter-button {

            height: 40px;

            padding: 0 17px;

            border: none;

            border-radius: 8px;

            background-color: #0b6fa8;

            color: white;

            cursor: pointer;

            font-size: 12px;

            font-weight: bold;
        }


        .filter-button:hover {

            background-color: #075985;
        }


        .reset-button {

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 0 16px;

            border: 1px solid #d9e3eb;

            border-radius: 8px;

            background-color: white;

            color: #64748b;

            text-decoration: none;

            font-size: 12px;
        }


        .reset-button:hover {

            background-color: #f5f8fa;

            color: #334155;
        }


        /* =========================
        TABLE
        ========================= */
        .table-card {
            background: white;
            border: 1px solid #dbe9ef;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(22, 72, 100, 0.06);
        }

        .table-header {
            padding: 17px 19px;
            border-bottom: 1px solid #e1edf3;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h3 {
            font-size: 15px;
            color: #16445d;
        }

        .table-header span {
            font-size: 11px;
            color: #78909c;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1250px;
            border-collapse: collapse;
        }

        /* Header tabel */
        thead th {
            background: #075985;
            color: white;
            padding: 13px 11px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            white-space: nowrap;
            border-right: 1px solid rgba(255, 255, 255, 0.15);
        }

        thead th:last-child {
            border-right: none;
        }

        /* Isi tabel */
        tbody td {
            padding: 12px 11px;
            border-bottom: 1px solid #dcecf3;
            color: #455a64;
            font-size: 11px;
            vertical-align: middle;
        }

        /* Warna baris selang-seling */
        tbody tr:nth-child(odd) {
            background: #ffffff;
        }

        tbody tr:nth-child(even) {
            background: #f1f8fc;
        }

        /* Efek ketika mouse diarahkan ke baris */
        tbody tr:hover {
            background: #dff1fa;
        }

        /* Baris terakhir */
        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Nomor */
        .number-cell {
            width: 45px;
            text-align: center;
            font-weight: 600;
            color: #607d8b;
        }

        /* Kode */
        .code-cell {
            font-family: Consolas, monospace;
            font-size: 10px;
            color: #17658e;
        }

        /* Nama usaha */
        .business-name {
            font-weight: 600;
            color: #16445d;
            max-width: 180px;
        }

        /* Lokasi */
        .location-cell {
            font-family: Consolas, monospace;
            font-size: 10px;
        }

        .no-location {
            color: #aebcc3;
            font-style: italic;
        }

        /* =========================
        STATUS
        ========================= */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        /* Approved */
        .status-approved {
            background: #e8f7ee;
            color: #247847;
        }

        .status-approved .dot {
            background: #35a263;
        }

        /* Submitted */
        .status-submitted {
            background: #e8f3fa;
            color: #17658e;
        }

        .status-submitted .dot {
            background: #2c91c8;
        }

        /* Rejected */
        .status-rejected {
            background: #fdeeee;
            color: #b84444;
        }

        .status-rejected .dot {
            background: #d75a5a;
        }

        /* =========================
        TOMBOL AKSI
        ========================= */
        .action-cell {
            white-space: nowrap;
        }

        .action-buttons-table {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-btn {
            width: 29px;
            height: 29px;
            border-radius: 7px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 12px;
            transition: 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        .edit-btn {
            background: #fff4df;
            color: #b87916;
        }

        .delete-btn {
            background: #fdeaea;
            color: #c74d4d;
        }

        .delete-form {
            display: inline;
        }

        /* =========================
        DATA KOSONG
        ========================= */
        .empty-data {
            text-align: center;
            padding: 45px 20px;
            color: #90a4ae;
        }

        .empty-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .empty-data p {
            font-size: 12px;
        }


        /* =====================================================
           AKSI
        ===================================================== */

        .action-cell {

            white-space: nowrap;
        }


        .edit-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 29px;

            padding: 0 9px;

            margin-right: 4px;

            border-radius: 6px;

            background-color: #e6f3fb;

            color: #096da5;

            text-decoration: none;

            font-size: 10px;

            font-weight: bold;
        }


        .edit-button:hover {

            background-color: #d5ebf8;
        }


        .delete-button {

            min-height: 29px;

            padding: 0 9px;

            border: none;

            border-radius: 6px;

            background-color: #fdeaea;

            color: #c2413d;

            cursor: pointer;

            font-size: 10px;

            font-weight: bold;
        }


        .delete-button:hover {

            background-color: #f9d6d5;
        }


        .view-only {

            color: #94a3b8;

            font-size: 10px;
        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination-area {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 16px 20px;

            border-top: 1px solid #e7edf2;
        }


        .pagination-info {

            color: #8a98a9;

            font-size: 11px;

            white-space: nowrap;
        }


        .pagination-info strong {

            color: #526477;
        }


        .pagination {

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 5px;
        }


        .pagination a,
        .pagination span {

            min-width: 32px;

            height: 32px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 0 8px;

            border: 1px solid #dfe7ed;

            border-radius: 7px;

            background-color: white;

            color: #64748b;

            text-decoration: none;

            font-size: 11px;

            transition: 0.2s;
        }


        .pagination a:hover {

            background-color: #edf7fc;

            border-color: #a8cce3;

            color: #075985;
        }


        .pagination .active {

            background-color: #0b6fa8;

            border-color: #0b6fa8;

            color: white;

            font-weight: bold;
        }


        .pagination .disabled {

            background-color: #f7f9fb;

            color: #c2cbd4;

            cursor: not-allowed;
        }


        /* =====================================================
           SUCCESS MESSAGE
        ===================================================== */

        .success-message {

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 12px 15px;

            margin-bottom: 18px;

            border: 1px solid #ccebd9;

            border-radius: 9px;

            background-color: #eefaf3;

            color: #26794d;

            font-size: 12px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1250px) {

            .stats-grid {

                grid-template-columns: repeat(2, 1fr);
            }

            .filter-form {

                grid-template-columns: 1fr 1fr;
            }

        }


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

                justify-content: flex-start;
            }

            .action-row {

                justify-content: flex-start;
            }

            .filter-form {

                grid-template-columns: 1fr;
            }

            .pagination-area {

                align-items: flex-start;

                flex-direction: column;
            }

            .pagination {

                justify-content: flex-start;
            }

        }


        @media (max-width: 480px) {

            .stats-grid {

                grid-template-columns: 1fr;
            }

            .welcome-card {

                padding: 22px;
            }

            .table-header {

                align-items: flex-start;

                flex-direction: column;

                gap: 6px;
            }

        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    {{-- =====================================================
         SIDEBAR
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

            <a
                href="{{ route('tagging.index') }}"
                class="active"
            >

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            {{-- IMPORT CSV --}}

            <a href="{{ route('tagging.import') }}">

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


            {{-- TAMBAH DATA ADMIN --}}

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


    {{-- =====================================================
         KONTEN UTAMA
    ====================================================== --}}

    <main class="main-content">


        {{-- =================================================
             TOP BAR
        ================================================== --}}

        <div class="top-bar">

            <div class="system-badge">

                <span>
                    ●
                </span>

                Sistem Data Tagging

            </div>

        </div>


        {{-- =================================================
             BANNER BIRU
        ================================================== --}}

        <div class="welcome-card">


            <h2>
                Data Tagging Kota Palembang
            </h2>


            <p>
                Kelola, cari, filter, dan pantau seluruh data tagging Kota Palembang.
            </p>


        </div>


        {{-- =================================================
             PESAN BERHASIL
        ================================================== --}}

        @if(session('success'))

            <div class="success-message">

                <span>
                    ✓
                </span>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif

        {{-- =================================================
             FILTER
        ================================================== --}}

        <div class="filter-card">


            <div class="filter-heading">

                <h3>
                    🔎 Cari dan Filter Data
                </h3>

                <span>
                    Gunakan filter untuk menemukan data
                </span>

            </div>


            <form
                action="{{ route('tagging.index') }}"
                method="GET"
                class="filter-form"
            >


                <input
                    type="text"
                    name="search"
                    class="filter-input"
                    placeholder="Cari Assignment ID, nama usaha, atau nama KK..."
                    value="{{ request('search') }}"
                >


                <select
                    name="kecamatan"
                    class="filter-select"
                >

                    <option value="">
                        Semua Kecamatan
                    </option>


                    @foreach($kecamatans as $kecamatan)

                        <option
                            value="{{ $kecamatan->kode_wilayah }}"
                            {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}
                        >

                            {{ $kecamatan->nama_wilayah }}

                        </option>

                    @endforeach


                </select>


                <button
                    type="submit"
                    class="filter-button"
                >
                    Cari Data
                </button>


                <a
                    href="{{ route('tagging.index') }}"
                    class="reset-button"
                >
                    Reset
                </a>


            </form>


        </div>


        {{-- =================================================
             TABEL DATA
        ================================================== --}}

        <div class="table-card">

    <div class="table-header">

        <div>
            <h3>Daftar Data Tagging</h3>
        </div>

        <span>
            Menampilkan {{ $taggings->count() }} data pada halaman ini
        </span>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Assignment ID</th>
                    <th>Status</th>
                    <th>Level 6 Full Code</th>
                    <th>Nama Usaha</th>
                    <th>Nama KK</th>
                    <th>Ada Keluarga</th>
                    <th>Ada Bang Usaha</th>
                    <th>Accuracy</th>
                    <th>Latitude</th>
                    <th>Longitude</th>

                    @if(auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>

            <tbody>

                @forelse($taggings as $index => $tagging)

                    <tr>

                        <td class="number-cell">
                            {{ $taggings->firstItem() + $index }}
                        </td>

                        <td class="code-cell">
                            {{ $tagging->assignment_id }}
                        </td>

                        <td>

                            @if($tagging->assignment_status_alias === 'APPROVED BY Pengawas')

                                <span class="status-badge status-approved">
                                    <span class="dot"></span>
                                    Approved
                                </span>

                            @elseif($tagging->assignment_status_alias === 'SUBMITTED BY Pencacah')

                                <span class="status-badge status-submitted">
                                    <span class="dot"></span>
                                    Submitted
                                </span>

                            @elseif($tagging->assignment_status_alias === 'REJECTED BY Pengawas')

                                <span class="status-badge status-rejected">
                                    <span class="dot"></span>
                                    Rejected
                                </span>

                            @else

                                <span class="status-badge">
                                    {{ $tagging->assignment_status_alias ?? '-' }}
                                </span>

                            @endif

                        </td>

                        <td class="code-cell">
                            {{ $tagging->level_6_full_code ?? '-' }}
                        </td>

                        <td class="business-name">
                            {{ $tagging->nama_usaha_bang ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->nama_kk ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->ada_keluarga_label ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->ada_bang_usaha_label ?? '-' }}
                        </td>

                        <td>
                            {{ $tagging->geotag_accuracy ?? '-' }}
                        </td>

                        <td class="location-cell">

                            @if($tagging->geotag_latitude)
                                {{ $tagging->geotag_latitude }}
                            @else
                                <span class="no-location">
                                    Tidak ada
                                </span>
                            @endif

                        </td>

                        <td class="location-cell">

                            @if($tagging->geotag_longitude)
                                {{ $tagging->geotag_longitude }}
                            @else
                                <span class="no-location">
                                    Tidak ada
                                </span>
                            @endif

                        </td>

                        @if(auth()->user()->role === 'admin')

                            <td class="action-cell">

                                <div class="action-buttons-table">

                                    <a
                                        href="{{ route('tagging.edit', $tagging->id) }}"
                                        class="action-btn edit-btn"
                                        title="Edit data">
                                        ✎
                                    </a>

                                    <form
                                        action="{{ route('tagging.destroy', $tagging->id) }}"
                                        method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                            title="Hapus data">
                                            🗑
                                        </button>

                                    </form>

                                </div>

                            </td>

                        @endif

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="{{ auth()->user()->role === 'admin' ? 12 : 11 }}"
                            class="empty-data">

                            <div class="empty-icon">
                                📭
                            </div>

                            <p>
                                Tidak ada data tagging yang ditemukan.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            @if($taggings->hasPages())


                <div class="pagination-area">


                    <div class="pagination-info">

                        Menampilkan

                        <strong>
                            {{ $taggings->firstItem() }}
                        </strong>

                        sampai

                        <strong>
                            {{ $taggings->lastItem() }}
                        </strong>

                        dari

                        <strong>
                            {{ $taggings->total() }}
                        </strong>

                        data

                    </div>


                    <div class="pagination">


                        {{-- PREVIOUS --}}

                        @if($taggings->onFirstPage())

                            <span class="disabled">
                                ‹
                            </span>

                        @else

                            <a href="{{ $taggings->previousPageUrl() }}">
                                ‹
                            </a>

                        @endif


                        {{-- NOMOR HALAMAN --}}

                        @foreach(
                            $taggings->getUrlRange(
                                max(1, $taggings->currentPage() - 2),
                                min($taggings->lastPage(), $taggings->currentPage() + 2)
                            )
                            as $page => $url
                        )


                            @if($page == $taggings->currentPage())

                                <span class="active">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $url }}">
                                    {{ $page }}
                                </a>

                            @endif


                        @endforeach


                        {{-- NEXT --}}

                        @if($taggings->hasMorePages())

                            <a href="{{ $taggings->nextPageUrl() }}">
                                ›
                            </a>

                        @else

                            <span class="disabled">
                                ›
                            </span>

                        @endif


                    </div>


                </div>


            @endif


        </div>


    </main>


</div>


</body>

</html>
