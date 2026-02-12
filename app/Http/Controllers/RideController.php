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
}
