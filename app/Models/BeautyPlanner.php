<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeautyPlanner extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika tidak sesuai konvensi)
    protected $table = 'beauty_planners';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
    'user_id',
    'activity',
    'scheduled_at',
    'is_done',
];

protected $casts = [
    'scheduled_at' => 'date',
    'is_done' => 'boolean',
];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
