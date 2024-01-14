<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $adminExists = User::where('email', 'admin@example.com')->exists();

        if (!$adminExists) {
            User::create([
                'names' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('adminadmin'),
                'role' => User::ROLE_ADMIN,
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
