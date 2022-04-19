<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $genres = [
        [
            'id' => 1,
            'name' => 'Primary',
            'style' => 'primary'
        ],
        [
            'id' => 2,
            'name' => 'Secondary',
            'style' => 'secondary'
        ],
        [
            'id' => 3,
            'name' => 'Success',
            'style' => 'success'
        ],
        [
            'id' => 4,
            'name' => 'Danger',
            'style' => 'danger'
        ],
        [
            'id' => 5,
            'name' => 'Warning',
            'style' => 'warning'
        ],
        [
            'id' => 6,
            'name' => 'Info',
            'style' => 'info'
        ],
        [
            'id' => 7,
            'name' => 'Light',
            'style' => 'light'
        ],
        [
            'id' => 8,
            'name' => 'Dark',
            'style' => 'dark'
        ],
    ];

    public function home() {
        // TODO login: authenticate || home page
        $books = Book::all();
        return view('index', ['books' => $books, "genres" => $this->genres]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books, "genres" => $this->genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', ["genres" => $this->genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // TODO create logic
        return view('admin.manage-books', ["genres" => $this->genres]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book = [];
        $books = Book::all();
        foreach ($books as $b) {
            if ($b['id'] == $id) {
                $book = $b;
                break;
            }
        }
        $genres = $this->genres;
        return view('books.book-details', compact('book', "genres"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.create', compact('book'));
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
        // TODO update logic
        return view('admin.manage-books', ['books' => $this->books, "genres" => $this->genres]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function searchBooks(Request $request) {
        // TODO query database and filter books by author & title
        $title = $request->title;
        $author = $request->author;
        $res = [];
        $books = Book::all();
        foreach ($books as $b) {
            if (($title == null || Str::contains($b['title'], $title)) && ($author == null || Str::contains($b['authors'], $author))) {
                array_push($res, $b);
            }
        }

        return view('books.index', ['books' => $res, "genres" => $this->genres]);
        // return redirect()->route('books.index')->with(['books' => $res, "genres" => $this->genres]);
    }

    public function manageBooks() {
        $books = Book::all();
        return view('admin.manage-books', ['books' => $books, "genres" => $this->genres]);
    }
}
