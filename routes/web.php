<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;



// Route::get('/', function () {
//     return view('home');
// })->name('home');

// });

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    function dummy_artikel()
    {
        return [
            ['id' => 1, 'judul' => 'Membangun Ekosistem Kreatif di Era Digital', 'kategori' => 'Inovasi', 'penulis' => 'Ahmad Fauzi', 'tanggal' => '2026-09-12', 'gambar' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop', 'isi' => 'Perkembangan teknologi digital membuka peluang besar bagi para kreator. Artikel ini membahas bagaimana komunitas kreatif dapat saling mendukung melalui ruang kolaborasi, berbagi sumber daya, dan memanfaatkan platform digital untuk memperluas jangkauan karya. Dari pembangunan minat generasi muda hingga kolaborasi lintas disiplin, ekosistem kreatif yang sehat adalah kunci pertumbuhan ekonomi kreatif di daerah.'],
            ['id' => 2, 'judul' => 'Tren UI/UX 2026: Glassmorphism Berpadu AI', 'kategori' => 'Desain', 'penulis' => 'Sarah Wijaya', 'tanggal' => '2026-09-08', 'gambar' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop', 'isi' => 'Glassmorphism kembali menjadi tren utama desain antarmuka tahun ini, kali ini berpadu dengan asisten AI yang membantu menyusun layout secara dinamis. Desainer dituntut menyeimbangkan estetika kaca transparan, hierarki visual yang jelas, dan aksesibilitas agar tetap ramah pengguna.'],
            ['id' => 3, 'judul' => 'Merangkul UMKM Lewat Platform Digital Fintech', 'kategori' => 'Teknologi', 'penulis' => 'Budi Santoso', 'tanggal' => '2026-08-28', 'gambar' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=800&auto=format&fit=crop', 'isi' => 'Platform fintech terbukti membantu UMKM mengakses pembiayaan dan pasar yang lebih luas. Kolaborasi antara pelaku usaha, pemerintah daerah, dan penyedia fintech menjadi kunci adopsi teknologi yang inklusif dan berkelanjutan.'],
            ['id' => 4, 'judul' => 'Pentingnya Ruang Berkumpul Untuk Dukungan Psikologis Kreator', 'kategori' => 'Komunitas', 'penulis' => 'Rina Marlina', 'tanggal' => '2026-08-20', 'gambar' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800&auto=format&fit=crop', 'isi' => 'Kesehatan mental kreator sering terabaikan di balik tuntutan produktivitas. Ruang berkumpul seperti komunitas JCC terbukti membantu melalui peer support, sesi berbagi, dan program pendampingan psikologis yang menyeimbangkan karya dan kesejahteraan.'],
            ['id' => 5, 'judul' => 'Pengembangan IoT untuk Sistem Evakuasi Bencana SEMAR', 'kategori' => 'Teknologi', 'penulis' => 'Dimas Prasetyo', 'tanggal' => '2026-08-15', 'gambar' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=800&auto=format&fit=crop', 'isi' => 'Internet of Things dimanfaatkan untuk membangun sistem evakuasi bencana yang cepat dan akurat. Sensor terdistribusi membaca kondisi lingkungan secara real-time, memberi peringatan dini, dan mengarahkan warga ke titik aman melalui aplikasi sederhana.'],
            ['id' => 6, 'judul' => 'Pendaftaran Jember Creative Week 2026 Telah Dibuka', 'kategori' => 'Komunitas', 'penulis' => 'Tim JCC', 'tanggal' => '2026-08-02', 'gambar' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800&auto=format&fit=crop', 'isi' => 'Jember Creative Week 2026 resmi dibuka. Selama satu pekan penuh akan digelar pameran karya, workshop publik, talkshow industri kreatif, hingga festival seni kolaboratif. Pendaftaran peserta, eksibitor, dan relawan kini dapat dilakukan melalui Google Form resmi.'],
        ];
    }

    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
    Route::get('/dashboard/profil', function () {
        return view('dashboard.profil');
    })->name('profil');
    Route::post('/dashboard/profil', function (Illuminate\Http\Request $request) {
        $user = Auth::user();
        $request->validate([
            'nama_user' => 'required|max:255',
            'username' => 'required|max:255|unique:user,username,' . $user->id_user . ',id_user',
            'email' => 'required|email|max:255|unique:user,email,' . $user->id_user . ',id_user',
            'website' => 'nullable|url|max:255',
            'password_sekarang' => 'nullable|required_with:password_baru',
            'password_baru' => 'nullable|min:8|confirmed',
        ], [], [
            'password_sekarang' => 'Password lama',
            'password_baru' => 'Password baru',
        ]);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->website = $request->website;

        if ($request->filled('password_baru')) {
            if (! Hash::check($request->password_sekarang, $user->password)) {
                return back()->withErrors(['password_sekarang' => 'Password lama yang kamu masukkan salah.'])->withInput();
            }
            $user->password = Hash::make($request->password_baru);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    })->name('profil.update');

    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/manajemen-ruangan',          [RuanganController::class, 'index'])  ->name('ruangan.index');
        Route::get('/manajemen-ruangan/tambah',   [RuanganController::class, 'create']) ->name('ruangan.create');
        Route::post('/manajemen-ruangan',         [RuanganController::class, 'store'])  ->name('ruangan.store');
        Route::get('/manajemen-ruangan/edit/{id_ruangan}', [RuanganController::class, 'edit'])   ->name('ruangan.edit');
        Route::put('/manajemen-ruangan/{id_ruangan}',      [RuanganController::class, 'update']) ->name('ruangan.update');
        Route::delete('/manajemen-ruangan/{id_ruangan}',   [RuanganController::class, 'destroy'])->name('ruangan.destroy');
    });


    Route::get('/dashboard/manajemen-pengguna', function () {
        $users = User::orderBy('id_user')->get();
        return view('dashboard.manajemen-pengguna.index', compact('users'));
    })->name('manajemen-pengguna');
    Route::get('/dashboard/manajemen-pengguna/tambah', function () {
        return view('dashboard.manajemen-pengguna.create');
    })->name('manajemen-pengguna.create');
    Route::post('/dashboard/manajemen-pengguna', function (Illuminate\Http\Request $request) {
        $data = $request->validate([
            'nama_user' => 'required|max:255',
            'username' => 'required|max:20|unique:user,username',
            'email' => 'required|email|max:100|unique:user,email',
            'role_user' => 'required|in:user,creator,admin_JCC,admin_Disporabudpar',
            'website' => 'nullable|max:255',
            'password' => 'required|min:6',
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/dashboard/manajemen-pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    })->name('manajemen-pengguna.store');
    Route::get('/dashboard/manajemen-pengguna/edit/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('dashboard.manajemen-pengguna.edit', compact('user'));
    })->name('manajemen-pengguna.edit');
    Route::put('/dashboard/manajemen-pengguna/{id}', function (Illuminate\Http\Request $request, $id) {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'nama_user' => 'required|max:255',
            'username' => 'required|max:20|unique:user,username,' . $id . ',id_user',
            'email' => 'required|email|max:100|unique:user,email,' . $id . ',id_user',
            'role_user' => 'required|in:user,creator,admin_JCC,admin_Disporabudpar',
            'website' => 'nullable|max:255',
            'password' => 'nullable|min:6',
        ]);
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect('/dashboard/manajemen-pengguna')->with('success', 'Pengguna berhasil diperbarui.');
    })->name('manajemen-pengguna.update');
    Route::delete('/dashboard/manajemen-pengguna/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return redirect('/dashboard/manajemen-pengguna')->with('success', 'Pengguna berhasil dihapus.');
    })->name('manajemen-pengguna.destroy');

    Route::get('/dashboard/manajemen-artikel', function () {
        return view('dashboard.manajemen-artikel.index', ['artikels' => dummy_artikel()]);
    })->name('manajemen-artikel');
    Route::get('/dashboard/manajemen-artikel/tambah', function () {
        return view('dashboard.manajemen-artikel.create');
    })->name('manajemen-artikel.create');
    Route::post('/dashboard/manajemen-artikel', function (Illuminate\Http\Request $request) {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'penulis' => 'required|max:255',
            'isi' => 'required',
        ]);
        return redirect('/dashboard/manajemen-artikel')->with('success', 'Artikel berhasil ditambahkan.');
    })->name('manajemen-artikel.store');
    Route::get('/dashboard/manajemen-artikel/{id}', function ($id) {
        $artikel = collect(dummy_artikel())->firstWhere('id', (int) $id);
        return view('dashboard.manajemen-artikel.detail', compact('artikel'));
    })->name('manajemen-artikel.detail');
    Route::get('/dashboard/manajemen-artikel/edit/{id}', function ($id) {
        $artikel = collect(dummy_artikel())->firstWhere('id', (int) $id);
        return view('dashboard.manajemen-artikel.edit', compact('artikel'));
    })->name('manajemen-artikel.edit');
    Route::put('/dashboard/manajemen-artikel/{id}', function (Illuminate\Http\Request $request, $id) {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'penulis' => 'required|max:255',
            'isi' => 'required',
        ]);
        return redirect('/dashboard/manajemen-artikel')->with('success', 'Artikel berhasil diperbarui.');
    })->name('manajemen-artikel.update');
    Route::delete('/dashboard/manajemen-artikel/{id}', function ($id) {
        return redirect('/dashboard/manajemen-artikel')->with('success', 'Artikel berhasil dihapus.');
    })->name('manajemen-artikel.destroy');

    function dummy_event()
    {
        return [
            ['id' => 1, 'judul' => 'Masterclass UI/UX: Desain Inklusif', 'kategori' => 'Workshop', 'tanggal' => '2026-09-12', 'jam_mulai' => '13:00', 'jam_selesai' => '16:00', 'lokasi' => 'Main Auditorium', 'harga' => 'Gratis', 'gambar' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?q=80&w=800&auto=format&fit=crop', 'deskripsi' => 'Pelajari cara merancang antarmuka yang ramah bagi semua pengguna bersama Lead Designer dari Tokopedia. Cocok untuk desainer junior maupun senior yang ingin memperdalam praktik desain inklusif.'],
            ['id' => 2, 'judul' => 'Pameran Seni Digital "Nusantara"', 'kategori' => 'Pameran', 'tanggal' => '2026-09-20', 'jam_mulai' => '10:00', 'jam_selesai' => '17:00', 'lokasi' => 'Exhibition Hall', 'harga' => 'Rp 25.000', 'gambar' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=800&auto=format&fit=crop', 'deskripsi' => 'Pameran karya seni digital yang menampilkan karya 30 kreator lokal Jember dengan tema nusantara, dilengkapi sesi diskusi kurator.'],
            ['id' => 3, 'judul' => 'Founders Mixer: Pitching Day', 'kategori' => 'Networking', 'tanggal' => '2026-09-25', 'jam_mulai' => '18:30', 'jam_selesai' => '21:00', 'lokasi' => 'Meeting Room Glass', 'harga' => 'Gratis', 'gambar' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=800&auto=format&fit=crop', 'deskripsi' => 'Acara networking bagi founder dan calon investor untuk saling mengenal melalui sesi pitching singkat, diskusi panel, dan kesempatan kolaborasi.'],
            ['id' => 4, 'judul' => 'Kelas Fotografi Produk & Studio', 'kategori' => 'Workshop', 'tanggal' => '2026-10-03', 'jam_mulai' => '09:00', 'jam_selesai' => '12:00', 'lokasi' => 'Studio Foto & Visual', 'harga' => 'Rp 150.000', 'gambar' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&auto=format&fit=crop', 'deskripsi' => 'Kelas praktis teknik fotografi produk menggunakan lighting 3 point, properti, dan retouching dasar untuk marketplace.'],
            ['id' => 5, 'judul' => 'Talkshow Ekonomi Kreatif Jember', 'kategori' => 'Talkshow', 'tanggal' => '2026-10-10', 'jam_mulai' => '15:00', 'jam_selesai' => '18:00', 'lokasi' => 'Aula Kreatif Utama', 'harga' => 'Gratis', 'gambar' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=800&auto=format&fit=crop', 'deskripsi' => 'Diskusi panel bersama pelaku industri kreatif dan pemerintah daerah tentang masa depan ekonomi kreatif di Jember.'],
        ];
    }

    Route::get('/dashboard/manajemen-event', function () {
        return view('dashboard.manajemen-event.index', ['events' => dummy_event()]);
    })->name('manajemen-event');
    Route::get('/dashboard/manajemen-event/tambah', function () {
        return view('dashboard.manajemen-event.create', ['event' => null]);
    })->name('manajemen-event.create');
    Route::post('/dashboard/manajemen-event', function (Illuminate\Http\Request $request) {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        return redirect('/dashboard/manajemen-event')->with('success', 'Event berhasil ditambahkan.');
    })->name('manajemen-event.store');
    Route::get('/dashboard/manajemen-event/{id}', function ($id) {
        $event = collect(dummy_event())->firstWhere('id', (int) $id);
        return view('dashboard.manajemen-event.detail', compact('event'));
    })->name('manajemen-event.detail');
    Route::get('/dashboard/manajemen-event/{id}/edit', function ($id) {
        $event = collect(dummy_event())->firstWhere('id', (int) $id);
        return view('dashboard.manajemen-event.edit', compact('event'));
    })->name('manajemen-event.edit');
    Route::put('/dashboard/manajemen-event/{id}', function (Illuminate\Http\Request $request, $id) {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        return redirect('/dashboard/manajemen-event')->with('success', 'Event berhasil diperbarui.');
    })->name('manajemen-event.update');
    Route::delete('/dashboard/manajemen-event/{id}', function ($id) {
        return redirect('/dashboard/manajemen-event')->with('success', 'Event berhasil dihapus.');
    })->name('manajemen-event.destroy');
    Route::get('/dashboard/riwayat-booking', function () {
        return view('dashboard.riwayat-booking.index');
    })->name('riwayat-booking');
    Route::get('/dashboard/riwayat-booking/detail', function () {
        return view('dashboard.riwayat-booking.detail');
    })->name('riwayat-booking.detail');
    Route::get('/dashboard/terima-pemesanan', function () {
        return view('dashboard.terima-pemesanan.index');
    })->name('terima-pemesanan');
    Route::get('/dashboard/terima-pemesanan/detail', function () {
        return view('dashboard.terima-pemesanan.detail');
    })->name('terima-pemesanan.detail');
});

Route::get('/jelajahi', function () {
    return view('jelajahi');
});
Route::get('/konfirmasi', function () {
    return view('konfirmasi');
});
Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/artikel/detail-artikel', function () {
    return view('detail-artikel');
});
Route::get('/event/detail-event', function () {
    return view('detail-event');
});


require __DIR__ . '/auth.php';
