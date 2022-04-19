<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO query database and filter books by genre
        $filteredGenre = $_GET['v'] ?? '';
        $res = [];
        foreach ($this->books as $b) {
            if ($filteredGenre == '' || $b['genreId'] == $filteredGenre) {
                array_push($res, $b);
            }
        }
        return view('genres.index', ['books' => $res, "genres" => $this->genres, 'edit' => false]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
