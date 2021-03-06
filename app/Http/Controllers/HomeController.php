<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Rental;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $books = Book::all();
        $genres = Genre::all();
        $rentals = Rental::all()->where('status', 'ACCEPTED');
        return view('index', compact('users', 'books', 'genres', 'rentals'));
    }
}
