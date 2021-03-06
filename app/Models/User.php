<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'emailVerifiedAt' => 'datetime',
    ];

    public function ownRentals() {
        return $this->hasMany(Rental::class, 'readerId');
    }

    public function managedRentalRequests() {
        return $this->hasMany(Rental::class, 'requestManagedBy');
    }

    public function managedRentalRenturns() {
        return $this->hasMany(Rental::class, 'returnManagedBy');
    }

    public function isLibrarian()
    {
        return $this->role == "librarian";
    }

    public function isReader()
    {
        return $this->role == "reader";
    }
}
