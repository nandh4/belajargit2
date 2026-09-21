<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tagging</title>
</head>
<body>

    <h1>Edit Data Tagging</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tagging.update', $tagging->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label>Assignment ID</label><br>
            <input type="text"
                   name="assignment_id"
                   value="{{ old('assignment_id', $tagging->assignment_id) }}"
                   required
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Status</label><br>
            <input type="text"
                   name="assignment_status_alias"
                   value="{{ old('assignment_status_alias', $tagging->assignment_status_alias) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Level 6 Full Code</label><br>
            <input type="text"
                   name="level_6_full_code"
                   value="{{ old('level_6_full_code', $tagging->level_6_full_code) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Nama Usaha</label><br>
            <input type="text"
                   name="nama_usaha_bang"
                   value="{{ old('nama_usaha_bang', $tagging->nama_usaha_bang) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Nama KK</label><br>
            <input type="text"
                   name="nama_kk"
                   value="{{ old('nama_kk', $tagging->nama_kk) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Ada Keluarga</label><br>
            <input type="text"
                   name="ada_keluarga_label"
                   value="{{ old('ada_keluarga_label', $tagging->ada_keluarga_label) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Ada Bangunan Usaha</label><br>
            <input type="text"
                   name="ada_bang_usaha_label"
                   value="{{ old('ada_bang_usaha_label', $tagging->ada_bang_usaha_label) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Geotag Accuracy</label><br>
            <input type="text"
                   name="geotag_accuracy"
                   value="{{ old('geotag_accuracy', $tagging->geotag_accuracy) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Latitude</label><br>
            <input type="text"
                   name="geotag_latitude"
                   value="{{ old('geotag_latitude', $tagging->geotag_latitude) }}"
                   style="width: 400px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Longitude</label><br>
            <input type="text"
                   name="geotag_longitude"
                   value="{{ old('geotag_longitude', $tagging->geotag_longitude) }}"
                   style="width: 400px;">
        </div>

        <button type="submit"
                style="padding: 10px 15px; background: #0d6efd; color: white; border: none; border-radius: 5px;">
            Update Data
        </button>

        <a href="{{ route('tagging.index') }}"
           style="padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px;">
            Kembali
        </a>

    </form>

</body>
</html>