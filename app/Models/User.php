<?php

namespace App\Models;

use App\Traits\Hashidable; // Import Trait Hashid
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Hashidable; // Terapkan Hashidable

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Versi Laravel 11 menggunakan method casts() untuk casting.
     * Jika Anda di Laravel 10, gunakan properti protected $casts = [...];
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
