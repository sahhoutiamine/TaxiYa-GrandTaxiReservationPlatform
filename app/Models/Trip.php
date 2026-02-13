<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cheffeur_id',
        'departure_city_id',
        'arrival_city_id',
        'departure_date',
        'price_per_seat',
        'status',
        'available_seats',
    ];

    protected $appends = [
        'distance',
        'duration_hours',
        'arrival_date',
    ];

    protected function casts(): array
    {
        return [
            'departure_date' => 'datetime',
        ];
    }

    public function cheffeur()
    {
        return $this->belongsTo(User::class, 'cheffeur_id');
    }
  

    public function departureCity()
    {
        return $this->belongsTo(City::class, 'departure_city_id');
    }

    public function arrivalCity()
    {
        return $this->belongsTo(City::class, 'arrival_city_id');
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getDistanceAttribute()
    {
        if (!$this->departureCity || !$this->arrivalCity) {
            return 0;
        }

        $deltaX = $this->arrivalCity->x - $this->departureCity->x;
        $deltaY = $this->arrivalCity->y - $this->departureCity->y;
        return sqrt(pow($deltaX, 2) + pow($deltaY, 2)) * 100;
    }

    public function getDurationHoursAttribute()
    {
        return $this->distance / 60;
    }

    public function getArrivalDateAttribute()
    {
        return $this->departure_date->copy()->addHours($this->duration_hours);
    }

    public function getAvailableSeatsAttribute()
    {
        // Use reservations_count if it was loaded via withCount(), otherwise query the relationship
        $bookedSeats = $this->attributes['reservations_count'] ?? $this->reservations()->where('status', 'confirmed')->count();
        return max(0, 6 - $bookedSeats);
    }
}
