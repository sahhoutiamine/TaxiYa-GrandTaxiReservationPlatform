<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function drivers()
    {
        $drivers = User::where('role', 'cheffeur')
            ->withCount('trips') 
            ->with('Taxis')
            ->latest()
            ->get()
            ->map(function ($driver) {

              
                $tripIds = Trip::where('cheffeur_id', $driver->id)->pluck('id');

              
                $driver->earnings = Reservation::whereIn('trip_id', $tripIds)
                    ->where('status', 'confirmed')
                    ->sum('total_price');

                   $driver->total_reservations = Reservation::whereIn('trip_id', $tripIds)
                    ->where('status', 'confirmed')
                    ->count();

                return $driver;
            });

        return view('admin.drivers', compact('drivers'));
    }

    public function travelers()
    {
        // return view('admin.travelers');
    }

    public function rides()
    {
        // return view('admin.rides');
    }
}
