<x-auth-shell title="{{ __('Lupa Kata Sandi') }}" subtitle="{{ __('Kami akan mengirimkan tautan reset ke email kamu.') }}">

    <p class="note">{{ __('Tidak masalah. Beri tahu kami alamat email kamu, dan kami akan mengirimkan tautan reset kata sandi agar kamu bisa memilih kata sandi baru.') }}</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="field">
            <label for="email">{{ __('Email') }}</label>
            <div class="input-wrap">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username" placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">{{ __('Kirim Tautan Reset') }}</button>
    </form>

    <p class="footer">
        {{ __('Sudah ingat kata sandimu?') }}
        <a class="link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
    </p>
</x-auth-shell>