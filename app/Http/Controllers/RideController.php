<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    /**
     * Show the form for creating a new ride.
     */
    public function create()
    {
        $driver = Auth::user();

        if (!$driver->verified && !$driver->approved_at) {
            return redirect()->route('driver.pending');
        }

        $cities = City::orderBy('name')->get();
        return view('driver.create-ride', compact('cities'));
    }

    /**
     * Store a newly created ride in storage.
     */
    public function store(Request $request)
    {
        $driver = Auth::user();

        if (!$driver->verified && !$driver->approved_at) {
            return redirect()->route('driver.pending');
        }

        $validated = $request->validate([
            'departure_city_id' => 'required|exists:cities,id',
            'arrival_city_id' => 'required|exists:cities,id|different:departure_city_id',
            'departure_date' => 'required|date|after:now',
            'price_per_seat' => 'required|numeric|min:0',
            'available_seats' => 'required|integer|min:1|max:8',
        ]);

        $departureCity = City::find($validated['departure_city_id']);
        $arrivalCity = City::find($validated['arrival_city_id']);

        $deltaX = $arrivalCity->x - $departureCity->x;
        $deltaY = $arrivalCity->y - $departureCity->y;
        $distance = sqrt(pow($deltaX, 2) + pow($deltaY, 2)) * 100;

        $minPrice = $distance * 0.4;
        $maxPrice = $distance * 2;

        if ($validated['price_per_seat'] < $minPrice || $validated['price_per_seat'] > $maxPrice) {
            return back()->withErrors(['price_per_seat' => "The price must be between " . number_format($minPrice, 2) . " and " . number_format($maxPrice, 2) . " MAD based on the distance ($distance km)."])->withInput();
        }

        Trip::create([
            'cheffeur_id' => $driver->id,
            'departure_city_id' => $validated['departure_city_id'],
            'arrival_city_id' => $validated['arrival_city_id'],
            'departure_date' => $validated['departure_date'],
            'price_per_seat' => $validated['price_per_seat'],
            'available_seats' => $validated['available_seats'],
            'status' => 'available',
        ]);

        return redirect()->route('driver.dashboard')->with('success', 'Your ride has been published successfully!');
    }

    /**
     * Cancel a ride.
     */
    public function cancel($id)
    {
        $trip = Trip::where('id', $id)
                    ->where('cheffeur_id', Auth::id())
                    ->firstOrFail();

        $trip->update(['status' => 'canceled']);

        return redirect()->route('driver.dashboard')->with('success', 'Your ride has been canceled.');
    }
}
