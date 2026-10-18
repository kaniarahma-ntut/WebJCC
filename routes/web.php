<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BarangController;


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


    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/manajemen-barang',          [BarangController::class, 'index'])  ->name('barang.index');
        Route::get('/manajemen-barang/tambah',   [BarangController::class, 'create']) ->name('barang.create');
        Route::post('/manajemen-barang',         [BarangController::class, 'store'])  ->name('barang.store');
        Route::get('/manajemen-barang/edit/{id_barang}', [BarangController::class, 'edit'])   ->name('barang.edit');
        Route::put('/manajemen-barang/{id_barang}',      [BarangController::class, 'update']) ->name('barang.update');
        Route::delete('/manajemen-barang/{id_barang}',   [BarangController::class, 'destroy'])->name('barang.destroy');
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
            'admin_role' => 'required|in:none,admin_JCC,admin_Disporabudpar',
            'user_role' => 'required|in:user,komunitas,talent,tenant',
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
            'admin_role' => 'required|in:none,admin_JCC,admin_Disporabudpar',
            'user_role' => 'required|in:user,komunitas,talent,tenant',
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

    
    Route::get('/konfirmasi/{id_ruangan}', [PeminjamanController::class, 'create'])->name('konfirmasi');
    
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    
    Route::get('/api/ruangan/{id}/availability', [PeminjamanController::class, 'getAvailability'])
    ->name('api.ruangan.availability');
    
    Route::get('/dashboard/riwayat-booking', [PeminjamanController::class, 'riwayat'])
        ->name('riwayat-booking.index');

    Route::get('/dashboard/riwayat-booking/{id}', [PeminjamanController::class, 'detail'])
        ->name('riwayat-booking.detail');

    Route::get('/dashboard/terima-pemesanan', function () {
        return view('dashboard.terima-pemesanan.index');
    })->name('terima-pemesanan');

    Route::get('/dashboard/terima-pemesanan/detail', function () {
        return view('dashboard.terima-pemesanan.detail');
    })->name('terima-pemesanan.detail');
});

Route::get('/jelajahi', [PeminjamanController::class, 'index'])->name('jelajahi');


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
