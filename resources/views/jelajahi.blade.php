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

            <!-- LEFT COLUMN: Grid 8 Kartu Pilihan (Col-Span 7) -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4" id="room-grid">

                <!-- Card 1 (Active Default) -->
                <div data-id="1" data-type="room"
                    class="room-card active group bg-surface-container-highest/60 border-2 border-merah-jcc rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 shadow-sm hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Ruang Kolaborasi A" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.9
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Ruang Kolaborasi A</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span>
                            8-12 Orang</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">square_foot</span> 24 m²</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 150k <span
                            class="text-[11px] text-secondary font-normal">/jam</span></p>
                </div>

                <!-- Card 2 -->
                <div data-id="2" data-type="room"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Meeting Room Glass" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.8
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Meeting Room Glass</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span>
                            100+ Orang</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">square_foot</span> 150 m²</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 250k <span
                            class="text-[11px] text-secondary font-normal">/jam</span></p>
                </div>

                <!-- Card 3 -->
                <div data-id="3" data-type="room"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Aula Kreatif" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 5.0
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Aula Kreatif Utama</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span>
                            100+ Orang</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">square_foot</span> 150 m²</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 1.5M <span
                            class="text-[11px] text-secondary font-normal">/hari</span></p>
                </div>

                <!-- Card 4 -->
                <div data-id="4" data-type="items"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Podcast Studio 1" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.9
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Podcast Studio Pro</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">mic</span> 4
                            Mic Set</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">videocam</span> 4K Cam</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 100k <span
                            class="text-[11px] text-secondary font-normal">/jam</span></p>
                </div>

                <!-- Card 5 -->
                <div data-id="5" data-type="room"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Private Desk Space" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.7
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Private Desk Space</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">person</span> 1 Orang</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">wifi</span>
                            High Speed</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 35k <span
                            class="text-[11px] text-secondary font-normal">/jam</span></p>
                </div>

                <!-- Card 6 -->
                <div data-id="6" data-type="room"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Studio Foto & Video" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.9
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Studio Foto & Visual</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">group</span>
                            5-10 Orang</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">light</span>
                            Lighting Set</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 200k <span
                            class="text-[11px] text-secondary font-normal">/jam</span></p>
                </div>

                <!-- Card 7 -->
                <div data-id="7" data-type="items"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Sony Mirrorless Kit" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.8
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Camera Kit Mirrorless</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">photo_camera</span> 4K Video</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">crop_original</span> 2 Lens</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 150k <span
                            class="text-[11px] text-secondary font-normal">/hari</span></p>
                </div>

                <!-- Card 8 -->
                <div data-id="8" data-type="items"
                    class="room-card group bg-cream-dark/40 border-2 border-transparent hover:border-charcoal/10 rounded-[22px] p-3.5 cursor-pointer transition-all duration-300 hover:shadow-md">
                    <div class="relative aspect-[16/10] rounded-[16px] overflow-hidden mb-3">
                        <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=600&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="Drawing Tablet Screen" />
                        <div
                            class="absolute top-2.5 right-2.5 bg-broken-white/90 backdrop-blur-md px-2 py-0.5 rounded-full flex items-center gap-0.5 text-[10px] font-bold text-charcoal shadow-sm">
                            <span class="material-symbols-outlined text-amber-500 text-xs fill-1">star</span> 4.9
                        </div>
                    </div>
                    <h3
                        class="font-headline font-bold text-base text-charcoal group-hover:text-merah-jcc transition-colors truncate">
                        Pen Display Tablet</h3>
                    <div class="flex items-center gap-3 text-[11px] text-secondary my-1.5">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-xs">draw</span>
                            24 Inch</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-xs">stylus</span> Pro Pen 2</span>
                    </div>
                    <p class="font-headline font-extrabold text-merah-jcc text-sm mt-1">Rp 80k <span
                            class="text-[11px] text-secondary font-normal">/hari</span></p>
                </div>

            </div>
            <!-- RIGHT COLUMN: Panel Detail Konfirmasi Sticky (Col-Span 5) -->
            <div class="lg:col-span-5 sticky top-28 z-30">
                <div
                    class="bg-slate-700 text-broken-white rounded-[32px] p-6 space-y-5 shadow-2xl border border-white/10 relative overflow-hidden">

                    <!-- Decorative Badge Accent -->
                    <div
                        class="absolute -top-12 -right-12 w-32 h-32 bg-merah-jcc/20 rounded-full blur-2xl pointer-events-none">
                    </div>

                    <!-- Section Header -->
                    <div class="flex items-center justify-between pb-3 border-b border-white/10">
                        <span class="text-[11px] font-bold tracking-widest text-merah-jcc uppercase">Ringkasan
                            Konfirmasi</span>
                        <span id="detail-type-tag"
                            class="bg-white/10 text-broken-white text-[10px] font-bold px-2.5 py-0.5 rounded-full">ROOM</span>
                    </div>

                    <!-- Main Image Preview -->
                    <div class="relative aspect-[16/9] rounded-[20px] overflow-hidden border border-white/10 shadow-inner">
                        <img id="detail-img"
                            src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover transition-all duration-500" alt="Detail Image" />
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-black/50 backdrop-blur-md rounded-full flex items-center justify-center text-broken-white hover:text-merah-jcc transition-colors">
                            <span class="material-symbols-outlined text-base">favorite</span>
                        </button>
                    </div>

                    <!-- Title & Rating Header -->
                    <div>
                        <div class="flex items-start justify-between gap-2 mb-1">
                            <h2 id="detail-title" class="font-headline text-xl font-bold text-broken-white">Ruang
                                Kolaborasi A</h2>
                            <span id="detail-rating"
                                class="bg-merah-jcc/20 text-broken-white text-[11px] font-bold px-2.5 py-0.5 rounded-full flex items-center gap-1 shrink-0 border border-merah-jcc/40">
                                <span class="material-symbols-outlined text-xs fill-1 text-amber-400">star</span> 4.9
                            </span>
                        </div>
                        <p id="detail-desc" class="font-body text-broken-white/70 text-xs leading-relaxed line-clamp-2">
                            Ruang kerja komunal yang dirancang untuk mendukung produktivitas dan kolaborasi spontan.
                            Dilengkapi dengan pencahayaan alami yang optimal.
                        </p>
                    </div>

                    <!-- Info Badges (Kapasitas & Luas) -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-white/5 border border-white/10 p-3 rounded-[16px] flex items-center gap-2.5">
                            <div
                                class="w-8 h-8 rounded-full bg-merah-jcc/20 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">group</span>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[9px] uppercase font-bold text-broken-white/50 tracking-wider">Kapasitas</p>
                                <p id="detail-capacity"
                                    class="font-headline font-bold text-xs text-broken-white truncate">8-12 Orang</p>
                            </div>
                        </div>

                        <div class="bg-white/5 border border-white/10 p-3 rounded-[16px] flex items-center gap-2.5">
                            <div
                                class="w-8 h-8 rounded-full bg-merah-jcc/20 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm">square_foot</span>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[9px] uppercase font-bold text-broken-white/50 tracking-wider">Spesifikasi
                                </p>
                                <p id="detail-area" class="font-headline font-bold text-xs text-broken-white truncate">24
                                    m²</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facilities List -->
                    <div>
                        <h4 class="font-headline font-bold text-xs text-broken-white/90 mb-2">Fasilitas Termasuk</h4>
                        <div class="flex flex-wrap gap-1.5" id="detail-facilities">
                            <span
                                class="bg-white/10 text-broken-white/90 text-[11px] px-3 py-1 rounded-full flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-xs">wifi</span> WiFi 100Mbps
                            </span>
                            <span
                                class="bg-white/10 text-broken-white/90 text-[11px] px-3 py-1 rounded-full flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-xs">tv</span> Smart TV 55"
                            </span>
                            <span
                                class="bg-white/10 text-broken-white/90 text-[11px] px-3 py-1 rounded-full flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-xs">local_cafe</span> Coffee
                            </span>
                        </div>
                    </div>

                    <!-- Pricing & CTA Action -->
                    <div class="pt-3 border-t border-white/10 flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[9px] font-bold text-broken-white/50 uppercase tracking-wider">TOTAL BIAYA</p>
                            <p id="detail-price" class="font-headline font-extrabold text-lg text-merah-jcc">
                                Rp 150.000<span class="text-xs font-normal text-broken-white/60">/jam</span>
                            </p>
                        </div>

                        <a href="/konfirmasi"
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
            // Data Mockup 8 Pilihan Ruangan & Barang
            const itemsData = {
                "1": {
                    typeTag: "ROOM",
                    title: "Ruang Kolaborasi A",
                    desc: "Ruang kerja komunal yang dirancang untuk mendukung produktivitas dan kolaborasi spontan. Dilengkapi dengan pencahayaan alami yang optimal.",
                    img: "https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop",
                    rating: "4.9 (120 Ulasan)",
                    capacity: "8-12 Orang",
                    area: "24 m²",
                    price: "Rp 150.000",
                    unit: "/jam",
                    facilities: [{
                            icon: "wifi",
                            text: "WiFi 100Mbps"
                        },
                        {
                            icon: "tv",
                            text: "Smart TV 55\""
                        },
                        {
                            icon: "local_cafe",
                            text: "Coffee"
                        },
                        {
                            icon: "draw",
                            text: "Whiteboard"
                        }
                    ]
                },
                "2": {
                    typeTag: "ROOM",
                    title: "Meeting Room Glass",
                    desc: "Ruang rapat privat dengan dinding kaca kedap suara, cocok untuk presentasi klien penting dan diskusi tim skala besar.",
                    img: "https://images.unsplash.com/photo-1517502884422-41eaead166d4?q=80&w=800&auto=format&fit=crop",
                    rating: "4.8 (85 Ulasan)",
                    capacity: "100+ Orang",
                    area: "150 m²",
                    price: "Rp 250.000",
                    unit: "/jam",
                    facilities: [{
                            icon: "wifi",
                            text: "WiFi Dedicated"
                        },
                        {
                            icon: "co_present",
                            text: "Proyektor 4K"
                        },
                        {
                            icon: "mic",
                            text: "Sound System"
                        }
                    ]
                },
                "3": {
                    typeTag: "ROOM",
                    title: "Aula Kreatif Utama",
                    desc: "Ruang serbaguna berkapasitas besar untuk pameran, workshop, talkshow, hingga pertunjukan seni lokal Jember.",
                    img: "https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=800&auto=format&fit=crop",
                    rating: "5.0 (200 Ulasan)",
                    capacity: "100+ Orang",
                    area: "150 m²",
                    price: "Rp 1.500.000",
                    unit: "/hari",
                    facilities: [{
                            icon: "stage",
                            text: "Panggung Utama"
                        },
                        {
                            icon: "light",
                            text: "Lighting Set"
                        },
                        {
                            icon: "chair",
                            text: "100+ Kursi"
                        }
                    ]
                },
                "4": {
                    typeTag: "ITEMS",
                    title: "Podcast Studio Pro",
                    desc: "Studio rekaman profesional dengan peredam suara tingkat tinggi, perlengkapan audio terkalibrasi, dan pencahayaan studio.",
                    img: "https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=800&auto=format&fit=crop",
                    rating: "4.9 (45 Ulasan)",
                    capacity: "4 Orang",
                    area: "15 m² Studio",
                    price: "Rp 100.000",
                    unit: "/jam",
                    facilities: [{
                            icon: "mic",
                            text: "4 Mic Shure"
                        },
                        {
                            icon: "videocam",
                            text: "4K Cam Set"
                        },
                        {
                            icon: "headphones",
                            text: "Audio Mixer"
                        }
                    ]
                },
                "5": {
                    typeTag: "ROOM",
                    title: "Private Desk Space",
                    desc: "Spot kerja terisolasi yang tenang untuk kebutuhan fokus individu dengan colokan listrik pribadi dan koneksi internet stabil.",
                    img: "https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop",
                    rating: "4.7 (32 Ulasan)",
                    capacity: "1 Orang",
                    area: "Personal Spot",
                    price: "Rp 35.000",
                    unit: "/jam",
                    facilities: [{
                            icon: "wifi",
                            text: "WiFi LAN/5G"
                        },
                        {
                            icon: "power",
                            text: "Port Listrik"
                        },
                        {
                            icon: "local_cafe",
                            text: "Free Tea"
                        }
                    ]
                },
                "6": {
                    typeTag: "ROOM",
                    title: "Studio Foto & Visual",
                    desc: "Studio fotografi profesional lengkap dengan pilihan rupa-rupa backdrop warna, lampu softbox, dan ruang ganti.",
                    img: "https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&auto=format&fit=crop",
                    rating: "4.9 (60 Ulasan)",
                    capacity: "5-10 Orang",
                    area: "40 m² Studio",
                    price: "Rp 200.000",
                    unit: "/jam",
                    facilities: [{
                            icon: "light",
                            text: "Lighting 3 Point"
                        },
                        {
                            icon: "checkroom",
                            text: "Ruang Ganti"
                        },
                        {
                            icon: "iron",
                            text: "Steamer"
                        }
                    ]
                },
                "7": {
                    typeTag: "ITEMS",
                    title: "Camera Kit Mirrorless",
                    desc: "Paket sewa kamera profesional siap pakai untuk kebutuhan produksi video dokumentasi, event, atau liputan.",
                    img: "https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=800&auto=format&fit=crop",
                    rating: "4.8 (18 Ulasan)",
                    capacity: "Unit Kamera",
                    area: "Sewa Peralatan",
                    price: "Rp 150.000",
                    unit: "/hari",
                    facilities: [{
                            icon: "photo_camera",
                            text: "Body Kamera 4K"
                        },
                        {
                            icon: "crop_original",
                            text: "Lensa 35mm & 85mm"
                        },
                        {
                            icon: "memory",
                            text: "SD Card 128GB"
                        }
                    ]
                },
                "8": {
                    typeTag: "ITEMS",
                    title: "Pen Display Tablet",
                    desc: "Pen display tablet presisi tinggi untuk ilustrator, desainer grafis, dan animator yang membutuhkan presisi warna.",
                    img: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop",
                    rating: "4.9 (25 Ulasan)",
                    capacity: "Unit Tablet",
                    area: "Sewa Peralatan",
                    price: "Rp 80.000",
                    unit: "/hari",
                    facilities: [{
                            icon: "draw",
                            text: "Layaran 24 Inch"
                        },
                        {
                            icon: "stylus",
                            text: "Stylus Pen"
                        },
                        {
                            icon: "cable",
                            text: "HDMI/USB-C"
                        }
                    ]
                }
            };

            const roomCards = document.querySelectorAll('.room-card');
            const detailTypeTag = document.getElementById('detail-type-tag');
            const detailImg = document.getElementById('detail-img');
            const detailTitle = document.getElementById('detail-title');
            const detailDesc = document.getElementById('detail-desc');
            const detailRating = document.getElementById('detail-rating');
            const detailCapacity = document.getElementById('detail-capacity');
            const detailArea = document.getElementById('detail-area');
            const detailPrice = document.getElementById('detail-price');
            const detailFacilities = document.getElementById('detail-facilities');

            // Event listener saat kartu diklik untuk memperbarui detail konfirmasi
            roomCards.forEach(card => {
                card.addEventListener('click', () => {
                    const id = card.getAttribute('data-id');
                    const data = itemsData[id];

                    if (!data) return;

                    // Ubah gaya warna kartu aktif vs non-aktif
                    roomCards.forEach(c => {
                        c.classList.remove('border-merah-jcc',
                            'bg-surface-container-highest/60', 'active', 'shadow-sm');
                        c.classList.add('border-transparent', 'bg-cream-dark/40');
                    });

                    card.classList.remove('border-transparent', 'bg-cream-dark/40');
                    card.classList.add('border-merah-jcc', 'bg-surface-container-highest/60',
                        'active', 'shadow-sm');

                    // Update isi panel konfirmasi sticky
                    detailTypeTag.textContent = data.typeTag;
                    detailImg.src = data.img;
                    detailTitle.textContent = data.title;
                    detailDesc.textContent = data.desc;
                    detailRating.innerHTML =
                        `<span class="material-symbols-outlined text-xs fill-1 text-amber-400">star</span> ${data.rating}`;
                    detailCapacity.textContent = data.capacity;
                    detailArea.textContent = data.area;
                    detailPrice.innerHTML =
                        `${data.price}<span class="text-xs font-normal text-broken-white/60">${data.unit}</span>`;

                    // Update daftar fasilitas
                    detailFacilities.innerHTML = data.facilities.map(f => `
                    <span class="bg-white/10 text-broken-white/90 text-[11px] px-3 py-1 rounded-full flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-xs">${f.icon}</span> ${f.text}
                    </span>
                `).join('');
                });
            });

            // Filter Pills Logic (All, Room, Items)
            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const filter = btn.getAttribute('data-filter');

                    filterBtns.forEach(b => {
                        b.classList.remove('bg-charcoal', 'text-broken-white', 'shadow-sm');
                        b.classList.add('bg-cream-dark', 'text-charcoal');
                    });
                    btn.classList.remove('bg-cream-dark', 'text-charcoal');
                    btn.classList.add('bg-charcoal', 'text-broken-white', 'shadow-sm');

                    roomCards.forEach(card => {
                        const type = card.getAttribute('data-type');
                        if (filter === 'all' || type === filter) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
