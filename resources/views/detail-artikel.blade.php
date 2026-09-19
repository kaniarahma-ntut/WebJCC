@extends('layouts.app')

@section('title', 'Membangun Ekosistem Kreatif di Era Digital - JCC')

@section('content')
    <!-- CSS Khusus Animasi & Artikel -->
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(30px);
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

        /* Reading Progress Bar */
        #progress-bar {
            transform-origin: 0% 50%;
            transition: transform 0.1s ease-out;
        }

        /* Custom Styling untuk Drop Cap (Huruf Besar di Awal) */
        .drop-cap::first-letter {
            font-family: 'Montserrat', sans-serif;
            font-size: 4rem;
            font-weight: 800;
            float: left;
            line-height: 1;
            padding-right: 0.5rem;
            color: #C0262C;
            /* merah-jcc */
            margin-top: 0.2rem;
        }
    </style>

    <!-- Reading Progress Indicator (Fixed Top) -->
    <div class="fixed top-0 left-0 w-full h-1.5 bg-charcoal/5 z-[100]">
        <div id="progress-bar" class="h-full bg-merah-jcc w-full scale-x-0"></div>
    </div>

    <div class="bg-[#FBF9F6] min-h-screen pt-28 md:pt-36 pb-24 font-body text-charcoal">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 1. HEADER ARTIKEL -->
            <div class="max-w-4xl mx-auto text-center reveal">
                <!-- Navigasi Kembali & Kategori -->
                <div class="flex flex-wrap items-center justify-center gap-4 mb-8">
                    <a href="/artikel"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors">
                        <span class="material-symbols-outlined text-[16px]">arrow_back</span> Kembali
                    </a>
                    <div class="w-1 h-1 rounded-full bg-charcoal/20"></div>
                    <span
                        class="inline-block bg-merah-jcc/10 text-merah-jcc px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest border border-merah-jcc/20">
                        Inovasi
                    </span>
                </div>

                <!-- Judul Artikel -->
                <h1
                    class="font-headline text-3xl md:text-5xl lg:text-6xl font-extrabold text-charcoal leading-tight tracking-tight mb-8">
                    Membangun Ekosistem Kreatif di Era Digital: <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-merah-jcc to-rose-500">Kolaborasi &
                        Inovasi</span>
                </h1>

                <!-- Meta Penulis -->
                <div class="flex items-center justify-center gap-6 pb-8 border-b border-charcoal/10 mb-8 md:mb-12">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=100&auto=format&fit=crop"
                            class="w-12 h-12 rounded-full object-cover ring-2 ring-merah-jcc/20" alt="Fabyan Y.">
                        <div class="text-left">
                            <p class="font-headline font-bold text-sm text-charcoal">Fabyan Yastika</p>
                            <p class="text-xs text-secondary">Lead Researcher JCC</p>
                        </div>
                    </div>
                    <div class="w-px h-8 bg-charcoal/10 hidden md:block"></div>
                    <div
                        class="hidden md:flex items-center gap-4 text-xs font-bold text-secondary uppercase tracking-widest">
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-[16px]">calendar_month</span> 12 Sep 2026</span>
                        <span class="flex items-center gap-1"><span
                                class="material-symbols-outlined text-[16px]">schedule</span> 5 Min Read</span>
                    </div>
                </div>
            </div>

            <!-- 2. HERO IMAGE -->
            <div
                class="reveal reveal-delay-1 max-w-6xl mx-auto w-full h-[300px] md:h-[500px] lg:h-[600px] rounded-[32px] md:rounded-[48px] overflow-hidden shadow-2xl shadow-charcoal/10 mb-12 md:mb-20 relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2000&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover" alt="Ilustrasi Ekosistem Kreatif">
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/40 to-transparent mix-blend-overlay"></div>
            </div>

            <!-- 3. KONTEN ARTIKEL & SIDEBAR SHARE -->
            <div class="max-w-6xl mx-auto flex flex-col lg:flex-row gap-12 relative">

                <!-- Sticky Share Sidebar (Kiri) -->
                <div class="hidden lg:block w-24 shrink-0">
                    <div class="sticky top-32 flex flex-col gap-4 items-center">
                        <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mb-2 text-center"
                            style="writing-mode: vertical-rl; transform: rotate(180deg);">Bagikan</p>
                        <div class="w-px h-12 bg-charcoal/10 mb-2"></div>
                        <button
                            class="w-12 h-12 rounded-full bg-white border border-charcoal/10 text-charcoal hover:text-blue-600 hover:border-blue-600 hover:shadow-lg transition-all flex items-center justify-center group"
                            title="Bagikan ke LinkedIn">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </button>
                        <button
                            class="w-12 h-12 rounded-full bg-white border border-charcoal/10 text-charcoal hover:text-blue-400 hover:border-blue-400 hover:shadow-lg transition-all flex items-center justify-center group"
                            title="Bagikan ke Twitter/X">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </button>
                        <button onclick="copyLink()"
                            class="w-12 h-12 rounded-full bg-charcoal text-white hover:bg-merah-jcc hover:shadow-lg transition-all flex items-center justify-center group relative"
                            title="Salin Tautan">
                            <span
                                class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform">link</span>
                            <span id="toast-copy"
                                class="absolute left-16 bg-charcoal text-white text-[10px] px-3 py-1.5 rounded-md opacity-0 transition-opacity pointer-events-none whitespace-nowrap">Tautan
                                disalin!</span>
                        </button>
                    </div>
                </div>

                <!-- Main Content Area -->
                <article
                    class="flex-1 max-w-3xl mx-auto w-full prose prose-lg prose-headings:font-headline prose-headings:text-charcoal prose-p:text-charcoal/80 prose-p:font-body prose-a:text-merah-jcc prose-a:no-underline hover:prose-a:underline prose-strong:text-charcoal prose-img:rounded-[24px]">

                    <p class="drop-cap text-lg md:text-xl leading-[1.8] mb-8 reveal">
                        Seiring dengan pesatnya perkembangan teknologi di Indonesia, kebutuhan akan ruang fisik yang
                        memfasilitasi kolaborasi digital menjadi semakin krusial. Jember, sebagai salah satu poros
                        pendidikan dan ekonomi di Jawa Timur, merespons tantangan ini melalui kehadiran Jember Creative
                        Center (JCC). Pertanyaannya: bagaimana ruang fisik dapat beradaptasi dengan budaya kerja hibrida di
                        era modern ini?
                    </p>

                    <p class="text-lg leading-[1.8] mb-8 reveal">
                        Dalam konsep tradisional, ruang kerja seringkali dipisahkan berdasarkan departemen atau fungsi yang
                        kaku. Namun, ekosistem kreatif menuntut sebaliknya. Fleksibilitas, konektivitas, dan keterbukaan
                        adalah kunci untuk memantik inovasi lintas disiplin.
                    </p>

                    <h2 class="font-headline font-extrabold text-2xl md:text-3xl mt-12 mb-6 reveal">Pergeseran Paradigma
                        Ruang Kolaborasi</h2>

                    <p class="text-lg leading-[1.8] mb-8 reveal">
                        Menurut riset terbaru dari Institute of Creative Economy, lebih dari 65% pekerja kreatif muda
                        memilih untuk bekerja di lingkungan yang menawarkan kesempatan *networking* secara organik, bukan
                        sekadar ruang meja kosong. Di sinilah arsitektur dan teknologi harus bersinergi.
                    </p>

                    <!-- Blockquote Keren -->
                    <blockquote class="reveal my-12 border-l-4 border-merah-jcc pl-6 md:pl-8 py-2 relative">
                        <span
                            class="absolute -left-4 -top-6 text-6xl text-merah-jcc/20 font-headline font-extrabold">"</span>
                        <p
                            class="font-headline text-xl md:text-3xl font-bold text-charcoal leading-snug m-0 relative z-10 italic">
                            Inovasi sejati jarang lahir dalam isolasi. Ia adalah hasil persilangan acak dari berbagai
                            disiplin ilmu yang difasilitasi oleh ruang yang tepat.
                        </p>
                    </blockquote>

                    <p class="text-lg leading-[1.8] mb-8 reveal">
                        JCC mengimplementasikan konsep ini melalui "Zona Interseksi". Area ini dirancang sedemikian rupa
                        agar seorang *programmer* yang sedang beristirahat dapat berpapasan dan bertukar pikiran dengan
                        *graphic designer* atau pelaku UMKM. Ruang-ruang ini tidak dilabeli secara spesifik, melainkan
                        dibiarkan mengalir (*fluid*) untuk menyesuaikan dengan kebutuhan spontan komunitas.
                    </p>

                    <!-- Image Insert dalam Artikel -->
                    <figure class="reveal my-12">
                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=1000&auto=format&fit=crop"
                            alt="Ruang Diskusi di JCC" class="w-full rounded-[32px] shadow-lg">
                        <figcaption class="text-center text-sm text-secondary mt-4 font-bold tracking-wide">Desain ruang
                            diskusi terbuka yang memicu interaksi organik.</figcaption>
                    </figure>

                    <h3 class="font-headline font-extrabold text-xl md:text-2xl mt-12 mb-4 reveal">Infrastruktur Cerdas
                        Penunjang Kreativitas</h3>

                    <p class="text-lg leading-[1.8] mb-8 reveal">
                        Namun, ruang fisik saja tidak cukup. Ekosistem harus didukung oleh infrastruktur digital yang
                        mumpuni. Sistem pendaftaran cerdas, manajemen ruang berbasis IoT (Internet of Things), hingga
                        konektivitas internet berkecepatan tinggi menjadi tulang punggung operasional JCC.
                    </p>

                    <ul class="list-none space-y-4 mb-8 reveal pl-0">
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-merah-jcc mt-1">check_circle</span>
                            <span class="text-lg leading-[1.6]"><strong>Smart Booking System:</strong> Kemudahan memesan
                                ruang rapat atau studio *podcast* secara *real-time* lewat aplikasi.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-merah-jcc mt-1">check_circle</span>
                            <span class="text-lg leading-[1.6]"><strong>Digital Pass Access:</strong> Keamanan berbasis QR
                                code yang terintegrasi dengan profil member.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-merah-jcc mt-1">check_circle</span>
                            <span class="text-lg leading-[1.6]"><strong>Cloud Collab Tools:</strong> Penyediaan layar pintar
                                dan perangkat *casting* di setiap ruangan untuk presentasi instan.</span>
                        </li>
                    </ul>

                    <p class="text-lg leading-[1.8] mb-8 reveal">
                        Pada akhirnya, kesuksesan sebuah *creative hub* tidak hanya diukur dari kemegahan bangunannya,
                        melainkan dari seberapa besar dampak komunitas yang tumbuh di dalamnya. Melalui perpaduan ruang
                        fisik yang adaptif dan teknologi cerdas, kita tidak hanya sekadar mengikuti tren, namun
                        mendefinisikan ulang masa depan kolaborasi kreatif.
                    </p>
                </article>

            </div>

            <!-- 4. TAGS & MOBILE SHARE -->
            <div
                class="max-w-3xl mx-auto mt-12 pt-8 border-t border-charcoal/10 flex flex-col md:flex-row items-center justify-between gap-6 reveal">
                <!-- Tags -->
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-secondary uppercase tracking-widest mr-2">Tags:</span>
                    <a href="#"
                        class="bg-charcoal/5 hover:bg-charcoal hover:text-white text-charcoal px-4 py-1.5 rounded-full text-xs font-bold transition-colors">Inovasi</a>
                    <a href="#"
                        class="bg-charcoal/5 hover:bg-charcoal hover:text-white text-charcoal px-4 py-1.5 rounded-full text-xs font-bold transition-colors">Ekosistem</a>
                    <a href="#"
                        class="bg-charcoal/5 hover:bg-charcoal hover:text-white text-charcoal px-4 py-1.5 rounded-full text-xs font-bold transition-colors">Startup</a>
                </div>

                <!-- Mobile Share (Muncul di layar kecil) -->
                <div class="flex lg:hidden items-center gap-3">
                    <span class="text-xs font-bold text-secondary uppercase tracking-widest mr-2">Share:</span>
                    <button
                        class="w-10 h-10 rounded-full bg-white border border-charcoal/10 text-charcoal flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full bg-white border border-charcoal/10 text-charcoal flex items-center justify-center shadow-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </button>
                    <button onclick="copyLink()"
                        class="w-10 h-10 rounded-full bg-charcoal text-white flex items-center justify-center shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">link</span>
                    </button>
                </div>
            </div>

        </div>

        <!-- 5. RELATED ARTICLES (Baca Juga) -->
        <section class="mt-24 md:mt-32 pt-16 md:pt-24 bg-white border-t border-charcoal/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex items-end justify-between mb-10 reveal">
                    <div>
                        <h2 class="font-headline font-extrabold text-3xl md:text-4xl text-charcoal">Baca Juga</h2>
                        <p class="font-body text-secondary mt-2">Artikel pilihan lainnya untuk wawasan Anda.</p>
                    </div>
                    <a href="/artikel"
                        class="hidden md:inline-flex bg-white border border-charcoal/10 text-charcoal px-6 py-2.5 rounded-full font-headline font-bold text-xs hover:bg-charcoal/5 transition-colors">
                        Lihat Semua Artikel
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 pb-10">
                    <!-- Related Card 1 -->
                    <a href="#"
                        class="reveal reveal-delay-1 block bg-[#FBF9F6] rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="relative h-48 w-full overflow-hidden bg-charcoal/5">
                            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Thumbnail">
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Desain</span>
                        </div>
                        <div class="p-6 md:p-8 flex flex-col justify-between h-[200px]">
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Tren UI/UX 2026: Glassmorphism Berpadu AI
                            </h3>
                            <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-auto">
                                <span class="text-xs font-bold text-charcoal flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-merah-jcc/10 text-merah-jcc flex items-center justify-center text-[10px]">
                                        AJ</div> Admin JCC
                                </span>
                                <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">08 Sep
                                    2026</span>
                            </div>
                        </div>
                    </a>

                    <!-- Related Card 2 -->
                    <a href="#"
                        class="reveal reveal-delay-2 block bg-[#FBF9F6] rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="relative h-48 w-full overflow-hidden bg-charcoal/5">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=800&auto=format&fit=crop"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Thumbnail">
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Teknologi</span>
                        </div>
                        <div class="p-6 md:p-8 flex flex-col justify-between h-[200px]">
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Merangkul UMKM Lewat Platform Digital Fintech
                            </h3>
                            <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-auto">
                                <span class="text-xs font-bold text-charcoal flex items-center gap-2"><img
                                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=100&auto=format&fit=crop"
                                        class="w-6 h-6 rounded-full object-cover"> Reza M.</span>
                                <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">05 Sep
                                    2026</span>
                            </div>
                        </div>
                    </a>

                    <!-- Related Card 3 (Hidden di iPad Portrait) -->
                    <a href="#"
                        class="reveal reveal-delay-3 hidden lg:block bg-[#FBF9F6] rounded-[32px] overflow-hidden shadow-sm border border-charcoal/5 hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group">
                        <div class="relative h-48 w-full overflow-hidden bg-charcoal/5">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800&auto=format&fit=crop"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Thumbnail">
                            <span
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">Komunitas</span>
                        </div>
                        <div class="p-6 md:p-8 flex flex-col justify-between h-[200px]">
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal leading-snug group-hover:text-merah-jcc transition-colors line-clamp-2">
                                Pentingnya Ruang Berkumpul Untuk Kreator
                            </h3>
                            <div class="flex items-center justify-between pt-4 border-t border-charcoal/10 mt-auto">
                                <span class="text-xs font-bold text-charcoal flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center text-[10px]">
                                        DR</div> Dina R.
                                </span>
                                <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">01 Sep
                                    2026</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

    </div>

    <!-- Script Interaktivitas -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 1. REVEAL ANIMATION ON SCROLL
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target); // Hanya animasi 1x
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // 2. READING PROGRESS BAR
            const progressBar = document.getElementById('progress-bar');

            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement
                .clientHeight;
                const scrolled = (winScroll / height);

                // Scale X berdasarkan persentase scroll
                if (progressBar) {
                    progressBar.style.transform = `scaleX(${scrolled})`;
                }
            });
        });

        // 3. COPY LINK FUNCTION
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const toast = document.getElementById('toast-copy');
                toast.classList.remove('opacity-0');

                setTimeout(() => {
                    toast.classList.add('opacity-0');
                }, 2000);
            });
        }
    </script>
@endsection
