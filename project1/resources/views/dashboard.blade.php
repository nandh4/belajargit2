<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- CSS DASHBOARD --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- LEAFLET CSS --}}
    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body>

 @php
        $accountUser = auth()->user();
    @endphp

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="main-content">

        {{-- TOP BAR --}}
        <div class="top-bar">

            <div class="page-title">
                <!-- <h2>
                    Selamat Datang, {{ auth()->user()->name }}
                </h2> -->
            </div>

            <div class="header-right">

                {{-- UPDATE INFO --}}
                <div class="update-info">
                    <span class="update-label">
                        Data terakhir diperbarui
                    </span>

                    <span class="update-date">
                        @if($lastUpdated)
                            {{ \Carbon\Carbon::parse($lastUpdated)
                                ->setTimezone('Asia/Jakarta')
                                ->format('d F Y, H.i') }} WIB
                        @else
                            Belum tersedia
                        @endif
                    </span>
                </div>

                {{-- USER PROFILE --}}
                <div class="user-profile-wrapper" id="userProfile">

                    <button type="button"
                        class="user-profile-button"
                        id="profileToggle"
                        aria-expanded="false"
                        aria-controls="userDropdown">

                        <div class="user-avatar">
                            {{ strtoupper(substr($accountUser->name, 0, 1)) }}
                        </div>

                        <div class="user-details">

                            <div class="user-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="user-username">
                                {{ auth()->user()->username }}

                            </div>

                            <span class="user-role">
                                {{ auth()->user()->role }}
                            </span>

                        </div>

                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>

                    </button>

                    {{-- DROPDOWN PROFILE --}}
                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-header">
                            <strong>{{ auth()->user()->name }}</strong>
                            <span>{{  auth()->user()->username }}</span>
                        </div>
                        <div class="dropdown-divider"></div>

                        <a href="{{ route('user.settings') }}"
                            class="dropdown-item">

                            <i class="fa-solid fa-gear"></i>
                            <span>Pengaturan Akun</span>

                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="dropdown-item2">

                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>

                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- WELCOME CARD --}}
        <section class="welcome-card">

            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM PENGELOLAAN DATA TAGGING
                </span>

                <h2>Dashboard</h2>
                <p>Ringkasan data dan pemantauan data tagging</p>
               

            </div>

        </section>


        {{-- RINGKASAN DATA --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h2 class="section-title">Ringkasan Data</h2>
                        <p class="section-subtitle">
                            Informasi utama
                        </p>
                    </div>

                </div>

            </div>


            <div class="stats">

                {{-- TOTAL USER --}}
                <div class="stat-card">

                    <div class="stat-head">
                        <span class="stat-label">Total Akun User</span>

                        <span class="stat-icon purple-bg">
                            <i class="fa-solid fa-users"></i>
                        </span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalUser) }}
                    </div>

                    <div class="stat-bottom">
                        <span>Akun User terdaftar</span>
                        <span>User</span>
                    </div>

                </div>

                  <div class="stat-card">

                    <div class="stat-head">
                        <span class="stat-label">Total Data Tagging</span>

                        <span class="stat-icon pink-bg">
                            <i class="fa-solid fa-database"></i>
                        </span>
                    </div>

                    <div class="stat-number">
                        {{ number_format($totalData) }}
                    </div>

                    <div class="stat-bottom">
                        <span>Seluruh data</span>
                        <span>100%</span>
                    </div>

                </div>

            </div>

        </section>


        {{-- MONITORING DATA --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h2 class="section-title">Monitoring Data Tagging</h2>

                        <p class="section-subtitle">
                            Status dan sebaran data tagging
                        </p>
                    </div>

                </div>

                <span class="section-note">
                    Monitoring terkini
                </span>

            </div>


            <div class="monitoring-layout">

                {{-- STATUS DATA --}}
                <div class="panel">

                    <div class="panel-heading">
                        <h3>Status Data Tagging</h3>
                    </div>


                    {{-- APPROVED --}}
                    <div class="status-row">

                        <div class="status-info">
                            <span>Approved</span>

                            <b>
                                {{ $approved }} data · {{ $approvedPercent }}%
                            </b>
                        </div>

                        <div class="bar">
                            <div class="fill approved"
                                style="width: {{ $approvedPercent }}%">
                            </div>
                        </div>

                    </div>


                    {{-- SUBMITTED --}}
                    <div class="status-row">

                        <div class="status-info">
                            <span>Submitted</span>

                            <b>
                                {{ $submitted }} data · {{ $submittedPercent }}%
                            </b>
                        </div>

                        <div class="bar">
                            <div class="fill submitted"
                                style="width: {{ $submittedPercent }}%">
                            </div>
                        </div>

                    </div>


                    {{-- REJECTED --}}
                    <div class="status-row">

                        <div class="status-info">
                            <span>Rejected</span>

                            <b>
                                {{ $rejected }} data · {{ $rejectedPercent }}%
                            </b>
                        </div>

                        <div class="bar">
                            <div class="fill rejected"
                                style="width: {{ $rejectedPercent }}%">
                            </div>
                        </div>

                    </div>


                    {{-- LOKASI --}}
                    <div class="location-summary">

                        <div class="location-box">
                            <small>Data dengan koordinat</small>

                            <strong>
                                {{ number_format($withLocation) }}
                            </strong>
                        </div>

                        <div class="location-box warning">
                            <small>Data tanpa koordinat</small>

                            <strong>
                                {{ number_format($withoutLocation) }}
                            </strong>
                        </div>

                    </div>


                    {{-- PERINGATAN --}}
                    @if($withoutLocation > 0)

                        <div class="attention">

                            <div class="attention-icon">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                            </div>

                            <div class="attention-text">
                                <strong>Perlu diperiksa</strong>

                                Terdapat {{ $withoutLocation }}
                                data yang belum memiliki koordinat lokasi
                            </div>

                        </div>

                    @else

                        <div class="attention success">

                            <div class="attention-icon">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>

                            <div class="attention-text">
                                <strong>Kondisi lokasi baik</strong>

                                Seluruh data telah memiliki koordinat lokasi.
                            </div>

                        </div>

                    @endif

                </div>


                {{-- MINI MAP --}}
                <div class="panel map-panel">

                    <div class="panel-heading">
                        <h3>Sebaran Data Tagging</h3>
                        <span>Kota Palembang</span>
                    </div>

                    <div id="dashboardMap"></div>
                    <br>
                    <div class="map-footer">

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
                        <br>
                        <a href="{{ route('tagging.map') }}"
                            class="map-button">

                            Buka Peta Lengkap
                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </section>


        {{-- DISTRIBUSI KECAMATAN --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h2 class="section-title">
                            Jumlah Data Tagging per Kecamatan
                        </h2>

                    </div>

                </div>

                <span class="section-note">Kota Palembang</span>

            </div>


            <div class="panel district-panel">

                @php
                    $maxDistrictData = collect($dataPerKecamatan)->max('jumlah') ?? 0;
                @endphp

                @if(count($dataPerKecamatan) > 0)

                    <div class="district-list">

                        @foreach($dataPerKecamatan as $district)

                            @php
                                $districtPercent = $maxDistrictData > 0
                                    ? ($district['jumlah'] / $maxDistrictData) * 100
                                    : 0;
                            @endphp

                            <div class="district-item">

                                <div class="district-head">

                                    <span class="district-name"
                                        title="{{ $district['nama'] }}">
                                        {{ $district['nama'] }}
                                    </span>

                                    <span class="district-count">
                                        {{ number_format($district['jumlah']) }} data
                                    </span>

                                </div>

                                <div class="district-bar">

                                    <div class="district-fill"
                                        style="width: {{ $districtPercent }}%">
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-district">
                        Belum terdapat data kecamatan.
                    </div>

                @endif

            </div>

        </section>

    </main>


    {{-- FOOTER --}}
    @include('layouts.footer')


    {{-- LEAFLET JAVASCRIPT --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    {{-- DASHBOARD JAVASCRIPT --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =====================================
               DROPDOWN PROFIL
            ===================================== */

            const profileToggle = document.getElementById('profileToggle');
            const userDropdown = document.getElementById('userDropdown');

            if (profileToggle && userDropdown) {

                profileToggle.addEventListener('click', function (event) {

                    event.stopPropagation();

                    const isOpen = userDropdown.classList.toggle('show');

                    profileToggle.setAttribute(
                        'aria-expanded',
                        isOpen ? 'true' : 'false'
                    );

                });

                document.addEventListener('click', function (event) {

                    if (!event.target.closest('#userProfile')) {

                        userDropdown.classList.remove('show');

                        profileToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }

                });

                document.addEventListener('keydown', function (event) {

                    if (event.key === 'Escape') {

                        userDropdown.classList.remove('show');

                        profileToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                    }

                });

            }


            /* =====================================
               DASHBOARD MAP
            ===================================== */

            const mapElement = document.getElementById('dashboardMap');

            if (!mapElement || typeof L === 'undefined') {
                return;
            }

            const mapData = @json($mapData);

            const map = L.map('dashboardMap', {
                scrollWheelZoom: false
            });

            L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }
            ).addTo(map);


            const defaultCenter = [-2.9761, 104.7754];

            map.setView(defaultCenter, 11);


            /* WARNA MARKER BERDASARKAN STATUS */

            function getMarkerColor(status) {

                if (status === 'APPROVED BY Pengawas') {
                    return '#25866A';
                }

                if (status === 'SUBMITTED BY Pencacah') {
                    return '#D9A52B';
                }

                if (status === 'REJECTED BY Pengawas') {
                    return '#D9534F';
                }

                return '#17365D';

            }


            const markers = [];


            /* MEMBUAT MARKER */

            if (Array.isArray(mapData)) {

                mapData.forEach(function (data) {

                    const latitude = parseFloat(data.geotag_latitude);
                    const longitude = parseFloat(data.geotag_longitude);

                    if (
                        !Number.isFinite(latitude) ||
                        !Number.isFinite(longitude) ||
                        latitude < -90 ||
                        latitude > 90 ||
                        longitude < -180 ||
                        longitude > 180
                    ) {
                        return;
                    }

                    const color = getMarkerColor(
                        data.assignment_status_alias
                    );


                    const markerIcon = L.divIcon({

                        className: 'custom-dashboard-marker',

                        html: `
                            <span class="dashboard-marker-dot"
                                style="background-color: ${color};">
                            </span>
                        `,

                        iconSize: [20, 20],
                        iconAnchor: [10, 10]

                    });


                    const marker = L.marker(
                        [latitude, longitude],
                        {
                            icon: markerIcon
                        }
                    ).addTo(map);


                    /* POPUP */

                    const popupContent = document.createElement('div');

                    popupContent.className = 'map-popup';


                    function addPopupRow(label, value) {

                        const row = document.createElement('div');

                        row.className = 'map-popup-row';

                        const strong = document.createElement('strong');

                        strong.textContent = label + ': ';

                        const span = document.createElement('span');

                        span.textContent = value ?? '-';

                        row.appendChild(strong);
                        row.appendChild(span);

                        popupContent.appendChild(row);

                    }


                    const title = document.createElement('strong');

                    title.className = 'map-popup-title';

                    title.textContent = data.nama_usaha_bang || '-';

                    popupContent.appendChild(title);


                    addPopupRow('Assignment ID', data.assignment_id);
                    addPopupRow('Status', data.assignment_status_alias);
                    addPopupRow('Nama KK', data.nama_kk);
                    addPopupRow('Akurasi', data.geotag_accuracy);


                    marker.bindPopup(popupContent);

                    markers.push(marker);

                });

            }


            /* MENYESUAIKAN ZOOM PETA */

            if (markers.length > 0) {

                const group = L.featureGroup(markers);

                map.fitBounds(
                    group.getBounds(),
                    {
                        padding: [20, 20],
                        maxZoom: 15
                    }
                );

            }


            setTimeout(function () {
                map.invalidateSize();
            }, 200);

        });

    </script>

</body>
</html>