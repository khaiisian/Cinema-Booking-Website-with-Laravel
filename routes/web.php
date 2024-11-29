<?php

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

Route::get('/before/movies', [MovieController::class, 'index'])->name('bmovies');
Route::post('/before/movies/ajax', [MovieController::class, 'ajax']);


Route::post('/before/showtimes/ajax', [ShowtimeController::class, 'showtime_ajax']);
Route::get('/before/showtimes', function () {
    return view('Customer.showtime');
})->name('bshowtimes');

Route::get('/home', [HomeController::class, 'Index'])->middleware(['auth', 'verified'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/movies', [MovieController::class, 'index'])->name('movies');
    Route::get('/movies/{id}', [MovieController::class, 'showDetail'])->name('movies.show');
    Route::post('/movies/ajax', [MovieController::class, 'ajax']);

    Route::get('/showtimes', function () {
        return view('Customer.showtime');
    })->name('showtimes');
    Route::post('showtimes/ajax', [ShowtimeController::class, 'showtime_ajax']);

    Route::get('/booking', function () {
        return view('Customer.booking');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';