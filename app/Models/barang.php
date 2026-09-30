<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'harga_sewa',
        'qr_barang',
        'deskripsi_barang',
        'gambar_barang',
        'keywords_barang',
        'is_active',
    ];

    protected $casts = [
        'harga_sewa' => 'integer',
        'is_active'=> 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }
}

