<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('home_statistics', function (Blueprint $table) {
            // Add new JSON column for cards
            $table->json('cards')->nullable()->after('introduction');

            // Remove old individual card columns
            $table->dropColumn(['card_number', 'card_name', 'card_description']);
        });
    }

    public function down(): void
    {
        Schema::table('home_statistics', function (Blueprint $table) {
            // Restore old columns
            $table->integer('card_number')->nullable()->after('introduction');
            $table->string('card_name')->nullable()->after('card_number');
            $table->text('card_description')->nullable()->after('card_name');

            // Drop JSON column
            $table->dropColumn('cards');
        });
    }
};
