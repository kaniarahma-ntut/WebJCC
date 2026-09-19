@extends('dashboard.layouts.app')

@section('title', 'Detail Event - JCC')

@section('dashboard-content')
    <div class="max-w-4xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <a href="{{ route('manajemen-event') }}"
            class="inline-flex items-center gap-1.5 font-headline font-bold text-xs text-charcoal/60 hover:text-merah-jcc transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
        </a>

        @if ($event)
            <div class="reveal revealed bg-white border border-charcoal/10 rounded-[32px] shadow-sm overflow-hidden">
                <div class="relative w-full lg:h-[340px]">
                    <img src="{{ $event['gambar'] }}" alt="{{ $event['judul'] }}"
                        class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal/70 via-charcoal/10 to-transparent"></div>
                    <div class="absolute top-5 left-5">
                        <span
                            class="bg-white/95 backdrop-blur text-charcoal px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm">{{ $event['kategori'] }}</span>
                    </div>
                    <div class="absolute bottom-5 left-6 right-6 flex flex-col md:flex-row md:items-end justify-between gap-3">
                        <h1 class="font-headline text-2xl md:text-3xl font-extrabold text-white leading-tight">{{ $event['judul'] }}</h1>
                        <span class="bg-merah-jcc text-white px-4 py-2 rounded-full font-headline font-bold text-sm shadow-lg shadow-merah-jcc/30 shrink-0 w-fit">{{ $event['harga'] }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-6 md:px-8 py-6 border-b border-charcoal/10">
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-cream-dark/60 text-charcoal/70 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-lg">calendar_today</span></span>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-secondary/70">Tanggal</p>
                            <p class="font-headline font-bold text-xs text-charcoal">{{ \Carbon\Carbon::parse($event['tanggal'])->format('l, d M Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-cream-dark/60 text-charcoal/70 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-lg">schedule</span></span>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-secondary/70">Jam</p>
                            <p class="font-headline font-bold text-xs text-charcoal">{{ $event['jam_mulai'] }} - {{ $event['jam_selesai'] }} WIB</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-cream-dark/60 text-charcoal/70 flex items-center justify-center shrink-0"><span class="material-symbols-outlined text-lg">location_on</span></span>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-secondary/70">Lokasi</p>
                            <p class="font-headline font-bold text-xs text-charcoal">{{ $event['lokasi'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-6 md:px-8 py-6">
                    <h2 class="font-headline font-bold text-sm text-charcoal mb-2">Deskripsi Event</h2>
                    <p class="font-body text-sm text-secondary leading-relaxed">{{ $event['deskripsi'] }}</p>
                </div>
            </div>
        @else
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-4xl text-charcoal/20 block mb-2">event_busy</span>
                <p class="font-headline font-bold text-sm text-charcoal/60">Event tidak ditemukan.</p>
            </div>
        @endif
    </div>
@endsection