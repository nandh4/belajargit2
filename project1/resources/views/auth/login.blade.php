
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | SISTEM PENGELOLAAN DATA TAGGING</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>

<body>

    <main class="login-wrapper">

        <!-- LOGO DAN IDENTITAS APLIKASI -->
        <div class="login-header">

            <div class="brand-icon">
                <img src="{{ asset('images/logo-tagging.png') }}"
                     alt="Logo Data Tagging BPS">
            </div>

            <h1>SISTEM PENGELOLAAN</h1>
            <h1>DATA TAGGING</h1>

            <div class="header-divider"></div>

        </div>

        <!-- UCAPAN SELAMAT DATANG -->
        <div class="login-title">
            <p>Silakan masuk menggunakan akun Anda</p>
        </div>

        <!-- PESAN ERROR -->
        @if ($errors->any())
            <div class="error" role="alert">
                <i class="fas fa-circle-exclamation"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <!-- USERNAME -->
            <div class="form-group">

                <label for="username">Username</label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        <i class="fas fa-user"></i>
                    </span>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        autocomplete="username"
                        required
                        autofocus
                    >

                </div>

            </div>

            <!-- PASSWORD -->
            <div class="form-group">

                <label for="password">Password</label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        <i class="fas fa-lock"></i>
                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        id="togglePassword"
                        aria-label="Tampilkan password"
                    >
                        <i class="fas fa-eye"></i>
                    </button>

                </div>

            </div>

            <!-- TOMBOL LOGIN -->
            <button type="submit" class="login-button">
                <i class="fas fa-right-to-bracket"></i>
                Masuk
            </button>

        </form>

        <!-- FOOTER -->
        <div class="login-footer">

            <p>
                <strong>BPS Provinsi Sumatera Selatan</strong><br>
                Akses sistem sesuai dengan hak pengguna yang telah ditentukan
            </p>

        </div>

    </main>

    <!-- SCRIPT TAMPIL / SEMBUNYIKAN PASSWORD -->
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {

            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            togglePassword.innerHTML = isPassword
                ? '<i class="fas fa-eye-slash"></i>'
                : '<i class="fas fa-eye"></i>';

            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Sembunyikan password' : 'Tampilkan password'
            );

        });
    </script>

</body>
</html>
