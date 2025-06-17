<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artikel_id',
    ];

    // Relasi: Favorite dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Favorite dimiliki oleh satu artikel
    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
