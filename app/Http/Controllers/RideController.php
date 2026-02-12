<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Trip;

class RideController extends Controller
{
    
     public function index(){
        $cities = City::all();
        return view('home', compact('cities'));
    }

        public function search(Request $R){
            $DepartCityId = $R->from;
            $ArrivalCityId = $R->to;

            $cities = City::all();
            
            $result = Trip::where('departure_city_id', $DepartCityId)
                        ->where('arrival_city_id', $ArrivalCityId)
                        ->with(['departureCity', 'arrivalCity']) 
                        ->get();


             foreach ($result as $trip) {
                $lat1 = $trip->departureCity->x;
                $lon1 = $trip->departureCity->y;
                $lat2 = $trip->arrivalCity->x;
                $lon2 = $trip->arrivalCity->y;
                $trip->distance = $this->mapobj->calculateDistance($lat1, $lon1, $lat2, $lon2);
            }            
            return view('driver.create-ride', compact('result', 'cities'));
        }
}
