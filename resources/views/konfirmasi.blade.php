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
            <!-- Connecting Progress Line -->
            <div class="absolute top-1/2 left-10 right-10 h-1 bg-charcoal/10 -translate-y-1/2 z-0">
                <div id="step-progress" class="h-full bg-merah-jcc transition-all duration-500 w-0"></div>
            </div>

            <div class="relative z-10 flex justify-between items-center text-center">
                <!-- Step 1 Indicator -->
                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(1)">
                    <div id="step-node-1"
                        class="w-10 h-10 rounded-full bg-merah-jcc text-broken-white font-headline font-bold flex items-center justify-center shadow-md transition-all">
                        1</div>
                    <span id="step-label-1" class="font-headline font-bold text-xs text-charcoal">Jadwal</span>
                </div>

                <!-- Step 2 Indicator -->
                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(2)">
                    <div id="step-node-2"
                        class="w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all">
                        2</div>
                    <span id="step-label-2" class="font-headline font-bold text-xs text-charcoal/60">Detail</span>
                </div>

                <!-- Step 3 Indicator -->
                <div class="flex flex-col items-center gap-2 cursor-pointer" onclick="goToStep(3)">
                    <div id="step-node-3"
                        class="w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all">
                        3</div>
                    <span id="step-label-3" class="font-headline font-bold text-xs text-charcoal/60">Tinjau</span>
                </div>
            </div>
        </div>

        <!-- Main Grid Container (Form Area & Sticky Summary) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start max-w-6xl mx-auto">

            <!-- LEFT COLUMN: Dynamic Step Content (Col-Span 7) -->
            <div class="lg:col-span-7">

                <!-- ================= STEP 1: JADWAL & PERALATAN ================= -->
                <div id="step-content-1"
                    class="bg-broken-white rounded-[32px] p-6 md:p-8 shadow-sm border border-charcoal/10 space-y-8 transition-all">

                    <!-- Date Picker Section -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-headline font-bold text-lg text-charcoal">Pilih Tanggal</h3>
                            <div class="flex items-center gap-2 font-headline font-bold text-sm text-charcoal">
                                <button class="hover:text-merah-jcc transition-colors"><span
                                        class="material-symbols-outlined text-base">chevron_left</span></button>
                                <span>Oktober 2026</span>
                                <button class="hover:text-merah-jcc transition-colors"><span
                                        class="material-symbols-outlined text-base">chevron_right</span></button>
                            </div>
                        </div>

                        <!-- Calendar Table -->
                        <div class="grid grid-cols-7 gap-2 text-center text-xs font-headline mb-2 text-secondary">
                            <div>Mg</div>
                            <div>Sn</div>
                            <div>Sl</div>
                            <div>Rb</div>
                            <div>Km</div>
                            <div>Jm</div>
                            <div>Sb</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center text-xs font-medium font-body">
                            <span class="p-2 text-charcoal/30">27</span><span class="p-2 text-charcoal/30">28</span><span
                                class="p-2 text-charcoal/30">29</span><span class="p-2 text-charcoal/30">30</span>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">1</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">2</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">3</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">4</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">5</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">6</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">7</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">8</button>
                            <!-- Active Date Selected (e.g. 9 Okt) -->
                            <button class="p-2.5 rounded-full bg-merah-jcc text-broken-white font-bold shadow-md">9</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">10</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">11</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">12</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">13</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">14</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">15</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">16</button>
                            <span class="p-2.5 text-charcoal/30 line-through">17</span>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">18</button>
                            <button class="p-2.5 rounded-full hover:bg-cream-dark transition-all">19</button>
                        </div>
                    </div>

                    <!-- Time Slot Section -->
                    <div>
                        <h3 class="font-headline font-bold text-lg text-charcoal mb-4">Pilih Waktu</h3>
                        <div class="grid grid-cols-3 gap-3 text-xs font-headline font-bold">
                            <button onclick="selectTime('09:00 - 12:00', this)"
                                class="time-btn border border-charcoal/20 py-3 rounded-2xl text-charcoal hover:border-merah-jcc transition-all">09:00
                                - 12:00</button>
                            <button onclick="selectTime('13:00 - 16:00', this)"
                                class="time-btn bg-merah-jcc text-broken-white py-3 rounded-2xl shadow-md transition-all">13:00
                                - 16:00</button>
                            <button
                                class="border border-charcoal/10 py-3 rounded-2xl text-charcoal/30 cursor-not-allowed bg-cream-dark/30">17:00
                                - 20:00</button>
                        </div>
                    </div>

                    <!-- Extra Equipment Section -->
                    <div>
                        <h3 class="font-headline font-bold text-lg text-charcoal mb-4">Peralatan Tambahan</h3>
                        <div class="space-y-3">
                            <!-- Extra Item 1 -->
                            <div
                                class="flex items-center justify-between p-4 bg-cream-dark/30 border border-charcoal/10 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center">
                                        <span class="material-symbols-outlined">tv</span>
                                    </div>
                                    <div>
                                        <h4 class="font-headline font-bold text-sm text-charcoal">Smart TV 65"</h4>
                                        <p class="font-body text-xs text-secondary">Untuk presentasi (+Rp 50k/jam)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button onclick="updateQty('tv', -1)"
                                        class="w-7 h-7 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-charcoal/10">-</button>
                                    <span id="qty-tv" class="font-headline font-bold text-sm">1</span>
                                    <button onclick="updateQty('tv', 1)"
                                        class="w-7 h-7 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-charcoal/10">+</button>
                                </div>
                            </div>

                            <!-- Extra Item 2 -->
                            <div
                                class="flex items-center justify-between p-4 bg-cream-dark/30 border border-charcoal/10 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-merah-jcc/10 text-merah-jcc flex items-center justify-center">
                                        <span class="material-symbols-outlined">speaker</span>
                                    </div>
                                    <div>
                                        <h4 class="font-headline font-bold text-sm text-charcoal">Sistem Suara</h4>
                                        <p class="font-body text-xs text-secondary">Termasuk 2 Mic (+Rp 100k/jam)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button onclick="updateQty('sound', -1)"
                                        class="w-7 h-7 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-charcoal/10">-</button>
                                    <span id="qty-sound" class="font-headline font-bold text-sm">0</span>
                                    <button onclick="updateQty('sound', 1)"
                                        class="w-7 h-7 rounded-full border border-charcoal/20 flex items-center justify-center hover:bg-charcoal/10">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button onclick="goToStep(2)"
                        class="w-full bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                        Lanjut Isi Detail
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </button>
                </div>

                <!-- ================= STEP 2: LENGKAPI DATA PEMESAN ================= -->
                <div id="step-content-2"
                    class="hidden bg-cream-dark/50 rounded-[32px] p-6 md:p-8 border border-charcoal/10 space-y-8 transition-all">
                    <h2 class="font-headline text-3xl font-extrabold text-charcoal">Lengkapi Data Anda</h2>

                    <!-- User Info Form Group -->
                    <div class="space-y-4">
                        <h3 class="font-headline font-bold text-base text-charcoal">Informasi Pemesan</h3>
                        <input type="text" id="input-name" placeholder="Nama Lengkap (Sesuai KTP)"
                            value="Budi Santoso"
                            class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />
                        <input type="text" id="input-nik" placeholder="Nomor Induk Kependudukan (NIK)"
                            value="3509123456789012"
                            class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <input type="email" id="input-email" placeholder="Alamat Email"
                                value="budi.santoso@email.com"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />
                            <input type="tel" id="input-phone" placeholder="Nomor WhatsApp"
                                value="+62 812 3456 7890"
                                class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />
                        </div>
                    </div>

                    <!-- Event Detail Form Group -->
                    <div class="space-y-4">
                        <h3 class="font-headline font-bold text-base text-charcoal">Detail Kegiatan</h3>
                        <input type="text" id="input-event-title" placeholder="Nama Kegiatan"
                            value="Seminar Teknologi Jember"
                            class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all" />

                        <select id="input-event-type"
                            class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all">
                            <option value="Workshop & Seminar">Workshop & Seminar</option>
                            <option value="Rapat Internal">Rapat Internal</option>
                            <option value="Pameran & Exhibition">Pameran & Exhibition</option>
                        </select>

                        <textarea id="input-event-desc" rows="4" placeholder="Deskripsi Singkat Acara"
                            class="w-full bg-broken-white border border-charcoal/10 rounded-2xl px-5 py-3.5 text-sm text-charcoal focus:outline-none focus:border-merah-jcc transition-all">Seminar tahunan membahas perkembangan teknologi terkini dan penerapannya dalam industri kreatif lokal. Dihadiri oleh 200+ peserta dari kalangan mahasiswa dan profesional.</textarea>
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button onclick="goToStep(1)"
                            class="w-1/3 bg-broken-white hover:bg-charcoal/5 text-charcoal border border-charcoal/20 py-4 rounded-full font-headline font-bold text-sm transition-all text-center">
                            Kembali
                        </button>
                        <button onclick="goToStep(3)"
                            class="w-2/3 bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                            Lanjut ke Tinjauan
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- ================= STEP 3: TINJAU PESANAN ================= -->
                <div id="step-content-3"
                    class="hidden bg-cream-dark/50 rounded-[32px] p-6 md:p-8 border border-charcoal/10 space-y-8 transition-all">
                    <h2 class="font-headline text-3xl font-extrabold text-charcoal">Tinjau Pesanan Anda</h2>

                    <!-- User Info Review Card -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-merah-jcc font-headline font-bold text-sm">
                            <span class="material-symbols-outlined text-base">person</span>
                            Data Pemesan
                        </div>
                        <div class="bg-broken-white p-5 rounded-2xl grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div>
                                <span class="text-secondary block mb-0.5">Nama Lengkap</span>
                                <strong id="review-name" class="font-headline text-sm text-charcoal">Budi Santoso</strong>
                            </div>
                            <div>
                                <span class="text-secondary block mb-0.5">Nomor Induk Kependudukan (NIK)</span>
                                <strong id="review-nik"
                                    class="font-headline text-sm text-charcoal">3509123456789012</strong>
                            </div>
                            <div>
                                <span class="text-secondary block mb-0.5">Alamat Email</span>
                                <strong id="review-email"
                                    class="font-headline text-sm text-charcoal">budi.santoso@email.com</strong>
                            </div>
                            <div>
                                <span class="text-secondary block mb-0.5">Nomor WhatsApp</span>
                                <strong id="review-phone" class="font-headline text-sm text-charcoal">+62 812 3456
                                    7890</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Event Detail Review Card -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-merah-jcc font-headline font-bold text-sm">
                            <span class="material-symbols-outlined text-base">event_note</span>
                            Detail Kegiatan
                        </div>
                        <div class="bg-broken-white p-5 rounded-2xl text-xs space-y-3">
                            <div>
                                <span class="text-secondary block mb-0.5">Jenis & Nama Kegiatan</span>
                                <strong id="review-event-title" class="font-headline text-sm text-charcoal">Seminar
                                    Teknologi Jember</strong>
                            </div>
                            <div>
                                <span class="text-secondary block mb-0.5">Deskripsi Acara</span>
                                <p id="review-event-desc" class="font-body text-secondary leading-relaxed">Seminar tahunan
                                    membahas perkembangan teknologi terkini dan penerapannya dalam industri kreatif lokal.
                                    Dihadiri oleh 200+ peserta dari kalangan mahasiswa dan profesional.</p>
                            </div>
                        </div>
                    </div>
                    <div id="terms-box" class="pt-2">
                        <label class="flex items-start gap-3 text-xs text-secondary cursor-pointer">
                            <input type="checkbox" id="agree-terms" checked
                                class="mt-0.5 rounded text-merah-jcc focus:ring-merah-jcc" />
                            <span>Saya menyetujui <a href="#" class="text-merah-jcc font-bold underline">syarat dan
                                    ketentuan</a> serta pedoman fasilitas Jember Creative Center.</span>
                        </label>
                    </div>
                    <div class="flex items-center gap-4 pt-2">
                        <button onclick="goToStep(2)"
                            class="w-1/3 bg-broken-white hover:bg-charcoal/5 text-charcoal border border-charcoal/20 py-4 rounded-full font-headline font-bold text-sm transition-all text-center">
                            Ubah Data
                        </button>
                        <button onclick="submitBooking()"
                            class="w-2/3 bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all flex items-center justify-center gap-2">
                            Konfirmasi & Bayar
                            <span class="material-symbols-outlined text-base">check_circle</span>
                        </button>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Sticky Order Summary Card (Col-Span 5) -->
            <div class="lg:col-span-5 sticky top-28">
                <div class="bg-cream-dark/60 rounded-[32px] p-6 space-y-6 shadow-sm border border-charcoal/10">
                    <div
                        class="flex items-center gap-2 font-headline font-bold text-lg text-charcoal pb-3 border-b border-charcoal/10">
                        <span class="material-symbols-outlined text-merah-jcc">receipt_long</span>
                        Ringkasan Pesanan
                    </div>

                    <!-- Room Preview Item -->
                    <div class="flex gap-4 items-center">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=400&auto=format&fit=crop"
                            class="w-16 h-16 rounded-2xl object-cover border border-charcoal/10 shrink-0"
                            alt="Ruangan" />
                        <div>
                            <h4 class="font-headline font-bold text-base text-charcoal">Ruang Kolaborasi A</h4>
                            <p class="font-body text-xs text-secondary">Kapasitas 8-12 Orang</p>
                        </div>
                    </div>

                    <!-- Booking Meta Details -->
                    <div class="space-y-3 text-xs border-t border-b border-charcoal/10 py-4">
                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5"><span
                                    class="material-symbols-outlined text-sm">calendar_today</span> Tanggal</span>
                            <strong id="summary-date" class="font-headline text-charcoal">9 Okt 2026</strong>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5"><span
                                    class="material-symbols-outlined text-sm">schedule</span> Durasi</span>
                            <div class="text-right">
                                <strong id="summary-time" class="font-headline text-charcoal block">13:00 - 16:00</strong>
                                <span class="text-[10px] text-secondary">(3 Jam)</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-start">
                            <span class="text-secondary flex items-center gap-1.5"><span
                                    class="material-symbols-outlined text-sm">build</span> Tambahan</span>
                            <div id="summary-extras" class="text-right font-headline text-charcoal font-bold space-y-0.5">
                                <div>1x Smart TV 65"</div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pricing Calculation -->
                    <div class="flex justify-between items-end pt-1">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-secondary tracking-wider block">Total
                                Biaya</span>
                            <span class="text-[10px] text-secondary/70">*Termasuk PPN 11%</span>
                        </div>
                        <p id="summary-total" class="font-headline font-extrabold text-2xl text-merah-jcc">
                            Rp 600.000
                        </p>
                    </div>

                    <!-- Terms & Conditions Checkbox (Visible in Step 1) -->


                    <!-- Step 1 Action Button inside Summary -->
                    {{-- <button id="summary-btn" onclick="goToStep(2)"
                        class="w-full bg-merah-jcc hover:bg-merah-jcc/90 text-broken-white py-4 rounded-full font-headline font-bold text-sm tracking-wider shadow-lg transition-all text-center">
                        Ajukan Penyewaan
                    </button> --}}
                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript State Manager & Interaktivitas Step Wizard -->
    <script>
        let currentStep = 1;
        let selectedDate = "9 Okt 2026";
        let selectedTime = "13:00 - 16:00";
        let roomPricePerHour = 150000;
        let extras = {
            tv: 1,
            sound: 0
        };
        const extraPrices = {
            tv: 50000,
            sound: 100000
        };

        function selectTime(time, el) {
            selectedTime = time;
            document.querySelectorAll('.time-btn').forEach(btn => {
                btn.classList.remove('bg-merah-jcc', 'text-broken-white', 'shadow-md');
                btn.classList.add('border', 'border-charcoal/20', 'text-charcoal');
            });
            el.classList.remove('border', 'border-charcoal/20', 'text-charcoal');
            el.classList.add('bg-merah-jcc', 'text-broken-white', 'shadow-md');
            updateSummary();
        }

        function updateQty(type, change) {
            extras[type] = Math.max(0, extras[type] + change);
            document.getElementById(`qty-${type}`).textContent = extras[type];
            updateSummary();
        }

        function updateSummary() {
            document.getElementById('summary-date').textContent = selectedDate;
            document.getElementById('summary-time').textContent = selectedTime;

            // Render Extras Text
            const extrasContainer = document.getElementById('summary-extras');
            let extrasHTML = '';
            if (extras.tv > 0) extrasHTML += `<div>${extras.tv}x Smart TV 65"</div>`;
            if (extras.sound > 0) extrasHTML += `<div>${extras.sound}x Sistem Suara</div>`;
            if (!extrasHTML) extrasHTML = '<div class="font-normal text-secondary">Tidak ada</div>';
            extrasContainer.innerHTML = extrasHTML;

            // Total Cost Calculation (3 Hours assumed)
            const hours = 3;
            const totalRoom = roomPricePerHour * hours;
            const totalExtras = (extras.tv * extraPrices.tv * hours) + (extras.sound * extraPrices.sound * hours);
            const grandTotal = totalRoom + totalExtras;

            document.getElementById('summary-total').textContent = `Rp ${grandTotal.toLocaleString('id-ID')}`;
        }

        function goToStep(step) {
            currentStep = step;

            // Hide All Step Contents
            document.getElementById('step-content-1').classList.add('hidden');
            document.getElementById('step-content-2').classList.add('hidden');
            document.getElementById('step-content-3').classList.add('hidden');

            // Show Active Step Content
            document.getElementById(`step-content-${step}`).classList.remove('hidden');

            // Update Progress Bar Line Width
            const progressLine = document.getElementById('step-progress');
            if (step === 1) progressLine.style.width = '0%';
            if (step === 2) progressLine.style.width = '50%';
            if (step === 3) progressLine.style.width = '100%';

            // Update Stepper Badges & Labels
            for (let i = 1; i <= 3; i++) {
                const node = document.getElementById(`step-node-${i}`);
                const label = document.getElementById(`step-label-${i}`);

                if (i <= step) {
                    node.className =
                        "w-10 h-10 rounded-full bg-merah-jcc text-broken-white font-headline font-bold flex items-center justify-center shadow-md transition-all";
                    label.className = "font-headline font-bold text-xs text-charcoal";
                } else {
                    node.className =
                        "w-10 h-10 rounded-full bg-broken-white border-2 border-charcoal/20 text-charcoal/60 font-headline font-bold flex items-center justify-center shadow-sm transition-all";
                    label.className = "font-headline font-bold text-xs text-charcoal/60";
                }
            }

            // Synchronize Form Data to Review Screen on Step 3
            if (step === 3) {
                document.getElementById('review-name').textContent = document.getElementById('input-name').value || '-';
                document.getElementById('review-nik').textContent = document.getElementById('input-nik').value || '-';
                document.getElementById('review-email').textContent = document.getElementById('input-email').value || '-';
                document.getElementById('review-phone').textContent = document.getElementById('input-phone').value || '-';
                document.getElementById('review-event-title').textContent = document.getElementById('input-event-title')
                    .value || '-';
                document.getElementById('review-event-desc').textContent = document.getElementById('input-event-desc')
                    .value || '-';

                document.getElementById('summary-btn').textContent = "Konfirmasi & Bayar";
                document.getElementById('summary-btn').setAttribute('onclick', 'submitBooking()');
            } else if (step === 2) {
                document.getElementById('summary-btn').textContent = "Lanjut ke Tinjauan";
                document.getElementById('summary-btn').setAttribute('onclick', 'goToStep(3)');
            } else {
                document.getElementById('summary-btn').textContent = "Ajukan Penyewaan";
                document.getElementById('summary-btn').setAttribute('onclick', 'goToStep(2)');
            }

            window.scrollTo({
                top: 100,
                behavior: 'smooth'
            });
        }

        function submitBooking() {
            alert('Pesanan Anda berhasil diajukan! Anda akan diarahkan ke halaman pembayaran.');
        }

        document.addEventListener('DOMContentLoaded', updateSummary);
    </script>
@endsection
