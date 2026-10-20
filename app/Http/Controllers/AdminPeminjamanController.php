<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanRuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPeminjamanController extends Controller
{
    public function __construct()
    {
        // Security guard: Hanya admin yang boleh lewat!
        if (!Auth::check() || !in_array(Auth::user()->admin_role, ['admin_JCC', 'admin_Disporabudpar'])) {
            abort(403, 'Akses ditolak.');
        }
    }

    public function index()
    {
        $bookings = PeminjamanRuang::with(['ruangan', 'user'])
            ->latest()
            ->paginate(15);

        $stats = [
            'pending'  => PeminjamanRuang::where('status_peminjaman', 'pending')->count(),
            'approved' => PeminjamanRuang::where('status_peminjaman', 'approved')->count(),
            'declined' => PeminjamanRuang::where('status_peminjaman', 'declined')->count(),
            'total'    => PeminjamanRuang::count(),
        ];

        return view('dashboard.terima-pemesanan.index', compact('bookings', 'stats'));
    }

    public function show($id)
    {
        $booking = PeminjamanRuang::with([
            'ruangan',
            'user',
            'detailPeminjamanBarang.peminjamanBarang.barang',
        ])->findOrFail($id);

        return view('dashboard.terima-pemesanan.detail', compact('booking'));
    }


    public function decline(Request $request, $id)
    {
        $booking = PeminjamanRuang::findOrFail($id);

        $booking->update([
            'status_peminjaman' => 'declined',
            'catatan_admin'     => $request->catatan_admin,
        ]);

        return back()->with('success', 'Pemesanan telah ditolak.');
    }

    public function uploadSurat(Request $request, $id)
    {
        $booking = PeminjamanRuang::findOrFail($id);

        $request->validate([
            'surat_peminjaman' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        if ($booking->surat_peminjaman && Storage::disk('public')->exists($booking->surat_peminjaman)) {
            Storage::disk('public')->delete($booking->surat_peminjaman);
        }

        $path = $request->file('surat_peminjaman')->store('surat-peminjaman', 'public');

        $booking->update(['surat_peminjaman' => $path]);

        return back()->with('success', 'Surat peminjaman berhasil diunggah.');
    }

    public function approve(Request $request, $id)
    {
        $booking = PeminjamanRuang::findOrFail($id);

        $updateData = [
            'status_peminjaman' => $request->status_peminjaman,
            'catatan_admin'     => $request->catatan_admin,
        ];

        if ($request->status_peminjaman === 'approved' && !$booking->batas_pembayaran) {
            $updateData['batas_pembayaran'] = now()->addHours(6); // <--- 6 Hour Timer
        }

        $booking->update($updateData);

        return back()->with('success', 'Status pemesanan berhasil diperbarui.');
    }
}