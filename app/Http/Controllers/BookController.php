<?php

namespace App\Http\Controllers;

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

    public function index() {
        return view('books.index', ['books' => $this->books, "genres" => $this->genres]);
    }

    public function bookList(Request $request) {
        return view('books.books', ['books' => $this->books, "genres" => $this->genres]);
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

        return view('books.books', ['books' => $res, "genres" => $this->genres]);
    }

    public function bookDetails($id) {
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

    public function genres() {
        // TODO query database and filter books by genre
        $filteredGenre = $_GET['v'] ?? '';
        $res = [];
        foreach ($this->books as $b) {
            if ($filteredGenre == '' || $b['genreId'] == $filteredGenre) {
                array_push($res, $b);
            }
        }
        return view('books.genres', ['books' => $res, "genres" => $this->genres]);
    }

    public function manageBooks() {
        return view('admin.manage-books', ['books' => $this->books, "genres" => $this->genres]);
    }

    public function manageGenres() {
        return view('admin.manage-genres', ['books' => $this->books, "genres" => $this->genres]);
    }
}
