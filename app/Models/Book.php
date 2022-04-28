<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'authors', 'releasedAt', 'pages', 'isbn', 'description', 'genres', 'inStock', 'coverImage' ];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    public function rentals() {
        return $this->hasMany(Rental::class);
    }
}
