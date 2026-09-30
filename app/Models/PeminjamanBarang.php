<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBarang extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_barang';
    protected $primaryKey = 'id_peminjaman_barang';

    protected $fillable = [
        'start_time',
        'end_time',
        'barang_id_barang',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id_barang', 'id_barang');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjamanBarang::class, 'id_peminjaman_barang', 'id_peminjaman_barang');
    }
}