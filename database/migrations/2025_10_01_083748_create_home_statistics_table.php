<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('introduction')->nullable();

            // card fields
            $table->integer('card_number')->nullable();
            $table->string('card_name')->nullable();
            $table->text('card_description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_statistics');
    }
};
