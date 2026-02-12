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
}
