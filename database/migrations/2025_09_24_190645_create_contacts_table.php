<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email'); // validation will handle email format
            $table->string('phone')->nullable(); // still string (better for numbers with +, country code, etc.)
            $table->string('category');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->softDeletes(); // 👈 adds deleted_at column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
