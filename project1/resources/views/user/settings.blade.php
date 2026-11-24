<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Akun | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/settings.css') }}">

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

            <div class="page-title"></div>

            <div class="header-right">

              {{-- WAKTU PEMBARUAN --}}
                <div class="update-info">

                    <span class="update-label">
                        Terakhir Diperbarui
                    </span>

                    <span class="update-date">
                         @if($recordLastUpdated)
                            {{ \Carbon\Carbon::parse($recordLastUpdated)
                                ->setTimezone('Asia/Jakarta')
                                ->format('d F Y, H.i') }} WIB
                        @else
                            Belum tersedia
                        @endif
                    </span>

                </div>

                {{-- USER PROFILE --}}
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
                                {{ $accountUser->name }}
                            </div>

                            <div class="user-username">
                                {{ auth()->user()->username }}

                            </div>

                            <span class="user-role">
                                {{ ucfirst($accountUser->role) }}
                            </span>

                        </div>

                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>

                    </button>

                    {{-- DROPDOWN PROFILE --}}
                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-header">
                            <strong>{{ $accountUser->name }}</strong>
                            <span>{{ '@' . $accountUser->username }}</span>
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
                                <span>Keluar</span>
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- WELCOME CARD --}}
        <section class="welcome-card">

            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM PENGELOLAAN DATA TAGGING
                </span>

                <h2>Pengaturan Akun</h2>

                <p>
                    Kelola informasi profil dan keamanan akun
                    untuk menjaga akses Anda ke dalam sistem
                </p>

            </div>

        </section>


        {{-- SECTION HEADER --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h2 class="section-title">
                            Informasi Akun
                        </h2>

                        <p class="section-subtitle">
                            Perbarui informasi pribadi dan password akun Anda
                        </p>
                    </div>

                </div>

            </div>

        </section>


        {{-- FORM CONTAINER --}}
        <div class="create-form-container">

            {{-- FORM HEADER --}}
            <div class="create-form-header">

                <div class="create-form-title-wrap">

                    <div class="create-form-title-icon">
                        <i class="fas fa-user-cog"></i>
                    </div>

                    <div>
                        <h3 class="create-form-title">
                            Pengaturan Informasi Akun
                        </h3>
                        
                    </div>

                </div>

                <div class="required-info">
                    <span class="required">*</span> Wajib diisi
                </div>

            </div>


            {{-- NOTIFIKASI BERHASIL --}}
            @if (session('success'))

                <div class="settings-success">

                    <i class="fas fa-check-circle"></i>

                    <span>{{ session('success') }}</span>

                </div>

            @endif


            {{-- ERROR VALIDATION --}}
            @if ($errors->any())

                <div class="create-error">

                    <div>
                        <strong>
                            <i class="fas fa-exclamation-circle"></i>
                            Terdapat kesalahan pada pengisian data
                        </strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            @endif


            {{-- FORM PENGATURAN AKUN --}}
            <form action="{{ route('user.settings.update') }}"
                method="POST"
                id="accountSettingsForm">

                @csrf
                @method('PUT')


                {{-- =====================================
                     INFORMASI PROFIL
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-icon">
                            <i class="fas fa-user-edit"></i>
                        </span>

                        <div>
                            <h4>Informasi Profil</h4>
                        </div>

                    </div>


                    <div class="create-form-grid">

                        {{-- NAMA LENGKAP --}}
                        <div class="create-form-group">

                            <label for="name">
                                Nama Lengkap
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $accountUser->name) }}"
                                placeholder="Masukkan nama lengkap"
                                maxlength="255"
                                autocomplete="name"
                                required
                            >

                            @error('name')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- USERNAME --}}
                        <div class="create-form-group">

                            <label for="username">
                                Username
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="username"
                                name="username"
                                value="{{ old('username', $accountUser->username) }}"
                                placeholder="Masukkan username"
                                maxlength="255"
                                autocomplete="username"
                                required
                            >

                            @error('username')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =====================================
                     KEAMANAN AKUN
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-icon">
                            <i class="fas fa-shield-alt"></i>
                        </span>

                        <div>
                            <h4>Keamanan Akun</h4>
                        </div>

                    </div>


                    {{-- INFORMASI PASSWORD --}}
                    <div class="form-status-note">

                        <i class="fas fa-info-circle"></i>

                        <span>
                            <strong>Informasi password:</strong>
                            Bagian password boleh dikosongkan jika Anda
                            tidak ingin melakukan perubahan password
                        </span>

                    </div>

                    <br>


                    <div class="create-form-grid">

                        {{-- PASSWORD LAMA --}}
                        <div class="create-form-group">

                            <label for="current_password">
                                Password Lama
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    placeholder="Masukkan password lama"
                                    autocomplete="current-password"
                                >

                                <button type="button"
                                    class="toggle-password"
                                    data-target="current_password"
                                    aria-label="Tampilkan password">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            @error('current_password')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- PASSWORD BARU --}}
                        <div class="create-form-group">

                            <label for="password">
                                Password Baru
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password baru"
                                    minlength="8"
                                    autocomplete="new-password"
                                >

                                <button type="button"
                                    class="toggle-password"
                                    data-target="password"
                                    aria-label="Tampilkan password">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            <span class="input-help">
                                Password baru minimal terdiri dari 8 karakter
                            </span>

                            @error('password')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="create-form-group full-width">

                            <label for="password_confirmation">
                                Konfirmasi Password Baru
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Masukkan kembali password baru"
                                    minlength="8"
                                    autocomplete="new-password"
                                >

                                <button type="button"
                                    class="toggle-password"
                                    data-target="password_confirmation"
                                    aria-label="Tampilkan password">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- CATATAN KEAMANAN --}}
                    <div class="form-status-note">

                        <i class="fas fa-lock"></i>

                        <span>
                            <strong>Keamanan akun:</strong>
                            Jangan membagikan password kepada orang lain,
                            pastikan password baru mudah Anda ingat
                            dan sulit ditebak
                        </span>

                    </div>

                </div>


                {{-- =====================================
                     TOMBOL FORM
                ====================================== --}}

                <div class="create-buttons">

                    <button type="reset"
                        class="create-button create-back"
                        id="resetButton">

                        <i class="fas fa-undo"></i>
                        Atur Ulang

                    </button>

                    <button type="submit"
                        class="create-button create-save"
                        id="submitButton">

                        <i class="fas fa-save"></i>
                        <span>Simpan Perubahan</span>

                    </button>

                </div>

            </form>

        </div>

    </main>


    {{-- FOOTER --}}
    @include('layouts.footer')


    {{-- JAVASCRIPT --}}
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =====================================
               DROPDOWN PROFILE
            ===================================== */

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

                        profileToggle.setAttribute('aria-expanded', 'false');

                    }

                });

                document.addEventListener('keydown', function (event) {

                    if (event.key === 'Escape') {

                        userDropdown.classList.remove('show');

                        profileToggle.setAttribute('aria-expanded', 'false');

                    }

                });

            }


            /* =====================================
               TAMPILKAN / SEMBUNYIKAN PASSWORD
            ===================================== */

            document.querySelectorAll('.toggle-password').forEach(function (button) {

                button.addEventListener('click', function () {

                    const targetId = button.dataset.target;
                    const input = document.getElementById(targetId);
                    const icon = button.querySelector('i');

                    if (!input || !icon) return;

                    const isPassword = input.type === 'password';

                    input.type = isPassword ? 'text' : 'password';

                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);

                    button.setAttribute(
                        'aria-label',
                        isPassword ? 'Sembunyikan password' : 'Tampilkan password'
                    );

                });

            });


            /* =====================================
               VALIDASI PASSWORD
            ===================================== */

            const form = document.getElementById('accountSettingsForm');

            const currentPassword = document.getElementById('current_password');
            const newPassword = document.getElementById('password');
            const confirmation = document.getElementById('password_confirmation');

            const submitButton = document.getElementById('submitButton');

            if (!form) return;

            function validatePassword() {

                currentPassword.setCustomValidity('');
                newPassword.setCustomValidity('');
                confirmation.setCustomValidity('');

                const oldValue = currentPassword.value;
                const newValue = newPassword.value;
                const confirmValue = confirmation.value;

                if (newValue || confirmValue || oldValue) {

                    if (!oldValue) {

                        currentPassword.setCustomValidity(
                            'Masukkan password lama terlebih dahulu.'
                        );

                        currentPassword.reportValidity();
                        return false;

                    }

                    if (!newValue) {

                        newPassword.setCustomValidity(
                            'Masukkan password baru.'
                        );

                        newPassword.reportValidity();
                        return false;

                    }

                    if (newValue.length < 8) {

                        newPassword.setCustomValidity(
                            'Password baru minimal 8 karakter.'
                        );

                        newPassword.reportValidity();
                        return false;

                    }

                    if (!confirmValue) {

                        confirmation.setCustomValidity(
                            'Silakan konfirmasi password baru.'
                        );

                        confirmation.reportValidity();
                        return false;

                    }

                    if (newValue !== confirmValue) {

                        confirmation.setCustomValidity(
                            'Konfirmasi password tidak sama.'
                        );

                        confirmation.reportValidity();
                        return false;

                    }

                }

                return true;

            }


            [currentPassword, newPassword, confirmation].forEach(function (input) {

                input.addEventListener('input', function () {
                    input.setCustomValidity('');
                    input.classList.remove('is-invalid');
                });

            });


            /* =====================================
               SUBMIT FORM
            ===================================== */

            form.addEventListener('submit', function (event) {

                if (!validatePassword()) {

                    event.preventDefault();
                    return;

                }

                submitButton.disabled = true;

                submitButton.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Menyimpan...</span>
                `;

            });


            /* =====================================
               RESET FORM
            ===================================== */

            const resetButton = document.getElementById('resetButton');

            if (resetButton) {

                resetButton.addEventListener('click', function () {

                    setTimeout(function () {

                        form.querySelectorAll('.is-invalid').forEach(function (field) {
                            field.classList.remove('is-invalid');
                        });

                        [currentPassword, newPassword, confirmation].forEach(function (input) {
                            input.setCustomValidity('');
                        });

                        document.querySelectorAll('.toggle-password i').forEach(function (icon) {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        });

                        document.querySelectorAll('.toggle-password').forEach(function (button) {
                            button.setAttribute('aria-label', 'Tampilkan password');
                        });

                        [currentPassword, newPassword, confirmation].forEach(function (input) {
                            input.type = 'password';
                        });

                    }, 0);

                });

            }

        });

    </script>

</body>
</html>
