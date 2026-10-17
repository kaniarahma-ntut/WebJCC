<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        // Order by latest so new items appear first
        $barangs = Barang::latest()->get();
        return view('dashboard.manajemen-barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('dashboard.manajemen-barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'      => 'required|string|max:255',
            'jenis_barang'     => 'required|string|max:100',
            'harga_sewa'       => 'required|integer|min:0',
            'deskripsi_barang' => 'nullable|string',
            'keywords_barang'  => 'nullable|string|max:50',
            'is_active'        => 'required|boolean',
            'gambar_barang'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar_barang')) {
            $validated['gambar_barang'] = $request->file('gambar_barang')->store('barang', 'public');
        }

        Barang::create($validated);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        return view('dashboard.manajemen-barang.edit', compact('barang'));
    }

    public function update(Request $request, $id_barang)
    {
        $barang = Barang::findOrFail($id_barang);

        $validated = $request->validate([
            'nama_barang'      => 'required|string|max:255',
            'jenis_barang'     => 'required|string|max:100',
            'harga_sewa'       => 'required|integer|min:0',
            'deskripsi_barang' => 'nullable|string',
            'keywords_barang'  => 'nullable|string|max:50',
            'is_active'        => 'required|boolean',
            'gambar_barang'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar_barang')) {
            if ($barang->gambar_barang) {
                Storage::disk('public')->delete($barang->gambar_barang);
            }
            $validated['gambar_barang'] = $request->file('gambar_barang')->store('barang', 'public');
        }

        $barang->update($validated);

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);

        if ($barang->gambar_barang) {
            Storage::disk('public')->delete($barang->gambar_barang);
        }
        
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus');
    }
}