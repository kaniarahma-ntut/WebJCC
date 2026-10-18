@extends('dashboard.layouts.app')

@section('title', 'Detail Booking - JCC')

@section('dashboard-content')
    @php
        // Map status to UI
        $statusMap = [
            'pending'  => [
                'label' => 'Sedang Diproses',
                'bg' => 'bg-amber-500/10',
                'text' => 'text-amber-600',
                'border' => 'border-amber-500/20',
                'dot' => 'bg-amber-500',
                'pulse' => true,
            ],
            'approved' => [
                'label' => 'Disetujui',
                'bg' => 'bg-emerald-500/10',
                'text' => 'text-emerald-600',
                'border' => 'border-emerald-500/20',
                'dot' => 'bg-emerald-500',
                'pulse' => false,
            ],
            'declined' => [
                'label' => 'Ditolak',
                'bg' => 'bg-red-500/10',
                'text' => 'text-red-600',
                'border' => 'border-red-500/20',
                'dot' => 'bg-red-500',
                'pulse' => false,
            ],
        ];
        $status = $statusMap[$booking->status_peminjaman] ?? $statusMap['pending'];

        // Map payment status
        $paymentMap = [
            'pending'   => ['label' => 'Belum Dibayar', 'bg' => 'bg-amber-500/10', 'text' => 'text-amber-600', 'icon' => 'schedule'],
            'completed' => ['label' => 'Lunas',         'bg' => 'bg-emerald-500/10', 'text' => 'text-emerald-600', 'icon' => 'check_circle'],
            'failed'    => ['label' => 'Gagal',         'bg' => 'bg-red-500/10', 'text' => 'text-red-600', 'icon' => 'cancel'],
        ];
        $payment = $paymentMap[$booking->status_pembayaran] ?? $paymentMap['pending'];

        // Duration
        $durationHours = $booking->start_time && $booking->end_time
            ? $booking->start_time->diffInHours($booking->end_time)
            : 0;

        // Room image
        $roomImage = $booking->ruangan?->gambar_ruangan
            ? asset('storage/' . $booking->ruangan->gambar_ruangan)
            : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop';

        // Items
        $items = $booking->detailPeminjamanBarang ?? collect();
        $itemsTotal = $items->sum(fn($d) => $d->peminjamanBarang?->barang?->harga_sewa ?? 0);
        $roomTotal = $booking->ruangan?->tarif_sewa_ruangan ?? 0;
        $grandTotal = $roomTotal + $itemsTotal;

        // Timeline step position based on status
        $currentStep = match($booking->status_peminjaman) {
            'pending'  => 2,
            'approved' => 4,
            'declined' => 2,
            default    => 1,
        };
    @endphp

    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER -->
        <div class="reveal revealed flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <a href="{{ route('riwayat-booking.index') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span> Kembali ke Riwayat
                </a>
                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                        Detail Pemesanan
                    </h1>
                    <span class="{{ $status['bg'] }} {{ $status['text'] }} px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $status['border'] }} shadow-sm flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full {{ $status['dot'] }} {{ $status['pulse'] ? 'animate-pulse' : '' }}"></span>
                        {{ $status['label'] }}
                    </span>
                </div>
                <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                    @if ($booking->status_peminjaman === 'pending')
                        Permintaan pemesanan Anda telah berhasil dikirim dan saat ini sedang ditinjau oleh tim administrasi kami.
                    @elseif ($booking->status_peminjaman === 'approved')
                        Pemesanan Anda telah disetujui. Silakan periksa dokumen dan tiket di bawah.
                    @else
                        Pemesanan Anda ditolak. Silakan hubungi tim dukungan untuk informasi lebih lanjut.
                    @endif
                </p>
            </div>
        </div>

        <!-- TIMELINE -->
        <div class="reveal reveal-delay-1 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm relative overflow-hidden">
            <h2 class="font-headline font-bold text-lg text-charcoal mb-6 md:mb-8">Status Persetujuan</h2>

            <div class="overflow-x-auto no-scrollbar -mx-4 px-4 md:mx-0 md:px-0">
                <div class="min-w-[700px] relative flex justify-between items-start pb-4">

                    <!-- Background line -->
                    <div class="absolute top-[15px] left-[12.5%] right-[12.5%] h-0.5 bg-charcoal/10 z-0"></div>

                    <!-- Progress line: 0% / 33% / 66% / 100% based on step -->
                    @php
                        $progressPercent = match($currentStep) {
                            1 => 0,
                            2 => 33.33,
                            3 => 66.66,
                            4 => 100,
                            default => 0,
                        };
                    @endphp
                    <div class="absolute top-[15px] left-[12.5%] h-0.5 bg-merah-jcc z-0 transition-all duration-1000 shadow-[0_0_8px_rgba(220,38,38,0.5)]"
                         style="width: {{ $progressPercent * 0.75 }}%"></div>

                    <!-- Step 1: Permintaan Dikirim -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3">
                        <div class="w-8 h-8 rounded-full {{ $currentStep >= 1 ? 'bg-merah-jcc text-white' : 'bg-[#FBF9F6] border-2 border-charcoal/15' }} flex items-center justify-center shrink-0 shadow-md ring-4 ring-white">
                            @if ($currentStep >= 1)
                                <span class="material-symbols-outlined text-[16px]">check</span>
                            @endif
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Permintaan Dikirim</h4>
                            <span class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">
                                {{ $booking->created_at->format('H:i A') }}
                            </span>
                        </div>
                    </div>

                    <!-- Step 2: Validasi Admin JCC -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 shadow-md ring-4 ring-white
                            {{ $currentStep > 2 ? 'bg-merah-jcc text-white' : ($currentStep === 2 ? 'bg-white border-2 border-merah-jcc' : 'bg-[#FBF9F6] border-2 border-charcoal/15') }}">
                            @if ($currentStep > 2)
                                <span class="material-symbols-outlined text-[16px]">check</span>
                            @elseif ($currentStep === 2)
                                <span class="w-2.5 h-2.5 rounded-full bg-merah-jcc animate-pulse"></span>
                            @endif
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Validasi Admin JCC</h4>
                            <span class="text-[9px] font-bold {{ $currentStep === 2 ? 'text-amber-600' : 'text-secondary/50' }} mt-1 block uppercase tracking-wide">
                                {{ $currentStep > 2 ? 'Selesai' : ($currentStep === 2 ? 'Sedang Diproses' : 'Menunggu') }}
                            </span>
                        </div>
                    </div>

                    <!-- Step 3: Validasi Dispora -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 shadow-md ring-4 ring-white
                            {{ $currentStep > 3 ? 'bg-merah-jcc text-white' : ($currentStep === 3 ? 'bg-white border-2 border-merah-jcc' : 'bg-[#FBF9F6] border-2 border-charcoal/15') }}">
                            @if ($currentStep > 3)
                                <span class="material-symbols-outlined text-[16px]">check</span>
                            @elseif ($currentStep === 3)
                                <span class="w-2.5 h-2.5 rounded-full bg-merah-jcc animate-pulse"></span>
                            @endif
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Validasi Dispora</h4>
                            <span class="text-[9px] font-bold {{ $currentStep === 3 ? 'text-amber-600' : 'text-secondary/50' }} mt-1 block uppercase tracking-wide">
                                {{ $currentStep > 3 ? 'Selesai' : ($currentStep === 3 ? 'Sedang Diproses' : 'Menunggu') }}
                            </span>
                        </div>
                    </div>

                    <!-- Step 4: Dikonfirmasi -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 shadow-md ring-4 ring-white
                            {{ $currentStep >= 4 ? 'bg-merah-jcc text-white' : 'bg-[#FBF9F6] border-2 border-charcoal/15' }}">
                            @if ($currentStep >= 4)
                                <span class="material-symbols-outlined text-[16px]">check</span>
                            @endif
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Dikonfirmasi</h4>
                            <span class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">
                                {{ $currentStep >= 4 ? 'Selesai' : 'Menunggu' }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- DETAIL GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <!-- LEFT: BOOKING INFO -->
            <div class="reveal reveal-delay-2 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-6 pb-6 border-b border-charcoal/5">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">ID Pemesanan</p>
                            <h2 class="font-headline font-extrabold text-2xl text-charcoal">
                                {{ str_pad($booking->id_peminjaman_ruangan, 4, '0', STR_PAD_LEFT) }}
                            </h2>

                            {{-- Show the user's name if the currently logged-in user is an admin --}}
                            @if(in_array(auth()->user()->admin_role, ['admin_JCC', 'admin_Disporabudpar']))
                                <p class="text-xs font-bold text-charcoal mt-2 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px] text-merah-jcc">person</span>
                                    Pemesan: {{ $booking->user->nama_user ?? 'Unknown' }} ({{ $booking->user->email ?? '-' }})
                                </p>
                            @endif
                            
                        </div>
                        <div class="bg-charcoal/5 p-2 rounded-xl text-charcoal/50">
                            <span class="material-symbols-outlined">receipt_long</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Date & Time -->
                        <div class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-merah-jcc/5 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Tanggal & Waktu</p>
                                <p class="font-headline font-bold text-base text-charcoal">
                                    {{ $booking->start_time->translatedFormat('d M Y') }}
                                </p>
                                <p class="text-xs text-secondary mt-0.5">
                                    {{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }} WIB
                                    ({{ $durationHours }} Jam)
                                </p>
                            </div>
                        </div>

                        <!-- Room -->
                        <div class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">meeting_room</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Ruangan</p>
                                <p class="font-headline font-bold text-base text-charcoal">
                                    {{ $booking->ruangan?->nama_ruangan ?? 'Ruangan tidak ditemukan' }}
                                </p>
                                <p class="text-xs text-secondary mt-0.5">
                                    {{ $booking->ruangan?->lokasi_ruangan ?? '' }}
                                </p>
                            </div>
                        </div>

                        <!-- Event -->
                        <div class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">event</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Kegiatan</p>
                                <p class="font-headline font-bold text-base text-charcoal">{{ $booking->nama_event }}</p>
                                <p class="text-xs text-secondary mt-0.5">
                                    {{ ucfirst($booking->status_event) }} • {{ $booking->kapasitas }} Peserta
                                </p>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Kontak</p>
                                <p class="font-headline font-bold text-base text-charcoal">{{ $booking->noHP_CP }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: INVOICE -->
            <div class="reveal reveal-delay-3 bg-white rounded-[32px] shadow-lg border border-charcoal/5 overflow-hidden flex flex-col relative border-t-4 border-t-merah-jcc">
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline font-extrabold text-2xl text-charcoal">Rincian Biaya</h3>
                        <div class="flex items-center gap-1.5 {{ $payment['bg'] }} {{ $payment['text'] }} px-3 py-1.5 rounded-full">
                            <span class="material-symbols-outlined text-[14px]">{{ $payment['icon'] }}</span>
                            <span class="font-headline font-bold text-[10px] uppercase tracking-wider">{{ $payment['label'] }}</span>
                        </div>
                    </div>

                    <p class="font-body text-xs text-secondary mb-6 pb-6 border-b border-charcoal/5">
                        Jember Creative Center
                    </p>

                    <!-- Cost breakdown -->
                    <div class="space-y-3 mb-6 pb-6 border-b border-charcoal/10">
                        <!-- Room cost -->
                        <div class="flex items-start justify-between text-xs">
                            <div>
                                <p class="font-headline font-bold text-charcoal">
                                    {{ $booking->ruangan?->nama_ruangan ?? '-' }}
                                </p>
                                <p class="text-secondary text-[10px] mt-0.5">
                                    1 hari × Rp {{ number_format($roomTotal, 0, ',', '.') }}
                                </p>
                            </div>
                            <p class="font-headline font-bold text-charcoal">
                                Rp {{ number_format($roomTotal, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Items -->
                        @foreach ($items as $detail)
                            @php $item = $detail->peminjamanBarang?->barang; @endphp
                            @if ($item)
                                <div class="flex items-start justify-between text-xs">
                                    <div>
                                        <p class="font-headline font-bold text-charcoal">{{ $item->nama_barang }}</p>
                                        <p class="text-secondary text-[10px] mt-0.5">
                                            1 hari × Rp {{ number_format($item->harga_sewa, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <p class="font-headline font-bold text-charcoal">
                                        Rp {{ number_format($item->harga_sewa, 0, ',', '.') }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="pt-2">
                        <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Total</p>
                        <h4 class="font-headline font-extrabold text-3xl text-merah-jcc">
                            Rp {{ number_format($grandTotal, 0, ',', '.') }}
                        </h4>
                        <p class="text-[10px] text-secondary mt-1">
                            Status Pembayaran: {{ $payment['label'] }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- SECTION 3: SURAT PEMINJAMAN (only if approved) -->
        @if ($booking->status_peminjaman === 'approved')
            <div class="reveal reveal-delay-4 bg-white border border-charcoal/10 rounded-[32px] p-4 md:p-6 shadow-sm flex flex-col h-[600px]">
                <div class="flex items-center justify-between px-2 mb-4">
                    <h2 class="font-headline font-bold text-lg text-charcoal flex items-center gap-2">
                        <span class="material-symbols-outlined text-merah-jcc text-xl">description</span>
                        Dokumen Surat Peminjaman
                    </h2>
                </div>

                <div class="flex-1 rounded-[24px] overflow-hidden border border-charcoal/10 bg-cream-dark relative shadow-inner">
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-charcoal/40 font-body text-xs z-0">
                        <span class="material-symbols-outlined text-3xl mb-2">description</span>
                        Dokumen akan diunggah oleh admin setelah disetujui.
                    </div>
                </div>
            </div>
        @endif

        <!-- HELP SECTION -->
        <div class="reveal reveal-delay-5 bg-gradient-to-r from-merah-jcc/5 to-rose-700/5 border border-merah-jcc/10 rounded-[24px] p-5 md:p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex gap-4 items-center">
                <div class="w-12 h-12 rounded-2xl bg-white text-merah-jcc flex items-center justify-center shrink-0 shadow-sm border border-merah-jcc/10">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                </div>
                <div>
                    <h4 class="font-headline font-extrabold text-base text-charcoal">Butuh bantuan?</h4>
                    <p class="font-body text-xs text-secondary mt-0.5">Hubungi tim dukungan kami terkait kendala pemesanan ini.</p>
                </div>
            </div>
            <button class="w-full sm:w-auto border-2 border-merah-jcc/30 text-merah-jcc bg-white px-8 py-3 rounded-full font-headline font-bold text-xs shadow-sm hover:bg-merah-jcc hover:text-white transition-all shrink-0">
                Hubungi Bantuan
            </button>
        </div>

    </div>
@endsection