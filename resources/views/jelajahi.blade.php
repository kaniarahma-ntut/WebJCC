@extends('layouts.app')

@section('title', 'Jelajahi')

@section('content')
    <div class="pt-28 pb-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

        <!-- Title Section -->
        <div class="mb-6">
            <span class="text-merah-jcc font-bold text-xs tracking-widest uppercase block mb-1">Eksplorasi Fasilitas</span>
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                Temukan Ruang & Peralatan Kreatifmu
            </h1>
        </div>

        <!-- Search & Filter Bar -->
        <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 mb-8">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-md">
                <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-charcoal/50 text-lg">search</span>
                <input type="text" id="search-input" placeholder="Cari fasilitas, ruang meeting, atau alat..."
                    class="w-full bg-cream-dark/60 border border-charcoal/10 rounded-full pl-11 pr-5 py-2.5 text-xs text-charcoal placeholder-charcoal/50 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
            </div>

            <!-- Filter Pills -->
            <div class="flex items-center gap-2">
                <button data-filter="all"
                    class="filter-btn active bg-charcoal text-broken-white text-xs font-bold px-5 py-2 rounded-full shadow-sm transition-all">All</button>
                <button data-filter="room"
                    class="filter-btn bg-cream-dark text-charcoal hover:bg-charcoal/10 text-xs font-bold px-5 py-2 rounded-full transition-all">Room</button>
                <button data-filter="items"
                    class="filter-btn bg-cream-dark text-charcoal hover:bg-charcoal/10 text-xs font-bold px-5 py-2 rounded-full transition-all">Items</button>
            </div>
        </div>

        <!-- Main Layout (Master-Detail Grid View) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- LEFT COLUMN: Grid of Room Cards -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4" id="room-grid">
                @forelse ($ruangans as $ruangan)
                    <div data-id="{{ $ruangan->id_ruangan }}"
                        class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                        
                        <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                            <img src="{{ $ruangan->gambar_ruangan 
                                        ? asset('storage/' . $ruangan->gambar_ruangan) 
                                        : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop' }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $ruangan->nama_ruangan }}" />

                            {{-- Status badge --}}
                            <div class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                                <span class="material-symbols-outlined text-emerald-500 text-xs">check_circle</span>
                                Tersedia
                            </div>
                        </div>

                        <h3 class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                            {{ $ruangan->nama_ruangan }}
                        </h3>

                        <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">group</span>
                                {{ $ruangan->kapasitas_ruangan }} Orang
                            </span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">square_foot</span>
                                {{ $ruangan->luas_ruangan }} m²
                            </span>
                        </div>

                        <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">
                            Rp {{ number_format($ruangan->tarif_sewa_ruangan, 0, ',', '.') }}
                            <span class="text-[11px] text-secondary font-normal">/jam</span>
                        </p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-20 h-20 mx-auto rounded-full bg-cream-dark/50 text-charcoal/30 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-4xl">meeting_room</span>
                        </div>
                        <h3 class="font-headline font-bold text-lg text-charcoal mb-1">Belum ada ruangan tersedia</h3>
                        <p class="text-sm text-secondary">Silakan cek kembali nanti.</p>
                    </div>
                @endforelse
            </div>

            <!-- RIGHT COLUMN: Panel Detail -->
            <div class="lg:col-span-5 sticky top-28 z-30">
                <div class="bg-slate-700 text-broken-white rounded-[32px] p-6 space-y-5 shadow-2xl border border-white/10 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-merah-jcc/20 rounded-full blur-2xl pointer-events-none"></div>

                    <!-- Header -->
                    <div class="flex items-center justify-between pb-3 border-b border-white/10">
                        <span class="text-[11px] font-bold tracking-widest text-merah-jcc uppercase">Detail Ruangan</span>
                        <span class="bg-white/10 text-broken-white text-[10px] font-bold px-2.5 py-0.5 rounded-full">ROOM</span>
                    </div>

                    <!-- Image -->
                    <div class="relative aspect-[16/9] rounded-[20px] overflow-hidden border border-white/10 shadow-inner">
                        <img id="detail-img" 
                            src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover transition-all duration-500" alt="Detail Ruangan" />
                    </div>

                    <!-- Title & Desc -->
                    <div>
                        <h2 id="detail-title" class="font-headline text-xl font-bold text-broken-white">—</h2>
                        <p id="detail-desc" class="font-body text-broken-white/70 text-xs leading-relaxed mt-1 line-clamp-3">—</p>
                    </div>

                    <!-- Capacity & Area -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 border border-white/10 p-3 rounded-[16px] flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-merah-jcc/20 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">group</span>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[9px] uppercase font-bold text-broken-white/50 tracking-wider">Kapasitas</p>
                                <p id="detail-capacity" class="font-headline font-bold text-xs text-broken-white truncate">—</p>
                            </div>
                        </div>
                        <div class="bg-white/5 border border-white/10 p-3 rounded-[16px] flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-full bg-merah-jcc/20 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">square_foot</span>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[9px] uppercase font-bold text-broken-white/50 tracking-wider">Luas</p>
                                <p id="detail-area" class="font-headline font-bold text-xs text-broken-white truncate">—</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price & CTA -->
                    <div class="pt-3 border-t border-white/10 flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[9px] font-bold text-broken-white/50 uppercase tracking-wider">TARIF SEWA</p>
                            <p id="detail-price" class="font-headline font-extrabold text-lg text-merah-jcc">—</p>
                        </div>
                        <a id="btn-konfirmasi"
                        href="#"
                        class="bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white px-6 py-3 rounded-full font-bold text-xs tracking-wider shadow-lg hover:scale-105 transition-all text-center flex items-center gap-2">
                            Konfirmasi Booking
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript Interaktivitas Kartu & Sticky Confirm Detail -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Real data from database
        const rooms = {
            @foreach($ruangans as $ruangan)
                "{{ $ruangan->id_ruangan }}": {
                    id: "{{ $ruangan->id_ruangan }}",
                    title: "{{ addslashes($ruangan->nama_ruangan) }}",
                    desc: "{{ addslashes($ruangan->deskripsi_ruangan ?? 'Tidak ada deskripsi.') }}",
                    img: "{{ $ruangan->gambar_ruangan 
                            ? asset('storage/' . $ruangan->gambar_ruangan) 
                            : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop' }}",
                    capacity: "{{ $ruangan->kapasitas_ruangan }} Orang",
                    area: "{{ $ruangan->luas_ruangan }} m²",
                    location: "{{ addslashes($ruangan->lokasi_ruangan) }}",
                    price: "{{ $ruangan->tarif_sewa_ruangan }}"
                },
            @endforeach
        };

        const roomCards = document.querySelectorAll('.room-card');
        const detailImg = document.getElementById('detail-img');
        const detailTitle = document.getElementById('detail-title');
        const detailDesc = document.getElementById('detail-desc');
        const detailCapacity = document.getElementById('detail-capacity');
        const detailArea = document.getElementById('detail-area');
        const detailPrice = document.getElementById('detail-price');
        const btnKonfirmasi = document.getElementById('btn-konfirmasi');

        // URL template for booking
        const bookingUrlBase = "{{ route('konfirmasi', ':id') }}";

        // === SELECT ROOM CARD ===
        const selectCard = (card) => {
            if (!card) return;
            const data = rooms[card.dataset.id];
            if (!data) return;

            roomCards.forEach(c => {
                c.classList.remove('border-merah-jcc', 'bg-surface-container-highest/60', 'active', 'shadow-sm');
                c.classList.add('border-transparent', 'bg-cream-dark/40');
            });
            card.classList.remove('border-transparent', 'bg-cream-dark/40');
            card.classList.add('border-merah-jcc', 'bg-surface-container-highest/60', 'active', 'shadow-sm');

            detailImg.src = data.img;
            detailTitle.textContent = data.title;
            detailDesc.textContent = data.desc;
            detailCapacity.textContent = data.capacity;
            detailArea.textContent = data.area;
            detailPrice.innerHTML = 'Rp ' + Number(data.price).toLocaleString('id-ID') 
                                + '<span class="text-xs font-normal text-broken-white/60">/jam</span>';

            // Update Konfirmasi button link
            if (btnKonfirmasi) {
                btnKonfirmasi.href = bookingUrlBase.replace(':id', data.id);
            }
        };

        roomCards.forEach(card => {
            card.addEventListener('click', () => selectCard(card));
        });

        // Auto-select first room
        if (roomCards.length > 0) {
            selectCard(roomCards[0]);
        }
    });
    </script>
@endsection
