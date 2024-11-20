<?php

namespace App\Http\Controllers;

use App\Models\movie;
use App\Models\session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function bIndex()
    {
        $movies = movie::all();
        // $sessions = session::all();$students = Student::where('status', 1)

        $todaySessions = Session::where('session_date', today())->with('movie', 'theater')->get();
        // $session_movie = $todaySessions->pluck('movie');

        return view('before_login.bhome', compact('movies', 'todaySessions'));
    }
}