<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@sportstore.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // Create Admin role
        $role = Role::firstOrCreate(['title' => 'Admin']);

        // Assign role to user
        UserRole::firstOrCreate([
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
    }
}
