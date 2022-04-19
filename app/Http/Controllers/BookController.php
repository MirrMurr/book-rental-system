<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $books = [
        [
            'id' => 1,
            'title' => 'LOTR',
            'author' => 'JRR. Tolkien',
            'genreId' => 2,
            'dateOfPublish' => 1,
            'numberOfPages' => 1,
            'language' => 1,
            'isbn' => 1,
            'inStock' => 1,
            'available' => 1,
            'description' => 1,
            'coverImage' => "https://cdn8.openculture.com/wp-content/uploads/2013/02/The-Fellowship-Of-The-Ring-Book-Cover-by-JRR-Tolkien_1-480.jpg",
        ],
        [
            'id' => 2,
            'title' => 'ALMA',
            'author' => 'Masik author',
            'genreId' => 2,
            'dateOfPublish' => 1,
            'numberOfPages' => 1,
            'language' => 1,
            'isbn' => 1,
            'inStock' => 1,
            'available' => 1,
            'description' => 1,
            'coverImage' => "https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=936&q=80",
        ],
        [
            'id' => 3,
            'title' => 'Lord Of The Rings',
            'author' => 'JRR. Tolkien',
            'genreId' => 3,
            'dateOfPublish' => 1,
            'numberOfPages' => 1,
            'language' => 1,
            'isbn' => 1,
            'inStock' => 1,
            'available' => 1,
            'description' => 1,
            'coverImage' => "https://cdn8.openculture.com/wp-content/uploads/2013/02/The-Fellowship-Of-The-Ring-Book-Cover-by-JRR-Tolkien_1-480.jpg",
        ],
        [
            'id' => 4,
            'title' => 'Negyedik',
            'author' => 'SZILVA',
            'genreId' => 1,
            'dateOfPublish' => 1,
            'numberOfPages' => 1,
            'language' => 1,
            'isbn' => 1,
            'inStock' => 1,
            'available' => 1,
            'description' => 1,
            'coverImage' => null,
        ],
    ];

    protected $genres = [
        [
            'id' => 1,
            'name' => 'Scifi'
        ],
        [
            'id' => 2,
            'name' => 'Adventure'
        ],
        [
            'id' => 3,
            'name' => 'Self-improvement'
        ],
    ];

    public function home() {
        // TODO login: authenticate || home page
        return view('index', ['books' => $this->books, "genres" => $this->genres]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index', ['books' => $this->books, "genres" => $this->genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', ['books' => $this->books, "genres" => $this->genres]);
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
        return view('admin.manage-books', ['books' => $this->books, "genres" => $this->genres]);
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
        foreach ($this->books as $b) {
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
        //
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
        foreach ($this->books as $b) {
            if (($title == null || $b['title'] == $title) && ($author == null || $b['author'] == $author)) {
                array_push($res, $b);
            }
        }

        return view('books.index', ['books' => $res, "genres" => $this->genres]);
        // return redirect()->route('books.index')->with(['books' => $res, "genres" => $this->genres]);
    }

    public function genres() {
        // TODO query database and filter books by genre
        $filteredGenre = $_GET['v'] ?? '';
        $res = [];
        foreach ($this->books as $b) {
            if ($filteredGenre == '' || $b['genreId'] == $filteredGenre) {
                array_push($res, $b);
            }
        }
        return view('books.genres', ['books' => $res, "genres" => $this->genres, 'edit' => false]);
    }

    public function manageBooks() {
        return view('admin.manage-books', ['books' => $this->books, "genres" => $this->genres]);
    }

    public function manageGenres() {
        return view('admin.manage-genres', ['books' => $this->books, "genres" => $this->genres]);
    }
}
