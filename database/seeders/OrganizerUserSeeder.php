<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Organizer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrganizerUserSeeder extends Seeder
{
    public function run()
    {
        $organizerExists = Organizer::where('email', 'organizer@example.com')->exists();

        if (!$organizerExists) {
            // Create the first organizer
            $organizer = Organizer::create([
                'name' => 'User Organizer',
                'email' => 'organizer@example.com',
                'password' => Hash::make('organizer'),
                'contact_number' => '0785653425',
                'user_id' => 1,
            ]);

            // Create a corresponding user for the first organizer
            $user = $organizer->user()->create([
                'names' => $organizer->name,
                'email' => $organizer->email,
                'password' => $organizer->password,
                'role' => User::ROLE_ORGANIZER,
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
