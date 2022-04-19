<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Rental;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rentals.index', ["rentals" => $this->rentals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $bookId = $_POST['bookId'] ?? null;
        // $bookId = $request->bookId ?? null;

        // 'redirect' will re-query the database for the updated book rental status
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRentalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        $storedRental = [];
        foreach ($this->rentals as $r) {
            if ($r['id'] == $id) {
                $rental = $r;
                break;
            }
        }
        return view('rental.rental-details', compact('storedRental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRentalRequest  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
