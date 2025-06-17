<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback'; // Nama tabel eksplisit jika tidak jamak

    protected $fillable = [
        'user_id',
        'jenis',
        'isi',
        'is_read',
    ];

    /**
     * Relasi: Feedback milik satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
