
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password User | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/reset-pw.css') }}">

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
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                        <div class="user-details">

                            <div class="user-name">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="user-username">
                                {{ auth()->user()->username }}
                            </div>

                            <span class="user-role">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>

                        </div>

                        <i class="fa-solid fa-chevron-down dropdown-arrow"></i>

                    </button>

                    {{-- DROPDOWN PROFILE --}}
                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-header">
                            <strong>{{ auth()->user()->name }}</strong>
                            <span>{{ '@' . auth()->user()->username }}</span>
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

                <h2>Reset Password User</h2>

                <p>
                    Perbarui password akun user untuk menjaga
                    keamanan akses ke dalam sistem
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
                            Form Reset Password
                        </h2>

                        <p class="section-subtitle">
                            Silakan periksa informasi akun dan masukkan password baru user
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
                        <i class="fas fa-key"></i>
                    </div>

                    <div>
                        <h3 class="create-form-title">
                            Reset Password Akun
                        </h3>

                        <p class="create-form-description">
                            Atur ulang password untuk akun pengguna yang dipilih
                        </p>
                    </div>

                </div>

                <div class="required-info">
                    <span class="required">*</span> Wajib diisi
                </div>

            </div>


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


            {{-- FORM RESET PASSWORD --}}
            <form action="{{ route('user.reset-pw.process', $user->id) }}"
                method="POST"
                id="resetPasswordForm">

                @csrf


                {{-- =====================================
                     01. INFORMASI PENGGUNA
                ====================================== --}}

                <div class="data-section">


                    <div class="user-reset-profile">

                        <div class="user-reset-avatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="user-reset-details">

                            <h4>{{ $user->name }}</h4>

                            <span class="user-reset-username">
                                {{ '@' . $user->username }}
                            </span>

                            <div class="user-reset-role">

                                @if($user->role === 'admin')

                                    <span class="role-badge role-admin">
                                        <i class="fas fa-shield-alt"></i>
                                        Admin
                                    </span>

                                @else

                                    <span class="role-badge role-operator">
                                        <i class="fas fa-user"></i>
                                        Operator
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================
                     02. KEAMANAN AKUN
                ====================================== --}}

                <div class="data-section">

            
                    <div class="create-form-grid">

                        {{-- PASSWORD BARU --}}
                        <div class="create-form-group full-width">

                            <label for="password">
                                Password Baru
                                <span class="required">*</span>
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password baru"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
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
                                <span class="required">*</span>
                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Masukkan kembali password baru"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
                                >

                                <button type="button"
                                    class="toggle-password"
                                    data-target="password_confirmation"
                                    aria-label="Tampilkan password">

                                    <i class="fa-solid fa-eye"></i>

                                </button>

                            </div>

                            <span class="field-error"
                                id="confirmationError"
                                style="display: none;">
                                Konfirmasi password tidak sesuai.
                            </span>

                        </div>

                    </div>


                    {{-- INFORMASI KEAMANAN --}}
                    <div class="form-status-note">

                        <i class="fas fa-info-circle"></i>

                        <span>
                            <strong>Informasi keamanan:</strong>
                            Password baru akan menggantikan password sebelumnya,
                            pastikan password disampaikan kepada user secara aman
                            agar dapat digunakan untuk login kembali
                        </span>

                    </div>

                </div>


                {{-- =====================================
                     TOMBOL FORM
                ====================================== --}}

                <div class="create-buttons">

                    <a href="{{ route('user.index') }}"
                        class="create-button create-back">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit"
                        class="create-button create-save"
                        id="submitButton">

                        <i class="fas fa-key"></i>
                        <span>Reset Password</span>

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

            const form = document.getElementById('resetPasswordForm');

            const password = document.getElementById('password');
            const confirmation = document.getElementById('password_confirmation');

            const confirmationError = document.getElementById('confirmationError');
            const submitButton = document.getElementById('submitButton');

            function validatePassword() {

                password.setCustomValidity('');
                confirmation.setCustomValidity('');

                confirmationError.style.display = 'none';

                if (password.value.length < 8) {

                    password.setCustomValidity(
                        'Password baru minimal 8 karakter.'
                    );

                    password.reportValidity();

                    return false;

                }

                if (password.value !== confirmation.value) {

                    confirmationError.style.display = 'block';

                    confirmation.setCustomValidity(
                        'Konfirmasi password tidak sesuai.'
                    );

                    confirmation.reportValidity();

                    return false;

                }

                return true;

            }


            password.addEventListener('input', function () {

                password.setCustomValidity('');

                if (confirmation.value !== '') {
                    confirmation.setCustomValidity('');
                    confirmationError.style.display = 'none';
                }

            });

            confirmation.addEventListener('input', function () {

                confirmation.setCustomValidity('');
                confirmationError.style.display = 'none';

            });


            /* =====================================
               SUBMIT FORM
            ===================================== */

            form.addEventListener('submit', function (event) {

                if (!validatePassword()) {

                    event.preventDefault();

                    return;

                }

                if (!confirm(
                    'Apakah Anda yakin ingin mereset password akun {{ addslashes($user->name) }}?'
                )) {

                    event.preventDefault();

                    return;

                }

                submitButton.disabled = true;

                submitButton.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Memproses...</span>
                `;

            });

        });

    </script>

</body>
</html>
