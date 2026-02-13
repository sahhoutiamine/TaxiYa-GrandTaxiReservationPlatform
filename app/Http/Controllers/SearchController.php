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
        // Check if user is authenticated and is a driver
        if (auth()->check() && auth()->user()->isChauffeur()) {
            // Check if driver is verified
            if (auth()->user()->verified || auth()->user()->approved_at) {
                return redirect()->route('driver.dashboard');
            }
            return redirect()->route('driver.pending');
        }
        
        $cities = City::all();
        return view('home', compact('cities'));
    }

    public function showSearchPage(){
        $cities = City::all();
        $result = collect(); // Empty collection for initial page load
        return view('traveler.search', compact('cities', 'result'));
    }

        public function search(Request $R){
            $DepartCityId = $R->from;
            $ArrivalCityId = $R->to;
            $Date = $R->date;
            $distance;

               $cities = City::all();
            $result = Trip::where('departure_city_id', $DepartCityId)
                        ->where('arrival_city_id', $ArrivalCityId)
                        ->when($Date, function ($query, $Date) {
                            return $query->whereDate('departure_date', $Date);
                        })
                        ->with(['cheffeur.taxis', 'departureCity', 'arrivalCity']) 
                        ->withCount(['reservations' => function($query) {
                            $query->where('status', 'confirmed');
                        }])
                        ->get();

            return view('traveler.search', compact('result', 'cities'));

        }

}
