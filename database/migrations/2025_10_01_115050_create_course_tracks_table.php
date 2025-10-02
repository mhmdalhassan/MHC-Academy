<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('introduction')->nullable();

            // JSON column for cards
            $table->json('cards')->nullable(); // Each card: image, name, image_icon, description

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_tracks');
    }
};
