<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {

    }


    public function drivers()
    {

    }


    public function travelers()
    {

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
