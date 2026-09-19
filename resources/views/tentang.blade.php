@extends('layouts.app')

@section('title', 'Tentang Kami - Jember Creative Center')

@section('content')
    <!-- CSS Khusus Animasi (Tanpa merusak layout) -->
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

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(3deg);
            }
        }

        .animate-floaty {
            animation: floaty 6s ease-in-out infinite;
        }
    </style>

    <div class="bg-[#FBF9F6] min-h-screen overflow-hidden pt-32 pb-24 font-body text-charcoal">

        <!-- 1. HERO SECTION -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="reveal relative w-full h-[500px] md:h-[600px] rounded-[40px] md:rounded-[64px] overflow-hidden shadow-2xl shadow-charcoal/10 group">
                <!-- Image -->
                <img src="{{ asset('tentang.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-[2s] ease-out"
                    alt="Tim Kreatif JCC">

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/90 via-charcoal/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-charcoal/70 to-transparent"></div>

                <!-- Content -->
                <div class="absolute inset-0 p-8 md:p-16 flex flex-col justify-end">
                    <div class="max-w-3xl">
                        <span
                            class="inline-block bg-white/20 backdrop-blur-md border border-white/30 text-broken-white px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6">
                            Tentang JCC
                        </span>
                        <h1
                            class="font-headline text-4xl md:text-5xl lg:text-7xl font-extrabold text-broken-white leading-[1.1] tracking-tight">
                            Titik Temu untuk <br>
                            <span class="text-merah-jcc italic pr-2">Kreativitas</span> & Inovasi.
                        </h1>
                        <p class="font-body text-broken-white/80 mt-6 text-sm md:text-lg max-w-xl leading-relaxed">
                            Kami percaya bahwa ide-ide hebat lahir dari ruang yang mendukung kolaborasi tanpa batas. Jember
                            Creative Center adalah rumah bagi para kreator, inovator, dan pemimpi.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. CERITA KAMI (Layout Split 50:50 yang Rapi) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 md:mt-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                <!-- Gambar & Badge (Dikunci tingginya agar tidak memanjang aneh) -->
                <div class="reveal order-2 lg:order-1 relative">
                    <div class="w-full  h-[200px] rounded-[32px] md:rounded-[48px] overflow-hidden shadow-xl"
                        style="height:200px;">
                        <img src="{{ asset('tentang.jpg') }}"
                            class="w-full h-[200px] object-cover hover:scale-105 transition-transform duration-700"
                            alt="Ruang Kolaborasi">
                    </div>

                    <!-- Badge Floating di Kanan Bawah -->
                    <div
                        class="absolute -bottom-8 right-4 md:-right-8 bg-white p-5 md:p-6 rounded-[24px] shadow-2xl border border-charcoal/5 animate-floaty flex items-center gap-4">
                        <h3 class="font-headline font-extrabold text-4xl text-merah-jcc">2026</h3>
                        <div class="h-10 w-px bg-charcoal/10"></div>
                        <p class="text-[10px] font-bold text-charcoal leading-tight uppercase tracking-widest">
                            Tahun<br>Berdiri</p>
                    </div>
                </div>

                <!-- Teks -->
                <div class="reveal reveal-delay-1 order-1 lg:order-2 space-y-6">
                    <h2
                        class="font-headline text-4xl md:text-5xl font-extrabold text-charcoal tracking-tight leading-tight">
                        Dari Jember,<br>Untuk Ekosistem Global.
                    </h2>
                    <p class="text-secondary leading-relaxed text-sm md:text-base">
                        Berawal dari inisiatif sederhana untuk menyediakan ruang kerja yang nyaman, JCC berevolusi menjadi
                        hub kreatif terbesar di wilayah Timur Jawa. Kami tidak hanya menyediakan meja dan kursi, tetapi
                        membangun <strong>ekosistem organik</strong> di mana seniman, <em>developer</em>, pengusaha, dan
                        komunitas berkumpul.
                    </p>
                    <p class="text-secondary leading-relaxed text-sm md:text-base pb-4">
                        Ruang kami dirancang untuk beradaptasi dengan kebutuhan Anda—mulai dari studio pameran seni, ruang
                        <em>podcast</em> kedap suara, hingga aula auditorium. Semuanya terintegrasi dalam satu sistem
                        cerdas.
                    </p>
                    <a href="/jelajahi"
                        class="inline-block bg-merah-jcc text-white px-8 py-3.5 rounded-full font-headline font-bold text-sm hover:bg-rose-700 hover:scale-105 transition-all shadow-lg shadow-merah-jcc/30">
                        Jelajahi Fasilitas
                    </a>
                </div>

            </div>
        </section>

        <!-- 3. VISI & MISI (Bento Grid Simetris) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 md:mt-40">
            <div class="reveal text-center max-w-2xl mx-auto space-y-4 mb-12">
                <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal">Kompas Kami</h2>
                <p class="text-secondary text-sm md:text-base">Fondasi utama yang menggerakkan setiap langkah dan inovasi di
                    Jember Creative Center.</p>
            </div>

            <div class="flex flex-col gap-6">
                <!-- VISI: Full Width / Lebar Penuh -->
                <div
                    class="reveal reveal-delay-1 bg-charcoal text-broken-white p-10 md:p-16 rounded-[40px] md:rounded-[48px] relative overflow-hidden group shadow-xl">
                    <div
                        class="absolute top-0 right-0 w-[500px] h-[500px] bg-merah-jcc/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 group-hover:scale-110 transition-transform duration-1000">
                    </div>
                    <div class="relative z-10 max-w-4xl">
                        <span
                            class="inline-block bg-white/10 px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6 border border-white/10">Visi
                            Kami</span>
                        <h3 class="font-headline text-2xl md:text-4xl lg:text-5xl font-extrabold leading-snug">
                            Menjadi pusat inkubasi ide <span class="text-merah-jcc">terkemuka</span> yang mencetak kreator
                            berdaya saing global dari daerah.
                        </h3>
                    </div>
                </div>

                <!-- MISI: 3 Kolom Sejajar -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="reveal reveal-delay-2 bg-white border border-charcoal/10 p-8 rounded-[32px] shadow-sm hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-14 h-14 bg-merah-jcc/10 text-merah-jcc rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-3xl">architecture</span>
                        </div>
                        <h4 class="font-headline font-bold text-xl text-charcoal mb-3">Fasilitas Kelas Satu</h4>
                        <p class="text-secondary text-sm leading-relaxed">Menyediakan infrastruktur ruang fisik dan digital
                            yang canggih, inklusif, dan adaptif untuk berbagai disiplin ilmu.</p>
                    </div>

                    <div
                        class="reveal reveal-delay-2 bg-white border border-charcoal/10 p-8 rounded-[32px] shadow-sm hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-14 h-14 bg-emerald-500/10 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-3xl">hub</span>
                        </div>
                        <h4 class="font-headline font-bold text-xl text-charcoal mb-3">Sinergi Komunitas</h4>
                        <p class="text-secondary text-sm leading-relaxed">Membangun jembatan kolaborasi yang erat antara
                            akademisi, pelaku industri, pemerintah, dan komunitas lokal.</p>
                    </div>

                    <div
                        class="reveal reveal-delay-2 bg-white border border-charcoal/10 p-8 rounded-[32px] shadow-sm hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-14 h-14 bg-amber-500/10 text-amber-600 rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                        </div>
                        <h4 class="font-headline font-bold text-xl text-charcoal mb-3">Akselerasi Karya</h4>
                        <p class="text-secondary text-sm leading-relaxed">Mendukung pertumbuhan bisnis dan karya UMKM serta
                            kreator melalui program bimbingan dan eksposur publik.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. DAMPAK DALAM ANGKA (Pill Tebal) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 md:mt-24">
            <div
                class="reveal bg-merah-jcc rounded-[40px] md:rounded-[64px] p-10 md:p-16 text-broken-white relative overflow-hidden shadow-2xl">
                <!-- Elemen Hiasan -->
                <div class="absolute -left-24 -top-24 w-80 h-80 border-[40px] border-white/10 rounded-full"></div>
                <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-rose-700 rounded-full blur-3xl"></div>

                <div
                    class="relative z-10 grid grid-cols-2 md:grid-cols-4 gap-10 md:gap-8 text-center divide-x-0 md:divide-x divide-white/20">
                    <div class="space-y-3">
                        <h3 class="font-headline text-5xl md:text-6xl font-extrabold counter" data-target="12">0</h3>
                        <p class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-white/80">Fasilitas Ruang
                        </p>
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-headline text-5xl md:text-6xl font-extrabold"><span class="counter"
                                data-target="500">0</span>+</h3>
                        <p class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-white/80">Member Aktif</p>
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-headline text-5xl md:text-6xl font-extrabold"><span class="counter"
                                data-target="50">0</span>+</h3>
                        <p class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-white/80">Event Sukses</p>
                    </div>
                    <div class="space-y-3">
                        <h3 class="font-headline text-5xl md:text-6xl font-extrabold"><span class="counter"
                                data-target="30">0</span>+</h3>
                        <p class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-white/80">Mitra Komunitas
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. CTA (Kotak Dark Mode yang elegan) -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 md:mt-32">
            <div
                class="reveal bg-charcoal rounded-[40px] md:rounded-[64px] p-20 md:p-24 text-center relative overflow-hidden shadow-2xl">
                <!-- Noise Texture Overlay (Opsional untuk estetika) -->
                <div
                    class="absolute inset-0 opacity-[0.03] bg-[url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E')]">
                </div>

                <div class="relative z-10 max-w-3xl mx-auto flex flex-col items-center">
                    <span
                        class="inline-block bg-merah-jcc/20 text-merah-jcc px-5 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest border border-merah-jcc/30 mb-8">
                        Bergabung Bersama Kami
                    </span>
                    <h2 class="font-headline text-4xl md:text-6xl font-extrabold text-broken-white leading-[1.1] mb-6">
                        Punya Ide Besar? <br>
                        Mari Cari Ruangnya Di Sini.
                    </h2>
                    <p class="font-body text-broken-white/70 text-sm md:text-lg mb-10 max-w-xl">
                        Daftar menjadi anggota komunitas JCC dan nikmati akses eksklusif ke fasilitas, event, dan jaringan
                        profesional terbaik di Jember.
                    </p>
                    <a href="/register"
                        class="bg-merah-jcc hover:bg-broken-white hover:text-merah-jcc text-broken-white px-10 py-4 rounded-full font-headline font-bold text-sm transition-all duration-300 shadow-xl shadow-merah-jcc/30 hover:scale-105">
                        Buat Akun JCC Sekarang
                    </a>
                </div>
            </div>
        </section>

    </div>

    <!-- Script Animasi Scroll & Counter Angka -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');

                        const counters = entry.target.querySelectorAll('.counter');
                        counters.forEach(counter => {
                            if (!counter.classList.contains('counted')) {
                                animateCounter(counter);
                                counter.classList.add('counted');
                            }
                        });

                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            const animateCounter = el => {
                const target = +el.dataset.target;
                const duration = 2500;
                const start = performance.now();

                const step = now => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 4); // ease-out quart
                    el.textContent = Math.ceil(eased * target);

                    if (progress < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            };
        });
    </script>
@endsection
