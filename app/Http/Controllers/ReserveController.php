<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Trip;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public function index($id)
    {
        $trip = Trip::with(['departureCity', 'arrivalCity'])->findOrFail($id);

        $takenSeats = Reservation::where('trip_id', $id)
            ->where('status', 'confirmed')
            ->pluck('seat')
            ->toArray();

        $deltaX = $trip->arrivalCity->x - $trip->departureCity->x;
        $deltaY = $trip->arrivalCity->y - $trip->departureCity->y;
        $distance = sqrt(pow($deltaX, 2) + pow($deltaY, 2)) * 100;

        $durationHours = $distance / 60;
        $departureDate = Carbon::parse($trip->departure_date);
        $arrivalDate = $departureDate->copy()->addHours($durationHours);

        return view('traveler.confirm', [
            'trip' => $trip,
            'takenSeats' => $takenSeats,
            'distance' => round($distance),
            'departureDate' => $departureDate,
            'arrivalDate' => $arrivalDate
        ]);
    }

    public function store(Request $request, $id)
    {
        // 1. Validate Input
        $request->validate([
            'seat_number' => 'required|integer|between:1,6',
            'cardholder_name' => 'required|string',
        ]);

        $isTaken = Reservation::where('trip_id', $id)
            ->where('seat', $request->seat_number)
            ->where('status', 'confirmed')
            ->exists();

        if ($isTaken) {
            return back()->with('error', 'Sorry! That seat was just booked by another user.');
        }

        $trip = Trip::findOrFail($id);
        $price = ($request->seat_number == 1)
            ? $trip->price_per_seat * 1.20
            : $trip->price_per_seat;

        $reservation = Reservation::create([
            'trip_id' => $id,
            'user_id' => auth()->id(),
            'seat' => $request->seat_number,
            'status' => 'confirmed',
            'total_price' => $price
        ]);

        \App\Models\Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $price,
            'status' => 'paid',
            'transaction_id' => 'TXN_' . strtoupper(uniqid()),
            'paid_at' => now(),
        ]);

        // 6. Redirect to Ticket
        return redirect()->route('mybookings');
    }
}
