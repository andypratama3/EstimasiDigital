<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Data user default
        $userData = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@superadmin.com',
                'password' => bcrypt('superadmin'),
            ],
        ];

        foreach ($userData as $data) {
            // Cek apakah user sudah ada
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => $data['password'],
                ]
            );

            $role = Role::where('name', 'superadmin')->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
