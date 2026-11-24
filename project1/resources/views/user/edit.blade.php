<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Akun | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/edit.css') }}">


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

                <h2>Edit Akun</h2>

                <p>
                    Perbarui informasi akun user agar data dan
                    hak akses pada sistem tetap sesuai
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
                            Form Edit Akun
                        </h2>

                        <p class="section-subtitle">
                            Silakan periksa dan ubah informasi akun user di bawah ini
                        </p>
                    </div>

                </div>

            </div>

        </section>


        {{-- FORM CONTAINER --}}
        <div class="create-form-container">

            <div class="create-form-header">

                <div class="create-form-title-wrap">

                    <div class="create-form-title-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>

                    <div>
                        <h3 class="create-form-title">
                            Informasi Akun User
                        </h3>

                        <p class="create-form-description">
                            Perubahan akun akan disimpan ke dalam sistem
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


            {{-- FORM EDIT USER --}}
            <form action="{{ route('user.update', $user->id) }}"
                method="POST"
                id="editUserForm">

                @csrf
                @method('PUT')


                {{-- =====================================
                     01. INFORMASI IDENTITAS
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-number">01</span>

                        <div>
                            <h4>Informasi Identitas</h4>
                        </div>

                    </div>

                    <div class="create-form-grid">

                        {{-- NAMA LENGKAP --}}
                        <div class="create-form-group full-width">

                            <label for="name">
                                Nama Lengkap
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
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
                        <div class="create-form-group full-width">

                            <label for="username">
                                Username
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="username"
                                name="username"
                                value="{{ old('username', $user->username) }}"
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
                     02. INFORMASI AKUN
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-number">02</span>

                        <div>
                            <h4>Informasi Akun</h4>
                        </div>

                    </div>

                    <div class="create-form-grid">

                        {{-- ROLE --}}
                        <div class="create-form-group">

                            <label for="role">
                                Role User
                                <span class="required">*</span>
                            </label>

                            <select
                                id="role"
                                name="role"
                                required
                            >

                                <option value="" disabled>
                                    -- Pilih Role --
                                </option>

                                <option value="admin"
                                    {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                                <option value="operator"
                                    {{ old('role', $user->role) == 'operator' ? 'selected' : '' }}>
                                    Operator
                                </option>

                            </select>

                            <span class="input-help">
                                Pilih hak akses yang sesuai dengan user
                            </span>

                            @error('role')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>


                    {{-- INFORMASI ROLE --}}
                    <div class="form-status-note">

                        <i class="fas fa-info-circle"></i>

                        <span>
                            <strong>Informasi role:</strong>
                                Admin memiliki akses untuk mengelola sistem dan user,
                                sedangkan Operator menggunakan sistem untuk melakukan
                                pengelolaan data tagging sesuai hak aksesnya               
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

                        <i class="fas fa-save"></i>
                        <span>Perbarui Akun</span>

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


            /* =====================================
               TAMPILKAN / SEMBUNYIKAN PASSWORD
            ===================================== */

            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            if (passwordInput && togglePassword) {

                togglePassword.addEventListener('click', function () {

                    const isPassword = passwordInput.type === 'password';

                    passwordInput.type = isPassword ? 'text' : 'password';

                    togglePassword.innerHTML = isPassword
                        ? '<i class="fa-solid fa-eye-slash"></i>'
                        : '<i class="fa-solid fa-eye"></i>';

                    togglePassword.setAttribute(
                        'aria-label',
                        isPassword ? 'Sembunyikan password' : 'Tampilkan password'
                    );

                });

            }


            /* =====================================
               VALIDASI FORM EDIT USER
            ===================================== */

            const form = document.getElementById('editUserForm');
            const submitButton = document.getElementById('submitButton');

            if (!form || !submitButton) {
                return;
            }

            const requiredFields = form.querySelectorAll(
                'input[required], select[required]'
            );

            // Hapus tanda error ketika input diperbaiki.
            requiredFields.forEach(function (field) {

                field.addEventListener('input', function () {
                    field.classList.remove('is-invalid');
                });

                field.addEventListener('change', function () {
                    field.classList.remove('is-invalid');
                });

            });


            // Validasi sebelum form dikirim.
            form.addEventListener('submit', function (event) {

                let firstInvalid = null;

                requiredFields.forEach(function (field) {

                    if (!field.checkValidity()) {

                        field.classList.add('is-invalid');

                        if (!firstInvalid) {
                            firstInvalid = field;
                        }

                    } else {

                        field.classList.remove('is-invalid');

                    }

                });


                // Password bersifat opsional, tetapi jika diisi harus minimal 8 karakter.
                if (passwordInput.value !== '' && passwordInput.value.length < 8) {

                    event.preventDefault();

                    passwordInput.classList.add('is-invalid');
                    passwordInput.focus();

                    passwordInput.setCustomValidity(
                        'Password harus terdiri dari minimal 8 karakter.'
                    );

                    passwordInput.reportValidity();

                    return;

                } else if (passwordInput) {

                    passwordInput.setCustomValidity('');
                    passwordInput.classList.remove('is-invalid');

                }


                if (firstInvalid) {

                    event.preventDefault();

                    firstInvalid.focus();
                    firstInvalid.reportValidity();

                    return;

                }


                // Animasi tombol saat menyimpan.
                submitButton.disabled = true;

                submitButton.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Menyimpan...</span>
                `;

            });


            if (passwordInput) {

                passwordInput.addEventListener('input', function () {
                    passwordInput.setCustomValidity('');
                    passwordInput.classList.remove('is-invalid');
                });

            }

        });

    </script>

</body>
</html>