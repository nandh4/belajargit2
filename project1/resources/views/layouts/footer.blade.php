
<link rel="stylesheet" href="{{ asset('css/layout/footer.css') }}">

<footer class="app-footer" id="appFooter">

{{-- DEKORASI FOOTER --}}
<div class="footer-decoration footer-decoration-one"></div>
<div class="footer-decoration footer-decoration-two"></div>
    <div class="footer-container">

        {{-- FOOTER BRAND --}}
        <div class="footer-brand">
            {{-- Brand dapat ditambahkan kembali jika diperlukan --}}
        </div>

        {{-- FOOTER INFORMATION --}}
        <div class="footer-information">

            <div class="footer-system">
                <span class="footer-status-dot"></span>
                <span>SISTEM PENGELOLAAN DATA TAGGING</span>
            </div>

            <p class="footer-copyright">
                Hak Cipta &copy; {{ date('Y') }} Badan Pusat Statistik Provinsi Sumatera Selatan
            </p>

        </div>

    </div>

    {{-- BOTTOM LINE --}}
    <div class="footer-bottom-line"></div>

</footer>
