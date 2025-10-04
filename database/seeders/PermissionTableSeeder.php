<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Roles

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            // Users
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            // Products
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',

            // Blogs
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',

            // Features
            'feature-list',
            'feature-create',
            'feature-edit',
            'feature-delete',

            // request
            'request-list',

            // Internal Courses
            'internal-course-list',
            'internal-course-create',
            'internal-course-edit',
            'internal-course-delete',

            // Footer
            'footer-list',
            'footer-create',
            'footer-edit',
            'footer-delete',


            // Instructors
            'instructor-list',
            'instructor-create',
            'instructor-edit',
            'instructor-delete',

            // students
            'student-review-list',
            'student-review-create',
            'student-review-edit',
            'student-review-delete',

            // Hero Section
            'hero-section-list',
            'hero-section-create',
            'hero-section-edit',
            'hero-section-delete',

            // Statistics Home Section
            'home-statistic-list',
            'home-statistic-create',
            'home-statistic-edit',
            'home-statistic-delete',

            // Statistics Home Section
            'home-statistic-list',
            'home-statistic-create',
            'home-statistic-edit',
            'home-statistic-delete',

            // Course Tracks Section
            'course-track-list',
            'course-track-create',
            'course-track-edit',
            'course-track-delete',


            // New Tracks Section
            'new-track-list',
            'new-track-create',
            'new-track-edit',
            'new-track-delete',



        ];


        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); // prevent duplicates
        }
    }
}
