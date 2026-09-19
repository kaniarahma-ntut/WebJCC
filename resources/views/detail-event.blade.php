@extends('layouts.app')

@section('title', 'Masterclass UI/UX: Desain Inklusif - JCC')

@section('content')
    <!-- CSS Khusus Animasi -->
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

        .reveal-delay-3 {
            transition-delay: 0.45s;
        }
    </style>

    <div class="bg-[#FBF9F6] min-h-screen pt-28 md:pt-36 pb-24 font-body text-charcoal">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- 1. HERO SECTION (Immersive Banner) -->
            <div
                class="reveal relative w-full h-[400px] md:h-[500px] lg:h-[550px] rounded-[40px] md:rounded-[64px] overflow-hidden shadow-2xl shadow-charcoal/10 mb-12 group">
                <!-- Background Image -->
                <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=2000&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover scale-105 group-hover:scale-100 transition-transform duration-[2s] ease-out"
                    alt="Masterclass UI/UX">

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-charcoal/95 via-charcoal/50 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-charcoal/80 to-transparent"></div>

                <!-- Floating Tags (Top) -->
                <div class="absolute top-8 left-8 flex items-center gap-3">
                    <a href="/event"
                        class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center hover:bg-white hover:text-charcoal transition-colors border border-white/30">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    </a>
                    <span
                        class="bg-merah-jcc text-white px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-lg">
                        Workshop
                    </span>
                    <span
                        class="bg-white/20 backdrop-blur-md border border-white/30 text-white px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-lg flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Sisa 5 Kursi
                    </span>
                </div>

                <!-- Event Title & Quick Info (Bottom) -->
                <div
                    class="absolute bottom-0 left-0 w-full p-8 md:p-12 lg:p-16 flex flex-col md:flex-row md:items-end justify-between gap-8">
                    <div class="max-w-3xl">
                        <h1
                            class="font-headline text-4xl md:text-5xl lg:text-6xl font-extrabold text-broken-white leading-[1.1] tracking-tight mb-4">
                            Masterclass UI/UX: <br>Desain Inklusif
                        </h1>
                        <p class="font-body text-broken-white/80 text-sm md:text-lg max-w-xl">
                            Pelajari cara merancang antarmuka yang ramah bagi semua pengguna bersama praktisi terkemuka dari
                            industri teknologi.
                        </p>
                    </div>

                    <!-- Date Box (Kanan Bawah) -->
                    <div
                        class="hidden md:flex bg-white/10 backdrop-blur-xl border border-white/20 rounded-[24px] p-4 items-center gap-4 text-broken-white text-center shrink-0 shadow-2xl">
                        <div class="px-2 border-r border-white/20">
                            <span class="block font-headline font-extrabold text-4xl text-merah-jcc leading-none">12</span>
                            <span class="block font-headline font-bold text-[10px] uppercase tracking-widest mt-1">Sep
                                2026</span>
                        </div>
                        <div class="px-2 text-left">
                            <p class="text-[10px] font-bold text-broken-white/60 uppercase tracking-widest mb-1">Waktu</p>
                            <p class="font-headline font-bold text-sm">13:00 - 16:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. MAIN LAYOUT (Grid 8 + 4) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">

                <!-- KOLOM KIRI: KONTEN EVENT -->
                <div class="lg:col-span-8 space-y-12 md:space-y-16">

                    <!-- Deskripsi -->
                    <section class="reveal">
                        <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mb-6">Tentang Event Ini
                        </h2>
                        <div class="prose prose-lg prose-p:font-body prose-p:text-charcoal/80 prose-p:leading-relaxed">
                            <p>
                                Desain inklusif bukan lagi sekadar opsional, melainkan standar industri masa depan.
                                Bagaimana kita memastikan bahwa produk digital yang kita buat dapat diakses oleh siapa saja,
                                terlepas dari keterbatasan fisik maupun situasional mereka?
                            </p>
                            <p>
                                Dalam workshop intensif berdurasi 3 jam ini, kita akan membedah prinsip dasar <em>Universal
                                    Design</em>, menganalisis *case study* dari produk-produk besar, dan mempraktikkan audit
                                aksesibilitas (WCAG 2.1) secara langsung pada desain antarmuka (*Figma*).
                            </p>
                            <p>
                                <strong>Apa yang akan Anda pelajari:</strong>
                            </p>
                            <ul>
                                <li>Memahami prinsip empati dalam proses *User Research*.</li>
                                <li>Penerapan kontras warna, hierarki visual, dan tipografi inklusif.</li>
                                <li>Praktik menguji prototipe menggunakan *screen reader*.</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Speaker / Mentor -->
                    <section class="reveal reveal-delay-1">
                        <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mb-6">Pemandu Sesi</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">

                            <!-- Mentor Card 1 -->
                            <div
                                class="bg-white border border-charcoal/10 rounded-[24px] p-5 flex items-center gap-4 hover:shadow-lg transition-shadow">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop"
                                    class="w-16 h-16 rounded-2xl object-cover" alt="Sarah Kusuma">
                                <div>
                                    <h4 class="font-headline font-bold text-lg text-charcoal">Sarah Kusuma</h4>
                                    <p class="font-body text-xs text-secondary mt-0.5">Lead Product Designer</p>
                                    <span
                                        class="inline-block bg-charcoal/5 text-charcoal/60 px-2 py-0.5 rounded text-[9px] font-bold uppercase mt-2">Tokopedia</span>
                                </div>
                            </div>

                            <!-- Mentor Card 2 -->
                            <div
                                class="bg-white border border-charcoal/10 rounded-[24px] p-5 flex items-center gap-4 hover:shadow-lg transition-shadow">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop"
                                    class="w-16 h-16 rounded-2xl object-cover" alt="Reza Mahendra">
                                <div>
                                    <h4 class="font-headline font-bold text-lg text-charcoal">Reza Mahendra</h4>
                                    <p class="font-body text-xs text-secondary mt-0.5">UX Researcher</p>
                                    <span
                                        class="inline-block bg-charcoal/5 text-charcoal/60 px-2 py-0.5 rounded text-[9px] font-bold uppercase mt-2">Gojek</span>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- Rundown Acara -->
                    <section class="reveal reveal-delay-2">
                        <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mb-8">Rundown Agenda</h2>

                        <div class="relative ml-4 md:ml-6">
                            <!-- Garis Vertikal -->
                            <div class="absolute top-2 bottom-6 left-0 w-px bg-charcoal/15"></div>

                            <div class="space-y-8">
                                <!-- Item 1 -->
                                <div class="relative pl-8 group">
                                    <div
                                        class="absolute left-[-5px] top-1.5 w-3 h-3 bg-[#FBF9F6] border-2 border-charcoal/20 rounded-full group-hover:border-merah-jcc transition-colors z-10">
                                    </div>
                                    <h4 class="font-headline font-bold text-base md:text-lg text-charcoal">13:00 - 13:30 |
                                        Registrasi & Networking</h4>
                                    <p class="font-body text-sm text-secondary mt-1">Sesi perkenalan, pengambilan *name
                                        tag*, dan *coffee break* awal.</p>
                                </div>
                                <!-- Item 2 -->
                                <div class="relative pl-8 group">
                                    <div
                                        class="absolute left-[-5px] top-1.5 w-3 h-3 bg-[#FBF9F6] border-2 border-charcoal/20 rounded-full group-hover:border-merah-jcc transition-colors z-10">
                                    </div>
                                    <h4 class="font-headline font-bold text-base md:text-lg text-charcoal">13:30 - 14:30 |
                                        Sesi Materi: Universal Design</h4>
                                    <p class="font-body text-sm text-secondary mt-1">Pemaparan konsep desain inklusif dan
                                        audit *accessibility* (A11y) oleh Sarah Kusuma.</p>
                                </div>
                                <!-- Item 3 -->
                                <div class="relative pl-8 group">
                                    <div
                                        class="absolute left-[-5px] top-1.5 w-3 h-3 bg-[#FBF9F6] border-2 border-merah-jcc rounded-full group-hover:scale-125 transition-transform z-10 ring-4 ring-[#FBF9F6]">
                                    </div>
                                    <h4 class="font-headline font-bold text-base md:text-lg text-charcoal text-merah-jcc">
                                        14:30 - 15:30 | Hands-on Workshop</h4>
                                    <p class="font-body text-sm text-secondary mt-1">Peserta merancang ulang (*redesign*)
                                        sebuah layar aplikasi UMKM lokal menggunakan *Figma* agar lebih inklusif.</p>
                                </div>
                                <!-- Item 4 -->
                                <div class="relative pl-8 group">
                                    <div
                                        class="absolute left-[-5px] top-1.5 w-3 h-3 bg-[#FBF9F6] border-2 border-charcoal/20 rounded-full group-hover:border-merah-jcc transition-colors z-10">
                                    </div>
                                    <h4 class="font-headline font-bold text-base md:text-lg text-charcoal">15:30 - 16:00 |
                                        Q&A dan Penutup</h4>
                                    <p class="font-body text-sm text-secondary mt-1">Tanya jawab interaktif, penyerahan
                                        *e-certificate*, dan sesi foto bersama.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Peta / Lokasi -->
                    <section class="reveal reveal-delay-3">
                        <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-charcoal mb-6">Lokasi</h2>
                        <div
                            class="bg-white border border-charcoal/10 rounded-[32px] p-4 flex flex-col md:flex-row gap-6 shadow-sm">
                            <div
                                class="w-full md:w-1/3 aspect-video md:aspect-square rounded-[20px] bg-charcoal/5 overflow-hidden relative">
                                <!-- Placeholder Peta -->
                                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Map">
                                <div class="absolute inset-0 bg-charcoal/10 flex items-center justify-center">
                                    <div
                                        class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-merah-jcc shadow-lg animate-bounce">
                                        <span class="material-symbols-outlined text-xl">location_on</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-center px-2 md:pr-6">
                                <h4 class="font-headline font-bold text-xl text-charcoal mb-2">Creator Studio A</h4>
                                <p class="font-body text-sm text-secondary mb-4">Lantai 2, Jember Creative Center<br>Jl.
                                    Letjen Suprapto No.XX, Jember.</p>
                                <a href="#"
                                    class="inline-flex items-center gap-2 text-xs font-bold text-merah-jcc hover:text-rose-700 transition-colors uppercase tracking-widest">
                                    Buka di Google Maps <span
                                        class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            </div>
                        </div>
                    </section>

                </div>

                <!-- KOLOM KANAN: STICKY BOOKING CARD -->
                <div class="lg:col-span-4 relative">
                    <div class="sticky top-28 reveal reveal-delay-2">

                        <div
                            class="bg-white rounded-[40px] shadow-2xl shadow-charcoal/5 border border-charcoal/10 overflow-hidden relative">
                            <!-- Header Harga -->
                            <div
                                class="p-8 text-center bg-gradient-to-b from-charcoal/[0.03] to-transparent border-b border-charcoal/5 relative overflow-hidden">
                                <p
                                    class="text-[10px] font-bold text-secondary/70 uppercase tracking-widest mb-2 relative z-10">
                                    Harga Tiket</p>
                                <h3 class="font-headline font-extrabold text-4xl text-merah-jcc relative z-10">Gratis</h3>
                                <p class="font-body text-xs text-secondary mt-2 relative z-10">Khusus Anggota JCC Aktif</p>

                                <!-- Aksesoris Lingkaran Kiri Kanan (Gaya Tiket) -->
                                <div
                                    class="absolute -bottom-4 -left-4 w-8 h-8 bg-[#FBF9F6] rounded-full border-t border-r border-charcoal/10">
                                </div>
                                <div
                                    class="absolute -bottom-4 -right-4 w-8 h-8 bg-[#FBF9F6] rounded-full border-t border-l border-charcoal/10">
                                </div>
                            </div>

                            <!-- Form & Tombol -->
                            <div class="p-8">
                                <div class="space-y-4 mb-8">
                                    <div class="flex gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-charcoal/5 flex items-center justify-center text-charcoal/50 shrink-0">
                                            <span class="material-symbols-outlined text-[20px]">event</span>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">
                                                Tanggal</p>
                                            <p class="font-headline font-bold text-sm text-charcoal">12 September 2026</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-charcoal/5 flex items-center justify-center text-charcoal/50 shrink-0">
                                            <span class="material-symbols-outlined text-[20px]">chair</span>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">
                                                Ketersediaan</p>
                                            <p class="font-headline font-bold text-sm text-charcoal">Sisa 5 Kursi Tersedia
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" onclick="alert('Pendaftaran melalui Google Form. Silakan isi di link berikut: https://forms.gle/NAMA-LINK-DIGANTI')"
                                    class="w-full block text-center bg-merah-jcc text-broken-white py-4 rounded-full font-headline font-bold text-sm hover:bg-rose-700 hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-merah-jcc/30 mb-6 cursor-pointer">
                                    Daftar Sekarang
                                </button>

                                <div class="border-t border-charcoal/10 pt-6">
                                    <p
                                        class="text-[10px] font-bold text-charcoal uppercase tracking-widest mb-4 text-center">
                                        Fasilitas yang didapat:</p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-2.5">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-emerald-500 mt-0.5">check_circle</span>
                                            <span class="font-body text-xs text-secondary">E-Certificate resmi dari
                                                JCC.</span>
                                        </li>
                                        <li class="flex items-start gap-2.5">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-emerald-500 mt-0.5">check_circle</span>
                                            <span class="font-body text-xs text-secondary">Akses file materi
                                                (PDF/Figma).</span>
                                        </li>
                                        <li class="flex items-start gap-2.5">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-emerald-500 mt-0.5">check_circle</span>
                                            <span class="font-body text-xs text-secondary">Coffee break & snack.</span>
                                        </li>
                                        <li class="flex items-start gap-2.5">
                                            <span
                                                class="material-symbols-outlined text-[16px] text-emerald-500 mt-0.5">check_circle</span>
                                            <span class="font-body text-xs text-secondary">Akses grup komunitas
                                                Discord.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Info Kontak -->
                        <div class="mt-6 text-center">
                            <p class="font-body text-xs text-secondary">Ada pertanyaan terkait event ini?</p>
                            <a href="#"
                                class="font-headline font-bold text-xs text-merah-jcc hover:underline mt-1 inline-block">Hubungi
                                Penyelenggara</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 3. RELATED EVENTS (Event Lainnya) -->
        <section class="mt-24 pt-20 bg-white border-t border-charcoal/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex items-end justify-between mb-10 reveal">
                    <div>
                        <h2 class="font-headline font-extrabold text-3xl md:text-4xl text-charcoal">Event Serupa</h2>
                        <p class="font-body text-secondary mt-2">Jangan lewatkan agenda menarik lainnya di JCC.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-12">
                    <!-- Related Event Card 1 -->
                    <a href="#"
                        class="reveal reveal-delay-1 block group bg-[#FBF9F6] rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-charcoal/5">
                        <div class="relative w-full h-48 bg-charcoal/5 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?q=80&w=800&auto=format&fit=crop"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Fotografi Produk">
                            <div
                                class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                                Workshop</div>
                        </div>
                        <div class="p-6">
                            <div
                                class="flex items-center gap-2 text-[10px] font-bold text-merah-jcc mb-2 uppercase tracking-widest">
                                <span class="material-symbols-outlined text-[14px]">calendar_month</span> 28 Sep 2026
                            </div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors line-clamp-2 leading-snug">
                                Kelas Fotografi Produk & Studio</h3>
                            <div class="flex items-center justify-between mt-4">
                                <span class="font-headline font-extrabold text-charcoal text-sm">Rp 150.000</span>
                            </div>
                        </div>
                    </a>

                    <!-- Related Event Card 2 -->
                    <a href="#"
                        class="reveal reveal-delay-2 block group bg-[#FBF9F6] rounded-[32px] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-charcoal/5">
                        <div class="relative w-full h-48 bg-charcoal/5 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=800&auto=format&fit=crop"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                alt="Networking">
                            <div
                                class="absolute top-4 left-4 bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">
                                Networking</div>
                        </div>
                        <div class="p-6">
                            <div
                                class="flex items-center gap-2 text-[10px] font-bold text-merah-jcc mb-2 uppercase tracking-widest">
                                <span class="material-symbols-outlined text-[14px]">calendar_month</span> 20 Sep 2026
                            </div>
                            <h3
                                class="font-headline font-extrabold text-xl text-charcoal mb-2 group-hover:text-merah-jcc transition-colors line-clamp-2 leading-snug">
                                Founders Mixer: Pitching Day</h3>
                            <div class="flex items-center justify-between mt-4">
                                <span
                                    class="font-headline font-extrabold text-charcoal text-sm uppercase tracking-widest">Khusus
                                    Undangan</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>

    </div>

    <!-- Script Animasi Scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        });
    </script>
@endsection
