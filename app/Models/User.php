<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// #[Fillable(['name', 'email', 'password'])]
// #[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'username',
        'email',
        'password',
        'admin_role',
        'user_role',
        'subsektor_id_subsektor',
        'website',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function username(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Str::of($value)
                ->lower()              // Ubah jadi huruf kecil semua
                ->replace(' ', '')      // Hapus spasi
                ->toString(),
        );
    }

    public function subsektor()
    {
        return $this->belongsTo(Subsektor::class, 'subsektor_id_subsektor', 'id_subsektor');
    }
}
