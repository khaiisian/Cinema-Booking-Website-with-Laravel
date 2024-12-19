<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminShowtimeController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\BookingRecordController;
use App\Http\Controllers\Customer\ContatUsController;
use App\Http\Controllers\Customer\SelectionController;
use App\Http\Controllers\Customer\GenreController;
use App\Http\Controllers\Customer\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ShowtimeController;
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

Route::get('/', [HomeController::class, 'Index'])->name('beforelogin');

Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::post('/movies/ajax', [MovieController::class, 'ajax']);


Route::post('showtimes/ajax', [ShowtimeController::class, 'showtime_ajax']);
Route::get('/showtimes', function () {
    return view('Customer.showtime');
})->name('showtimes');

Route::get('/contactus', function () {
    return view('Customer.contactus');
})->name('contactus');
Route::post('/contactus', [ContatUsController::class, 'sendMessage']);

Route::get('/home', [HomeController::class, 'Index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware(['role:customer'])->group(function () {
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

    Route::get('/booking_record', [BookingRecordController::class, 'showBookingRecord'])->name('bookingrecord');
    Route::post('/booking_record/ajax', [BookingRecordController::class, 'ajaxBookingRecord']);
    Route::post('/booking_record/cancel', [BookingRecordController::class, 'cancelBookingRecord']);
    Route::post('/booking_record/booking_ticket', [BookingRecordController::class, 'showBookingTicet']);
    // Route::get('/booking_record', [BookingController::class, 'showBookingRecord'])->name('bookingrecord');

    // Route::get('/booking', function () {
    //     return view('Customer.booking');
    // });
});


Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin_home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin_movie', [AdminMovieController::class, 'index'])->name('admin_movie');
    Route::post('/save/movies', [AdminMovieController::class, 'store'])->name('movies-store');
    Route::post('/movie_delete', [AdminMovieController::class, 'destroy'])->name('movie_delete');
    Route::post('/movie_select', [AdminMovieController::class, 'show'])->name('movie_select');
    Route::get('/movie_edit', [AdminMovieController::class, 'edit'])->name('movie_edit');
    Route::post('/update_movie', [AdminMovieController::class, 'update'])->name('update_movie');


    Route::get('/admin_showtime', [AdminShowtimeController::class, 'index'])->name('admin_showtime');
    Route::post('/showtime/save', [AdminShowtimeController::class, 'store'])->name('save_showtimes');
    Route::get('/showtime/{id}/edit', [AdminShowtimeController::class, 'edit'])->name('showtime_edit');
    Route::get('/showtime/{id}/delete', [AdminShowtimeController::class, 'destroy'])->name('showtime_destroy');
    Route::post('/showtime/update', [AdminShowtimeController::class, 'update'])->name('update_showtime');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';