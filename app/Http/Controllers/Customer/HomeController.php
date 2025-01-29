<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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
            $user = Auth::user();

            if ($user->u_type === 'admin') {
                return redirect()->route('admin_home');
            } elseif ($user->type === 'customer') {
                return redirect()->route('home');
            }
            return redirect('/home');
        }

        $movies = movie::all();

        $todayShowtimes = showtime::where('showtime_date', today())->with('movie', 'theater')->get();

        return view('Customer.home', compact('movies', 'todayShowtimes'));
    }
}