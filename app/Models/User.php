<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tabel yang digunakan
    protected $table = 'users';

    // Kolom yang bisa diisi massal (mass assignable)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kolom yang harus disembunyikan ketika model dikonversi ke array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast tipe data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
