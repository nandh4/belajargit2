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
            height: calc(100vh - 62px);
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

                var marker = L.marker([
                    latitude,
                    longitude
                ]).addTo(map);


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
                        ${tagging.assignment_status_alias ?? '-'}
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

    </script>

</body>

<div style="padding: 15px; background: white;">
    <form action="{{ route('tagging.map') }}" method="GET">
        <label for="kecamatan"><strong>Filter Kecamatan:</strong></label>

        <select name="kecamatan" id="kecamatan" onchange="this.form.submit()">
            <option value="">-- Semua Kecamatan --</option>

            @foreach($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->kode_wilayah }}"
                    {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}>
                    {{ $kecamatan->nama_wilayah }}
                </option>
            @endforeach
        </select>
    </form>
</div>
</html>