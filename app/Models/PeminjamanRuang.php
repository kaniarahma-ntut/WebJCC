<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuang extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_ruang';
    protected $primaryKey = 'id_peminjaman_ruangan';

    protected $fillable = [
        'nama_event',
        'status_event',
        'link',
        'kapasitas',
        'noHP_CP',
        'start_time',
        'end_time',
        'status_peminjaman',
        'status_pembayaran',
        'catatan_admin',
        'surat_peminjaman',  
        'total_harga',
        'user_id_user',
        'ruangan_id_ruangan',
    ];

    protected $casts = [
        'kapasitas'  => 'integer',
        'start_time' => 'datetime',
        'end_time'   => 'datetime',
    ];

    // Relasi ke User (Siapa yang meminjam)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }

    // Relasi ke Ruangan (Ruang apa yang dipinjam)
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id_ruangan', 'id_ruangan');
    }

    // Relasi ke Detail Peminjaman Barang (Barang apa saja yang dipinjam untuk acara ini)
    public function detailPeminjamanBarang()
    {
        return $this->hasMany(DetailPeminjamanBarang::class, 'id_peminjaman_ruangan', 'id_peminjaman_ruangan');
    }
}