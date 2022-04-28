<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Rental;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Rental::class, 'rental');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = Rental::all()->where('status', 'PENDING')->where('readerId', Auth::id());
        $accepted = Rental::all()->where('status', 'ACCEPTED')->where('deadline', '>=', Carbon::now())->where('readerId', Auth::id());
        $acceptedLate = Rental::all()->where('status', 'ACCEPTED')->where('deadline', '<', Carbon::now())->where('readerId', Auth::id());
        $rejected = Rental::all()->where('status', 'REJECTED')->where('readerId', Auth::id());
        $returned = Rental::all()->where('status', 'RETURNED')->where('readerId', Auth::id());

        return view('rentals.index', compact('pending', 'accepted', 'acceptedLate', 'rejected', 'returned'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // not needed
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRentalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentalRequest $request)
    {
        $validatedRental = $request->validated();
        $deadline = Carbon::now()->addDays(14)->format('Y-m-d');
        $rental = Rental::create([
            'status' => 'PENDING',
            'deadline' => $deadline,
            'readerId' => Auth::id(),
            'book_id' => $request['bookId'],
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        return view('rentals.details', compact('rental'));
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
        $validatedRental = $request->validated();
        $newStatus = $validatedRental['status'];
        $newDeadline = $validatedRental['deadline'];
        if (in_array($newStatus, ['ACCEPTED', 'REJECTED'])) {
            $validatedRental['requestProcessedAt'] = Carbon::now();
            $validatedRental['requestManagedBy'] = Auth::id();
        }
        if (in_array($newStatus, ['RETURNED'])) {
            $validatedRental['returnedAt'] = Carbon::now();
            $validatedRental['returnManagedBy'] = Auth::id();
        }
        $rental->update($validatedRental);
        return redirect()->route('rentals.show', $rental->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        $genre->delete();
        return redirect()->route('rentals.index');
    }

    public function manageRentals() {
        $pending = Rental::all()->where('status', 'PENDING');
        $accepted = Rental::all()->where('status', 'ACCEPTED')->where('deadline', '>=', Carbon::now());
        $acceptedLate = Rental::all()->where('status', 'ACCEPTED')->where('deadline', '<', Carbon::now());
        $rejected = Rental::all()->where('status', 'REJECTED');
        $returned = Rental::all()->where('status', 'RETURNED');

        return view('rentals.manage', compact('pending', 'accepted', 'acceptedLate', 'rejected', 'returned'));
    }
}
