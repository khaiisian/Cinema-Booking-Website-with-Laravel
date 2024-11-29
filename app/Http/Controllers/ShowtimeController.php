<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Models\showtime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShowtimeController extends Controller
{
    public function showtime_ajax(Request $request)
    {
        $date = $request->date;
        if ($date == 'day1') {
            $showtimes = showtime::where('showtime_date', today())->with('movie', 'theater')->get();
        } elseif ($date == 'day2') {
            $showtimes = showtime::where('showtime_date', today()->addDay())->with('movie', 'theater')->get();
        } elseif ($date == 'day3') {
            $showtimes = showtime::where('showtime_date', today()->addDays(2))->with('movie', 'theater')->get();
        } elseif ($date == 'day4') {
            $showtimes = showtime::where('showtime_date', today()->addDays(3))->with('movie', 'theater')->get();
        } else {
            $showtimes = showtime::where('showtime_date', today())->with('movie', 'theater')->get();
        }

        return response()->json([
            'data' => view('Customer.showtime_data', compact('showtimes'))->render(),
        ]);
    }
}