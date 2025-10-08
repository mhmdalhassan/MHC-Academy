<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->text('introduction')->nullable();
            $table->string('button1_name')->nullable();
            $table->string('button1_route')->nullable();
            $table->string('button2_name')->nullable();
            $table->string('button2_route')->nullable();
            $table->softDeletes(); // Soft delete
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
