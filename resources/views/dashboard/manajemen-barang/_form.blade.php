@if ($errors->any())
    <div class="bg-red-100 text-red-500 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $editing = $editing ?? false;
    $barang = $barang ?? new \App\Models\Barang();
@endphp

<form method="POST"
      action="{{ $editing
            ? route('barang.update', $barang->id_barang)
            : route('barang.store') }}"
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

                    <!-- Nama Barang -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Nama Barang
                        </label>
                        <input type="text" name="nama_barang" id="input-nama"
                            value="{{ old('nama_barang', $barang->nama_barang) }}"
                            placeholder="cth. Canon EOS 5D Mark IV"
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                        @error('nama_barang') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Jenis & Status -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Jenis Barang
                            </label>
                            <input type="text" name="jenis_barang" id="input-jenis"
                                value="{{ old('jenis_barang', $barang->jenis_barang) }}"
                                placeholder="cth. Kamera / Speaker"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('jenis_barang') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Status
                            </label>
                            <select name="is_active" id="input-status"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                                <option value="1" @selected(old('is_active', $barang->is_active) == 1)>Aktif</option>
                                <option value="0" @selected(old('is_active', $barang->is_active) === 0 || old('is_active', $barang->is_active) === '0')>Nonaktif</option>
                            </select>
                            @error('is_active') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Harga & Keywords -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Harga Sewa (Rp)
                            </label>
                            <input type="number" name="harga_sewa" id="input-harga"
                                value="{{ old('harga_sewa', $barang->harga_sewa) }}"
                                placeholder="120000"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('harga_sewa') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                                Kata Kunci Pencarian
                            </label>
                            <input type="text" name="keywords_barang" id="input-keywords"
                                value="{{ old('keywords_barang', $barang->keywords_barang) }}"
                                placeholder="kamera, lensa, video"
                                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                            @error('keywords_barang') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi_barang" id="input-deskripsi" rows="4"
                            placeholder="Deskripsi singkat barang..."
                            class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all resize-none">{{ old('deskripsi_barang', $barang->deskripsi_barang) }}</textarea>
                        @error('deskripsi_barang') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="bg-white border border-charcoal/10 rounded-[24px] p-6 shadow-sm">
                <h2 class="font-headline font-bold text-sm text-charcoal mb-4">Gambar Barang</h2>
                <input type="file" name="gambar_barang" id="input-gambar" accept="image/*"
                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                @error('gambar_barang') <p class="text-red-500 text-[10px] mt-1">{{ $message }}</p> @enderror
                @if ($editing && $barang->gambar_barang)
                    <p class="text-[10px] text-secondary mt-1.5">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                @endif
            </div>
        </div>

        <!-- PREVIEW KANAN -->
        <div class="lg:sticky lg:top-24 space-y-4">
            <div class="bg-white border border-charcoal/10 rounded-[32px] p-5 shadow-lg">
                <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-3">Pratinjau</p>

                <div class="relative aspect-[16/10] rounded-[20px] overflow-hidden border border-charcoal/10 bg-cream-dark/30">
                    <img id="preview-img" src="{{ $barang->gambar_barang
                                ? asset('storage/' . $barang->gambar_barang)
                                : 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=800&auto=format&fit=crop' }}"
                         class="w-full h-full object-cover" alt="Pratinjau Barang">
                    <span id="preview-status" class="absolute top-3 right-3 {{ $barang->is_active ? 'bg-emerald-500/90' : 'bg-amber-500/90' }} text-broken-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                        {{ $barang->is_active ? 'AKTIF' : 'NONAKTIF' }}
                    </span>
                </div>

                <h3 id="preview-title" class="font-headline font-bold text-lg text-charcoal mt-3">
                    {{ $barang->nama_barang ?? 'Nama Barang' }}
                </h3>

                <p id="preview-jenis" class="text-xs text-secondary mt-1">
                    {{ $barang->jenis_barang ?? 'Jenis' }}
                </p>

                <p id="preview-deskripsi" class="font-body text-xs text-secondary leading-relaxed mt-2">
                    {{ $barang->deskripsi_barang ?? 'Deskripsi barang akan muncul di sini.' }}
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('barang.index') }}"
                   class="flex-1 text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-5 py-3 rounded-full font-headline font-bold text-xs transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 bg-merah-jcc hover:bg-rose-700 text-broken-white px-5 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
                    {{ $editing ? 'Perbarui Barang' : 'Simpan Barang' }}
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

        attachListener('input-nama', 'preview-title', 'Nama Barang');
        attachListener('input-deskripsi', 'preview-deskripsi', 'Deskripsi barang akan muncul di sini.');
        attachListener('input-jenis', 'preview-jenis', 'Jenis');

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