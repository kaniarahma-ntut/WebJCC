<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Daftar') }} — {{ config('app.name', 'JCC') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --merah: #D62828;
            --merah-dark: #A51E1E;
            --cream: #F2EBE1;
            --broken-white: #FDFDFD;
            --charcoal: #2D2D2D;
            --muted: #6B6B6B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Hanken Grotesk", sans-serif;
            color: var(--charcoal);
            min-height: 100vh;
            overflow-x: hidden;
            background:
                radial-gradient(1200px 600px at 110% -10%, rgba(214, 40, 40, .18), transparent 60%),
                radial-gradient(900px 500px at -20% 110%, rgba(214, 40, 40, .12), transparent 60%),
                var(--cream);
            position: relative;
        }

        /* ---------- Dekorasi latar ---------- */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(70px);
            opacity: .5;
            z-index: 0;
            animation: float 12s ease-in-out infinite;
        }

        .orb-1 {
            width: 320px;
            height: 320px;
            top: -80px;
            right: -60px;
            background: rgba(214, 40, 40, .45);
        }

        .orb-2 {
            width: 260px;
            height: 260px;
            bottom: -70px;
            left: -70px;
            background: rgba(214, 40, 40, .35);
            animation-delay: -4s;
        }

        .orb-3 {
            width: 180px;
            height: 180px;
            top: 45%;
            left: 12%;
            background: rgba(242, 235, 225, .9);
            animation-delay: -8s;
            filter: blur(40px);
        }

        @keyframes float {
            0%,
            100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(-30px, 30px);
            }
        }

        @keyframes rise {
            from {
                transform: translateY(28px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ---------- Halaman ---------- */
        .page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
        }

        .card {
            width: 100%;
            max-width: 620px;
            background: rgba(253, 253, 253, .82);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .7);
            border-radius: 28px;
            box-shadow: 0 30px 80px -20px rgba(45, 45, 45, .25);
            padding: 40px 40px 34px;
            animation: rise .6s ease both;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            margin-bottom: 28px;
        }

        .brand-badge {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--merah), var(--merah-dark));
            display: grid;
            place-items: center;
            color: #fff;
            font-family: "Montserrat", sans-serif;
            font-weight: 800;
            font-size: 20px;
            box-shadow: 0 10px 24px -8px rgba(214, 40, 40, .6);
        }

        .brand-name {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: 24px;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            color: var(--merah);
        }

        h1 {
            font-family: "Montserrat", sans-serif;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .subtitle {
            margin-top: 8px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
        }

        /* ---------- Form ---------- */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 16px;
            margin-top: 20px;
        }

        .form-grid .field {
            margin-top: 0;
        }

        .field {
            margin-top: 24px;
        }

        .field label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            padding: 14px 44px 14px 16px;
            font-family: inherit;
            font-size: 15px;
            color: var(--charcoal);
            background: #fff;
            border: 1.5px solid #e4ddd2;
            border-radius: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .input-wrap input:focus {
            border-color: var(--merah);
            box-shadow: 0 0 0 4px rgba(214, 40, 40, .12);
        }

        .input-icon {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #9a938b;
            font-size: 13px;
            letter-spacing: .5px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 4px;
        }

        .input-icon:hover {
            color: var(--merah);
        }

        .input-error {
            margin-top: 8px;
            font-size: 13px;
            color: var(--merah);
            font-weight: 500;
        }

        .btn {
            width: 100%;
            margin-top: 24px;
            padding: 13px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--merah), var(--merah-dark));
            color: #fff;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .5px;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 14px 30px -10px rgba(214, 40, 40, .55);
            transition: transform .2s, box-shadow .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -12px rgba(214, 40, 40, .65);
        }

        .btn:active {
            transform: translateY(0);
        }

        .auth-error {
            margin-top: 20px;
            padding: 12px 16px;
            border-radius: 12px;
            background: rgba(214, 40, 40, .08);
            border-left: 4px solid var(--merah);
            font-size: 14px;
            color: var(--merah-dark);
        }

        .footer {
            margin-top: 8px;
            text-align: center;
            font-size: 14px;
            color: var(--muted);
        }

        .link {
            color: var(--merah);
            font-weight: 600;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .card {
                padding: 32px 24px 28px;
                border-radius: 22px;
            }

            h1 {
                font-size: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="page">
        <div class="card">
            <a class="brand" href="/">
                <span class="brand-badge">J</span>
                <span class="brand-name">JCC<span>.</span></span>
            </a>

            <h1>{{ __('Buat Akun Baru') }}</h1>
            <p class="subtitle">{{ __('Bergabunglah untuk menjelajahi JCC.') }}</p>

            @if ($errors->any())
                <div class="auth-error">
                    {{ implode(' ', $errors->all()) }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="nama_user">{{ __('Nama Lengkap') }}</label>
                        <div class="input-wrap">
                            <input id="nama_user" type="text" name="nama_user" value="{{ old('nama_user') }}" required
                                autofocus autocomplete="name" placeholder="Nama lengkap kamu">
                        </div>
                        @error('nama_user')
                            <p class="input-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="username">{{ __('Username') }}</label>
                        <div class="input-wrap">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" required
                                autocomplete="username" placeholder="nama_pengguna">
                        </div>
                        @error('username')
                            <p class="input-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">{{ __('Email') }}</label>
                        <div class="input-wrap">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="username" placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <p class="input-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">{{ __('Kata Sandi') }}</label>
                        <div class="input-wrap">
                            <input id="password" type="password" name="password" required
                                autocomplete="new-password" placeholder="••••••••">
                            <button type="button" class="input-icon" id="toggle-password">Tampil</button>
                        </div>
                        @error('password')
                            <p class="input-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password_confirmation">{{ __('Konfirmasi Kata Sandi') }}</label>
                        <div class="input-wrap">
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password" placeholder="••••••••">
                            <button type="button" class="input-icon" id="toggle-password-confirmation">Tampil</button>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn">{{ __('Daftar') }}</button>
            </form>

            <p class="footer">
                {{ __('Sudah punya akun?') }}
                <a class="link" href="{{ route('login') }}">{{ __('Masuk di sini') }}</a>
            </p>
        </div>
    </div>

    <script>
        const toggle = document.getElementById('toggle-password');
        const password = document.getElementById('password');
        toggle.addEventListener('click', () => {
            const isHidden = password.type === 'password';
            password.type = isHidden ? 'text' : 'password';
            toggle.textContent = isHidden ? 'Sembunyi' : 'Tampil';
        });

        const toggleConfirmation = document.getElementById('toggle-password-confirmation');
        const confirmation = document.getElementById('password_confirmation');
        toggleConfirmation.addEventListener('click', () => {
            const isHidden = confirmation.type === 'password';
            confirmation.type = isHidden ? 'text' : 'password';
            toggleConfirmation.textContent = isHidden ? 'Sembunyi' : 'Tampil';
        });
    </script>
</body>

</html>