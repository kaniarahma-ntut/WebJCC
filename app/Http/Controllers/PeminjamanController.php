<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\PeminjamanRuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {

        // Only active rooms
        $ruangans = Ruangan::where('is_active', 1)->get();

        return view('jelajahi', compact('ruangans'));
    }

    public function create($id_ruangan)
    {
        $ruangan = Ruangan::where('is_active', 1)->findOrFail($id_ruangan);
        $barangs = Barang::where('is_active', 1)->get();

        return view('konfirmasi', compact('ruangan', 'barangs'));
    }

    /**
     * Save the booking (we'll fill this in later)
     */
    public function store(Request $request)
    {
    // 1. Validate
    $validated = $request->validate([
        'ruangan_id_ruangan' => 'required|exists:ruangan,id_ruangan',
        'tanggal'            => 'required|date_format:Y-m-d',
        'nama_event'         => 'required|string|max:100',
        'status_event'       => 'required|in:public,private',
        'link'               => 'nullable|url|max:500',
        'kapasitas'          => 'required|integer|min:1',
        'noHP_CP'            => 'required|string|max:15',
        'barang_ids'         => 'nullable|array',
        'barang_ids.*'       => 'exists:barang,id_barang',
    ]);

    // 2. Fetch the room (needed for price calc)
    $ruangan = Ruangan::findOrFail($validated['ruangan_id_ruangan']);

    // 3. Calculate duration + total
    $start = \Carbon\Carbon::parse($validated['tanggal'] . ' 09:00:00');
    $end   = \Carbon\Carbon::parse($validated['tanggal'] . ' 22:00:00');

    $totalHarga = $ruangan->tarif_sewa_ruangan;

    // 4. Save the room booking
    $booking = PeminjamanRuang::create([
        'nama_event'          => $validated['nama_event'],
        'status_event'        => $validated['status_event'],
        'link'                => $validated['link'] ?? null,
        'kapasitas'           => $validated['kapasitas'],
        'noHP_CP'             => $validated['noHP_CP'],
        'start_time'          => $start,
        'end_time'            => $end,
        'status_peminjaman'   => 'pending',
        'status_pembayaran'   => 'pending',
        'total_harga'         => $totalHarga,
        'user_id_user'        => Auth::id(),
        'ruangan_id_ruangan'  => $ruangan->id_ruangan,
    ]);

    // 5. Save items (if any)
    if (!empty($validated['barang_ids'])) {
        foreach ($validated['barang_ids'] as $barangId) {
            $barang = Barang::find($barangId);
            if (!$barang) continue;

            // Calculate item price for this booking duration
            $totalHarga += $barang->harga_sewa;

            // Create peminjaman_barang
            $itemBooking = \App\Models\PeminjamanBarang::create([
            'start_time'        => $start,
            'end_time'          => $end,
            'barang_id_barang'  => $barang->id_barang,
            ]);

            // Link them via detail_peminjaman_barang
            \App\Models\DetailPeminjamanBarang::create([
                'id_peminjaman_ruangan' => $booking->id_peminjaman_ruangan,
                'id_peminjaman_barang'  => $itemBooking->id_peminjaman_barang,
            ]);
        }

        // Update total if items were added
        $booking->update(['total_harga' => $totalHarga]);
    }

    // 6. Redirect to the detail page
    return redirect()
        ->route('riwayat-booking.detail', $booking->id_peminjaman_ruangan)
        ->with('success', 'Pemesanan berhasil dibuat!');
    }

    public function riwayat()
    {
        $bookings = PeminjamanRuang::with('ruangan')
            ->where('user_id_user', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.riwayat-booking.index', compact('bookings'));
    }

    public function detail($id)
    {
        $booking = PeminjamanRuang::with('ruangan')
            ->where('user_id_user', Auth::id())
            ->findOrFail($id);

        return view('dashboard.riwayat-booking.detail', compact('booking'));
    }
}
