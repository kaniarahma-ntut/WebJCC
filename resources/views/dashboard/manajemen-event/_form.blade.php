@if ($errors->any())
    <div class="bg-red-500/10 text-red-600 border border-red-500/20 rounded-2xl px-4 py-3 text-xs font-bold space-y-1">
        @foreach ($errors->all() as $e)
            <p>{{ $e }}</p>
        @endforeach
    </div>
@endif

<form method="POST" id="event-form"
    action="{{ $event ? route('manajemen-event.update', $event['id']) : route('manajemen-event.store') }}"
    class="bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm space-y-5">
    @csrf
    @if ($event)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Nama Event</label>
            <input type="text" name="judul" value="{{ old('judul', $event['judul'] ?? '') }}"
                placeholder="Cth: Masterclass UI/UX"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Kategori</label>
            <select name="kategori"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                @foreach (['Workshop', 'Pameran', 'Networking', 'Talkshow', 'Kompetisi'] as $k)
                    <option value="{{ $k }}" @selected(($event['kategori'] ?? old('kategori')) === $k)>{{ $k }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Tanggal</label>
            <input type="date" name="tanggal"
                value="{{ old('tanggal', $event['tanggal'] ?? now()->format('Y-m-d')) }}"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Jam Mulai</label>
            <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $event['jam_mulai'] ?? '09:00') }}"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Jam
                Selesai</label>
            <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $event['jam_selesai'] ?? '17:00') }}"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $event['lokasi'] ?? '') }}"
                placeholder="Cth: Main Auditorium"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Harga
                Tiket</label>
            <input type="text" name="harga" value="{{ old('harga', $event['harga'] ?? 'Gratis') }}"
                placeholder="Gratis / Rp 50.000"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Gambar</label>
            <input type="file" name="gambar" value="{{ old('gambar', $event['gambar'] ?? '') }}"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>

        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Deskripsi</label>
            <textarea name="deskripsi" rows="5" placeholder="Deskripsi singkat event..."
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">{{ old('deskripsi', $event['deskripsi'] ?? '') }}</textarea>
        </div>
    </div>
</form>

<div
    class="mt-5 bg-white border border-charcoal/10 rounded-3xl p-5 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
    <p class="font-headline font-bold text-xs text-charcoal/70 flex items-center gap-1.5">
        <span class="material-symbols-outlined text-sm">save</span> Siap mempublikasikan event ini?
    </p>
    <div class="flex items-center gap-3 w-full sm:w-auto">
        <a href="{{ route('manajemen-event') }}"
            class="flex-1 sm:flex-none text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-6 py-3 rounded-full font-headline font-bold text-xs transition-colors">Batal</a>
        <button type="submit" form="event-form"
            class="flex-1 sm:flex-none bg-merah-jcc hover:bg-rose-700 text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">{{ $event ? 'Perbarui Event' : 'Simpan Event' }}</button>
    </div>
</div>
