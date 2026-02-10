<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'x', 'y'];

    public function departingTrips()
    {
        return $this->hasMany(Trip::class, 'departure_city_id');
    }

    public function arrivingTrips()
    {
        return $this->hasMany(Trip::class, 'arrival_city_id');
    }
}
