<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\SelectionController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowtimeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/movies', function () {
//     return view('Customer.movies');
// })->name('movies');
Route::get('/', [HomeController::class, 'Index'])->name('beforelogin');

Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::post('/movies/ajax', [MovieController::class, 'ajax']);


Route::post('showtimes/ajax', [ShowtimeController::class, 'showtime_ajax']);
Route::get('/showtimes', function () {
    return view('Customer.showtime');
})->name('showtimes');

Route::get('/home', [HomeController::class, 'Index'])->middleware(['auth', 'verified'])->name('home');
Route::middleware('auth')->group(function () {
    // Route::get('/movies', [MovieController::class, 'index'])->name('movies');
    Route::post('/movies/details', [SelectionController::class, 'showMovieDetail'])->name('movies.show');
    // Route::post('/movies/ajax', [MovieController::class, 'ajax']);

    // Route::get('/showtimes', function () {
    //     return view('Customer.showtime');
    // })->name('showtimes');
    // Route::post('showtimes/ajax', [ShowtimeController::class, 'showtime_ajax']);

    Route::post('/movies/ajaxShowtimes', [SelectionController::class, 'ajaxShowtime']);

    Route::post('/booking/seat_available', [SelectionController::class, 'seat_availablility']);

    // Route::post('/booking/book', [SelectionController::class, 'booking_create']);

    Route::post('/booking/booking_details', [BookingController::class, 'booking_details'])->name('booking_details');

    Route::get('/booking/booking_confirm', [BookingController::class, 'show_booking_details'])->name('show_booking_details');

    Route::post('/booking/book', [BookingController::class, 'booking_create'])->name('Booking');

    // Route::get('/booking', function () {
    //     return view('Customer.booking');
    // });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';