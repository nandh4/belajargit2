<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import CSV | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tagging/import.css') }}">

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

                            <i class="fa-solid fa-gear"></i>
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

                <h2>Import CSV</h2>

                <p>
                    Unggah file CSV untuk menambahkan data tagging
                    ke dalam sistem secara lebih mudah dan efisien
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
                            Import Data
                        </h3>

                        <p class="section-subtitle">
                            Silakan pilih file CSV yang akan diunggah ke dalam sistem
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
                        <i class="fas fa-file-import"></i>
                    </div>

                    <div>
                        <h3 class="create-form-title">
                            Import Data Tagging
                        </h3>

                        <p class="create-form-description">
                            Unggah file untuk memasukkan data tagging secara massal
                        </p>
                    </div>

                </div>

            </div>


            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))

                <div class="create-success">

                    <i class="fas fa-check-circle"></i>

                    <div>
                        <strong>Import Berhasil</strong>
                        <div>{{ session('success') }}</div>
                    </div>

                </div>

            @endif


            {{-- ERROR VALIDATION --}}
            @if ($errors->any())

                <div class="create-error">

                    <div>
                        <strong>
                            <i class="fas fa-exclamation-circle"></i>
                            Terdapat kesalahan saat import data
                        </strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            @endif


            {{-- FORM IMPORT --}}
            <form action="{{ route('tagging.import.process') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="importForm">

                @csrf


                {{-- =====================================
                     01. PILIH FILE CSV
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-number">01</span>

                        Pilih File CSV

                    </div>

                    <label for="file" class="upload-area" id="uploadArea">

                        <div class="upload-icon">
                            <i class="fas fa-cloud-arrow-up"></i>
                        </div>

                        <div class="upload-title">
                            Pilih File untuk Diunggah
                        </div>

                        <div class="upload-description">
                            Klik area ini untuk memilih file atau
                            <span>seret dan lepaskan file</span> di sini
                        </div>

                        <div class="upload-format">
                            <i class="fas fa-file-csv"></i>
                            Format yang didukung: CSV 
                        </div>

                    </label>

                    <input type="file"
                           id="file"
                           name="file"
                           accept=".csv"
                           required>


                    {{-- FILE INFO --}}
                    <div class="file-info" id="fileInfo">

                        <div class="file-icon">
                            <i class="fas fa-file-csv"></i>
                        </div>

                        <div class="file-details">

                            <div class="file-name" id="fileName">
                                Nama file
                            </div>

                            <div class="file-status" id="fileStatus">
                                File siap diunggah
                            </div>

                        </div>

                        <button type="button"
                                class="file-remove"
                                id="removeFile"
                                title="Hapus file">

                            <i class="fas fa-times"></i>

                        </button>

                    </div>


                    <div class="form-status-note">

                        <i class="fas fa-info-circle"></i>

                        <span>
                            Pastikan file yang dipilih merupakan file CSV
                            dengan susunan kolom yang sesuai dengan format
                            yang telah ditentukan
                        </span>

                    </div>

                </div>


                {{-- =====================================
                     02. FORMAT KOLOM CSV
                ====================================== --}}

                <div class="data-section">

                    <div class="form-section-heading">

                        <span class="form-section-number">02</span>

                        Format Kolom CSV

                    </div>

                    <p style="font-size:13px; color:#8491a5; line-height:1.7; margin:0 0 18px;">
                        File CSV harus memiliki nama header kolom berikut
                        agar data dapat dibaca dan diproses oleh sistem
                    </p>


                    <div class="column-list">

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>assignment_id</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>assignment_status_alias</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>level_6_full_code</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>nama_usaha_bang</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>nama_kk</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>ada_keluarga_label</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>ada_bang_usaha_label</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>geotag_accuracy</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>geotag_latitude</code>
                        </div>

                        <div class="column-item">
                            <span class="column-check">
                                <i class="fas fa-check"></i>
                            </span>
                            <code>geotag_longitude</code>
                        </div>

                    </div>


                    <div class="form-status-note">

                        <i class="fas fa-lightbulb"></i>

                        <span>
                            Perhatikan penulisan nama header kolom,
                            nama kolom harus sama persis dengan format
                            di atas
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
                            id="importButton"
                            disabled>

                        <i class="fas fa-file-import"></i>
                        <span>Import CSV</span>

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
               FILE UPLOAD
            ===================================== */

            const fileInput = document.getElementById('file');
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileStatus = document.getElementById('fileStatus');
            const importButton = document.getElementById('importButton');
            const uploadArea = document.getElementById('uploadArea');
            const removeFile = document.getElementById('removeFile');
            const importForm = document.getElementById('importForm');

            if (
                fileInput &&
                fileInfo &&
                fileName &&
                importButton &&
                uploadArea
            ) {

                function displayFile(file) {

                    if (!file) {
                        return;
                    }

                    const extension = file.name.split('.').pop().toLowerCase();

                    if (!['csv', 'txt'].includes(extension)) {

                        alert('Format file tidak didukung. Silakan pilih file CSV atau TXT.');

                        fileInput.value = '';
                        fileInfo.classList.remove('show');
                        importButton.disabled = true;

                        return;

                    }

                    fileName.textContent = file.name;

                    if (fileStatus) {

                        const fileSize = file.size < 1024 * 1024
                            ? (file.size / 1024).toFixed(2) + ' KB'
                            : (file.size / (1024 * 1024)).toFixed(2) + ' MB';

                        fileStatus.textContent = 'File siap diunggah • ' + fileSize;

                    }

                    fileInfo.classList.add('show');
                    importButton.disabled = false;

                }


                // Ketika file dipilih.
                fileInput.addEventListener('change', function () {

                    if (this.files.length > 0) {
                        displayFile(this.files[0]);
                    } else {
                        fileInfo.classList.remove('show');
                        importButton.disabled = true;
                    }

                });


                // Drag and drop file.
                uploadArea.addEventListener('dragover', function (event) {

                    event.preventDefault();
                    uploadArea.classList.add('dragover');

                });

                uploadArea.addEventListener('dragleave', function () {

                    uploadArea.classList.remove('dragover');

                });

                uploadArea.addEventListener('drop', function (event) {

                    event.preventDefault();

                    uploadArea.classList.remove('dragover');

                    if (event.dataTransfer.files.length > 0) {

                        fileInput.files = event.dataTransfer.files;

                        displayFile(event.dataTransfer.files[0]);

                    }

                });


                // Menghapus file yang sudah dipilih.
                if (removeFile) {

                    removeFile.addEventListener('click', function () {

                        fileInput.value = '';

                        fileInfo.classList.remove('show');

                        importButton.disabled = true;

                    });

                }


                // Animasi tombol ketika import.
                if (importForm) {

                    importForm.addEventListener('submit', function (event) {

                        if (!fileInput.files.length) {

                            event.preventDefault();

                            alert('Silakan pilih file terlebih dahulu.');

                            return;

                        }

                        importButton.disabled = true;

                        importButton.innerHTML = `
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Mengimport...</span>
                        `;

                    });

                }

            }

        });

    </script>

</body>
</html>
