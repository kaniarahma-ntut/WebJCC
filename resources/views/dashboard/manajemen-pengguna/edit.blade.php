@extends('dashboard.layouts.app')

@section('title', 'Edit Pengguna - JCC')

@section('dashboard-content')
    <div class="max-w-4xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">
        <div class="reveal revealed">
            <a href="{{ route('manajemen-pengguna') }}"
                class="inline-flex items-center gap-1 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
            </a>
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">Edit Pengguna</h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2">Perbarui data akun {{ $user->nama_user }}.</p>
        </div>

        @include('dashboard.manajemen-pengguna._form', ['editing' => true])
    </div>
@endsection