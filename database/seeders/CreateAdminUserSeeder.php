<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin user
        $user = User::firstOrCreate(
            ['email' => 'hassanawadk123@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('hassan242001'),
            ]
        );

        // Create Admin role
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Give Admin role all permissions
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        // Assign Admin role to user
        $user->assignRole([$role->id]);
    }
}
