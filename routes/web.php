<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalController;
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

// == Main page ==
Route::get('/', [BookController::class, 'index']);

// == Books ==
Route::get('/books', [BookController::class, 'bookList']);
Route::post('/books', [BookController::class, 'searchBooks']);

// == Book ==
Route::get('/book/{id}', [BookController::class, 'bookDetails']);

// == Genres ==
Route::get('/genres', [BookController::class, 'genres']);


/*
---------------------------------------
Rentals
---------------------------------------
*/

Route::get('/my-rentals', [RentalController::class, 'myRentals']);

Route::get('/rental/{id}', [RentalController::class, 'rentalDetails']);

Route::post('/new-rental', [RentalController::class, 'newRental']);


/*
---------------------------------------
Authentication
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