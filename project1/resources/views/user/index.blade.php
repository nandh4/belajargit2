<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Akun User | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    {{-- CSS UTAMA DASHBOARD --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    {{-- CSS KHUSUS HALAMAN KELOLA USER --}}
    <link rel="stylesheet" href="{{ asset('css/user/index.css') }}">

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
                        Aktivitas terakhir diperbarui
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

        {{-- NOTIFIKASI VALIDASI --}}
        @if($errors->any())
            <div class="alert alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>
                    Terdapat kesalahan pada proses sebelumnya,
                    silakan periksa kembali data yang dimasukkan
                </span>
            </div>
        @endif

        {{-- WELCOME CARD --}}
        <section class="welcome-card">
            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM PENGELOLAAN DATA TAGGING
                </span>

                <h2>Kelola Akun User</h2>

                <p>
                    Pengelolaan dan pemantauan akun user yang terdaftar
                </p>

            </div>
        </section>

        {{-- FILTER USER --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">
                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Filter User</h2>
                        <p class="section-subtitle">
                            Gunakan pencarian dan filter untuk menemukan akun user
                        </p>
                    </div>
                </div>

            </div>

            <form action="{{ route('user.index') }}"
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
                                placeholder="Nama lengkap atau username..."
                            >
                        </div>
                    </div>

                    {{-- FILTER ROLE --}}
                    <div class="form-group">
                        <label for="role">Role Pengguna</label>

                        <select name="role"
                                id="role"
                                class="form-control">

                            <option value="">Semua Role</option>

                            @foreach($roles as $role)
                                <option
                                    value="{{ $role }}"
                                    {{ request('role') == $role ? 'selected' : '' }}
                                >
                                    {{ ucfirst($role) }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                <div class="filter-actions">

                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari Akun
                    </button>

                    <a href="{{ route('user.index') }}" class="btn-reset">
                        <i class="fa-solid fa-rotate-left"></i>
                        Reset
                    </a>

                </div>

            </form>

        </section>

        {{-- DAFTAR USER --}}
        <section class="section">

            <div class="section-header list-heading">

                <div class="section-title-wrap">
                    <span class="section-accent"></span>

                    <div>
                        <h2 class="section-title">Daftar Akun User</h2>
                        <p class="section-subtitle">
                            Akun user yang tersimpan dalam sistem
                        </p>
                    </div>
                </div>
<div class="total-badge">
                        <i class="fa-solid fa-layer-group"></i>
                        Total Akun:
                        {{ number_format($users->total(), 0, ',', '.') }}
                    </div>
            </div>

            <div class="table-card">

                {{-- HEADER TABEL --}}
                <div class="table-card-header">

                    <div>
                      {{-- TAMBAH USER --}}
                <a href="{{ route('user.create') }}" class="btn-add">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Akun
                </a>
                    </div>


                </div>

                {{-- TABEL USER --}}
                <div class="table-responsive">

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $index => $user)

                                <tr>

                                    {{-- NOMOR --}}
                                    <td class="number-cell">
                                        {{ $users->firstItem() + $index }}
                                    </td>

                                    {{-- NAMA --}}
                                    <td>
                                        <div class="user-name-cell">
                                            <div class="user-table-avatar">
                                                <i class="fa-solid fa-user"></i>
                                            </div>

                                            <span class="user-fullname">
                                                {{ $user->name }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- USERNAME --}}
                                    <td>
                                        <span class="username-text">
                                            {{ $user->username }}
                                        </span>
                                    </td>

                                    {{-- ROLE --}}
                                    <td>

                                        @if($user->role === 'admin')

                                            <span class="role-badge role-admin">
                                                <i class="fa-solid fa-shield-halved"></i>
                                                Admin
                                            </span>

                                        @elseif($user->role === 'operator')

                                            <span class="role-badge role-operator">
                                                <i class="fa-solid fa-user"></i>
                                                Operator
                                            </span>

                                        @else

                                            <span class="role-badge role-default">
                                                {{ ucfirst($user->role) }}
                                            </span>

                                        @endif

                                    </td>

                                    {{-- TANGGAL DIBUAT --}}
                                    <td>
                                        <span class="date-text">
                                            {{ $user->created_at
                                                ? $user->created_at->format('d/m/Y H.i')
                                                : '-' }}
                                        </span>
                                    </td>

 
{{-- AKSI --}}
<td>
    <div class="action-buttons">

        {{-- EDIT --}}
        <a href="{{ route('user.edit', $user->id) }}"
           class="action-edit"
           title="Edit User">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        {{-- RESET PASSWORD --}}
        <a href="{{ route('user.reset-pw', $user->id) }}"
           class="action-reset"
           title="Reset Password">
            <i class="fa-solid fa-key"></i>
        </a>

        {{-- HAPUS --}}
        @if(auth()->id() !== $user->id)

            <form
                action="{{ route('user.destroy', $user->id) }}"
                method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ addslashes($user->name) }}?')"
            >
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="action-delete"
                        title="Hapus User">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>

        @else

            <button type="button"
                    class="action-delete action-disabled"
                    title="Tidak dapat menghapus akun sendiri"
                    disabled>
                <i class="fa-solid fa-lock"></i>
            </button>

        @endif

    </div>
</td>


                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6">

                                        <div class="empty-data">

                                            <div class="empty-icon">
                                                <i class="fa-solid fa-users-slash"></i>
                                            </div>

                                            <h3>User Tidak Ditemukan</h3>

                                            <p>
                                                Belum ada akun yang sesuai dengan pencarian
                                                atau filter role yang dipilih
                                            </p>

                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- PAGINATION --}}
                @if($users->hasPages())

                    <div class="pagination-area">

                        <div class="pagination-info">
                            Menampilkan
                            <strong>{{ $users->firstItem() }}</strong>
                            sampai
                            <strong>{{ $users->lastItem() }}</strong>
                            dari
                            <strong>{{ $users->total() }}</strong>
                            user
                        </div>

                        <div class="pagination">

                            {{-- SEBELUMNYA --}}
                            @if($users->onFirstPage())

                                <span class="disabled">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </span>

                            @else

                                <a href="{{ $users->previousPageUrl() }}">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>

                            @endif

                            {{-- NOMOR HALAMAN --}}
                            @foreach(
                                $users->getUrlRange(
                                    max(1, $users->currentPage() - 2),
                                    min($users->lastPage(), $users->currentPage() + 2)
                                ) as $page => $url
                            )

                                @if($page == $users->currentPage())

                                    <span class="active">{{ $page }}</span>

                                @else

                                    <a href="{{ $url }}">{{ $page }}</a>

                                @endif

                            @endforeach

                            {{-- SELANJUTNYA --}}
                            @if($users->hasMorePages())

                                <a href="{{ $users->nextPageUrl() }}">
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

    {{-- DROPDOWN PROFIL --}}
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
