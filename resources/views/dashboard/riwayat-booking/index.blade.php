@extends('dashboard.layouts.app')

@section('title', 'Riwayat Booking - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER -->
        <div class="reveal revealed">
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                Pesanan Saya
            </h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                Kelola reservasi ruang kerja Anda, lacak status, dan akses tiket digital Anda.
            </p>
        </div>

        <!-- FILTER CHIPS (functionality TBD) -->
        <div class="reveal reveal-delay-1 flex items-center gap-3 overflow-x-auto no-scrollbar pb-2 -mx-4 px-4 md:mx-0 md:px-0">
            <button data-filter="all" class="filter-chip active bg-charcoal text-broken-white px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0 shadow-md">
                Semua
            </button>
            <button data-filter="pending" class="filter-chip bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Menunggu
            </button>
            <button data-filter="approved" class="filter-chip bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Disetujui
            </button>
            <button data-filter="declined" class="filter-chip bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Ditolak
            </button>
        </div>

        <!-- ADMIN ONLY: Filter Pemesan -->
        @if(in_array(auth()->user()->admin_role, ['admin_JCC', 'admin_Disporabudpar']))
            <div class="reveal reveal-delay-1 flex items-center gap-3 overflow-x-auto no-scrollbar pb-2 -mx-4 px-4 md:mx-0 md:px-0">
                <!-- <span class="text-[10px] font-bold text-charcoal/40 uppercase tracking-widest shrink-0 mr-2">Tampilkan:</span> -->
                <button data-owner="all" class="owner-chip active bg-charcoal text-broken-white px-4 py-2 rounded-full font-headline font-bold text-xs shrink-0 shadow-md">
                    Semua Pemesan
                </button>
                <button data-owner="me" class="owner-chip bg-white border border-charcoal/10 text-charcoal hover:bg-charcoal/5 transition-colors px-4 py-2 rounded-full font-headline font-bold text-xs shrink-0">
                    Milik Saya Sendiri
                </button>
                <button data-owner="users" class="owner-chip bg-white border border-charcoal/10 text-charcoal hover:bg-charcoal/5 transition-colors px-4 py-2 rounded-full font-headline font-bold text-xs shrink-0">
                    Milik Pengguna Lain
                </button>
            </div>
        @endif

        <!-- BOOKING CARDS GRID -->
        @if ($bookings->isEmpty())
            <div class="text-center py-20">
                <div class="w-24 h-24 mx-auto rounded-full bg-cream-dark/50 text-charcoal/30 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-5xl">event_busy</span>
                </div>
                <h3 class="font-headline font-bold text-xl text-charcoal mb-1">Belum ada booking</h3>
                <p class="text-sm text-secondary mb-6">Mulai jelajahi ruangan dan buat reservasi pertama Anda.</p>
                <a href="{{ route('jelajahi') }}"
                   class="inline-flex items-center gap-2 bg-merah-jcc text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 hover:bg-rose-700 transition-all">
                    <span class="material-symbols-outlined text-sm">explore</span>
                    Jelajahi Ruangan
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6" id="booking-grid">
                @foreach ($bookings as $booking)
                    @php
                        // Map status to UI
                        $statusMap = [
                            'pending'  => ['label' => 'Menunggu',  'color' => 'amber',   'bg' => 'bg-amber-500'],
                            'approved' => ['label' => 'Disetujui', 'color' => 'emerald', 'bg' => 'bg-emerald-500'],
                            'declined' => ['label' => 'Ditolak',   'color' => 'red',     'bg' => 'bg-red-500'],
                        ];
                        $status = $statusMap[$booking->status_peminjaman] ?? ['label' => 'Unknown', 'color' => 'gray', 'bg' => 'bg-gray-500'];

                        $roomImage = $booking->ruangan?->gambar_ruangan
                            ? asset('storage/' . $booking->ruangan->gambar_ruangan)
                            : 'https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=600&auto=format&fit=crop';
                    @endphp

                    <div data-status="{{ $booking->status_peminjaman }}"
                        data-owner-id="{{ $booking->user_id_user }}" class="booking-card reveal bg-white border border-charcoal/5 rounded-[32px] p-3 sm:p-4 shadow-sm flex flex-col sm:flex-row gap-4 sm:gap-5 group relative overflow-hidden">

                        <!-- Image & Badge -->
                        <div class="relative w-full sm:w-44 h-48 sm:h-44 shrink-0 rounded-[24px] overflow-hidden bg-charcoal/5">
                            <img src="{{ $roomImage }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                 alt="{{ $booking->ruangan?->nama_ruangan ?? 'Ruangan' }}">

                            <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full {{ $status['bg'] }} {{ $booking->status_peminjaman === 'pending' ? 'animate-pulse' : '' }}"></span>
                                <span class="text-[10px] font-bold text-charcoal uppercase tracking-wider">
                                    {{ $status['label'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 flex flex-col justify-between py-1">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="font-headline font-extrabold text-xl text-charcoal">
                                        {{ $booking->ruangan?->nama_ruangan ?? 'Ruangan tidak ditemukan' }}
                                    </h3>
                                    
                                    {{-- Show the user's name if the currently logged-in user is an admin --}}
                                    @if(in_array(auth()->user()->admin_role, ['admin_JCC', 'admin_Disporabudpar']))
                                        <p class="text-[11px] font-bold text-merah-jcc mt-1 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">person</span>
                                            Pemesan: {{ $booking->user->nama_user ?? 'Unknown' }}
                                        </p>
                                    @endif

                                    <p class="flex items-center gap-1 text-xs text-secondary mt-1">
                                        <span class="material-symbols-outlined text-[14px]">location_on</span>
                                        {{ $booking->ruangan?->lokasi_ruangan ?? '-' }}
                                    </p>
                                    @if ($booking->nama_event)
                                        <p class="text-xs text-secondary mt-1.5 italic">
                                            "{{ $booking->nama_event }}"
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mt-5 sm:mt-0 pb-2">
                                <div>
                                    <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Tanggal</p>
                                    <p class="text-sm font-headline font-bold text-charcoal">
                                        {{ $booking->start_time?->format('d M Y') ?? '-' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Waktu</p>
                                    <p class="text-sm font-headline font-bold text-charcoal">
                                        {{ $booking->start_time?->format('H:i') ?? '-' }} - {{ $booking->end_time?->format('H:i') ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            {{-- CTA Button depends on status --}}
                            @if ($booking->status_peminjaman === 'approved')
                                <a href="{{ route('riwayat-booking.detail', $booking->id_peminjaman_ruangan) }}"
                                   class="mt-4 w-full bg-charcoal text-broken-white py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-charcoal/80 transition-colors shadow-md">
                                    <span class="material-symbols-outlined text-[16px]">qr_code_scanner</span>
                                    Lihat Tiket
                                </a>
                            @elseif ($booking->status_peminjaman === 'pending')
                                <a href="{{ route('riwayat-booking.detail', $booking->id_peminjaman_ruangan) }}"
                                   class="mt-4 w-full border border-charcoal/20 text-charcoal py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-charcoal/5 transition-colors">
                                    Lacak Status
                                </a>
                            @else
                                <a href="{{ route('riwayat-booking.detail', $booking->id_peminjaman_ruangan) }}"
                                   class="mt-4 w-full bg-merah-jcc/10 text-merah-jcc py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-merah-jcc/20 transition-colors">
                                    Lihat Detail
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    {{-- Filter functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusChips = document.querySelectorAll('.filter-chip');
            const ownerChips = document.querySelectorAll('.owner-chip');
            const cards = document.querySelectorAll('.booking-card');
            
            const currentUserId = "{{ auth()->id() }}";
            let activeStatus = 'all';
            let activeOwner = 'all';

            function applyFilters() {
                cards.forEach(card => {
                    const statusMatch = (activeStatus === 'all' || card.dataset.status === activeStatus);
                    
                    let ownerMatch = true;
                    if (activeOwner === 'me') {
                        ownerMatch = (card.dataset.ownerId === currentUserId);
                    } else if (activeOwner === 'users') {
                        ownerMatch = (card.dataset.ownerId !== currentUserId);
                    }

                    if (statusMatch && ownerMatch) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Status Filter Listeners
            statusChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    activeStatus = chip.dataset.filter;
                    
                    statusChips.forEach(c => {
                        c.classList.remove('active', 'bg-charcoal', 'text-broken-white', 'shadow-md');
                        c.classList.add('bg-merah-jcc/10', 'text-merah-jcc');
                    });
                    chip.classList.add('active', 'bg-charcoal', 'text-broken-white', 'shadow-md');
                    chip.classList.remove('bg-merah-jcc/10', 'text-merah-jcc');
                    
                    applyFilters();
                });
            });

            // Owner Filter Listeners (Admins only)
            ownerChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    activeOwner = chip.dataset.owner;
                    
                    ownerChips.forEach(c => {
                        c.classList.remove('active', 'bg-charcoal', 'text-broken-white', 'shadow-md');
                        c.classList.add('bg-white', 'border', 'border-charcoal/10', 'text-charcoal', 'hover:bg-charcoal/5');
                    });
                    chip.classList.add('active', 'bg-charcoal', 'text-broken-white', 'shadow-md');
                    chip.classList.remove('bg-white', 'border', 'border-charcoal/10', 'text-charcoal', 'hover:bg-charcoal/5');
                    
                    applyFilters();
                });
            });
        });
    </script>
@endsection