<x-auth-shell title="{{ __('Atur Ulang Kata Sandi') }}" subtitle="{{ __('Buat kata sandi baru untuk akun kamu.') }}">

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <div class="input-wrap">
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                    autofocus autocomplete="username" placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password">{{ __('Kata Sandi Baru') }}</label>
            <div class="input-wrap">
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Minimal 8 karakter">
                <button type="button" class="input-icon pass-toggle">Tampil</button>
            </div>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">{{ __('Konfirmasi Kata Sandi') }}</label>
            <div class="input-wrap">
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Ulangi kata sandi baru">
                <button type="button" class="input-icon pass-toggle">Tampil</button>
            </div>
        </div>

        <button type="submit" class="btn">{{ __('Atur Ulang Kata Sandi') }}</button>
    </form>
</x-auth-shell>