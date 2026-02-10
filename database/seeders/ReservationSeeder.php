<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voyageurs = User::where('role', 'voyageur')->get();
        $trips = Trip::all();

        if ($trips->isEmpty()) return;

        foreach ($voyageurs as $user) {
            $trip = $trips->random();
            $seats = rand(1, 4);
            Reservation::create([
                'trip_id' => $trip->id,
                'user_id' => $user->id,
                'seat' => $seats,
                'status' => 'confirmed',
                'total_price' => $trip->price_per_seat * $seats,
            ]);
        }
    }
}
