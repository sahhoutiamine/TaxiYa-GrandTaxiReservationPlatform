<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricule',
        'model',
        'color',
        'car',
        'taxi_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
