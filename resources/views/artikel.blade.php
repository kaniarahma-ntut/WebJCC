@extends('layouts.app')

@section('title', 'Artikel & Wawasan - Jember Creative Center')

@section('content')
    <!-- CSS Khusus Animasi -->
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

        /* Smooth hide/show untuk filter JS */
        .article-card {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .article-card.hide {
            display: none;
            opacity: 0;
            transform: scale(0.95);
        }
    </style>

    <div class="bg-[#FBF9F6] min-h-screen pt-32 pb-24 font-body text-charcoal">

        <!-- 1. HERO SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <div
                class="reveal bg-charcoal rounded-[40px] md:rounded-[64px] p-10 md:p-16 lg:p-20 relative overflow-hidden shadow-2xl shadow-charcoal/10 flex flex-col items-center text-center">
                <!-- Aksen Glow Latar -->
                <div
                    class="absolute top-0 left-0 w-[400px] h-[400px] bg-merah-jcc/20 rounded-full blur-[80px] -translate-y-1/2 -translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-[300px] h-[300px] bg-amber-500/10 rounded-full blur-[60px] translate-y-1/2 translate-x-1/3">
                </div>

                <div class="relative z-10 max-w-3xl">
                    <span
                        class="inline-block bg-white/10 backdrop-blur-md border border-white/20 text-broken-white px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6">
                        Publikasi JCC
                    </span>
                    <h1
                        class="font-headline text-4xl md:text-5xl lg:text-6xl font-extrabold text-broken-white leading-[1.1] tracking-tight mb-6">
                        Wawasan & Inspirasi dari <span class="text-merah-jcc">Ekosistem Kreatif.</span>
                    </h1>
                    <p class="font-body text-broken-white/70 text-sm md:text-lg max-w-2xl mx-auto">
                        Temukan ide-ide baru, liputan event, wawasan teknologi, dan cerita sukses dari para inovator di
                        Jember Creative Center.
                    </p>
                </div>
            </div>
        </section>

        <!-- 2. SEARCH & FILTER SECTION (Sticky) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 sticky top-24 z-40">
            <div
                class="reveal reveal-delay-1 bg-white/90 backdrop-blur-xl border border-charcoal/10 rounded-[32px] p-4 md:p-6 shadow-lg shadow-charcoal/5 flex flex-col lg:flex-row gap-4 items-center justify-between">

                <!-- Search Bar -->
                <div class="relative w-full lg:w-96 shrink-0 group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                        <span
                            class="material-symbols-outlined text-charcoal/40 group-focus-within:text-merah-jcc transition-colors text-xl">search</span>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari artikel, topik, atau penulis..."
                        class="w-full bg-charcoal/5 border-2 border-transparent focus:border-merah-jcc/30 focus:bg-white rounded-full py-3.5 pl-12 pr-6 text-sm font-headline font-medium text-charcoal placeholder:text-charcoal/40 transition-all outline-none shadow-inner">
                </div>

                <!-- Category Filters (Horizontal Scroll on Mobile) -->
                <div class="flex items-center gap-2 overflow-x-auto no-scrollbar w-full lg:w-auto pb-2 lg:pb-0"
                    id="categoryFilters">
                    <button data-filter="all"
                        class="filter-btn active shrink-0 bg-charcoal text-white px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Semua
                    </button>
                    <button data-filter="Inovasi"
                        class="filter-btn shrink-0 bg-white border border-charcoal/15 text-charcoal hover:bg-charcoal/5 px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Inovasi
                    </button>
                    <button data-filter="Desain"
                        class="filter-btn shrink-0 bg-white border border-charcoal/15 text-charcoal hover:bg-charcoal/5 px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Desain
                    </button>
                    <button data-filter="Teknologi"
                        class="filter-btn shrink-0 bg-white border border-charcoal/15 text-charcoal hover:bg-charcoal/5 px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Teknologi
                    </button>
                    <button data-filter="Komunitas"
                        class="filter-btn shrink-0 bg-white border border-charcoal/15 text-charcoal hover:bg-charcoal/5 px-5 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                        Komunitas
                    </button>
                </div>
            </div>
        </section>

        <!-- 3. ARTICLES GRID -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="articlesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                <!-- Card 1 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl hover:shadow-charcoal/10 transition-all duration-300 group cursor-pointer"
                    data-title="Membangun Ekosistem Kreatif di Era Digital" data-category="Inovasi">
                    <div class="relative h-56 w-full overflow-hidden bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Thumbnail">
                        <span
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Inovasi</span>
                    </div>
                    <a href="/artikel/detail-artikel" class="p-6 md:p-8 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug mb-3 group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Membangun Ekosistem Kreatif di Era Digital
                            </h3>
                            <p class="font-body text-sm text-secondary line-clamp-3">Bagaimana ruang kolaborasi fisik
                                dipadukan dengan infrastruktur digital modern untuk mengakselerasi ide-ide startup lokal.
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-4">
                            <div class="flex items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop"
                                    class="w-8 h-8 rounded-full object-cover" alt="Author">
                                <span class="text-xs font-bold text-charcoal">Fabyan Y.</span>
                            </div>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">12 Sep 2026</span>
                        </div>
                    </a>
                </article>

                <!-- Card 2 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl hover:shadow-charcoal/10 transition-all duration-300 group cursor-pointer"
                    data-title="Tren UI/UX 2026: Glassmorphism Berpadu AI" data-category="Desain">
                    <div class="relative h-56 w-full overflow-hidden bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Thumbnail">
                        <span
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Desain</span>
                    </div>
                    <a href="/artikel/detail-artikel" class="p-6 md:p-8 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug mb-3 group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Tren UI/UX 2026: Glassmorphism Berpadu AI
                            </h3>
                            <p class="font-body text-sm text-secondary line-clamp-3">Eksplorasi gaya antarmuka masa depan
                                yang memanfaatkan elemen transparan dan kecerdasan buatan generatif.</p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-merah-jcc/10 text-merah-jcc flex items-center justify-center text-xs font-bold">
                                    AJ</div>
                                <span class="text-xs font-bold text-charcoal">Admin JCC</span>
                            </div>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">08 Sep 2026</span>
                        </div>
                    </a>
                </article>

                <!-- Card 3 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl hover:shadow-charcoal/10 transition-all duration-300 group cursor-pointer"
                    data-title="Merangkul UMKM Lewat Platform Digital Fintech" data-category="Teknologi">
                    <div class="relative h-56 w-full overflow-hidden bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Thumbnail">
                        <span
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Teknologi</span>
                    </div>
                    <a href="/artikel/detail-artikel" class="p-6 md:p-8 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug mb-3 group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Merangkul UMKM Lewat Platform Digital Fintech
                            </h3>
                            <p class="font-body text-sm text-secondary line-clamp-3">Pengembangan platform crowdfunding
                                lokal seperti Invora untuk membantu pendanaan dan literasi digital bisnis kecil.</p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-4">
                            <div class="flex items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100&auto=format&fit=crop"
                                    class="w-8 h-8 rounded-full object-cover" alt="Author">
                                <span class="text-xs font-bold text-charcoal">Reza M.</span>
                            </div>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">05 Sep 2026</span>
                        </div>
                    </a>
                </article>

                <!-- Card 4 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl hover:shadow-charcoal/10 transition-all duration-300 group cursor-pointer"
                    data-title="Pentingnya Ruang Berkumpul Untuk Dukungan Psikologis Kreator" data-category="Komunitas">
                    <div class="relative h-56 w-full overflow-hidden bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Thumbnail">
                        <span
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Komunitas</span>
                    </div>
                    <a href="/artikel/detail-artikel" class="p-6 md:p-8 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug mb-3 group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Pentingnya Ruang Berkumpul Untuk Kreator
                            </h3>
                            <p class="font-body text-sm text-secondary line-clamp-3">Mengatasi burnout di industri kreatif
                                dengan berinteraksi, berjejaring, dan saling mendukung di ruang komunal JCC.</p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-4">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center text-xs font-bold">
                                    DR</div>
                                <span class="text-xs font-bold text-charcoal">Dina R.</span>
                            </div>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">01 Sep 2026</span>
                        </div>
                    </a>
                </article>

                <!-- Card 5 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl hover:shadow-charcoal/10 transition-all duration-300 group cursor-pointer"
                    data-title="Pengembangan IoT untuk Sistem Evakuasi Bencana SEMAR" data-category="Teknologi">
                    <div class="relative h-56 w-full overflow-hidden bg-charcoal/5">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=800&auto=format&fit=crop"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            alt="Thumbnail">
                        <span
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Teknologi</span>
                    </div>
                    <a href="/artikel/detail-artikel" class="p-6 md:p-8 flex flex-col justify-between h-[250px]">
                        <div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug mb-3 group-hover:text-merah-jcc transition-colors line-clamp-2">
                                IoT untuk Sistem Evakuasi SEMAR
                            </h3>
                            <p class="font-body text-sm text-secondary line-clamp-3">Inovasi anak muda Jember dalam
                                memanfaatkan mikrokontroler dan sensor untuk sistem peringatan dini bencana mandiri.</p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-4">
                            <div class="flex items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop"
                                    class="w-8 h-8 rounded-full object-cover" alt="Author">
                                <span class="text-xs font-bold text-charcoal">Fabyan Y.</span>
                            </div>
                            <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">28 Agu 2026</span>
                        </div>
                    </a>
                </article>

                <!-- Card 6 -->
                <article
                    class="article-card reveal reveal-delay-2 bg-charcoal rounded-[32px] overflow-hidden shadow-xl hover:-translate-y-2 hover:shadow-merah-jcc/20 transition-all duration-300 group cursor-pointer relative"
                    data-title="Pendaftaran Jember Creative Week 2026 Telah Dibuka" data-category="Komunitas">
                    <!-- Dark mode card (Special Event) -->
                    <div class="absolute inset-0 bg-gradient-to-br from-merah-jcc/20 to-transparent opacity-50"></div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-merah-jcc rounded-full blur-3xl opacity-40"></div>

                    <div class="relative h-48 w-full overflow-hidden p-6 pb-0">
                        <span
                            class="inline-block bg-merah-jcc text-white px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm mb-4">Highlight</span>
                        <a href="/artikel/detail-artikel"
                            class="font-headline font-extrabold text-2xl text-broken-white leading-snug mb-3 line-clamp-3">
                            Pendaftaran Jember Creative Week 2026 Telah Dibuka!
                        </a>
                    </div>
                    <div class="relative p-6 md:p-8 flex flex-col justify-end h-[220px]">
                        <p class="font-body text-sm text-broken-white/70 line-clamp-2 mb-6">Siapkan portofolio dan karya
                            terbaik tim Anda. Raih kesempatan pendanaan dan eksposur eksklusif.</p>

                        <div class="flex items-center justify-between pt-4 border-t border-white/10">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-white text-charcoal flex items-center justify-center text-xs font-bold">
                                    JCC</div>
                                <span class="text-xs font-bold text-broken-white">Official Event</span>
                            </div>
                            <a href="#"
                                class="text-[10px] font-bold text-merah-jcc uppercase tracking-widest hover:text-white transition-colors">Daftar
                                Sekarang &rarr;</a>
                        </div>
                    </div>
                </article>

            </div>

            <!-- EMPTY STATE (Hidden by default) -->
            <div id="emptyState" class="hidden flex flex-col items-center justify-center py-20 text-center">
                <div class="w-24 h-24 bg-charcoal/5 rounded-full flex items-center justify-center text-charcoal/20 mb-6">
                    <span class="material-symbols-outlined text-5xl">search_off</span>
                </div>
                <h3 class="font-headline font-extrabold text-2xl text-charcoal mb-2">Pencarian Tidak Ditemukan</h3>
                <p class="font-body text-secondary text-sm max-w-md">Maaf, kami tidak dapat menemukan artikel dengan kata
                    kunci atau filter tersebut. Coba gunakan istilah lain.</p>
                <button id="resetSearch"
                    class="mt-6 border-2 border-charcoal text-charcoal hover:bg-charcoal hover:text-white px-6 py-2.5 rounded-full font-headline font-bold text-xs transition-colors">
                    Reset Pencarian
                </button>
            </div>
        </section>

    </div>

    <!-- Script Search Real-Time & Intersection Observer -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. REVEAL ANIMATION OBSERVER
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

            // 2. REAL-TIME SEARCH & FILTER LOGIC
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const articles = document.querySelectorAll('.article-card');
            const emptyState = document.getElementById('emptyState');
            const resetBtn = document.getElementById('resetSearch');
            const articlesContainer = document.getElementById('articlesContainer');

            let currentCategory = 'all';
            let currentSearchTerm = '';

            const filterArticles = () => {
                let visibleCount = 0;

                articles.forEach(article => {
                    const title = article.getAttribute('data-title').toLowerCase();
                    const category = article.getAttribute('data-category');

                    const matchesSearch = title.includes(currentSearchTerm);
                    const matchesCategory = currentCategory === 'all' || category === currentCategory;

                    if (matchesSearch && matchesCategory) {
                        article.classList.remove('hide');
                        visibleCount++;
                    } else {
                        article.classList.add('hide');
                    }
                });

                // Tampilkan Empty State jika tidak ada yang cocok
                if (visibleCount === 0) {
                    articlesContainer.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                } else {
                    articlesContainer.classList.remove('hidden');
                    emptyState.classList.add('hidden');
                }
            };

            // Event Listener untuk Search Input
            searchInput.addEventListener('input', (e) => {
                currentSearchTerm = e.target.value.toLowerCase();
                filterArticles();
            });

            // Event Listener untuk Category Pills
            filterBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // Update Active Styling on Buttons
                    filterBtns.forEach(b => {
                        b.classList.remove('bg-charcoal', 'text-white');
                        b.classList.add('bg-white', 'text-charcoal');
                    });

                    const clickedBtn = e.currentTarget;
                    clickedBtn.classList.remove('bg-white', 'text-charcoal');
                    clickedBtn.classList.add('bg-charcoal', 'text-white');

                    currentCategory = clickedBtn.getAttribute('data-filter');
                    filterArticles();
                });
            });

            // Event Listener untuk Reset Button di Empty State
            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                currentSearchTerm = '';

                // Reset to 'all' category
                document.querySelector('[data-filter="all"]').click();
            });
        });
    </script>
@endsection
