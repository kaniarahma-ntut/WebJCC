@php
    $editing = $editing ?? false;
    $user = $user ?? null;
    $nama = old('nama_user', $user->nama_user ?? '');
    $username = old('username', $user->username ?? '');
    $email = old('email', $user->email ?? '');
    $role = old('role_user', $user->role_user ?? 'user');
    $website = old('website', $user->website ?? '');
@endphp

<form method="POST" action="{{ $editing ? route('manajemen-pengguna.update', $user->id_user) : route('manajemen-pengguna.store') }}"
    class="bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm space-y-5">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    @if ($errors->any())
        <div class="bg-red-500/10 text-red-600 border border-red-500/20 rounded-2xl px-4 py-3 text-xs font-bold space-y-1">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Nama Lengkap</label>
            <input type="text" name="nama_user" value="{{ $nama }}" placeholder="cth. Rafi Ahmad"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Username</label>
            <input type="text" name="username" value="{{ $username }}" placeholder="cth. rafiahmad"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Email</label>
            <input type="email" name="email" value="{{ $email }}" placeholder="cth. rafi@mail.com"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Peran</label>
            <select name="role_user"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                <option value="user" {{ $role === 'user' ? 'selected' : '' }}>Anggota</option>
                <option value="creator" {{ $role === 'creator' ? 'selected' : '' }}>Creator</option>
                <option value="admin_JCC" {{ $role === 'admin_JCC' ? 'selected' : '' }}>Admin JCC</option>
                <option value="admin_Disporabudpar" {{ $role === 'admin_Disporabudpar' ? 'selected' : '' }}>Admin Disporabudpar</option>
            </select>
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Website (opsional)</label>
            <input type="url" name="website" value="{{ $website }}" placeholder="https://..."
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                Password <span class="text-charcoal/40 normal-case">{{ $editing ? '(kosongkan jika tidak diubah)' : '' }}</span>
            </label>
            <input type="password" name="password" placeholder="Minimal 6 karakter"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <a href="{{ route('manajemen-pengguna') }}"
            class="flex-1 md:flex-none text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-6 py-3 rounded-full font-headline font-bold text-xs transition-colors">Batal</a>
        <button type="submit"
            class="flex-1 md:flex-none bg-merah-jcc hover:bg-rose-700 text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
            {{ $editing ? 'Perbarui Pengguna' : 'Simpan Pengguna' }}
        </button>
    </div>
</form>