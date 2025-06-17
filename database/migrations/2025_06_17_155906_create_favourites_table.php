<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('artikel_id');
            $table->timestamps();

            // Relasi ke tabel users dan artikels
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');

            // Supaya 1 user tidak bisa menyukai artikel yang sama dua kali
            $table->unique(['user_id', 'artikel_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
