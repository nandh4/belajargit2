<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Dashboard - Data Tagging BPS
    </title>


    <!-- LEAFLET -->

    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >


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

            background:
                #fbf8fa;

            color:
                #40393d;

        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            width: 250px;

            min-height: 100vh;

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

        }


        .sidebar-brand {

            padding:
                5px 12px 25px;

            margin-bottom: 22px;

            border-bottom:
                1px solid
                rgba(255,255,255,0.30);

        }


        .brand-icon {

            width: 46px;
            height: 46px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 12px;

            border-radius: 12px;

            background:
                rgba(255,255,255,0.20);

            font-size: 23px;

        }


        .sidebar-brand h2 {

            margin:
                0 0 5px;

            font-size: 17px;

            letter-spacing:
                0.4px;

        }


        .sidebar-brand p {

            margin: 0;

            color:
                #fff3f7;

            font-size: 11px;

            line-height: 1.5;

        }


        .menu-title {

            padding:
                0 12px;

            margin-bottom: 9px;

            color:
                #fff0f5;

            font-size: 10px;

            font-weight: bold;

            letter-spacing:
                1px;

            text-transform:
                uppercase;

        }


        .sidebar-menu {

            display: flex;

            flex-direction: column;

            gap: 5px;

        }


        .sidebar-menu a {

            display: flex;

            align-items: center;

            gap: 13px;

            padding:
                12px 13px;

            color:
                #fff8fa;

            text-decoration: none;

            border-radius: 9px;

            font-size: 14px;

            transition:
                all 0.2s ease;

        }


        .sidebar-menu a:hover {

            background:
                rgba(255,255,255,0.16);

            color: white;

            transform:
                translateX(2px);

        }


        .sidebar-menu a.active {

            background: white;

            color:
                #d586a0;

            font-weight: bold;

            box-shadow:
                0 4px 12px
                rgba(126,66,88,0.10);

        }


        .menu-icon {

            width: 23px;

            text-align: center;

            font-size: 17px;

            flex-shrink: 0;

        }


        .sidebar-bottom {

            margin-top: auto;

        }


        .user-mini {

            padding: 13px;

            margin-bottom: 10px;

            border-radius: 10px;

            background:
                rgba(255,255,255,0.15);

        }


        .user-mini-name {

            font-size: 13px;

            font-weight: bold;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .user-mini-role {

            margin-top: 4px;

            color:
                #fff1f5;

            font-size: 11px;

        }


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

            transition: 0.2s;

        }


        .logout-button:hover {

            background:
                #c96f89;

        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main-content {

            width:
                calc(100% - 250px);

            margin-left: 250px;

            padding:
                28px 34px 40px;

            min-height: 100vh;

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

            color:
                #383236;

        }


        .page-title p {

            margin: 0;

            color:
                #81767c;

            font-size: 13px;

        }


        .header-right {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .update-info {

            padding:
                9px 12px;

            border:
                1px solid #eee1e7;

            border-radius: 10px;

            background: white;

            text-align: right;

        }


        .update-label {

            display: block;

            margin-bottom: 3px;

            color:
                #a09499;

            font-size: 9px;

        }


        .update-date {

            color:
                #6d6268;

            font-size: 10px;

            font-weight: bold;

        }


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

            background:
                #fcecf2;

            color:
                #d586a0;

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

            color:
                #91858b;

            font-size: 9px;

        }


        .user-role {

            display: inline-block;

            padding:
                3px 8px;

            border-radius: 20px;

            background:
                #fcecf2;

            color:
                #c8738e;

            font-size: 8px;

            font-weight: bold;

            text-transform: uppercase;

        }


        /* =====================================================
           WELCOME
        ===================================================== */

        .welcome-card {

            position: relative;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            padding:
                25px 29px;

            margin-bottom: 29px;

            border-radius: 17px;

            background:
                linear-gradient(
                    120deg,
                    #d88ea7,
                    #ecb2c5
                );

            color: white;

            box-shadow:
                0 8px 22px
                rgba(190,105,132,0.15);

        }


        .welcome-card::before {

            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            right: -80px;
            top: -130px;

            border-radius: 50%;

            background:
                rgba(255,255,255,0.10);

        }


        .welcome-card::after {

            content: "";

            position: absolute;

            width: 110px;
            height: 110px;

            right: 150px;
            bottom: -80px;

            border-radius: 50%;

            background:
                rgba(169,216,234,0.22);

        }


        .welcome-content {

            position: relative;

            z-index: 2;

        }


        .welcome-label {

            display: inline-block;

            margin-bottom: 7px;

            color:
                #ffeef4;

            font-size: 10px;

            font-weight: bold;

            letter-spacing:
                0.8px;

            text-transform:
                uppercase;

        }


        .welcome-card h2 {

            margin:
                0 0 6px;

            font-size: 22px;

        }


        .welcome-card p {

            margin: 0;

            color:
                #fff2f6;

            font-size: 12px;

            line-height: 1.5;

        }


        .welcome-status {

            position: relative;

            z-index: 2;

            min-width: 155px;

            padding:
                13px 15px;

            border:
                1px solid
                rgba(255,255,255,0.25);

            border-radius: 12px;

            background:
                rgba(255,255,255,0.12);

            backdrop-filter:
                blur(4px);

        }


        .welcome-status small {

            display: block;

            margin-bottom: 5px;

            color:
                #ffeaf1;

            font-size: 9px;

        }


        .welcome-status strong {

            font-size: 17px;

        }


        /* =====================================================
           SECTION
        ===================================================== */

        .section {

            margin-bottom: 30px;

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

            background:
                #d98fa8;

        }


        .section-title {

            margin: 0;

            color:
                #4a4146;

            font-size: 15px;

        }


        .section-subtitle {

            margin:
                4px 0 0;

            color:
                #9a8d93;

            font-size: 10px;

        }


        .section-note {

            color:
                #a09399;

            font-size: 9px;

        }


        /* =====================================================
           STATISTICS
        ===================================================== */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(
                    5,
                    minmax(0,1fr)
                );

            gap: 10px;

            width: 100%;

        }


        .stat-card {

            min-width: 0;

            padding:
                14px;

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 13px;

            box-shadow:
                0 3px 12px
                rgba(80,50,62,0.03);

            transition:
                transform .2s ease,
                box-shadow .2s ease;

        }


        .stat-card:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 8px 20px
                rgba(80,50,62,0.08);

        }


        .stat-head {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 7px;

            margin-bottom: 10px;

        }


        .stat-label {

            min-width: 0;

            color:
                #8c7e85;

            font-size: 10px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .stat-icon {

            width: 31px;
            height: 31px;

            flex:
                0 0 31px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 9px;

            font-size: 14px;

        }


        .pink-bg {
            background: #fcecf2;
        }

        .blue-bg {
            background: #eaf7fb;
        }

        .green-bg {
            background: #e8f5ed;
        }

        .yellow-bg {
            background: #fff7df;
        }


        .stat-number {

            color:
                #413a3e;

            font-size: 21px;

            font-weight: bold;

        }


        .stat-bottom {

            display: flex;

            justify-content: space-between;

            gap: 5px;

            margin-top: 5px;

            color:
                #a1959a;

            font-size: 9px;

        }


        /* =====================================================
           MONITORING
        ===================================================== */

        .monitoring-layout {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 15px;

        }


        .panel {

            background: white;

            border:
                1px solid #eee5e9;

            border-radius: 14px;

            padding: 19px;

            box-shadow:
                0 3px 12px
                rgba(80,50,62,0.03);

        }


        .panel-heading {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            padding-bottom: 11px;

            margin-bottom: 17px;

            border-bottom:
                1px solid #f0e8eb;

        }


        .panel-heading h3 {

            margin: 0;

            color:
                #443c40;

            font-size: 14px;

        }


        .panel-heading span {

            color:
                #9b9095;

            font-size: 9px;

        }


        /* STATUS */

        .status-row {

            margin-bottom: 17px;

        }


        .status-row:last-child {

            margin-bottom: 0;

        }


        .status-info {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            margin-bottom: 7px;

            font-size: 11px;

        }


        .status-info b {

            color:
                #665b60;

            font-size: 10px;

        }


        .bar {

            width: 100%;

            height: 8px;

            overflow: hidden;

            border-radius: 20px;

            background:
                #f1edef;

        }


        .fill {

            height: 100%;

            border-radius: 20px;

        }


        .approved {
            background: #a9d8ea;
        }

        .submitted {
            background: #f5d98a;
        }

        .rejected {
            background: #e9a6a6;
        }


        /* LOCATION */

        .location-summary {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 10px;

            margin-top: 21px;

            padding-top: 16px;

            border-top:
                1px solid #f0e8eb;

        }


        .location-box {

            padding:
                13px;

            border-radius: 10px;

            background:
                #eaf7fb;

        }


        .location-box.warning {

            background:
                #fff7df;

        }


        .location-box small {

            display: block;

            margin-bottom: 5px;

            color:
                #83777d;

            font-size: 9px;

        }


        .location-box strong {

            color:
                #40393d;

            font-size: 17px;

        }


        .attention {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-top: 15px;

            padding:
                11px 12px;

            border:
                1px solid #f1e4c8;

            border-radius: 10px;

            background:
                #fffaf0;

        }


        .attention-icon {

            width: 30px;
            height: 30px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 8px;

            background:
                #f5d98a;

        }


        .attention-text {

            font-size: 10px;

            line-height: 1.4;

            color:
                #756961;

        }


        .attention-text strong {

            display: block;

            margin-bottom: 2px;

            color:
                #564c50;

        }


        /* =====================================================
           MAP
        ===================================================== */

        .map-panel {

            padding-bottom: 13px;

        }


        #dashboardMap {

            width: 100%;

            height: 310px;

            border-radius: 11px;

            overflow: hidden;

        }


        .map-footer {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            margin-top: 10px;

        }


        .map-legend {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;

            color:
                #857980;

            font-size: 9px;

        }


        .legend-item {

            display: flex;

            align-items: center;

            gap: 5px;

        }


        .legend-dot {

            width: 8px;
            height: 8px;

            border-radius: 50%;

        }


        .legend-approved {
            background: #77b9d1;
        }

        .legend-submitted {
            background: #e1bf57;
        }

        .legend-rejected {
            background: #d88989;
        }


        .map-button {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                8px 11px;

            border-radius: 8px;

            background:
                #fcecf2;

            color:
                #c8738e;

            font-size: 9px;

            font-weight: bold;

            text-decoration: none;

            transition: 0.2s;

        }


        .map-button:hover {

            background:
                #f5d9e2;

        }


        /* =====================================================
           KECAMATAN
        ===================================================== */

        .district-panel {

            padding-bottom: 13px;

        }


        .district-list {

            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0,1fr)
                );

            column-gap: 25px;

            row-gap: 13px;

        }


        .district-item {

            min-width: 0;

        }


        .district-head {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            margin-bottom: 6px;

        }


        .district-name {

            min-width: 0;

            color:
                #5c5257;

            font-size: 10px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .district-count {

            color:
                #8d7f86;

            font-size: 9px;

            font-weight: bold;

        }


        .district-bar {

            width: 100%;

            height: 6px;

            overflow: hidden;

            border-radius: 20px;

            background:
                #f2ecef;

        }


        .district-fill {

            height: 100%;

            border-radius: 20px;

            background:
                #d9a0b4;

        }


        .empty-district {

            padding:
                15px;

            color:
                #a09499;

            font-size: 10px;

            text-align: center;

        }


        /* =====================================================
           QUICK ACTION
        ===================================================== */

        .quick-actions {

            display: grid;

            grid-template-columns:
                repeat(
                    4,
                    1fr
                );

            gap: 10px;

        }


        .quick-action {

            display: flex;

            align-items: center;

            gap: 10px;

            padding:
                13px;

            border:
                1px solid #eee5e9;

            border-radius: 11px;

            background: white;

            color:
                #544a4f;

            text-decoration: none;

            transition: 0.2s;

        }


        .quick-action:hover {

            transform:
                translateY(-2px);

            border-color:
                #e2b6c5;

            box-shadow:
                0 6px 15px
                rgba(80,50,62,0.06);

        }


        .quick-icon {

            width: 34px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 9px;

            background:
                #fcecf2;

            font-size: 15px;

        }


        .quick-text strong {

            display: block;

            margin-bottom: 3px;

            font-size: 10px;

        }


        .quick-text span {

            color:
                #a09499;

            font-size: 8px;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1150px) {

            .main-content {

                padding:
                    25px;

            }


            .stats {

                gap: 7px;

            }


            .stat-card {

                padding:
                    11px 9px;

            }


            .stat-label {

                font-size: 9px;

            }


            .stat-number {

                font-size: 19px;

            }

        }


        @media (max-width: 950px) {

            .top-bar {

                align-items:
                    flex-start;

            }


            .header-right {

                flex-direction:
                    column;

                align-items:
                    flex-end;

            }


            .monitoring-layout {

                grid-template-columns:
                    1fr;

            }


            .quick-actions {

                grid-template-columns:
                    repeat(
                        2,
                        1fr
                    );

            }

        }


        @media (max-width: 800px) {

            .stats {

                grid-template-columns:
                    repeat(
                        3,
                        minmax(0,1fr)
                    );

            }


            .district-list {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width: 700px) {

            .sidebar {

                position: relative;

                width: 100%;

                min-height: auto;

                padding:
                    20px 15px;

            }


            .main-content {

                width: 100%;

                margin-left: 0;

                padding:
                    20px 16px 30px;

            }


            .sidebar-menu {

                display: grid;

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0,1fr)
                    );

            }


            .sidebar-bottom {

                margin-top: 20px;

            }


            .top-bar {

                flex-direction:
                    column;

            }


            .header-right {

                width: 100%;

                flex-direction:
                    row;

                align-items:
                    stretch;

            }


            .update-info {

                flex: 1;

                text-align: left;

            }


            .user-info {

                flex: 1;

                min-width: 0;

            }


            .welcome-card {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }


            .welcome-status {

                width: 100%;

            }


            .stats {

                grid-template-columns:
                    repeat(
                        2,
                        minmax(0,1fr)
                    );

            }


            .district-list {

                grid-template-columns:
                    1fr;

            }


            .quick-actions {

                grid-template-columns:
                    1fr;

            }


            #dashboardMap {

                height: 280px;

            }

        }


        @media (max-width: 430px) {

            .sidebar-menu {

                grid-template-columns:
                    1fr;

            }


            .stats {

                grid-template-columns:
                    1fr;

            }


            .header-right {

                flex-direction:
                    column;

            }


            .location-summary {

                grid-template-columns:
                    1fr;

            }


            .map-footer {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


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


        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="sidebar-menu">


            <a
                href="{{ route('dashboard') }}"
                class="active"
            >

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <a
                href="{{ route('tagging.index') }}"
            >

                <span class="menu-icon">
                    📋
                </span>

                <span>
                    Data Tagging
                </span>

            </a>


            <a
                href="{{ route('tagging.import') }}"
            >

                <span class="menu-icon">
                    📥
                </span>

                <span>
                    Import CSV
                </span>

            </a>


            <a
                href="{{ route('tagging.map') }}"
            >

                <span class="menu-icon">
                    🗺️
                </span>

                <span>
                    Lihat Peta
                </span>

            </a>


            @if(auth()->user()->role === 'admin')

                <a
                    href="{{ route('tagging.create') }}"
                >

                    <span class="menu-icon">
                        ➕
                    </span>

                    <span>
                        Tambah Data
                    </span>

                </a>

            @endif


        </nav>


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
         MAIN CONTENT
    ===================================================== -->

    <main class="main-content">


        <!-- =================================================
             HEADER
        ================================================= -->

        <div class="top-bar">


            <div class="page-title">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Ringkasan dan monitoring data tagging
                    Kota Palembang
                </p>

            </div>


            <div class="header-right">


                <div class="update-info">

                    <span class="update-label">
                        Data terakhir diperbarui
                    </span>

                    <span class="update-date">

                    @if($lastUpdated)

                        {{ \Carbon\Carbon::createFromFormat(
                            'Y-m-d H:i:s',
                            $lastUpdated->format('Y-m-d H:i:s'),
                            'UTC'
                        )->setTimezone('Asia/Jakarta')->format('d F Y, H.i') }} WIB

                    @else

                        Belum tersedia

                    @endif

                </span>

                </div>


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
             WELCOME
        ================================================= -->

        <section class="welcome-card">


            <div class="welcome-content">


                <span class="welcome-label">
                    Sistem Pengelolaan Data
                </span>


                <h2>

                    Selamat Datang,
                    {{ auth()->user()->name }} 👋

                </h2>


                <p>

                    Pantau status, lokasi, dan sebaran
                    data tagging Kota Palembang
                    melalui dashboard ini.

                </p>


            </div>


            <div class="welcome-status">


                <small>
                    Total data saat ini
                </small>


                <strong>

                    {{ number_format($totalData) }}

                    Data

                </strong>


            </div>


        </section>


        <!-- =================================================
             RINGKASAN DATA
        ================================================= -->

        <section class="section">


            <div class="section-header">


                <div class="section-title-wrap">


                    <div class="section-accent"></div>


                    <div>

                        <h2 class="section-title">
                            Ringkasan Data
                        </h2>


                        <p class="section-subtitle">
                            Informasi utama data tagging
                        </p>

                    </div>


                </div>


                <span class="section-note">
                    {{ number_format($totalData) }} data
                </span>


            </div>


            <div class="stats">


                <!-- TOTAL -->

                <div class="stat-card">


                    <div class="stat-head">

                        <span class="stat-label">
                            Total Data
                        </span>

                        <span class="stat-icon pink-bg">
                            📋
                        </span>

                    </div>


                    <div class="stat-number">

                        {{ number_format($totalData) }}

                    </div>


                    <div class="stat-bottom">

                        <span>
                            Seluruh data
                        </span>

                        <span>
                            100%
                        </span>

                    </div>


                </div>


                <!-- LOKASI -->

                <div class="stat-card">


                    <div class="stat-head">

                        <span class="stat-label">
                            Dengan Lokasi
                        </span>

                        <span class="stat-icon blue-bg">
                            📍
                        </span>

                    </div>


                    <div class="stat-number">

                        {{ number_format($withLocation) }}

                    </div>


                    <div class="stat-bottom">

                        <span>
                            Memiliki koordinat
                        </span>

                        <span>
                            {{ $locationPercent }}%
                        </span>

                    </div>


                </div>


                <!-- APPROVED -->

                <div class="stat-card">


                    <div class="stat-head">

                        <span class="stat-label">
                            Approved
                        </span>

                        <span class="stat-icon green-bg">
                            ✓
                        </span>

                    </div>


                    <div class="stat-number">

                        {{ number_format($approved) }}

                    </div>


                    <div class="stat-bottom">

                        <span>
                            Disetujui
                        </span>

                        <span>
                            {{ $approvedPercent }}%
                        </span>

                    </div>


                </div>


                <!-- SUBMITTED -->

                <div class="stat-card">


                    <div class="stat-head">

                        <span class="stat-label">
                            Submitted
                        </span>

                        <span class="stat-icon yellow-bg">
                            ◷
                        </span>

                    </div>


                    <div class="stat-number">

                        {{ number_format($submitted) }}

                    </div>


                    <div class="stat-bottom">

                        <span>
                            Dikirim
                        </span>

                        <span>
                            {{ $submittedPercent }}%
                        </span>

                    </div>


                </div>


                <!-- REJECTED -->

                <div class="stat-card">


                    <div class="stat-head">

                        <span class="stat-label">
                            Rejected
                        </span>

                        <span class="stat-icon pink-bg">
                            !
                        </span>

                    </div>


                    <div class="stat-number">

                        {{ number_format($rejected) }}

                    </div>


                    <div class="stat-bottom">

                        <span>
                            Ditolak
                        </span>

                        <span>
                            {{ $rejectedPercent }}%
                        </span>

                    </div>


                </div>


            </div>


        </section>


        <!-- =================================================
             MONITORING
        ================================================= -->

        <section class="section">


            <div class="section-header">


                <div class="section-title-wrap">


                    <div class="section-accent"></div>


                    <div>

                        <h2 class="section-title">
                            Monitoring Data
                        </h2>


                        <p class="section-subtitle">
                            Status dan kondisi data tagging
                        </p>

                    </div>


                </div>


                <span class="section-note">
                    Monitoring terkini
                </span>


            </div>


            <div class="monitoring-layout">


                <!-- STATUS -->

                <div class="panel">


                    <div class="panel-heading">


                        <h3>
                            Status Data Tagging
                        </h3>


                        <span>
                            Distribusi status
                        </span>


                    </div>


                    <!-- APPROVED -->

                    <div class="status-row">


                        <div class="status-info">

                            <span>
                                Approved
                            </span>


                            <b>

                                {{ $approved }}

                                data

                                ·

                                {{ $approvedPercent }}%

                            </b>

                        </div>


                        <div class="bar">


                            <div
                                class="fill approved"
                                style="
                                    width:
                                    {{ $approvedPercent }}%;
                                "
                            ></div>


                        </div>


                    </div>


                    <!-- SUBMITTED -->

                    <div class="status-row">


                        <div class="status-info">

                            <span>
                                Submitted
                            </span>


                            <b>

                                {{ $submitted }}

                                data

                                ·

                                {{ $submittedPercent }}%

                            </b>

                        </div>


                        <div class="bar">


                            <div
                                class="fill submitted"
                                style="
                                    width:
                                    {{ $submittedPercent }}%;
                                "
                            ></div>


                        </div>


                    </div>


                    <!-- REJECTED -->

                    <div class="status-row">


                        <div class="status-info">

                            <span>
                                Rejected
                            </span>


                            <b>

                                {{ $rejected }}

                                data

                                ·

                                {{ $rejectedPercent }}%

                            </b>

                        </div>


                        <div class="bar">


                            <div
                                class="fill rejected"
                                style="
                                    width:
                                    {{ $rejectedPercent }}%;
                                "
                            ></div>


                        </div>


                    </div>


                    <!-- LOKASI -->

                    <div class="location-summary">


                        <div class="location-box">


                            <small>
                                Data memiliki koordinat
                            </small>


                            <strong>

                                {{ $withLocation }}

                            </strong>


                        </div>


                        <div class="location-box warning">


                            <small>
                                Data tanpa koordinat
                            </small>


                            <strong>

                                {{ $withoutLocation }}

                            </strong>


                        </div>


                    </div>


                    @if($withoutLocation > 0)


                        <div class="attention">


                            <div class="attention-icon">
                                ⚠
                            </div>


                            <div class="attention-text">


                                <strong>
                                    Perlu diperiksa
                                </strong>


                                Terdapat
                                {{ $withoutLocation }}
                                data yang belum memiliki
                                koordinat lokasi.

                            </div>


                        </div>


                    @else


                        <div class="attention">


                            <div class="attention-icon">
                                ✓
                            </div>


                            <div class="attention-text">


                                <strong>
                                    Kondisi lokasi baik
                                </strong>


                                Seluruh data telah memiliki
                                koordinat lokasi.

                            </div>


                        </div>


                    @endif


                </div>


                <!-- MINI MAP -->

                <div class="panel map-panel">


                    <div class="panel-heading">


                        <h3>
                            Sebaran Data
                        </h3>


                        <span>
                            Kota Palembang
                        </span>


                    </div>


                    <div id="dashboardMap"></div>


                    <div class="map-footer">


                        <div class="map-legend">


                            <div class="legend-item">

                                <span
                                    class="legend-dot legend-approved"
                                ></span>

                                Approved

                            </div>


                            <div class="legend-item">

                                <span
                                    class="legend-dot legend-submitted"
                                ></span>

                                Submitted

                            </div>


                            <div class="legend-item">

                                <span
                                    class="legend-dot legend-rejected"
                                ></span>

                                Rejected

                            </div>


                        </div>


                        <a
                            href="{{ route('tagging.map') }}"
                            class="map-button"
                        >

                            Buka Peta Lengkap
                            →
                            
                        </a>


                    </div>


                </div>


            </div>


        </section>


        <!-- =================================================
             KECAMATAN
        ================================================= -->

        <section class="section">


            <div class="section-header">


                <div class="section-title-wrap">


                    <div class="section-accent"></div>


                    <div>

                        <h2 class="section-title">
                            Distribusi Data per Kecamatan
                        </h2>


                        <p class="section-subtitle">
                            Jumlah data tagging berdasarkan wilayah
                        </p>

                    </div>


                </div>


                <span class="section-note">
                    Kota Palembang
                </span>


            </div>


            <div class="panel district-panel">


                @php

                    $maxDistrictData = collect(
                        $dataPerKecamatan
                    )->max('jumlah');

                @endphp


                @if(count($dataPerKecamatan) > 0)


                    <div class="district-list">


                        @foreach($dataPerKecamatan as $district)


                            @php

                                $districtPercent =
                                    $maxDistrictData > 0
                                    ? ($district['jumlah'] / $maxDistrictData) * 100
                                    : 0;

                            @endphp


                            <div class="district-item">


                                <div class="district-head">


                                    <span
                                        class="district-name"
                                        title="{{ $district['nama'] }}"
                                    >

                                        {{ $district['nama'] }}

                                    </span>


                                    <span
                                        class="district-count"
                                    >

                                        {{ number_format($district['jumlah']) }}
                                        data

                                    </span>


                                </div>


                                <div class="district-bar">


                                    <div
                                        class="district-fill"
                                        style="
                                            width:
                                            {{ $districtPercent }}%;
                                        "
                                    ></div>


                                </div>


                            </div>


                        @endforeach


                    </div>


                @else


                    <div class="empty-district">

                        Belum terdapat data kecamatan.

                    </div>


                @endif


            </div>


        </section>


    </main>


    <!-- =====================================================
         LEAFLET JS
    ===================================================== -->

    <script
        src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    ></script>


    <script>

        /*
        |--------------------------------------------------------------------------
        | DATA DARI DATABASE
        |--------------------------------------------------------------------------
        */

        const mapData = @json($mapData);


        /*
        |--------------------------------------------------------------------------
        | BUAT PETA
        |--------------------------------------------------------------------------
        */

        const map = L.map(
            'dashboardMap'
        );


        /*
        |--------------------------------------------------------------------------
        | OPENSTREETMAP
        |--------------------------------------------------------------------------
        */

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                maxZoom: 19,
                attribution:
                    '&copy; OpenStreetMap contributors'
            }
        ).addTo(map);


        /*
        |--------------------------------------------------------------------------
        | DEFAULT POSISI PALEMBANG
        |--------------------------------------------------------------------------
        */

        const defaultCenter = [
            -2.9761,
            104.7754
        ];


        map.setView(
            defaultCenter,
            11
        );


        /*
        |--------------------------------------------------------------------------
        | WARNA MARKER
        |--------------------------------------------------------------------------
        */

        function getMarkerColor(status) {

            if (
                status ===
                'APPROVED BY Pengawas'
            ) {

                return '#77b9d1';

            }


            if (
                status ===
                'SUBMITTED BY Pencacah'
            ) {

                return '#e1bf57';

            }


            if (
                status ===
                'REJECTED BY Pengawas'
            ) {

                return '#d88989';

            }


            return '#d98fa8';

        }


        /*
        |--------------------------------------------------------------------------
        | MARKER DATA
        |--------------------------------------------------------------------------
        */

        const markers = [];


        mapData.forEach(function(data) {


            const latitude =
                parseFloat(
                    data.geotag_latitude
                );


            const longitude =
                parseFloat(
                    data.geotag_longitude
                );


            if (
                Number.isNaN(latitude) ||
                Number.isNaN(longitude)
            ) {

                return;

            }


            const color =
                getMarkerColor(
                    data.assignment_status_alias
                );


            const markerIcon =
                L.divIcon({

                    className:
                        'custom-dashboard-marker',

                    html:
                        `
                        <div
                            style="
                                width:13px;
                                height:13px;
                                border-radius:50%;
                                background:${color};
                                border:3px solid white;
                                box-shadow:0 2px 5px rgba(0,0,0,.25);
                            "
                        ></div>
                        `,

                    iconSize:
                        [13, 13],

                    iconAnchor:
                        [6, 6]

                });


            const marker =
                L.marker(
                    [
                        latitude,
                        longitude
                    ],
                    {
                        icon:
                            markerIcon
                    }
                ).addTo(map);


            marker.bindPopup(`

                <div
                    style="
                        min-width:210px;
                        font-family:Arial,sans-serif;
                    "
                >

                    <strong
                        style="
                            display:block;
                            margin-bottom:8px;
                            color:#40393d;
                            font-size:13px;
                        "
                    >
                        ${data.nama_usaha_bang ?? '-'}
                    </strong>


                    <div
                        style="
                            margin-bottom:5px;
                            color:#6f6469;
                            font-size:11px;
                        "
                    >
                        <b>Assignment ID:</b>
                        ${data.assignment_id ?? '-'}
                    </div>


                    <div
                        style="
                            margin-bottom:5px;
                            color:#6f6469;
                            font-size:11px;
                        "
                    >
                        <b>Status:</b>
                        ${data.assignment_status_alias ?? '-'}
                    </div>


                    <div
                        style="
                            margin-bottom:5px;
                            color:#6f6469;
                            font-size:11px;
                        "
                    >
                        <b>Nama KK:</b>
                        ${data.nama_kk ?? '-'}
                    </div>


                    <div
                        style="
                            color:#6f6469;
                            font-size:11px;
                        "
                    >
                        <b>Akurasi:</b>
                        ${data.geotag_accuracy ?? '-'}
                    </div>

                </div>

            `);


            markers.push(marker);

        });


        /*
        |--------------------------------------------------------------------------
        | SESUAIKAN VIEW DENGAN DATA
        |--------------------------------------------------------------------------
        */

        if (markers.length > 0) {

            const group =
                L.featureGroup(
                    markers
                );

            map.fitBounds(
                group.getBounds(),
                {
                    padding:
                        [20, 20]
                }
            );

        }


    </script>


</body>

</html>