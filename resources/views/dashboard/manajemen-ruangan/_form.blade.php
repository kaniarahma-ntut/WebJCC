@php
    $editing = $editing ?? false;
    $ruangan = $ruangan ?? new \App\Models\Ruangan();
@endphp

<form method="POST"
      action="{{ $editing
            ? route('ruangan.update', $ruangan->id_ruangan)
            : route('ruangan.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">

        <!-- FORM KIRI -->
        <div class="reveal revealed space-y-5">
            <div class="bg-white border border-charcoal/10 rounded-[24px] p-6 shadow-sm">
                <h2 class="font-headline font-bold text-sm text-charcoal mb-4">Informasi Dasar</h2>
                <div class="space-y-4">

                    <!-- Nama Ruangan -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Nama Ruangan
                        </label>
                        <input type="text" name="nama_ruangan" id="input-nama"
                            value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                            placeholder="cth. Ruang Kolaborasi B"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                        @error('nama_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>


                    <!-- Lokasi -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Lokasi
                        </label>
                        <input type="text" name="lokasi_ruangan" id="input-lokasi"
                            value="{{ old('lokasi_ruangan', $ruangan->lokasi_ruangan) }}"
                            placeholder="Gedung, Lantai"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                        @error('lokasi_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Kapasitas, Luas & Status -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Kapasitas
                            </label>
                            <input type="number" name="kapasitas_ruangan" id="input-kapasitas"
                                value="{{ old('kapasitas_ruangan', $ruangan->kapasitas_ruangan) }}"
                                placeholder="12"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('kapasitas_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Luas (m²)
                            </label>
                            <input type="number" name="luas_ruangan" id="input-luas"
                                value="{{ old('luas_ruangan', $ruangan->luas_ruangan) }}"
                                placeholder="24"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('luas_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Status
                            </label>
                            <select name="is_active" id="input-status"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                                <option value="1" @selected(old('is_active', $ruangan->is_active) == 1)>Aktif</option>
                                <option value="0" @selected(old('is_active', $ruangan->is_active) === 0 || old('is_active', $ruangan->is_active) === '0')>Nonaktif</option>
                            </select>
                            @error('is_active') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Tarif -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Tarif Sewa (Rp)
                        </label>
                        <input type="number" name="tarif_sewa_ruangan" id="input-tarif"
                            value="{{ old('tarif_sewa_ruangan', $ruangan->tarif_sewa_ruangan) }}"
                            placeholder="150000"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                        @error('tarif_sewa_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi_ruangan" id="input-deskripsi" rows="4"
                            placeholder="Deskripsi singkat ruangan..."
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all resize-none">{{ old('deskripsi_ruangan', $ruangan->deskripsi_ruangan) }}</textarea>
                        @error('deskripsi_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="bg-white border border-charcoal/10 rounded-[24px] p-6 shadow-sm">
                <h2 class="font-headline font-bold text-sm text-charcoal mb-4">Gambar Ruangan</h2>
                <input type="file" name="gambar_ruangan" id="input-gambar" accept="image/*"
                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                @error('gambar_ruangan') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                @if ($editing && $ruangan->gambar_ruangan)
                    <p class="text-[10px] text-secondary mt-1.5">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                @endif
            </div>
        </div>

        <!-- PREVIEW KANAN -->
        <div class="lg:sticky lg:top-24 space-y-4">
            <div class="bg-white border border-charcoal/10 rounded-[32px] p-5 shadow-lg">
                <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-3">Pratinjau</p>

                <div class="relative aspect-[16/9] rounded-[20px] overflow-hidden border border-charcoal/10 bg-cream-dark/30">
                    <img id="preview-img" src="{{ $ruangan->gambar_ruangan
                                ? asset('storage/' . $ruangan->gambar_ruangan)
                                : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop' }}"
                         class="w-full h-full object-cover" alt="Pratinjau Ruangan">
                    <span id="preview-status" class="absolute top-3 right-3 {{ $ruangan->is_active ? 'bg-emerald-500/90' : 'bg-amber-500/90' }} text-broken-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                        {{ $ruangan->is_active ? 'AKTIF' : 'NONAKTIF' }}
                    </span>
                </div>

                <h3 id="preview-title" class="font-headline font-bold text-lg text-charcoal mt-3">
                    {{ $ruangan->nama_ruangan ?? 'Nama Ruangan' }}
                </h3>


                <p id="preview-deskripsi" class="font-body text-xs text-secondary leading-relaxed mt-1.5">
                    {{ $ruangan->deskripsi_ruangan ?? 'Deskripsi ruangan akan muncul di sini.' }}
                </p>

                <div class="flex flex-wrap items-center gap-3 text-[11px] text-secondary mt-3">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">group</span>
                        <span id="preview-kapasitas">{{ $ruangan->kapasitas_ruangan ?? '—' }}</span> Orang
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">square_foot</span>
                        <span id="preview-luas">{{ $ruangan->luas_ruangan ?? '—' }}</span> m²
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">location_on</span>
                        <span id="preview-lokasi">{{ $ruangan->lokasi_ruangan ?? '—' }}</span>
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('ruangan.index') }}"
                   class="flex-1 text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-5 py-3 rounded-full font-headline font-bold text-xs transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 bg-merah-jcc hover:bg-rose-700 text-broken-white px-5 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
                    {{ $editing ? 'Perbarui Ruangan' : 'Simpan Ruangan' }}
                </button>
            </div>
        </div>
    </div>
</form>

<!-- SCRIPT LIVE PREVIEW -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const attachListener = (idInput, idPreview, defaultText) => {
            const input = document.getElementById(idInput);
            const preview = document.getElementById(idPreview);
            if (input && preview) {
                input.addEventListener('input', (e) => {
                    preview.textContent = e.target.value || defaultText;
                });
            }
        };

        attachListener('input-nama', 'preview-title', 'Nama Ruangan');
        attachListener('input-deskripsi', 'preview-deskripsi', 'Deskripsi ruangan akan muncul di sini.');
        attachListener('input-kapasitas', 'preview-kapasitas', '—');
        attachListener('input-luas', 'preview-luas', '—');
        attachListener('input-lokasi', 'preview-lokasi', '—');

        const inputStatus = document.getElementById('input-status');
        const previewStatus = document.getElementById('preview-status');
        if (inputStatus && previewStatus) {
            inputStatus.addEventListener('change', (e) => {
                if (e.target.value === '1') {
                    previewStatus.textContent = 'AKTIF';
                    previewStatus.className = 'absolute top-3 right-3 bg-emerald-500/90 text-broken-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm';
                } else {
                    previewStatus.textContent = 'NONAKTIF';
                    previewStatus.className = 'absolute top-3 right-3 bg-amber-500/90 text-broken-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm';
                }
            });
        }

        const inputGambar = document.getElementById('input-gambar');
        const previewImg = document.getElementById('preview-img');
        if (inputGambar && previewImg) {
            inputGambar.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    previewImg.src = URL.createObjectURL(file);
                }
            });
        }
    });
</script>