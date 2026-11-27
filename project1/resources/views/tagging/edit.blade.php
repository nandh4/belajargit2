
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Tagging | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tagging/edit.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

 @php
        $accountUser = auth()->user();
    @endphp

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    <main class="main-content">

        {{-- TOPBAR --}}
        <div class="top-bar">

            <div class="page-title">
             
            </div>

            <div class="header-right">

                {{-- WAKTU PEMBARUAN DATA --}}
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
                            aria-expanded="false">

                        <div class="user-avatar">
                            {{ strtoupper(substr($accountUser->name, 0, 1)) }}
                        </div>

                        <div class="user-details">

                            <span class="user-name">
                                {{ auth()->user()->name }}
                            </span>

                            <span class="user-username">
                                {{ auth()->user()->username }}
                            </span>

                            <span class="user-role">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>

                        </div>

                        <i class="fas fa-chevron-down dropdown-arrow"></i>

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

                            <i class="fas fa-user-cog"></i>
                            Pengaturan Akun

                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button type="submit" class="dropdown-item2">

                                <i class="fas fa-sign-out-alt"></i>
                                Keluar

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- WELCOME CARD --}}
        <div class="welcome-card">

            <div class="welcome-content">

                <span class="welcome-label">
                    SISTEM PENGELOLAAN DATA TAGGING
                </span>

                <h2>Edit Data Tagging</h2>

                <p>
                    Perbarui informasi data tagging untuk menjaga
                    keakuratan dan kelengkapan data
                </p>

            </div>

        </div>


        {{-- SECTION HEADER --}}
        <div class="section">

            <div class="section-header">

                <div class="section-title-wrap">

                    <div class="section-accent"></div>

                    <div>
                        <h3 class="section-title">
                            Form Edit Data
                        </h3>

                        <p class="section-subtitle">
                            Silakan periksa dan ubah informasi data di bawah ini
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- FORM CONTAINER --}}
        <div class="create-form-container">

            <div class="create-form-header">

                <div class="create-form-title-wrap">

                    <div class="create-form-title-icon">
                        <i class="fas fa-edit"></i>
                    </div>

                    <div>
                        <h3 class="create-form-title">
                            Informasi Data Tagging
                        </h3>

                        <p class="create-form-description">
                            Perubahan data akan disimpan ke dalam sistem
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
                            Terdapat kesalahan pada pengisian data.
                        </strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            @endif


            {{-- FORM EDIT --}}
            <form action="{{ route('tagging.update', $tagging->id) }}"
                  method="POST"
                  id="editTaggingForm">

                @csrf
                @method('PUT')


                {{-- =====================================
                     01. INFORMASI PENUGASAN
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-number">01</span>

                        Informasi Penugasan

                    </div>

                    <div class="create-form-grid">

                        {{-- ASSIGNMENT ID --}}
                        <div class="create-form-group">

                            <label for="assignment_id">
                                Assignment ID
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="assignment_id"
                                   name="assignment_id"
                                   value="{{ old('assignment_id', $tagging->assignment_id) }}"
                                   placeholder="Masukkan Assignment ID"
                                   required>

                            @error('assignment_id')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- STATUS PENUGASAN --}}
                        <div class="create-form-group">

                            <label for="assignment_status_alias">
                                Status Penugasan
                                <span class="required">*</span>
                            </label>

                            <select id="assignment_status_alias"
                                    name="assignment_status_alias"
                                    required>
                                    

                                <option value="">
                                    -- Pilih Status --
                                </option>

                                <option value="APPROVED BY Pengawas"
                                    {{ old('assignment_status_alias', $tagging->assignment_status_alias) == 'APPROVED BY Pengawas' ? 'selected' : '' }}>
                                    Approved by Pengawas
                                </option>

                                <option value="SUBMITTED BY Pencacah"
                                    {{ old('assignment_status_alias', $tagging->assignment_status_alias) == 'SUBMITTED BY Pencacah' ? 'selected' : '' }}>
                                    Submitted by Pencacah
                                </option>

                                <option value="REJECTED BY Pengawas"
                                    {{ old('assignment_status_alias', $tagging->assignment_status_alias) == 'REJECTED BY Pengawas' ? 'selected' : '' }}>
                                    Rejected by Pengawas
                                </option>

                                {{-- Mempertahankan status lama jika di luar pilihan --}}
                                @if (
                                    $tagging->assignment_status_alias &&
                                    !in_array($tagging->assignment_status_alias, [
                                        'APPROVED BY Pengawas',
                                        'SUBMITTED BY Pencacah',
                                        'REJECTED BY Pengawas'
                                    ])
                                )
                                    <option value="{{ $tagging->assignment_status_alias }}"
                                        selected>
                                        {{ $tagging->assignment_status_alias }}
                                    </option>
                                @endif

                            </select>

                            @error('assignment_status_alias')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- LEVEL 6 FULL CODE --}}
                        <div class="create-form-group full-width">

                            <label for="level_6_full_code">
                                Level 6 Full Code
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="level_6_full_code"
                                   name="level_6_full_code"
                                   value="{{ old('level_6_full_code', $tagging->level_6_full_code) }}"
                                   placeholder="Masukkan kode wilayah"
                                   required>

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

                        Informasi Usaha dan Keluarga

                    </div>

                    <div class="create-form-grid">

                        {{-- NAMA USAHA --}}
                        <div class="create-form-group">

                            <label for="nama_usaha_bang">
                                Nama Usaha / Bangunan
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="nama_usaha_bang"
                                   name="nama_usaha_bang"
                                   value="{{ old('nama_usaha_bang', $tagging->nama_usaha_bang) }}"
                                   placeholder="Masukkan nama usaha"
                                   required>

                            @error('nama_usaha_bang')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- NAMA KK --}}
                        <div class="create-form-group">

                            <label for="nama_kk">
                                Nama Kepala Keluarga
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="nama_kk"
                                   name="nama_kk"
                                   value="{{ old('nama_kk', $tagging->nama_kk) }}"
                                   placeholder="Masukkan nama kepala keluarga"
                                   required>

                            @error('nama_kk')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- ADA KELUARGA --}}
                        <div class="create-form-group">

                            <label for="ada_keluarga_label">
                                Ada Keluarga
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="ada_keluarga_label"
                                   name="ada_keluarga_label"
                                   value="{{ old('ada_keluarga_label', $tagging->ada_keluarga_label) }}"
                                   placeholder="Masukkan informasi keluarga"
                                   required>

                            @error('ada_keluarga_label')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- ADA BANGUNAN USAHA --}}
                        <div class="create-form-group">

                            <label for="ada_bang_usaha_label">
                                Ada Bangunan Usaha
                                <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="ada_bang_usaha_label"
                                   name="ada_bang_usaha_label"
                                   value="{{ old('ada_bang_usaha_label', $tagging->ada_bang_usaha_label) }}"
                                   placeholder="Masukkan informasi bangunan usaha"
                                   required>

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

                        Informasi Geotagging

                    </div>

                    <div class="create-form-grid">

                        {{-- GEOTAG ACCURACY --}}
                        <div class="create-form-group">

                            <label for="geotag_accuracy">
                                Geotag Accuracy
                                <span class="required">*</span>
                            </label>

                            <input type="number"
                                   step="any"
                                   min="0"
                                   id="geotag_accuracy"
                                   name="geotag_accuracy"
                                   value="{{ old('geotag_accuracy', $tagging->geotag_accuracy) }}"
                                   placeholder="Masukkan akurasi lokasi"
                                   required>

                            <span class="input-help">
                                Tingkat akurasi koordinat lokasi
                            </span>

                            @error('geotag_accuracy')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- LATITUDE --}}
                        <div class="create-form-group">

                            <label for="geotag_latitude">
                                Latitude
                                <span class="required">*</span>
                            </label>

                            <input type="number"
                                   step="any"
                                   min="-90"
                                   max="90"
                                   id="geotag_latitude"
                                   name="geotag_latitude"
                                   value="{{ old('geotag_latitude', $tagging->geotag_latitude) }}"
                                   placeholder="Contoh: -3.00937952"
                                   required>

                            @error('geotag_latitude')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>


                        {{-- LONGITUDE --}}
                        <div class="create-form-group">

                            <label for="geotag_longitude">
                                Longitude
                                <span class="required">*</span>
                            </label>

                            <input type="number"
                                   step="any"
                                   min="-180"
                                   max="180"
                                   id="geotag_longitude"
                                   name="geotag_longitude"
                                   value="{{ old('geotag_longitude', $tagging->geotag_longitude) }}"
                                   placeholder="Contoh: 104.78702540"
                                   required>

                            @error('geotag_longitude')
                                <span class="field-error">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>


                    {{-- INFORMASI KOORDINAT --}}
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
                            id="submitButton">

                        <i class="fas fa-save"></i>
                        <span>Perbarui Data</span>

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
               VALIDASI FORM EDIT
            ===================================== */

            const form = document.getElementById('editTaggingForm');
            const submitButton = document.getElementById('submitButton');

            if (form && submitButton) {

                const requiredInputs = form.querySelectorAll('[required]');

                // Menghapus tanda error ketika input diperbaiki.
                requiredInputs.forEach(function (input) {

                    input.addEventListener('input', function () {
                        input.classList.remove('is-invalid');
                    });

                    input.addEventListener('change', function () {
                        input.classList.remove('is-invalid');
                    });

                });


                // Validasi sebelum form dikirim.
                form.addEventListener('submit', function (event) {

                    let isValid = true;
                    let firstInvalid = null;

                    requiredInputs.forEach(function (input) {

                        input.classList.remove('is-invalid');

                        if (!input.value.trim()) {

                            input.classList.add('is-invalid');
                            isValid = false;

                            if (!firstInvalid) {
                                firstInvalid = input;
                            }

                        }

                    });


                    if (!isValid) {

                        event.preventDefault();

                        if (firstInvalid) {
                            firstInvalid.focus();
                        }

                        return;

                    }


                    // Animasi tombol saat menyimpan.
                    submitButton.disabled = true;

                    submitButton.innerHTML = `
                        <i class="fas fa-spinner fa-spin"></i>
                        <span>Menyimpan...</span>
                    `;

                });

            }

        });

    </script>

</body>
</html>
