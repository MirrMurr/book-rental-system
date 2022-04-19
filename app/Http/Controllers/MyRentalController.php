<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    protected $rentals = [
        [
            'id' => 1,
            'status' => 'pending',
            'title' => 'alma1',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 2,
            'status' => 'pending',
            'title' => 'almaaa2',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 3,
            'status' => 'pending',
            'title' => 'almaaa3',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 4,
            'status' => 'accepted',
            'title' => 'almaaa4',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 5,
            'status' => 'acceptedLate',
            'title' => 'almaaa5',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 6,
            'status' => 'rejected',
            'title' => 'almaaa6',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
        [
            'id' => 7,
            'status' => 'returned',
            'title' => 'almaaa7',
            'author' => 41,
            'dateOfRental' => 41,
            'deadline' => 41,
        ],
    ];

    public function myRentals() {
        return view('rental.my-rentals', ["rentals" => $this->rentals]);
    }

    public function rentalDetails($id) {
        $rental = [];
        foreach ($this->rentals as $r) {
            if ($r['id'] == $id) {
                $rental = $r;
                break;
            }
        }
        return view('rental.rental-details', compact('rental'));
    }

    public function newRental(Request $request) {
        // $bookId = $_POST['bookId'] ?? null;
        $bookId = $request->bookId ?? null;
        // TODO issue rental in database
        // 'redirect' will re-query the database for the updated book rental status
        return back();
    }
}
