<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
    	'reader_id',
    	'book_id',
    	'status',
    	'requestProcessedAt',
    	'requestManagedBy',
    	'deadline',
    	'returnedAt',
    	'returnManagedBy'
    ];
}
