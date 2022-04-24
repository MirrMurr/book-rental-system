<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use App\Models\Book;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filteredGenre = $_GET['v'] ?? '';
        $res = [];
        $books = Book::all();
        $genres = Genre::all();
        foreach ($books as $b) {
            if ($filteredGenre == '') {
                array_push($res, $b);
            } else {
                $gens = $b->genres;
                foreach ($gens as $genr) {
                    if ($filteredGenre == $genr['id']) {
                        array_push($res, $b);
                    }
                }
            }
        }
        return view('genres.index', ['books' => $res, "genres" => $genres, 'edit' => false]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        $validatedGenre = $request->validated();
        Genre::create($validatedGenre);
        return redirect()->route('manage-genres');
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
        return view('genres.details', ['genre' => $genre, 'isEditMode' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Genre $genre, UpdateGenreRequest $request)
    {
        $validatedGenre = $request->validated();
        $genre->update($validatedGenre);
        return redirect()->route('manage-genres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('manage-genres');
    }

    public function manageGenres() {
        $genres = Genre::all();
        return view('admin.manage-genres', ["genres" => $genres]);
    }
}
