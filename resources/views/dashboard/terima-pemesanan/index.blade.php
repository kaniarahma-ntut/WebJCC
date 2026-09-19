@extends('dashboard.layouts.app')

@section('title', 'Terima Pemesanan - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER SECTION -->
        <div class="reveal revealed">
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                Terima Pemesanan
            </h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                Tinjau dan proses permintaan pemesanan ruangan dari pengguna.
            </p>
        </div>

        <!-- STATS CARDS -->
        <div class="reveal reveal-delay-1 grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
            <div class="bg-white border border-charcoal/5 rounded-2xl p-4 sm:p-5 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg">schedule</span>
                    </div>
                </div>
                <p class="font-headline font-extrabold text-2xl text-charcoal">5</p>
                <p class="text-[10px] font-bold text-secondary/60 uppercase tracking-widest mt-0.5">Menunggu</p>
            </div>
            <div class="bg-white border border-charcoal/5 rounded-2xl p-4 sm:p-5 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg">check_circle</span>
                    </div>
                </div>
                <p class="font-headline font-extrabold text-2xl text-charcoal">12</p>
                <p class="text-[10px] font-bold text-secondary/60 uppercase tracking-widest mt-0.5">Disetujui</p>
            </div>
            <div class="bg-white border border-charcoal/5 rounded-2xl p-4 sm:p-5 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-red-500/10 text-red-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg">cancel</span>
                    </div>
                </div>
                <p class="font-headline font-extrabold text-2xl text-charcoal">2</p>
                <p class="text-[10px] font-bold text-secondary/60 uppercase tracking-widest mt-0.5">Ditolak</p>
            </div>
            <div class="bg-white border border-charcoal/5 rounded-2xl p-4 sm:p-5 shadow-sm">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg">receipt_long</span>
                    </div>
                </div>
                <p class="font-headline font-extrabold text-2xl text-charcoal">19</p>
                <p class="text-[10px] font-bold text-secondary/60 uppercase tracking-widest mt-0.5">Total</p>
            </div>
        </div>

        <!-- FILTER & SEARCH -->
        <div class="reveal reveal-delay-2 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Filter Chips -->
            <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1 -mx-4 px-4 md:mx-0 md:px-0">
                <button id="filter-semua"
                    class="bg-charcoal text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0 shadow-md transition-all">
                    Semua
                </button>
                <button id="filter-menunggu"
                    class="bg-amber-500/10 text-amber-600 hover:bg-amber-500/20 transition-colors px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                    Menunggu
                </button>
                <button id="filter-disetujui"
                    class="bg-emerald-500/10 text-emerald-600 hover:bg-emerald-500/20 transition-colors px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                    Disetujui
                </button>
                <button id="filter-ditolak"
                    class="bg-red-500/10 text-red-600 hover:bg-red-500/20 transition-colors px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0">
                    Ditolak
                </button>
            </div>

            <!-- Search Bar -->
            <div
                class="flex items-center bg-white border border-charcoal/10 rounded-full px-4 py-2.5 w-full md:w-72 shadow-sm focus-within:border-merah-jcc focus-within:ring-1 focus-within:ring-merah-jcc transition-all group shrink-0">
                <span
                    class="material-symbols-outlined text-charcoal/40 text-lg transition-colors group-focus-within:text-merah-jcc shrink-0 mr-2">search</span>
                <input type="text" id="search-input" placeholder="Cari ID, nama, ruangan..."
                    class="bg-transparent border-none p-0 text-xs font-headline w-full focus:outline-none focus:ring-0 text-charcoal placeholder-charcoal/40" />
            </div>
        </div>

        <!-- DATA TABLE -->
        <div class="reveal reveal-delay-3 bg-white border border-charcoal/5 rounded-[28px] shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-charcoal/5">
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline">
                                ID Pesanan</th>
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline">
                                Pemesan</th>
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline hidden md:table-cell">
                                Ruangan</th>
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline hidden lg:table-cell">
                                Tanggal</th>
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline">
                                Status</th>
                            <th
                                class="px-5 py-4 text-[10px] font-bold text-secondary/60 uppercase tracking-widest font-headline text-right">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="booking-table" class="divide-y divide-charcoal/5">

                        <!-- ROW 1: Menunggu -->
                        <tr data-status="menunggu" data-search="JCC-2026-0018 Ahmad Fauzi Main Exhibition Hall 20 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0018</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-merah-jcc/10 text-merah-jcc font-headline font-bold text-[10px] shrink-0">AF</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Ahmad Fauzi</p>
                                        <p class="text-[11px] text-secondary">fauzi@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Main Exhibition Hall</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">20 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-500/10 text-amber-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Review
                                </a>
                            </td>
                        </tr>

                        <!-- ROW 2: Menunggu -->
                        <tr data-status="menunggu" data-search="JCC-2026-0017 Sari Dewi Focus Pod 03 22 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0017</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-amber-500/10 text-amber-600 font-headline font-bold text-[10px] shrink-0">SD</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Sari Dewi</p>
                                        <p class="text-[11px] text-secondary">sari.dewi@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Focus Pod 03</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">22 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-500/10 text-amber-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Review
                                </a>
                            </td>
                        </tr>

                        <!-- ROW 3: Disetujui -->
                        <tr data-status="disetujui" data-search="JCC-2026-0016 Budi Santoso Creative Studio B 18 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0016</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-emerald-500/10 text-emerald-600 font-headline font-bold text-[10px] shrink-0">BS</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Budi Santoso</p>
                                        <p class="text-[11px] text-secondary">budi.s@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Creative Studio B</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">18 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-500/10 text-emerald-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Disetujui
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Lihat
                                </a>
                            </td>
                        </tr>

                        <!-- ROW 4: Ditolak -->
                        <tr data-status="ditolak" data-search="JCC-2026-0015 Rina Marlina Meeting Room C 16 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group opacity-60">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0015</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-red-500/10 text-red-600 font-headline font-bold text-[10px] shrink-0">RM</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Rina Marlina</p>
                                        <p class="text-[11px] text-secondary">rina.m@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Meeting Room C</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">16 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-red-500/10 text-red-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                    Ditolak
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Lihat
                                </a>
                            </td>
                        </tr>

                        <!-- ROW 5: Menunggu -->
                        <tr data-status="menunggu" data-search="JCC-2026-0014 Dimas Prayoga Workshop Area 24 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0014</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-merah-jcc/10 text-merah-jcc font-headline font-bold text-[10px] shrink-0">DP</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Dimas Prayoga</p>
                                        <p class="text-[11px] text-secondary">dimas.p@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Workshop Area</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">24 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-amber-500/10 text-amber-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Review
                                </a>
                            </td>
                        </tr>

                        <!-- ROW 6: Disetujui -->
                        <tr data-status="disetujui" data-search="JCC-2026-0013 Putri Aulia Meeting Room A 14 Sep 2026"
                            class="hover:bg-cream-dark/30 transition-colors cursor-pointer group">
                            <td class="px-5 py-4">
                                <span class="font-headline font-bold text-sm text-charcoal">JCC-2026-0013</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid w-8 h-8 place-items-center rounded-full bg-emerald-500/10 text-emerald-600 font-headline font-bold text-[10px] shrink-0">PA</span>
                                    <div>
                                        <p class="font-headline font-bold text-xs text-charcoal">Putri Aulia</p>
                                        <p class="text-[11px] text-secondary">putri.a@mail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">Meeting Room A</span>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-xs text-charcoal/80 font-headline font-semibold">14 Sep 2026</span>
                            </td>
                            <td class="px-5 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-500/10 text-emerald-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Disetujui
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="/dashboard/terima-pemesanan/detail"
                                    class="inline-flex items-center gap-1.5 bg-charcoal/5 text-charcoal/70 hover:bg-merah-jcc hover:text-broken-white px-3 py-2 rounded-xl text-[10px] font-headline font-bold transition-all">
                                    <span class="material-symbols-outlined text-[14px]">visibility</span>
                                    Lihat
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Empty State (hidden by default) -->
            <div id="empty-state" class="hidden py-16 text-center">
                <span class="material-symbols-outlined text-5xl text-charcoal/15 mb-3 block">search_off</span>
                <p class="font-headline font-bold text-sm text-charcoal/40">Tidak ada pemesanan ditemukan</p>
            </div>

            <!-- Pagination -->
            <div class="px-5 py-4 border-t border-charcoal/5 flex items-center justify-between">
                <p class="text-[11px] font-body text-secondary">Menampilkan 1-6 dari 19 pesanan</p>
                <div class="flex items-center gap-1.5">
                    <button
                        class="w-8 h-8 rounded-lg border border-charcoal/10 flex items-center justify-center text-charcoal/40 text-sm">
                        <span class="material-symbols-outlined text-[16px]">chevron_left</span>
                    </button>
                    <button
                        class="w-8 h-8 rounded-lg bg-merah-jcc text-broken-white flex items-center justify-center text-xs font-headline font-bold shadow-sm">1</button>
                    <button
                        class="w-8 h-8 rounded-lg border border-charcoal/10 flex items-center justify-center text-charcoal/60 text-xs font-headline font-bold hover:bg-charcoal/5 transition-colors">2</button>
                    <button
                        class="w-8 h-8 rounded-lg border border-charcoal/10 flex items-center justify-center text-charcoal/60 text-xs font-headline font-bold hover:bg-charcoal/5 transition-colors">3</button>
                    <button
                        class="w-8 h-8 rounded-lg border border-charcoal/10 flex items-center justify-center text-charcoal/40 text-sm">
                        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('search-input');
            const tableBody = document.getElementById('booking-table');
            const rows = tableBody.querySelectorAll('tr');
            const emptyState = document.getElementById('empty-state');
            const filterBtns = {
                semua: document.getElementById('filter-semua'),
                menunggu: document.getElementById('filter-menunggu'),
                disetujui: document.getElementById('filter-disetujui'),
                ditolak: document.getElementById('filter-ditolak'),
            };
            let activeFilter = 'semua';

            const applyFilters = () => {
                const query = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                rows.forEach(row => {
                    const status = row.dataset.status;
                    const searchText = (row.dataset.search || '').toLowerCase() + ' ' + row.textContent.toLowerCase();
                    const matchesFilter = activeFilter === 'semua' || status === activeFilter;
                    const matchesSearch = !query || searchText.includes(query);

                    if (matchesFilter && matchesSearch) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                emptyState.classList.toggle('hidden', visibleCount > 0);
            };

            const setActiveFilter = (key) => {
                activeFilter = key;
                Object.entries(filterBtns).forEach(([k, btn]) => {
                    if (k === key) {
                        btn.className = 'bg-charcoal text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0 shadow-md transition-all';
                    } else {
                        const colors = {
                            menunggu: 'bg-amber-500/10 text-amber-600 hover:bg-amber-500/20',
                            disetujui: 'bg-emerald-500/10 text-emerald-600 hover:bg-emerald-500/20',
                            ditolak: 'bg-red-500/10 text-red-600 hover:bg-red-500/20',
                        };
                        btn.className = `${colors[k]} transition-colors px-5 py-2.5 rounded-full font-headline font-bold text-xs shrink-0`;
                    }
                });
                applyFilters();
            };

            Object.entries(filterBtns).forEach(([key, btn]) => {
                btn.addEventListener('click', () => setActiveFilter(key));
            });

            searchInput.addEventListener('input', applyFilters);
        });
    </script>
@endsection