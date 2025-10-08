<?php

// database/migrations/xxxx_xx_xx_add_instructor_to_products.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('instructor_id')
                ->nullable()
                ->constrained('instructors')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
            $table->dropColumn('instructor_id');
        });
    }
};

