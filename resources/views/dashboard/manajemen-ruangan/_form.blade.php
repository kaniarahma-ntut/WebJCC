@php
    $editing = $editing ?? false;
    $room = $room ?? [
        'nama' => 'Ruang Kolaborasi A',
        'lokasi' => 'Gedung Utama, Lantai 1',
        'kapasitas_min' => '8',
        'kapasitas_max' => '12',
        'luas' => '24',
        'tarif' => '150000',
        'satuan' => '/jam',
        'deskripsi' =>
            'Ruang kerja komunal yang dirancang untuk mendukung produktivitas dan kolaborasi spontan. Dilengkapi dengan pencahayaan alami yang optimal.',
        'fasilitas' => 'WiFi 100Mbps, Smart TV 55", Coffee, Whiteboard',
        'status' => 'aktif',
        'gambar' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop',
    ];
@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

    <!-- FORM KIRI -->
    <div class="reveal revealed space-y-5">
        <div class="bg-white border border-charcoal/10 rounded-[24px] p-6 shadow-sm">
            <h2 class="font-headline font-bold text-sm text-charcoal mb-4">Informasi Dasar</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Nama
                        Ruangan</label>
                    <input type="text" value="{{ $room['nama'] }}" placeholder="cth. Ruang Kolaborasi B"
                        class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                </div>
                <div>
                    <label
                        class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Lokasi</label>
                    <input type="text" value="{{ $room['lokasi'] }}" placeholder="Gedung, Lantai"
                        class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label
                            class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Kapasitas
                            Min</label>
                        <input type="number" value="{{ $room['kapasitas_min'] }}" placeholder="8"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Kapasitas
                            Max</label>
                        <input type="number" value="{{ $room['kapasitas_max'] }}" placeholder="12"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Luas
                            (m²)</label>
                        <input type="number" value="{{ $room['luas'] }}" placeholder="24"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Status</label>
                        <select
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                            <option value="aktif" {{ $room['status'] === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ $room['status'] === 'nonaktif' ? 'selected' : '' }}>Nonaktif
                            </option>
                        </select>
                    </div>
                </div>
                <div>
                    <label
                        class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Deskripsi</label>
                    <textarea rows="4" placeholder="Deskripsi singkat ruangan..."
                        class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all resize-none">{{ $room['deskripsi'] }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-white border border-charcoal/10 rounded-[24px] p-6 shadow-sm">
            <h2 class="font-headline font-bold text-sm text-charcoal mb-4">Tarif & Fasilitas</h2>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Tarif
                            Sewa (Rp)</label>
                        <input type="number" value="{{ $room['tarif'] }}" placeholder="150000"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Satuan</label>
                        <select
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                            <option value="/jam" {{ $room['satuan'] === '/jam' ? 'selected' : '' }}>/ Jam</option>
                            <option value="/hari" {{ $room['satuan'] === '/hari' ? 'selected' : '' }}>/ Hari</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Fasilitas
                        (pisah dengan koma)</label>
                    <input type="text" value="{{ $room['fasilitas'] }}" placeholder="WiFi, AC, Proyektor, ..."
                        class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                        Gambar</label>
                    <input type="file" value="{{ $room['gambar'] }}"
                        class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                </div>
            </div>
        </div>
    </div>

    <!-- PREVIEW KANAN -->
    <div class="lg:sticky lg:top-24 space-y-4">
        <div class="bg-white border border-charcoal/10 rounded-[32px] p-5 shadow-lg">
            <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-3">Pratinjau</p>
            <div class="relative aspect-[16/9] rounded-[20px] overflow-hidden border border-charcoal/10">
                <img src="{{ $room['gambar'] }}" class="w-full h-full object-cover" alt="Pratinjau Ruangan">
                <span
                    class="absolute top-3 right-3 bg-emerald-500/90 text-broken-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm">AKTIF</span>
            </div>
            <h3 class="font-headline font-bold text-lg text-charcoal mt-3">{{ $room['nama'] }}</h3>
            <p class="font-body text-xs text-secondary leading-relaxed mt-1">{{ $room['deskripsi'] }}</p>
            <div class="flex flex-wrap gap-1.5 mt-3">
                @foreach (explode(',', $room['fasilitas']) as $f)
                    <span
                        class="bg-cream-dark/60 text-charcoal/80 text-[11px] px-3 py-1 rounded-full">{{ trim($f) }}</span>
                @endforeach
            </div>
            <p class="font-headline font-extrabold text-merah-jcc text-lg mt-4">Rp
                {{ number_format((int) $room['tarif'], 0, ',', '.') }}<span
                    class="text-xs font-normal text-secondary/60">{{ $room['satuan'] }}</span></p>
        </div>

        <div class="flex items-center gap-3">
            <a href="/dashboard/manajemen-ruangan"
                class="flex-1 text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-5 py-3 rounded-full font-headline font-bold text-xs transition-colors">Batal</a>
            <button type="button"
                onclick="showToast('{{ $editing ? 'Ruangan berhasil diperbarui' : 'Ruangan berhasil ditambahkan' }}')"
                class="flex-1 bg-merah-jcc hover:bg-rose-700 text-broken-white px-5 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
                {{ $editing ? 'Perbarui Ruangan' : 'Simpan Ruangan' }}
            </button>
        </div>
    </div>
</div>
