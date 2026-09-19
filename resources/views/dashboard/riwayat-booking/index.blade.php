@extends('dashboard.layouts.app')

@section('title', 'Riwayat Booking - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER SECTION -->
        <div class="reveal revealed">
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                Pesanan Saya
            </h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                Kelola reservasi ruang kerja Anda, lacak status, dan akses tiket digital Anda.
            </p>
        </div>

        <!-- FILTER CHIPS -->
        <div
            class="reveal reveal-delay-1 flex items-center gap-3 overflow-x-auto no-scrollbar pb-2 -mx-4 px-4 md:mx-0 md:px-0">
            <button
                class="bg-charcoal text-broken-white px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0 shadow-md">
                Semua
            </button>
            <button
                class="bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Menunggu
            </button>
            <button
                class="bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Disetujui
            </button>
            <button
                class="bg-merah-jcc/10 text-merah-jcc hover:bg-merah-jcc/20 transition-colors px-5 sm:px-6 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                Selesai
            </button>
        </div>

        <!-- BOOKING CARDS GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6">

            <!-- CARD 1: DISETUJUI -->
            <div
                class="reveal reveal-delay-2 card-hover bg-white border border-charcoal/5 rounded-[32px] p-3 sm:p-4 shadow-sm flex flex-col sm:flex-row gap-4 sm:gap-5 group relative overflow-hidden">
                <!-- Image & Badge -->
                <div class="relative w-full sm:w-44 h-48 sm:h-44 shrink-0 rounded-[24px] overflow-hidden bg-charcoal/5">
                    <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        alt="Ruang Diskusi A">
                    <div
                        class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-bold text-charcoal uppercase tracking-wider">Disetujui</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-between py-1">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-headline font-extrabold text-xl text-charcoal">Ruang Diskusi A</h3>
                            <p class="flex items-center gap-1 text-xs text-secondary mt-1">
                                <span class="material-symbols-outlined text-[14px]">location_on</span>
                                Lantai 2, JCC Main Hub
                            </p>
                        </div>
                        <button class="text-charcoal/40 hover:text-charcoal transition-colors">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-5 sm:mt-0 pb-2">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Tanggal</p>
                            <p class="text-sm font-headline font-bold text-charcoal">15 Okt 2026</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Waktu</p>
                            <p class="text-sm font-headline font-bold text-charcoal">10:00 - 13:00</p>
                        </div>
                    </div>

                    <a href="/dashboard/riwayat-booking/detail"
                        class="mt-4 w-full bg-charcoal text-broken-white py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-charcoal/80 transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[16px]">qr_code_scanner</span>
                        Lihat Tiket
                    </a>
                </div>
            </div>

            <!-- CARD 2: MENUNGGU -->
            <div
                class="reveal reveal-delay-3 card-hover bg-white border border-charcoal/5 rounded-[32px] p-3 sm:p-4 shadow-sm flex flex-col sm:flex-row gap-4 sm:gap-5 group relative overflow-hidden">
                <!-- Image & Badge -->
                <div class="relative w-full sm:w-44 h-48 sm:h-44 shrink-0 rounded-[24px] overflow-hidden bg-charcoal/5">
                    <img src="https://images.unsplash.com/photo-1582657233895-0f37a3f150c0?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        alt="Focus Pod 03">
                    <div
                        class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span class="text-[10px] font-bold text-charcoal uppercase tracking-wider">Menunggu</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-between py-1">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-headline font-extrabold text-xl text-charcoal">Focus Pod 03</h3>
                            <p class="flex items-center gap-1 text-xs text-secondary mt-1">
                                <span class="material-symbols-outlined text-[14px]">location_on</span>
                                Lantai 1, Quiet Zone
                            </p>
                        </div>
                        <button class="text-charcoal/40 hover:text-charcoal transition-colors">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-5 sm:mt-0 pb-2">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Tanggal</p>
                            <p class="text-sm font-headline font-bold text-charcoal">18 Okt 2026</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Waktu</p>
                            <p class="text-sm font-headline font-bold text-charcoal">14:00 - 18:00</p>
                        </div>
                    </div>

                    <a href="#"
                        class="mt-4 w-full border border-charcoal/20 text-charcoal py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-charcoal/5 transition-colors">
                        Lacak Status
                    </a>
                </div>
            </div>

            <!-- CARD 3: SELESAI -->
            <div
                class="reveal reveal-delay-4 card-hover bg-white/60 border border-charcoal/5 rounded-[32px] p-3 sm:p-4 shadow-sm flex flex-col sm:flex-row gap-4 sm:gap-5 group relative overflow-hidden opacity-80 hover:opacity-100 transition-opacity">
                <!-- Image & Badge -->
                <div class="relative w-full sm:w-44 h-48 sm:h-44 shrink-0 rounded-[24px] overflow-hidden bg-charcoal/5">
                    <img src="https://images.unsplash.com/photo-1531973576160-7125cd663d86?q=80&w=600&auto=format&fit=crop"
                        class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700"
                        alt="Creative Studio B">
                    <div
                        class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-charcoal/40"></span>
                        <span class="text-[10px] font-bold text-charcoal uppercase tracking-wider">Selesai</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col justify-between py-1">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-headline font-extrabold text-xl text-charcoal">Creative Studio B</h3>
                            <p class="flex items-center gap-1 text-xs text-secondary mt-1">
                                <span class="material-symbols-outlined text-[14px]">location_on</span>
                                Lantai 3, Workshop Area
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-5 sm:mt-0 pb-2">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Tanggal</p>
                            <p class="text-sm font-headline font-bold text-charcoal/70">02 Okt 2026</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">Waktu</p>
                            <p class="text-sm font-headline font-bold text-charcoal/70">09:00 - 17:00</p>
                        </div>
                    </div>

                    <a href="#"
                        class="mt-4 w-full bg-merah-jcc/10 text-merah-jcc py-3 rounded-full flex justify-center items-center gap-2 text-xs font-headline font-bold hover:bg-merah-jcc/20 transition-colors">
                        Struk Tersedia
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
