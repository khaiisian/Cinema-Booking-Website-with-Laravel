<?php

use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminContactUsController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminSeatController;
use App\Http\Controllers\Admin\AdminSeatTypeController;
use App\Http\Controllers\Admin\AdminShowtimeController;
use App\Http\Controllers\Admin\AdminTheaterController;
use App\Http\Controllers\Admin\AdminUserController;
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

Route::get('/aboutus', function () {
    return view('Customer.about_us');
})->name('aboutus');

Route::middleware(['role:customer'])->group(function () {
    Route::get('/home', action: [HomeController::class, 'Index'])->name('home');

    Route::post('/movies/details', [SelectionController::class, 'showMovieDetail'])->name('movies.show');

    Route::post('/movies/ajaxShowtimes', [SelectionController::class, 'ajaxShowtime']);

    Route::post('/booking/booking_details', [BookingController::class, 'booking_details'])->name('booking_details');

    Route::get('/booking/booking_confirm', [BookingController::class, 'show_booking_details'])->name('show_booking_details');

    Route::post('/booking/book', [BookingController::class, 'booking_create'])->name('Booking');

    Route::get('/booking_record', [BookingRecordController::class, 'showBookingRecord'])->name('bookingrecord');

    Route::post('/booking_record/ajax', [BookingRecordController::class, 'ajaxBookingRecord']);

    Route::post('/booking_record/cancel', [BookingRecordController::class, 'cancelBookingRecord']);

    Route::post('/booking_record/booking_ticket', [BookingRecordController::class, 'showBookingTicet']);

    Route::post('/contactus', [ContatUsController::class, 'sendMessage']);
});



Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin_home', [AdminHomeController::class, 'index'])->name('admin_home');

    // Admin Movies
    Route::get('/admin_movie', [AdminMovieController::class, 'index'])->name('admin_movie');
    Route::post('/save/movies', [AdminMovieController::class, 'store'])->name('movies-store');
    Route::get('/movie/{id}/delete', [AdminMovieController::class, 'destroy'])->name('movie_destroy');
    Route::get('/movie/{id}/edit', [AdminMovieController::class, 'edit'])->name('movie_edit');
    Route::post('/movie/update', [AdminMovieController::class, 'update'])->name('update_movie');

    // Admin Showtimes
    Route::get('/admin_showtime', [AdminShowtimeController::class, 'index'])->name('admin_showtime');
    Route::post('/showtime/save', [AdminShowtimeController::class, 'store'])->name('save_showtimes');
    Route::get('/showtime/{id}/edit', [AdminShowtimeController::class, 'edit'])->name('showtime_edit');
    Route::get('/showtime/{id}/delete', [AdminShowtimeController::class, 'destroy'])->name('showtime_destroy');
    Route::post('/showtime/update', [AdminShowtimeController::class, 'update'])->name('update_showtime');

    // Admin Booking
    Route::get('/admin_booking', [AdminBookingController::class, 'index'])->name('admin_booking');
    Route::get('/booking/{id}/show', [AdminBookingController::class, 'show'])->name('booking_show');
    Route::get('/booking/{id}/admin_cancel', [AdminBookingController::class, 'edit'])->name('admin_cancel');

    // Admin Genre
    Route::get('/admin_genre', [AdminGenreController::class, 'index'])->name('admin_genre');
    Route::post('/genre/save', [AdminGenreController::class, 'store'])->name('save_genre');
    Route::get('/genre/{id}/edit', [AdminGenreController::class, 'edit'])->name('genre_edit');
    Route::post('/genre/update', [AdminGenreController::class, 'update'])->name('genre_update');
    Route::get('/genre/{id}/delete', [AdminGenreController::class, 'destroy'])->name('genre_delete');

    // Admin Seat Types
    Route::get('/admin_seat_type', [AdminSeatTypeController::class, 'index'])->name('admin_seat_type');
    Route::post('/seat_type_save', [AdminSeatTypeController::class, 'store'])->name('seat_type_save');
    Route::get('/seat_type/{id}/edit', [AdminSeatTypeController::class, 'edit'])->name('seat_type_edit');
    Route::post('/seat_type/update', [AdminSeatTypeController::class, 'update'])->name('seat_type_update');
    Route::get('/seat_type/{id}/delete', [AdminSeatTypeController::class, 'destroy'])->name('seat_type_delete');

    // Admin Contact Us
    Route::get('/admin_contact', [AdminContactUsController::class, 'index'])->name('admin_contact');
    Route::get('/contact/{id}/delete', [AdminContactUsController::class, 'destroy'])->name('contact_delete');

    // Admin Theater
    Route::get('/admin_theater', [AdminTheaterController::class, 'index'])->name('admin_theater');
    Route::post('/theater_save', [AdminTheaterController::class, 'store'])->name('theater_save');
    Route::get('/theater/{id}/edit', [AdminTheaterController::class, 'edit'])->name('theater_edit');
    Route::post('/theater/update', [AdminTheaterController::class, 'update'])->name('theater_upate');
    Route::get('/theater/{id}/delete', [AdminTheaterController::class, 'destroy'])->name('theater_delete');

    // Admin Seat
    Route::get('/admin_seats', [AdminSeatController::class, 'index'])->name('admin_seats');
    Route::post('/ajax/seat_info', [AdminSeatController::class, 'AjaxSeatInfo'])->name('seat_info');
    Route::post('/seat/update', [AdminSeatController::class, 'update'])->name('seat_update');
    Route::post('/ajax/seat_monitor_status', [AdminSeatController::class, 'AjaxSeatMonitor'])->name('seat_monitor_status');
    Route::post('/ajaxTheater', [AdminSeatController::class, 'ajaxTheater'])->name('ajaxTheater');
    Route::post('/admin/ajaxtheater_showtime', [AdminSeatController::class, 'ajaxTheaterShowtime'])->name('ajaxTheaterShowtime');
    Route::post('/admin/showtimes_seats_ajax', [AdminSeatController::class, 'ajaxShowtimeSeat'])->name('ajaxShowtimeSeat');

    // Admin Users
    Route::get('/admin_users', [AdminUserController::class, 'index'])->name('admin_users');
    Route::get('/admin_user/{id}/edit', [AdminUserController::class, 'edit'])->name('admin_user_edit');
    Route::post('/admin_user/update', [AdminUserController::class, 'update'])->name('admin_user_update');
    Route::get('/admin_user/{id}/delete', [AdminUserController::class, 'destroy'])->name('admin_user_delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';