@extends('layouts.app')

@section('title', 'Konfirmasi Booking')

@section('content')
    <div class="pt-28 pb-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

        <!-- Title Page Header -->
        <div class="text-center max-w-2xl mx-auto mb-8 space-y-2">
            <h1 class="font-headline text-3xl md:text-5xl font-extrabold text-charcoal">Pesan Ruangan Anda</h1>
            <p class="font-body text-secondary text-sm md:text-base">Amankan tempat di Jember Creative Center untuk ide besar
                Anda berikutnya.</p>
        </div>

        <!-- Stepper Navigation Bar -->
        <div class="max-w-xl mx-auto mb-12 relative px-4">
            <div class="absolute top-1/2 left-10 right-10 h-1 bg-charcoal/10 -translate-y-1/2 z-0">
                <div id="step-progress" class="h-full bg-merah-jcc transition-all duration-500 w-0"></div>
            </div>

            <div class="relative z-10 flex justify-between items-center text-center">
                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(1)">
                    <div id="step-node-1"
                        class="w-10 h-10 rounded-full bg-merah-jcc text-broken-white font-headline font-bold flex items-center justify-center shadow-md transition-all">
                        1</div>
                    <span id="step-label-1" class="font-headline font-bold text-xs text-charcoal">Jadwal</span>
                </div>

                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(2)">
                    <div id="step-node-2"
                        class="w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all">
                        2</div>
                    <span id="step-label-2" class="font-headline font-bold text-xs text-charcoal/60">Detail</span>
                </div>

                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(3)">
                    <div id="step-node-3"
                        class="w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all">
                        3</div>
                    <span id="step-label-3" class="font-headline font-bold text-xs text-charcoal/60">Tinjau</span>
                </div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start max-w-6xl mx-auto">

            <!-- LEFT COLUMN: Form -->
            <div class="lg:col-span-7">
                <form id="booking-form" enctype="multipart/form-data" method="POST" action="{{ route('peminjaman.store') }}" novalidate>
                        @if ($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/30 rounded-2xl p-5">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-red-600 text-xl shrink-0">error</span>
                                <div>
                                    <h3 class="font-headline font-bold text-sm text-red-700 mb-2">Ada yang perlu diperbaiki:</h3>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="text-xs text-red-600">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    @csrf
                    <input type="hidden" name="ruangan_id_ruangan" value="{{ $ruangan->id_ruangan }}">
                    <input type="hidden" name="tanggal" id="input-tanggal">

                    <!-- ================= STEP 1 ================= -->
                    <div id="step-content-1"
                        class="bg-broken-white rounded-[32px] p-6 md:p-8 shadow-sm border border-charcoal/10 space-y-8 transition-all">
                            <!-- Operating Hours Info (not selectable) -->
                            <div class="bg-amber-500/5 border border-amber-500/20 rounded-2xl p-4 flex items-start gap-3">
                                <span class="material-symbols-outlined text-amber-600 text-lg shrink-0">schedule</span>
                                <div>
                                    <h4 class="font-headline font-bold text-sm text-charcoal">Waktu Operasional</h4>
                                    <p class="font-body text-xs text-secondary mt-0.5">
                                        Booking berlaku untuk <strong>satu hari penuh</strong> dari pukul <strong>09:00</strong> sampai <strong>22:00 WIB</strong>.
                                    </p>
                                </div>
                            </div>

                        <div class="bg-broken-white p-4 rounded-2xl border border-charcoal/10 flex items-center gap-4">
                            <img src="{{ $ruangan->gambar_ruangan
                                        ? asset('storage/' . $ruangan->gambar_ruangan)
                                        : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=200&auto=format&fit=crop' }}"
                                class="w-16 h-16 rounded-xl object-cover" alt="{{ $ruangan->nama_ruangan }}">
                            <div>
                                <h4 class="font-headline font-bold text-base text-charcoal">{{ $ruangan->nama_ruangan }}</h4>
                                <p class="text-xs text-secondary">Kapasitas {{ $ruangan->kapasitas_ruangan }} orang • {{ $ruangan->luas_ruangan }} m²</p>
                                <p class="text-sm font-bold text-merah-jcc">
                                    Rp {{ number_format($ruangan->tarif_sewa_ruangan, 0, ',', '.') }}/hari
                                </p>
                            </div>
                        </div>

                        <!-- Date Picker -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-headline font-bold text-lg text-charcoal">Pilih Tanggal</h3>
                                
                                <!-- Month Selector -->
                                <select id="month-selector" class="bg-cream-dark/50 border border-charcoal/10 rounded-xl px-4 py-2 text-xs font-bold text-charcoal focus:outline-none focus:border-merah-jcc transition-all">
                                    @foreach($months as $month)
                                        <option value="{{ $month['value'] }}">{{ $month['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Day-of-week header --}}
                            <div class="grid grid-cols-7 gap-2 text-center text-xs font-headline mb-2 text-secondary">
                                <div>Mg</div><div>Sn</div><div>Sl</div><div>Rb</div><div>Km</div><div>Jm</div><div>Sb</div>
                            </div>

                            {{-- Calendar grid (Now empty, JS will fill it) --}}
                            <div class="grid grid-cols-7 gap-2 text-center text-xs font-medium font-body" id="calendar-grid">
                                <!-- JavaScript will inject the days here -->
                            </div>
                        </div>

                        <!-- Peralatan Tambahan -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-headline font-bold text-lg text-charcoal">Peralatan Tambahan</h3>
                                <span class="text-[10px] text-secondary">Pilih satu atau lebih (opsional)</span>
                            </div>

                            <!-- === CART: Selected Items === -->
                            <div id="item-cart" class="hidden mb-5">
                                <div class="flex items-center gap-2 mb-2 px-1">
                                    <span class="material-symbols-outlined text-merah-jcc text-base">check_circle</span>
                                    <h4 class="font-headline font-bold text-sm text-merah-jcc">
                                        Peralatan Dipilih (<span id="cart-count">0</span>)
                                    </h4>
                                </div>
                                <div id="cart-list" class="space-y-2"></div>
                            </div>

                            <!-- === SEARCH === -->
                            <div class="relative mb-3">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-charcoal/40 text-lg pointer-events-none">search</span>
                                <input type="text"
                                    id="item-search"
                                    placeholder="Cari peralatan (nama, jenis, kata kunci)..."
                                    autocomplete="off"
                                    class="w-full bg-cream-dark/50 border border-charcoal/10 rounded-2xl pl-11 pr-10 py-3 text-xs text-charcoal placeholder-charcoal/40 focus:outline-none focus:border-merah-jcc focus:ring-1 focus:ring-merah-jcc transition-all" />
                                <button type="button"
                                        id="item-search-clear"
                                        class="hidden absolute right-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full hover:bg-charcoal/10 flex items-center justify-center text-charcoal/40 transition-colors">
                                    <span class="material-symbols-outlined text-base">close</span>
                                </button>
                            </div>

                            <!-- Result counter -->
                            <p id="item-search-info" class="text-[10px] text-secondary mb-3 px-1">
                                Menampilkan <span id="item-visible-count">0</span> dari <span id="item-total-count">0</span> peralatan
                            </p>

                            <!-- No results -->
                            <div id="item-no-results" class="hidden text-center py-8">
                                <span class="material-symbols-outlined text-3xl text-charcoal/20 block mb-2">search_off</span>
                                <p class="text-xs text-secondary">Tidak ada peralatan yang cocok</p>
                            </div>

                            <!-- === BROWSE: Items list === -->
                            <div class="space-y-3" id="item-list">
                                @foreach ($barangs as $barang)
                                    @php
                                        $initials = strtoupper(substr($barang->nama_barang, 0, 2));
                                    @endphp
                                    <div class="item-row flex items-center justify-between p-4 bg-cream-dark/30 border border-charcoal/10 rounded-2xl cursor-pointer hover:border-merah-jcc/30 transition-all"
                                        data-id="{{ $barang->id_barang }}"
                                        data-name="{{ strtolower($barang->nama_barang) }}"
                                        data-keywords="{{ strtolower($barang->keywords_barang ?? '') }}"
                                        data-jenis="{{ strtolower($barang->jenis_barang ?? '') }}"
                                        data-price="{{ (int) $barang->harga_sewa }}"
                                        data-display="{{ $barang->nama_barang }}"
                                        data-jenis-display="{{ $barang->jenis_barang }}">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center">
                                                <span class="material-symbols-outlined">inventory_2</span>
                                            </div>
                                            <div>
                                                <h4 class="font-headline font-bold text-sm text-charcoal">{{ $barang->nama_barang }}</h4>
                                                <p class="font-body text-xs text-secondary">
                                                    {{ $barang->jenis_barang }} • Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }}/hari
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Checkbox (visual only; row click does the toggling) -->
                                        <div class="item-checkbox w-6 h-6 rounded-md border-2 border-charcoal/20 flex items-center justify-center transition-all shrink-0">
                                            <span class="material-symbols-outlined text-sm text-broken-white hidden">check</span>
                                        </div>

                                        <!-- Hidden input to submit selection -->
                                        <input type="hidden" name="barang_ids[]" value="{{ $barang->id_barang }}" disabled>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="button" onclick="goToStep(2)"
                            class="w-full bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                            Lanjut Isi Detail
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>

                    <!-- ================= STEP 2 ================= -->
                    <div id="step-content-2"
                        class="hidden bg-cream-dark/50 rounded-[32px] p-6 md:p-8 border border-charcoal/10 space-y-8 transition-all">
                        <h2 class="font-headline text-3xl font-extrabold text-charcoal">Lengkapi Data Anda</h2>

                        <div class="space-y-4">
                            <h3 class="font-headline font-bold text-base text-charcoal">Detail Kegiatan</h3>

                            <input type="text" name="nama_event" id="input-event-title"
                                placeholder="Nama Kegiatan"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                            <select name="status_event" id="input-event-type" 
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all">
                                <option value="private">Private (Rapat Internal)</option>
                                <option value="public">Public (Seminar, Workshop, Pameran)</option>
                            </select>

                            <input type="text" name="link" id="input-event-link"
                                placeholder="Link Event (opsional, untuk event publik)"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                            <input type="text" name="kapasitas" id="input-kapasitas" min="1"
                                placeholder="Perkiraan Jumlah Peserta"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                            <input type="text" name="noHP_CP" id="input-phone" 
                                placeholder="Nomor WhatsApp (cth. 08123456789)"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                            <!-- File Pendukung (Proposal / Rundown) -->
                            <div class="mt-4">
                                <label class="block text-xs font-bold text-charcoal mb-2">File Pendukung (Proposal / Rundown)</label>
                                <input type="file" name="file_pendukung" accept=".pdf,.doc,.docx" required
                                    class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-merah-jcc/10 file:text-merah-jcc hover:file:bg-merah-jcc/20" />
                                <p class="text-[10px] text-secondary mt-1">Format: PDF, DOC, DOCX (Maks. 5MB). Wajib diisi.</p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="button" onclick="goToStep(1)"
                                class="w-1/3 bg-broken-white hover:bg-charcoal/5 text-charcoal border border-charcoal/20 py-4 rounded-full font-headline font-bold text-sm transition-all text-center">
                                Kembali
                            </button>
                            <button type="button" onclick="goToStep(3)"
                                class="w-2/3 bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                                Lanjut ke Tinjauan
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </button>
                        </div>
                    </div>

                    <!-- ================= STEP 3 ================= -->
                    <div id="step-content-3"
                        class="hidden bg-cream-dark/50 rounded-[32px] p-6 md:p-8 border border-charcoal/10 space-y-8 transition-all">
                        <h2 class="font-headline text-3xl font-extrabold text-charcoal">Tinjau Pesanan Anda</h2>

                        <div class="space-y-3">
                            <div class="flex items-center gap-2 text-merah-jcc font-headline font-bold text-sm">
                                <span class="material-symbols-outlined text-base">event_note</span>
                                Detail Kegiatan
                            </div>
                            <div class="bg-broken-white p-5 rounded-2xl text-xs space-y-3">
                                <div>
                                    <span class="text-secondary block mb-0.5">Nama Kegiatan</span>
                                    <strong id="review-event-title" class="font-headline text-sm text-charcoal">-</strong>
                                </div>
                                <div>
                                    <span class="text-secondary block mb-0.5">Jenis Event</span>
                                    <strong id="review-event-type" class="font-headline text-sm text-charcoal">-</strong>
                                </div>
                                <div>
                                    <span class="text-secondary block mb-0.5">Jumlah Peserta</span>
                                    <strong id="review-kapasitas" class="font-headline text-sm text-charcoal">-</strong>
                                </div>
                                <div>
                                    <span class="text-secondary block mb-0.5">Nomor WhatsApp</span>
                                    <strong id="review-phone" class="font-headline text-sm text-charcoal">-</strong>
                                </div>
                            </div>
                        </div>

                        <div id="terms-box" class="pt-2">
                            <label class="flex items-start gap-3 text-xs text-secondary cursor-pointer">
                                <input type="checkbox" id="agree-terms" required checked
                                    class="mt-0.5 rounded text-merah-jcc focus:ring-merah-jcc" />
                                <span>Saya menyetujui <a href="#" class="text-merah-jcc font-bold underline">syarat dan ketentuan</a> serta pedoman fasilitas Jember Creative Center.</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4 pt-2">
                            <button type="button" onclick="goToStep(2)"
                                class="w-1/3 bg-broken-white hover:bg-charcoal/5 text-charcoal border border-charcoal/20 py-4 rounded-full font-headline font-bold text-sm transition-all text-center">
                                Ubah Data
                            </button>
                            <button type="submit"
                                class="w-2/3 bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                                Konfirmasi
                                <span class="material-symbols-outlined text-base">check_circle</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- RIGHT COLUMN: Sticky Summary -->
            <div class="lg:col-span-5 sticky top-28">
                <div class="bg-cream-dark/60 rounded-[32px] p-6 space-y-6 shadow-sm border border-charcoal/10">
                    <div class="flex items-center gap-2 font-headline font-bold text-lg text-charcoal pb-3 border-b border-charcoal/10">
                        <span class="material-symbols-outlined text-merah-jcc">receipt_long</span>
                        Ringkasan Pesanan
                    </div>

                    <div class="flex gap-4 items-center">
                        <img src="{{ $ruangan->gambar_ruangan
                                    ? asset('storage/' . $ruangan->gambar_ruangan)
                                    : 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=400&auto=format&fit=crop' }}"
                            class="w-16 h-16 rounded-2xl object-cover border border-charcoal/10 shrink-0"
                            alt="{{ $ruangan->nama_ruangan }}" />
                        <div>
                            <h4 class="font-headline font-bold text-base text-charcoal">{{ $ruangan->nama_ruangan }}</h4>
                            <p class="font-body text-xs text-secondary">Kapasitas {{ $ruangan->kapasitas_ruangan }} Orang</p>
                        </div>
                    </div>

                    <div class="space-y-3 text-xs border-t border-b border-charcoal/10 py-4">
                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">calendar_today</span> Tanggal
                            </span>
                            <strong id="summary-date" class="font-headline text-charcoal">-</strong>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">schedule</span> Waktu
                            </span>
                            <div class="text-right">
                                <strong class="font-headline text-charcoal block">09:00 - 22:00</strong>
                                <span class="text-[10px] text-secondary">(1 Hari)</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">build</span> Tambahan
                            </span>
                            <div id="summary-extras" class="text-right font-headline text-charcoal font-bold space-y-0.5">
                                <div class="font-normal text-secondary">Tidak ada</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-end pt-1">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-secondary tracking-wider block">Total Biaya</span>
                            <span class="text-[10px] text-secondary/70">*Estimasi, belum termasuk pajak</span>
                        </div>
                        <p id="summary-total" class="font-headline font-extrabold text-2xl text-merah-jcc">Rp 0</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // SERVER-INJECTED DATA
        const roomPricePerDay = {{ (int) $ruangan->tarif_sewa_ruangan }};
        const barangData = {
            @foreach($barangs as $barang)
                "{{ $barang->id_barang }}": {
                    id: "{{ $barang->id_barang }}",
                    name: "{{ addslashes($barang->nama_barang) }}",
                    keywords: "{{ addslashes($barang->keywords_barang ?? '') }}".toLowerCase(),
                    jenis: "{{ addslashes($barang->jenis_barang ?? '') }}".toLowerCase(),
                    price: {{ (int) $barang->harga_sewa }}
                },
            @endforeach
        };

        // STATE
        let currentStep = 1;
        let selectedDate = "{{ ($today ?? \Carbon\Carbon::today())->format('Y-m-d') }}";
        let selectedDateDisplay = "{{ ($today ?? \Carbon\Carbon::today())->translatedFormat('d M Y') }}";
        const selectedItems = new Set();

        // DOM ELEMENT CACHE
        const ITEM_LIMIT = 5;
        const itemSearch = document.getElementById('item-search');
        const itemSearchClear = document.getElementById('item-search-clear');
        const itemRows = document.querySelectorAll('.item-row');
        const itemNoResults = document.getElementById('item-no-results');
        const itemVisibleCount = document.getElementById('item-visible-count');
        const itemTotalCount = document.getElementById('item-total-count');
        const itemCart = document.getElementById('item-cart');
        const cartList = document.getElementById('cart-list');
        const cartCount = document.getElementById('cart-count');
        const allItemRows = Array.from(itemRows);

        // === HELPER: FETCH ITEM AVAILABILITY ===
        function fetchItemAvailability(date) {
            // Hit the API with the selected date
            fetch(`{{ route('api.ruangan.availability', $ruangan->id_ruangan) }}?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    const bookedBarangIds = data.booked_barang_ids.map(String); // Convert to strings to match dataset
                    
                    // 1. Reset all items to visible first
                    allItemRows.forEach(row => {
                        row.style.display = 'flex';
                        row.classList.remove('opacity-50', 'pointer-events-none');
                        row.querySelector('h4').classList.remove('line-through', 'text-gray-400');
                    });

                    // 2. Loop through items and disable the booked ones
                    allItemRows.forEach(row => {
                        const id = row.dataset.id;
                        if (bookedBarangIds.includes(id)) {
                            // Visually disable the row
                            row.style.display = 'none'; // Or use 'opacity-50 pointer-events-none' if you prefer to show them greyed out
                            row.classList.add('opacity-50', 'pointer-events-none');
                            row.querySelector('h4').classList.add('line-through', 'text-gray-400');

                            // If this item is in the cart, remove it automatically!
                            if (selectedItems.has(id)) {
                                toggleItem(row, true); // true = force removal
                            }
                        }
                    });

                    // Re-apply the search filter (so hidden items stay hidden)
                    applyItemFilter();
                })
                .catch(error => console.error('Error fetching item availability:', error));
        }

        // === DATE PICKER ===
        document.querySelectorAll('.date-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.date-btn').forEach(b => {
                    b.classList.remove('bg-merah-jcc', 'text-broken-white', 'font-bold', 'shadow-md');
                    if (!b.classList.contains('ring-1')) b.classList.add('hover:bg-cream-dark');
                });
                btn.classList.add('bg-merah-jcc', 'text-broken-white', 'font-bold', 'shadow-md');
                btn.classList.remove('hover:bg-cream-dark');

                selectedDate = btn.dataset.date;
                selectedDateDisplay = btn.dataset.display;
                document.getElementById('input-tanggal').value = selectedDate;
                
                updateSummary();
                fetchItemAvailability(selectedDate); // Check items when date changes
            });
        });

        // === ITEM TOGGLE ===
        function toggleItem(row, forceRemove = false) {
            const id = row.dataset.id;
            const checkbox = row.querySelector('.item-checkbox');
            const checkIcon = checkbox.querySelector('.material-symbols-outlined');
            const hiddenInput = row.querySelector('input[type="hidden"]');

            if (selectedItems.has(id) || forceRemove) {
                selectedItems.delete(id);
                checkbox.classList.remove('bg-merah-jcc', 'border-merah-jcc');
                checkbox.classList.add('border-charcoal/20');
                checkIcon.classList.add('hidden');
                hiddenInput.disabled = true;
            } else {
                selectedItems.add(id);
                checkbox.classList.add('bg-merah-jcc', 'border-merah-jcc');
                checkbox.classList.remove('border-charcoal/20');
                checkIcon.classList.remove('hidden');
                hiddenInput.disabled = false;
            }

            renderCart();
            updateSummary();
        }

        // === RENDER CART ===
        function renderCart() {
            if (selectedItems.size === 0) {
                itemCart.classList.add('hidden');
                return;
            }

            itemCart.classList.remove('hidden');
            cartCount.textContent = selectedItems.size;

            const cartItems = allItemRows.filter(row => selectedItems.has(row.dataset.id));

            cartList.innerHTML = cartItems.map(row => `
                <div class="flex items-center justify-between p-3 bg-merah-jcc/5 border border-merah-jcc/20 rounded-2xl">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-merah-jcc/15 text-merah-jcc flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-base">check</span>
                        </div>
                        <div>
                            <h5 class="font-headline font-bold text-xs text-charcoal">${row.dataset.display}</h5>
                            <p class="font-body text-[10px] text-secondary">
                                ${row.dataset.jenisDisplay} • Rp ${Number(row.dataset.price).toLocaleString('id-ID')}/hari
                            </p>
                        </div>
                    </div>
                    <button type="button"
                        class="cart-remove w-7 h-7 rounded-full hover:bg-merah-jcc/10 text-merah-jcc flex items-center justify-center transition-colors shrink-0"
                        data-id="${row.dataset.id}">
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                </div>
            `).join('');

            cartList.querySelectorAll('.cart-remove').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.dataset.id;
                    const row = allItemRows.find(r => r.dataset.id === id);
                    if (row) toggleItem(row);
                });
            });
        }

        // === FILTER / SEARCH ===
        function applyItemFilter() {
            const query = (itemSearch?.value || '').trim().toLowerCase();
            let visible = 0;

            allItemRows.forEach(row => {
                // Don't override the hidden status if it's booked/disabled
                if (row.classList.contains('pointer-events-none')) return; 

                row.style.display = 'none';
            });

            let matchingRows;
            if (query === '') {
                matchingRows = allItemRows.filter(row => !row.classList.contains('pointer-events-none'));
            } else {
                matchingRows = allItemRows
                    .filter(row => !row.classList.contains('pointer-events-none'))
                    .map(row => {
                        const name = row.dataset.name || '';
                        const keywords = row.dataset.keywords || '';
                        const jenis = row.dataset.jenis || '';
                        let score = 0;
                        if (name === query) score += 100;
                        else if (name.startsWith(query)) score += 50;
                        else if (name.includes(query)) score += 30;
                        if (keywords.split(',').map(k => k.trim()).includes(query)) score += 40;
                        else if (keywords.includes(query)) score += 20;
                        if (jenis.includes(query)) score += 10;
                        return { row, score };
                    })
                    .filter(item => item.score > 0)
                    .sort((a, b) => b.score - a.score)
                    .map(item => item.row);
            }

            matchingRows.slice(0, ITEM_LIMIT).forEach(row => {
                row.style.display = 'flex';
                visible++;
            });

            if (itemVisibleCount) itemVisibleCount.textContent = visible;
            if (itemTotalCount) itemTotalCount.textContent = allItemRows.filter(row => !row.classList.contains('pointer-events-none')).length;

            if (itemNoResults) itemNoResults.classList.toggle('hidden', visible > 0);
            if (itemSearchClear) itemSearchClear.classList.toggle('hidden', query === '');
        }

        // === UPDATE SUMMARY PANEL ===
        function updateSummary() {
            document.getElementById('summary-date').textContent = selectedDateDisplay;

            const extrasContainer = document.getElementById('summary-extras');
            let extrasHTML = '';
            let totalExtras = 0;

            selectedItems.forEach(id => {
                const data = barangData[id];
                if (!data) return;
                extrasHTML += `<div>${data.name}</div>`;
                totalExtras += data.price;
            });

            if (!extrasHTML) extrasHTML = '<div class="font-normal text-secondary">Tidak ada</div>';
            extrasContainer.innerHTML = extrasHTML;

            const grandTotal = roomPricePerDay + totalExtras;
            document.getElementById('summary-total').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }

        // === CALENDAR ENGINE ===
        function renderCalendar(monthString) {
            const grid = document.getElementById('calendar-grid');
            grid.innerHTML = ''; // Clear previous month

            const [year, month] = monthString.split('-');
            const firstDay = new Date(year, month - 1, 1);
            const daysInMonth = new Date(year, month, 0).getDate();
            const startingWeekday = firstDay.getDay(); // 0 = Sunday
            
            const today = new Date();
            today.setHours(0,0,0,0);
            
            // Max date = 2 months from now
            const maxDate = new Date();
            maxDate.setMonth(maxDate.getMonth() + 3);
            maxDate.setDate(0);

            // 1. Add empty slots for padding
            for (let i = 0; i < startingWeekday; i++) {
                grid.innerHTML += `<span></span>`;
            }

            // 2. Generate days
            for (let day = 1; day <= daysInMonth; day++) {
                const dateObj = new Date(year, month - 1, day);
                // Adjust for timezone offset
                const dateStr = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                
                const isPast = dateObj < today;
                const isBeyondLimit = dateObj > maxDate;
                const isToday = dateObj.getTime() === today.getTime();
                
                if (isPast || isBeyondLimit) {
                    grid.innerHTML += `<span class="p-2.5 text-charcoal/30 ${isPast ? 'line-through' : ''} cursor-not-allowed">${day}</span>`;
                } else {
                    const todayClass = isToday ? 'text-merah-jcc font-bold ring-1 ring-merah-jcc' : 'text-charcoal hover:bg-cream-dark';
                    grid.innerHTML += `
                        <button type="button" 
                            class="date-btn p-2.5 rounded-full transition-all ${todayClass}"
                            data-date="${dateStr}"
                            onclick="selectDate(this, '${dateStr}')">
                            ${day}
                        </button>
                    `;
                }
            }
        }

        function selectDate(btn, dateStr) {
            // UI selection
            document.querySelectorAll('.date-btn').forEach(b => {
                b.classList.remove('bg-merah-jcc', 'text-broken-white', 'font-bold', 'shadow-md');
                if (!b.classList.contains('ring-1')) b.classList.add('hover:bg-cream-dark');
            });
            btn.classList.add('bg-merah-jcc', 'text-broken-white', 'font-bold', 'shadow-md');
            btn.classList.remove('hover:bg-cream-dark');

            // Update state
            selectedDate = dateStr;
            // Format for display (e.g., "20 Oct 2026")
            const d = new Date(dateStr);
            selectedDateDisplay = d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            
            document.getElementById('input-tanggal').value = selectedDate;
            updateSummary();
            
            // Fetch new items for this date
            fetchItemAvailability(selectedDate);
        }

        // === CHECK ROOM AVAILABILITY ===
        let bookedDatesMemory = []; // Store dates globally so we remember them

        function checkRoomAvailability() {
            fetch("{{ route('api.ruangan.availability', $ruangan->id_ruangan) }}")
            .then(response => response.json())
            .then(data => {
                bookedDatesMemory = data.booked_dates || []; // Save to memory
                
                // Grey out booked dates
                document.querySelectorAll('.date-btn').forEach(btn => {
                    if (bookedDatesMemory.includes(btn.dataset.date)) {
                        btn.disabled = true;
                        btn.classList.add('bg-gray-200', 'text-gray-400', 'opacity-50', 'cursor-not-allowed', 'line-through');
                        btn.classList.remove('hover:bg-cream-dark', 'text-charcoal', 'ring-1', 'ring-merah-jcc', 'text-merah-jcc');
                        btn.title = "Maaf, ruangan sudah dibooking pada tanggal ini!";
                    }
                });
            })
            .catch(error => console.error('Error fetching availability:', error));
        }

        // === STEPPER ===
        function goToStep(step) {
            // ... (KEEP YOUR EXISTING STEPPER CODE HERE, DON'T DELETE IT) ...
            currentStep = step;
            [1, 2, 3].forEach(i => {
                document.getElementById(`step-content-${i}`).classList.toggle('hidden', i !== step);
            });
            const progressLine = document.getElementById('step-progress');
            progressLine.style.width = step === 1 ? '0%' : step === 2 ? '50%' : '100%';
            for (let i = 1; i <= 3; i++) {
                const node = document.getElementById(`step-node-${i}`);
                const label = document.getElementById(`step-label-${i}`);
                if (i <= step) {
                    node.className = "w-10 h-10 rounded-full bg-merah-jcc text-broken-white font-headline font-bold flex items-center justify-center shadow-md transition-all";
                    label.className = "font-headline font-bold text-xs text-charcoal";
                } else {
                    node.className = "w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all";
                    label.className = "font-headline font-bold text-xs text-charcoal/60";
                }
            }
            if (step === 3) {
                document.getElementById('review-event-title').textContent = document.getElementById('input-event-title').value || '-';
                document.getElementById('review-event-type').textContent = document.getElementById('input-event-type').value || '-';
                document.getElementById('review-kapasitas').textContent = document.getElementById('input-kapasitas').value || '-';
                document.getElementById('review-phone').textContent = document.getElementById('input-phone').value || '-';
            }
            window.scrollTo({ top: 100, behavior: 'smooth' });
        }

        // === EVENT LISTENERS ===
        allItemRows.forEach(row => {
            row.addEventListener('click', () => toggleItem(row));
        });

        if (itemSearch) itemSearch.addEventListener('input', applyItemFilter);

        if (itemSearchClear) {
            itemSearchClear.addEventListener('click', () => {
                itemSearch.value = '';
                applyItemFilter();
                itemSearch.focus();
            });
        }

        // === INIT ===
        document.addEventListener('DOMContentLoaded', () => {
            const monthSelector = document.getElementById('month-selector');

            // 1. Render initial calendar (current month)
            renderCalendar(monthSelector.value);
            document.getElementById('input-tanggal').value = selectedDate;
            updateSummary();
            renderCart();

            // 2. Fetch room availability FIRST (this populates bookedDatesMemory)
            fetch("{{ route('api.ruangan.availability', $ruangan->id_ruangan) }}")
            .then(response => response.json())
            .then(data => {
                bookedDatesMemory = data.booked_dates || [];
                
                // Apply strikethrough to current month
                document.querySelectorAll('.date-btn').forEach(btn => {
                    if (bookedDatesMemory.includes(btn.dataset.date)) {
                        btn.disabled = true;
                        btn.classList.add('bg-gray-200', 'text-gray-400', 'opacity-50', 'cursor-not-allowed', 'line-through');
                        btn.classList.remove('hover:bg-cream-dark', 'text-charcoal', 'ring-1', 'ring-merah-jcc', 'text-merah-jcc');
                        btn.title = "Maaf, ruangan sudah dibooking pada tanggal ini!";
                    }
                });

                // 3. Fetch item availability for today's date
                fetchItemAvailability(selectedDate);
            })
            .catch(error => console.error('Error fetching availability:', error));

            // 4. When user changes month
            monthSelector.addEventListener('change', (e) => {
                renderCalendar(e.target.value); // Draw the new month
                
                // Re-apply the strikethrough using the memory we saved!
                document.querySelectorAll('.date-btn').forEach(btn => {
                    if (bookedDatesMemory.includes(btn.dataset.date)) {
                        btn.disabled = true;
                        btn.classList.add('bg-gray-200', 'text-gray-400', 'opacity-50', 'cursor-not-allowed', 'line-through');
                        btn.classList.remove('hover:bg-cream-dark', 'text-charcoal', 'ring-1', 'ring-merah-jcc', 'text-merah-jcc');
                        btn.title = "Maaf, ruangan sudah dibooking pada tanggal ini!";
                    }
                });
            });
        });
    </script>
@endsection