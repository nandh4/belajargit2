<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Akun - Data Tagging BPS</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f2f3;
            color: #302d2f;
            min-height: 100vh;
        }

        /* =========================
           TOP ACCENT
        ========================== */

        .top-accent {
            height: 5px;
            background: #c8738e;
        }

        /* =========================
           TOP BAR
        ========================== */

        .topbar {
            height: 68px;
            background: #ffffff;
            border-bottom: 1px solid #e4dfe1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 42px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            text-decoration: none;
            color: #4f494c;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-btn:hover {
            color: #b85f7c;
        }

        .back-icon {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd6d9;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            background: #faf9f9;
        }

        .system-name {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .system-line {
            width: 4px;
            height: 28px;
            background: #c8738e;
            border-radius: 3px;
        }

        .system-name strong {
            font-size: 14px;
            color: #373235;
            letter-spacing: 0.2px;
        }

        .system-name span {
            display: block;
            font-size: 11px;
            color: #81797d;
            margin-top: 3px;
        }

        /* =========================
           MAIN CONTAINER
        ========================== */

        .container {
            width: min(1180px, calc(100% - 60px));
            margin: 0 auto;
            padding: 38px 0 55px;
        }

        /* =========================
           PAGE HEADER
        ========================== */

        .page-header {
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 29px;
            line-height: 1.25;
            color: #2f2b2d;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .page-header p {
            font-size: 14px;
            line-height: 1.6;
            color: #716a6e;
        }

        /* =========================
           MAIN GRID
        ========================== */

        .content-grid {
            display: grid;
            grid-template-columns: 310px 1fr;
            gap: 24px;
            align-items: start;
        }

        /* =========================
           LEFT COLUMN
        ========================== */

        .left-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* =========================
           PROFILE CARD
        ========================== */

        .profile-card {
            background: #ffffff;
            border: 1px solid #e2dcdf;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(50, 40, 45, 0.05);
        }

        .profile-head {
            height: 82px;
            background: #f2dbe3;
            border-bottom: 1px solid #e8cbd5;
            position: relative;
        }

        .profile-head::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 5px;
            height: 100%;
            background: #c8738e;
        }

        .avatar {
            position: absolute;
            width: 76px;
            height: 76px;
            left: 28px;
            bottom: -38px;
            border-radius: 50%;
            background: #c8738e;
            border: 5px solid #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            box-shadow: 0 3px 10px rgba(60, 40, 50, 0.12);
        }

        .profile-body {
            padding: 52px 25px 25px;
        }

        .profile-name {
            font-size: 19px;
            font-weight: 700;
            color: #302c2e;
            margin-bottom: 5px;
        }

        .profile-username {
            font-size: 13px;
            color: #746d71;
            margin-bottom: 20px;
        }

        .profile-status {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-role {
            background: #f5e5eb;
            color: #a95775;
            border: 1px solid #e7ccd6;
        }

        .badge-active {
            background: #edf6f0;
            color: #3f7754;
            border: 1px solid #d5e8dc;
        }

        .profile-divider {
            height: 1px;
            background: #e8e3e5;
            margin: 0 -25px 20px;
        }

        .info-title {
            font-size: 13px;
            font-weight: 700;
            color: #454043;
            margin-bottom: 14px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 13px;
        }

        .info-label {
            font-size: 12px;
            color: #81797d;
        }

        .info-value {
            font-size: 12px;
            font-weight: 600;
            color: #484245;
            text-align: right;
        }

        /* =========================
           LOGOUT CARD
        ========================== */

        .logout-card {
            background: #ffffff;
            border: 1px solid #e2dcdf;
            border-left: 4px solid #c8738e;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 3px 12px rgba(50, 40, 45, 0.04);
        }

        .logout-title {
            font-size: 14px;
            font-weight: 700;
            color: #403a3d;
            margin-bottom: 6px;
        }

        .logout-text {
            font-size: 12px;
            line-height: 1.5;
            color: #81797d;
            margin-bottom: 16px;
        }

        .btn-logout {
            width: 100%;
            height: 40px;
            background: #ffffff;
            border: 1px solid #d8a8b8;
            color: #ae5875;
            border-radius: 6px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background: #f9edf1;
            border-color: #c8738e;
        }

        /* =========================
           RIGHT COLUMN
        ========================== */

        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* =========================
           SECTION CARD
        ========================== */

        .section-card {
            background: #ffffff;
            border: 1px solid #e2dcdf;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(50, 40, 45, 0.05);
            overflow: hidden;
        }

        .section-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e8e3e5;
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .section-icon {
            width: 36px;
            height: 36px;
            border-radius: 7px;
            background: #f5e4ea;
            color: #b35e7b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 700;
        }

        .section-header h2 {
            font-size: 16px;
            color: #373234;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .section-header p {
            font-size: 12px;
            color: #81797d;
        }

        .section-body {
            padding: 24px;
        }

        /* =========================
           FORM
        ========================== */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 2px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #4b4548;
            margin-bottom: 8px;
        }

        .required {
            color: #b85f7c;
        }

        input {
            width: 100%;
            height: 43px;
            border: 1px solid #d9d3d6;
            border-radius: 6px;
            padding: 0 13px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            color: #383336;
            background: #ffffff;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #c8738e;
            box-shadow: 0 0 0 3px rgba(200, 115, 142, 0.10);
        }

        input::placeholder {
            color: #aaa2a6;
        }

        .helper {
            font-size: 12px;
            line-height: 1.5;
            color: #827a7e;
            margin-top: 2px;
        }

        /* =========================
           ALERT
        ========================== */

        .alert-error {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: #fff0f0;
            border: 1px solid #f0cccc;
            border-radius: 6px;
            color: #9d4141;
            font-size: 13px;
            line-height: 1.5;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: #edf7f0;
            border: 1px solid #cfe5d5;
            border-radius: 6px;
            color: #39724d;
            font-size: 13px;
        }

        .alert-error ul {
            margin: 7px 0 0 18px;
        }

        /* =========================
           ACTION BAR
        ========================== */

        .action-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            padding: 18px 24px;
            background: #faf9f9;
            border-top: 1px solid #e8e3e5;
        }

        .btn {
            height: 42px;
            padding: 0 20px;
            border-radius: 6px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-save {
            background: #bd6884;
            color: #ffffff;
            border: 1px solid #bd6884;
        }

        .btn-save:hover {
            background: #a95673;
            border-color: #a95673;
        }

        .btn-cancel {
            background: #ffffff;
            color: #5f585c;
            border: 1px solid #d9d3d6;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: #f7f5f6;
        }

        /* =========================
           FOOTER
        ========================== */

        .footer {
            text-align: center;
            margin-top: 32px;
            color: #999195;
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 850px) {

            .topbar {
                padding: 0 20px;
            }

            .container {
                width: min(100% - 30px, 700px);
                padding-top: 25px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

        }

        @media (max-width: 550px) {

            .topbar {
                min-height: 62px;
                height: auto;
                padding: 13px 15px;
            }

            .system-name span {
                display: none;
            }

            .system-name strong {
                font-size: 12px;
            }

            .container {
                width: calc(100% - 24px);
                padding-top: 22px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .page-header p {
                font-size: 13px;
            }

            .section-header,
            .section-body {
                padding: 18px;
            }

            .action-bar {
                padding: 16px 18px;
                flex-direction: column-reverse;
            }

            .action-bar .btn {
                width: 100%;
            }

            .logout-card {
                padding: 18px;
            }

        }
    </style>
</head>

<body>

    <!-- =========================
         TOP ACCENT
    ========================== -->

    <div class="top-accent"></div>


    <!-- =========================
         TOP BAR
    ========================== -->

    <header class="topbar">

        <a href="{{ route('dashboard') }}" class="back-btn">

            <span class="back-icon">
                ←
            </span>

            <span>
                Kembali ke Dashboard
            </span>

        </a>


        <div class="system-name">

            <div class="system-line"></div>

            <div>

                <strong>
                    DATA TAGGING BPS
                </strong>

                <span>
                    Sistem Pengelolaan Data Tagging
                </span>

            </div>

        </div>

    </header>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="container">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <h1>
                Pengaturan Akun
            </h1>

            <p>
                Kelola informasi profil dan keamanan akun yang digunakan
                untuk mengakses sistem Data Tagging BPS.
            </p>

        </div>


        <!-- =========================
             ERROR MESSAGE
        ========================== -->

        @if ($errors->any())

            <div class="alert-error">

                <strong>
                    Periksa kembali data yang dimasukkan.
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =========================
             SUCCESS MESSAGE
        ========================== -->

        @if (session('success'))

            <div class="alert-success">
                {{ session('success') }}
            </div>

        @endif


        <!-- =========================
             CONTENT GRID
        ========================== -->

        <div class="content-grid">


            <!-- =========================
                 LEFT COLUMN
            ========================== -->

            <div class="left-column">


                <!-- PROFILE CARD -->

                <aside class="profile-card">


                    <!-- PROFILE HEADER -->

                    <div class="profile-head">

                        <div class="avatar">

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        </div>

                    </div>


                    <!-- PROFILE BODY -->

                    <div class="profile-body">


                        <div class="profile-name">

                            {{ $user->name }}

                        </div>


                        <div class="profile-username">

                            @{{ $user->username }}

                        </div>


                        <!-- ROLE + STATUS -->

                        <div class="profile-status">

                            <span class="badge badge-role">

                                {{ ucfirst($user->role) }}

                            </span>


                            <span class="badge badge-active">

                                Aktif

                            </span>

                        </div>


                        <div class="profile-divider"></div>


                        <!-- ACCOUNT INFORMATION -->

                        <div class="info-title">

                            Informasi Akun

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                ID Pengguna
                            </span>

                            <span class="info-value">
                                {{ $user->id }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Role
                            </span>

                            <span class="info-value">
                                {{ ucfirst($user->role) }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Dibuat
                            </span>

                            <span class="info-value">

                                {{ $user->created_at
                                    ? $user->created_at->format('d/m/Y')
                                    : '-' }}

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Diperbarui
                            </span>

                            <span class="info-value">

                                {{ $user->updated_at
                                    ? $user->updated_at->format('d/m/Y')
                                    : '-' }}

                            </span>

                        </div>


                    </div>

                </aside>


                <!-- =========================
                     LOGOUT
                ========================== -->

                <div class="logout-card">


                    <div class="logout-title">

                        Keluar dari Akun

                    </div>


                    <div class="logout-text">

                        Akhiri sesi akun dari sistem Data Tagging BPS.

                    </div>


                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        onsubmit="return confirm('Apakah kamu yakin ingin keluar dari akun?')"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn-logout"
                        >
                            Logout
                        </button>

                    </form>


                </div>


            </div>


            <!-- =========================
                 RIGHT COLUMN
            ========================== -->

            <div class="right-column">


                <form
                    action="{{ route('account.update') }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <!-- =========================
                         INFORMASI PROFIL
                    ========================== -->

                    <section class="section-card">


                        <div class="section-header">


                            <div class="section-icon">
                                P
                            </div>


                            <div>

                                <h2>
                                    Informasi Profil
                                </h2>

                                <p>
                                    Perbarui nama dan username akun.
                                </p>

                            </div>


                        </div>


                        <div class="section-body">


                            <div class="form-grid">


                                <!-- NAMA -->

                                <div class="form-group">

                                    <label for="name">

                                        Nama Lengkap

                                        <span class="required">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                    >

                                </div>


                                <!-- USERNAME -->

                                <div class="form-group">

                                    <label for="username">

                                        Username

                                        <span class="required">
                                            *
                                        </span>

                                    </label>


                                    <input
                                        type="text"
                                        id="username"
                                        name="username"
                                        value="{{ old('username', $user->username) }}"
                                        placeholder="Masukkan username"
                                        required
                                    >

                                </div>


                            </div>


                        </div>


                    </section>


                    <div style="height: 20px;"></div>


                    <!-- =========================
                         KEAMANAN AKUN
                    ========================== -->

                    <section class="section-card">


                        <div class="section-header">


                            <div class="section-icon">
                                K
                            </div>


                            <div>

                                <h2>
                                    Keamanan Akun
                                </h2>

                                <p>
                                    Ubah password untuk menjaga keamanan akun.
                                </p>

                            </div>


                        </div>


                        <div class="section-body">


                            <div class="form-grid">


                                <!-- PASSWORD LAMA -->

                                <div class="form-group full">

                                    <label for="current_password">

                                        Password Saat Ini

                                    </label>


                                    <input
                                        type="password"
                                        id="current_password"
                                        name="current_password"
                                        placeholder="Masukkan password saat ini"
                                    >

                                </div>


                                <!-- PASSWORD BARU -->

                                <div class="form-group">

                                    <label for="password">

                                        Password Baru

                                    </label>


                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="Masukkan password baru"
                                    >

                                </div>


                                <!-- KONFIRMASI PASSWORD -->

                                <div class="form-group">

                                    <label for="password_confirmation">

                                        Konfirmasi Password Baru

                                    </label>


                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        placeholder="Ulangi password baru"
                                    >

                                </div>


                                <!-- KETERANGAN -->

                                <div class="form-group full">

                                    <div class="helper">

                                        Kosongkan seluruh bagian password jika tidak ingin
                                        mengubah password akun.

                                    </div>

                                </div>


                            </div>


                        </div>


                        <!-- ACTION BAR -->

                        <div class="action-bar">


                            <a
                                href="{{ route('dashboard') }}"
                                class="btn btn-cancel"
                            >
                                Batal
                            </a>


                            <button
                                type="submit"
                                class="btn btn-save"
                            >
                                Simpan Perubahan
                            </button>


                        </div>


                    </section>


                </form>


            </div>


        </div>


        <!-- =========================
             FOOTER
        ========================== -->

        <div class="footer">

            Data Tagging BPS
            &nbsp;•&nbsp;
            Sistem Pengelolaan Data Tagging

        </div>


    </main>

</body>
</html>