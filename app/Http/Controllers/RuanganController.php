<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuanganController extends Controller
{
    /**
     * Tampilkan halaman utama Manajemen Ruangan
     */
    public function index()
    {
        // Mengambil semua ruangan dari database, diurutkan dari yang terbaru
        $ruangans = Ruangan::latest()->get();
        
        // Mengarahkan ke file index.blade.php 
        return view('dashboard.manajemen-ruangan.index', compact('ruangans'));
    }

    /**
     * Tampilkan form Tambah Ruangan
     */
    public function create()
    {
        // Mengarahkan ke file create.blade.php
        return view('dashboard.manajemen-ruangan.create');
    }

    /**
     * Simpan data Ruangan baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan'      => 'required|string|max:200',
            'jenis_ruangan'     => 'required|string|max:50',
            'kapasitas_ruangan' => 'required|integer',
            'lokasi_ruangan'    => 'required|string|max:255',
            'luas_ruangan'      => 'required|integer',
            'tarif_sewa_ruangan' => 'required|integer',
            'deskripsi_ruangan' => 'nullable|string',
            'is_active'         => 'required|boolean',
            'gambar_ruangan'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        dd($request->file('gambar_ruangan'), $validated);

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar_ruangan')) {
            $validated['gambar_ruangan'] = $request->file('gambar_ruangan')->store('ruangan', 'public');
        }

        Ruangan::create($validated);

        return redirect()->route('ruangan.index')
                         ->with('success', 'Ruangan berhasil ditambahkan');
    }

    /**
     * Tampilkan form Edit Ruangan
     */
    public function edit($id_ruangan)
    {
        // Karena Primary Key bernama id_ruangan, kita gunakan findOrFail manual
        $ruangan = Ruangan::findOrFail($id_ruangan);
        
        // Mengarahkan ke file edit.blade.php
        return view('dashboard.manajemen-ruangan.edit', compact('ruangan'));
    }

    /**
     * Update data Ruangan di database
     */
    public function update(Request $request, $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);

        $validated = $request->validate([
            'nama_ruangan'      => 'required|string|max:200',
            'jenis_ruangan'     => 'required|string|max:50',
            'kapasitas_ruangan' => 'required|integer',
            'lokasi_ruangan'    => 'required|string|max:255',
            'luas_ruangan'      => 'required|integer',
            'tarif_sewa_ruangan' => 'required|integer',
            'deskripsi_ruangan' => 'nullable|string',
            'is_active'         => 'required|boolean',
            'gambar_ruangan'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Cek jika ada upload gambar baru
        if ($request->hasFile('gambar_ruangan')) {
            // Hapus gambar lama jika ada
            if ($ruangan->gambar_ruangan) {
                Storage::disk('public')->delete($ruangan->gambar_ruangan);
            }
            $validated['gambar_ruangan'] = $request->file('gambar_ruangan')->store('ruangan', 'public');
        }

        $ruangan->update($validated);

        return redirect()->route('ruangan.index')
                         ->with('success', 'Ruangan berhasil diperbarui');
    }

    /**
     * Hapus data Ruangan
     */
    public function destroy($id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);

        // Hapus file gambar fisik dari storage jika ada
        if ($ruangan->gambar_ruangan) {
            Storage::disk('public')->delete($ruangan->gambar_ruangan);
        }
        
        $ruangan->delete();

        return redirect()->route('ruangan.index')
                         ->with('success', 'Ruangan berhasil dihapus');
    }
}