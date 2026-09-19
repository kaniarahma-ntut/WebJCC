@extends('dashboard.layouts.app')

@section('title', 'Detail Booking - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER SECTION -->
        <div class="reveal revealed flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <a href="/dashboard/riwayat-booking"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span> Kembali ke Riwayat
                </a>
                <div class="flex items-center gap-3">
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                        Detail Pemesanan
                    </h1>
                    <span
                        class="bg-amber-500/10 text-amber-600 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border border-amber-500/20 shadow-sm flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        Sedang Diproses
                    </span>
                </div>
                <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                    Permintaan pemesanan Anda telah berhasil dikirim dan saat ini sedang ditinjau oleh tim administrasi
                    kami.
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <button
                    class="bg-white border border-charcoal/10 text-charcoal px-5 py-2.5 rounded-full font-headline font-bold text-xs shadow-sm hover:bg-charcoal/5 transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">edit_calendar</span> Reschedule
                </button>
            </div>
        </div>

        <!-- SECTION 1: TIMELINE HORIZONTAL -->
        <div
            class="reveal reveal-delay-1 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm relative overflow-hidden">
            <h2 class="font-headline font-bold text-lg text-charcoal mb-6 md:mb-8">Status Persetujuan</h2>

            <div class="overflow-x-auto no-scrollbar -mx-4 px-4 md:mx-0 md:px-0">
                <div class="min-w-[700px] relative flex justify-between items-start pb-4">

                    <!-- Garis Background (Abu-abu) -->
                    <div class="absolute top-[15px] left-[12.5%] right-[12.5%] h-0.5 bg-charcoal/10 z-0"></div>
                    <!-- Garis Progress (Merah) -->
                    <div
                        class="absolute top-[15px] left-[12.5%] w-[33.33%] h-0.5 bg-merah-jcc z-0 transition-all duration-1000 shadow-[0_0_8px_rgba(220,38,38,0.5)]">
                    </div>

                    <!-- Step 1 -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3 group">
                        <div
                            class="w-8 h-8 rounded-full bg-merah-jcc text-white flex items-center justify-center shrink-0 shadow-md ring-4 ring-white">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Permintaan Dikirim</h4>
                            <span class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">10:45
                                AM</span>
                        </div>
                    </div>

                    <!-- Step 2 (Aktif) -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3 group">
                        <div
                            class="w-8 h-8 rounded-full bg-white border-2 border-merah-jcc flex items-center justify-center shrink-0 shadow-md ring-4 ring-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-merah-jcc animate-pulse"></span>
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Validasi Admin JCC</h4>
                            <span class="text-[9px] font-bold text-amber-600 mt-1 block uppercase tracking-wide">Sedang
                                Diproses</span>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3 group opacity-50">
                        <div
                            class="w-8 h-8 rounded-full bg-[#FBF9F6] border-2 border-charcoal/15 flex items-center justify-center shrink-0 ring-4 ring-white">
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Validasi Dispora</h4>
                            <span
                                class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">Menunggu</span>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/4 gap-3 group opacity-50">
                        <div
                            class="w-8 h-8 rounded-full bg-[#FBF9F6] border-2 border-charcoal/15 flex items-center justify-center shrink-0 ring-4 ring-white">
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Dikonfirmasi</h4>
                            <span
                                class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">Menunggu</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SECTION 2: GRID DETAIL & INVOICE -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <!-- KIRI: INFO PEMESANAN -->
            <div
                class="reveal reveal-delay-2 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-6 pb-6 border-b border-charcoal/5">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">ID Pemesanan
                            </p>
                            <h2 class="font-headline font-extrabold text-2xl text-charcoal">JCC-2026-0001</h2>
                        </div>
                        <div class="bg-charcoal/5 p-2 rounded-xl text-charcoal/50">
                            <span class="material-symbols-outlined">receipt_long</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-merah-jcc/5 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Tanggal &
                                    Waktu</p>
                                <p class="font-headline font-bold text-base text-charcoal">15 Sep 2026</p>
                                <p class="text-xs text-secondary mt-0.5">09:00 - 17:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">meeting_room</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Ruangan
                                </p>
                                <p class="font-headline font-bold text-base text-charcoal">Main Exhibition Hall</p>
                                <p class="text-xs text-secondary mt-0.5">Kapasitas: 200 pax</p>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    class="w-full mt-8 border border-charcoal/20 text-charcoal py-3 rounded-full flex justify-center items-center font-headline font-bold text-xs hover:bg-charcoal/5 transition-colors">
                    Lihat Detail Lengkap
                </button>
            </div>

            <!-- KANAN: INVOICE / TIKET (Gaya Vertikal) -->
            <div
                class="reveal reveal-delay-3 bg-white rounded-[32px] shadow-lg border border-charcoal/5 overflow-hidden flex flex-col relative border-t-4 border-t-merah-jcc">

                <!-- Bagian Atas Invoice -->
                <div class="p-6 md:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline font-extrabold text-2xl text-charcoal">Resi Resmi</h3>
                        <div class="flex items-center gap-1.5 text-emerald-600 bg-emerald-500/10 px-3 py-1.5 rounded-full">
                            <span class="material-symbols-outlined text-[14px]">check_circle</span>
                            <span class="font-headline font-bold text-[10px] uppercase tracking-wider">Lunas</span>
                        </div>
                    </div>

                    <p class="font-body text-xs text-secondary mb-6 pb-6 border-b border-charcoal/5">Jember Creative Center
                    </p>

                    <div class="grid grid-cols-2 gap-y-5 gap-x-4 mb-6">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">ID Transaksi
                            </p>
                            <p class="font-headline font-bold text-sm text-charcoal">JCC-2409-TRX</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Tanggal Bayar
                            </p>
                            <p class="font-headline font-bold text-sm text-charcoal">24 Okt 2026</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Ruang</p>
                            <p class="font-headline font-bold text-sm text-charcoal leading-snug">Main Exhibition</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Jadwal</p>
                            <p class="font-headline font-bold text-sm text-charcoal">09:00 - 17:00</p>
                        </div>
                    </div>

                    <div class="pt-5 border-t border-charcoal/10">
                        <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Total Dibayar</p>
                        <h4 class="font-headline font-extrabold text-3xl text-merah-jcc">Rp 5.500.000</h4>
                        <p class="text-[10px] text-secondary mt-1">Metode: Bank Transfer (BCA)</p>
                    </div>
                </div>

                <!-- Pemisah Zigzag / Sobekan Horizontal -->
                <div class="flex justify-center items-center bg-cream-dark/30 h-8 w-full relative">
                    <div class="absolute -left-3 h-6 w-6 bg-[#FBF9F6] rounded-full border-r border-charcoal/5"></div>
                    <div class="w-full h-px border-t-2 border-dashed border-charcoal/15"></div>
                    <div class="absolute -right-3 h-6 w-6 bg-[#FBF9F6] rounded-full border-l border-charcoal/5"></div>
                </div>

                <!-- Bagian Bawah Invoice (QR & Aksi) -->
                {{-- <div class="p-6 md:p-8 bg-cream-dark/30 flex flex-col justify-center items-center flex-1">
                    <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-3 text-center">Pindai
                        Untuk Check-in</p>

                    <div class="bg-white p-3 rounded-2xl shadow-sm mb-6 border border-charcoal/5">
                        <!-- Placeholder QR Code -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=JCC-2409-TRX" alt="QR Code"
                            class="w-20 h-20">
                    </div>

                    <div class="w-full flex gap-3">
                        <button
                            class="flex-1 bg-merah-jcc text-broken-white py-2.5 rounded-full flex justify-center items-center gap-2 font-headline font-bold text-xs shadow-md shadow-merah-jcc/20 hover:bg-rose-700 transition-colors">
                            <span class="material-symbols-outlined text-[16px]">download</span> PDF
                        </button>
                        <a href="/dashboard"
                            class="flex-1 text-center border border-charcoal/20 text-charcoal py-2.5 rounded-full font-headline font-bold text-xs hover:bg-white transition-colors flex justify-center items-center gap-2">
                            Beranda
                        </a>
                    </div>
                </div> --}}
            </div>

        </div>

        <!-- SECTION 3: SURAT PEMINJAMAN (Iframe) -->
        <div
            class="reveal reveal-delay-4 bg-white border border-charcoal/10 rounded-[32px] p-4 md:p-6 shadow-sm flex flex-col h-[600px]">
            <div class="flex items-center justify-between px-2 mb-4">
                <h2 class="font-headline font-bold text-lg text-charcoal flex items-center gap-2">
                    <span class="material-symbols-outlined text-merah-jcc text-xl">description</span>
                    Dokumen Surat Peminjaman
                </h2>
                <button
                    class="w-8 h-8 rounded-full hover:bg-charcoal/5 flex items-center justify-center text-charcoal/50 transition-colors"
                    title="Perbesar Layar Penuh">
                    <span class="material-symbols-outlined text-[20px]">open_in_full</span>
                </button>
            </div>

            <div
                class="flex-1 rounded-[24px] overflow-hidden border border-charcoal/10 bg-cream-dark relative shadow-inner">
                <!-- Placeholder loading text jika iframe lama dimuat -->
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center text-charcoal/40 font-body text-xs z-0">
                    <span class="material-symbols-outlined text-3xl mb-2 animate-bounce">description</span>
                    Memuat dokumen...
                </div>

                <!-- Iframe (Ganti URL src dengan link aset lokal/PDF Surat) -->
                <iframe src="{{ asset('surat.pdf') }}" class="w-full h-full relative z-10 bg-white"
                    frameborder="0"></iframe>
            </div>
        </div>

        <!-- SECTION 4: BANTUAN -->
        <div
            class="reveal reveal-delay-5 bg-gradient-to-r from-merah-jcc/5 to-rose-700/5 border border-merah-jcc/10 rounded-[24px] p-5 md:p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex gap-4 items-center">
                <div
                    class="w-12 h-12 rounded-2xl bg-white text-merah-jcc flex items-center justify-center shrink-0 shadow-sm border border-merah-jcc/10">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                </div>
                <div>
                    <h4 class="font-headline font-extrabold text-base text-charcoal">Butuh bantuan?</h4>
                    <p class="font-body text-xs text-secondary mt-0.5">Hubungi tim dukungan kami terkait kendala pemesanan
                        ini.</p>
                </div>
            </div>
            <button
                class="w-full sm:w-auto border-2 border-merah-jcc/30 text-merah-jcc bg-white px-8 py-3 rounded-full font-headline font-bold text-xs shadow-sm hover:bg-merah-jcc hover:text-white transition-all shrink-0">
                Hubungi Bantuan
            </button>
        </div>

    </div>
@endsection
