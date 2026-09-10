<!DOCTYPE html>
<html>
<head>
    <title>Welcome Laravel</title>
</head>
<body>

    <h1>Welcome to Laravel</h1>

    <h2>Data Mahasiswa</h2>

    @foreach ($mahasiswa as $mhs)
        <p>
            {{ $mhs->id }}.
            {{ $mhs->nama }} -
            {{ $mhs->email }}
        </p>
    @endforeach

</body>
</html>