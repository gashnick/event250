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
            // Create an organizer
            $organizer = Organizer::create([
                'names' => 'User Organizer',
                'email' => 'organizer@example.com',
                'password' => Hash::make('organizer'),
                'contact_number' => '0785653425',
            ]);

            // Create a corresponding user
            $user = $organizer->user()->create([
                'names' => $organizer->names,
                'email' => $organizer->email,
                'password' => $organizer->password,
                'role' => User::ROLE_ORGANIZER,
                'remember_token' => Str::random(10),
            ]);

            $organizer->update(['userId' => $user->id]);
        }
    }
}
