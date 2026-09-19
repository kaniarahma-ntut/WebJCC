<x-auth-shell title="{{ __('Verifikasi Email') }}" subtitle="{{ __('Konfirmasi email untuk mengaktifkan akun kamu.') }}">

    <p class="note">{{ __('Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email kamu dengan mengklik tautan yang kami kirimkan. Jika kamu tidak menerima email tersebut, kami akan dengan senang hati mengirimkannya lagi.') }}</p>

    @if (session('status') == 'verification-link-sent')
        <div class="status">{{ __('Tautan verifikasi baru telah dikirim ke email yang kamu gunakan saat pendaftaran.') }}</div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn">{{ __('Kirim Ulang Email Verifikasi') }}</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-outline">{{ __('Keluar') }}</button>
    </form>
</x-auth-shell>