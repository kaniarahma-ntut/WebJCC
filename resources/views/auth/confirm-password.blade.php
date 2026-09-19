<x-auth-shell title="{{ __('Konfirmasi Kata Sandi') }}" subtitle="{{ __('Area ini adalah area aman.') }}">

    <p class="note">{{ __('Silakan konfirmasi kata sandi kamu sebelum melanjutkan.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="field">
            <label for="password">{{ __('Kata Sandi') }}</label>
            <div class="input-wrap">
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    placeholder="••••••••">
                <button type="button" class="input-icon pass-toggle">Tampil</button>
            </div>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">{{ __('Konfirmasi') }}</button>
    </form>
</x-auth-shell>