<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjamanBarang extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman_barang';
    protected $primaryKey = 'id_detail_peminjaman';

    protected $fillable = [
        'id_peminjaman_ruangan',
        'id_peminjaman_barang',
    ];

    // Relasi ke Peminjaman Ruang (Induk Event)
    public function peminjamanRuang()
    {
        return $this->belongsTo(PeminjamanRuang::class, 'id_peminjaman_ruangan', 'id_peminjaman_ruangan');
    }

    // Relasi ke Peminjaman Barang (Detail itemnya)
    public function peminjamanBarang()
    {
        return $this->belongsTo(PeminjamanBarang::class, 'id_peminjaman_barang', 'id_peminjaman_barang');
    }
}