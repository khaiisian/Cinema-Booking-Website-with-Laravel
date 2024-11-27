<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Models\showtime;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function index()
    {
        $todaySessions = showtime::where('showtime_date', today())->with('movie', 'theater')->get();
        return view('before_login.bhome', compact('todaySessions'));
    }
}