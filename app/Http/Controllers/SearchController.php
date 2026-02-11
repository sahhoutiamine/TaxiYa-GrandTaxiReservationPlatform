<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('home', compact('cities'));
    }
    public function search(){
        $cities = City::all();
        return view('traveler.search', compact('cities'));
    }
}
