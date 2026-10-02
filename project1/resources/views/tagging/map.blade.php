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


        /* =========================================
           MAIN CONTENT
        ========================================= */

        .main-content {
            width: calc(100% - 250px);
            margin-left: 250px;
            padding: 25px 30px;
        }

        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
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
           WELCOME CARD
        ========================================= */

        .welcome-card {
            position: relative;
            overflow: hidden;
            padding: 18px 25px;
            margin-bottom: 15px;
            border-radius: 15px;
            background: linear-gradient(
                120deg,
                #096da5,
                #2196d3
            );
            color: white;
            box-shadow: 0 7px 20px rgba(8,112,168,0.18);
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -65px;
            top: -90px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.08);
        }

        .welcome-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            right: 100px;
            bottom: -60px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.05);
        }

        .welcome-card h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 5px;
            font-size: 20px;
        }

        .welcome-card p {
            position: relative;
            z-index: 1;
            margin: 0;
            color: #dff3ff;
            font-size: 13px;
        }


        /* =========================================
           FILTER
        ========================================= */

        .filter-card {
            background: white;
            border: 1px solid #e2eaf0;
            border-radius: 13px;
            padding: 14px 18px;
            margin-bottom: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1.8fr 1fr auto;
            gap: 12px;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 12px;
            font-weight: bold;
            color: #475569;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            border: 1px solid #d8e2e9;
            border-radius: 8px;
            background-color: white;
            color: #334155;
            font-family: Arial, sans-serif;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #0b79b5;
            box-shadow: 0 0 0 3px rgba(11, 121, 181, 0.10);
        }

        .filter-actions {
            display: flex;
            gap: 7px;
        }

        .btn-search {
            height: 40px;
            padding: 0 17px;
            border: none;
            border-radius: 8px;
            background-color: #075985;
            color: white;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-search:hover {
            background-color: #064d70;
        }

        .btn-reset {
            height: 40px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            border: 1px solid #d8e2e9;
            border-radius: 8px;
            background-color: white;
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            white-space: nowrap;
        }

        .btn-reset:hover {
            background-color: #f5f8fa;
        }


        /* =========================================
           MAP CARD
        ========================================= */

        .map-card {
            overflow: hidden;
            background: white;
            border: 1px solid #e2eaf0;
            border-radius: 13px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        .map-header {
            min-height: 55px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 18px;
            border-bottom: 1px solid #e8eef2;
        }

        .map-header-left h3 {
            margin: 0 0 3px;
            font-size: 15px;
            color: #172033;
        }

        .map-header-left p {
            margin: 0;
            color: #718096;
            font-size: 11px;
        }

        .map-legend {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #64748b;
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


        /*
         * PETA MEMAKAI RUANG LAYAR YANG TERSISA
         */

        #map {
            width: 100%;
            height: calc(100vh - 350px);
            min-height: 500px;
        }


        /* =========================================
           POPUP
        ========================================= */

        .popup-title {
            margin: 0 0 12px;
            padding-bottom: 9px;
            border-bottom: 1px solid #e5edf2;
            color: #075985;
            font-size: 16px;
        }

        .popup-row {
            margin-bottom: 9px;
            font-size: 12px;
            line-height: 1.5;
        }

        .popup-label {
            display: block;
            margin-bottom: 2px;
            color: #718096;
            font-size: 11px;
        }

        .popup-value {
            color: #334155;
            font-weight: 500;
            word-break: break-word;
        }

        .popup-status {
            display: inline-block;
            padding: 4px 8px;
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
            color: #172033;
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
            padding: 13px 15px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.15);
            color: #475569;
            font-size: 12px;
            line-height: 1.7;
            min-width: 155px;
        }

        .map-info-title {
            margin-bottom: 7px;
            color: #172033;
            font-size: 14px;
            font-weight: bold;
        }

        .map-info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {

            .filter-form {
                grid-template-columns: 1fr 1fr;
            }

            .filter-actions {
                grid-column: 1 / -1;
            }

            #map {
                height: calc(100vh - 410px);
            }

        }


        @media (max-width: 1000px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                width: calc(100% - 220px);
                margin-left: 220px;
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


        @media (max-width: 480px) {

            .main-content {
                padding: 15px;
            }

            .welcome-card {
                padding: 18px 20px;
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


        <!-- HEADER -->

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



        <!-- WELCOME -->

        <div class="welcome-card">

            <h2>
                Peta Data Tagging
            </h2>

            <p>
                Visualisasi persebaran lokasi data tagging berdasarkan
                wilayah dan status data di Kota Palembang.
            </p>

        </div>



        <!-- FILTER -->

        <div class="filter-card">

            <form
                action="{{ route('tagging.map') }}"
                method="GET"
                class="filter-form"
            >

                <!-- Search -->

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


                <!-- Kecamatan -->

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


                <!-- Buttons -->

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



        <!-- MAP CARD -->

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

                        <span class="legend-dot legend-approved"></span>

                        Approved

                    </div>


                    <div class="legend-item">

                        <span class="legend-dot legend-submitted"></span>

                        Submitted

                    </div>


                    <div class="legend-item">

                        <span class="legend-dot legend-rejected"></span>

                        Rejected

                    </div>

                </div>

            </div>


            <div id="map"></div>


        </div>


    </main>



    <!-- =========================================
         LEAFLET JS
    ========================================= -->

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



            // Hanya data dengan koordinat valid

            if (
                !isNaN(latitude) &&
                !isNaN(longitude)
            ) {


                // Simpan posisi marker

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



            // Mencegah klik panel mengganggu peta

            L.DomEvent.disableClickPropagation(div);



            return div;

        };



        infoStatus.addTo(map);


    </script>


</body>
</html>