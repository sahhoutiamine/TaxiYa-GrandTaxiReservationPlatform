<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('home', compact('cities'));
    }

        public function searche(Request $R){
            $DepartCity = $R->departcity;
            $ArivaleCity = $R->arivalecity;

      
            $departureCity = City::where('name', $DepartCity)->first();
            $arrivalCity   = City::where('name', $ArivaleCity)->first();

            if (!$departureCity || !$arrivalCity) {
                return redirect()->back()->with('error', 'City not found');
            }

            $departureCityId = $departureCity->id;
            $arrivalCityId   = $arrivalCity->id;

            $result = Trip::where('departure_city_id', $departureCityId)
                        ->where('arrival_city_id', $arrivalCityId)
                        ->with(['departureCity', 'arrivalCity']) 
                        ->get();

            return view('home', compact('result'));
        }

}
