<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Nama:</label>
        <br>
        <input type="text"
               name="nama"
               value="{{ old('nama', $mahasiswa->nama) }}">
        <br><br>

        <label>Email:</label>
        <br>
        <input type="email"
               name="email"
               value="{{ old('email', $mahasiswa->email) }}">
        <br><br>

        <button type="submit">Update</button>
        
        <a href="{{ route('mahasiswa.index') }}">
            <button type="submit">Kembali</button>
        </a>

    </form>

</body>
</html>