@extends('layouts.app')

@section('title', 'Event & Workshop - Jember Creative Center')

@section('content')
    <!-- CSS Khusus Animasi & Tata Letak -->
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.15s;
        }

        .reveal-delay-2 {
            transition-delay: 0.3s;
        }

        .event-card {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .event-card.hide {
            display: none;
            opacity: 0;
            transform: scale(0.95);
        }

        /* Badge Tanggal Melayang */
        .date-badge {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
        }
    </style>

    <div class="bg-[#FBF9F6] min-h-screen pt-32 pb-24 font-body text-charcoal overflow-hidden">

        <!-- 1. HERO SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <div
                class="reveal relative w-full h-[400px] md:h-[500px] rounded-[40px] md:rounded-[64px] overflow-hidden shadow-2xl shadow-charcoal/10 group">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=2000&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-[2s] ease-out"
                    alt="Suasana Event JCC">

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/50 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-merah-jcc/40 to-transparent mix-blend-multiply"></div>

                <!-- Content -->
                <div class="absolute inset-0 p-8 md:p-16 flex flex-col justify-end text-center items-center">
                    <span
                        class="inline-block bg-white/20 backdrop-blur-md border border-white/30 text-broken-white px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6 shadow-lg">
                        Agenda Ekosistem
                    </span>
                    <h1
                        class="font-headline text-4xl md:text-5xl lg:text-7xl font-extrabold text-broken-white leading-[1.1] tracking-tight max-w-4xl">
                        Panggung Bagi Para <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-rose-300 to-merah-jcc">Kreator.</span>
                    </h1>
                    <p class="font-body text-broken-white/80 mt-6 text-sm md:text-lg max-w-2xl leading-relaxed">
                        Mulai dari workshop intensif, pameran seni memukau, hingga sesi *networking* eksklusif. Temukan
                        ruangmu untuk bertumbuh di sini.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. HIGHLIGHT EVENT (Featured) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
            <div
                class="reveal reveal-delay-1 bg-charcoal rounded-[40px] md:rounded-[48px] overflow-hidden shadow-2xl relative flex flex-col lg:flex-row items-center border border-charcoal/10">
                <!-- Aksen Glow Latar -->
                <div
                    class="absolute top-0 right-0 w-96 h-96 bg-merah-jcc/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3">
                </div>

                <!-- Gambar Highlight -->
                <div class="w-full lg:w-1/2 h-[300px] lg:h-[450px] relative">
                    <img src="https://images.unsplash.com/photo-1551818255-e6e10975bc17?q=80&w=1200&auto=format&fit=crop"
                        class="w-full h-full object-cover" alt="Jember Creative Week">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-charcoal hidden lg:block"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal to-transparent lg:hidden"></div>

                    <!-- Badge Sorotan -->
                    <div
                        class="absolute top-6 left-6 bg-merah-jcc text-white px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-lg flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> Sorotan Utama
                    </div>
                </div>

                <!-- Konten Highlight -->
                <div class="w-full lg:w-1/2 p-8 md:p-12 relative z-10">
                    <div
                        class="flex items-center gap-3 text-merah-jcc mb-4 font-headline font-bold text-xs uppercase tracking-widest">
                        <span class="material-symbols-outlined text-lg">calendar_month</span>
                        20 - 25 Oktober 2026
                    </div>

                    <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-broken-white leading-tight mb-4">
                        Jember Creative <br>Week 2026
                    </h2>

                    <p class="text-broken-white/70 text-sm md:text-base mb-8 max-w-lg">
                        Festival tahunan terbesar yang mempertemukan inovator, seniman, dan technopreneur. Menampilkan
                        pameran karya, *pitching day*, dan konser musik indie lokal.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#"
                            class="bg-merah-jcc hover:bg-white hover:text-merah-jcc text-white px-8 py-3.5 rounded-full font-headline font-bold text-sm transition-all shadow-lg shadow-merah-jcc/30">
                            Dapatkan Tiket
                        </a>
                        <a href="#"
                            class="border border-white/20 text-white hover:bg-white/10 px-8 py-3.5 rounded-full font-headline font-bold text-sm transition-all">
                            Lihat Jadwal
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. SEARCH & FILTER (Sticky) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 sticky top-24 z-40">
            <div
                class="reveal reveal-delay-2 bg-white/90 backdrop-blur-xl border border-charcoal/10 rounded-[32px] p-3 md:p-5 shadow-lg shadow-charcoal/5 flex flex-col lg:flex-row gap-4 items-center justify-between">

                <!-- Category Filters -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar w-full lg:w-auto pb-2 lg:pb-0"
                    id="categoryFilters">
                    <button data-filter="all"
                        class="filter-btn active shrink-0 bg-charcoal text-white px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-colors shadow-md">
                        Semua Event
                    </button>
                    <button data-filter="Workshop"
                        class="filter-btn shrink-0 bg-[#FBF9F6] border border-charcoal/10 text-charcoal hover:bg-charcoal/5 px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Workshop
                    </button>
                    <button data-filter="Pameran"
                        class="filter-btn shrink-0 bg-[#FBF9F6] border border-charcoal/10 text-charcoal hover:bg-charcoal/5 px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Pameran
                    </button>
                    <button data-filter="Networking"
                        class="filter-btn shrink-0 bg-[#FBF9F6] border border-charcoal/10 text-charcoal hover:bg-charcoal/5 px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Networking
                    </button>
                </div>

                <!-- Search Bar -->
                <div class="relative w-full lg:w-72 shrink-0 group">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <span
                            class="material-symbols-outlined text-charcoal/40 group-focus-within:text-merah-jcc transition-colors text-lg">search</span>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari event..."
                        class="w-full bg-[#FBF9F6] border border-charcoal/10 focus:border-merah-jcc/40 focus:bg-white rounded-full py-2.5 pl-5 pr-10 text-sm font-headline font-medium text-charcoal placeholder:text-charcoal/40 transition-all outline-none">
                </div>
            </div>
        </section>

        <!-- 4. EVENTS GRID -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="eventsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12 pt-6">

                <!-- Event Card 1 -->
                <a href="/event/detail-event" class="event-card group cursor-pointer"
                    data-title="Masterclass UI/UX: Desain Inklusif" data-category="Workshop">
                    <div class="relative w-full h-[280px] rounded-[32px] overflow-hidden shadow-sm mb-6 bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="UI/UX Masterclass">

                        <!-- Floating Date Badge -->
                        <div
                            class="date-badge absolute -bottom-6 right-6 bg-white rounded-2xl p-3 text-center min-w-[70px] border border-charcoal/5 group-hover:-translate-y-2 transition-transform duration-300">
                            <span class="block font-headline font-extrabold text-2xl text-merah-jcc leading-none">12</span>
                            <span
                                class="block font-headline font-bold text-[10px] text-charcoal uppercase tracking-widest mt-1">Sep</span>
                        </div>

                        <div
                            class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                            Workshop</div>
                    </div>
                    <div class="px-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-secondary mb-2">
                            <span class="material-symbols-outlined text-[16px] text-amber-500">schedule</span> 13:00 - 16:00
                            WIB
                        </div>
                        <h3
                            class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors leading-tight">
                            Masterclass UI/UX: Desain Inklusif</h3>
                        <p class="font-body text-sm text-secondary line-clamp-2 mb-4">Pelajari cara merancang antarmuka yang
                            ramah bagi semua pengguna bersama Lead Designer dari Tokopedia.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-headline font-extrabold text-merah-jcc text-lg">Gratis</span>
                            <span class="text-xs font-bold text-charcoal flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">location_on</span> Main Auditorium</span>
                        </div>
                    </div>
                </a>

                <!-- Event Card 2 -->
                <a href="/event/detail-event" class="event-card group cursor-pointer"
                    data-title="Pameran Seni Digital 'Nusantara'" data-category="Pameran">
                    <div class="relative w-full h-[280px] rounded-[32px] overflow-hidden shadow-sm mb-6 bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1550684848-fac1c5b4e853?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Pameran Seni Digital">

                        <div
                            class="date-badge absolute -bottom-6 right-6 bg-white rounded-2xl p-3 text-center min-w-[70px] border border-charcoal/5 group-hover:-translate-y-2 transition-transform duration-300">
                            <span class="block font-headline font-extrabold text-2xl text-charcoal leading-none">15</span>
                            <span
                                class="block font-headline font-bold text-[10px] text-secondary uppercase tracking-widest mt-1">Sep</span>
                        </div>

                        <div
                            class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                            Pameran</div>
                    </div>
                    <div class="px-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-secondary mb-2">
                            <span class="material-symbols-outlined text-[16px] text-amber-500">schedule</span> 09:00 - 21:00
                            WIB
                        </div>
                        <h3
                            class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors leading-tight">
                            Pameran Seni Digital "Nusantara"</h3>
                        <p class="font-body text-sm text-secondary line-clamp-2 mb-4">Eksplorasi karya 3D dan interaktif
                            dari puluhan seniman lokal yang memadukan budaya dan teknologi.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-headline font-extrabold text-charcoal text-lg">Rp 50.000</span>
                            <span class="text-xs font-bold text-charcoal flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">location_on</span> Exhibition Hall</span>
                        </div>
                    </div>
                </a>

                <!-- Event Card 3 -->
                <a href="/event/detail-event" class="event-card group cursor-pointer"
                    data-title="Founders Mixer: Pitching Day" data-category="Networking">
                    <div class="relative w-full h-[280px] rounded-[32px] overflow-hidden shadow-sm mb-6 bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Networking">

                        <!-- Badge Khusus (Hampir Habis) -->
                        <div
                            class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-md flex items-center gap-1 animate-pulse">
                            <span class="material-symbols-outlined text-[14px]">local_fire_department</span> Sisa 5 Kursi
                        </div>

                        <div
                            class="date-badge absolute -bottom-6 right-6 bg-white rounded-2xl p-3 text-center min-w-[70px] border border-charcoal/5 group-hover:-translate-y-2 transition-transform duration-300">
                            <span class="block font-headline font-extrabold text-2xl text-charcoal leading-none">20</span>
                            <span
                                class="block font-headline font-bold text-[10px] text-secondary uppercase tracking-widest mt-1">Sep</span>
                        </div>

                        <div
                            class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                            Networking</div>
                    </div>
                    <div class="px-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-secondary mb-2">
                            <span class="material-symbols-outlined text-[16px] text-amber-500">schedule</span> 19:00 -
                            22:00 WIB
                        </div>
                        <h3
                            class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors leading-tight">
                            Founders Mixer: Pitching Day</h3>
                        <p class="font-body text-sm text-secondary line-clamp-2 mb-4">Temui para Angel Investor dan bangun
                            jejaring dengan sesama perintis startup di wilayah tapal kuda.</p>
                        <div class="flex items-center justify-between">
                            <span
                                class="font-headline font-extrabold text-charcoal text-sm uppercase tracking-widest">Khusus
                                Undangan</span>
                            <span class="text-xs font-bold text-charcoal flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">location_on</span> Rooftop Lounge</span>
                        </div>
                    </div>
                </a>

                <!-- Event Card 4 -->
                <a href="/event/detail-event" class="event-card group cursor-pointer"
                    data-title="Kelas Fotografi Produk & Studio" data-category="Workshop">
                    <div class="relative w-full h-[280px] rounded-[32px] overflow-hidden shadow-sm mb-6 bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Fotografi Produk">

                        <div
                            class="date-badge absolute -bottom-6 right-6 bg-white rounded-2xl p-3 text-center min-w-[70px] border border-charcoal/5 group-hover:-translate-y-2 transition-transform duration-300">
                            <span class="block font-headline font-extrabold text-2xl text-charcoal leading-none">28</span>
                            <span
                                class="block font-headline font-bold text-[10px] text-secondary uppercase tracking-widest mt-1">Sep</span>
                        </div>

                        <div
                            class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                            Workshop</div>
                    </div>
                    <div class="px-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-secondary mb-2">
                            <span class="material-symbols-outlined text-[16px] text-amber-500">schedule</span> 10:00 -
                            15:00 WIB
                        </div>
                        <h3
                            class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors leading-tight">
                            Kelas Fotografi Produk & Studio</h3>
                        <p class="font-body text-sm text-secondary line-clamp-2 mb-4">Praktik langsung tata cahaya
                            (*lighting*) dan pengarahan gaya untuk kebutuhan komersial UMKM.</p>
                        <div class="flex items-center justify-between">
                            <span class="font-headline font-extrabold text-charcoal text-lg">Rp 150.000</span>
                            <span class="text-xs font-bold text-charcoal flex items-center gap-1"><span
                                    class="material-symbols-outlined text-[16px]">location_on</span> Creator Studio
                                A</span>
                        </div>
                    </div>
                </a>

            </div>

            <!-- EMPTY STATE (Pencarian Kosong) -->
            <div id="emptyState" class="hidden flex flex-col items-center justify-center py-24 text-center">
                <div class="w-24 h-24 bg-charcoal/5 rounded-full flex items-center justify-center text-charcoal/20 mb-6">
                    <span class="material-symbols-outlined text-5xl">event_busy</span>
                </div>
                <h3 class="font-headline font-extrabold text-2xl text-charcoal mb-2">Event Tidak Ditemukan</h3>
                <p class="font-body text-secondary text-sm max-w-md">Tidak ada agenda yang cocok dengan pencarian atau
                    filter kategori Anda. Coba kata kunci lain.</p>
                <button id="resetSearch"
                    class="mt-6 border border-charcoal/20 text-charcoal hover:bg-charcoal hover:text-white px-8 py-3 rounded-full font-headline font-bold text-xs transition-colors">
                    Reset Pencarian
                </button>
            </div>
        </section>

        <!-- 5. CTA HOST EVENT -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
            <div
                class="reveal bg-gradient-to-br from-merah-jcc/10 to-rose-700/5 rounded-[40px] md:rounded-[64px] p-10 md:p-16 border border-merah-jcc/20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-10 shadow-xl">
                <!-- Aksen Lingkaran -->
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-merah-jcc/10 rounded-full blur-2xl"></div>

                <div class="relative z-10 max-w-xl">
                    <span
                        class="inline-block bg-white text-merah-jcc px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm mb-4">
                        Menjadi Penyelenggara
                    </span>
                    <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal leading-tight mb-4">
                        Punya Agenda Sendiri? <br>Gelar Event Anda di JCC.
                    </h2>
                    <p class="font-body text-secondary text-sm md:text-base">
                        Dari diskusi panel berkapasitas 50 orang hingga pameran berskala 500 pengunjung. Fasilitas kami siap
                        mendukung kesuksesan event Anda.
                    </p>
                </div>

                <div class="relative z-10 shrink-0 w-full md:w-auto">
                    <a href="/dashboard"
                        class="block text-center bg-merah-jcc hover:bg-rose-700 text-broken-white px-10 py-4 rounded-full font-headline font-bold text-sm transition-transform hover:scale-105 shadow-xl shadow-merah-jcc/30">
                        Booking Ruang Sekarang
                    </a>
                </div>
            </div>
        </section>

    </div>

    <!-- Script Filter & Search -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animasi Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Logika Search & Filter Live
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const eventCards = document.querySelectorAll('.event-card');
            const emptyState = document.getElementById('emptyState');
            const resetBtn = document.getElementById('resetSearch');
            const eventsContainer = document.getElementById('eventsContainer');

            let currentCategory = 'all';
            let currentSearchTerm = '';

            const filterEvents = () => {
                let visibleCount = 0;

                eventCards.forEach(card => {
                    const title = card.getAttribute('data-title').toLowerCase();
                    const category = card.getAttribute('data-category');

                    const matchesSearch = title.includes(currentSearchTerm);
                    const matchesCategory = currentCategory === 'all' || category === currentCategory;

                    if (matchesSearch && matchesCategory) {
                        card.classList.remove('hide');
                        visibleCount++;
                    } else {
                        card.classList.add('hide');
                    }
                });

                if (visibleCount === 0) {
                    eventsContainer.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                } else {
                    eventsContainer.classList.remove('hidden');
                    emptyState.classList.add('hidden');
                }
            };

            searchInput.addEventListener('input', (e) => {
                currentSearchTerm = e.target.value.toLowerCase();
                filterEvents();
            });

            filterBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // Styling Update
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-charcoal', 'text-white', 'shadow-md');
                        b.classList.add('bg-[#FBF9F6]', 'text-charcoal');
                    });

                    const clickedBtn = e.currentTarget;
                    clickedBtn.classList.remove('bg-[#FBF9F6]', 'text-charcoal');
                    clickedBtn.classList.add('bg-charcoal', 'text-white', 'shadow-md');

                    currentCategory = clickedBtn.getAttribute('data-filter');
                    filterEvents();
                });
            });

            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                currentSearchTerm = '';
                document.querySelector('[data-filter="all"]').click();
            });
        });
    </script>
@endsection
