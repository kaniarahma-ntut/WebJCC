@extends('dashboard.layouts.app')

@section('title', 'Edit Event - JCC')

@section('dashboard-content')
    @if (! $event)
        <div class="text-center py-20">
            <span class="material-symbols-outlined text-4xl text-charcoal/20 block mb-2">event_busy</span>
            <p class="font-headline font-bold text-sm text-charcoal/60">Event tidak ditemukan.</p>
            <a href="{{ route('manajemen-event') }}"
                class="inline-block mt-3 text-xs font-headline font-bold text-merah-jcc hover:underline">Kembali</a>
        </div>
    @else
        <div class="max-w-3xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

            <a href="{{ route('manajemen-event') }}"
                class="inline-flex items-center gap-1.5 font-headline font-bold text-xs text-charcoal/60 hover:text-merah-jcc transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
            </a>

            <div>
                <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">Edit Event</h1>
                <p class="font-body text-secondary text-sm md:text-base mt-2">Ubah detail event yang sudah ada.</p>
            </div>

            @include('dashboard.manajemen-event._form', compact('event'))
        </div>
    @endif
@endsection