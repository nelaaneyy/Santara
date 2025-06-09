<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; // Make sure this is correct

class BeautyPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}