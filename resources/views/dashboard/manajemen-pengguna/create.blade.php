@extends('dashboard.layouts.app')

@section('title', 'Tambah Pengguna - JCC')

@section('dashboard-content')
    <div class="max-w-4xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">
        <div class="reveal revealed">
            <a href="{{ route('manajemen-pengguna') }}"
                class="inline-flex items-center gap-1 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
            </a>
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">Tambah Pengguna</h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2">Buat akun baru untuk anggota atau admin JCC.</p>
        </div>

        @include('dashboard.manajemen-pengguna._form', ['editing' => false])
    </div>
@endsection