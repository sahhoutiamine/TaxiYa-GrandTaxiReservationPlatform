<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard()
    {
    //   
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
     $travelers = User::where('role', 'voyageur')
                         ->withCount('voyageurTrips') 
                         ->orderBy('created_at', 'desc')
                         ->get();

     return view('admin.travelers', compact('travelers'));
    }


    public function rides()
    {
        $rides = Trip::with(['cheffeur', 'departureCity', 'arrivalCity'])
            ->withSum(['reservations' => function ($query) {
                $query->where('status', 'confirmed');
            }], 'seat')
            ->orderBy('departure_date', 'desc')
            ->get();

        return view('admin.rides', compact('rides'));
    }
}