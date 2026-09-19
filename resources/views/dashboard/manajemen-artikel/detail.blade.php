@extends('dashboard.layouts.app')

@section('title', 'Detail Artikel - JCC')

@section('dashboard-content')
    @if (!$artikel)
        <div class="max-w-2xl mx-auto text-center py-20">
            <span class="material-symbols-outlined text-5xl text-charcoal/20 block mb-3">article</span>
            <h1 class="font-headline font-bold text-xl text-charcoal">Artikel tidak ditemukan</h1>
            <a href="{{ route('manajemen-artikel') }}" class="inline-block mt-4 text-xs font-bold text-merah-jcc">Kembali</a>
        </div>
    @else
        <div class="max-w-4xl mx-auto space-y-6 pb-12 w-full">
            <a href="{{ route('manajemen-artikel') }}"
                class="inline-flex items-center gap-1 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
            </a>

            <div class="bg-white border border-charcoal/10 rounded-[32px] overflow-hidden shadow-sm">
                <img src="{{ $artikel['gambar'] }}" class="w-full aspect-[21/9] object-cover" alt="Sampul">
                <div class="p-6 md:p-10">
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        <span class="inline-block text-[10px] font-bold px-2.5 py-1 rounded-full bg-merah-jcc/10 text-merah-jcc uppercase tracking-widest">{{ $artikel['kategori'] }}</span>
                        <span class="text-[11px] font-bold text-secondary">{{ \Carbon\Carbon::parse($artikel['tanggal'])->format('d M Y') }}</span>
                    </div>
                    <h1 class="font-headline text-2xl md:text-3xl font-extrabold text-charcoal tracking-tight">{{ $artikel['judul'] }}</h1>
                    <p class="font-body text-xs text-secondary mt-2 flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">person</span> Ditulis oleh <strong>{{ $artikel['penulis'] }}</strong>
                    </p>
                    <div class="mt-6 pt-6 border-t border-charcoal/10">
                        <p class="font-body text-sm leading-relaxed text-charcoal/80 prose prose-sm max-w-none">
                        {!! $artikel['isi'] !!}
                    </p>
                    </div>
                    <div class="mt-8 flex items-center gap-3">
                        <a href="{{ route('manajemen-artikel.edit', $artikel['id']) }}"
                            class="bg-cream-dark text-charcoal hover:bg-charcoal/10 px-6 py-3 rounded-full font-headline font-bold text-xs transition-colors">Edit Artikel</a>
                        <a href="{{ route('manajemen-artikel') }}"
                            class="bg-merah-jcc text-broken-white px-6 py-3 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 transition-all">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection