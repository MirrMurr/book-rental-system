<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Genre;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        return view('books.index', compact('books', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validatedBook = $request->validated();
        $genres = $validatedBook['genres'] ?? [];
        unset($validatedBook['genres']);
        $book = Book::create($validatedBook);
        $book->genres()->sync($genres);
        return redirect()->route('manage-books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $genres = Genre::all();
        $ongoingRentalsForUser = DB::table('rentals')
                ->where('readerId', Auth::id())
                ->where('book_id', $book->id)
                ->whereNot(function ($query) {
                    $query->where('status', 'REJECTED')
                          ->orWhere('status', 'RETURNED');
                })->get();
        $isAlreadyBorrowed = count($ongoingRentalsForUser) != 0;

        $ongoingRentals = DB::table('rentals')
                ->where('book_id', $book->id)
                ->whereNot(function ($query) {
                    $query->where('status', 'REJECTED')
                          ->orWhere('status', 'RETURNED');
                })->get();

        $availableAmount = $book['inStock'] - count($ongoingRentals);
        return view('books.details', compact('book', 'genres', 'isAlreadyBorrowed', 'availableAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedBook = $request->validated();
        $genres = $validatedBook['genres'] ?? [];
        unset($validatedBook['genres']);
        $book->update($validatedBook);
        $book->genres()->sync($genres);
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('home');
    }

    // === CUSTOM FUNCIONALITY ===

    public function searchBooks(Request $request) {
        $title = $request->title;
        $author = $request->author;
        $res = [];
        $books = Book::all();
        foreach ($books as $b) {
            if (($title == null || Str::contains($b['title'], $title)) && ($author == null || Str::contains($b['authors'], $author))) {
                array_push($res, $b);
            }
        }

        $genres = Genre::all();
        return view('books.index', ['books' => $res, "genres" => $genres]);
        // return redirect()->route('books.index')->with(['books' => $res, "genres" => $this->genres]);
    }

    public function manageBooks() {
        $books = Book::all();
        $genres = Genre::all();
        return view('books.manage', compact('books', 'genres'));
    }
}
