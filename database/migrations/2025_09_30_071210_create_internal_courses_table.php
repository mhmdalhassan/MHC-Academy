<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('internal_courses', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->text('description')->nullable();
            $table->integer('students_enrolled')->default(0);
            $table->integer('expert_instructors')->default(0);
            $table->integer('projects_built')->default(0);
            $table->decimal('completion_rate', 5, 2)->default(0.00); // example: 85.50%
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internal_courses');
    }
};
