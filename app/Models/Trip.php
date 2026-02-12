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
}
