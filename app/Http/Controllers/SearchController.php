<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Trip;
use App\Service\MapService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $mapobj;

        public function __construct() {
            $this->mapobj = new MapService();
        }


    public function index(){
        $cities = City::all();
        return view('home', compact('cities'));
    }

        public function search(Request $R){
            $DepartCityId = $R->from;
            $ArrivalCityId = $R->to;
            $distance;

               $cities = City::all();
            $result = Trip::where('departure_city_id', $DepartCityId)
                        ->where('arrival_city_id', $ArrivalCityId)
                        ->with(['cheffeur.taxis', 'departureCity', 'arrivalCity']) 
                        ->get();

            foreach ($result as $trip) {
                $lat1 = $trip->departureCity->x;
                $lon1 = $trip->departureCity->y;
                $lat2 = $trip->arrivalCity->x;
                $lon2 = $trip->arrivalCity->y;

            
                $trip->distance = $this->mapobj->calculateDistance($lat1, $lon1, $lat2, $lon2);
            }

            return view('traveler.search', compact('result', 'cities'));

        }

}
