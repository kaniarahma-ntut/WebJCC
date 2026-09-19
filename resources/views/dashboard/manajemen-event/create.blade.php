@extends('dashboard.layouts.app')

@section('title', 'Tambah Event - JCC')

@section('dashboard-content')
    <div class="max-w-3xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <a href="{{ route('manajemen-event') }}"
            class="inline-flex items-center gap-1.5 font-headline font-bold text-xs text-charcoal/60 hover:text-merah-jcc transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
        </a>

        <div>
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">Tambah Event</h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2">Isi detail event untuk halaman publik.</p>
        </div>

        @include('dashboard.manajemen-event._form', ['event' => $event ?? null])
    </div>
@endsection