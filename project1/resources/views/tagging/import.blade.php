<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Import CSV - Data Tagging BPS</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #fbf8fa;
            color: #40393d;
            overflow-x: hidden;
        }

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            padding: 24px 15px;
            background: linear-gradient(
                180deg,
                #efb6c8 0%,
                #e5a5bb 55%,
                #d98fa8 100%
            );
            color: white;
            box-shadow: 4px 0 18px rgba(126,72,91,0.10);
            z-index: 1000;
            overflow: hidden;
            transition: width 0.25s ease, padding 0.25s ease;
        }

        .sidebar-toggle {
            position: absolute;
            top: 18px;
            right: 12px;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.45);
            border-radius: 9px;
            background: rgba(255,255,255,0.20);
            color: white;
            font-size: 17px;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(126,72,91,0.12);
            z-index: 20;
            transition: background 0.2s ease, color 0.2s ease, right 0.25s ease;
        }

        .sidebar-toggle:hover {
            background: rgba(255,255,255,0.35);
        }

        .sidebar-brand {
            text-align:center;
            margin-bottom:25px;
            padding-top:25px;
            flex-shrink:0;
            transition: margin 0.25s ease, padding 0.25s ease;
        }

        .brand-icon {
            width:52px;
            height:52px;
            margin:0 auto 10px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:rgba(255,255,255,0.22);
            border-radius:14px;
            font-size:25px;
            box-shadow:0 4px 12px rgba(126,72,91,0.08);
        }

        .sidebar-brand h2 {
            margin:0;
            font-size:16px;
            font-weight:700;
            letter-spacing:0.5px;
            white-space:nowrap;
        }

        .sidebar-brand p {
            margin:5px 0 0;
            font-size:11px;
            line-height:1.5;
            opacity:0.9;
            white-space:nowrap;
        }

        .menu-title {
            margin-bottom:10px;
            padding-left:8px;
            font-size:10px;
            font-weight:700;
            text-transform:uppercase;
            letter-spacing:1px;
            opacity:0.75;
            flex-shrink:0;
            transition:margin 0.25s ease, opacity 0.2s ease;
        }

        .sidebar-menu {
            display:flex;
            flex-direction:column;
            gap:5px;
            flex-shrink:0;
            transition:margin-top 0.25s ease;
        }

        .sidebar-menu a {
            display:flex;
            align-items:center;
            gap:12px;
            padding:11px 13px;
            border-radius:9px;
            color:white;
            text-decoration:none;
            font-size:14px;
            transition:background 0.2s ease, padding 0.25s ease, justify-content 0.25s ease;
        }

        .sidebar-menu a:hover {
            background:rgba(255,255,255,0.16);
        }

        .sidebar-menu a.active {
            background:rgba(255,255,255,0.25);
            box-shadow:0 4px 10px rgba(126,72,91,0.08);
        }

        .menu-icon {
            width:22px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:16px;
            flex-shrink:0;
        }

        .sidebar-bottom {
            margin-top:auto;
            flex-shrink:0;
        }

        .user-mini {
            padding:12px 13px;
            margin-bottom:8px;
            background:rgba(255,255,255,0.12);
            border-radius:9px;
            transition:padding 0.25s ease;
        }

        .user-mini-name {
            font-size:13px;
            font-weight:600;
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
        }

        .user-mini-role {
            margin-top:3px;
            font-size:11px;
            opacity:0.8;
        }

        .logout-button {
            width:100%;
            display:flex;
            align-items:center;
            gap:12px;
            padding:11px 13px;
            border:none;
            border-radius:9px;
            background:rgba(255,255,255,0.12);
            color:white;
            cursor:pointer;
            font-size:14px;
            text-align:left;
            transition:background 0.2s ease, padding 0.25s ease;
        }

        .logout-button:hover {
            background:#c96f89;
        }

        body.sidebar-closed .sidebar {
            width:72px;
            padding:24px 10px;
        }

        body.sidebar-closed .sidebar-toggle {
            right:19px;
        }

        body.sidebar-closed .sidebar-brand {
            padding-top:48px;
            margin-bottom:18px;
        }

        body.sidebar-closed .sidebar-brand h2,
        body.sidebar-closed .sidebar-brand p {
            display:none;
        }

        body.sidebar-closed .brand-icon {
            width:48px;
            height:48px;
            margin-bottom:0;
            font-size:23px;
        }

        body.sidebar-closed .menu-title {
            display:none;
        }

        body.sidebar-closed .sidebar-menu {
            margin-top:15px;
        }

        body.sidebar-closed .sidebar-menu a {
            justify-content:center;
            gap:0;
            padding:11px 8px;
        }

        body.sidebar-closed .sidebar-menu a span:not(.menu-icon) {
            display:none;
        }

        body.sidebar-closed .menu-icon {
            width:26px;
            height:26px;
            font-size:17px;
        }

        body.sidebar-closed .user-mini {
            padding:10px 8px;
            text-align:center;
        }

        body.sidebar-closed .user-mini-name,
        body.sidebar-closed .user-mini-role {
            display:none;
        }

        body.sidebar-closed .logout-button {
            justify-content:center;
            gap:0;
            padding:11px 8px;
        }

        body.sidebar-closed .logout-button span:not(.menu-icon) {
            display:none;
        }

        .main-content {
            width:calc(100% - 250px);
            margin-left:250px;
            padding:28px 34px 40px;
            min-height:100vh;
            transition:width 0.25s ease, margin-left 0.25s ease;
        }

        body.sidebar-closed .main-content {
            width:calc(100% - 72px);
            margin-left:72px;
        }

        .top-bar {
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:20px;
            margin-bottom:18px;
        }

        .page-title h1 {
            margin:0 0 5px;
            color:#383236;
            font-size:25px;
        }

        .page-title p {
            margin:0;
            color:#81767c;
            font-size:13px;
        }

        .system-badge {
            display:flex;
            align-items:center;
            gap:7px;
            padding:9px 14px;
            background:white;
            border:1px solid #eee1e7;
            border-radius:9px;
            color:#a95472;
            font-size:12px;
            box-shadow:0 2px 8px rgba(126,72,91,0.03);
        }

        .system-badge span {
            color:#d98fa8;
            font-size:10px;
        }

        .welcome-card {
            position:relative;
            overflow:hidden;
            padding:19px 24px;
            margin-bottom:16px;
            border-radius:13px;
            background:linear-gradient(120deg,#d88ea7,#ecb2c5);
            color:white;
            box-shadow:0 7px 20px rgba(217,143,168,0.20);
        }

        .welcome-card::before {
            content:"";
            position:absolute;
            width:180px;
            height:180px;
            right:-65px;
            top:-90px;
            border-radius:50%;
            background:rgba(255,255,255,0.12);
        }

        .welcome-card::after {
            content:"";
            position:absolute;
            width:90px;
            height:90px;
            right:100px;
            bottom:-60px;
            border-radius:50%;
            background:rgba(255,255,255,0.08);
        }

        .welcome-card h2 {
            position:relative;
            z-index:1;
            margin:0 0 5px;
            font-size:20px;
        }

        .welcome-card p {
            position:relative;
            z-index:1;
            margin:0;
            color:#fff5f8;
            font-size:13px;
            line-height:1.5;
        }

        .import-card {
            background:white;
            border:1px solid #eee5e9;
            border-radius:13px;
            padding:24px;
            box-shadow:0 3px 12px rgba(126,72,91,0.04);
        }

        .import-header {
            display:flex;
            align-items:center;
            gap:13px;
            margin-bottom:22px;
        }

        .import-icon {
            width:45px;
            height:45px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:11px;
            background:#fcecf2;
            color:#a95472;
            font-size:22px;
        }

        .import-header h3 {
            margin:0 0 4px;
            color:#40393d;
            font-size:17px;
        }

        .import-header p {
            margin:0;
            color:#81767c;
            font-size:11px;
        }

        .success {
            padding:12px 15px;
            margin-bottom:18px;
            border-radius:9px;
            background:#edf8f1;
            border:1px solid #d0ead9;
            color:#287548;
            font-size:12px;
        }

        .error {
            padding:12px 15px;
            margin-bottom:18px;
            border-radius:9px;
            background:#fdf0f0;
            border:1px solid #f0d0d0;
            color:#b44444;
            font-size:12px;
            line-height:1.6;
        }

        .upload-area {
            padding:38px 25px;
            border:2px dashed #e4b8c8;
            border-radius:13px;
            background:#fffafb;
            text-align:center;
            transition:all 0.2s ease;
        }

        .upload-area:hover {
            border-color:#d98fa8;
            background:#fef5f8;
        }

        .upload-icon {
            width:60px;
            height:60px;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:0 auto 13px;
            border-radius:15px;
            background:#fcecf2;
            color:#a95472;
            font-size:27px;
        }

        .upload-area h4 {
            margin:0 0 7px;
            color:#40393d;
            font-size:15px;
        }

        .upload-area p {
            margin:0 0 17px;
            color:#81767c;
            font-size:11px;
        }

        .choose-file {
            display:inline-block;
            padding:10px 18px;
            border-radius:8px;
            background:#d98fa8;
            color:white;
            font-size:12px;
            font-weight:bold;
            cursor:pointer;
            transition:0.2s;
        }

        .choose-file:hover {
            background:#c97996;
            transform:translateY(-1px);
        }

        #file {
            display:none;
        }

        .file-info {
            display:none;
            align-items:center;
            gap:11px;
            margin-top:13px;
            padding:12px 14px;
            border:1px solid #ead4dc;
            border-radius:9px;
            background:#fdf5f8;
        }

        .file-info.show {
            display:flex;
        }

        .file-icon {
            font-size:18px;
        }

        .file-name {
            color:#a95472;
            font-size:12px;
            font-weight:bold;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        }

        .file-status {
            margin-left:auto;
            color:#29965c;
            font-size:10px;
            white-space:nowrap;
        }

        .format-info {
            margin-top:22px;
            padding:19px;
            background:#fdf8fa;
            border:1px solid #eee1e7;
            border-radius:12px;
        }

        .format-title {
            color:#a95472;
            font-size:16px;
            font-weight:bold;
            margin-bottom:8px;
        }

        .format-description {
            margin:0 0 12px;
            color:#81767c;
            font-size:13px;
            line-height:1.6;
        }

        .format-rules {
            margin:0 0 20px;
            padding-left:20px;
            color:#62595e;
            font-size:13px;
            line-height:1.7;
        }

        .format-rules li {
            margin-bottom:3px;
        }

        .column-title {
            margin-bottom:10px;
            color:#40393d;
            font-size:13px;
            font-weight:bold;
        }

        .column-list {
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:8px;
        }

        .column-item {
            display:flex;
            align-items:flex-start;
            gap:10px;
            padding:10px;
            background:white;
            border:1px solid #eee3e8;
            border-radius:8px;
            transition:0.2s;
        }

        .column-item:hover {
            border-color:#e1b6c6;
            background:#fffafb;
        }

        .column-number {
            width:23px;
            height:23px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-shrink:0;
            border-radius:6px;
            background:#fcecf2;
            color:#a95472;
            font-size:11px;
            font-weight:bold;
        }

        .column-item strong {
            display:block;
            margin-bottom:2px;
            color:#4b4247;
            font-size:12px;
            word-break:break-word;
        }

        .column-item small {
            display:block;
            color:#81767c;
            font-size:11px;
            line-height:1.4;
        }

        .form-footer {
            display:flex;
            justify-content:flex-end;
            align-items:center;
            gap:10px;
            margin-top:22px;
            padding-top:18px;
            border-top:1px solid #eee5e9;
        }

        .back-button {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:10px 16px;
            border:1px solid #e8b9c9;
            border-radius:8px;
            background:#f7dce5;
            color:#a95472;
            text-decoration:none;
            font-size:12px;
            font-weight:bold;
            box-shadow:0 3px 8px rgba(126,72,91,0.06);
            transition:0.2s;
        }

        .back-button:hover {
            background:#efc6d4;
            color:#8f4561;
            border-color:#dca4b8;
            transform:translateY(-1px);
            box-shadow:0 5px 12px rgba(126,72,91,0.10);
        }

        .import-button {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:7px;
            padding:10px 18px;
            border:none;
            border-radius:8px;
            background:#d98fa8;
            color:white;
            cursor:pointer;
            font-size:12px;
            font-weight:bold;
            transition:0.2s;
        }

        .import-button:hover {
            background:#c97996;
            transform:translateY(-1px);
        }

        .import-button:disabled {
            background:#d9c1ca;
            color:#fff;
            cursor:not-allowed;
            transform:none;
        }

        @media (max-width:700px) {

            .sidebar {
                width:250px;
                height:100vh;
                padding:24px 15px;
                transition:transform .25s ease;
            }

            body.sidebar-closed .sidebar {
                width:250px;
                padding:24px 15px;
                transform:translateX(-100%);
            }

            body.sidebar-closed .sidebar-brand h2,
            body.sidebar-closed .sidebar-brand p,
            body.sidebar-closed .menu-title,
            body.sidebar-closed .sidebar-menu a span:not(.menu-icon),
            body.sidebar-closed .user-mini-name,
            body.sidebar-closed .user-mini-role,
            body.sidebar-closed .logout-button span:not(.menu-icon) {
                display:initial;
            }

            body.sidebar-closed .sidebar-brand {
                margin-top:3px;
                margin-bottom:25px;
            }

            body.sidebar-closed .brand-icon {
                width:52px;
                height:52px;
                margin:0 auto 10px;
                font-size:25px;
            }

            body.sidebar-closed .sidebar-menu {
                margin-top:0;
            }

            body.sidebar-closed .sidebar-menu a {
                justify-content:flex-start;
                padding:11px 13px;
            }

            body.sidebar-closed .menu-icon {
                width:22px;
                font-size:16px;
            }

            body.sidebar-closed .user-mini {
                padding:12px 13px;
                display:block;
            }

            body.sidebar-closed .logout-button {
                justify-content:flex-start;
                padding:11px 13px;
            }

            .main-content {
                width:100%;
                margin-left:0;
                padding:75px 16px 30px;
            }

            body.sidebar-closed .main-content {
                width:100%;
                margin-left:0;
            }

            .sidebar-toggle {
                top:18px;
                left:auto;
                right:12px;
                background:rgba(255,255,255,0.20);
                border-color:rgba(255,255,255,0.45);
            }

            body.sidebar-closed .sidebar-toggle {
                left:auto;
                right:12px;
                top:18px;
                background:rgba(255,255,255,0.20);
                border-color:rgba(255,255,255,0.45);
            }

            .top-bar {
                align-items:flex-start;
                flex-direction:column;
                gap:12px;
            }

            .column-list {
                grid-template-columns:1fr;
            }

            .form-footer {
                flex-direction:column-reverse;
                align-items:stretch;
            }

            .back-button,
            .import-button {
                width:100%;
            }
        }

        @media (max-width:430px) {

            .main-content {
                padding:70px 15px 25px;
            }

            .import-card {
                padding:18px;
            }

            .welcome-card {
                padding:18px 20px;
            }

            .welcome-card h2 {
                font-size:18px;
            }

            .upload-area {
                padding:30px 15px;
            }

            .format-info {
                padding:15px;
            }
        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    <aside class="sidebar">


        <!-- TOGGLE -->

        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            aria-label="Buka atau tutup sidebar"
        >
            ☰
        </button>


        <!-- BRAND -->

        <div class="sidebar-brand">

            <div class="brand-icon">
                📊
            </div>

            <h2>
                DATA TAGGING BPS
            </h2>

            <p>
                Sistem Pengelolaan<br>
                Data Tagging
            </p>

        </div>


        <!-- MENU TITLE -->

        <div class="menu-title">
            Menu Utama
        </div>


        <!-- MENU -->

        <nav class="sidebar-menu">

            <a href="{{ route('dashboard') }}">

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="{{ route('tagging.index') }}">

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            <a
                href="{{ route('tagging.import') }}"
                class="active"
            >

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            <a href="{{ route('tagging.map') }}">

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


            @if(auth()->user()->role === 'admin')

                <a href="{{ route('tagging.create') }}">

                    <span class="menu-icon">
                        ➕
                    </span>

                    <span>
                        Tambah Data
                    </span>

                </a>

            @endif


            <a href="{{ route('account.settings') }}">

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Pengaturan Akun
                </span>

            </a>

        </nav>


        <!-- USER + LOGOUT -->

        <div class="sidebar-bottom">


            <div class="user-mini">

                <div class="user-mini-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-mini-role">
                    {{ ucfirst(auth()->user()->role) }}
                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span class="menu-icon">
                        🚪
                    </span>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>


    </aside>


    <main class="main-content">


        <!-- TOP BAR -->

        <div class="top-bar">

            <div class="page-title">

                <h1>
                    Import CSV
                </h1>

                <p>
                    Masukkan data tagging ke dalam sistem
                </p>

            </div>


            <div class="system-badge">

                <span>
                    ●
                </span>

                Sistem Data Tagging

            </div>

        </div>


        <!-- WELCOME -->

        <div class="welcome-card">

            <h2>
                Import Data Tagging
            </h2>

            <p>
                Unggah file CSV untuk menambahkan data tagging Kota Palembang ke dalam sistem.
            </p>

        </div>


        <!-- IMPORT CARD -->

        <div class="import-card">


            <div class="import-header">

                <div class="import-icon">
                    📥
                </div>

                <div>

                    <h3>
                        Unggah File CSV
                    </h3>

                    <p>
                        Pilih file CSV yang ingin dimasukkan ke dalam sistem.
                    </p>

                </div>

            </div>


            @if (session('success'))

                <div class="success">

                    ✓ &nbsp;

                    {{ session('success') }}

                </div>

            @endif


            @if ($errors->any())

                <div class="error">

                    @foreach ($errors->all() as $error)

                        <div>
                            ! &nbsp; {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form
                action="{{ route('tagging.import.process') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <div class="upload-area">


                    <div class="upload-icon">
                        📄
                    </div>


                    <h4>
                        Pilih File CSV
                    </h4>


                    <p>
                        Pastikan file yang dipilih memiliki format data tagging yang sesuai.
                    </p>


                    <label
                        for="file"
                        class="choose-file"
                    >
                        📁 Pilih File
                    </label>


                </div>


                <input
                    type="file"
                    name="file"
                    id="file"
                    accept=".csv,.txt"
                    required
                >


                <div
                    class="file-info"
                    id="fileInfo"
                >

                    <div class="file-icon">
                        📄
                    </div>

                    <div
                        class="file-name"
                        id="fileName"
                    >
                    </div>

                    <div class="file-status">
                        ✓ Siap diimport
                    </div>

                </div>


                <div class="format-info">


                    <div class="format-title">
                        📋 Ketentuan Format File CSV
                    </div>


                    <p class="format-description">
                        Pastikan file CSV yang akan diimpor memenuhi
                        ketentuan berikut:
                    </p>


                    <ul class="format-rules">

                        <li>
                            File harus menggunakan format
                            <strong>CSV (.csv)</strong>.
                        </li>

                        <li>
                            File harus memiliki
                            <strong>10 kolom</strong>
                            sesuai format data tagging.
                        </li>

                        <li>
                            Nama header kolom harus sesuai dengan
                            format yang telah ditentukan dan tidak boleh diubah.
                        </li>

                        <li>
                            Kolom yang tidak memiliki data dapat dibiarkan kosong.
                        </li>

                        <li>
                            Data koordinat menggunakan nilai
                            <strong>latitude</strong>
                            dan
                            <strong>longitude</strong>.
                        </li>

                        <li>
                            Pastikan data yang diimpor sesuai dengan format
                            dan struktur data tagging BPS.
                        </li>

                    </ul>


                    <div class="column-title">
                        Kolom yang wajib tersedia:
                    </div>


                    <div class="column-list">


                        <div class="column-item">

                            <span class="column-number">
                                1
                            </span>

                            <div>

                                <strong>
                                    assignment_id
                                </strong>

                                <small>
                                    ID unik data tagging.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                2
                            </span>

                            <div>

                                <strong>
                                    assignment_status_alias
                                </strong>

                                <small>
                                    Status data tagging, seperti Approved,
                                    Submitted, atau Rejected.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                3
                            </span>

                            <div>

                                <strong>
                                    level_6_full_code
                                </strong>

                                <small>
                                    Kode wilayah/SLS pada data tagging.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                4
                            </span>

                            <div>

                                <strong>
                                    nama_usaha_bang
                                </strong>

                                <small>
                                    Nama usaha atau bangunan.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                5
                            </span>

                            <div>

                                <strong>
                                    nama_kk
                                </strong>

                                <small>
                                    Nama kepala keluarga.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                6
                            </span>

                            <div>

                                <strong>
                                    ada_keluarga_label
                                </strong>

                                <small>
                                    Keterangan mengenai keberadaan keluarga.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                7
                            </span>

                            <div>

                                <strong>
                                    ada_bang_usaha_label
                                </strong>

                                <small>
                                    Keterangan mengenai keberadaan bangunan/usaha.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                8
                            </span>

                            <div>

                                <strong>
                                    geotag_accuracy
                                </strong>

                                <small>
                                    Nilai tingkat akurasi koordinat.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                9
                            </span>

                            <div>

                                <strong>
                                    geotag_latitude
                                </strong>

                                <small>
                                    Koordinat lintang lokasi.
                                </small>

                            </div>

                        </div>


                        <div class="column-item">

                            <span class="column-number">
                                10
                            </span>

                            <div>

                                <strong>
                                    geotag_longitude
                                </strong>

                                <small>
                                    Koordinat bujur lokasi.
                                </small>

                            </div>

                        </div>


                    </div>


                </div>


                <div class="form-footer">


                    <a
                        href="{{ route('tagging.index') }}"
                        class="back-button"
                    >
                        ← Kembali
                    </a>


                    <button
                        type="submit"
                        class="import-button"
                        id="importButton"
                        disabled
                    >
                        📥 Import Data
                    </button>


                </div>


            </form>


        </div>


    </main>


</div>


<script>


    const sidebarToggle =
        document.getElementById('sidebarToggle');


    sidebarToggle.addEventListener(
        'click',
        function () {

            document.body.classList.toggle(
                'sidebar-closed'
            );

        }
    );


    const fileInput =
        document.getElementById('file');


    const fileInfo =
        document.getElementById('fileInfo');


    const fileName =
        document.getElementById('fileName');


    const importButton =
        document.getElementById('importButton');


    fileInput.addEventListener(
        'change',
        function () {

            if (this.files.length > 0) {

                const file =
                    this.files[0];

                fileName.textContent =
                    file.name;

                fileInfo.classList.add('show');

                importButton.disabled =
                    false;

            } else {

                fileName.textContent =
                    '';

                fileInfo.classList.remove('show');

                importButton.disabled =
                    true;

            }

        }
    );


</script>


</body>

</html>