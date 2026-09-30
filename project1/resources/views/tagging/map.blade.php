<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peta Data Tagging</title>

    <!-- Leaflet CSS -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            padding: 15px 20px;
            background: #0d6efd;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .back-button {
            padding: 8px 12px;
            background: white;
            color: #0d6efd;
            text-decoration: none;
            border-radius: 5px;
        }

        #map {
            height: calc(100vh - 115px);
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Peta Data Tagging</h1>

        <a href="{{ route('tagging.index') }}" class="back-button">
            Kembali ke Data
        </a>
        </div>

        <!-- Pencarian Data -->
    <div style="padding: 12px 20px 0; background: white;">
        <form action="{{ route('tagging.map') }}" method="GET">

            @if(request('kecamatan'))
                <input type="hidden"
                    name="kecamatan"
                    value="{{ request('kecamatan') }}">
            @endif

            <label for="search">
                <strong>Cari Data:</strong>
            </label>

            <input
                type="text"
                name="search"
                id="search"
                value="{{ request('search') }}"
                placeholder="Assignment ID, nama usaha, atau nama KK"
                style="padding: 8px; width: 300px;"
            >

            <button type="submit"
                    style="padding: 8px 15px;">
                Cari
            </button>

            @if(request('search') || request('kecamatan'))
                <a href="{{ route('tagging.map') }}"
                style="
                    margin-left: 10px;
                    padding: 8px 12px;
                    background: #6c757d;
                    color: white;
                    text-decoration: none;
                    border-radius: 4px;
                ">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- Filter Kecamatan -->
    <div style="padding: 12px 20px; background: white;">
        <form action="{{ route('tagging.map') }}" method="GET">

            <label for="kecamatan">
                <strong>Filter Kecamatan:</strong>
            </label>

            <select name="kecamatan"
                    id="kecamatan"
                    onchange="this.form.submit()">

                <option value="">
                    -- Semua Kecamatan --
                </option>

                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->kode_wilayah }}"
                        {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}>
                        {{ $kecamatan->nama_wilayah }}
                    </option>
                @endforeach

            </select>

        </form>
    </div>

    <div id="map"></div>

    <!-- Leaflet JS -->
    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js">
    </script>

    <script>

        // Membuat peta
        var map = L.map('map').setView(
            [-2.9769683, 104.7568333],
            12
        );

        // Menambahkan OpenStreetMap
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution: '&copy; OpenStreetMap contributors'
            }
        ).addTo(map);


        // Mengambil data tagging dari Laravel
        var taggings = @json($taggings);


        // Membuat marker untuk setiap data
        taggings.forEach(function(tagging) {

            var latitude = parseFloat(tagging.geotag_latitude);
            var longitude = parseFloat(tagging.geotag_longitude);

            // Hanya membuat marker jika koordinat valid
            if (!isNaN(latitude) && !isNaN(longitude)) {

                var markerColor = 'green';

                if (tagging.assignment_status_alias === 'SUBMITTED BY Pencacah') {
                    markerColor = 'yellow';
                } else if (tagging.assignment_status_alias === 'REJECTED BY Pengawas') {
                    markerColor = 'red';
                }

                var markerIcon = L.icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-' + markerColor + '.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });

                var marker = L.marker([
                    latitude,
                    longitude
                ], {
                    icon: markerIcon,
                    zIndexOffset: 1000
                }).addTo(map);


                // Popup ketika marker diklik
                marker.bindPopup(`
                    <div style="min-width: 250px;">

                        <h3 style="margin-top: 0;">
                            Data Tagging
                        </h3>

                        <b>Assignment ID:</b><br>
                        ${tagging.assignment_id ?? '-'}
                        <br><br>

                        <b>Status:</b><br>
                        <span style="
                            padding: 4px 8px;
                            border-radius: 12px;
                            background: ${
                                tagging.assignment_status_alias === 'APPROVED BY Pengawas'
                                    ? '#28a745'
                                    : tagging.assignment_status_alias === 'SUBMITTED BY Pencacah'
                                        ? '#ffc107'
                                        : tagging.assignment_status_alias === 'REJECTED BY Pengawas'
                                            ? '#dc3545'
                                            : '#6c757d'
                            };
                            color: ${
                                tagging.assignment_status_alias === 'SUBMITTED BY Pencacah'
                                    ? 'black'
                                    : 'white'
                            };
                        ">
                            ${
                                tagging.assignment_status_alias === 'APPROVED BY Pengawas'
                                    ? 'Approved'
                                    : tagging.assignment_status_alias === 'SUBMITTED BY Pencacah'
                                        ? 'Submitted'
                                        : tagging.assignment_status_alias === 'REJECTED BY Pengawas'
                                            ? 'Rejected'
                                            : (tagging.assignment_status_alias ?? '-')
                            }
                        </span>
                        <br><br>

                        <b>Nama Usaha:</b><br>
                        ${tagging.nama_usaha_bang ?? '-'}
                        <br><br>

                        <b>Nama KK:</b><br>
                        ${tagging.nama_kk ?? '-'}
                        <br><br>

                        <b>Level 6 Code:</b><br>
                        ${tagging.level_6_full_code ?? '-'}
                        <br><br>

                        <b>Latitude:</b>
                        ${tagging.geotag_latitude}
                        <br>

                        <b>Longitude:</b>
                        ${tagging.geotag_longitude}

                    </div>
                `);
            }

        });

                // Menyesuaikan tampilan peta dengan titik yang tersedia
        var markers = [];

        taggings.forEach(function(tagging) {

            var latitude = parseFloat(tagging.geotag_latitude);
            var longitude = parseFloat(tagging.geotag_longitude);

            if (!isNaN(latitude) && !isNaN(longitude)) {
                markers.push([latitude, longitude]);
            }

        });

        if (markers.length > 0) {
            map.fitBounds(markers, {
                padding: [50, 50]
            });
        }


        // Menghitung jumlah data berdasarkan status
        var jumlahApproved = 0;
        var jumlahSubmitted = 0;
        var jumlahRejected = 0;

        taggings.forEach(function(tagging) {

            if (tagging.assignment_status_alias === 'APPROVED BY Pengawas') {
                jumlahApproved++;
            } else if (tagging.assignment_status_alias === 'SUBMITTED BY Pencacah') {
                jumlahSubmitted++;
            } else if (tagging.assignment_status_alias === 'REJECTED BY Pengawas') {
                jumlahRejected++;
            }

        });


        // Ringkasan data pada peta
        var infoStatus = L.control({
            position: 'topright'
        });

        infoStatus.onAdd = function() {

            var div = L.DomUtil.create('div');

            div.style.background = 'white';
            div.style.padding = '12px 15px';
            div.style.borderRadius = '6px';
            div.style.boxShadow = '0 2px 8px rgba(0,0,0,0.2)';
            div.style.fontSize = '14px';
            div.style.lineHeight = '1.7';

            div.innerHTML = `
                <strong style="font-size: 15px;">Ringkasan Data</strong>

                <div style="margin-top: 8px;">
                    Jumlah Titik: <strong>${markers.length}</strong>
                </div>

                <div style="margin-top: 4px;">
                    🟢 Approved: <strong>${jumlahApproved}</strong>
                </div>

                <div style="margin-top: 4px;">
                    🟡 Submitted: <strong>${jumlahSubmitted}</strong>
                </div>

                <div style="margin-top: 4px;">
                    🔴 Rejected: <strong>${jumlahRejected}</strong>
                </div>
            `;

            return div;
        };

        infoStatus.addTo(map);

        </script>

                // Menampilkan jumlah titik
        var jumlahTitik = markers.length;

        var infoJumlah = L.control({
            position: 'topright'
        });

        infoJumlah.onAdd = function() {
            var div = L.DomUtil.create('div');

            div.style.background = 'white';
            div.style.padding = '10px 15px';
            div.style.borderRadius = '6px';
            div.style.boxShadow = '0 2px 8px rgba(0,0,0,0.2)';
            div.style.fontSize = '14px';

            div.innerHTML = '<strong>Jumlah Titik:</strong> ' + jumlahTitik;

            return div;
        };

        infoJumlah.addTo(map);

        </script>

</body>

