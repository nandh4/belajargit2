<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Tagging | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- CSS UTAMA DASHBOARD --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    {{-- CSS KHUSUS HALAMAN TAGGING --}}
    <link rel="stylesheet" href="{{ asset('css/tagging/index.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

 @php
        $accountUser = auth()->user();
    @endphp

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    <main class="main-content">

        {{-- TOP BAR --}}
        <div class="top-bar">

            <div class="page-title">
                
            </div>

            <div class="header-right">

                {{-- UPDATE INFO --}}
                <div class="update-info">
                    <span class="update-label">
                        Data terakhir diperbarui
                    </span>

                    <span class="update-date">
                        @if($lastUpdated)
                            {{ \Carbon\Carbon::parse($lastUpdated)
                                ->setTimezone('Asia/Jakarta')
                                ->format('d F Y, H.i') }} WIB
                        @else
                            Belum tersedia
                        @endif
                    </span>
                </div>

                {{-- PROFIL PENGGUNA --}}
                <div class="user-profile-wrapper" id="userProfile">

                    <button type="button"
                            class="user-profile-button"
                            id="profileToggle"
                            aria-expanded="false"
                            aria-controls="userDropdown">

                        <div class="user-avatar">
                            {{ strtoupper(substr($accountUser->name, 0, 1)) }}
                        </div>

                        <div class="user-details">
                            <div class="user-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="user-username">
                                {{ auth()->user()->username }}
                            </div>

                            <span class="user-role">
                                {{ auth()->user()->role }}
                            </span>
                        </div>

                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>

                    </button>

                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-header">
                            <strong>{{ auth()->user()->name }}</strong>
                            <span>{{ auth()->user()->username }}</span>
                        </div>

                        <div class="dropdown-divider"></div>

                        <a href="{{ route('user.settings') }}"
                           class="dropdown-item">
                            <i class="fa-solid fa-gear"></i>
                            <span>Pengaturan Akun</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="dropdown-item2">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Logout</span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- WELCOME CARD --}}
        <section class="welcome-card">
            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM PENGELOLAAN DATA TAGGING
                </span>

                <h2>Data Tagging</h2>

                <p>
                    Pengelolaan dan pemantauan data tagging
                </p>

            </div>
        </section>

        {{-- FILTER DATA --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">
                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Filter Data</h2>
                        <p class="section-subtitle">
                            Gunakan pencarian dan filter untuk menemukan data                   
                        </p>
                    </div>
                </div>

            </div>

            <form action="{{ route('tagging.index') }}"
                  method="GET"
                  class="filter-card">

                <div class="filter-grid">

                    {{-- PENCARIAN --}}
                    <div class="form-group">
                        <label for="search">Pencarian</label>

                        <div class="input-wrapper">
                            <i class="fa-solid fa-magnifying-glass"></i>

                            <input
                                type="text"
                                id="search"
                                name="search"
                                class="form-control"
                                value="{{ request('search') }}"
                                placeholder="Assignment ID, kode wilayah, nama usah...a, nama KK"
                            >
                        </div>
                    </div>

                    {{-- KECAMATAN --}}
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>

                        <select name="kecamatan"
                                id="kecamatan"
                                class="form-control">

                            <option value="">Semua Kecamatan</option>

                            @foreach($kecamatans as $kecamatan)
                                <option
                                    value="{{ $kecamatan->kode_wilayah }}"
                                    {{ request('kecamatan') == $kecamatan->kode_wilayah ? 'selected' : '' }}
                                >
                                    {{ $kecamatan->nama_wilayah }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- STATUS --}}
                    <div class="form-group">
                        <label for="status">Status</label>

                        <select name="status"
                                id="status"
                                class="form-control">

                            <option value="">Semua Status</option>

                            <option value="APPROVED BY Pengawas"
                                {{ request('status') == 'APPROVED BY Pengawas' ? 'selected' : '' }}>
                                Approved
                            </option>

                            <option value="SUBMITTED BY Pencacah"
                                {{ request('status') == 'SUBMITTED BY Pencacah' ? 'selected' : '' }}>
                                Submitted
                            </option>

                            <option value="REJECTED BY Pengawas"
                                {{ request('status') == 'REJECTED BY Pengawas' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>
                    </div>

                    {{-- LOKASI --}}
                    <div class="form-group">
                        <label for="location">Lokasi</label>

                        <select name="location"
                                id="location"
                                class="form-control">

                            <option value="">Semua Data</option>

                            <option value="ada"
                                {{ request('location') == 'ada' ? 'selected' : '' }}>
                                Dengan Koordinat
                            </option>

                            <option value="tidak"
                                {{ request('location') == 'tidak' ? 'selected' : '' }}>
                                Tanpa Koordinat
                            </option>

                        </select>
                    </div>

                </div>

                <div class="filter-actions">

                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari Data
                    </button>

                    <a href="{{ route('tagging.index') }}" class="btn-reset">
                        <i class="fa-solid fa-rotate-left"></i>
                        Reset
                    </a>

                </div>

            </form>

        </section>

        {{-- DAFTAR DATA TAGGING --}}
        <section class="section">

            <div class="section-header list-heading">

                <div class="section-title-wrap">
                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Daftar Data Tagging</h2>
                        <p class="section-subtitle">
                            Data tagging yang tersimpan dalam sistem
                        </p>
                    </div>
                </div>

                <div class="total-badge">
                    <i class="fa-solid fa-layer-group"></i>
                        Total Data:
                        {{ number_format($taggings->total(), 0, ',', '.') }}
                </div>

            </div>

            <div class="table-card">

           @if(auth()->user()->role === 'admin')

    <div class="table-card-actions">

        {{-- TOMBOL EXPORT CSV --}}
        <a href="{{ route('tagging.export', request()->query()) }}"
            class="btn-export">

            <i class="fa-solid fa-file-csv"></i>
            Export CSV

        </a>

        {{-- TOMBOL TAMBAH DATA --}}
        <a href="{{ route('tagging.create') }}" class="btn-add">

            <i class="fa-solid fa-plus"></i>
            Tambah Data

        </a>

    </div>

@endif

                {{-- TABEL DATA --}}
                <div class="table-responsive">

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Assignment ID</th>
                                <th>Kode Wilayah</th>
                                <th>Nama Usaha</th>
                                <th>Nama KK</th>
                                <th>Status</th>
                                <th>Keluarga</th>
                                <th>Bangunan Usaha</th>
                                <th>Akurasi</th>
                                <th>Lokasi</th>

                                @if(auth()->user()->role === 'admin')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($taggings as $index => $data)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="number-cell">
                                        {{ $taggings->firstItem() + $index }}
                                    </td>

                                    {{-- ASSIGNMENT ID --}}
                                    <td>
                                        <span class="code-text">
                                            {{ $data->assignment_id ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- KODE WILAYAH --}}
                                    <td>
                                        <span class="code-text">
                                            {{ $data->level_6_full_code ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- NAMA USAHA --}}
                                    <td>
                                        {{ $data->nama_usaha_bang ?? '-' }}
                                    </td>

                                    {{-- NAMA KK --}}
                                    <td>
                                        {{ $data->nama_kk ?? '-' }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td>

                                        @if($data->assignment_status_alias === 'APPROVED BY Pengawas')

                                            <span class="status-badge status-approved">
                                                <i class="fa-solid fa-circle-check"></i>
                                                Approved
                                            </span>

                                        @elseif($data->assignment_status_alias === 'SUBMITTED BY Pencacah')

                                            <span class="status-badge status-submitted">
                                                <i class="fa-solid fa-clock"></i>
                                                Submitted
                                            </span>

                                        @elseif($data->assignment_status_alias === 'REJECTED BY Pengawas')

                                            <span class="status-badge status-rejected">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                                Rejected
                                            </span>

                                        @else

                                            <span class="status-badge status-default">
                                                {{ $data->assignment_status_alias ?? '-' }}
                                            </span>

                                        @endif

                                    </td>

                                    {{-- KELUARGA --}}
                                    <td>
                                        {{ $data->ada_keluarga_label ?? '-' }}
                                    </td>

                                    {{-- BANGUNAN USAHA --}}
                                    <td>
                                        {{ $data->ada_bang_usaha_label ?? '-' }}
                                    </td>

                                    {{-- AKURASI --}}
                                    <td>
                                        {{ $data->geotag_accuracy ?? '-' }}
                                    </td>

                                    {{-- LOKASI --}}
                                    <td>

                                        @if(
                                            $data->geotag_latitude !== null &&
                                            $data->geotag_longitude !== null
                                        )

                                            <span class="location-yes">
                                                <i class="fa-solid fa-location-dot"></i>
                                                Ada
                                            </span>

                                        @else

                                            <span class="location-no">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                                Tidak ada
                                            </span>

                                        @endif

                                    </td>

                                    {{-- AKSI CRUD KHUSUS ADMIN --}}
                                    @if(auth()->user()->role === 'admin')

                                        <td>
                                            <div class="action-buttons">

                                                <a href="{{ route('tagging.edit', $data->id) }}"
                                                   class="action-edit"
                                                   title="Edit Data"> 
                                                    <i class="fa-solid fa-pen-to-square"></i> 
                                                </a>

                                                <form
                                                    action="{{ route('tagging.destroy', $data->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tagging ini?')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="action-delete"
                                                            title="Hapus Data">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    @endif

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="{{ auth()->user()->role === 'admin' ? 11 : 10 }}">

                                        <div class="empty-data">

                                            <div class="empty-icon">
                                                <i class="fa-solid fa-folder-open"></i>
                                            </div>

                                            <h3>Data Tidak Ditemukan</h3>

                                            <p>
                                                Belum ada data yang sesuai dengan pencarian
                                                atau filter yang dipilih
                                            </p>

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- PAGINATION --}}
                @if($taggings->hasPages())

                    <div class="pagination-area">

                        <div class="pagination-info">
                            Menampilkan
                            <strong>{{ $taggings->firstItem() }}</strong>
                            sampai
                            <strong>{{ $taggings->lastItem() }}</strong>
                            dari
                            <strong>{{ $taggings->total() }}</strong>
                            data
                        </div>

                        <div class="pagination">

                            {{-- SEBELUMNYA --}}
                            @if($taggings->onFirstPage())

                                <span class="disabled">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>

                            @else

                                <a href="{{ $taggings->previousPageUrl() }}">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>

                            @endif

                            {{-- NOMOR HALAMAN --}}
                            @foreach(
                                $taggings->getUrlRange(
                                    max(1, $taggings->currentPage() - 2),
                                    min($taggings->lastPage(), $taggings->currentPage() + 2)
                                ) as $page => $url
                            )

                                @if($page == $taggings->currentPage())

                                    <span class="active">{{ $page }}</span>

                                @else

                                    <a href="{{ $url }}">{{ $page }}</a>

                                @endif

                            @endforeach

                            {{-- SELANJUTNYA --}}
                            @if($taggings->hasMorePages())

                                <a href="{{ $taggings->nextPageUrl() }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>

                            @else

                                <span class="disabled">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>

                            @endif

                        </div>

                    </div>

                @endif

            </div>

        </section>

    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- DROPDOWN PROFIL: MENGIKUTI DASHBOARD --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const profileToggle = document.getElementById('profileToggle');
            const userDropdown = document.getElementById('userDropdown');

            if (profileToggle && userDropdown) {

                profileToggle.addEventListener('click', function (event) {
                    event.stopPropagation();

                    const isOpen = userDropdown.classList.toggle('show');

                    profileToggle.setAttribute(
                        'aria-expanded',
                        isOpen ? 'true' : 'false'
                    );
                });

                document.addEventListener('click', function (event) {

                    if (!event.target.closest('#userProfile')) {
                        userDropdown.classList.remove('show');

                        profileToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );
                    }

                });

                document.addEventListener('keydown', function (event) {

                    if (event.key === 'Escape') {
                        userDropdown.classList.remove('show');

                        profileToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );
                    }

                });

            }

        });
    </script>

</body>
</html>
