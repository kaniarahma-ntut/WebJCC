<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsektor extends Model
{
    use HasFactory;

    protected $table = 'subsektor';

    protected $primaryKey = 'id_subsektor';

    protected $fillable = [
        'nama_subsektor',
    ];

}