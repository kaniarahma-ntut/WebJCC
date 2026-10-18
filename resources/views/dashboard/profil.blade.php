@extends('dashboard.layouts.app')

@section('title', 'Profil - JCC')

@section('dashboard-content')
    @php
        $user = Auth::user();
        $nameParts = preg_split('/\s+/', trim($user->nama_user ?? 'Pengguna'));
        $initials = mb_strtoupper(mb_substr($nameParts[0] ?? '', 0, 1) . mb_substr($nameParts[1] ?? '', 0, 1));
        if ($initials === '') {
            $initials = 'U';
        }
        $roleLabels = ['admin_JCC' => 'Admin JCC', 'admin_disporabudpar' => 'Admin Disporabudpar', 'user' => 'Anggota'];
        $roleLabel = $roleLabels[$user->user_role] ?? 'Anggota';
    @endphp

    <div class="max-w-5xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- Hero Card -->
        <div class="reveal revealed relative overflow-hidden rounded-[32px] bg-charcoal text-white p-6 md:p-10 shadow-xl shadow-charcoal/20">
            <div class="absolute -top-16 -right-16 w-64 h-64 bg-merah-jcc/30 rounded-full blur-3xl animate-blob"></div>
            <div class="absolute -bottom-20 -left-10 w-72 h-72 bg-rose-600/20 rounded-full blur-3xl animate-blob"
                style="animation-delay:-6s"></div>
            <div class="absolute top-8 right-24 w-16 h-16 bg-white/5 rounded-2xl rotate-12 animate-floaty"></div>
            <div class="absolute bottom-10 right-40 w-8 h-8 bg-white/5 rounded-full animate-floaty" style="animation-delay:-3s"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-6">
                <div class="relative shrink-0 w-fit">
                    <span
                        class="inline-grid w-24 h-24 place-items-center rounded-[28px] bg-gradient-to-br from-merah-jcc to-rose-700 text-broken-white font-headline font-extrabold text-3xl ring-4 ring-white/15 shadow-2xl shadow-merah-jcc/40">{{ $initials }}</span>
                    <span class="absolute -bottom-1.5 -right-1.5 w-6 h-6 bg-emerald-500 border-4 border-charcoal rounded-full"></span>
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/50 mb-1">Halo, selamat datang kembali</p>
                    <h1 class="font-headline text-2xl md:text-4xl font-extrabold tracking-tight">{{ $user->nama_user }}</h1>
                    <div class="flex flex-wrap items-center gap-3 mt-3">
                        <span
                            class="bg-merah-jcc text-white px-3.5 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-lg shadow-merah-jcc/40">{{ $roleLabel }}</span>
                        <span class="text-sm text-white/70 flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">alternate_email</span>{{ $user->email }}</span>
                    </div>
                </div>

                <div class="shrink-0 grid grid-cols-2 gap-3 md:grid-cols-1">
                    <div class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl px-4 py-3 text-center min-w-[130px]">
                        <p class="font-headline font-extrabold text-lg leading-none">{{ $roleLabel === 'Anggota' ? 'Member' : 'Admin' }}</p>
                        <p class="text-[10px] uppercase tracking-widest text-white/50 font-bold mt-1">Status Akun</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur border border-white/10 rounded-2xl px-4 py-3 text-center min-w-[130px]">
                        <p class="font-headline font-extrabold text-lg leading-none">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d M Y') }}</p>
                        <p class="text-[10px] uppercase tracking-widest text-white/50 font-bold mt-1">Bergabung Sejak</p>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div id="flash"
                class="reveal revealed flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 rounded-2xl px-5 py-3.5">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                <p class="font-headline font-bold text-xs uppercase tracking-wider flex-1">{{ session('success') }}</p>
                <button type="button" onclick="this.parentElement.remove()"
                    class="text-emerald-700/60 hover:text-emerald-700 transition-colors">
                    <span class="material-symbols-outlined text-base">close</span>
                </button>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 md:gap-8 items-start">
            <!-- Kartu Informasi Profil -->
            <div class="reveal revealed md:col-span-3 bg-white border border-charcoal/10 rounded-[32px] shadow-sm overflow-hidden">
                <div class="px-6 md:px-8 py-5 border-b border-charcoal/10 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-2xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center"><span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">badge</span></span>
                    <div>
                        <h2 class="font-headline font-bold text-sm text-charcoal">Informasi Profil</h2>
                        <p class="text-[11px] text-secondary">Perbarui identitas dan data kontak kamu.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profil.update') }}" class="p-6 md:p-8">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user) }}"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('nama_user')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Username</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">person</span>
                                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            </div>
                            @error('username')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Email</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">alternate_email</span>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            </div>
                            @error('email')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Website / Portofolio</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">link</span>
                                <input type="url" name="website" value="{{ old('website', $user->website) }}" placeholder="https://portofoliomu.com"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            </div>
                            @error('website')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mt-6 pt-5 border-t-2 border-charcoal/10 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-merah-jcc hover:bg-rose-700 text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
                            <span class="material-symbols-outlined text-sm">save</span> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kartu Keamanan -->
            <div id="keamanan" class="reveal revealed md:col-span-2 bg-white border border-charcoal/10 rounded-[32px] shadow-sm overflow-hidden scroll-mt-24">
                <div class="px-6 md:px-7 py-5 border-b border-charcoal/10 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center"><span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">lock</span></span>
                    <div>
                        <h2 class="font-headline font-bold text-sm text-charcoal">Keamanan Akun</h2>
                        <p class="text-[11px] text-secondary">Ganti password kamu secara berkala.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profil.update') }}" class="p-6 md:p-7">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Password Lama</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">key</span>
                                <input type="password" id="pw-lama" name="password_sekarang" placeholder="Masukkan password saat ini"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-12 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                                <button type="button" onclick="togglePass('pw-lama','pw-lama-eye')"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 p-1 rounded-full text-charcoal/40 hover:text-merah-jcc transition-colors" title="Lihat password">
                                    <span class="material-symbols-outlined text-base" id="pw-lama-eye">visibility</span>
                                </button>
                            </div>
                            @error('password_sekarang')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Password Baru</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">lock_reset</span>
                                <input type="password" id="pw-baru" name="password_baru" placeholder="Minimal 8 karakter"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-12 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                                <button type="button" onclick="togglePass('pw-baru','pw-baru-eye')"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 p-1 rounded-full text-charcoal/40 hover:text-merah-jcc transition-colors" title="Lihat password">
                                    <span class="material-symbols-outlined text-base" id="pw-baru-eye">visibility</span>
                                </button>
                            </div>
                            @error('password_baru')<p class="mt-1 text-[11px] font-bold text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Konfirmasi Password Baru</label>
                            <div class="relative">
                                <span class="material-symbols-outlined text-charcoal/40 text-base absolute left-3.5 top-1/2 -translate-y-1/2">verified_user</span>
                                <input type="password" id="pw-konfirmasi" name="password_baru_confirmation" placeholder="Ulangi password baru"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl pl-10 pr-12 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                                <button type="button" onclick="togglePass('pw-konfirmasi','pw-konfirmasi-eye')"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 p-1 rounded-full text-charcoal/40 hover:text-merah-jcc transition-colors" title="Lihat password">
                                    <span class="material-symbols-outlined text-base" id="pw-konfirmasi-eye">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-5 border-t-2 border-charcoal/10 flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-amber-600/25 transition-all">
                            <span class="material-symbols-outlined text-sm">lock_reset</span> Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.togglePass = (id, iconId) => {
            const input = document.getElementById(id);
            const icon = document.getElementById(iconId);
            const show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.textContent = show ? 'visibility_off' : 'visibility';
        };
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const flash = document.getElementById('flash');
                if (flash) flash.remove();
            }, 4000);
        });
    </script>
@endsection