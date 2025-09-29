<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('rating', 2, 1)->default(0)->after('lessons');
            $table->unsignedInteger('enrolled_count')->default(0)->after('rating');
            $table->string('welcome_video_url')->nullable()->after('enrolled_count');
            $table->string('overview_video_url')->nullable()->after('welcome_video_url');
            $table->json('core_concepts')->nullable()->after('overview_video_url');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'rating',
                'enrolled_count',
                'welcome_video_url',
                'overview_video_url',
                'core_concepts',
            ]);
        });
    }
};
