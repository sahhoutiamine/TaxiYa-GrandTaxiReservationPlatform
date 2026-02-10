<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Taxi;
use Illuminate\Database\Seeder;

class TaxiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drivers = User::where('role', 'cheffeur')->get();
        
        foreach ($drivers as $driver) {
            Taxi::create([
                'user_id' => $driver->id,
                'matricule' => 'M-' . rand(1000, 9999) . '-A',
                'model' => 'Mercedes 240',
                'color' => 'Yellow',
                'car' => 'Sedan',
                'taxi_number' => rand(1, 100),
            ]);
        }
    }
}
