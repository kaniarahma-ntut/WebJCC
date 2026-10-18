<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Dashboard Jember Creative Center">

    <title>Dashboard - Jember Creative Center</title>
    <link rel="icon" type="image/png" href="{{ asset('LOGO JCC.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, .12);
            border-radius: 99px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, .22);
        }

        .reveal {
            opacity: 0;
            transform: translateY(24px) scale(.98);
            transition: opacity .7s cubic-bezier(.22, 1, .36, 1), transform .7s cubic-bezier(.22, 1, .36, 1);
        }

        .reveal.revealed {
            opacity: 1;
            transform: none;
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-14px) rotate(6deg);
            }
        }

        .animate-floaty {
            animation: floaty 6s ease-in-out infinite;
        }

        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(24px, -18px) scale(1.08);
            }

            66% {
                transform: translate(-16px, 12px) scale(.94);
            }
        }

        .animate-blob {
            animation: blob 12s ease-in-out infinite;
        }

        /* Sidebar Styling */
        #sidebar {
            width: 20rem;
            transition: width .35s cubic-bezier(.22, 1, .36, 1), transform .35s cubic-bezier(.22, 1, .36, 1);
        }

        /* RESPONSIVE FIX: Margin kiri konten utama HANYA aktif di ukuran MD ke atas */
        @media (min-width: 768px) {
            #sidebar.mini {
                width: 5.75rem;
            }

            #sidebar.mini .sidebar-label,
            #sidebar.mini .profile-text,
            #sidebar.mini .brand-text,
            #sidebar.mini .sidebar-badge {
                display: none;
            }

            #sidebar.mini nav a,
            #sidebar.mini .sidebar-foot-link,
            #sidebar.mini .cta-inner {
                justify-content: center;
                padding-left: 0;
                padding-right: 0;
            }

            #sidebar.mini .profile-badge {
                flex-direction: column;
                gap: .25rem;
            }

            #sidebar.mini .cta-inner {
                width: 3rem;
                height: 3rem;
                padding: 0;
                border-radius: 99px;
            }

            .main-content-wrapper {
                margin-left: 20rem;
                transition: margin-left .35s cubic-bezier(.22, 1, .36, 1);
            }

            #sidebar.mini~.main-content-wrapper {
                margin-left: 5.75rem;
            }
        }

        .card-hover {
            transition: transform .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease, border-color .35s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -12px rgba(0, 0, 0, .14);
            border-color: rgba(0, 0, 0, .16);
        }

        /* Modal */
        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes pop-in {
            from {
                opacity: 0;
                transform: translateY(16px) scale(.96);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .modal-backdrop {
            animation: fade-in .2s ease both;
        }

        .modal-card {
            animation: pop-in .3s cubic-bezier(.22, 1, .36, 1) both;
        }
    </style>
</head>

<body class="bg-broken-white text-charcoal font-body antialiased min-h-screen">
    <div class="min-h-screen relative flex">

        <aside id="sidebar"
            class="bg-cream-dark/95 backdrop-blur-xl border-r border-charcoal/10 flex flex-col z-50 fixed top-0 h-screen -translate-x-full md:translate-x-0 shadow-2xl md:shadow-none">

            @php
                $userName = Auth::user()->nama_user ?? 'Pengguna';
                $userRole = Auth::user()->user_role ?? 'user';
                $roleLabels = [
                    'komunitas' => 'Komunitas',
                    'tenant' => 'Tenant',
                    'talent' => 'Talent',
                    'user' => 'Anggota',
                ];
                $roleLabel = $roleLabels[$userRole] ?? 'Anggota';   
                $nameParts = preg_split('/\s+/', trim($userName));
                $initials = mb_strtoupper(mb_substr($nameParts[0] ?? '', 0, 1) . mb_substr($nameParts[1] ?? '', 0, 1));
                if ($initials === '') {
                    $initials = 'U';
                }
            @endphp

            <!-- Konten Sidebar -->
            <div class="p-5 md:p-6 flex-1 overflow-y-auto overflow-x-hidden space-y-6 md:space-y-8 no-scrollbar">

                <!-- Brand Logo -->
                <div class="flex items-center justify-between gap-2">
                    <a href="#" class="flex items-center gap-2.5 shrink-0">
                        <img src="{{ asset('LOGO JCC.png') }}" class="w-10" alt="Logo">
                        <span class="brand-text font-headline text-xl font-extrabold text-merah-jcc tracking-tight">
                            JCC<span class="text-charcoal">.</span>
                        </span>
                    </a>
                    <button id="sidebar-collapse"
                        class="hidden md:grid w-8 h-8 place-items-center rounded-full border border-charcoal/10 text-charcoal/50 hover:text-merah-jcc hover:border-merah-jcc/40 transition-colors"
                        title="Ciutkan sidebar">
                        <span class="material-symbols-outlined text-lg" id="collapse-icon">chevron_left</span>
                    </button>
                </div>

                <!-- Profile Info Badge -->
                <div class="profile-badge flex items-center gap-3 py-2 border-b border-charcoal/10">
                    <div class="relative shrink-0">
                        <span
                            class="inline-grid w-11 h-11 place-items-center rounded-full bg-merah-jcc text-broken-white font-headline font-bold text-sm ring-2 ring-merah-jcc/60 ring-offset-2 ring-offset-cream-dark">{{ $initials }}</span>
                        <span
                            class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-cream-dark rounded-full"></span>
                    </div>
                    <div class="profile-text overflow-hidden">
                        <h4 class="font-headline font-bold text-xs text-charcoal truncate">{{ $userName }}</h4>
                        <p class="font-body text-[11px] text-secondary truncate">{{ $roleLabel }}</p>
                    </div>
                </div>

                <!-- Action Button -->
                <a href="/jelajahi"
                    class="cta-inner w-full bg-merah-jcc hover:bg-rose-700 text-broken-white py-3 px-4 rounded-full font-headline font-bold text-xs tracking-wider shadow-lg shadow-merah-jcc/25 hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-2 group/cta">
                    <span
                        class="material-symbols-outlined text-sm group-hover/cta:rotate-90 transition-transform duration-300">add</span>
                    <span class="sidebar-label">Pesan Ruangan</span>
                </a>

                <!-- Navigation -->
                <nav class="space-y-1.5 font-headline font-bold text-xs">
                    <p class="sidebar-label px-4 pb-1 text-[10px] font-bold uppercase tracking-widest text-charcoal/30">
                        Menu Utama</p>

                    <!-- Dasbor -->
                    <a href="/dashboard"
                        class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                        <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>grid_view</span>
                        <span class="sidebar-label flex-1">Dasbor</span>
                        @if (request()->is('dashboard'))
                            <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                        @endif
                    </a>

                    @if ($userRole === 'admin_JCC')
                        <!-- Manajemen Ruangan -->
                        <a href="/dashboard/manajemen-ruangan"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/manajemen-ruangan*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard/manajemen-ruangan*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>meeting_room</span>
                            <span class="sidebar-label flex-1">Manajemen Ruangan</span>
                            @if (request()->is('dashboard/manajemen-ruangan*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>

                        <!-- Manajemen Barang -->
                        <a href="/dashboard/manajemen-barang"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/manajemen-barang*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard/manajemen-barang*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>inventory_2</span>
                            <span class="sidebar-label flex-1">Manajemen Barang</span>
                            @if (request()->is('dashboard/manajemen-barang*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>

                        <!-- Manajemen Pengguna -->
                        <a href="/dashboard/manajemen-pengguna"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/manajemen-pengguna*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard/manajemen-pengguna*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>group</span>
                            <span class="sidebar-label flex-1">Manajemen Pengguna</span>
                            @if (request()->is('dashboard/manajemen-pengguna*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>

                        <!-- Manajemen Booking -->
                        <a href="/dashboard/riwayat-booking"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/riwayat-booking*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg"
                                {!! request()->is('dashboard/riwayat-booking*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>calendar_month</span>
                            <span class="sidebar-label flex-1">Manajemen Booking</span>
                            @if (request()->is('dashboard/riwayat-booking*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>

                        <!-- Manajemen Artikel -->
                        <a href="/dashboard/manajemen-artikel"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/manajemen-artikel*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard/manajemen-artikel*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>article</span>
                            <span class="sidebar-label flex-1">Manajemen Artikel</span>
                            @if (request()->is('dashboard/manajemen-artikel*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>

                        
                    @elseif ($userRole === 'admin_Disporabudpar')
                        <!-- Terima Pemesanan -->
                        <a href="/dashboard/terima-pemesanan"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/terima-pemesanan*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg" {!! request()->is('dashboard/terima-pemesanan*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>task_alt</span>
                            <span class="sidebar-label flex-1">Terima Pemesanan</span>
                            @if (request()->is('dashboard/terima-pemesanan*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>
                    @else
                        <!-- Riwayat Booking -->
                        <a href="/dashboard/riwayat-booking"
                            class="nav-link flex items-center gap-3 px-4 py-3 rounded-2xl transition-all {{ request()->is('dashboard/riwayat-booking*') ? 'bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25' : 'text-charcoal/70 hover:bg-charcoal/5 hover:text-merah-jcc' }}">
                            <span class="material-symbols-outlined text-lg"
                                {!! request()->is('dashboard/riwayat-booking*') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>calendar_month</span>
                            <span class="sidebar-label flex-1">Riwayat Booking</span>
                            @if (request()->is('dashboard/riwayat-booking*'))
                                <span class="sidebar-badge w-1.5 h-1.5 rounded-full bg-broken-white"></span>
                            @endif
                        </a>
                    @endif

                </nav>
            </div>

            <!-- Footer Sidebar -->
            <div
                class="p-5 md:p-6 border-t border-charcoal/10 space-y-1 font-headline font-bold text-xs text-charcoal/60">
                <a href="https://web.whatsapp.com/#" target="_blank"
                    class="sidebar-foot-link flex items-center gap-3 px-3 py-2 hover:text-merah-jcc transition-colors">
                    <span class="material-symbols-outlined text-base">help</span>
                    <span class="sidebar-label">Dukungan</span>
                </a>
                <button type="button" id="logout-trigger"
                    class="sidebar-foot-link w-full flex items-center gap-3 px-3 py-2 text-merah-jcc/70 hover:text-merah-jcc transition-colors">
                    <span class="material-symbols-outlined text-base">logout</span>
                    <span class="sidebar-label">Keluar</span>
                </button>
            </div>
        </aside>

        <div id="sidebar-overlay" class="fixed inset-0 bg-charcoal/50 backdrop-blur-sm z-40 hidden md:hidden"></div>


        <div class="flex-1 flex flex-col min-h-screen bg-[#FBF9F6] main-content-wrapper min-w-0">

            <header
                class="bg-white shadow-md backdrop-blur-lg border-b border-charcoal/10 px-4 md:px-8 py-3.5 flex items-center justify-between gap-3 z-30 sticky top-0">

                <!-- Kiri -->
                <div class="flex items-center gap-3 md:gap-4 min-w-0">
                    <button id="sidebar-toggle"
                        class="md:hidden text-charcoal p-1.5 hover:bg-charcoal/5 rounded-lg transition-colors shrink-0">
                        <span class="material-symbols-outlined text-2xl">menu</span>
                    </button>

                    <span class="md:hidden font-headline text-lg font-extrabold text-merah-jcc shrink-0">JCC<span
                            class="text-charcoal">.</span></span>

                    <!-- Announcement Pill -->
                    <div
                        class="hidden sm:flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 px-4 py-1.5 rounded-full min-w-0">
                        <span
                            class="material-symbols-outlined text-amber-600 text-[16px] animate-bounce shrink-0">campaign</span>
                        <span class="font-headline font-bold text-[11px] text-charcoal tracking-wide truncate">
                            Info JCC: <span class="font-medium text-secondary">Pemeliharaan server 12 Sep, 00:00
                                WIB</span>
                        </span>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="flex items-center gap-2 md:gap-4 shrink-0">

                    <!-- Search Bar -->
                    <div
                        class="hidden md:flex items-center bg-white border border-charcoal/10 rounded-full px-4 py-2 w-48 lg:w-64 shadow-sm focus-within:border-merah-jcc focus-within:ring-1 focus-within:ring-merah-jcc focus-within:w-72 lg:focus-within:w-80 transition-all group">
                        <span
                            class="material-symbols-outlined text-charcoal/40 text-lg transition-colors group-focus-within:text-merah-jcc shrink-0 mr-3">search</span>
                        <input type="text" placeholder="Cari fasilitas, invoice..."
                            class="bg-transparent border-none p-0 text-xs font-headline w-full focus:outline-none focus:ring-0 text-charcoal placeholder-charcoal/40" />
                        <kbd
                            class="hidden lg:inline-block text-[9px] font-bold text-charcoal/30 border border-charcoal/15 rounded px-1.5 py-0.5">Ctrl
                            K</kbd>
                    </div>

                    <button class="md:hidden p-2 text-charcoal/70 hover:bg-charcoal/5 rounded-full transition-colors">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </button>

                    <div class="hidden md:block w-px h-6 bg-charcoal/10"></div>

                    <!-- Notification -->
                    <div class="relative">
                        <button id="notif-btn"
                            class="relative p-2 text-charcoal/70 hover:text-merah-jcc hover:bg-merah-jcc/10 rounded-full transition-colors">
                            <span class="material-symbols-outlined text-xl">notifications</span>
                            <span
                                class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-merah-jcc border-2 border-[#FBF9F6] rounded-full animate-pulse"></span>
                        </button>

                        <!-- Dropdown Notifikasi -->
                        <div id="notif-panel"
                            class="hidden absolute right-0 mt-3 w-80 max-w-[calc(100vw-2rem)] bg-white border border-charcoal/10 rounded-3xl shadow-2xl shadow-charcoal/10 overflow-hidden origin-top-right transition-all z-50">
                            <div class="px-5 py-4 border-b border-charcoal/5 flex items-center justify-between">
                                <h4 class="font-headline font-bold text-sm">Notifikasi</h4>
                                <span
                                    class="text-[10px] font-bold text-merah-jcc bg-merah-jcc/10 px-2 py-1 rounded-full">3
                                    Baru</span>
                            </div>
                            <div class="max-h-72 overflow-y-auto no-scrollbar divide-y divide-charcoal/5">
                                <a href="#"
                                    class="flex gap-3 px-5 py-3.5 hover:bg-cream-dark/50 transition-colors">
                                    <span
                                        class="w-8 h-8 rounded-full bg-merah-jcc/10 text-merah-jcc flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-base">event_available</span>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="font-headline font-bold text-xs text-charcoal">Booking dikonfirmasi
                                        </p>
                                        <p class="font-body text-[11px] text-secondary truncate">Main Exhibition Hall ·
                                            15 Sep 2026</p>
                                    </div>
                                </a>
                                <a href="#"
                                    class="flex gap-3 px-5 py-3.5 hover:bg-cream-dark/50 transition-colors">
                                    <span
                                        class="w-8 h-8 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-base">payments</span>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="font-headline font-bold text-xs text-charcoal">Invoice menunggu bayar
                                        </p>
                                        <p class="font-body text-[11px] text-secondary truncate">INV-0983 · Rp 350.000
                                        </p>
                                    </div>
                                </a>
                                <a href="#"
                                    class="flex gap-3 px-5 py-3.5 hover:bg-cream-dark/50 transition-colors">
                                    <span
                                        class="w-8 h-8 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-base">stars</span>
                                    </span>
                                    <div class="min-w-0">
                                        <p class="font-headline font-bold text-xs text-charcoal">Poin reward bertambah
                                        </p>
                                        <p class="font-body text-[11px] text-secondary truncate">+50 poin dari ulasan
                                            bintang 5</p>
                                    </div>
                                </a>
                            </div>
                            <a href="#"
                                class="block text-center py-3 text-[11px] font-bold text-merah-jcc hover:bg-merah-jcc/5 transition-colors border-t border-charcoal/5">Lihat
                                Semua</a>
                        </div>
                    </div>

                    <!-- Avatar chip (desktop) -->
                    <div class="relative hidden md:block">
                        <button id="avatar-btn"
                            class="flex items-center gap-1.5 pl-1 pr-1.5 py-1 rounded-full hover:bg-charcoal/5 transition-colors">
                            <span
                                class="inline-grid w-8 h-8 place-items-center rounded-full bg-merah-jcc text-broken-white font-headline font-bold text-xs ring-2 ring-merah-jcc/40">{{ $initials }}</span>
                            <span id="avatar-chevron"
                                class="material-symbols-outlined text-charcoal/40 text-lg transition-transform">expand_more</span>
                        </button>

                        <!-- Dropdown Profil -->
                        <div id="avatar-panel"
                            class="hidden absolute right-0 mt-3 w-64 bg-white border border-charcoal/10 rounded-2xl shadow-2xl shadow-charcoal/10 overflow-hidden origin-top-right z-50">
                            <div class="px-4 py-3.5 border-b border-charcoal/5">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-10 h-10 place-items-center rounded-full bg-merah-jcc/10 text-merah-jcc font-headline font-bold text-sm shrink-0">{{ $initials }}</span>
                                    <div class="min-w-0">
                                        <p class="font-headline font-bold text-sm text-charcoal truncate">
                                            {{ $userName }}</p>
                                        <p class="font-body text-[11px] text-secondary truncate">{{ $roleLabel }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('profil') }}"
                                class="flex items-center gap-2.5 px-4 py-2.5 font-headline font-semibold text-xs text-charcoal/80 hover:bg-charcoal/5 transition-colors">
                                <span
                                    class="material-symbols-outlined text-base text-charcoal/50">account_circle</span>
                                Lihat Profil
                            </a>

                            <div class="border-t border-charcoal/5 my-1"></div>
                            <button type="button" id="avatar-logout"
                                class="w-full flex items-center gap-2.5 px-4 py-2.5 font-headline font-semibold text-xs text-merah-jcc hover:bg-merah-jcc/5 transition-colors">
                                <span class="material-symbols-outlined text-base">logout</span>
                                Keluar
                            </button>
                        </div>
                    </div>
                </div>
            </header>


            <main class="flex-1 p-4 md:p-8 lg:p-10">
                @yield('dashboard-content')
                <footer
                    class="flex flex-col sm:flex-row items-center justify-between gap-2 pt-2 text-[11px] font-body text-charcoal/40">
                    <p>© 2026 Jember Creative Center. Semua hak dilindungi.</p>
                    <p class="flex items-center gap-1">Dibuat dengan <span
                            class="material-symbols-outlined text-[14px] text-merah-jcc"
                            style="font-variation-settings: 'FILL' 1;">favorite</span> di Jember</p>
                </footer>

            </main>
        </div>

    </div>

    <!-- Modal Konfirmasi Logout -->
    <div id="logout-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div id="logout-modal-backdrop" class="modal-backdrop absolute inset-0 bg-charcoal/60 backdrop-blur-sm"></div>

        <div class="modal-card relative w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="px-6 sm:px-8 py-7 sm:py-8 text-center">
                <div
                    class="w-16 h-16 mx-auto rounded-full bg-merah-jcc/10 text-merah-jcc flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl"
                        style="font-variation-settings: 'FILL' 1;">logout</span>
                </div>
                <h3 class="mt-4 font-headline font-bold text-lg text-charcoal">Yakin ingin keluar?</h3>
                <p class="mt-1.5 text-sm text-secondary leading-relaxed">Sesi kamu akan berakhir dan kamu perlu masuk
                    kembali untuk mengakses dashboard.</p>
            </div>

            <div class="grid grid-cols-2 gap-3 px-6 sm:px-8 pb-7 sm:pb-8">
                <button type="button" id="logout-cancel"
                    class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border border-charcoal/10 text-charcoal/60 hover:bg-charcoal/5 transition-colors">Batal</button>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit"
                        class="w-full py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-merah-jcc text-broken-white shadow-lg shadow-merah-jcc/25 hover:bg-rose-700 transition-colors">Keluar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            const openDrawer = () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            };
            const closeDrawer = () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            };

            if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
            if (overlay) overlay.addEventListener('click', closeDrawer);

            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) closeDrawer();
                });
            });

            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeDrawer();
            });

            const collapseBtn = document.getElementById('sidebar-collapse');
            const collapseIcon = document.getElementById('collapse-icon');

            if (localStorage.getItem('jcc_sidebar_mini') === '1') {
                sidebar.classList.add('mini');
                if (collapseIcon) collapseIcon.textContent = 'chevron_right';
            }

            if (collapseBtn) {
                collapseBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('mini');
                    const isMini = sidebar.classList.contains('mini');
                    localStorage.setItem('jcc_sidebar_mini', isMini ? '1' : '0');
                    if (collapseIcon) collapseIcon.textContent = isMini ? 'chevron_right' : 'chevron_left';
                });
            }

            const notifBtn = document.getElementById('notif-btn');
            const notifPanel = document.getElementById('notif-panel');

            if (notifBtn && notifPanel) {
                notifBtn.addEventListener('click', e => {
                    e.stopPropagation();
                    notifPanel.classList.toggle('hidden');
                });
                document.addEventListener('click', e => {
                    if (!notifPanel.contains(e.target)) notifPanel.classList.add('hidden');
                });
            }

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            const animateCounter = el => {
                const target = +el.dataset.target;
                const duration = 1200;
                const start = performance.now();
                const step = now => {
                    const p = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.round(target * eased);
                    if (p < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            };
            const counterObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });
            document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));

            const chart = document.getElementById('usage-chart');
            if (chart) {
                const chartObserver = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            chart.classList.add('chart-loaded');
                            chartObserver.unobserve(chart);
                        }
                    });
                }, {
                    threshold: 0.3
                });
                chartObserver.observe(chart);
            }

            window.addEventListener('scroll', () => {
                const max = document.documentElement.scrollHeight - window.innerHeight;
                const progress = document.getElementById('scroll-progress');
                if (progress) {
                    progress.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
                }
            });

            document.addEventListener('keydown', e => {
                if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                    e.preventDefault();
                    const input = document.querySelector('input[type="text"]');
                    if (input) input.focus();
                }
            });

            const avatarBtn = document.getElementById('avatar-btn');
            const avatarPanel = document.getElementById('avatar-panel');
            const avatarChevron = document.getElementById('avatar-chevron');

            if (avatarBtn && avatarPanel) {
                avatarBtn.addEventListener('click', e => {
                    e.stopPropagation();
                    avatarPanel.classList.toggle('hidden');
                    if (avatarChevron) avatarChevron.classList.toggle('rotate-180');
                });
                document.addEventListener('click', e => {
                    if (!avatarPanel.contains(e.target) && !avatarBtn.contains(e.target)) {
                        avatarPanel.classList.add('hidden');
                        if (avatarChevron) avatarChevron.classList.remove('rotate-180');
                    }
                });
            }

            const logoutTrigger = document.getElementById('logout-trigger');
            const logoutModal = document.getElementById('logout-modal');
            const logoutCancel = document.getElementById('logout-cancel');
            const logoutBackdrop = document.getElementById('logout-modal-backdrop');

            if (logoutTrigger && logoutModal) {
                const openLogoutModal = () => {
                    logoutModal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                    closeDrawer();
                };
                const closeLogoutModal = () => {
                    logoutModal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                };

                logoutTrigger.addEventListener('click', openLogoutModal);
                logoutCancel.addEventListener('click', closeLogoutModal);
                logoutBackdrop.addEventListener('click', closeLogoutModal);

                const avatarLogout = document.getElementById('avatar-logout');
                if (avatarLogout) {
                    avatarLogout.addEventListener('click', () => {
                        if (avatarPanel) avatarPanel.classList.add('hidden');
                        if (avatarChevron) avatarChevron.classList.remove('rotate-180');
                        openLogoutModal();
                    });
                }

                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && !logoutModal.classList.contains('hidden')) {
                        closeLogoutModal();
                    }
                });
            }
        });
    </script>
</body>

</html>
