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

    $today = \Carbon\Carbon::today();
    $months = [
        ['value' => $today->format('Y-m'), 'label' => $today->translatedFormat('F Y')],
        ['value' => $today->copy()->addMonth()->format('Y-m'), 'label' => $today->copy()->addMonth()->translatedFormat('F Y')],
        ['value' => $today->copy()->addMonths(2)->format('Y-m'), 'label' => $today->copy()->addMonths(2)->translatedFormat('F Y')],
    ];

        return view('konfirmasi', compact('ruangan', 'barangs', 'months'));
    }

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
            'file_pendukung'     => 'required|file|mimes:pdf,doc,docx|max:5120',


        ]);

        $filePath = null;
        if ($request->hasFile('file_pendukung')) {
            $filePath = $request->file('file_pendukung')->store('file-pendukung', 'public');
        }

        // 2. Fetch the room FIRST
        $ruangan = Ruangan::findOrFail($validated['ruangan_id_ruangan']);
                // Handle file upload BEFORE creating the booking

        // 3. Calculate duration + total
        $start = \Carbon\Carbon::parse($validated['tanggal'] . ' 09:00:00');
        $end   = \Carbon\Carbon::parse($validated['tanggal'] . ' 22:00:00');

        $totalHarga = $ruangan->tarif_sewa_ruangan;

        $roomConflict = \App\Models\PeminjamanRuang::where('ruangan_id_ruangan', $ruangan->id_ruangan)
            ->whereIn('status_peminjaman', ['pending', 'approved'])
            ->where('start_time', '<', $end)
            ->where('end_time', '>', $start)
            ->exists();

        if ($roomConflict) {
            return back()->withErrors(['tanggal' => 'Maaf, ruangan ini sudah dibooking pada tanggal tersebut. Silakan pilih tanggal lain.']);
        }

        if (!empty($validated['barang_ids'])) {
            $itemConflict = \App\Models\PeminjamanBarang::whereIn('barang_id_barang', $validated['barang_ids'])
                ->whereHas('detailPeminjaman.peminjamanRuang', function ($query) {
                    $query->whereIn('status_peminjaman', ['pending', 'approved']);
                })
                ->where('start_time', '<', $end)
                ->where('end_time', '>', $start)
                ->exists();

            if ($itemConflict) {
                return back()->withErrors(['barang_ids' => 'Maaf, salah satu peralatan yang Anda pilih sudah dipinjam pada tanggal tersebut. Silakan pilih peralatan lain atau ganti tanggal.']);
            }
        }

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
            'file_pendukung'      => $filePath,
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
        $user = Auth::user();
        
        // Cek apakah user adalah admin
        $isAdmin = in_array($user->admin_role, ['admin_JCC', 'admin_Disporabudpar']);

        $query = PeminjamanRuang::with(['ruangan', 'user'])->latest();

        // Jika BUKAN admin, filter hanya milik dia sendiri
        if (!$isAdmin) {
            $query->where('user_id_user', $user->id_user);
        }

        $bookings = $query->get();

        return view('dashboard.riwayat-booking.index', compact('bookings'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $isAdmin = in_array($user->admin_role, ['admin_JCC', 'admin_Disporabudpar']);

        $query = PeminjamanRuang::with(['ruangan', 'user'])->where('id_peminjaman_ruangan', $id);

        // Jika BUKAN admin, pastikan dia tidak bisa mengintip ID booking orang lain
        if (!$isAdmin) {
            $query->where('user_id_user', $user->id_user);
        }

        $booking = $query->firstOrFail();

        return view('dashboard.riwayat-booking.detail', compact('booking'));
    }

    public function getAvailability(Request $request, $id)
    {
        // 1. Check Room Availability
        $bookedDates = \App\Models\PeminjamanRuang::where('ruangan_id_ruangan', $id)
            ->whereIn('status_peminjaman', ['pending', 'approved'])
            ->where('end_time', '>=', now())
            ->get()
            ->map(function ($booking) {
                return $booking->start_time->format('Y-m-d');
            })
            ->unique()
            ->values();

        // 2. Check Item (Barang) Availability for a specific date
        $bookedBarangIds = [];
        if ($request->has('date')) {
            $date = $request->query('date'); // e.g., "2026-10-15"

            $bookedBarangIds = \App\Models\PeminjamanBarang::whereDate('start_time', '<=', $date)
                ->whereDate('end_time', '>=', $date)
                ->whereHas('detailPeminjaman.peminjamanRuang', function ($query) {
                    $query->whereIn('status_peminjaman', ['pending', 'approved']);
                })
                ->pluck('barang_id_barang')
                ->unique()
                ->values();
        }

        // 3. Return everything as JSON
        return response()->json([
            'booked_dates' => $bookedDates,
            'booked_barang_ids' => $bookedBarangIds
        ]);
    }


    public function pay($id)
    {
        $booking = PeminjamanRuang::where('user_id_user', Auth::id())->findOrFail($id);


        if ($booking->batas_pembayaran && now()->greaterThan($booking->batas_pembayaran)) {
            // Optional: change status to failed automatically
            $booking->update(['status_pembayaran' => 'failed']);
            
            return response()->json([
                'error' => 'Waktu pembayaran telah habis (melebihi 6 jam). Silakan hubungi admin.'
            ], 403);
        }

        // 1. Configure Midtrans
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // 2. Prepare the transaction details
        // Midtrans requires a unique order_id. We'll prefix our booking ID.
        $orderId = 'JCC-' . $booking->id_peminjaman_ruangan . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $booking->total_harga, // Midtrans uses integer for IDR
            ],
            'customer_details' => [
                'first_name' => Auth::user()->nama_user,
                'email' => Auth::user()->email,
                'phone' => $booking->noHP_CP,
            ],
        ];

        try {
            // 3. Get Snap Token from Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // 4. Save the token so the frontend can use it
            $booking->update(['snap_token' => $snapToken]);

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function callback(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Midtrans Callback Hit!', $request->all());
        // 1. Verify the signature to ensure it's really from Midtrans
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 2. Extract the Booking ID from the Order ID
        // Our order ID format is: JCC-{id}-{timestamp}
        $orderIdParts = explode('-', $request->order_id);
        $bookingId = $orderIdParts[1] ?? null;

        $booking = PeminjamanRuang::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // 3. Update the payment status based on Midtrans transaction status
        $transactionStatus = $request->transaction_status;
        $fraudStatus = $request->fraud_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                $booking->update(['status_pembayaran' => 'completed']);
            }
        } elseif ($transactionStatus == 'settlement') {
            $booking->update(['status_pembayaran' => 'completed']);
        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            $booking->update(['status_pembayaran' => 'failed']);
        }

        // 4. Always return 200 OK so Midtrans stops retrying
        return response()->json(['message' => 'Callback received']);
    }
}
