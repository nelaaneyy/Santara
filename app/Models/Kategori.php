<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Nama tabel (karena bukan bentuk jamak)

    protected $fillable = [
        'nama_kategori',
        'user_id', // jika nanti kamu tambahkan relasi ke user
    ];

    // Relasi ke User (jika ada kolom user_id)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Artikel (jika kategori digunakan di tabel artikel)
    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }
}
