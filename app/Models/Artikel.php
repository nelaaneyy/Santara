<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'nama_pembuat',
        'foto',
        'user_id',
        'kategori_id',
    ];

    // Relasi ke user (penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function favourite()
{
    return $this->hasMany(Favorite::class);
}
public function savedArticle()
{
    return $this->hasMany(SavedArticle::class);
}
}

