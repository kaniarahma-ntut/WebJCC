@extends('dashboard.layouts.app')

@section('title', 'Review Pemesanan - JCC')

@section('dashboard-content')
    @php
        $statusMap = [
            'pending'  => ['label' => 'Menunggu Review', 'bg' => 'bg-amber-500/10',  'text' => 'text-amber-600',   'border' => 'border-amber-500/20',  'dot' => 'bg-amber-500',   'pulse' => true],
            'approved' => ['label' => 'Disetujui',        'bg' => 'bg-emerald-500/10','text' => 'text-emerald-600', 'border' => 'border-emerald-500/20','dot' => 'bg-emerald-500', 'pulse' => false],
            'declined' => ['label' => 'Ditolak',          'bg' => 'bg-red-500/10',    'text' => 'text-red-600',     'border' => 'border-red-500/20',    'dot' => 'bg-red-500',     'pulse' => false],
        ];
        $status = $statusMap[$booking->status_peminjaman] ?? $statusMap['pending'];

        $items = $booking->detailPeminjamanBarang ?? collect();
        $itemsTotal = $items->sum(fn($d) => $d->peminjamanBarang?->barang?->harga_sewa ?? 0);
        $roomTotal = $booking->ruangan?->tarif_sewa_ruangan ?? 0;
        $grandTotal = $roomTotal + $itemsTotal;
    @endphp

    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        @if (session('success'))
            <div class="reveal revealed bg-emerald-50 border border-emerald-500/30 rounded-2xl p-4 flex items-center gap-3">
                <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                <p class="text-sm text-emerald-700 font-headline font-bold">{{ session('success') }}</p>
            </div>
        @endif

        <!-- HEADER -->
        <div class="reveal revealed flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <a href="{{ route('admin.peminjaman.index') }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span> Kembali ke Daftar
                </a>
                <div class="flex items-center gap-3 flex-wrap">
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                        JCC-{{ str_pad($booking->id_peminjaman_ruangan, 4, '0', STR_PAD_LEFT) }}
                    </h1>
                    <span class="{{ $status['bg'] }} {{ $status['text'] }} px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $status['border'] }} shadow-sm flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full {{ $status['dot'] }} {{ $status['pulse'] ? 'animate-pulse' : '' }}"></span>
                        {{ $status['label'] }}
                    </span>
                </div>
                <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                    Permintaan dari <strong class="text-charcoal">{{ $booking->user->nama_user ?? '-' }}</strong> untuk ruangan <strong class="text-charcoal">{{ $booking->ruangan->nama_ruangan ?? '-' }}</strong>.
                </p>
            </div>
        </div>

        <!-- DETAIL GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <!-- INFO -->
            <div class="reveal reveal-delay-2 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
                <div class="flex justify-between items-start mb-6 pb-6 border-b border-charcoal/5">
                    <div>
                        <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">ID Pemesanan</p>
                        <h2 class="font-headline font-extrabold text-2xl text-charcoal">JCC-{{ str_pad($booking->id_peminjaman_ruangan, 4, '0', STR_PAD_LEFT) }}</h2>
                    </div>
                    <div class="bg-charcoal/5 p-2 rounded-xl text-charcoal/50">
                        <span class="material-symbols-outlined">receipt_long</span>
                    </div>
                </div>

                <div class="space-y-5">
                    <div class="flex gap-4">
                        <div class="w-11 h-11 rounded-2xl bg-merah-jcc/5 text-merah-jcc flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Pemesan</p>
                            <p class="font-headline font-bold text-base text-charcoal">{{ $booking->user->nama_user ?? '-' }}</p>
                            <p class="text-xs text-secondary mt-0.5">{{ $booking->user->email ?? '-' }} • {{ $booking->noHP_CP }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-11 h-11 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">meeting_room</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Ruangan</p>
                            <p class="font-headline font-bold text-base text-charcoal">{{ $booking->ruangan->nama_ruangan ?? '-' }}</p>
                            <p class="text-xs text-secondary mt-0.5">{{ $booking->ruangan->lokasi_ruangan ?? '' }} • Kapasitas {{ $booking->ruangan->kapasitas_ruangan ?? '-' }} pax</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">calendar_today</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Tanggal & Waktu</p>
                            <p class="font-headline font-bold text-base text-charcoal">{{ $booking->start_time->translatedFormat('d M Y') }}</p>
                            <p class="text-xs text-secondary mt-0.5">{{ $booking->start_time->format('H:i') }} - {{ $booking->end_time->format('H:i') }} WIB</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-11 h-11 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">event</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Kegiatan</p>
                            <p class="font-headline font-bold text-base text-charcoal">{{ $booking->nama_event }}</p>
                            <p class="text-xs text-secondary mt-0.5">{{ ucfirst($booking->status_event) }} • {{ $booking->kapasitas }} peserta</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-11 h-11 rounded-2xl bg-purple-500/10 text-purple-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined">attach_file</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">File Pendukung</p>
                            @if($booking->file_pendukung)
                                <a href="{{ asset('storage/' . $booking->file_pendukung) }}" target="_blank" class="text-sm font-headline font-bold text-merah-jcc hover:underline">Buka File Pendukung</a>
                            @else
                                <p class="text-xs text-secondary">Tidak ada file</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-charcoal/5">
                    <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-3">Rincian Biaya</p>
                    <div class="space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-secondary">{{ $booking->ruangan->nama_ruangan ?? '-' }}</span>
                            <span class="font-headline font-bold text-charcoal">Rp {{ number_format($roomTotal, 0, ',', '.') }}</span>
                        </div>
                        @foreach ($items as $detail)
                            @php $item = $detail->peminjamanBarang?->barang; @endphp
                            @if ($item)
                                <div class="flex justify-between">
                                    <span class="text-secondary">{{ $item->nama_barang }}</span>
                                    <span class="font-headline font-bold text-charcoal">Rp {{ number_format($item->harga_sewa, 0, ',', '.') }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="mt-4 pt-4 border-t border-charcoal/10 flex justify-between items-center">
                        <span class="font-headline font-bold text-sm text-charcoal">Total</span>
                        <span class="font-headline font-extrabold text-xl text-merah-jcc">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- ACTIONS -->
            <div class="flex flex-col gap-6">
                
                {{-- JCC ADMIN: Approve / Decline / Change Status --}}
                @if(auth()->user()->admin_role === 'admin_JCC')
                    <div class="reveal reveal-delay-3 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
                        <h2 class="font-headline font-bold text-lg text-charcoal mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-merah-jcc text-xl">gavel</span>
                            Keputusan Pemesanan
                        </h2>

                        <form method="POST" action="{{ route('admin.peminjaman.approve', $booking->id_peminjaman_ruangan) }}" class="space-y-4">
                            @csrf
                            
                            <!-- Catatan Admin -->
                            <div>
                                <label class="text-[10px] font-bold text-secondary uppercase tracking-widest mb-1 block">Catatan Admin (Opsional)</label>
                                <textarea name="catatan_admin" rows="3" placeholder="Tulis alasan jika menolak, atau instruksi tambahan..."
                                    class="w-full border border-charcoal/10 rounded-2xl px-4 py-3 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all">{{ $booking->catatan_admin }}</textarea>
                            </div>

                            <!-- Status Selector -->
                            <div>
                                <label class="text-[10px] font-bold text-secondary uppercase tracking-widest mb-1 block">Ubah Status Menjadi:</label>
                                <select name="status_peminjaman" class="w-full border border-charcoal/10 rounded-2xl px-4 py-3 text-sm text-charcoal focus:outline-none focus:border-merah-jcc">
                                    <option value="pending" {{ $booking->status_peminjaman == 'pending' ? 'selected' : '' }}>Menunggu (Pending)</option>
                                    <option value="approved" {{ $booking->status_peminjaman == 'approved' ? 'selected' : '' }}>Disetujui (Approved)</option>
                                    <option value="declined" {{ $booking->status_peminjaman == 'declined' ? 'selected' : '' }}>Ditolak (Declined)</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-charcoal text-broken-white hover:bg-charcoal/80 transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">save</span> Simpan Perubahan
                            </button>
                        </form>
                    </div>
                @endif

                {{-- DISPORA ADMIN: Upload Letter --}}
                @if(auth()->user()->admin_role === 'admin_Disporabudpar')
                    <div class="reveal reveal-delay-3 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
                        <h2 class="font-headline font-bold text-lg text-charcoal mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-merah-jcc text-xl">upload_file</span>
                            Surat Peminjaman
                        </h2>
                        <p class="text-xs text-secondary mb-5">
                            @if($booking->status_peminjaman !== 'approved')
                                Pemesanan belum di-ACC oleh Admin JCC.
                            @elseif($booking->status_pembayaran !== 'completed')
                                Menunggu pembayaran dari pemesan sebelum surat dapat diunggah.
                            @else
                                Pembayaran lunas. Silakan unggah surat peminjaman resmi.
                            @endif
                        </p>

                        @if ($booking->status_peminjaman === 'approved' && $booking->status_pembayaran === 'completed')
                            <form action="{{ route('admin.peminjaman.uploadSurat', $booking->id_peminjaman_ruangan) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="border-2 border-dashed border-charcoal/15 rounded-2xl p-6 text-center hover:border-merah-jcc/40 hover:bg-merah-jcc/5 transition-all">
                                    <input type="file" name="surat_peminjaman" required accept=".pdf,.doc,.docx" 
                                        class="w-full text-xs text-secondary file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-merah-jcc/10 file:text-merah-jcc hover:file:bg-merah-jcc/20 cursor-pointer" />
                                </div>
                                <button type="submit" class="w-full mt-4 bg-merah-jcc hover:bg-rose-700 text-broken-white py-3 rounded-full font-headline font-bold text-xs shadow-lg transition-all">
                                    Unggah Surat
                                </button>
                            </form>
                        @endif

                        @if ($booking->surat_peminjaman)
                            <div class="mt-6 border-t border-charcoal/10 pt-6">
                                <h3 class="font-headline font-bold text-sm text-charcoal mb-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px] text-merah-jcc">preview</span>
                                    Pratinjau Dokumen
                                </h3>
                                <div class="w-full h-[500px] rounded-2xl overflow-hidden border border-charcoal/10 bg-cream-dark shadow-inner">
                                    <iframe 
                                        src="{{ asset('storage/' . $booking->surat_peminjaman) }}" 
                                        class="w-full h-full"
                                        frameborder="0">
                                    </iframe>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection