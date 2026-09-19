@extends('dashboard.layouts.app')

@section('title', 'Edit Ruangan - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <div class="reveal revealed">
            <a href="/dashboard/manajemen-ruangan"
                class="inline-flex items-center gap-1 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                <span class="material-symbols-outlined text-sm">arrow_back</span> Kembali
            </a>
            <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                Edit Ruangan
            </h1>
            <p class="font-body text-secondary text-sm md:text-base mt-2">
                Perbarui informasi Ruang Kolaborasi A.
            </p>
        </div>

        @include('dashboard.manajemen-ruangan._form', ['editing' => true])

    </div>

    <div id="toast"
        class="fixed bottom-6 right-6 z-[110] hidden items-center gap-3 bg-charcoal text-broken-white px-5 py-3.5 rounded-full shadow-2xl">
        <span class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
            <span class="material-symbols-outlined text-sm">check_circle</span>
        </span>
        <span id="toast-text" class="font-headline font-bold text-xs">Berhasil</span>
    </div>

    <script>
        function showToast(msg) {
            const t = document.getElementById('toast');
            const s = document.getElementById('toast-text');
            s.textContent = msg;
            t.classList.remove('hidden');
            t.classList.add('flex');
            setTimeout(() => { t.classList.add('hidden'); t.classList.remove('flex'); }, 2500);
        }
    </script>
@endsection