<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function dashboard()
    {
        $driver = Auth::user();

        if (!$driver->verified && !$driver->approved_at) {
            return redirect()->route('driver.pending');
        }

        // 1. Today's Rides: Trips scheduled for today
        // We use whereDate to match the date part of departure_date
        $todaysTrips = Trip::where('cheffeur_id', $driver->id)
                           ->whereDate('departure_date', Carbon::today())
                           ->with(['reservations' => function ($query) {
                               $query->where('status', 'confirmed');
                           }, 'departureCity', 'arrivalCity'])
                           ->get();

        $todaysRidesCount = $todaysTrips->count();

        // 2. Confirmed Seats: Count of reservations for today's trips
        // Total seats = Today's Rides * 6
        $confirmedSeatsCount = 0;
        $totalSeatsCapacity = $todaysRidesCount * 6;
        $todaysEarnings = 0;

        foreach ($todaysTrips as $trip) {
            // Updated to only count reservations where status is 'confirmed'
            $confirmedSeatsCount += $trip->reservations->count();
            
            // 3. Today's Earnings: Sum of total_price of reservations for today's trips
            $todaysEarnings += $trip->reservations->sum('total_price');
        }

        // 4. Total Rating: Using accessors from User model
        $averageRating = $driver->average_rating;
        $ratingsCount = $driver->ratings_count;

        // Formating the rating to 1 decimal place
        $formattedRating = number_format($averageRating, 1);

        // 5. Trips List: Dynamic list of trips (Active and Upcoming)
        // Let's get all future trips including today, ordered by date
        $trips = Trip::where('cheffeur_id', $driver->id)
                     ->whereDate('departure_date', '>=', Carbon::today())
                     ->orderBy('departure_date', 'asc')
                     ->with(['departureCity', 'arrivalCity', 'reservations' => function ($query) {
                         $query->where('status', 'confirmed');
                     }])
                     ->get();

        return view('driver.dashboard', compact(
            'driver',
            'todaysRidesCount',
            'confirmedSeatsCount',
            'totalSeatsCapacity',
            'todaysEarnings',
            'formattedRating',
            'ratingsCount',
            'trips'
        ));
    }
}
