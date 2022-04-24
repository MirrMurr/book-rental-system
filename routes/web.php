<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;

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

Route::get('/', function() {
    return redirect('/home');
});

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

Route::get('/profile', [UserController::class, 'profile']);


/*
---------------------------------------
Admin settings
---------------------------------------
*/

Route::get('/manage-books', [BookController::class, 'manageBooks'])->name('manage-books');
Route::get('/manage-genres', [GenreController::class, 'manageGenres'])->name('manage-genres');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
