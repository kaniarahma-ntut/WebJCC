<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';

    protected $primaryKey = 'id_ruangan';

    protected $fillable = [
        'nama_ruangan',
        'kapasitas_ruangan',
        'deskripsi_ruangan',
        'gambar_ruangan',
        'lokasi_ruangan',
        'luas_ruangan',
        'is_active',
    ];

    protected $casts = [
        'kapasitas_ruangan' => 'integer',
        'luas_ruangan' => 'integer',
        'is_active'         => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('is_active', true);
    }
}