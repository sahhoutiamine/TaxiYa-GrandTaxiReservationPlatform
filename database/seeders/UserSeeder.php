<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@taxiya.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Chauffeurs
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Chauffeur $i",
                'email' => "driver$i@taxiya.com",
                'password' => bcrypt('password'),
                'role' => 'cheffeur',
                'license_number' => "LIC-$i-12345",
                'approved_at' => now(),
                'email_verified_at' => now(),
            ]);
        }

        // Voyageurs
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "Voyageur $i",
                'email' => "user$i@taxiya.com",
                'password' => bcrypt('password'),
                'role' => 'voyageur',
                'verified' => true,
                'email_verified_at' => now(),
            ]);
        }
    }
}
