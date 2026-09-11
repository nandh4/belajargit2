<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">

        @csrf

        <label>Nama:</label>
        <br>
        <input type="text" name="nama" value="{{ old('nama') }}">
        <br><br>

        <label>Email:</label>
        <br>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <button type="submit">Simpan</button>

        <a href="{{ route('mahasiswa.index') }}">
            Kembali
        </a>

    </form>

</body>
</html>