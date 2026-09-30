<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $table = 'karya';

    protected $primaryKey = 'id_karya';

    protected $fillable = [
        'judul_karya',
        'kategori_karya',
        'deskripsi_karya',
        'foto_karya_1',
        'foto_karya_2',
        'foto_karya_3',
        'embed_video',
        'views_count',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }
}
