@extends('dashboard.layouts.app')

@section('title', 'Detail Pemesanan - Terima Pesanan')

@section('dashboard-content')
    <div class="max-w-6xl mx-auto space-y-6 md:space-y-8 pb-12 w-full">

        <!-- HEADER SECTION -->
        <div class="reveal revealed flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <a href="/dashboard/terima-pemesanan"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-secondary hover:text-merah-jcc transition-colors mb-3">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span> Kembali ke Daftar
                </a>
                <div class="flex items-center gap-3 flex-wrap">
                    <h1 class="font-headline text-3xl md:text-4xl font-extrabold text-charcoal tracking-tight">
                        JCC-2026-0018
                    </h1>
                    <span
                        class="bg-amber-500/10 text-amber-600 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border border-amber-500/20 shadow-sm flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                        Menunggu Review
                    </span>
                </div>
                <p class="font-body text-secondary text-sm md:text-base mt-2 max-w-2xl">
                    Permintaan pemesanan dari <strong class="text-charcoal">Ahmad Fauzi</strong> untuk ruangan
                    <strong class="text-charcoal">Main Exhibition Hall</strong>.
                </p>
            </div>
        </div>

        <!-- SECTION 1: TIMELINE -->
        <div
            class="reveal reveal-delay-1 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm relative overflow-hidden">
            <h2 class="font-headline font-bold text-lg text-charcoal mb-6 md:mb-8">Alur Persetujuan</h2>

            <div class="overflow-x-auto no-scrollbar -mx-4 px-4 md:mx-0 md:px-0">
                <div class="min-w-[600px] relative flex justify-between items-start pb-4">

                    <!-- Garis Background -->
                    <div class="absolute top-[15px] left-[16.66%] right-[16.66%] h-0.5 bg-charcoal/10 z-0"></div>
                    <!-- Garis Progress (diam di step 1) -->
                    <div
                        class="absolute top-[15px] left-[16.66%] w-0 h-0.5 bg-merah-jcc z-0 transition-all duration-1000">
                    </div>

                    <!-- Step 1: Permintaan Dikirim -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/3 gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-merah-jcc text-white flex items-center justify-center shrink-0 shadow-md ring-4 ring-white">
                            <span class="material-symbols-outlined text-[16px]">check</span>
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Dikirim</h4>
                            <span class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">10:45
                                AM</span>
                        </div>
                    </div>

                    <!-- Step 2: Review Admin Disporabudpar (Aktif) -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/3 gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-white border-2 border-merah-jcc flex items-center justify-center shrink-0 shadow-md ring-4 ring-white">
                            <span class="w-2.5 h-2.5 rounded-full bg-merah-jcc animate-pulse"></span>
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Review</h4>
                            <span class="text-[9px] font-bold text-amber-600 mt-1 block uppercase tracking-wide">Proses
                                Anda</span>
                        </div>
                    </div>

                    <!-- Step 3: Selesai -->
                    <div class="relative z-10 flex flex-col items-center text-center w-1/3 gap-3 opacity-50">
                        <div
                            class="w-8 h-8 rounded-full bg-[#FBF9F6] border-2 border-charcoal/15 flex items-center justify-center shrink-0 ring-4 ring-white">
                        </div>
                        <div class="px-2">
                            <h4 class="font-headline font-bold text-charcoal text-sm">Selesai</h4>
                            <span
                                class="text-[9px] font-bold text-secondary/50 mt-1 block uppercase tracking-wide">Menunggu</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SECTION 2: DETAIL GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <!-- KIRI: INFO PEMESANAN -->
            <div
                class="reveal reveal-delay-2 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-6 pb-6 border-b border-charcoal/5">
                        <div>
                            <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-1">ID Pemesanan
                            </p>
                            <h2 class="font-headline font-extrabold text-2xl text-charcoal">JCC-2026-0018</h2>
                        </div>
                        <div class="bg-charcoal/5 p-2 rounded-xl text-charcoal/50">
                            <span class="material-symbols-outlined">receipt_long</span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- Pemesan -->
                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-merah-jcc/5 text-merah-jcc flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">person</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Pemesan
                                </p>
                                <p class="font-headline font-bold text-base text-charcoal">Ahmad Fauzi</p>
                                <p class="text-xs text-secondary mt-0.5">fauzi@mail.com</p>
                            </div>
                        </div>

                        <!-- Ruangan -->
                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">meeting_room</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Ruangan
                                </p>
                                <p class="font-headline font-bold text-base text-charcoal">Main Exhibition Hall</p>
                                <p class="text-xs text-secondary mt-0.5">Kapasitas: 200 pax</p>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">calendar_today</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Tanggal &
                                    Waktu</p>
                                <p class="font-headline font-bold text-base text-charcoal">20 Sep 2026</p>
                                <p class="text-xs text-secondary mt-0.5">09:00 - 17:00 WIB</p>
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="flex gap-4">
                            <div
                                class="w-11 h-11 rounded-2xl bg-charcoal/5 text-charcoal/50 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined">notes</span>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-0.5">Keterangan
                                </p>
                                <p class="text-sm text-charcoal/80 leading-relaxed">Workshop komunitas kreatif dengan
                                    peserta sekitar 50 orang, perlu proyektor dan sound system.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: AKSI CHECKING -->
            <div class="flex flex-col gap-6">
                <!-- Card Aksi -->
                <div
                    class="reveal reveal-delay-3 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
                    <h2 class="font-headline font-bold text-lg text-charcoal mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-merah-jcc text-xl">gavel</span>
                        Keputusan Pemesanan
                    </h2>

                    <div class="space-y-4">
                        <!-- Catatan Admin -->
                        <div>
                            <label class="text-[9px] font-bold text-secondary/60 uppercase tracking-widest mb-2 block">Catatan
                                Admin</label>
                            <textarea rows="3" placeholder="Tambahkan catatan untuk pemesan..."
                                class="w-full border border-charcoal/10 rounded-2xl px-4 py-3 text-sm font-body text-charcoal placeholder:text-charcoal/30 focus:outline-none focus:border-merah-jcc focus:ring-2 focus:ring-merah-jcc/10 resize-none transition-all"></textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" id="btn-tolak"
                                class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border-2 border-red-500/20 text-red-600 bg-red-500/5 hover:bg-red-500/10 transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                                Tolak
                            </button>
                            <button type="button" id="btn-acc"
                                class="py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-emerald-600 text-broken-white shadow-lg shadow-emerald-600/25 hover:bg-emerald-700 transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[16px]">check</span>
                                ACC Pemesanan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Upload Surat Peminjaman (Placeholder) -->
                <div
                    class="reveal reveal-delay-4 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
                    <h2 class="font-headline font-bold text-lg text-charcoal mb-2 flex items-center gap-2">
                        <span class="material-symbols-outlined text-merah-jcc text-xl">upload_file</span>
                        Surat Peminjaman
                    </h2>
                    <p class="text-xs text-secondary mb-5">Upload surat peminjaman setelah ACC untuk dikirim ke pemesan.</p>

                    <!-- Upload Area -->
                    <div id="upload-area"
                        class="border-2 border-dashed border-charcoal/15 rounded-2xl p-8 text-center hover:border-merah-jcc/40 hover:bg-merah-jcc/5 transition-all cursor-pointer">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-14 h-14 rounded-2xl bg-charcoal/5 text-charcoal/30 flex items-center justify-center mb-3">
                                <span class="material-symbols-outlined text-2xl">cloud_upload</span>
                            </div>
                            <p class="font-headline font-bold text-xs text-charcoal/50 mb-1">Klik atau seret file ke
                                sini</p>
                            <p class="text-[10px] text-secondary/60">PDF, DOC, DOCX (Maks. 10MB)</p>
                        </div>
                        <input type="file" id="file-upload" class="hidden" accept=".pdf,.doc,.docx">
                    </div>

                    <!-- Uploaded File Preview (Hidden by default) -->
                    <div id="file-preview" class="hidden mt-4">
                        <div
                            class="flex items-center gap-3 bg-emerald-50 border border-emerald-500/20 rounded-xl px-4 py-3">
                            <span
                                class="material-symbols-outlined text-emerald-600 text-lg">description</span>
                            <div class="flex-1 min-w-0">
                                <p id="file-name" class="font-headline font-bold text-xs text-charcoal truncate"></p>
                                <p class="text-[10px] text-secondary">File siap dikirim</p>
                            </div>
                            <button type="button" id="file-remove"
                                class="text-red-400 hover:text-red-600 transition-colors p-1">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                            </button>
                        </div>
                    </div>

                    <!-- Status placeholder -->
                    <div id="upload-status" class="hidden mt-4">
                        <div
                            class="flex items-center gap-3 bg-charcoal/5 border border-charcoal/10 rounded-xl px-4 py-3">
                            <span class="material-symbols-outlined text-secondary/50 text-lg">info</span>
                            <p class="text-xs text-secondary">Surat akan dikirim setelah pemesanan di-ACC.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 3: DOKUMEN SURAT (Placeholder) -->
        <div
            class="reveal reveal-delay-5 bg-white border border-charcoal/10 rounded-[32px] p-6 md:p-8 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-headline font-bold text-lg text-charcoal flex items-center gap-2">
                    <span class="material-symbols-outlined text-merah-jcc text-xl">description</span>
                    Dokumen Surat Peminjaman
                </h2>
                <button
                    class="w-8 h-8 rounded-full hover:bg-charcoal/5 flex items-center justify-center text-charcoal/50 transition-colors"
                    title="Perbesar">
                    <span class="material-symbols-outlined text-[20px]">open_in_full</span>
                </button>
            </div>

            <div
                class="flex-1 rounded-[24px] overflow-hidden border border-charcoal/10 bg-cream-dark/50 min-h-[400px] relative shadow-inner flex flex-col items-center justify-center">
                <!-- Placeholder: Belum Upload -->
                <div id="surat-placeholder" class="text-center py-16 px-8">
                    <span
                        class="material-symbols-outlined text-6xl text-charcoal/10 mb-4 block">description</span>
                    <h3 class="font-headline font-bold text-base text-charcoal/40 mb-1">Belum Ada Surat</h3>
                    <p class="text-xs text-secondary/50 max-w-xs mx-auto">Upload surat peminjaman melalui tombol
                        di atas setelah pemesanan di-ACC.</p>
                </div>

                <!-- Placeholder: Sudah Upload (Hidden by default) -->
                <div id="surat-preview" class="hidden w-full h-full p-4">
                    <div
                        class="w-full h-full bg-white rounded-xl border border-charcoal/10 flex flex-col items-center justify-center">
                        <span class="material-symbols-outlined text-5xl text-emerald-500/30 mb-3">check_circle</span>
                        <p class="font-headline font-bold text-sm text-charcoal/60">Surat peminjaman siap</p>
                        <p class="text-[11px] text-secondary/50 mt-1">File telah di-upload dan siap dikirim</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 4: BANTUAN -->
        <div
            class="reveal reveal-delay-6 bg-gradient-to-r from-merah-jcc/5 to-rose-700/5 border border-merah-jcc/10 rounded-[24px] p-5 md:p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex gap-4 items-center">
                <div
                    class="w-12 h-12 rounded-2xl bg-white text-merah-jcc flex items-center justify-center shrink-0 shadow-sm border border-merah-jcc/10">
                    <span class="material-symbols-outlined text-xl">support_agent</span>
                </div>
                <div>
                    <h4 class="font-headline font-extrabold text-base text-charcoal">Butuh bantuan?</h4>
                    <p class="font-body text-xs text-secondary mt-0.5">Hubungi tim admin JCC jika ada kendala terkait
                        pemesanan ini.</p>
                </div>
            </div>
            <button
                class="w-full sm:w-auto border-2 border-merah-jcc/30 text-merah-jcc bg-white px-8 py-3 rounded-full font-headline font-bold text-xs shadow-sm hover:bg-merah-jcc hover:text-white transition-all shrink-0">
                Hubungi Bantuan
            </button>
        </div>
    </div>

    <!-- Modal Konfirmasi ACC -->
    <div id="acc-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div class="modal-backdrop absolute inset-0 bg-charcoal/60 backdrop-blur-sm"></div>
        <div class="modal-card relative w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="px-6 sm:px-8 py-7 sm:py-8 text-center">
                <div
                    class="w-16 h-16 mx-auto rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                </div>
                <h3 class="mt-4 font-headline font-bold text-lg text-charcoal">ACC Pemesanan?</h3>
                <p class="mt-1.5 text-sm text-secondary leading-relaxed">Pemesanan <strong>JCC-2026-0018</strong> akan
                    disetujui dan pemesan akan diberi tahu.</p>
            </div>
            <div class="grid grid-cols-2 gap-3 px-6 sm:px-8 pb-7 sm:pb-8">
                <button type="button" class="acc-cancel py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border border-charcoal/10 text-charcoal/60 hover:bg-charcoal/5 transition-colors">Batal</button>
                <button type="button" class="acc-confirm py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-emerald-600 text-broken-white shadow-lg shadow-emerald-600/25 hover:bg-emerald-700 transition-colors">Ya, ACC</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Tolak -->
    <div id="tolak-modal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
        <div class="modal-backdrop absolute inset-0 bg-charcoal/60 backdrop-blur-sm"></div>
        <div class="modal-card relative w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="px-6 sm:px-8 py-7 sm:py-8 text-center">
                <div
                    class="w-16 h-16 mx-auto rounded-full bg-red-500/10 text-red-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">cancel</span>
                </div>
                <h3 class="mt-4 font-headline font-bold text-lg text-charcoal">Tolak Pemesanan?</h3>
                <p class="mt-1.5 text-sm text-secondary leading-relaxed">Pemesanan <strong>JCC-2026-0018</strong> akan
                    ditolak. Pemesan akan diberi tahu.</p>
            </div>
            <div class="grid grid-cols-2 gap-3 px-6 sm:px-8 pb-7 sm:pb-8">
                <button type="button" class="tolak-cancel py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider border border-charcoal/10 text-charcoal/60 hover:bg-charcoal/5 transition-colors">Batal</button>
                <button type="button" class="tolak-confirm py-3 rounded-2xl font-headline font-bold text-xs uppercase tracking-wider bg-red-600 text-broken-white shadow-lg shadow-red-600/25 hover:bg-red-700 transition-colors">Ya, Tolak</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openModal = (id) => {
                const modal = document.getElementById(id);
                if (modal) {
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                }
            };
            const closeModal = (id) => {
                const modal = document.getElementById(id);
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            };

            // ACC Modal
            const accBtn = document.getElementById('btn-acc');
            const accModal = document.getElementById('acc-modal');
            if (accBtn && accModal) {
                accBtn.addEventListener('click', () => openModal('acc-modal'));
                accModal.querySelectorAll('.modal-backdrop, .acc-cancel').forEach(el => {
                    el.addEventListener('click', () => closeModal('acc-modal'));
                });
                accModal.querySelector('.acc-confirm').addEventListener('click', () => {
                    closeModal('acc-modal');
                    // Placeholder: update status UI
                    alert('Pemesanan berhasil di-ACC! (Placeholder)');
                });
            }

            // Tolak Modal
            const tolakBtn = document.getElementById('btn-tolak');
            const tolakModal = document.getElementById('tolak-modal');
            if (tolakBtn && tolakModal) {
                tolakBtn.addEventListener('click', () => openModal('tolak-modal'));
                tolakModal.querySelectorAll('.modal-backdrop, .tolak-cancel').forEach(el => {
                    el.addEventListener('click', () => closeModal('tolak-modal'));
                });
                tolakModal.querySelector('.tolak-confirm').addEventListener('click', () => {
                    closeModal('tolak-modal');
                    alert('Pemesanan ditolak. (Placeholder)');
                });
            }

            // File Upload
            const uploadArea = document.getElementById('upload-area');
            const fileInput = document.getElementById('file-upload');
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileRemove = document.getElementById('file-remove');
            const uploadStatus = document.getElementById('upload-status');

            if (uploadArea && fileInput) {
                uploadArea.addEventListener('click', () => fileInput.click());

                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.classList.add('border-merah-jcc', 'bg-merah-jcc/10');
                });
                uploadArea.addEventListener('dragleave', () => {
                    uploadArea.classList.remove('border-merah-jcc', 'bg-merah-jcc/10');
                });
                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.classList.remove('border-merah-jcc', 'bg-merah-jcc/10');
                    if (e.dataTransfer.files.length) handleFile(e.dataTransfer.files[0]);
                });

                fileInput.addEventListener('change', () => {
                    if (fileInput.files.length) handleFile(fileInput.files[0]);
                });

                const handleFile = (file) => {
                    const allowed = ['application/pdf', 'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    if (!allowed.includes(file.type) || file.size > 10 * 1024 * 1024) {
                        alert('File harus PDF/DOC/DOCX dan maks 10MB.');
                        return;
                    }
                    fileName.textContent = file.name;
                    uploadArea.classList.add('hidden');
                    filePreview.classList.remove('hidden');
                };

                if (fileRemove) {
                    fileRemove.addEventListener('click', () => {
                        fileInput.value = '';
                        filePreview.classList.add('hidden');
                        uploadArea.classList.remove('hidden');
                    });
                }
            }

            // Escape key closes modals
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeModal('acc-modal');
                    closeModal('tolak-modal');
                }
            });
        });
    </script>
@endsection