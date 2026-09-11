<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('mahasiswa.create') }}">
        <button type="button">
            ➕ Tambah Data Mahasiswa
        </button>
    </a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        @forelse ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->id }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->email }}</td>

        <td>

    <form action="{{ route('mahasiswa.edit', $mhs->id) }}"
          method="GET"
          style="display: inline;">

        <button type="submit">
            ✏️ Edit
        </button>

    </form><form action="{{ route('mahasiswa.destroy', $mhs->id) }}"
               method="POST"
               style="display: inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
            🗑️ Hapus
        </button>

    </form>

</td>
            </tr>

        @empty
            <tr>
                <td colspan="4">
                    Belum ada data mahasiswa.
                </td>
            </tr>
        @endforelse

    </table>

</body>
</html>