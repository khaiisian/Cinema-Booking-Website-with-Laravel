<?php

namespace App\Http\Controllers;

use App\Models\seat;
use App\Models\showtime;
use App\Models\theater;
use Illuminate\Http\Request;
use App\Models\movie;
use Carbon\Carbon;

class BookingController extends Controller
{
    //
    public function showMovieDetail($id)
    {
        $movie = movie::findOrFail($id);

        $showtimes = showtime::where('showtime_date', today())
            ->where('movie_id', $id)
            ->with('movie', 'theater')->get();

        $data = showtime::with(['movie', 'theater.seat'])->get();
        $theater = theater::with('seat')->get();
        $seat = seat::all();
        return view('Customer.booking', compact('movie', 'showtimes', 'data', 'theater', 'seat', 'id'));
    }

    public function ajaxShowtime(Request $request)
    {
        $date = $request->date;
        $id = $request->id;
        // $id = $request->id;
        if ($date == 'day1') {
            $showtimes = showtime::where('showtime_date', today())
                ->where('movie_id', $id)
                ->with('movie', 'theater')->get();
        } elseif ($date == 'day2') {
            $showtimes = showtime::where('showtime_date', today()->addDay())
                ->where('movie_id', $id)
                ->with('movie', 'theater')
                ->get();
        } elseif ($date == 'day3') {
            $showtimes = showtime::where('showtime_date', today()->addDays(2))
                ->where('movie_id', $id)
                ->with('movie', 'theater')
                ->get();
        } elseif ($date == 'day4') {
            $showtimes = showtime::where('showtime_date', today()->addDays(3))
                ->where('movie_id', $id)
                ->with('movie', 'theater')
                ->get();
        }

        // return response()->json([
        //     'data' => view('Customer.showtime_data', compact('showtimes'))->render(),
        // ]);

        return response()->json([
            'data' => view('Customer.booking_showtime', compact('showtimes'))->render()
        ]);
    }
}