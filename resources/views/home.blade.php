@extends('layouts.app')

@section('title', 'Selamat Datang!')

@section('content')
    <section
        class="relative pt-32 pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto min-h-[90vh] flex items-center justify-center">
        <div class="absolute inset-4 md:inset-8 rounded-[40px] overflow-hidden">
            <img class="w-full h-full object-cover"
                data-alt="A bright, modern co-working space interior with lush green plants"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCe3qXEw5D10aOm0J9LLczhb5H9oslcGwSF7XIaqlfWnE2E9DQPKihDROZBPECK-KXxK34hVvXf3ktGmAEYqWBi5bjXGXMnNp1njvpvFaLqaP2hHSXEZmowmFp_ME4lscgbyUqOXCirSM7LOPt2KTU2lJo-kER7T3aJQQ_HX-j-o66dTQggPsZt9sFaDx5q1_wTl2ncpIkLVBlFBuTUGy3F_YXSte1p2tNKSixpDXxCHP4j7Z59jGv7" />
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 to-transparent"></div>
        </div>
        <div class="relative z-10 text-center space-y-8 max-w-4xl px-4 mt-20">
            <h1
                class="font-headline text-5xl md:text-7xl font-extrabold text-broken-white leading-tight tracking-tight drop-shadow-lg">
                Ruang untuk <span class="text-merah-jcc italic">Berkarya</span>,<br />
                Berkolaborasi &amp; Bertumbuh
            </h1>
            <p class="font-body text-lg md:text-xl text-broken-white/90 max-w-2xl mx-auto leading-relaxed">
                Pusat ekosistem kreatif di Jember. Temukan ruang kerja yang inspiratif, komunitas yang suportif, dan
                fasilitas yang mendukung setiap langkah kreatifmu.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 pt-8 justify-center">
                <a class="bg-merah-jcc text-broken-white px-10 py-5 rounded-full font-bold text-lg hover:scale-105 transition-all text-center shadow-2xl flex items-center justify-center gap-3"
                    href="/jelajahi">
                    Jelajahi JCC
                    <span class="material-symbols-outlined text-xl">arrow_forward</span>
                </a>
                <a class="glass text-broken-white px-10 py-5 rounded-full font-bold text-lg hover:bg-broken-white hover:text-charcoal transition-all text-center shadow-xl"
                    href="/jelajahi">
                    Booking Ruangan
                </a>
            </div>
        </div>
        <!-- Floating Cards -->
        <div class="absolute bottom-16 left-16 glass p-6 rounded-3xl hidden md:block animate-bounce shadow-2xl">
            <p class="font-bold text-xs text-broken-white/80 mb-2 uppercase tracking-widest">Komunitas Aktif</p>
            <p class="font-headline text-3xl font-extrabold text-merah-jcc">500+ <span
                    class="text-broken-white text-lg font-medium">Kreator</span></p>
        </div>
    </section>
    <!-- ================= SECTION LOGO / MITRA ================= -->
    <section class="py-12 bg-broken-white text-center overflow-hidden">
        <h3 class="font-headline text-xl md:text-2xl font-bold text-charcoal mb-8 tracking-tight">
            Tempat Kreatif Terbaik di Jember
        </h3>
        <!-- Logo Marquee / Slider Grid -->
        <div class="flex items-center justify-center gap-4 md:gap-8 overflow-x-auto no-scrollbar px-4 py-2 opacity-60">
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
            <div class="w-32 md:w-44 h-20 bg-gray-400/70 rounded-2xl shrink-0 scale-105 shadow-sm"></div>
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
            <div class="w-24 md:w-32 h-14 bg-gray-300/60 rounded-xl shrink-0"></div>
        </div>
    </section>

    <!-- ================= SECTION TENTANG JCC (DARI JEMBER, UNTUK DUNIA) ================= -->
    <section class="py-12 md:py-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <div class="bg-cream-dark rounded-[36px] md:rounded-[48px] p-8 md:p-16 lg:p-20 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                <!-- Sisi Kiri: Visual Layout Gambar Tumpuk -->
                <div class="lg:col-span-6 relative flex justify-center lg:justify-start">
                    <!-- Gambar Utama (Gedung/Ruang JCC) -->
                    <div class="w-[85%] md:w-[80%] aspect-[4/5] rounded-[32px] overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1000&auto=format&fit=crop"
                            alt="Jember Creative Center Building" class="w-full h-full object-cover" />
                    </div>

                    <!-- Gambar Overlay (Tangan/Tablet Kreatif) -->
                    <div
                        class="absolute right-0 bottom-8 md:bottom-12 w-[50%] md:w-[48%] aspect-square rounded-[28px] overflow-hidden shadow-2xl border-4 border-cream-dark bg-white">
                        <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=600&auto=format&fit=crop"
                            alt="Creative Work on Tablet" class="w-full h-full object-cover" />
                    </div>
                </div>

                <!-- Sisi Kanan: Konten Teks -->
                <div class="lg:col-span-6 space-y-6 md:space-y-8 pl-0 lg:pl-4">
                    <h2 class="font-headline text-2xl md:text-3xl lg:text-4xl font-bold text-charcoal leading-snug">
                        Dari <span class="text-merah-jcc italic">Jember</span>, untuk <span
                            class="text-merah-jcc italic">dunia</span>.
                    </h2>

                    <div class="space-y-4 font-body text-secondary text-base md:text-lg leading-relaxed">
                        <p>
                            <strong class="text-charcoal font-semibold">Jember Creative Center (JCC)</strong> adalah
                            ruang bagi para kreator, freelancer, dan tim kreatif untuk mengembangkan ide, membangun
                            kolaborasi, dan menciptakan karya yang berdampak.
                        </p>
                        <p>
                            Berpijak pada budaya lokal dan bergerak menuju masa depan, JCC hadir untuk menghubungkan
                            potensi kreatif Jember dengan peluang di tingkat nasional hingga global.
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href="/tentang"
                            class="inline-flex items-center gap-1.5 text-merah-jcc font-bold text-base md:text-lg hover:gap-3 transition-all underline underline-offset-8 decoration-merah-jcc/40 hover:decoration-merah-jcc">
                            Pelajari lebih lanjut
                            <span class="material-symbols-outlined text-xl">north_east</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 md:py-section-padding px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
        <h2 class="font-headline text-4xl md:text-6xl font-extrabold text-center mb-16">Jelajahi Ekosistem</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Item 1 -->
            <div class="group relative aspect-square bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                <div class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                </div>
                <h3 class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                    Artikel</h3>
            </div>

            <!-- Item 2 -->
            <div class="group relative aspect-square bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                <div class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                </div>
                <h3 class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                    Event</h3>
            </div>

            <!-- Item 3 -->
            <div class="group relative aspect-square bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                <div class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                </div>
                <h3 class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                    Showcase</h3>
            </div>

            <!-- Item 4 (Span 2 kolom) -->
            <div
                class="group relative aspect-square md:aspect-auto md:col-span-2 bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                <div class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                </div>
                <h3 class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                    Fasilitas</h3>
            </div>

            <!-- Item 5 & 6 (Kolom kanan bertumpuk) -->
            <div class="flex flex-col gap-6">
                <div
                    class="group relative flex-1 aspect-square md:aspect-auto bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                    <div
                        class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                    </div>
                    <h3
                        class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                        Creator</h3>
                </div>

                <!-- Item 6 (Cadangan/Tambahan) -->
                <div
                    class="group relative flex-1 aspect-square md:aspect-auto bg-cream-dark rounded-[32px] p-8 flex items-end overflow-hidden">
                    <div
                        class="absolute inset-0 bg-charcoal/5 group-hover:bg-merah-jcc/90 transition-colors duration-500 z-10">
                    </div>
                    <h3
                        class="relative z-20 font-headline text-3xl font-bold group-hover:text-broken-white transition-colors">
                        Komunitas</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 md:py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto overflow-hidden">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-merah-jcc font-bold text-sm tracking-widest uppercase block mb-2">Aktivitas
                    Terbaru</span>
                <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal">Kegiatan di JCC</h2>
            </div>
            <p class="font-body text-secondary max-w-md text-sm md:text-base">
                Momen seru, kolaborasi kreatif, dan berbagai workshop yang berlangsung di Jember Creative Center.
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="relative">
            <div id="event-carousel"
                class="flex gap-6 overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth pb-4">

                <!-- Slide 1 (Sesuai Gambar) -->
                <div class="min-w-[85%] md:min-w-[70%] lg:min-w-[60%] snap-start shrink-0">
                    <div
                        class="relative h-[380px] md:h-[480px] rounded-[36px] md:rounded-[48px] overflow-hidden group cursor-pointer shadow-lg">
                        <!-- Background Image -->
                        <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1200&auto=format&fit=crop"
                            alt="Kegiatan Mewarnai di JCC"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />

                        <!-- Overlay Gradients -->
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/20 to-charcoal/40">
                        </div>

                        <!-- Judul Kegiatan (Atas Kiri) -->
                        <div class="absolute top-8 left-8 right-8 z-10">
                            <h3 class="font-headline text-2xl md:text-4xl font-extrabold text-broken-white drop-shadow-md">
                                Kegiatan Mewarnai di JCC
                            </h3>
                        </div>

                        <!-- Badge Tanggal Floating (Bawah Kiri - Khas Desain) -->
                        <div class="absolute bottom-0 left-0 bg-broken-white pt-4 pr-6 pb-2 pl-8 rounded-tr-[28px] z-10">
                            <span class="font-headline font-bold text-sm md:text-base text-charcoal tracking-wide">
                                12 Agustus 2026
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="min-w-[85%] md:min-w-[70%] lg:min-w-[60%] snap-start shrink-0">
                    <div
                        class="relative h-[380px] md:h-[480px] rounded-[36px] md:rounded-[48px] overflow-hidden group cursor-pointer shadow-lg">
                        <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=1200&auto=format&fit=crop"
                            alt="Workshop Desain Grafis"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/20 to-charcoal/40">
                        </div>
                        <div class="absolute top-8 left-8 right-8 z-10">
                            <h3 class="font-headline text-2xl md:text-4xl font-extrabold text-broken-white drop-shadow-md">
                                Workshop Desain & Ilustrasi
                            </h3>
                        </div>
                        <div class="absolute bottom-0 left-0 bg-broken-white pt-4 pr-6 pb-2 pl-8 rounded-tr-[28px] z-10">
                            <span class="font-headline font-bold text-sm md:text-base text-charcoal tracking-wide">
                                18 Agustus 2026
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="min-w-[85%] md:min-w-[70%] lg:min-w-[60%] snap-start shrink-0">
                    <div
                        class="relative h-[380px] md:h-[480px] rounded-[36px] md:rounded-[48px] overflow-hidden group cursor-pointer shadow-lg">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1200&auto=format&fit=crop"
                            alt="Pameran Seni Kontemporer"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/20 to-charcoal/40">
                        </div>
                        <div class="absolute top-8 left-8 right-8 z-10">
                            <h3 class="font-headline text-2xl md:text-4xl font-extrabold text-broken-white drop-shadow-md">
                                Pameran Seni Local Roots
                            </h3>
                        </div>
                        <div class="absolute bottom-0 left-0 bg-broken-white pt-4 pr-6 pb-2 pl-8 rounded-tr-[28px] z-10">
                            <span class="font-headline font-bold text-sm md:text-base text-charcoal tracking-wide">
                                25 Agustus 2026
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation Buttons (Kiri/Kanan) -->
            <div class="flex items-center justify-center gap-4 mt-8">
                <button id="btn-prev"
                    class="w-12 h-12 rounded-full border border-charcoal/30 flex items-center justify-center hover:bg-charcoal hover:text-broken-white hover:border-charcoal transition-all active:scale-95"
                    aria-label="Previous Slide">
                    <span class="material-symbols-outlined text-2xl">arrow_back</span>
                </button>

                <button id="btn-next"
                    class="w-12 h-12 rounded-full border border-charcoal/30 flex items-center justify-center hover:bg-charcoal hover:text-broken-white hover:border-charcoal transition-all active:scale-95"
                    aria-label="Next Slide">
                    <span class="material-symbols-outlined text-2xl">arrow_forward</span>
                </button>
            </div>
        </div>
    </section>
    <!-- ================= SECTION MADE IN JEMBER (SHOWCASE CREATOR) ================= -->
    <section class="py-16 md:py-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto overflow-hidden">
        <!-- Header Section -->
        <div class="text-center max-w-2xl mx-auto mb-8 md:mb-12">
            <span class="text-merah-jcc font-bold text-sm tracking-widest uppercase block mb-2">Showcase Karya</span>
            <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal mb-4">Made in Jember</h2>

            <!-- Filter Kategori Tab (Aktif & Berfungsi) -->
            <div class="flex flex-wrap items-center justify-center gap-2 mt-6">
                <button data-filter="all"
                    class="filter-tab active bg-merah-jcc text-broken-white text-xs font-bold px-6 py-2.5 rounded-full transition-all shadow-md hover:scale-105">Semua</button>
                <button data-filter="Desain"
                    class="filter-tab bg-cream-dark text-charcoal hover:bg-merah-jcc/10 text-xs font-bold px-6 py-2.5 rounded-full transition-all">Desain</button>
                <button data-filter="Fotografi"
                    class="filter-tab bg-cream-dark text-charcoal hover:bg-merah-jcc/10 text-xs font-bold px-6 py-2.5 rounded-full transition-all">Fotografi</button>
                <button data-filter="Seni Rupa"
                    class="filter-tab bg-cream-dark text-charcoal hover:bg-merah-jcc/10 text-xs font-bold px-6 py-2.5 rounded-full transition-all">Seni
                    Rupa</button>
            </div>
        </div>

        <!-- Desktop Berjejer Layout -->
        <div class="hidden lg:flex justify-center items-center relative py-10 min-h-[500px]">

            <!-- Card 1 -->
            <div data-category="Seni Rupa"
                class="showcase-card absolute w-[260px] h-[370px] rounded-[32px] overflow-hidden shadow-xl border-2 border-white/40 transition-all duration-500 ease-out cursor-pointer hover:z-50 hover:scale-110 hover:-translate-y-6 -translate-x-[360px] z-10 brightness-90 hover:brightness-100">
                <img src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?q=80&w=800&auto=format&fit=crop"
                    alt="Karya 1" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md">
                    Seni Rupa</div>
                <div class="absolute bottom-6 left-6 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Lukisan Abstrak</p>
                    <h4 class="font-headline font-bold text-lg">Bambang Art</h4>
                </div>
            </div>

            <!-- Card 2 -->
            <div data-category="Desain"
                class="showcase-card absolute w-[275px] h-[390px] rounded-[32px] overflow-hidden shadow-2xl border-2 border-white/50 transition-all duration-500 ease-out cursor-pointer hover:z-50 hover:scale-110 hover:-translate-y-6 -translate-x-[180px] z-20 brightness-95 hover:brightness-100">
                <img src="https://images.unsplash.com/photo-1579783900882-c0d3dad7b119?q=80&w=800&auto=format&fit=crop"
                    alt="Karya 2" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md">
                    Desain</div>
                <div class="absolute bottom-6 left-6 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Motif Tobacco Art</p>
                    <h4 class="font-headline font-bold text-lg">Ahmad JCC</h4>
                </div>
            </div>

            <!-- Card 3 (Utama) -->
            <div data-category="Desain"
                class="showcase-card absolute w-[310px] h-[430px] rounded-[32px] overflow-hidden shadow-2xl border-2 border-white/60 transition-all duration-500 ease-out cursor-pointer z-30 hover:z-50 hover:scale-105 hover:-translate-y-4">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&auto=format&fit=crop"
                    alt="Karya Utama" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-transparent to-transparent"></div>
                <div
                    class="absolute top-5 right-5 bg-merah-jcc text-broken-white text-xs font-bold px-5 py-2 rounded-full shadow-lg">
                    Desain</div>
                <div class="absolute bottom-8 left-8 text-broken-white">
                    <p class="text-sm font-medium opacity-90">Arsitektur JCC</p>
                    <h4 class="font-headline font-bold text-2xl">Studio Jember</h4>
                </div>
            </div>

            <!-- Card 4 -->
            <div data-category="Fotografi"
                class="showcase-card absolute w-[275px] h-[390px] rounded-[32px] overflow-hidden shadow-2xl border-2 border-white/50 transition-all duration-500 ease-out cursor-pointer hover:z-50 hover:scale-110 hover:-translate-y-6 translate-x-[180px] z-20 brightness-95 hover:brightness-100">
                <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop"
                    alt="Karya 4" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md">
                    Fotografi</div>
                <div class="absolute bottom-6 left-6 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Sisi Kota Jember</p>
                    <h4 class="font-headline font-bold text-lg">Rina Creative</h4>
                </div>
            </div>

            <!-- Card 5 -->
            <div data-category="Seni Rupa"
                class="showcase-card absolute w-[260px] h-[370px] rounded-[32px] overflow-hidden shadow-xl border-2 border-white/40 transition-all duration-500 ease-out cursor-pointer hover:z-50 hover:scale-110 hover:-translate-y-6 translate-x-[360px] z-10 brightness-90 hover:brightness-100">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
                    alt="Karya 5" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-4 py-1.5 rounded-full shadow-md">
                    Seni Rupa</div>
                <div class="absolute bottom-6 left-6 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Instalasi Bambu</p>
                    <h4 class="font-headline font-bold text-lg">Tim Jember</h4>
                </div>
            </div>

        </div>

        <!-- Mobile Carousel Layout -->
        <div class="lg:hidden flex gap-4 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-6 pt-2">
            <div data-category="Desain"
                class="showcase-card-mobile min-w-[260px] w-[75%] aspect-[3/4] snap-center shrink-0 rounded-[28px] overflow-hidden relative shadow-lg transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&auto=format&fit=crop"
                    class="w-full h-full object-cover" alt="Karya Utama" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-3 py-1 rounded-full">
                    Desain</div>
                <div class="absolute bottom-5 left-5 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Arsitektur JCC</p>
                    <h4 class="font-headline font-bold text-xl">Studio Jember</h4>
                </div>
            </div>

            <div data-category="Desain"
                class="showcase-card-mobile min-w-[260px] w-[75%] aspect-[3/4] snap-center shrink-0 rounded-[28px] overflow-hidden relative shadow-lg transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1579783900882-c0d3dad7b119?q=80&w=800&auto=format&fit=crop"
                    class="w-full h-full object-cover" alt="Karya 2" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-3 py-1 rounded-full">
                    Desain</div>
                <div class="absolute bottom-5 left-5 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Motif Tobacco Art</p>
                    <h4 class="font-headline font-bold text-xl">Ahmad JCC</h4>
                </div>
            </div>

            <div data-category="Fotografi"
                class="showcase-card-mobile min-w-[260px] w-[75%] aspect-[3/4] snap-center shrink-0 rounded-[28px] overflow-hidden relative shadow-lg transition-all duration-300">
                <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop"
                    class="w-full h-full object-cover" alt="Karya 3" />
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent"></div>
                <div
                    class="absolute top-4 right-4 bg-merah-jcc text-broken-white text-xs font-bold px-3 py-1 rounded-full">
                    Fotografi</div>
                <div class="absolute bottom-5 left-5 text-broken-white">
                    <p class="text-xs font-medium opacity-90">Sisi Kota Jember</p>
                    <h4 class="font-headline font-bold text-xl">Rina Creative</h4>
                </div>
            </div>
        </div>

        <!-- CTA Bottom -->
        <div class="text-center mt-6 lg:mt-10">
            <a href="/jelajahi"
                class="inline-flex items-center gap-2 text-merah-jcc font-bold text-base hover:gap-4 transition-all">
                Lihat Semua Showcase Karya
                <span class="material-symbols-outlined text-xl">east</span>
            </a>
        </div>
    </section>

    <!-- ================= SECTION MEET THE CREATOR ================= -->
    <section class="py-12 md:py-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">

            <!-- Sisi Kiri: Judul & Deskripsi (Lebih Proporsional) -->
            <div class="lg:col-span-5 space-y-5">
                <span class="text-merah-jcc font-bold text-xs md:text-sm tracking-widest uppercase block">Komunitas
                    JCC</span>
                <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal leading-tight">
                    Meet<br />The<br />Creator
                </h2>
                <p class="font-body text-secondary text-sm md:text-base leading-relaxed max-w-sm">
                    Kenali para creator yang berkarya dan berkembang bersama ekosistem kreatif JCC.
                </p>

                <!-- Tombol Navigasi Slider -->
                <div class="flex items-center gap-3 pt-2">
                    <button id="creator-prev"
                        class="w-10 h-10 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-merah-jcc hover:text-broken-white hover:border-merah-jcc transition-all active:scale-95 shadow-sm">
                        <span class="material-symbols-outlined text-xl">west</span>
                    </button>
                    <button id="creator-next"
                        class="w-10 h-10 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-merah-jcc hover:text-broken-white hover:border-merah-jcc transition-all active:scale-95 shadow-sm">
                        <span class="material-symbols-outlined text-xl">east</span>
                    </button>
                </div>
            </div>

            <!-- Sisi Kanan: Slider Cards (Ukuran Ringkas & Terkontrol) -->
            <div class="lg:col-span-7 relative">
                <div id="creator-slider"
                    class="flex gap-5 overflow-x-auto snap-x snap-mandatory no-scrollbar scroll-smooth py-4">

                    <!-- Card 1 -->
                    <div
                        class="creator-card w-[200px] sm:w-[220px] md:w-[240px] aspect-[3/4] snap-start shrink-0 rounded-[28px] overflow-hidden relative group shadow-md bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop"
                            alt="Udin Simalakana"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />

                        <div
                            class="creator-overlay absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent transition-opacity duration-500">
                        </div>

                        <div
                            class="creator-badge absolute bottom-4 left-4 right-4 bg-broken-white/95 backdrop-blur-md py-2.5 px-3 rounded-full flex items-center gap-2.5 shadow-md transition-all duration-500 transform translate-y-0 opacity-100">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop"
                                class="w-7 h-7 rounded-full object-cover border border-merah-jcc shrink-0"
                                alt="Avatar" />
                            <div class="overflow-hidden">
                                <h4 class="font-headline font-bold text-xs text-charcoal truncate">udin Simalakana</h4>
                                <p class="font-body text-[10px] text-secondary truncate">Visual Designer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="creator-card w-[200px] sm:w-[220px] md:w-[240px] aspect-[3/4] snap-start shrink-0 rounded-[28px] overflow-hidden relative group shadow-md bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=600&auto=format&fit=crop"
                            alt="Rian Kusuma"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div
                            class="creator-overlay absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent transition-opacity duration-500">
                        </div>

                        <div
                            class="creator-badge absolute bottom-4 left-4 right-4 bg-broken-white/95 backdrop-blur-md py-2.5 px-3 rounded-full flex items-center gap-2.5 shadow-md transition-all duration-500 transform translate-y-0 opacity-100">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&auto=format&fit=crop"
                                class="w-7 h-7 rounded-full object-cover border border-merah-jcc shrink-0"
                                alt="Avatar" />
                            <div class="overflow-hidden">
                                <h4 class="font-headline font-bold text-xs text-charcoal truncate">Rian Kusuma</h4>
                                <p class="font-body text-[10px] text-secondary truncate">3D Artist</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="creator-card w-[200px] sm:w-[220px] md:w-[240px] aspect-[3/4] snap-start shrink-0 rounded-[28px] overflow-hidden relative group shadow-md bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?q=80&w=600&auto=format&fit=crop"
                            alt="Bima Sakti"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div
                            class="creator-overlay absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent transition-opacity duration-500">
                        </div>

                        <div
                            class="creator-badge absolute bottom-4 left-4 right-4 bg-broken-white/95 backdrop-blur-md py-2.5 px-3 rounded-full flex items-center gap-2.5 shadow-md transition-all duration-500 transform translate-y-0 opacity-100">
                            <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?q=80&w=200&auto=format&fit=crop"
                                class="w-7 h-7 rounded-full object-cover border border-merah-jcc shrink-0"
                                alt="Avatar" />
                            <div class="overflow-hidden">
                                <h4 class="font-headline font-bold text-xs text-charcoal truncate">Bima Sakti</h4>
                                <p class="font-body text-[10px] text-secondary truncate">Photographer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="creator-card w-[200px] sm:w-[220px] md:w-[240px] aspect-[3/4] snap-start shrink-0 rounded-[28px] overflow-hidden relative group shadow-md bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop"
                            alt="Siti Rahma"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div
                            class="creator-overlay absolute inset-0 bg-gradient-to-t from-charcoal/80 via-transparent to-transparent transition-opacity duration-500">
                        </div>

                        <div
                            class="creator-badge absolute bottom-4 left-4 right-4 bg-broken-white/95 backdrop-blur-md py-2.5 px-3 rounded-full flex items-center gap-2.5 shadow-md transition-all duration-500 transform translate-y-0 opacity-100">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop"
                                class="w-7 h-7 rounded-full object-cover border border-merah-jcc shrink-0"
                                alt="Avatar" />
                            <div class="overflow-hidden">
                                <h4 class="font-headline font-bold text-xs text-charcoal truncate">Siti Rahma</h4>
                                <p class="font-body text-[10px] text-secondary truncate">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <!-- Event (Simple Horizontal List Mockup) -->
    <section class="py-24 bg-charcoal text-broken-white rounded-[48px] mx-4 md:mx-8 my-12 px-8 overflow-hidden">
        <h2 class="font-headline text-4xl md:text-5xl font-extrabold mb-12">Event Mendatang</h2>
        <div class="flex gap-8 overflow-x-auto pb-12 snap-x">
            <div
                class="min-w-[300px] md:min-w-[400px] glass-dark rounded-[32px] p-8 snap-center hover:-translate-y-4 transition-transform cursor-pointer">
                <p class="text-merah-jcc font-bold mb-4">24 Okt 2024</p>
                <h3 class="font-headline text-2xl font-bold mb-4">Creative Talk: Design Future</h3>
                <p class="text-broken-white/70">Diskusi panel bersama top desainer lokal.</p>
            </div>
            <div
                class="min-w-[300px] md:min-w-[400px] glass-dark rounded-[32px] p-8 snap-center hover:-translate-y-4 transition-transform cursor-pointer">
                <p class="text-merah-jcc font-bold mb-4">28 Okt 2024</p>
                <h3 class="font-headline text-2xl font-bold mb-4">Workshop: Gen Z Entrepreneurship</h3>
                <p class="text-broken-white/70">Membangun startup dari nol.</p>
            </div>
            <div
                class="min-w-[300px] md:min-w-[400px] glass-dark rounded-[32px] p-8 snap-center hover:-translate-y-4 transition-transform cursor-pointer">
                <p class="text-merah-jcc font-bold mb-4">02 Nov 2024</p>
                <h3 class="font-headline text-2xl font-bold mb-4">Art Exhibition: Local Roots</h3>
                <p class="text-broken-white/70">Pameran seni kontemporer seniman Jember.</p>
            </div>
        </div>
    </section>




@endsection
