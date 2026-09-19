@php
    $editing = $editing ?? false;
    $artikel = $artikel ?? null;
    $judul = old('judul', $artikel['judul'] ?? '');
    $kategori = old('kategori', $artikel['kategori'] ?? 'Inovasi');
    $penulis = old('penulis', $artikel['penulis'] ?? '');
    $tanggal = old('tanggal', $artikel['tanggal'] ?? now()->format('Y-m-d'));
    $gambar = old('gambar', $artikel['gambar'] ?? '');
    $isi = old('isi', $artikel['isi'] ?? '');
@endphp

<form method="POST" id="artikel-form" enctype="multipart/form-data"
    action="{{ $editing ? route('manajemen-artikel.update', $artikel['id']) : route('manajemen-artikel.store') }}"
    class="bg-white h-[720px] border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm space-y-5"
    onsubmit="document.getElementById('isi-input').value = document.getElementById('editor-container').querySelector('.ql-editor').innerHTML;">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    @if ($errors->any())
        <div
            class="bg-red-500/10 text-red-600 border border-red-500/20 rounded-2xl px-4 py-3 text-xs font-bold space-y-1">
            @foreach ($errors->all() as $e)
                <p>{{ $e }}</p>
            @endforeach
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Judul
                Artikel</label>
            <input type="text" name="judul" value="{{ $judul }}" placeholder="Judul artikel..."
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Kategori</label>
            <select name="kategori"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all">
                @foreach (['Inovasi', 'Desain', 'Teknologi', 'Komunitas', 'Event'] as $k)
                    <option value="{{ $k }}" {{ $kategori === $k ? 'selected' : '' }}>{{ $k }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Penulis</label>
            <input type="text" name="penulis" value="{{ $penulis }}" placeholder="Nama penulis"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div>
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Tanggal
                Terbit</label>
            <input type="date" name="tanggal" value="{{ $tanggal }}"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Gambar
                Sampul</label>
            <input type="file" name="gambar" value="{{ $gambar }}" placeholder="Gambar"
                class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2.5 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
        </div>
        <div class="md:col-span-2">
            <label class="block text-[10px] font-bold uppercase tracking-widest text-secondary mb-1.5">Isi
                Artikel</label>
            <div id="editor-container" class="min-h-[160px] bg-white border border-charcoal/10 rounded-xl"></div>
            <textarea id="isi-input" name="isi" hidden>{{ $isi }}</textarea>
        </div>
    </div>
</form>

<!-- CARD AKSI (terpisah di bawah form) -->
<div
    class="mt-5 bg-white border border-charcoal/10 rounded-3xl p-5 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
    <p class="font-headline font-bold text-xs text-charcoal/70 flex items-center gap-1.5">
        <span class="material-symbols-outlined text-sm">save</span>
        Siap menyimpan artikel ini?
    </p>
    <div class="flex items-center gap-3 w-full sm:w-auto">
        <a href="{{ route('manajemen-artikel') }}"
            class="flex-1 sm:flex-none text-center bg-cream-dark text-charcoal hover:bg-charcoal/10 px-6 py-3 rounded-full font-headline font-bold text-xs transition-colors">Batal</a>
        <button type="submit" form="artikel-form"
            class="flex-1 sm:flex-none bg-merah-jcc hover:bg-rose-700 text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">
            {{ $editing ? 'Perbarui Artikel' : 'Simpan Artikel' }}
        </button>
    </div>
</div>

<style>
    #editor-container .ql-toolbar {
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-bottom: 1px solid rgba(45, 45, 45, 0.1);
        position: relative;
        z-index: 5;
    }

    #editor-container .ql-container {
        border: 0;
        font-family: "Hanken Grotesk", sans-serif;
        font-size: 13px;
    }

    #editor-container .ql-editor {
        min-height: 180px;
        max-height: 320px;
        overflow-y: auto;
    }
</style>

<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" />
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('editor-container');
        const input = document.getElementById('isi-input');
        if (!container) return;
        const editor = new Quill(container, {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'header': [1, 2, 3, false]
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['blockquote', 'link', 'image'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['clean']
                ]
            }
        });
        if (input.value) editor.root.innerHTML = input.value;
    });
</script>
