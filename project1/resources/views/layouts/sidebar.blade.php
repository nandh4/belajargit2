<link rel="stylesheet" href="{{ asset('css/layout/sidebar.css') }}">

{{-- TOMBOL HAMBURGER MOBILE --}}
<button
    type="button"
    class="mobile-sidebar-toggle"
    id="mobileSidebarToggle"
    aria-label="Buka Sidebar"
    aria-controls="sidebar"
    aria-expanded="false"
>
    <i class="fas fa-bars"></i>
</button>

<aside class="sidebar" id="sidebar">

    <div class="sidebar-decoration sidebar-decoration-one"></div>
    <div class="sidebar-decoration sidebar-decoration-two"></div>

    {{-- HEADER SIDEBAR --}}
    <div class="sidebar-header">

        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            title="Tutup Sidebar"
            aria-label="Tutup Sidebar"
            aria-expanded="true"
        >
            <i class="fas fa-times"></i>
        </button>

        {{-- LOGO DAN IDENTITAS APLIKASI --}}
        <div class="sidebar-brand">

            <div class="brand-icon">
                <img
                    src="{{ asset('images/logo-tagging.png') }}"
                    alt="Logo Data Tagging BPS"
                >
            </div>

            <div class="brand-text">
                <h2>
                    SISTEM PENGELOLAAN<br>
                    DATA TAGGING
                </h2>

                <p>
                    Badan Pusat Statistik<br>
                    Provinsi Sumatera Selatan
                </p>
            </div>

        </div>

    </div>

    {{-- JUDUL MENU --}}
    <div class="menu-title">
        <span>MENU UTAMA</span>
    </div>

    {{-- MENU SIDEBAR --}}
    <nav class="sidebar-menu">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
           title="Dashboard">

            <span class="menu-icon">
                <i class="fas fa-home"></i>
            </span>

            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('tagging.index') }}"
           class="{{ request()->routeIs('tagging.index', 'tagging.create', 'tagging.edit') ? 'active' : '' }}"
           title="Data Tagging">

            <span class="menu-icon">
                <i class="fas fa-database"></i>
            </span>

            <span class="menu-text">Data Tagging</span>
        </a>

        <a href="{{ route('tagging.map') }}"
           class="{{ request()->routeIs('tagging.map') ? 'active' : '' }}"
           title="Lihat Peta">

            <span class="menu-icon">
                <i class="fas fa-map-marked-alt"></i>
            </span>

            <span class="menu-text">Lihat Peta</span>
        </a>

        <a href="{{ route('user.index') }}"
           class="{{ request()->routeIs('user.index', 'user.create', 'user.edit', 'user.reset-pw') ? 'active' : '' }}"
           title="Kelola User">

            <span class="menu-icon">
                <i class="fas fa-user"></i>
            </span>

            <span class="menu-text">Kelola Akun User</span>
        </a>

        <a href="{{ route('tagging.import') }}"
           class="{{ request()->routeIs('tagging.import') ? 'active' : '' }}"
           title="Import CSV">

            <span class="menu-icon">
                <i class="fas fa-file-import"></i>
            </span>

            <span class="menu-text">Import CSV</span>
        </a>

    </nav>

</aside>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('sidebar');
    const desktopToggle = document.getElementById('sidebarToggle');
    const mobileToggle = document.getElementById('mobileSidebarToggle');

    if (!sidebar || !desktopToggle) return;

    const desktopIcon = desktopToggle.querySelector('i');
    const mobileIcon = mobileToggle
        ? mobileToggle.querySelector('i')
        : null;

    function updateSidebar(isClosed) {

        document.body.classList.toggle('sidebar-closed', isClosed);

        // Atur tombol sidebar
        desktopToggle.setAttribute('aria-expanded', String(!isClosed));
        desktopToggle.setAttribute(
            'aria-label',
            isClosed ? 'Buka Sidebar' : 'Tutup Sidebar'
        );
        desktopToggle.setAttribute(
            'title',
            isClosed ? 'Buka Sidebar' : 'Tutup Sidebar'
        );

        if (desktopIcon) {
            desktopIcon.classList.toggle('fa-bars', isClosed);
            desktopIcon.classList.toggle('fa-times', !isClosed);
        }

        // Atur tombol hamburger mobile
        if (mobileToggle) {
            mobileToggle.setAttribute('aria-expanded', String(!isClosed));
            mobileToggle.setAttribute(
                'aria-label',
                isClosed ? 'Buka Sidebar' : 'Tutup Sidebar'
            );
        }

        if (mobileIcon) {
            mobileIcon.classList.toggle('fa-bars', isClosed);
            mobileIcon.classList.toggle('fa-times', !isClosed);
        }
    }

    // Kondisi awal: sidebar terbuka
    updateSidebar(false);

    // Tombol di dalam sidebar
    desktopToggle.addEventListener('click', function () {

        const isClosed = document.body.classList.contains('sidebar-closed');

        updateSidebar(!isClosed);

    });

    // Tombol hamburger mobile untuk membuka sidebar
    if (mobileToggle) {

        mobileToggle.addEventListener('click', function () {
            updateSidebar(false);
        });

    }

    // Tombol Escape untuk menutup sidebar
    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            updateSidebar(true);
        }

    });

});
</script>