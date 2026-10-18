@extends('dashboard.layouts.app')

@section('title', 'Selamat Datang!')

@section('dashboard-content')
    @php
        $userRole = Auth::user()->user_role ?? 'user';
    @endphp

    @if ($userRole === 'admin_JCC')
        <!-- ================= DASHBOARD ADMIN JCC ================= -->
        <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12">

            <!-- 1. GREETING HERO (ADMIN) -->
            <div
                class="relative overflow-hidden flex flex-col md:flex-row md:items-end justify-between gap-5 bg-charcoal p-6 md:p-8 rounded-[32px] reveal revealed">
                <div class="absolute -top-20 -right-16 w-72 h-72 bg-merah-jcc/40 rounded-full blur-3xl animate-blob">
                </div>
                <div class="absolute -bottom-24 left-1/3 w-64 h-64 bg-amber-500/20 rounded-full blur-3xl animate-blob"
                    style="animation-delay:-6s"></div>

                <div class="relative z-10 space-y-2.5">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-broken-white/10 border border-broken-white/15 backdrop-blur text-broken-white/90 text-[10px] font-bold uppercase tracking-widest rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Command Center
                    </span>
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-broken-white tracking-tight">
                        Halo, Admin JCC! <span class="inline-block animate-floaty">🛠️</span>
                    </h1>
                    <p class="font-body text-broken-white/70 text-sm md:text-base max-w-xl">
                        Selamat bertugas. Berikut ringkasan operasional JCC hari ini — Ruangan, pengguna,
                        dan pemesanan yang perlu ditindaklanjuti.
                    </p>
                </div>

                <div class="relative z-10 flex items-center gap-3 shrink-0">
                    <div
                        class="bg-broken-white/10 border border-broken-white/15 backdrop-blur rounded-full px-5 py-2.5 flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-400 text-lg">calendar_today</span>
                        <span class="font-headline font-bold text-xs text-broken-white">19 Sep 2026</span>
                    </div>
                    <a href="/dashboard/Ruangan"
                        class="hidden sm:inline-flex items-center gap-2 bg-broken-white text-charcoal hover:bg-merah-jcc hover:text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-all shadow-lg">
                        <span class="material-symbols-outlined text-sm">add</span> Kelola Ruangan
                    </a>
                </div>
            </div>

            <!-- 2. QUICK STATS (ADMIN) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">

                <div
                    class="reveal reveal-delay-1 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center group-hover:bg-merah-jcc group-hover:text-broken-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">meeting_room</span>
                        </div>
                        <span
                            class="text-[10px] font-bold text-charcoal/50 bg-charcoal/5 px-2 py-1 rounded-full">Total</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="6">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Ruangan
                        Aktif</span>
                </div>

                <div
                    class="reveal reveal-delay-2 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">group</span>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-1 rounded-full">+4
                            minggu ini</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="48">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Total
                        Pengguna</span>
                </div>

                <div
                    class="reveal reveal-delay-3 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">event_available</span>
                        </div>
                        <span class="text-[10px] font-bold text-amber-600 bg-amber-500/10 px-2 py-1 rounded-full">Perlu
                            Aksi</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="12">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Booking
                        Masuk</span>
                </div>

                <div
                    class="reveal reveal-delay-4 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-charcoal/5 text-charcoal flex items-center justify-center group-hover:bg-charcoal group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">celebration</span>
                        </div>
                        <span
                            class="text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 px-2 py-1 rounded-full">Live</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="5">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Acara
                        Berjalan</span>
                </div>
            </div>

            <!-- 3. BENTO: PEMESANAN DARURAT + AKSES CEPAT ADMIN -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                <div class="reveal md:col-span-2 bg-charcoal rounded-[32px] p-1 relative overflow-hidden shadow-lg group">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=1200&auto=format&fit=crop"
                        class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay group-hover:scale-105 transition-transform duration-700"
                        alt="Convention Hall">
                    <div class="absolute inset-0 bg-gradient-to-r from-charcoal via-charcoal/85 to-charcoal/20">
                    </div>

                    <div class="relative z-10 p-6 md:p-8 flex flex-col justify-between min-h-[300px] md:min-h-[320px]">
                        <div class="flex flex-wrap justify-between items-start gap-3">
                            <div
                                class="bg-amber-500/20 border border-amber-500/30 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                                <span class="text-[10px] font-bold text-broken-white tracking-widest uppercase">Perlu
                                    Konfirmasi</span>
                            </div>
                            <span
                                class="bg-broken-white text-charcoal text-[10px] font-bold px-3 py-1.5 rounded-full shadow-sm">Diajukan
                                Hari Ini</span>
                        </div>

                        <div class="mt-10 space-y-4">
                            <div>
                                <h2
                                    class="font-headline text-3xl md:text-4xl font-extrabold text-broken-white drop-shadow-md">
                                    Main Exhibition Hall</h2>
                                <p class="font-body text-broken-white/80 text-sm mt-1">Booking ID: <span
                                        class="font-mono">JCC-2026-0047</span> · Oleh <strong>Rafi Ahmad</strong></p>
                            </div>

                            <div
                                class="flex flex-wrap items-center gap-2.5 md:gap-4 text-xs font-headline font-bold text-broken-white">
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">calendar_month</span> 25
                                    Sep 2026
                                </div>
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">schedule</span> 08:00 -
                                    12:00 WIB
                                </div>
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">group</span> 200 orang
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="/dashboard/terima-pemesanan/detail"
                                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-broken-white hover:text-charcoal text-charcoal px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-all shadow-md hover:gap-3">
                                Tinjau & Konfirmasi <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                            <a href="/dashboard/riwayat-booking"
                                class="inline-flex items-center gap-2 border border-broken-white/30 hover:bg-broken-white/10 text-broken-white px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-all">
                                Lihat Semua Booking
                            </a>
                        </div>
                    </div>
                </div>

                <!-- AKSES CEPAT ADMIN -->
                <div class="reveal md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">

                    <a href="/dashboard/Ruangan"
                        class="card-hover bg-gradient-to-br from-merah-jcc to-rose-700 rounded-[32px] p-6 text-broken-white shadow-lg relative overflow-hidden group">
                        <div
                            class="absolute -right-6 -bottom-6 opacity-20 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500">
                            <span class="material-symbols-outlined text-9xl">meeting_room</span>
                        </div>
                        <div class="relative z-10">
                            <span
                                class="inline-block bg-broken-white/15 border border-broken-white/20 text-[9px] font-bold uppercase tracking-widest px-2.5 py-1 rounded-full mb-3">Manajemen</span>
                            <h3 class="font-headline font-bold text-xl mb-1">Ruangan</h3>
                            <p class="font-body text-xs text-broken-white/80 mb-4">Tambah, edit, atau nonaktifkan
                                ruangan & alat yang tersedia.</p>
                            <span
                                class="inline-flex items-center gap-1 bg-broken-white text-merah-jcc px-5 py-2 rounded-full font-headline font-bold text-xs shadow-sm hover:scale-105 transition-transform">Kelola
                                Ruangan <span class="material-symbols-outlined text-sm">east</span></span>
                        </div>
                    </a>

                    <a href="/dashboard/manajemen-pengguna"
                        class="card-hover bg-white border border-charcoal/10 rounded-[32px] p-6 shadow-sm relative overflow-hidden group">
                        <div class="absolute -right-4 -top-4 w-20 h-20 bg-emerald-500/10 rounded-full blur-xl">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-9 h-9 rounded-full bg-emerald-500/10 flex items-center justify-center text-emerald-600 mb-3">
                                <span class="material-symbols-outlined text-sm">group</span>
                            </div>
                            <span class="text-[9px] font-bold text-charcoal/40 uppercase tracking-widest">Manajemen</span>
                            <h3 class="font-headline font-bold text-sm text-charcoal mt-0.5 mb-1">Pengguna</h3>
                            <p class="font-body text-xs text-secondary mt-1 mb-3">Atur akun anggota, ubah peran,
                                dan status keanggotaan.</p>
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-merah-jcc font-headline font-bold text-xs flex items-center gap-1 group-hover:gap-2 transition-all">Kelola
                                    Pengguna <span class="material-symbols-outlined text-[14px]">east</span></span>
                                <span
                                    class="text-[9px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-1 rounded-full">48
                                    anggota</span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <!-- 4. CHART OKUPANSI + AKTIVITAS ADMIN -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 md:gap-6">

                <div class="reveal lg:col-span-2 bg-white border border-charcoal/10 rounded-[32px] p-6 shadow-sm flex flex-col"
                    id="usage-chart">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="font-headline font-bold text-base text-charcoal">Okupansi Ruangan</h2>
                            <p class="font-body text-[11px] text-secondary">Minggu ini vs minggu lalu</p>
                        </div>
                        <span
                            class="text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 px-2.5 py-1 rounded-full">+18%</span>
                    </div>

                    <div class="flex-1 flex items-end justify-between gap-2 h-40">
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">6</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/15" style="height:15%">
                            </div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sen</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">12</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/40"
                                style="height:30%; transition-delay:.08s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sel</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">18</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/55"
                                style="height:45%; transition-delay:.16s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Rab</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">10</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/30"
                                style="height:25%; transition-delay:.24s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Kam</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end relative">
                            <span class="text-[9px] font-bold text-merah-jcc">26</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-gradient-to-t from-merah-jcc to-rose-400 shadow-lg shadow-merah-jcc/30"
                                style="height:65%; transition-delay:.32s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Jum</span>
                            <span
                                class="absolute -top-1 right-1/2 translate-x-1/2 w-1.5 h-1.5 bg-merah-jcc rounded-full animate-ping"></span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">14</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/50"
                                style="height:35%; transition-delay:.40s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sab</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">4</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/20"
                                style="height:10%; transition-delay:.48s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Min</span>
                        </div>
                    </div>

                    <div
                        class="mt-5 pt-4 border-t border-charcoal/5 flex items-center gap-4 text-[10px] font-bold text-charcoal/50">
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-merah-jcc"></span>
                            Minggu ini</span>
                        <span class="flex items-center gap-1.5"><span
                                class="w-2.5 h-2.5 rounded-sm bg-merah-jcc/25"></span>
                            Minggu lalu</span>
                    </div>
                </div>

                <div
                    class="reveal reveal-delay-1 lg:col-span-3 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-7 shadow-sm">
                    <div class="flex items-center justify-between mb-5 pb-4 border-b border-charcoal/5">
                        <div>
                            <h2 class="font-headline font-bold text-base text-charcoal">Pemesanan Terbaru</h2>
                            <p class="font-body text-[11px] text-secondary">6 pemesanan dalam 7 hari terakhir
                            </p>
                        </div>
                        <a href="/dashboard/riwayat-booking"
                            class="text-xs font-bold text-merah-jcc hover:underline">Lihat
                            Semua</a>
                    </div>

                    <div class="space-y-1 relative">
                        <div class="absolute left-[19px] top-4 bottom-4 w-px bg-charcoal/10"></div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-amber-600 shrink-0 group-hover:border-amber-500/40 transition-colors">
                                <span class="material-symbols-outlined text-lg">hourglass_top</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Booking Menunggu
                                        Konfirmasi</h4>
                                    <span
                                        class="text-[9px] font-bold text-amber-600 bg-amber-500/10 px-2 py-0.5 rounded-full">Pending</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">JCC-2026-0047 · <strong>Main
                                        Exhibition Hall</strong> oleh Rafi Ahmad.</p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">Hari ini, 08:12</span>
                            </div>
                            <a href="/dashboard/terima-pemesanan/detail"
                                class="self-center shrink-0 text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 hover:bg-merah-jcc hover:text-white px-4 py-2 rounded-full transition-colors">Tinjau</a>
                        </div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-emerald-600 shrink-0 group-hover:border-emerald-500/40 transition-colors">
                                <span class="material-symbols-outlined text-lg">check_circle</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Pembayaran
                                        Terkonfirmasi</h4>
                                    <span
                                        class="text-[9px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-0.5 rounded-full">Lunas</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">Tagihan <strong>INV-0985</strong>
                                    untuk Podcast Studio 2 sudah masuk.</p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">Kemarin, 16:40</span>
                            </div>
                            <span
                                class="self-center shrink-0 text-[10px] font-bold text-charcoal/40 bg-charcoal/5 px-4 py-2 rounded-full">Dikonfirmasi</span>
                        </div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-merah-jcc shrink-0 group-hover:border-merah-jcc/40 transition-colors">
                                <span class="material-symbols-outlined text-lg">person_add</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Pengguna Baru
                                        Terdaftar</h4>
                                    <span
                                        class="text-[9px] font-bold text-charcoal/40 bg-charcoal/5 px-2 py-0.5 rounded-full">Baru</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">Akun <strong>Dewi Lestari</strong>
                                    menunggu verifikasi data keanggotaan.</p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">Kemarin, 09:15</span>
                            </div>
                            <a href="/dashboard/manajemen-pengguna"
                                class="self-center shrink-0 text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 hover:bg-merah-jcc hover:text-white px-4 py-2 rounded-full transition-colors">Verifikasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- ================= DASHBOARD USER / UMUM ================= -->
        <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12">

            <!-- 1. GREETING HERO (Kotak hiasan/elemen acak sudah dibersihkan) -->
            <div
                class="relative overflow-hidden flex flex-col md:flex-row md:items-end justify-between gap-5 bg-charcoal p-6 md:p-8 rounded-[32px] reveal revealed">
                <div class="absolute -top-20 -right-16 w-72 h-72 bg-merah-jcc/40 rounded-full blur-3xl animate-blob">
                </div>
                <div class="absolute -bottom-24 left-1/3 w-64 h-64 bg-amber-500/20 rounded-full blur-3xl animate-blob"
                    style="animation-delay:-6s"></div>

                <div class="relative z-10 space-y-2.5">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-broken-white/10 border border-broken-white/15 backdrop-blur text-broken-white/90 text-[10px] font-bold uppercase tracking-widest rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Overview
                    </span>
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-broken-white tracking-tight">
                        Halo, Pusat Kreator! <span class="inline-block animate-floaty">👋</span>
                    </h1>
                    <p class="font-body text-broken-white/70 text-sm md:text-base max-w-xl">
                        Selamat datang kembali di ekosistem kreatif. Berikut ringkasan aktivitas & jadwal kamu
                        hari ini.
                    </p>
                </div>

                <div class="relative z-10 flex items-center gap-3 shrink-0">
                    <div
                        class="bg-broken-white/10 border border-broken-white/15 backdrop-blur rounded-full px-5 py-2.5 flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-400 text-lg">calendar_today</span>
                        <span class="font-headline font-bold text-xs text-broken-white">10 Sep 2026</span>
                    </div>
                    <a href="#"
                        class="hidden sm:inline-flex items-center gap-2 bg-broken-white text-charcoal hover:bg-merah-jcc hover:text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-all shadow-lg">
                        <span class="material-symbols-outlined text-sm">add</span> Booking
                    </a>
                </div>
            </div>

            <!-- 2. QUICK STATS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">

                <div
                    class="reveal reveal-delay-1 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center group-hover:bg-merah-jcc group-hover:text-broken-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">event_available</span>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-1 rounded-full">+1
                            minggu ini</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="2">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Booking
                        Aktif</span>
                </div>

                <div
                    class="reveal reveal-delay-2 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">task_alt</span>
                        </div>
                        <span
                            class="text-[10px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-1 rounded-full">+4</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="14">0
                    </h3>
                    <span
                        class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Selesai</span>
                </div>

                <div
                    class="reveal reveal-delay-3 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">account_balance_wallet</span>
                        </div>
                        <span
                            class="text-[10px] font-bold text-amber-600 bg-amber-500/10 px-2 py-1 rounded-full">Segera</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3 counter"
                        data-target="1">0
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Menunggu
                        Bayar</span>
                </div>

                <div
                    class="reveal reveal-delay-4 card-hover bg-white border border-charcoal/10 rounded-[24px] p-4 md:p-5 shadow-sm group cursor-default">
                    <div class="flex items-start justify-between">
                        <div
                            class="w-10 h-10 rounded-2xl bg-charcoal/5 text-charcoal flex items-center justify-center group-hover:bg-charcoal group-hover:text-white transition-colors duration-300">
                            <span class="material-symbols-outlined text-xl">history</span>
                        </div>
                        <span
                            class="text-[10px] font-bold text-charcoal/50 bg-charcoal/5 px-2 py-1 rounded-full">Total</span>
                    </div>
                    <h3 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mt-3">
                        <span class="counter" data-target="48">0</span><span class="text-sm text-secondary font-normal">
                            jam</span>
                    </h3>
                    <span class="text-[10px] md:text-[11px] font-bold text-secondary uppercase tracking-wider">Total
                        Jam Sewa</span>
                </div>
            </div>

            <!-- 3. BENTO: AGENDA + AKSES CEPAT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                <div class="reveal md:col-span-2 bg-charcoal rounded-[32px] p-1 relative overflow-hidden shadow-lg group">
                    <img src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=1200&auto=format&fit=crop"
                        class="absolute inset-0 w-full h-full object-cover opacity-40 mix-blend-overlay group-hover:scale-105 transition-transform duration-700"
                        alt="Exhibition Hall">
                    <div class="absolute inset-0 bg-gradient-to-r from-charcoal via-charcoal/85 to-charcoal/20">
                    </div>

                    <div class="relative z-10 p-6 md:p-8 flex flex-col justify-between min-h-[300px] md:min-h-[320px]">
                        <div class="flex flex-wrap justify-between items-start gap-3">
                            <div
                                class="bg-merah-jcc/20 border border-merah-jcc/30 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-merah-jcc animate-pulse"></span>
                                <span class="text-[10px] font-bold text-broken-white tracking-widest uppercase">Agenda
                                    Terdekat</span>
                            </div>
                            <span
                                class="bg-broken-white text-charcoal text-[10px] font-bold px-3 py-1.5 rounded-full shadow-sm">Dalam
                                5 Hari</span>
                        </div>

                        <div class="mt-10 space-y-4">
                            <div>
                                <h2
                                    class="font-headline text-3xl md:text-4xl font-extrabold text-broken-white drop-shadow-md">
                                    Main Exhibition Hall</h2>
                                <p class="font-body text-broken-white/80 text-sm mt-1">Booking ID: <span
                                        class="font-mono">JCC-2026-0001</span></p>
                            </div>

                            <div
                                class="flex flex-wrap items-center gap-2.5 md:gap-4 text-xs font-headline font-bold text-broken-white">
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">calendar_month</span> 15
                                    Sep 2026
                                </div>
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">schedule</span> 09:00 -
                                    17:00 WIB
                                </div>
                                <div class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-xl">
                                    <span class="material-symbols-outlined text-base">group</span> 120 orang
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="#"
                                class="inline-flex items-center gap-2 bg-merah-jcc hover:bg-broken-white hover:text-merah-jcc text-broken-white px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-all shadow-md hover:gap-3">
                                Lihat Tiket Digital <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                            <a href="#"
                                class="inline-flex items-center gap-2 border border-broken-white/30 hover:bg-broken-white/10 text-broken-white px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-all">
                                Reschedule
                            </a>
                        </div>
                    </div>
                </div>


            </div>

            <!-- 4. CHART + AKTIVITAS -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-4 md:gap-6">

                <div class="reveal lg:col-span-2 bg-white border border-charcoal/10 rounded-[32px] p-6 shadow-sm flex flex-col"
                    id="usage-chart">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="font-headline font-bold text-base text-charcoal">Jam Pemakaian</h2>
                            <p class="font-body text-[11px] text-secondary">Minggu ini vs minggu lalu</p>
                        </div>
                        <span
                            class="text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 px-2.5 py-1 rounded-full">+18%</span>
                    </div>

                    <div class="flex-1 flex items-end justify-between gap-2 h-40">
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">6</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/15" style="height:15%">
                            </div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sen</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">12</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/40"
                                style="height:30%; transition-delay:.08s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sel</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">8</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/30"
                                style="height:20%; transition-delay:.16s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Rab</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">18</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/60"
                                style="height:45%; transition-delay:.24s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Kam</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end relative">
                            <span class="text-[9px] font-bold text-merah-jcc">26</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-gradient-to-t from-merah-jcc to-rose-400 shadow-lg shadow-merah-jcc/30"
                                style="height:65%; transition-delay:.32s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Jum</span>
                            <span
                                class="absolute -top-1 right-1/2 translate-x-1/2 w-1.5 h-1.5 bg-merah-jcc rounded-full animate-ping"></span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">14</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/50"
                                style="height:35%; transition-delay:.40s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Sab</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                            <span class="text-[9px] font-bold text-charcoal/40">4</span>
                            <div class="chart-bar w-full max-w-[28px] rounded-t-lg bg-merah-jcc/20"
                                style="height:10%; transition-delay:.48s"></div>
                            <span class="text-[9px] font-bold text-charcoal/40">Min</span>
                        </div>
                    </div>

                    <div
                        class="mt-5 pt-4 border-t border-charcoal/5 flex items-center gap-4 text-[10px] font-bold text-charcoal/50">
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-sm bg-merah-jcc"></span>
                            Minggu ini</span>
                        <span class="flex items-center gap-1.5"><span
                                class="w-2.5 h-2.5 rounded-sm bg-merah-jcc/25"></span>
                            Minggu lalu</span>
                    </div>
                </div>

                <div
                    class="reveal reveal-delay-1 lg:col-span-3 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-7 shadow-sm">
                    <div class="flex items-center justify-between mb-5 pb-4 border-b border-charcoal/5">
                        <div>
                            <h2 class="font-headline font-bold text-base text-charcoal">Aktivitas Terbaru</h2>
                            <p class="font-body text-[11px] text-secondary">3 aktivitas dalam 7 hari terakhir
                            </p>
                        </div>
                        <a href="#" class="text-xs font-bold text-merah-jcc hover:underline">Lihat
                            Semua</a>
                    </div>

                    <div class="space-y-1 relative">
                        <div class="absolute left-[19px] top-4 bottom-4 w-px bg-charcoal/10"></div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-charcoal shrink-0 group-hover:border-merah-jcc/40 group-hover:text-merah-jcc transition-colors">
                                <span class="material-symbols-outlined text-lg">edit_document</span>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Permintaan
                                        Booking Dibuat</h4>
                                    <span
                                        class="text-[9px] font-bold text-charcoal/40 bg-charcoal/5 px-2 py-0.5 rounded-full">Hari
                                        ini</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">Pemesanan <strong>Main
                                        Exhibition Hall</strong> berhasil diajukan.</p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">10:45
                                    AM</span>
                            </div>
                        </div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-emerald-600 shrink-0 group-hover:border-emerald-500/40 transition-colors">
                                <span class="material-symbols-outlined text-lg">check_circle</span>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Pembayaran
                                        Berhasil</h4>
                                    <span
                                        class="text-[9px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-0.5 rounded-full">Lunas</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">Tagihan
                                    <strong>INV-0982</strong> untuk Ruang Kolaborasi A telah lunas.
                                </p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">Kemarin,
                                    14:20</span>
                            </div>
                        </div>

                        <div class="relative flex gap-4 p-2.5 rounded-2xl hover:bg-cream-dark/40 transition-colors group">
                            <div
                                class="relative z-10 w-10 h-10 rounded-full bg-white border border-charcoal/10 flex items-center justify-center text-amber-600 shrink-0 group-hover:border-amber-500/40 transition-colors">
                                <span class="material-symbols-outlined text-lg">star</span>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Ulasan Diberikan
                                    </h4>
                                    <span class="text-amber-500 text-xs tracking-tight">★★★★★</span>
                                </div>
                                <p class="font-body text-xs text-secondary mt-0.5">Bintang 5 untuk
                                    <strong>Podcast Studio 1</strong>. Terima kasih!
                                </p>
                                <span class="text-[10px] font-bold text-secondary/50 mt-1 block">05 Sep 2026,
                                    09:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
