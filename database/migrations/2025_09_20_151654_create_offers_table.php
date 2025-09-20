<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // store image path
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->decimal('old_price', 10, 2)->nullable(); // numeric with 2 decimals
            $table->decimal('new_price', 10, 2)->nullable();
            $table->timestamps();
            $table->softDeletes(); // optional if you want soft delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

