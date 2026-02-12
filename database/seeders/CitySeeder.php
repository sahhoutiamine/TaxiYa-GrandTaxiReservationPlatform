<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $cities = [
    ['name' => 'Casablanca', 'lat' => 33.58831, 'lng' => -7.61138],  
    ['name' => 'Rabat', 'lat' => 34.01325, 'lng' => -6.83255],       
    ['name' => 'Marrakech', 'lat' => 31.63416, 'lng' => -7.99994],
    ['name' => 'Tangier', 'lat' => 35.76727, 'lng' => -5.79975],
    ['name' => 'Agadir', 'lat' => 30.42018, 'lng' => -9.59815],
    ['name' => 'Fes', 'lat' => 34.03313, 'lng' => -5.00028],
    ['name' => 'Oujda', 'lat' => 34.686667, 'lng' => -1.911389],
    ['name' => 'Essaouira', 'lat' => 31.5100, 'lng' => -9.7700],
    ['name' => 'Safi', 'lat' => 32.29939, 'lng' => -9.23718],
    ['name' => 'Beni Mellal', 'lat' => 32.33725, 'lng' => -6.34983],
    ['name' => 'Nador', 'lat' => 35.16813, 'lng' => -2.93352],       
    ['name' => 'Laayoune', 'lat' => 27.1212, 'lng' => -13.2034],      
    ['name' => 'Dakhla', 'lat' => 30.41145, 'lng' => -9.55344],      
];

        DB::table('cities')->upsert($cities, ['name'], ['x', 'y']);
    }
}//
