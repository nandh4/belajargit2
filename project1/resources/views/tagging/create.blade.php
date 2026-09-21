<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Tagging</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .buttons {
            margin-top: 20px;
        }

        button,
        a {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background-color: #0d6efd;
            color: white;
        }

        .back {
            background-color: #6c757d;
            color: white;
            margin-left: 5px;
        }

        .error {
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Data Tagging</h1>

    @if ($errors->any())
        <div class="error">

            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{ route('tagging.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="assignment_id">Assignment ID</label>

            <input
                type="text"
                id="assignment_id"
                name="assignment_id"
                value="{{ old('assignment_id') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="assignment_status_alias">Status Assignment</label>

            <input
                type="text"
                id="assignment_status_alias"
                name="assignment_status_alias"
                value="{{ old('assignment_status_alias') }}"
            >
        </div>

        <div class="form-group">
            <label for="level_6_full_code">Level 6 Full Code</label>

            <input
                type="text"
                id="level_6_full_code"
                name="level_6_full_code"
                value="{{ old('level_6_full_code') }}"
            >
        </div>

        <div class="form-group">
            <label for="nama_usaha_bang">Nama Usaha / Bangunan</label>

            <input
                type="text"
                id="nama_usaha_bang"
                name="nama_usaha_bang"
                value="{{ old('nama_usaha_bang') }}"
            >
        </div>

        <div class="form-group">
            <label for="nama_kk">Nama KK</label>

            <input
                type="text"
                id="nama_kk"
                name="nama_kk"
                value="{{ old('nama_kk') }}"
            >
        </div>

        <div class="form-group">
            <label for="ada_keluarga_label">Ada Keluarga</label>

            <input
                type="text"
                id="ada_keluarga_label"
                name="ada_keluarga_label"
                value="{{ old('ada_keluarga_label') }}"
            >
        </div>

        <div class="form-group">
            <label for="ada_bang_usaha_label">Ada Bangunan Usaha</label>

            <input
                type="text"
                id="ada_bang_usaha_label"
                name="ada_bang_usaha_label"
                value="{{ old('ada_bang_usaha_label') }}"
            >
        </div>

        <div class="form-group">
            <label for="geotag_accuracy">Geotag Accuracy</label>

            <input
                type="number"
                step="any"
                id="geotag_accuracy"
                name="geotag_accuracy"
                value="{{ old('geotag_accuracy') }}"
            >
        </div>

        <div class="form-group">
            <label for="geotag_latitude">Latitude</label>

            <input
                type="number"
                step="any"
                id="geotag_latitude"
                name="geotag_latitude"
                value="{{ old('geotag_latitude') }}"
            >
        </div>

        <div class="form-group">
            <label for="geotag_longitude">Longitude</label>

            <input
                type="number"
                step="any"
                id="geotag_longitude"
                name="geotag_longitude"
                value="{{ old('geotag_longitude') }}"
            >
        </div>

        <div class="buttons">

            <button type="submit">
                Simpan
            </button>

            <a href="{{ route('tagging.index') }}" class="back">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>

</html>