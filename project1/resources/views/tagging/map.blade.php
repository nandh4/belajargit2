
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lihat Peta | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- CSS UTAMA DASHBOARD --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tagging/map.css') }}">

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

    <main class="main-content">

        {{-- TOP BAR --}}
        <div class="top-bar">

            <div class="page-title">
            </div>

            {{-- USER PROFILE --}}
            <div class="header-right">

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
                                {{ ucfirst(auth()->user()->role) }}
                            </span>

                        </div>

                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>

                    </button>

                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-header">
                            <strong>{{ auth()->user()->name }}</strong>
                            <span>{{ auth()->user()->username }}</span>
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

                            <button type="submit" class="dropdown-item2">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Keluar</span>
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

                <h2>Lihat Peta</h2>

                <p>
                    Pantau persebaran lokasi data tagging berdasarkan
                    wilayah dan status data
                    melalui visualisasi peta interaktif
                </p>

            </div>

        </section>


        {{-- FILTER PETA --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Filter Peta</h2>

                        <p class="section-subtitle">
                            Gunakan pencarian dan filter untuk menemukan lokasi data
                        </p>
                    </div>

                </div>

            </div>

            <form action="{{ route('tagging.map') }}"
                method="GET"
                class="map-filter-card">

                <div class="map-filter-grid">

                    {{-- PENCARIAN --}}
                    <div class="map-form-group">

                        <label for="search">
                            Pencarian
                        </label>

                        <div class="map-input-wrapper">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            <input
                                type="text"
                                name="search"
                                id="search"
                                class="map-form-control"
                                value="{{ request('search') }}"
                                placeholder="Assignment ID, kode wilayah, nama usaha, atau nama KK..."
                            >

                        </div>

                    </div>


                    {{-- KECAMATAN --}}
                    <div class="map-form-group">

                        <label for="kecamatan">
                            Kecamatan
                        </label>

                        <select
                            name="kecamatan"
                            id="kecamatan"
                            class="map-form-control">

                            <option value="">
                                Semua Kecamatan
                            </option>

                            @foreach($kecamatans as $kecamatan)

                                <option
                                    value="{{ $kecamatan->kode_wilayah }}"
                                    {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}>

                                    {{ $kecamatan->nama_wilayah }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <div class="map-filter-actions">

                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari Lokasi
                    </button>

                    <a href="{{ route('tagging.map') }}"
                        class="btn-reset">

                        <i class="fa-solid fa-rotate-left"></i>
                        Reset

                    </a>

                </div>

            </form>

        </section>


        {{-- PETA PERSEBARAN --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Persebaran Data Tagging</h2>

                        <p class="section-subtitle">
                            Klik marker pada peta untuk melihat detail informasi data
                        </p>
                    </div>

                </div>

            </div>


            <div class="map-card">

                {{-- HEADER PETA --}}
                <div class="map-card-header">

                    <div class="map-card-heading">

                        <div class="map-heading-icon">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>

                        <div>
                            <h3>Peta Lokasi Data Tagging</h3>

                            <p>
                                Lokasi ditampilkan berdasarkan koordinat data tagging
                            </p>
                        </div>

                    </div>


                    {{-- LEGENDA --}}
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


                {{-- AREA PETA --}}
                <div id="map"></div>

            </div>

        </section>

    </main>


    {{-- FOOTER --}}
    @include('layouts.footer')


    {{-- LEAFLET JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* =====================================
               DROPDOWN PROFILE
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
               MEMBUAT PETA
            ===================================== */

            const map = L.map('map').setView(
                [-2.9769683, 104.7568333],
                12
            );


            /* =====================================
               OPEN STREET MAP
            ===================================== */

            L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                {
                    attribution: '&copy; OpenStreetMap contributors',
                    maxZoom: 19
                }
            ).addTo(map);


            /* =====================================
               DATA TAGGING DARI LARAVEL
            ===================================== */

            const taggings = @json($taggings);


            /* =====================================
               VARIABEL MARKER DAN STATUS
            ===================================== */

            const markers = [];

            let jumlahApproved = 0;
            let jumlahSubmitted = 0;
            let jumlahRejected = 0;


            /* =====================================
               MEMBUAT MARKER
            ===================================== */

            taggings.forEach(function (tagging) {

                const latitude = parseFloat(tagging.geotag_latitude);
                const longitude = parseFloat(tagging.geotag_longitude);

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

                markers.push([latitude, longitude]);


                /* =================================
                   MENENTUKAN WARNA MARKER
                ================================= */

                let markerColor = 'green';

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


                /* =================================
                   ICON MARKER
                ================================= */

                const markerIcon = L.icon({

                    iconUrl:
                        'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-' +
                        markerColor +
                        '.png',

                    shadowUrl:
                        'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',

                    iconSize: [25, 41],

                    iconAnchor: [12, 41],

                    popupAnchor: [1, -34],

                    shadowSize: [41, 41]

                });


                /* =================================
                   MEMBUAT MARKER
                ================================= */

                const marker = L.marker(
                    [latitude, longitude],
                    {
                        icon: markerIcon,
                        zIndexOffset: 1000
                    }
                ).addTo(map);


                /* =================================
                   MENENTUKAN STATUS POPUP
                ================================= */

                let statusClass = 'status-other';
                let statusText = tagging.assignment_status_alias ?? '-';

                if (
                    tagging.assignment_status_alias ===
                    'APPROVED BY Pengawas'
                ) {

                    statusClass = 'status-approved';
                    statusText = 'Approved';

                }

                else if (
                    tagging.assignment_status_alias ===
                    'SUBMITTED BY Pencacah'
                ) {

                    statusClass = 'status-submitted';
                    statusText = 'Submitted';

                }

                else if (
                    tagging.assignment_status_alias ===
                    'REJECTED BY Pengawas'
                ) {

                    statusClass = 'status-rejected';
                    statusText = 'Rejected';

                }


                /* =================================
                   FUNGSI AMAN UNTUK ISI POPUP
                ================================= */

                function escapeHTML(value) {

                    return String(value ?? '-').replace(
                        /[&<>"']/g,
                        function (character) {

                            const entities = {
                                '&': '&amp;',
                                '<': '&lt;',
                                '>': '&gt;',
                                '"': '&quot;',
                                "'": '&#039;'
                            };

                            return entities[character];

                        }
                    );

                }


                /* =================================
                   POPUP DETAIL DATA
                ================================= */

                const popupContent = `

                    <div class="tagging-popup">

                        <h3 class="popup-title">
                            <i class="fa-solid fa-location-dot"></i>
                            Detail Data Tagging
                        </h3>

                        <div class="popup-row">
                            <span class="popup-label">Assignment ID</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.assignment_id)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Status</span>
                            <span class="popup-status ${statusClass}">
                                ${escapeHTML(statusText)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Nama Usaha / Bangunan</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.nama_usaha_bang)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Nama KK</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.nama_kk)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Level 6 Full Code</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.level_6_full_code)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Ada Keluarga</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.ada_keluarga_label)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Ada Bangunan / Usaha</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.ada_bang_usaha_label)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Geotag Accuracy</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.geotag_accuracy)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Latitude</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.geotag_latitude)}
                            </span>
                        </div>

                        <div class="popup-row">
                            <span class="popup-label">Longitude</span>
                            <span class="popup-value">
                                ${escapeHTML(tagging.geotag_longitude)}
                            </span>
                        </div>

                    </div>

                `;


                marker.bindPopup(popupContent, {
                    maxWidth: 320,
                    minWidth: 0,
                    autoPan: true,
                    autoPanPadding: [20, 20]
                });

            });


            /* =====================================
               MENYESUAIKAN PETA DENGAN MARKER
            ===================================== */

            if (markers.length > 0) {

                map.fitBounds(
                    markers,
                    {
                        padding: [40, 40],
                        maxZoom: 16
                    }
                );

            } else {

                const emptyMessage = document.createElement('div');

                emptyMessage.className = 'map-empty-message';

                emptyMessage.innerHTML = `
                    <i class="fa-solid fa-map-location-dot"></i>
                    <h3>Lokasi Tidak Ditemukan</h3>
                    <p>
                        Tidak ada data dengan koordinat yang tersedia
                        berdasarkan pencarian atau filter yang dipilih.
                    </p>
                `;

                document.getElementById('map').appendChild(emptyMessage);

            }


            /* =====================================
               RINGKASAN DATA PADA PETA
            ===================================== */

            const infoStatus = L.control({
                position: 'topright'
            });

            infoStatus.onAdd = function () {

                const div = L.DomUtil.create(
                    'div',
                    'map-info'
                );

                div.innerHTML = `

                    <div class="map-info-title">
                        <i class="fa-solid fa-chart-simple"></i>
                        Ringkasan Data
                    </div>

                    <div class="map-info-row">
                        <span>Jumlah Titik</span>
                        <strong>${markers.length}</strong>
                    </div>

                    <div class="map-info-row">
                        <span>Approved</span>
                        <strong>${jumlahApproved}</strong>
                    </div>

                    <div class="map-info-row">
                        <span>Submitted</span>
                        <strong>${jumlahSubmitted}</strong>
                    </div>

                    <div class="map-info-row">
                        <span>Rejected</span>
                        <strong>${jumlahRejected}</strong>
                    </div>

                `;

                L.DomEvent.disableClickPropagation(div);

                return div;

            };

            infoStatus.addTo(map);


            /* =====================================
               INVALIDATE SIZE
            ===================================== */

            setTimeout(function () {
                map.invalidateSize();
            }, 200);

        });

    </script>

</body>
</html>
