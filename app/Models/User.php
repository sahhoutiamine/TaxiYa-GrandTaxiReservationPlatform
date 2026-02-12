<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'license_number',
        'approved_at',
        'approved_by',
        'verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'approved_at' => 'datetime',
            'verified' => 'boolean',
        ];
    }

    // Relationships

    // Chauffeur has taxis
public function Taxis()
{
    return $this->hasOne(Taxi::class);
}


    // Chauffeur has created trips
    public function driverTrips()
    {
        return $this->hasMany(Trip::class, 'cheffeur_id');
    }

    // Voyageur makes reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Helper methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isChauffeur()
    {
        return $this->role === 'cheffeur';
    }

    public function isVoyageur()
    {
        return $this->role === 'voyageur';
    }
}
