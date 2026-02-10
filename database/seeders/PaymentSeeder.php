<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = Reservation::where('status', 'confirmed')->get();

        foreach ($reservations as $reservation) {
            Payment::create([
                'reservation_id' => $reservation->id,
                'amount' => $reservation->total_price,
                'status' => 'completed',
                'transaction_id' => 'TXN-' . Str::random(10),
                'paid_at' => now(),
            ]);
        }
    }
}
