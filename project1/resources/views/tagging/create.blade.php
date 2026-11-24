<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Tagging | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tagging/create.css') }}">


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

            {{-- USER PROFILE --}}
            <div class="header-right">

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
                                {{ ucfirst(auth()->user()->role) }}
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

                <h2>Tambah Data Tagging</h2>

                <p>
                    Masukkan informasi data tagging secara manual
                    sesuai dengan struktur data yang digunakan
                    pada Sistem Pengelolaan Data Tagging
                </p>

            </div>

        </section>


        {{-- FORM SECTION --}}
        <section class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h2 class="section-title">Form Tambah Data</h2>

                        <p class="section-subtitle">
                            Lengkapi informasi data tagging di bawah ini
                        </p>
                    </div>

                </div>

            </div>


            {{-- FORM CONTAINER --}}
            <div class="create-form-container">

                <div class="create-form-header">

                    <div class="create-form-title">

                        <div class="create-form-title-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>

                        <div>
                            <h3>Informasi Data Tagging</h3>

                            <p>
                                Pastikan seluruh informasi data yang dimasukkan sudah benar
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

                        <div class="create-error-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>

                        <div>

                            <strong>
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


                {{-- FORM --}}
                <form action="{{ route('tagging.store') }}"
                    method="POST"
                    id="taggingForm">

                    @csrf


                    {{-- =====================================
                         01. INFORMASI PENUGASAN
                    ====================================== --}}

                    <div class="data-section">

                        <div class="form-section-heading">

                            <span class="form-section-number">01</span>

                            <div>
                                <h4>Informasi Penugasan</h4>
                                <p>
                                    Informasi identitas utama data tagging
                                </p>
                            </div>

                        </div>

                        <div class="create-form-grid">

                            <div class="create-form-group">

                                <label for="assignment_id">
                                    Assignment ID
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="assignment_id"
                                    name="assignment_id"
                                    value="{{ old('assignment_id') }}"
                                    placeholder="Masukkan Assignment ID"
                                    required
                                >

                                @error('assignment_id')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="assignment_status_alias">
                                    Status Penugasan
                                    <span class="required">*</span>
                                </label>

                                <select
                                    id="assignment_status_alias"
                                    name="assignment_status_alias"
                                    required>

                                    <option value="" disabled
                                        {{ old('assignment_status_alias') ? '' : 'selected' }}>
                                        -- Pilih Status --
                                    </option>

                                    <option value="APPROVED BY Pengawas"
                                        {{ old('assignment_status_alias') == 'APPROVED BY Pengawas' ? 'selected' : '' }}>
                                        APPROVED BY Pengawas
                                    </option>

                                    <option value="SUBMITTED BY Pencacah"
                                        {{ old('assignment_status_alias') == 'SUBMITTED BY Pencacah' ? 'selected' : '' }}>
                                        SUBMITTED BY Pencacah
                                    </option>

                                    <option value="REJECTED BY Pengawas"
                                        {{ old('assignment_status_alias') == 'REJECTED BY Pengawas' ? 'selected' : '' }}>
                                        REJECTED BY Pengawas
                                    </option>

                                </select>

                                @error('assignment_status_alias')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group full-width">

                                <label for="level_6_full_code">
                                    Level 6 Full Code
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="level_6_full_code"
                                    name="level_6_full_code"
                                    value="{{ old('level_6_full_code') }}"
                                    placeholder="Masukkan kode wilayah"
                                    required
                                >

                                @error('level_6_full_code')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- =====================================
                         02. INFORMASI USAHA DAN KELUARGA
                    ====================================== --}}

                    <div class="data-section">

                        <div class="form-section-heading">

                            <span class="form-section-number">02</span>

                            <div>
                                <h4>Informasi Usaha dan Keluarga</h4>
                                <p>
                                    Informasi usaha, bangunan, dan kepala keluarga
                                </p>
                            </div>

                        </div>

                        <div class="create-form-grid">

                            <div class="create-form-group">

                                <label for="nama_usaha_bang">
                                    Nama Usaha / Bangunan
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="nama_usaha_bang"
                                    name="nama_usaha_bang"
                                    value="{{ old('nama_usaha_bang') }}"
                                    placeholder="Masukkan nama usaha"
                                    required
                                >

                                @error('nama_usaha_bang')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="nama_kk">
                                    Nama Kepala Keluarga
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="nama_kk"
                                    name="nama_kk"
                                    value="{{ old('nama_kk') }}"
                                    placeholder="Masukkan nama kepala keluarga"
                                    required
                                >

                                @error('nama_kk')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="ada_keluarga_label">
                                    Ada Keluarga
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="ada_keluarga_label"
                                    name="ada_keluarga_label"
                                    value="{{ old('ada_keluarga_label') }}"
                                    placeholder="Masukkan informasi keluarga"
                                    required
                                >

                                @error('ada_keluarga_label')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="ada_bang_usaha_label">
                                    Ada Bangunan Usaha
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="ada_bang_usaha_label"
                                    name="ada_bang_usaha_label"
                                    value="{{ old('ada_bang_usaha_label') }}"
                                    placeholder="Masukkan informasi bangunan usaha"
                                    required
                                >

                                @error('ada_bang_usaha_label')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- =====================================
                         03. INFORMASI GEOTAGGING
                    ====================================== --}}

                    <div class="data-section">

                        <div class="form-section-heading">

                            <span class="form-section-number">03</span>

                            <div>
                                <h4>Informasi Geotagging</h4>
                                <p>
                                    Informasi koordinat dan ketelitian lokasi
                                </p>
                            </div>

                        </div>

                        <div class="create-form-grid">

                            <div class="create-form-group">

                                <label for="geotag_accuracy">
                                    Geotag Accuracy
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    step="any"
                                    min="0"
                                    id="geotag_accuracy"
                                    name="geotag_accuracy"
                                    value="{{ old('geotag_accuracy') }}"
                                    placeholder="Masukkan akurasi lokasi"
                                    required
                                >

                                <span class="input-help">
                                    Tingkat akurasi koordinat lokasi
                                </span>

                                @error('geotag_accuracy')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="geotag_latitude">
                                    Latitude
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    step="any"
                                    min="-90"
                                    max="90"
                                    id="geotag_latitude"
                                    name="geotag_latitude"
                                    value="{{ old('geotag_latitude') }}"
                                    placeholder="Contoh: -3.00937952"
                                    required
                                >

                                @error('geotag_latitude')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="create-form-group">

                                <label for="geotag_longitude">
                                    Longitude
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    step="any"
                                    min="-180"
                                    max="180"
                                    id="geotag_longitude"
                                    name="geotag_longitude"
                                    value="{{ old('geotag_longitude') }}"
                                    placeholder="Contoh: 104.78702540"
                                    required
                                >

                                @error('geotag_longitude')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>


                        <div class="form-status-note">

                            <i class="fas fa-info-circle"></i>

                            <span>
                                Pastikan koordinat latitude dan longitude sudah benar
                                agar lokasi data tagging dapat ditampilkan secara tepat
                                pada peta
                            </span>

                        </div>

                    </div>


                    {{-- =====================================
                         TOMBOL FORM
                    ====================================== --}}

                    <div class="create-buttons">

                        <a href="{{ route('tagging.index') }}"
                            class="create-button create-back">

                            <i class="fas fa-arrow-left"></i>
                            Kembali

                        </a>

                        <button type="submit"
                            class="create-button create-save"
                            id="saveButton">

                            <i class="fas fa-save"></i>
                            <span>Simpan Data</span>

                        </button>

                    </div>

                </form>

            </div>

        </section>

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
               VALIDASI FORM
            ===================================== */

            const form = document.getElementById('taggingForm');
            const saveButton = document.getElementById('saveButton');

            if (!form || !saveButton) {
                return;
            }

            const requiredFields = form.querySelectorAll(
                'input[required], select[required]'
            );

            requiredFields.forEach(function (field) {

                field.addEventListener('input', function () {
                    field.classList.remove('is-invalid');
                });

                field.addEventListener('change', function () {
                    field.classList.remove('is-invalid');
                });

            });


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


                if (firstInvalid) {

                    event.preventDefault();

                    firstInvalid.focus();
                    firstInvalid.reportValidity();

                    return;

                }


                saveButton.disabled = true;

                saveButton.innerHTML = `
                    <i class="fas fa-spinner fa-spin"></i>
                    <span>Menyimpan...</span>
                `;

            });

        });

    </script>

</body>
</html>
