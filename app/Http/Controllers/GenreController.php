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
            'genreIds' => [2],
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
            'genreIds' => [2, 4],
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
            'genreIds' => [3, 4],
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
            'genreIds' => [1, 4],
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
            if ($filteredGenre == '') {
                array_push($res, $b);
            } else {
                foreach ($b['genreIds'] as $genreId) {
                    if ($filteredGenre == $genreId) {
                        array_push($res, $b);
                    }
                }
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
        return view('genres.create', ['books' => $this->books, "genres" => $this->genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('genres.details', ['genre' => $genre, 'isEditMode' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genres.details', ['genres' => $genres, 'genre' => $genre, 'isEditMode' => true]);
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

    public function manageGenres() {
        return view('admin.manage-genres', ['books' => $this->books, "genres" => $this->genres]);
    }
}
