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

    public function search(Request $request)
    {
        $cities = City::all();
        $query = Trip::query();

        // Basic Search Filters
        if ($request->filled('from')) {
            $query->where('departure_city_id', $request->from);
        }
        if ($request->filled('to')) {
            $query->where('arrival_city_id', $request->to);
        }
        if ($request->filled('date')) {
            $query->whereDate('departure_date', $request->date);
        }

        // Time Filters
        if ($request->filled('time_filter')) {
            $query->where(function ($q) use ($request) {
                $filters = (array) $request->time_filter;
                foreach ($filters as $filter) {
                    if ($filter === 'morning') {
                        $q->orWhereRaw('HOUR(departure_date) < 12');
                    } elseif ($filter === 'afternoon') {
                        $q->orWhereRaw('HOUR(departure_date) >= 12 AND HOUR(departure_date) < 18');
                    } elseif ($filter === 'evening') {
                        $q->orWhereRaw('HOUR(departure_date) >= 18');
                    }
                }
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'earliest');
        switch ($sortBy) {
            case 'lowest_price':
                $query->orderBy('price_per_seat', 'asc');
                break;
            case 'seats':
                $query->orderBy('available_seats', 'desc'); // Note: This might need custom logic if available_seats is an accessor
                break;
            case 'earliest':
            default:
                $query->orderBy('departure_date', 'asc');
                break;
        }

        // Available seats calculation is usually an accessor, so for 'seats' sorting
        // we might need to be careful. However, let's assume we can sort by the column if it exists.
        // If it's dynamic, we might need to use a subquery or collection sorting.
        // Let's stick to base columns for now.

        $result = $query->with(['cheffeur.taxis', 'departureCity', 'arrivalCity'])
                        ->withCount(['reservations' => function($query) {
                            $query->where('status', 'confirmed');
                        }])
                        ->get();

        // If no basic filters are provided, we might want to return an empty result or all trips
        if (!$request->filled('from') && !$request->filled('to')) {
            $result = collect();
        }

        return view('traveler.search', compact('result', 'cities'));
    }

}
