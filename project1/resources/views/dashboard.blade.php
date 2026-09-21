<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
</head>

<body>

    <h1>Dashboard</h1>

    <p>
        Selamat datang, <strong>{{ auth()->user()->name }}</strong>
    </p>

    <p>
        Role:
        <strong>{{ ucfirst(auth()->user()->role) }}</strong>
    </p>

    <hr>

    <h2>Menu</h2>

    {{-- MENU ADMIN --}}
    @if(auth()->user()->role === 'admin')

        <h3>Admin</h3>

        <p>
            <a href="{{ route('tagging.index') }}">
                📋 Data Tagging
            </a>
        </p>

        <p>
            <a href="{{ route('tagging.create') }}">
                ➕ Tambah Data
            </a>
        </p>

        <p>
            <a href="{{ route('tagging.import') }}">
                📥 Import CSV
            </a>
        </p>

        <p>
            <a href="{{ route('tagging.map') }}">
                🗺️ Lihat Peta
            </a>
        </p>

    {{-- MENU OPERATOR --}}
    @elseif(auth()->user()->role === 'operator')

        <h3>Operator</h3>

        <p>
            <a href="{{ route('tagging.index') }}">
                📋 Lihat Data Tagging
            </a>
        </p>

        <p>
            <a href="{{ route('tagging.import') }}">
                📥 Import CSV
            </a>
        </p>

        <p>
            <a href="{{ route('tagging.map') }}">
                🗺️ Lihat Peta
            </a>
        </p>

    @endif

    <hr>

    {{-- LOGOUT --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</body>
</html>