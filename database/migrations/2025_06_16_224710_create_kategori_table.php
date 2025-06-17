<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke tabel users
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
