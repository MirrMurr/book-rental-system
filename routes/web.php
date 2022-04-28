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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::get('/manage-rentals', [RentalController::class, 'manageRentals'])->name('manage-rentals');

Auth::routes();
