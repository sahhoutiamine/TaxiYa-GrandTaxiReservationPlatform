<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Trip;
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
    $travelers = Trip::with('cheffeur')->get();
     return view('admin.rides', compact('travelers'));   
    }

   
    public function travelers()
    {
   
//
       
    }

    public function rides()
    {
       
    }
}
