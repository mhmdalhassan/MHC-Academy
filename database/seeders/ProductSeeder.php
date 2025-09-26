<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Full Stack Web Development',
                'price' => 299.99,
                'detail' => 'Learn to build complete web applications from scratch using modern technologies.',
                'category' => 'Web Development',
                'duration' => 60, // hours
                'difficulty' => 'Beginner',
                'lessons' => 45,
                'image' => 'full-stack-web-development.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Data Science Bootcamp',
                'price' => 399.99,
                'detail' => 'Master data analysis, visualization, and machine learning techniques.',
                'category' => 'Web Development',
                'duration' => 80,
                'difficulty' => 'Intermediate',
                'lessons' => 60,
                'image' => 'data-sc.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UI/UX Design Fundamentals',
                'price' => 199.99,
                'detail' => 'Learn the principles of user interface and user experience design.',
                'category' => 'Web Development',
                'duration' => 40,
                'difficulty' => 'Beginner',
                'lessons' => 30,
                'image' => 'ui-ux.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python Programming',
                'price' => 149.99,
                'detail' => 'Get started with Python programming for automation, web development, and data science.',
                'category' => 'Web Development',
                'duration' => 50,
                'difficulty' => 'Intermediate',
                'lessons' => 35,
                'image' => 'python.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
