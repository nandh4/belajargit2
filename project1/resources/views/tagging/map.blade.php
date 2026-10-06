<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lihat Peta - Data Tagging BPS</title>

    <!-- Leaflet CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >

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

            background: #fbf8fa;

            color: #40393d;
        }



        /* =========================================
           SIDEBAR
           SAMA DENGAN DASHBOARD
        ========================================= */

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
                rgba(126, 72, 91, 0.10);

            z-index: 1000;

            overflow: hidden;
        }



        .sidebar-brand {

            text-align: center;

            margin-bottom: 25px;

            flex-shrink: 0;
        }



        .brand-icon {

            width: 52px;

            height: 52px;

            margin: 0 auto 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                rgba(255, 255, 255, 0.22);

            border-radius: 14px;

            font-size: 25px;

            box-shadow:
                0 4px 12px
                rgba(126, 72, 91, 0.08);
        }



        .sidebar-brand h2 {

            margin: 0;

            font-size: 16px;

            font-weight: 700;

            letter-spacing: 0.5px;
        }



        .sidebar-brand p {

            margin: 5px 0 0;

            font-size: 11px;

            line-height: 1.5;

            opacity: 0.9;
        }



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

            padding: 11px 13px;

            border-radius: 9px;

            color: white;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }



        .sidebar-menu a:hover {

            background:
                rgba(255, 255, 255, 0.16);
        }



        .sidebar-menu a.active {

            background:
                rgba(255, 255, 255, 0.25);

            box-shadow:
                0 4px 10px
                rgba(126, 72, 91, 0.08);
        }



        .menu-icon {

            width: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 16px;

            flex-shrink: 0;
        }



        .sidebar-bottom {

            margin-top: auto;

            flex-shrink: 0;
        }



        .user-mini {

            padding: 12px 13px;

            margin-bottom: 8px;

            background:
                rgba(255, 255, 255, 0.12);

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



        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 13px;

            border: none;

            border-radius: 9px;

            background:
                rgba(255, 255, 255, 0.12);

            color: white;

            cursor: pointer;

            font-size: 14px;

            text-align: left;

            transition: 0.2s;
        }



        .logout-button:hover {

            background: #c96f89;
        }



        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-content {

            width:
                calc(100% - 250px);

            margin-left: 250px;

            padding:
                28px 34px 40px;

            min-height: 100vh;
        }



        /* =========================================
           TOP BAR
        ========================================= */

        .top-bar {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 18px;
        }



        .page-title h1 {

            margin:
                0 0 5px;

            color: #383236;

            font-size: 25px;
        }



        .page-title p {

            margin: 0;

            color: #81767c;

            font-size: 13px;
        }



        .system-badge {

            display: flex;

            align-items: center;

            gap: 7px;

            padding:
                9px 14px;

            background: white;

            border:
                1px solid #eee1e7;

            border-radius: 9px;

            color: #a95472;

            font-size: 12px;

            box-shadow:
                0 2px 8px
                rgba(126, 72, 91, 0.03);
        }



        .system-badge span {

            color: #d98fa8;

            font-size: 10px;
        }



        /* =========================================
           WELCOME CARD
        ========================================= */

        .welcome-card {

            position: relative;

            overflow: hidden;

            padding:
                19px 24px;

            margin-bottom: 16px;

            border-radius: 13px;

            background:
                linear-gradient(
                    120deg,
                    #d88ea7,
                    #ecb2c5
                );

            color: white;

            box-shadow:
                0 7px 20px
                rgba(217, 143, 168, 0.20);
        }



        .welcome-card::before {

            content: "";

            position: absolute;

            width: 180px;

            height: 180px;

            right: -65px;

            top: -90px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.12);
        }



        .welcome-card::after {

            content: "";

            position: absolute;

            width: 90px;

            height: 90px;

            right: 100px;

            bottom: -60px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.08);
        }



        .welcome-card h2 {

            position: relative;

            z-index: 1;

            margin:
                0 0 5px;

            font-size: 20px;
        }



        .welcome-card p {

            position: relative;

            z-index: 1;

            margin: 0;

            color: #fff5f8;

            font-size: 13px;

            line-height: 1.5;
        }



        /* =========================================
           FILTER CARD
        ========================================= */

        .filter-card {

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 13px;

            padding:
                15px 18px;

            margin-bottom: 16px;

            box-shadow:
                0 3px 12px
                rgba(126, 72, 91, 0.04);
        }



        .filter-form {

            display: grid;

            grid-template-columns:
                1.8fr 1fr auto;

            gap: 12px;

            align-items: end;
        }



        .form-group {

            display: flex;

            flex-direction: column;

            gap: 6px;
        }



        .form-group label {

            color: #5f565b;

            font-size: 12px;

            font-weight: bold;
        }



        .form-group input,
        .form-group select {

            width: 100%;

            height: 40px;

            padding:
                0 12px;

            border:
                1px solid #e8d8df;

            border-radius: 8px;

            background: white;

            color: #40393d;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            font-size: 13px;

            outline: none;

            transition: 0.2s;
        }



        .form-group input::placeholder {

            color: #a79ba1;
        }



        .form-group input:focus,
        .form-group select:focus {

            border-color: #d98fa8;

            box-shadow:
                0 0 0 3px
                rgba(217, 143, 168, 0.12);
        }



        .filter-actions {

            display: flex;

            gap: 7px;
        }



        .btn-search {

            height: 40px;

            padding:
                0 17px;

            border: none;

            border-radius: 8px;

            background: #d98fa8;

            color: white;

            font-size: 13px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }



        .btn-search:hover {

            background: #c97996;

            transform:
                translateY(-1px);
        }



        .btn-reset {

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding:
                0 14px;

            border:
                1px solid #e5cbd5;

            border-radius: 8px;

            background: #fffafb;

            color: #a95472;

            text-decoration: none;

            font-size: 13px;

            white-space: nowrap;

            transition: 0.2s;
        }



        .btn-reset:hover {

            background: #f7dce5;

            border-color: #dfb3c3;
        }



        /* =========================================
           MAP CARD
        ========================================= */

        .map-card {

            overflow: hidden;

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 13px;

            box-shadow:
                0 3px 12px
                rgba(126, 72, 91, 0.04);
        }



        .map-header {

            min-height: 58px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding:
                11px 18px;

            border-bottom:
                1px solid #f0e4e8;
        }



        .map-header-left h3 {

            margin:
                0 0 3px;

            color: #a95472;

            font-size: 15px;
        }



        .map-header-left p {

            margin: 0;

            color: #81767c;

            font-size: 11px;
        }



        /* =========================================
           LEGEND
        ========================================= */

        .map-legend {

            display: flex;

            align-items: center;

            gap: 15px;

            flex-wrap: wrap;
        }



        .legend-item {

            display: flex;

            align-items: center;

            gap: 6px;

            color: #746970;

            font-size: 11px;
        }



        .legend-dot {

            width: 9px;

            height: 9px;

            border-radius: 50%;
        }



        .legend-approved {

            background-color: #28a745;
        }



        .legend-submitted {

            background-color: #ffc107;
        }



        .legend-rejected {

            background-color: #dc3545;
        }



        /* =========================================
           MAP
        ========================================= */

        #map {

            width: 100%;

            height:
                calc(100vh - 350px);

            min-height: 500px;
        }



        /* =========================================
           LEAFLET POPUP
        ========================================= */

        .leaflet-popup-content-wrapper {

            border-radius: 10px;

            box-shadow:
                0 5px 18px
                rgba(126, 72, 91, 0.15);
        }



        .leaflet-popup-content {

            margin: 14px;

            line-height: 1.5;
        }



        .popup-title {

            margin:
                0 0 12px;

            padding-bottom: 9px;

            border-bottom:
                1px solid #f0dfe5;

            color: #a95472;

            font-size: 16px;
        }



        .popup-row {

            margin-bottom: 9px;

            font-size: 12px;

            line-height: 1.5;
        }



        .popup-row:last-child {

            margin-bottom: 0;
        }



        .popup-label {

            display: block;

            margin-bottom: 2px;

            color: #81767c;

            font-size: 11px;
        }



        .popup-value {

            color: #40393d;

            font-weight: 500;

            word-break: break-word;
        }



        .popup-status {

            display: inline-block;

            padding:
                4px 8px;

            border-radius: 12px;

            font-size: 10px;

            font-weight: bold;
        }



        .status-approved {

            background-color: #28a745;

            color: white;
        }



        .status-submitted {

            background-color: #ffc107;

            color: #40393d;
        }



        .status-rejected {

            background-color: #dc3545;

            color: white;
        }



        .status-other {

            background-color: #6c757d;

            color: white;
        }



        /* =========================================
           MAP INFO
        ========================================= */

        .map-info {

            padding:
                13px 15px;

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 10px;

            box-shadow:
                0 4px 14px
                rgba(126, 72, 91, 0.12);

            color: #746970;

            font-size: 12px;

            line-height: 1.7;

            min-width: 165px;
        }



        .map-info-title {

            margin-bottom: 7px;

            color: #a95472;

            font-size: 14px;

            font-weight: bold;
        }



        .map-info-row {

            display: flex;

            justify-content: space-between;

            gap: 20px;
        }



        .map-info-row strong {

            color: #40393d;
        }



        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;

                min-height: auto;

                padding: 20px 15px;

                overflow: visible;
            }



            .sidebar-menu {

                display: grid;

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 5px;
            }



            .sidebar-bottom {

                margin-top: 20px;
            }



            .main-content {

                width: 100%;

                margin-left: 0;

                padding:
                    20px;
            }



            .top-bar {

                align-items: flex-start;

                flex-direction: column;

                gap: 12px;
            }



            .filter-form {

                grid-template-columns: 1fr;
            }



            .filter-actions {

                grid-column: auto;
            }



            .map-header {

                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }



            #map {

                height: 500px;
            }

        }



        @media (max-width: 430px) {

            .sidebar-menu {

                grid-template-columns: 1fr;
            }



            .main-content {

                padding:
                    15px;
            }



            .welcome-card {

                padding:
                    18px 20px;
            }



            .welcome-card h2 {

                font-size: 18px;
            }



            .filter-card {

                padding: 14px;
            }



            .filter-actions {

                flex-direction: column;
            }



            .btn-search,
            .btn-reset {

                width: 100%;

                justify-content: center;
            }



            .map-legend {

                gap: 10px;
            }



            #map {

                height: 450px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================================
         SIDEBAR
    ========================================= -->

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



            <!-- HALAMAN AKTIF -->

            <a
                href="{{ route('tagging.map') }}"
                class="active"
            >

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>



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



            <a href="{{ route('account.settings') }}">

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Pengaturan Akun
                </span>

            </a>


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



    <!-- =========================================
         MAIN CONTENT
    ========================================= -->

    <main class="main-content">


        <div class="top-bar">


            <div class="page-title">

                <h1>
                    Lihat Peta
                </h1>

                <p>
                    Visualisasi lokasi data tagging Kota Palembang
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
                Peta Data Tagging
            </h2>

            <p>
                Visualisasi persebaran lokasi data tagging berdasarkan
                wilayah dan status data di Kota Palembang.
            </p>

        </div>



        <div class="filter-card">


            <form
                action="{{ route('tagging.map') }}"
                method="GET"
                class="filter-form"
            >


                <div class="form-group">

                    <label for="search">
                        Cari Data
                    </label>

                    <input
                        type="text"
                        name="search"
                        id="search"
                        value="{{ request('search') }}"
                        placeholder="Assignment ID, Level 6 Code, nama usaha, atau nama KK"
                    >

                </div>



                <div class="form-group">

                    <label for="kecamatan">
                        Kecamatan
                    </label>

                    <select
                        name="kecamatan"
                        id="kecamatan"
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

                </div>



                <div class="filter-actions">


                    <button
                        type="submit"
                        class="btn-search"
                    >

                        🔎 Cari

                    </button>



                    @if(request('search') || request('kecamatan'))

                        <a
                            href="{{ route('tagging.map') }}"
                            class="btn-reset"
                        >

                            Reset

                        </a>

                    @endif


                </div>


            </form>


        </div>



        <div class="map-card">


            <div class="map-header">


                <div class="map-header-left">

                    <h3>
                        🗺️ Persebaran Data Tagging
                    </h3>

                    <p>
                        Klik marker pada peta untuk melihat detail data.
                    </p>

                </div>



                <div class="map-legend">


                    <div class="legend-item">

                        <span
                            class="legend-dot legend-approved"
                        ></span>

                        Approved

                    </div>


                    <div class="legend-item">

                        <span
                            class="legend-dot legend-submitted"
                        ></span>

                        Submitted

                    </div>


                    <div class="legend-item">

                        <span
                            class="legend-dot legend-rejected"
                        ></span>

                        Rejected

                    </div>


                </div>


            </div>



            <div id="map"></div>


        </div>


    </main>



    <!-- Leaflet JS -->

    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    ></script>



    <script>


        // =========================================
        // MEMBUAT PETA
        // =========================================

        var map = L.map('map').setView(
            [-2.9769683, 104.7568333],
            12
        );



        // =========================================
        // OPEN STREET MAP
        // =========================================

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution:
                    '&copy; OpenStreetMap contributors'
            }
        ).addTo(map);



        // =========================================
        // DATA TAGGING DARI LARAVEL
        // =========================================

        var taggings = @json($taggings);



        // =========================================
        // MENYIMPAN MARKER
        // =========================================

        var markers = [];



        // =========================================
        // COUNTER STATUS
        // =========================================

        var jumlahApproved = 0;

        var jumlahSubmitted = 0;

        var jumlahRejected = 0;



        // =========================================
        // MEMBUAT MARKER
        // =========================================

        taggings.forEach(function(tagging) {


            var latitude = parseFloat(
                tagging.geotag_latitude
            );


            var longitude = parseFloat(
                tagging.geotag_longitude
            );



            if (
                !isNaN(latitude) &&
                !isNaN(longitude)
            ) {


                markers.push([
                    latitude,
                    longitude
                ]);



                // =================================
                // MENENTUKAN WARNA MARKER
                // =================================

                var markerColor = 'green';



                if (
                    tagging.assignment_status_alias ===
                    'SUBMITTED BY Pencacah'
                ) {

                    markerColor = 'yellow';

                    jumlahSubmitted++;

                }


                else if (
                    tagging.assignment_status_alias ===
                    'REJECTED BY Pengawas'
                ) {

                    markerColor = 'red';

                    jumlahRejected++;

                }


                else if (
                    tagging.assignment_status_alias ===
                    'APPROVED BY Pengawas'
                ) {

                    jumlahApproved++;

                }



                // =================================
                // ICON MARKER
                // =================================

                var markerIcon = L.icon({

                    iconUrl:
                        'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-' +
                        markerColor +
                        '.png',

                    shadowUrl:
                        'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',

                    iconSize: [
                        25,
                        41
                    ],

                    iconAnchor: [
                        12,
                        41
                    ],

                    popupAnchor: [
                        1,
                        -34
                    ],

                    shadowSize: [
                        41,
                        41
                    ]

                });



                // =================================
                // MEMBUAT MARKER
                // =================================

                var marker = L.marker(

                    [
                        latitude,
                        longitude
                    ],

                    {
                        icon: markerIcon,

                        zIndexOffset: 1000
                    }

                ).addTo(map);



                // =================================
                // STATUS POPUP
                // =================================

                var statusClass =
                    'status-other';


                var statusText =
                    tagging.assignment_status_alias ?? '-';



                if (
                    tagging.assignment_status_alias ===
                    'APPROVED BY Pengawas'
                ) {

                    statusClass =
                        'status-approved';

                    statusText =
                        'Approved';

                }


                else if (
                    tagging.assignment_status_alias ===
                    'SUBMITTED BY Pencacah'
                ) {

                    statusClass =
                        'status-submitted';

                    statusText =
                        'Submitted';

                }


                else if (
                    tagging.assignment_status_alias ===
                    'REJECTED BY Pengawas'
                ) {

                    statusClass =
                        'status-rejected';

                    statusText =
                        'Rejected';

                }



                // =================================
                // POPUP
                // =================================

                marker.bindPopup(`

                    <div style="min-width: 270px;">

                        <h3 class="popup-title">
                            Data Tagging
                        </h3>


                        <div class="popup-row">

                            <span class="popup-label">
                                Assignment ID
                            </span>

                            <span class="popup-value">
                                ${tagging.assignment_id ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Status
                            </span>

                            <span class="popup-status ${statusClass}">
                                ${statusText}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Nama Usaha / Bangunan
                            </span>

                            <span class="popup-value">
                                ${tagging.nama_usaha_bang ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Nama KK
                            </span>

                            <span class="popup-value">
                                ${tagging.nama_kk ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Level 6 Full Code
                            </span>

                            <span class="popup-value">
                                ${tagging.level_6_full_code ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Ada Keluarga
                            </span>

                            <span class="popup-value">
                                ${tagging.ada_keluarga_label ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Ada Bangunan / Usaha
                            </span>

                            <span class="popup-value">
                                ${tagging.ada_bang_usaha_label ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Geotag Accuracy
                            </span>

                            <span class="popup-value">
                                ${tagging.geotag_accuracy ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Latitude
                            </span>

                            <span class="popup-value">
                                ${tagging.geotag_latitude ?? '-'}
                            </span>

                        </div>


                        <div class="popup-row">

                            <span class="popup-label">
                                Longitude
                            </span>

                            <span class="popup-value">
                                ${tagging.geotag_longitude ?? '-'}
                            </span>

                        </div>

                    </div>

                `);


            }

        });



        // =========================================
        // MENYESUAIKAN PETA DENGAN MARKER
        // =========================================

        if (markers.length > 0) {

            map.fitBounds(

                markers,

                {
                    padding: [
                        40,
                        40
                    ]
                }

            );

        }



        // =========================================
        // RINGKASAN DATA
        // =========================================

        var infoStatus = L.control({

            position: 'topright'

        });



        infoStatus.onAdd = function() {


            var div = L.DomUtil.create(
                'div',
                'map-info'
            );



            div.innerHTML = `

                <div class="map-info-title">
                    Ringkasan Data
                </div>


                <div class="map-info-row">

                    <span>
                        Jumlah Titik
                    </span>

                    <strong>
                        ${markers.length}
                    </strong>

                </div>


                <div class="map-info-row">

                    <span>
                        🟢 Approved
                    </span>

                    <strong>
                        ${jumlahApproved}
                    </strong>

                </div>


                <div class="map-info-row">

                    <span>
                        🟡 Submitted
                    </span>

                    <strong>
                        ${jumlahSubmitted}
                    </strong>

                </div>


                <div class="map-info-row">

                    <span>
                        🔴 Rejected
                    </span>

                    <strong>
                        ${jumlahRejected}
                    </strong>

                </div>

            `;



            L.DomEvent.disableClickPropagation(div);



            return div;

        };



        infoStatus.addTo(map);


    </script>


</body>

</html>