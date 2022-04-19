<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
---------------------------------------
Main book functionality, search, genres
---------------------------------------
*/

// Route::get('/', [BookController::class, 'index']);
Route::get('/', function() {
    return redirect('/home');
});
Route::get('/home', [BookController::class, 'home'])->name('home');

// Route::get('/books', [BookController::class, 'bookList']);
// Route::post('/books', [BookController::class, 'searchBooks']);

// Route::get('/book/create', [BookController::class, 'newBook']);
// Route::post('/book/create', [BookController::class, 'storeBook']);

// Route::get('/book/{id}/edit', [BookController::class, 'editBookDetails']); // -> book-form.blade.php
// Route::post('/book/{id}/edit', [BookController::class, 'saveBookDetails']);
// Route::get('/book/{id}', [BookController::class, 'bookDetails']);

// Route::get('/genres', [BookController::class, 'genres']);

Route::resource('books', BookController::class);
Route::resource('genres', GenreController::class);
Route::resource('rentals', RentalController::class);
Route::resource('users', UserController::class);

Route::post('/search-books', [BookController::class, 'searchBooks'])->name('books.search');

/*
---------------------------------------
Rentals
---------------------------------------
*/

// Route::get('/my-rentals', [RentalController::class, 'myRentals']);

// Route::get('/rental/{id}', [RentalController::class, 'rentalDetails']);

// Route::post('/new-rental', [RentalController::class, 'newRental']);


/*
---------------------------------------
User management
---------------------------------------
*/

Route::get('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login']);

Route::get('/profile', [AuthController::class, 'profile']);


/*
---------------------------------------
Admin settings
---------------------------------------
*/

Route::get('/manage-books', [BookController::class, 'manageBooks']);
Route::get('/manage-genres', [BookController::class, 'manageGenres']);