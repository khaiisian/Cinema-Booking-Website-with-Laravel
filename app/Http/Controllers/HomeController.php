<?php

namespace App\Http\Controllers;

use App\Models\movie;
use App\Models\session;
use App\Models\showtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function Index()
    {

        if (request()->is('/') && Auth::check()) {
            return redirect('/home');
        }

        $movies = movie::all();
        // $sessions = session::all();$students = Student::where('status', 1)

        $todayShowtimes = showtime::where('showtime_date', today())->with('movie', 'theater')->get();
        // $session_movie = $todayShowtimes->pluck('movie');

        return view('Customer.home', compact('movies', 'todayShowtimes'));
    }
}