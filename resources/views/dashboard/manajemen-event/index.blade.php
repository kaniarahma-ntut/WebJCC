@extends('dashboard.layouts.app')

@section('title', 'Manajemen Event - JCC')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <div class="reveal revealed flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                    Manajemen Event
                </h1>
                <p class="font-body text-secondary text-sm md:text-base mt-2">
                    Kelola acara yang tampil di halaman publik.
                </p>
            </div>
            <a href="{{ route('manajemen-event.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-merah-jcc text-broken-white px-5 py-2.5 rounded-full font-headline font-bold text-xs shadow-lg shadow-merah-jcc/25 hover:bg-rose-700 transition-all shrink-0">
                <span class="material-symbols-outlined text-sm">add</span> Tambah Event
            </a>
        </div>

        @if (session('success'))
            <div id="flash"
                class="reveal revealed flex items-center gap-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 rounded-2xl px-5 py-3.5">
                <span class="material-symbols-outlined text-lg">check_circle</span>
                <p class="font-headline font-bold text-xs uppercase tracking-wider flex-1">{{ session('success') }}</p>
                <button type="button" onclick="this.parentElement.remove()"
                    class="text-emerald-700/60 hover:text-emerald-700 transition-colors">
                    <span class="material-symbols-outlined text-base">close</span>
                </button>
            </div>
        @endif

        <div class="reveal revealed relative max-w-md">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-charcoal/50 text-lg">search</span>
            <input type="text" id="event-search" placeholder="Cari judul, kategori, atau lokasi..."
                class="w-full bg-white border border-charcoal/10 rounded-full pl-11 pr-5 py-2.5 text-xs text-charcoal placeholder-charcoal/50 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all shadow-sm" />
        </div>

        <div class="reveal revealed bg-white border border-charcoal/10 rounded-[24px] shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-cream-dark/50 border-b border-charcoal/10 text-[10px] font-bold uppercase tracking-widest text-secondary/70">
                            <th class="px-5 py-4 w-12">No</th>
                            <th class="px-5 py-4">Event</th>
                            <th class="px-5 py-4">Kategori</th>
                            <th class="px-5 py-4">Tanggal</th>
                            <th class="px-5 py-4">Jam</th>
                            <th class="px-5 py-4">Lokasi</th>
                            <th class="px-5 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-charcoal/5 text-xs">
                        @forelse ($events as $e)
                            <tr class="event-row hover:bg-cream-dark/30 transition-colors"
                                data-search="{{ strtolower($e['judul'] . ' ' . $e['kategori'] . ' ' . $e['lokasi']) }}">
                                <td class="px-5 py-3.5 font-mono text-secondary/60">{{ $loop->iteration }}</td>
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $e['gambar'] }}" class="w-10 h-8 rounded-lg object-cover shrink-0" alt="{{ $e['judul'] }}">
                                        <span class="font-headline font-bold text-charcoal">{{ $e['judul'] }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-block text-[10px] font-bold px-2.5 py-1 rounded-full bg-merah-jcc/10 text-merah-jcc">{{ $e['kategori'] }}</span>
                                </td>
                                <td class="px-5 py-3.5 text-secondary">{{ \Carbon\Carbon::parse($e['tanggal'])->format('d M Y') }}</td>
                                <td class="px-5 py-3.5 text-secondary font-mono">{{ $e['jam_mulai'] }} - {{ $e['jam_selesai'] }}</td>
                                <td class="px-5 py-3.5 text-secondary">{{ $e['lokasi'] }}</td>
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('manajemen-event.detail', $e['id']) }}"
                                            class="bg-charcoal/5 text-charcoal/70 hover:bg-charcoal/10 px-3 py-2 rounded-full font-headline font-bold text-[10px] transition-colors">Detail</a>
                                        <a href="{{ route('manajemen-event.edit', $e['id']) }}"
                                            class="bg-amber-500/10 text-amber-600 hover:bg-amber-500 hover:text-white px-3 py-2 rounded-full font-headline font-bold text-[10px] transition-colors">Edit</a>
                                        <button type="button" onclick="openDelete({{ $e['id'] }}, '{{ $e['judul'] }}')"
                                            class="bg-red-500/10 text-red-600 hover:bg-red-600 hover:text-white px-3 py-2 rounded-full font-headline font-bold text-[10px] transition-colors">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center">
                                    <span class="material-symbols-outlined text-4xl text-charcoal/20 block mb-2">event</span>
                                    <p class="font-headline font-bold text-sm text-charcoal/60">Belum ada event</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" action="">
        @csrf
        @method('DELETE')
    </form>

    <div id="delete-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div id="delete-backdrop" class="absolute inset-0 bg-charcoal/60 backdrop-blur-sm"></div>
        <div class="relative w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="px-6 sm:px-8 py-7 sm:py-8 text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-red-500/10 text-red-600 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">delete</span>
                </div>
                <h3 class="font-headline font-bold text-lg text-charcoal">Hapus Event?</h3>
                <p class="mt-1.5 text-sm text-secondary leading-relaxed">Event <strong id="delete-name">ini</strong> akan
                    dihapus permanen dan tidak tampil lagi di publik.</p>
            </div>
            <div class="grid grid-cols-2 gap-3 px-6 sm:px-8 pb-7 sm:pb-8">
                <button type="button" id="delete-cancel"
                    class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border border-charcoal/10 text-charcoal/60 hover:bg-charcoal/5 transition-colors">Batal</button>
                <button type="button" id="delete-confirm"
                    class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-red-600 text-white shadow-lg shadow-red-600/25 hover:bg-red-700 transition-colors">Ya, Hapus</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('event-search');
            input.addEventListener('input', () => {
                const q = input.value.toLowerCase().trim();
                document.querySelectorAll('.event-row').forEach(row => {
                    row.style.display = row.dataset.search.includes(q) ? '' : 'none';
                });
            });

            let modal = document.getElementById('delete-modal');
            window.openDelete = (id, name) => {
                document.getElementById('delete-name').textContent = name;
                document.getElementById('delete-form').action = '/dashboard/manajemen-event/' + id;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            };
            document.getElementById('delete-cancel').addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.getElementById('delete-backdrop').addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.getElementById('delete-confirm').addEventListener('click', () => document.getElementById('delete-form').submit());

            setTimeout(() => {
                const flash = document.getElementById('flash');
                if (flash) flash.remove();
            }, 4000);
        });
    </script>
@endsection