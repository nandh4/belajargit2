<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Data Tagging - Data Tagging BPS</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #fbf8fa;

            color: #40393d;

        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

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

            background:
                linear-gradient(
                    180deg,
                    #efb6c8 0%,
                    #e5a5bb 55%,
                    #d98fa8 100%
                );

            color: white;

            box-shadow:
                4px 0 18px
                rgba(126, 72, 91, 0.10);

            z-index: 1000;

            overflow: hidden;

            transition:
                width 0.25s ease,
                padding 0.25s ease;

        }


        /* =====================================================
           BRAND
        ===================================================== */

        .sidebar-brand {

            text-align: center;

            margin-bottom: 25px;

            padding-top: 3px;

            flex-shrink: 0;

        }


        .brand-icon {

            width: 52px;

            height: 52px;

            margin: 0 auto 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                rgba(255,255,255,0.22);

            border-radius: 14px;

            font-size: 25px;

            box-shadow:
                0 4px 12px
                rgba(126,72,91,0.08);

            transition: 0.25s;

        }


        .sidebar-brand h2 {

            margin: 0;

            font-size: 16px;

            font-weight: 700;

            letter-spacing: 0.5px;

            white-space: nowrap;

        }


        .sidebar-brand p {

            margin:
                5px 0 0;

            font-size: 11px;

            line-height: 1.5;

            opacity: 0.9;

        }


        /* =====================================================
           TOGGLE BUTTON
        ===================================================== */

        .sidebar-toggle {

            position: fixed;

            top: 18px;

            left: 202px;

            width: 36px;

            height: 36px;

            display: flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid
                rgba(255,255,255,0.45);

            border-radius: 9px;

            background:
                rgba(255,255,255,0.22);

            color: white;

            font-size: 18px;

            cursor: pointer;

            box-shadow:
                0 3px 10px
                rgba(126,72,91,0.15);

            z-index: 2000;

            transition:
                left 0.25s ease,
                top 0.25s ease,
                background 0.2s,
                color 0.2s;

        }


        .sidebar-toggle:hover {

            background:
                rgba(255,255,255,0.35);

        }


        /* =====================================================
           SIDEBAR CLOSED
        ===================================================== */

        body.sidebar-closed .sidebar {

            width: 72px;

            padding:
                24px 10px;

        }


        /* =====================================================
           TOGGLE SAAT SIDEBAR CLOSED
           
           Tombol berada PALING ATAS,
           tidak menutupi logo.
        ===================================================== */

        body.sidebar-closed .sidebar-toggle {

            left: 18px;

            top: 18px;

            background: #d98fa8;

            border-color: #d98fa8;

            color: white;

        }


        /* =====================================================
           BRAND SAAT SIDEBAR CLOSED
           
           Logo diturunkan supaya berada
           DI BAWAH tombol.
        ===================================================== */

        body.sidebar-closed .sidebar-brand {

            margin-top: 60px;

            margin-bottom: 25px;

        }


        body.sidebar-closed .brand-icon {

            width: 45px;

            height: 45px;

            margin: 0 auto;

            font-size: 21px;

        }


        /* Sembunyikan tulisan */

        body.sidebar-closed .sidebar-brand h2,
        body.sidebar-closed .sidebar-brand p {

            display: none;

        }


        /* =====================================================
           MENU TITLE
        ===================================================== */

        .menu-title {

            margin-bottom: 10px;

            padding-left: 8px;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            opacity: 0.75;

            flex-shrink: 0;

        }


        body.sidebar-closed .menu-title {

            display: none;

        }


        /* =====================================================
           MENU
        ===================================================== */

        .sidebar-menu {

            display: flex;

            flex-direction: column;

            gap: 5px;

            flex-shrink: 0;

        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                11px 13px;

            border-radius: 9px;

            color: white;

            text-decoration: none;

            font-size: 14px;

            white-space: nowrap;

            transition: 0.2s;

        }


        .sidebar-menu a:hover {

            background:
                rgba(255,255,255,0.16);

        }


        .sidebar-menu a.active {

            background:
                rgba(255,255,255,0.25);

            box-shadow:
                0 4px 10px
                rgba(126,72,91,0.08);

        }


        .menu-icon {

            width: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 16px;

            flex-shrink: 0;

        }


        /* =====================================================
           MENU SAAT SIDEBAR CLOSED
        ===================================================== */

        body.sidebar-closed .sidebar-menu {

            margin-top: 0;

        }


        body.sidebar-closed .sidebar-menu a {

            justify-content: center;

            padding:
                12px 5px;

        }


        body.sidebar-closed .sidebar-menu a span:not(.menu-icon) {

            display: none;

        }


        body.sidebar-closed .menu-icon {

            width: 28px;

            font-size: 18px;

        }


        /* =====================================================
           SIDEBAR BOTTOM
        ===================================================== */

        .sidebar-bottom {

            margin-top: auto;

            flex-shrink: 0;

        }


        /* =====================================================
           USER MINI
        ===================================================== */

        .user-mini {

            padding:
                12px 13px;

            margin-bottom: 8px;

            background:
                rgba(255,255,255,0.12);

            border-radius: 9px;

            transition: 0.25s;

        }


        .user-mini-name {

            font-size: 13px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .user-mini-role {

            margin-top: 3px;

            font-size: 11px;

            opacity: 0.8;

        }


        body.sidebar-closed .user-mini {

            padding:
                10px 5px;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        body.sidebar-closed .user-mini-name,
        body.sidebar-closed .user-mini-role {

            display: none;

        }


        /* =====================================================
           LOGOUT
        ===================================================== */

        .logout-button {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;

            padding:
                11px 13px;

            border: none;

            border-radius: 9px;

            background:
                rgba(255,255,255,0.12);

            color: white;

            cursor: pointer;

            font-size: 14px;

            text-align: left;

            white-space: nowrap;

            transition: 0.2s;

        }


        .logout-button:hover {

            background: #c96f89;

        }


        body.sidebar-closed .logout-button {

            justify-content: center;

            padding:
                12px 5px;

        }


        body.sidebar-closed .logout-button span:not(.menu-icon) {

            display: none;

        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .main-content {

            width:
                calc(100% - 250px);

            margin-left: 250px;

            padding:
                28px 34px 40px;

            min-height: 100vh;

            transition:
                width 0.25s ease,
                margin-left 0.25s ease;

        }


        body.sidebar-closed .main-content {

            width:
                calc(100% - 72px);

            margin-left: 72px;

        }


        /* =====================================================
           HEADER
        ===================================================== */

        .top-bar {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 20px;

        }


        .page-title h1 {

            margin:
                0 0 5px;

            font-size: 25px;

            color: #383236;

        }


        .page-title p {

            margin: 0;

            color: #81767c;

            font-size: 13px;

        }


        .header-right {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        /* =====================================================
           USER INFO
        ===================================================== */

        .user-info {

            display: flex;

            align-items: center;

            gap: 10px;

            padding:
                8px 12px;

            min-width: 195px;

            background: white;

            border:
                1px solid #eee1e7;

            border-radius: 12px;

            box-shadow:
                0 3px 12px
                rgba(90,55,68,0.04);

        }


        .user-avatar {

            width: 39px;

            height: 39px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #fcecf2;

            color: #d586a0;

            font-size: 18px;

        }


        .user-details {

            min-width: 0;

        }


        .user-name {

            margin-bottom: 3px;

            font-size: 12px;

            font-weight: bold;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .user-username {

            margin-bottom: 4px;

            color: #91858b;

            font-size: 9px;

        }


        .user-role {

            display: inline-block;

            padding:
                3px 8px;

            border-radius: 20px;

            background: #fcecf2;

            color: #c8738e;

            font-size: 8px;

            font-weight: bold;

            text-transform: uppercase;

        }


        /* =====================================================
           PAGE CARD
        ===================================================== */

        .page-card {

            background:
                linear-gradient(
                    120deg,
                    #d88ea7,
                    #ecb2c5
                );

            color: white;

            padding:
                23px 27px;

            border-radius: 17px;

            margin-bottom: 22px;

            box-shadow:
                0 8px 22px
                rgba(190,105,132,0.15);

            position: relative;

            overflow: hidden;

        }


        .page-card::before {

            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            right: -80px;

            top: -120px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.10);

        }


        .page-card-content {

            position: relative;

            z-index: 2;

        }


        .page-card-label {

            display: inline-block;

            margin-bottom: 6px;

            color: #ffeef4;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 0.8px;

            text-transform: uppercase;

        }


        .page-card h2 {

            margin:
                0 0 5px;

            font-size: 21px;

        }


        .page-card p {

            margin: 0;

            color: #fff2f6;

            font-size: 12px;

            line-height: 1.5;

        }


        /* =====================================================
           SECTION
        ===================================================== */

        .section {

            margin-bottom: 25px;

        }


        .section-header {

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            padding-bottom: 11px;

            margin-bottom: 15px;

            border-bottom:
                2px solid #eadde3;

        }


        .section-title-wrap {

            display: flex;

            align-items: flex-start;

            gap: 10px;

        }


        .section-accent {

            width: 5px;

            min-width: 5px;

            height: 22px;

            margin-top: 1px;

            border-radius: 5px;

            background: #d98fa8;

        }


        .section-title {

            margin: 0;

            color: #4a4146;

            font-size: 15px;

        }


        .section-subtitle {

            margin:
                4px 0 0;

            color: #9a8d93;

            font-size: 10px;

        }


        .section-note {

            color: #a09399;

            font-size: 9px;

        }


        /* =====================================================
           FILTER
        ===================================================== */

        .filter-card {

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 14px;

            padding: 18px;

            box-shadow:
                0 3px 12px
                rgba(80,50,62,0.03);

            margin-bottom: 15px;

        }


        .filter-grid {

            display: grid;

            grid-template-columns:
                1fr 1fr 1fr auto;

            gap: 10px;

            align-items: end;

        }


        .form-group {

            display: flex;

            flex-direction: column;

            gap: 6px;

        }


        .form-group label {

            color: #665b60;

            font-size: 10px;

            font-weight: bold;

        }


        .form-control {

            width: 100%;

            height: 38px;

            padding:
                0 11px;

            border:
                1px solid #eadfe4;

            border-radius: 9px;

            background: #fffafb;

            color: #51484d;

            font-size: 11px;

            outline: none;

        }


        .form-control:focus {

            border-color: #d99caf;

            box-shadow:
                0 0 0 3px
                rgba(217,143,168,0.10);

        }


        .filter-button {

            height: 38px;

            padding:
                0 16px;

            border: none;

            border-radius: 9px;

            background: #d98fa8;

            color: white;

            font-size: 11px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;

        }


        .filter-button:hover {

            background: #c97894;

        }


        .reset-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            height: 38px;

            padding:
                0 14px;

            border:
                1px solid #e5c1cd;

            border-radius: 9px;

            background: #fcecf2;

            color: #b8637d;

            text-decoration: none;

            font-size: 11px;

            font-weight: bold;

        }


        /* =====================================================
           TABLE PANEL
        ===================================================== */

        .table-panel {

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 14px;

            box-shadow:
                0 3px 12px
                rgba(80,50,62,0.03);

            overflow: hidden;

        }


        .table-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding:
                17px 19px;

            border-bottom:
                1px solid #f0e8eb;

        }


        .table-top-left h3 {

            margin:
                0 0 3px;

            color: #443c40;

            font-size: 14px;

        }


        .table-top-left span {

            color: #9b9095;

            font-size: 9px;

        }


        .total-badge {

            padding:
                6px 10px;

            border-radius: 20px;

            background: #fcecf2;

            color: #c8738e;

            font-size: 9px;

            font-weight: bold;

        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 1050px;

        }


        thead {

            background: #fdf6f9;

        }


        th {

            padding:
                12px 13px;

            color: #756970;

            font-size: 9px;

            font-weight: bold;

            text-align: left;

            white-space: nowrap;

            border-bottom:
                1px solid #eee5e9;

        }


        td {

            padding:
                12px 13px;

            color: #62575d;

            font-size: 10px;

            border-bottom:
                1px solid #f3edef;

            vertical-align: middle;

        }


        tbody tr {

            transition: 0.15s;

        }


        tbody tr:hover {

            background: #fff9fb;

        }


        tbody tr:last-child td {

            border-bottom: none;

        }


        .data-number {

            color: #a09499;

            font-size: 9px;

        }


        .business-name {

            color: #51474c;

            font-weight: bold;

        }


        .code-text {

            color: #887b82;

            font-size: 9px;

        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status-badge {

            display: inline-block;

            padding:
                5px 8px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: bold;

            white-space: nowrap;

        }


        .status-approved {

            background: #e8f5ed;

            color: #57916d;

        }


        .status-submitted {

            background: #fff7df;

            color: #a68531;

        }


        .status-rejected {

            background: #fbe8e8;

            color: #b36c6c;

        }


        .status-default {

            background: #f1edef;

            color: #81767c;

        }


        /* =====================================================
           LOCATION
        ===================================================== */

        .location-yes {

            display: inline-flex;

            align-items: center;

            gap: 4px;

            color: #5b9a75;

            font-size: 9px;

            font-weight: bold;

        }


        .location-no {

            display: inline-flex;

            align-items: center;

            gap: 4px;

            color: #b18b3b;

            font-size: 9px;

            font-weight: bold;

        }


        /* =====================================================
           EMPTY DATA
        ===================================================== */

        .empty-data {

            padding:
                45px 20px;

            text-align: center;

        }


        .empty-icon {

            width: 50px;

            height: 50px;

            margin:
                0 auto 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 14px;

            background: #fcecf2;

            font-size: 22px;

        }


        .empty-data h3 {

            margin:
                0 0 5px;

            color: #5b5056;

            font-size: 13px;

        }


        .empty-data p {

            margin: 0;

            color: #a09499;

            font-size: 10px;

        }


        /* =====================================================
           PAGINATION
        ===================================================== */

        .pagination-area {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding:
                14px 18px;

            border-top:
                1px solid #f0e8eb;

        }


        .pagination-info {

            color: #9b9095;

            font-size: 9px;

        }


        .pagination {

            display: flex;

            align-items: center;

            gap: 4px;

        }


        .pagination a,
        .pagination span {

            min-width: 28px;

            height: 28px;

            padding:
                0 8px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid #eadfe4;

            border-radius: 7px;

            background: white;

            color: #756970;

            text-decoration: none;

            font-size: 9px;

        }


        .pagination .active {

            background: #d98fa8;

            border-color: #d98fa8;

            color: white;

        }


        .pagination .disabled {

            opacity: 0.45;

            cursor: not-allowed;

        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1150px) {

            .main-content {

                padding: 25px;

            }


            .filter-grid {

                grid-template-columns:
                    1fr 1fr;

            }

        }


        @media (max-width: 950px) {

            .top-bar {

                align-items: flex-start;

            }


            .filter-grid {

                grid-template-columns:
                    1fr 1fr;

            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 700px) {

            .sidebar {

                width: 250px;

                height: 100vh;

                padding:
                    24px 15px;

                transition:
                    transform 0.25s ease;

            }


            body.sidebar-closed .sidebar {

                width: 250px;

                padding:
                    24px 15px;

                transform:
                    translateX(-100%);

            }


            /* Saat mobile tertutup,
               tulisan tetap normal ketika sidebar dibuka */

            body.sidebar-closed .sidebar-brand h2,
            body.sidebar-closed .sidebar-brand p,
            body.sidebar-closed .menu-title,
            body.sidebar-closed .sidebar-menu a span:not(.menu-icon),
            body.sidebar-closed .user-mini-name,
            body.sidebar-closed .user-mini-role,
            body.sidebar-closed .logout-button span:not(.menu-icon) {

                display: initial;

            }


            body.sidebar-closed .sidebar-brand {

                margin-top: 3px;

                margin-bottom: 25px;

            }


            body.sidebar-closed .brand-icon {

                width: 52px;

                height: 52px;

                margin:
                    0 auto 10px;

                font-size: 25px;

            }


            body.sidebar-closed .sidebar-menu {

                margin-top: 0;

            }


            body.sidebar-closed .sidebar-menu a {

                justify-content: flex-start;

                padding:
                    11px 13px;

            }


            body.sidebar-closed .menu-icon {

                width: 22px;

                font-size: 16px;

            }


            body.sidebar-closed .user-mini {

                padding:
                    12px 13px;

                display: block;

            }


            body.sidebar-closed .logout-button {

                justify-content: flex-start;

                padding:
                    11px 13px;

            }


            .main-content {

                width: 100%;

                margin-left: 0;

                padding:
                    75px 16px 30px;

            }


            body.sidebar-closed .main-content {

                width: 100%;

                margin-left: 0;

            }


            .sidebar-toggle {

                top: 18px;

                left: 18px;

                background: #d98fa8;

                border-color: #d98fa8;

            }


            body.sidebar-closed .sidebar-toggle {

                left: 18px;

                top: 18px;

                background: #d98fa8;

                border-color: #d98fa8;

            }


            .top-bar {

                flex-direction: column;

            }


            .header-right {

                width: 100%;

            }


            .user-info {

                width: 100%;

            }


            .filter-grid {

                grid-template-columns: 1fr;

            }


            .table-top {

                align-items: flex-start;

                flex-direction: column;

            }


            .pagination-area {

                align-items: flex-start;

                flex-direction: column;

            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


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


            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}">

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- DATA TAGGING -->

            <a
                href="{{ route('tagging.index') }}"
                class="active"
            >

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            <!-- IMPORT CSV -->

            <a href="{{ route('tagging.import') }}">

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            <!-- LIHAT PETA -->

            <a href="{{ route('tagging.map') }}">

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


            <!-- TAMBAH DATA -->

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


            <!-- PENGATURAN AKUN -->

            <a href="{{ route('account.settings') }}">

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Pengaturan Akun
                </span>

            </a>


        </nav>


        <!-- =================================================
             USER + LOGOUT
        ================================================== -->

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


    <!-- =====================================================
         TOGGLE BUTTON
    ===================================================== -->

    <button
        type="button"
        class="sidebar-toggle"
        id="sidebarToggle"
        title="Buka/Tutup Menu"
        aria-label="Buka atau tutup sidebar"
    >
        ☰
    </button>


    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <main class="main-content">


        <!-- HEADER -->

        <div class="top-bar">


            <div class="page-title">

                <h1>
                    Data Tagging
                </h1>


                <p>
                    Pengelolaan dan pemantauan data tagging
                </p>

            </div>


            <div class="header-right">


                <div class="user-info">


                    <div class="user-avatar">
                        👤
                    </div>


                    <div class="user-details">


                        <div class="user-name">

                            {{ auth()->user()->name }}

                        </div>


                        <div class="user-username">

                            {{ '@' . auth()->user()->username }}

                        </div>


                        <span class="user-role">

                            {{ auth()->user()->role }}

                        </span>


                    </div>


                </div>


            </div>


        </div>


        <!-- =================================================
             PAGE CARD
        ================================================== -->

        <section class="page-card">


            <div class="page-card-content">


                <span class="page-card-label">
                    Sistem Pengelolaan Data
                </span>


                <h2>
                    Data Tagging Kota Palembang
                </h2>


                <p>
                    Kelola, cari, dan pantau data tagging
                    berdasarkan informasi wilayah, status,
                    dan lokasi.
                </p>


            </div>


        </section>


        <!-- =================================================
             FILTER DATA
        ================================================== -->

        <section class="section">


            <div class="section-header">


                <div class="section-title-wrap">


                    <div class="section-accent"></div>


                    <div>

                        <h2 class="section-title">
                            Filter Data
                        </h2>


                        <p class="section-subtitle">
                            Gunakan filter untuk menemukan data
                            yang diperlukan
                        </p>

                    </div>


                </div>


            </div>


            <form
                action="{{ route('tagging.index') }}"
                method="GET"
                class="filter-card"
            >


                <div class="filter-grid">


                    <!-- SEARCH -->

                    <div class="form-group">

                        <label>
                            Pencarian
                        </label>


                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="Nama usaha / Nama KK / kode..."
                        >

                    </div>


                    <!-- STATUS -->

                    <div class="form-group">

                        <label>
                            Status
                        </label>


                        <select
                            name="status"
                            class="form-control"
                        >

                            <option value="">
                                Semua Status
                            </option>


                            <option
                                value="APPROVED BY Pengawas"
                                {{ request('status') == 'APPROVED BY Pengawas' ? 'selected' : '' }}
                            >
                                Approved
                            </option>


                            <option
                                value="SUBMITTED BY Pencacah"
                                {{ request('status') == 'SUBMITTED BY Pencacah' ? 'selected' : '' }}
                            >
                                Submitted
                            </option>


                            <option
                                value="REJECTED BY Pengawas"
                                {{ request('status') == 'REJECTED BY Pengawas' ? 'selected' : '' }}
                            >
                                Rejected
                            </option>


                        </select>

                    </div>


                    <!-- LOKASI -->

                    <div class="form-group">

                        <label>
                            Lokasi
                        </label>


                        <select
                            name="location"
                            class="form-control"
                        >

                            <option value="">
                                Semua Data
                            </option>


                            <option
                                value="ada"
                                {{ request('location') == 'ada' ? 'selected' : '' }}
                            >
                                Dengan Koordinat
                            </option>


                            <option
                                value="tidak"
                                {{ request('location') == 'tidak' ? 'selected' : '' }}
                            >
                                Tanpa Koordinat
                            </option>


                        </select>

                    </div>


                    <!-- BUTTON -->

                    <div
                        style="
                            display:flex;
                            gap:6px;
                        "
                    >

                        <button
                            type="submit"
                            class="filter-button"
                        >
                            🔍 Cari
                        </button>


                        <a
                            href="{{ route('tagging.index') }}"
                            class="reset-button"
                        >
                            Reset
                        </a>


                    </div>


                </div>


            </form>


        </section>


        <!-- =================================================
             DAFTAR DATA
        ================================================== -->

        <section class="section">


            <div class="section-header">


                <div class="section-title-wrap">


                    <div class="section-accent"></div>


                    <div>

                        <h2 class="section-title">
                            Daftar Data Tagging
                        </h2>


                        <p class="section-subtitle">
                            Data tagging yang tersimpan dalam sistem
                        </p>

                    </div>


                </div>


                <span class="section-note">

                    {{ $taggings->total() }}
                    data

                </span>


            </div>


            <div class="table-panel">


                <!-- TABLE HEADER -->

                <div class="table-top">


                    <div class="table-top-left">


                        <h3>
                            Data Tagging
                        </h3>


                        <span>
                            Menampilkan data sesuai hasil pencarian
                        </span>


                    </div>


                    <div class="total-badge">

                        Total
                        {{ number_format($taggings->total()) }}
                        Data

                    </div>


                </div>


                <!-- TABLE -->

                <div class="table-wrapper">


                    <table>


                        <thead>

                            <tr>

                                <th>
                                    No.
                                </th>


                                <th>
                                    Kode
                                </th>


                                <th>
                                    Nama Usaha
                                </th>


                                <th>
                                    Nama KK
                                </th>


                                <th>
                                    Status
                                </th>


                                <th>
                                    Keluarga
                                </th>


                                <th>
                                    Bangunan Usaha
                                </th>


                                <th>
                                    Akurasi
                                </th>


                                <th>
                                    Lokasi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse($taggings as $index => $data)


                                <tr>


                                    <!-- NO -->

                                    <td>

                                        <span class="data-number">

                                            {{
                                                $taggings->firstItem()
                                                + $index
                                            }}

                                        </span>

                                    </td>


                                    <!-- KODE -->

                                    <td>

                                        <span class="code-text">

                                            {{
                                                $data->level_6_full_code
                                                ?? '-'
                                            }}

                                        </span>

                                    </td>


                                    <!-- NAMA USAHA -->

                                    <td>

                                        <span class="business-name">

                                            {{
                                                $data->nama_usaha_bang
                                                ?? '-'
                                            }}

                                        </span>

                                    </td>


                                    <!-- NAMA KK -->

                                    <td>

                                        {{
                                            $data->nama_kk
                                            ?? '-'
                                        }}

                                    </td>


                                    <!-- STATUS -->

                                    <td>


                                        @if(
                                            $data->assignment_status_alias
                                            === 'APPROVED BY Pengawas'
                                        )

                                            <span
                                                class="
                                                    status-badge
                                                    status-approved
                                                "
                                            >
                                                Approved
                                            </span>


                                        @elseif(
                                            $data->assignment_status_alias
                                            === 'SUBMITTED BY Pencacah'
                                        )

                                            <span
                                                class="
                                                    status-badge
                                                    status-submitted
                                                "
                                            >
                                                Submitted
                                            </span>


                                        @elseif(
                                            $data->assignment_status_alias
                                            === 'REJECTED BY Pengawas'
                                        )

                                            <span
                                                class="
                                                    status-badge
                                                    status-rejected
                                                "
                                            >
                                                Rejected
                                            </span>


                                        @else

                                            <span
                                                class="
                                                    status-badge
                                                    status-default
                                                "
                                            >

                                                {{
                                                    $data->assignment_status_alias
                                                    ?? '-'
                                                }}

                                            </span>

                                        @endif


                                    </td>


                                    <!-- KELUARGA -->

                                    <td>

                                        {{
                                            $data->ada_keluarga_label
                                            ?? '-'
                                        }}

                                    </td>


                                    <!-- BANGUNAN USAHA -->

                                    <td>

                                        {{
                                            $data->ada_bang_usaha_label
                                            ?? '-'
                                        }}

                                    </td>


                                    <!-- AKURASI -->

                                    <td>

                                        {{
                                            $data->geotag_accuracy
                                            ?? '-'
                                        }}

                                    </td>


                                    <!-- LOKASI -->

                                    <td>


                                        @if(
                                            !empty($data->geotag_latitude)
                                            &&
                                            !empty($data->geotag_longitude)
                                        )

                                            <span
                                                class="location-yes"
                                            >
                                                📍 Ada
                                            </span>

                                        @else

                                            <span
                                                class="location-no"
                                            >
                                                ⚠ Tidak ada
                                            </span>

                                        @endif


                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td
                                        colspan="9"
                                        style="padding:0;"
                                    >


                                        <div
                                            class="empty-data"
                                        >


                                            <div
                                                class="empty-icon"
                                            >
                                                📋
                                            </div>


                                            <h3>
                                                Data tidak ditemukan
                                            </h3>


                                            <p>
                                                Belum ada data yang
                                                sesuai dengan pencarian
                                                atau filter.
                                            </p>


                                        </div>


                                    </td>

                                </tr>


                            @endforelse


                        </tbody>


                    </table>


                </div>


                <!-- =================================================
                     PAGINATION
                ================================================== -->

                @if($taggings->hasPages())


                    <div class="pagination-area">


                        <div class="pagination-info">

                            Menampilkan

                            {{
                                $taggings->firstItem()
                            }}

                            sampai

                            {{
                                $taggings->lastItem()
                            }}

                            dari

                            {{
                                $taggings->total()
                            }}

                            data

                        </div>


                        <div class="pagination">


                            @if($taggings->onFirstPage())

                                <span class="disabled">
                                    ‹
                                </span>

                            @else

                                <a
                                    href="{{
                                        $taggings->previousPageUrl()
                                    }}"
                                >
                                    ‹
                                </a>

                            @endif


                            @foreach(
                                $taggings->getUrlRange(
                                    max(
                                        1,
                                        $taggings->currentPage() - 2
                                    ),
                                    min(
                                        $taggings->lastPage(),
                                        $taggings->currentPage() + 2
                                    )
                                )
                                as $page => $url
                            )


                                @if(
                                    $page ==
                                    $taggings->currentPage()
                                )

                                    <span class="active">
                                        {{ $page }}
                                    </span>

                                @else

                                    <a href="{{ $url }}">
                                        {{ $page }}
                                    </a>

                                @endif


                            @endforeach


                            @if($taggings->hasMorePages())

                                <a
                                    href="{{
                                        $taggings->nextPageUrl()
                                    }}"
                                >
                                    ›
                                </a>

                            @else

                                <span class="disabled">
                                    ›
                                </span>

                            @endif


                        </div>


                    </div>

                @endif


            </div>


        </section>


    </main>


    <!-- =====================================================
         JAVASCRIPT
    ===================================================== -->

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

    </script>


</body>

</html>