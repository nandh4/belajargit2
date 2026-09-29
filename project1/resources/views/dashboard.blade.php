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
        <h2>Statistik Data Tagging</h2>

<div style="display: flex; flex-wrap: wrap; gap: 15px; margin: 20px 0;">

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Total Data</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalData }}
        </p>
    </div>

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Dengan Lokasi</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalDenganLokasi }}
        </p>
    </div>

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Tanpa Lokasi</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalTanpaLokasi }}
        </p>
    </div>

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Approved</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalApproved }}
        </p>
    </div>

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Submitted</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalSubmitted }}
        </p>
    </div>

    <div style="border: 1px solid #ddd; padding: 20px; width: 180px; border-radius: 8px;">
        <h3>Rejected</h3>
        <p style="font-size: 28px; font-weight: bold;">
            {{ $totalRejected }}
        </p>
    </div>

</div>

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

    <h2>Grafik Status Data</h2>

<div style="width: 600px; max-width: 100%;">
    <canvas id="statusChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('statusChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Approved', 'Submitted', 'Rejected'],
            datasets: [{
                label: 'Jumlah Data',
                data: [
                    {{ $totalApproved }},
                    {{ $totalSubmitted }},
                    {{ $totalRejected }}
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>