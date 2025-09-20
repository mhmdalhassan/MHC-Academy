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
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); // prevent duplicates
        }
    }
}
