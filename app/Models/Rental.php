<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
    	'status',
    	'requestProcessedAt',
    	'deadline',
    	'returnedAt',
		'book_id',
		'readerId',
		'requestManagedBy',
		'returnManagedBy',
    ];

	public function book() {
		return $this->belongsTo(Book::class);
	}

	public function reader() {
		return $this->belongsTo(User::class, 'readerId');
	}

	public function requestManagedByUser() {
		return $this->belongsTo(User::class, 'requestManagedBy');
	}

	public function returnManagedByUser() {
		return $this->belongsTo(User::class, 'returnManagedBy');
	}
}
