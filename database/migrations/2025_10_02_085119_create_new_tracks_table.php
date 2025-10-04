<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('new_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('introduction')->nullable();
            $table->string('image')->nullable();
            $table->json('points')->nullable(); // store multiple points as JSON
            $table->timestamps();
            $table->softDeletes(); // adds deleted_at column
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('new_tracks');
    }
};
