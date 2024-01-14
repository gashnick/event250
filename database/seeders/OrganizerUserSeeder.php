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
            $organizer1 = Organizer::create([
                'names' => 'User Organizer',
                'email' => 'organizer@example.com',
                'password' => Hash::make('organizer'),
                'contact_number' => '0785653425',
            ]);

            // Create a corresponding user for the first organizer
            $user1 = $organizer1->user()->create([
                'names' => $organizer1->names,
                'email' => $organizer1->email,
                'password' => $organizer1->password,
                'role' => User::ROLE_ORGANIZER,
                'remember_token' => Str::random(10),
            ]);

            //$organizer1->update(['userId' => $user1->id]);

            // Create the second organizer
            $organizer2 = Organizer::create([
                'names' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('organizer'),
                'contact_number' => '0785653425',
            ]);

            // Create a corresponding user for the second organizer
            $user2 = $organizer2->user()->create([
                'names' => $organizer2->names,
                'email' => $organizer2->email,
                'password' => $organizer2->password,
                'role' => User::ROLE_ORGANIZER,
                'remember_token' => Str::random(10),
            ]);

            // $organizer2->update(['userId' => $user2->id]);
        }
    }
}
