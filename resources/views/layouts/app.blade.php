<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JCC') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('LOGO JCC.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&amp;family=Hanken+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-broken-white text-charcoal font-body antialiased overflow-x-hidden tracking-wide">
    <main>
        <nav
            class="fixed top-4 left-4 right-4 z-50 glass rounded-3xl md:rounded-full transition-all duration-300 mx-auto max-w-container-max">
            <div class="flex justify-between items-center px-8 py-4">
                <a class="font-headline text-xl md:text-2xl font-bold text-merah-jcc" href="/">JCC</a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-10 items-center">
                    <a class="transition-colors text-sm tracking-wider uppercase {{ request()->is('/') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                        href="/">Beranda</a>
                    <a class="transition-colors text-sm tracking-wider uppercase {{ request()->is('tentang') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                        href="/tentang">Tentang JCC</a>
                    <a class="transition-colors text-sm tracking-wider uppercase {{ request()->is('jelajahi*', 'konfirmasi*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                        href="/jelajahi">Jelajahi</a>
                    <a class="transition-colors text-sm tracking-wider uppercase {{ request()->is('artikel*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                        href="/artikel">Artikel</a>
                    <a class="transition-colors text-sm tracking-wider uppercase {{ request()->is('event*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                        href="/event">Event</a>
                </div>

                <!-- Desktop Action -->
                <div class="hidden md:flex items-center">
                    @auth
                        <a class="bg-merah-jcc text-broken-white px-8 py-3 rounded-full font-bold text-sm tracking-wider hover:scale-105 transition-transform shadow-md shadow-merah-jcc/20 flex items-center gap-2"
                            href="/dashboard">
                            <span class="material-symbols-outlined text-sm">grid_view</span>
                            Dashboard
                        </a>
                    @else
                        <a class="bg-merah-jcc text-broken-white px-8 py-3 rounded-full font-bold text-sm tracking-wider hover:scale-105 transition-transform shadow-md shadow-merah-jcc/20 flex items-center gap-2"
                            href="{{ route('login') }}">
                            <span class="material-symbols-outlined text-sm">login</span>
                            Masuk
                        </a>
                    @endauth
                </div>

                <!-- Mobile Burger Button -->
                <button id="menu-btn"
                    class="md:hidden text-charcoal focus:outline-none flex items-center justify-center">
                    <span id="menu-icon" class="material-symbols-outlined text-3xl">menu</span>
                </button>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu"
                class="hidden md:hidden px-8 pb-6 pt-2 flex-col space-y-4 border-t border-charcoal/10 mt-2">
                <a class="transition-colors text-sm tracking-wider uppercase block {{ request()->is('/') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                    href="/">Beranda</a>
                <a class="transition-colors text-sm tracking-wider uppercase block {{ request()->is('tentang') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                    href="/tentang">Tentang JCC</a>
                <a class="transition-colors text-sm tracking-wider uppercase block {{ request()->is('jelajahi*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                    href="/jelajahi">Jelajahi</a>
                <a class="transition-colors text-sm tracking-wider uppercase block {{ request()->is('artikel*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                    href="/artikel">Artikel</a>
                <a class="transition-colors text-sm tracking-wider uppercase block {{ request()->is('event*') ? 'text-merah-jcc font-bold' : 'text-charcoal hover:text-merah-jcc font-medium' }}"
                    href="/event">Event</a>

                <!-- Mobile Action -->
                <div class="pt-4 border-t border-charcoal/10">
                    @auth
                        <a class="bg-merah-jcc text-broken-white px-8 py-3 rounded-full font-bold text-sm tracking-wider text-center block w-full shadow-md shadow-merah-jcc/20"
                            href="/dashboard">Dashboard</a>
                    @else
                        <a class="bg-merah-jcc text-broken-white px-8 py-3 rounded-full font-bold text-sm tracking-wider text-center block w-full shadow-md shadow-merah-jcc/20"
                            href="{{ route('login') }}">Masuk</a>
                    @endauth
                </div>
            </div>
        </nav>
        @yield('content')
    </main>

    <div class="text-center pt-4">
        <h2 class="font-headline text-3xl md:text-5xl font-extrabold text-slate-900 drop-shadow-md">
            Find Your Space
        </h2>
    </div>
    <section
        class="relative mt-16 pt-12 pb-12 px-margin-mobile md:px-margin-desktop bg-gradient-to-b from-[#7CA5D8] via-[#8CB5E5] to-[#4B6B94] rounded-t-[40px] md:rounded-t-[60px] overflow-hidden text-broken-white">

        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">

            <img src="{{ asset('jcc footer.png') }}" alt="Gedung JCC Background"
                class="w-full h-full object-cover object-bottom absolute inset-0 opacity-90 mix-blend-normal z-0" />

            <div
                class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-black/80 via-black/40 to-transparent z-10">
            </div>
        </div>

        <div class="relative z-20 max-w-container-max mx-auto space-y-16">

            <div class="space-y-8">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20 max-w-6xl mx-auto items-stretch">

                    <div
                        class="group  relative aspect-[3/4] bg-charcoal/20 backdrop-blur-sm rounded-[32px] overflow-hidden border-[8px] md:border-[12px] border-white/20 shadow-xl cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&auto=format&fit=crop"
                            alt="Ruangan 1"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 text-broken-white space-y-1">
                            <h4 class="font-headline font-bold text-lg md:text-xl">Nama ruangan</h4>
                            <p class="font-body text-xs opacity-80">Fasilitas/amenities</p>
                        </div>
                    </div>

                    <div
                        class="group  relative aspect-[3/4] bg-charcoal/20 backdrop-blur-sm rounded-[32px] overflow-hidden border-[8px] md:border-[12px] border-white/20 shadow-3xl cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1527192491265-7e15c55b1ed2?q=80&w=800&auto=format&fit=crop"
                            alt="Ruangan 2"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 text-broken-white space-y-1">
                            <h4 class="font-headline font-bold text-lg md:text-xl">Nama ruangan</h4>
                            <p class="font-body text-xs opacity-80">Fasilitas/amenities</p>
                        </div>
                    </div>

                    <div
                        class="flex flex-col justify-between gap-6 md:col-span-2 lg:col-span-1 h-full min-h-[400px] lg:min-h-0">

                        <div
                            class="group  relative h-[calc(50%-12px)] w-full bg-charcoal/20 backdrop-blur-sm rounded-[28px] overflow-hidden border-[8px] md:border-[12px] border-white/20 shadow-3xl cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?q=80&w=800&auto=format&fit=crop"
                                alt="Ruangan 3"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent">
                            </div>
                            <div class="absolute bottom-4 left-4 right-4 text-broken-white space-y-0.5">
                                <h4 class="font-headline font-bold text-base">Nama ruangan</h4>
                                <p class="font-body text-[11px] opacity-80">Fasilitas/amenities</p>
                            </div>
                        </div>

                        <div
                            class="group  relative h-[calc(50%-12px)] w-full bg-charcoal/20 backdrop-blur-sm rounded-[28px] overflow-hidden border-[8px] md:border-[12px] border-white/20 shadow-3xl cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800&auto=format&fit=crop"
                                alt="Ruangan 4"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent">
                            </div>
                            <div class="absolute bottom-4 left-4 right-4 text-broken-white space-y-0.5">
                                <h4 class="font-headline font-bold text-base">Nama ruangan</h4>
                                <p class="font-body text-[11px] opacity-80">Fasilitas/amenities</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="text-center pt-2">
                    <a href="/jelajahi"
                        class="inline-flex items-center gap-2 text-broken-white font-bold text-base md:text-lg hover:text-merah-jcc transition-all group drop-shadow">
                        Lihat Semua
                        <span
                            class="material-symbols-outlined text-xl group-hover:translate-x-1 transition-transform">east</span>
                    </a>
                </div>
            </div>


            <div class="text-center max-w-3xl mx-auto pt-12 pb-8 space-y-6">
                <h2
                    class="font-headline text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight drop-shadow-2xl text-broken-white leading-tight">
                    Punya Ide?<br />
                    Cari Ruangnya.
                </h2>

                <p
                    class="font-body text-sm sm:text-base text-broken-white/90 max-w-lg mx-auto leading-relaxed drop-shadow">
                    Wujudkan kreativitasmu di ruang yang dirancang khusus untuk mendukung produktivitas dan kolaborasi.
                </p>

                <div class="pt-2">
                    <a href="/jelajahi"
                        class="inline-block bg-broken-white text-merah-jcc px-8 py-3.5 rounded-full font-bold text-sm md:text-base hover:bg-merah-jcc hover:text-broken-white hover:scale-105 transition-all duration-300 shadow-2xl">
                        Book a Space
                    </a>
                </div>
            </div>


            <div class="pt-8 border-t border-white/20 flex flex-col items-center gap-6">

                <nav
                    class="flex flex-wrap items-center justify-center gap-6 md:gap-10 font-headline font-semibold text-sm text-broken-white">
                    <a href="/tentang" class="hover:text-merah-jcc transition-colors">Tentang JCC</a>
                    <a href="/artikel" class="hover:text-merah-jcc transition-colors">Artikel</a>
                    <a href="/jelajahi" class="hover:text-merah-jcc transition-colors">Jelajahi</a>
                    <a href="/event" class="hover:text-merah-jcc transition-colors">Event</a>
                </nav>

                <div class="flex items-center gap-2.5 pt-2">
                    <span
                        class="font-headline font-extrabold text-base md:text-lg text-merah-jcc tracking-wide drop-shadow-sm">
                        Jember Creative Center
                    </span>
                </div>

                <p class="font-body text-[11px] text-broken-white/60">
                    © 2026 Jember Creative Center. All rights reserved.
                </p>
            </div>

        </div>
    </section>
</body>

</html>
