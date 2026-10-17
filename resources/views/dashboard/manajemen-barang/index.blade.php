@extends('dashboard.layouts.app')

@section('title', 'Manajemen Barang - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER SECTION -->
        <div class="reveal revealed flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                    Manajemen Barang
                </h1>
                <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                    Kelola daftar inventaris barang JCC — pilih untuk melihat detail, atau tambah barang baru.
                </p>
            </div>
            <a href="{{ route('barang.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-merah-jcc text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 hover:bg-rose-700 transition-all shrink-0">
                <span class="material-symbols-outlined text-sm">add</span> Tambah Barang
            </a>
        </div>

        <!-- SEARCH -->
        <div class="reveal reveal-delay-1 relative max-w-md">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-charcoal/50 text-lg">search</span>
            <input type="text" id="room-search" placeholder="Cari nama barang..."
                class="w-full bg-white border border-charcoal/10 rounded-full pl-11 pr-5 py-2.5 text-xs text-charcoal placeholder-charcoal/50 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all shadow-sm" />
        </div>

        <!-- MASTER-DETAIL -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- GRID BARANG -->
            <div class="lg:col-span-7 relative min-h-[300px]">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="room-grid">
                @foreach ($barangs as $barang)
                    <div data-id="{{ $barang->id_barang }}" data-name="{{ $barang->nama_barang }}"
                        class="room-card group bg-cream-dark/40 border-2 border-transparent rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 shadow-sm hover:shadow-md">
                        <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                            <img src="{{ $barang->gambar_barang ? asset('storage/' . $barang->gambar_barang) : 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=600&auto=format&fit=crop' }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $barang->nama_barang }}">
                            <span class="absolute top-2.5 right-2.5 bg-emerald-500/90 text-broken-white px-2 py-0.5 rounded-full text-[10px] font-bold shadow-sm">
                                {{ $barang->is_active ? 'AKTIF' : 'NONAKTIF' }}
                            </span>
                        </div>
                        <h3 class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">{{ $barang->nama_barang }}</h3>
                        <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                            <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">category</span> {{ $barang->jenis_barang }}</span>
                        </div>
                        <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }} <span class="text-[11px] text-secondary font-normal">/hari</span></p>
                    </div>
                    @endforeach
                </div>

                {{-- No results --}}
                <div id="no-results" class="hidden absolute inset-0 flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 mx-auto rounded-full bg-cream-dark/50 text-charcoal/30 flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-4xl">search_off</span>
                    </div>
                    <h3 class="font-headline font-bold text-lg text-charcoal mb-1">Barang tidak ditemukan</h3>
                    <p class="text-sm text-secondary">Coba kata kunci lain atau periksa ejaan Anda.</p>
                </div>
            </div>

            <!-- PANEL DETAIL -->
            <div id="detail-panel" class="lg:col-span-5 sticky top-24 z-30">
                <div class="bg-white border border-charcoal/10 rounded-[32px] p-6 space-y-5 shadow-2xl relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-merah-jcc/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center justify-between pb-3 border-b border-charcoal/10">
                        <span class="text-[11px] font-bold tracking-widest text-merah-jcc uppercase">Detail Barang</span>
                        <span id="detail-status" class="bg-emerald-500/10 text-emerald-600 text-[10px] font-bold px-2.5 py-0.5 rounded-full">{{ $barangs->first()?->is_active ? 'AKTIF' : 'NONAKTIF' }}</span>
                    </div>

                    <div class="relative aspect-[16/10] rounded-[20px] overflow-hidden border border-charcoal/10 shadow-inner">
                        <img id="detail-img" src='{{ $barangs->first()?->gambar_barang ? asset('storage/' . $barangs->first()->gambar_barang) : '' }}'
                            class="w-full h-full object-cover transition-all duration-500" alt="Detail Barang">
                    </div>

                    <div>
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <h2 id="detail-title" class="font-headline text-xl font-bold text-charcoal">{{ $barangs->first()?->nama_barang ?? '-' }}</h2>
                        </div>
                        <p id="detail-desc" class="font-body text-secondary text-xs leading-relaxed">
                            {{ $barangs->first()?->deskripsi_barang ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-cream-dark/50 border border-charcoal/10 p-3 rounded-[16px] flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-merah-jcc/10 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">category</span>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[9px] uppercase font-bold text-secondary/60 tracking-wider">Jenis</p>
                                <p id="detail-area" class="font-headline font-bold text-xs text-charcoal truncate">{{ $barangs->first()?->jenis_barang ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-charcoal/10 flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-wider">HARGA SEWA</p>
                            <p id="detail-price" class="font-headline font-extrabold text-lg text-merah-jcc">Rp {{ number_format($barangs->first()?->harga_sewa ?? 0, 0, ',', '.') }}<span class="text-xs font-normal text-secondary/60">/hari</span></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="#" id="btn-edit-room" class="bg-cream-dark text-charcoal hover:bg-charcoal/10 px-5 py-3 rounded-full font-headline font-bold text-xs transition-colors">Edit</a>
                            <button type="button" 
                                    id="btn-delete-room"
                                    class="bg-merah-jcc hover:bg-rose-700 text-broken-white px-5 py-3 rounded-full font-headline font-bold text-xs transition-colors shadow-lg shadow-merah-jcc/25">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS -->
    <div id="delete-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div id="delete-backdrop" class="absolute inset-0 bg-charcoal/60 backdrop-blur-sm"></div>
        <div class="relative w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="px-6 sm:px-8 py-7 sm:py-8 text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-red-500/10 text-red-600 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">delete</span>
                </div>
                <h3 class="font-headline font-bold text-lg text-charcoal">Hapus Barang?</h3>
                <p class="mt-1.5 text-sm text-secondary leading-relaxed">Barang <strong id="delete-room-name">ini</strong>
                akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="grid grid-cols-2 gap-3 px-6 sm:px-8 pb-7 sm:pb-8">
                <button type="button" id="delete-cancel"
                    class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border border-charcoal/10 text-charcoal/60 hover:bg-charcoal/5 transition-colors">Batal</button>
                <form id="delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-red-600 text-white shadow-lg shadow-red-600/25 hover:bg-red-700 transition-colors">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast" class="fixed bottom-6 right-6 z-[110] hidden items-center gap-3 bg-charcoal text-broken-white px-5 py-3.5 rounded-full shadow-2xl">
        <span class="w-6 h-6 rounded-full bg-red-500/20 text-red-400 flex items-center justify-center">
            <span class="material-symbols-outlined text-sm">delete</span>
        </span>
        <span id="toast-text" class="font-headline font-bold text-xs">Barang dihapus</span>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', () => {
    const rooms = {
        @foreach($barangs as $barang)
            "{{ $barang->id_barang }}": {
                id: "{{ $barang->id_barang }}",
                status: "{{ $barang->is_active ? 'AKTIF' : 'NONAKTIF' }}",
                title: "{{ addslashes($barang->nama_barang) }}",
                desc: "{{ addslashes($barang->deskripsi_barang ?? 'Tidak ada deskripsi.') }}",
                img: "{{ $barang->gambar_barang ? asset('storage/' . $barang->gambar_barang) : 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=800&auto=format&fit=crop' }}",
                jenis: "{{ addslashes($barang->jenis_barang) }}",
                price: "{{ $barang->harga_sewa ?? 0 }}"
            },
        @endforeach
    };

    const cards = document.querySelectorAll('.room-card');
    const detailPanel = document.getElementById('detail-panel');
    const noResults = document.getElementById('no-results');
    const search = document.getElementById('room-search');
    const modal = document.getElementById('delete-modal');
    const modalName = document.getElementById('delete-room-name');
    const deleteForm = document.getElementById('delete-form');
    const deleteBtn = document.getElementById('btn-delete-room');
    const cancelBtn = document.getElementById('delete-cancel');
    const backdrop = document.getElementById('delete-backdrop');
    const btnEditRoom = document.getElementById('btn-edit-room');
    const editUrlBase = "{{ route('barang.edit', ':id') }}";

    const els = {
        status: document.getElementById('detail-status'),
        img: document.getElementById('detail-img'),
        title: document.getElementById('detail-title'),
        desc: document.getElementById('detail-desc'),
        area: document.getElementById('detail-area'),
        price: document.getElementById('detail-price')
    };

    if (cards.length === 0) {
        if (noResults) {
            noResults.querySelector('h3').textContent = 'Belum ada barang terdaftar';
            noResults.querySelector('p').textContent = 'Mulai dengan menambahkan barang baru.';
            noResults.classList.remove('hidden');
        }
        if (detailPanel) detailPanel.style.display = 'none';
        return;
    }

    const selectCard = (card) => {
        if (!card) return;
        const data = rooms[card.dataset.id];
        if (!data) return;

        cards.forEach(c => {
            c.classList.remove('border-merah-jcc', 'bg-surface-container-highest/60', 'active', 'shadow-sm');
            c.classList.add('border-transparent', 'bg-cream-dark/40');
        });
        card.classList.remove('border-transparent', 'bg-cream-dark/40');
        card.classList.add('border-merah-jcc', 'bg-surface-container-highest/60', 'active', 'shadow-sm');

        if (els.status) {
            els.status.textContent = data.status;
            els.status.className = `text-[10px] font-bold px-2.5 py-0.5 rounded-full ${data.status === 'AKTIF' ? 'bg-emerald-500/10 text-emerald-600' : 'bg-amber-500/10 text-amber-600'}`;
        }
        if (els.img) els.img.src = data.img;
        if (els.title) els.title.textContent = data.title;
        if (els.desc) els.desc.textContent = data.desc;
        if (els.area) els.area.textContent = data.jenis;
        if (els.price) els.price.textContent = 'Rp ' + Number(data.price).toLocaleString('id-ID');
        if (btnEditRoom) {
            btnEditRoom.href = editUrlBase.replace(':id', data.id);
        }
    };

    cards.forEach(card => card.addEventListener('click', () => selectCard(card)));
    selectCard(cards[0]);

    if (search) {
        search.addEventListener('input', () => {
            const q = search.value.toLowerCase().trim();
            let visible = 0;
            cards.forEach(card => {
                const match = card.dataset.name.toLowerCase().includes(q);
                card.style.display = match ? 'block' : 'none';
                if (match) visible++;
            });
            
            if (noResults) noResults.classList.toggle('hidden', visible > 0);
            if (detailPanel) detailPanel.style.display = visible > 0 ? 'block' : 'none';
            
            if (visible > 0) {
                const firstVisible = document.querySelector('.room-card:not([style*="none"])');
                selectCard(firstVisible);
            }
        });
    }

    const showToast = (msg) => {
        const t = document.getElementById('toast');
        if (!t) return;
        document.getElementById('toast-text').textContent = msg;
        t.classList.remove('hidden');
        t.classList.add('flex');
        setTimeout(() => {
            t.classList.add('hidden');
            t.classList.remove('flex');
        }, 2500);
    };

    if (deleteBtn) {
        deleteBtn.addEventListener('click', () => {
            const active = document.querySelector('.room-card.active');
            if (!active) {
                showToast('Pilih barang terlebih dahulu');
                return;
            }
            const id = active.dataset.id;
            deleteForm.action = `/dashboard/manajemen-barang/${id}`;
            modalName.textContent = active.dataset.name;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    }
});
</script>
@endsection