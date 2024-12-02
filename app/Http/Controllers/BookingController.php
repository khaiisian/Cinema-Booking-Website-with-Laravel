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

        // $data = showtime::with(['movie', 'theater.seat'])->get();
        $theater = theater::with('seat')->get();
        $seats = seat::all();


        $showtime_id = showtime::where('showtime_date', today())
            ->where('movie_id', $id)
            ->pluck('showtime_id')
            ->first();


        $unavailable_seats = seat::whereIn('seat_id', function ($query) use ($showtime_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $showtime_id);
        })->get();

        $unavailable_seat_ids = $unavailable_seats->pluck('seat_id');

        $available_seats = Seat::whereNotIn('seat_id', $unavailable_seat_ids)->get();

        return view('Customer.booking', compact('movie', 'theater', 'seats', 'id', 'unavailable_seats', 'available_seats'));
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

        $showtime_id = $showtimes->pluck('showtime_id');

        $unavailable_seats = seat::whereIn('seat_id', function ($query) use ($showtime_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $showtime_id);
        })->get();

        $unavailable_seat_ids = $unavailable_seats->pluck('seat_id');

        $available_seats = Seat::whereNotIn('seat_id', $unavailable_seat_ids)->get();

        return response()->json([
            'data' => view('Customer.booking_showtime', compact('showtimes'))->render(),
            'unavailable_seats' => $unavailable_seats,
            'available_seats' => $available_seats
        ]);
    }

    public function seat_availablility(Request $request)
    {
        $showtime_id = $request->showtime_id;
        $unavailable_seats = seat::whereIn('seat_id', function ($query) use ($showtime_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $showtime_id);
        })->get();

        $unavailable_seat_ids = $unavailable_seats->pluck('seat_id');

        $available_seats = Seat::whereNotIn('seat_id', $unavailable_seat_ids)->get();


        return response()->json(['unavailable_seats' => $unavailable_seats, 'available_seats' => $available_seats]);

    }
}