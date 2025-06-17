<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saved_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('artikel_id');
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('artikel_id')->references('id')->on('artikels')->onDelete('cascade');

            // Hindari duplikat simpanan
            $table->unique(['user_id', 'artikel_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_articles');
    }
};
