<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\booking_seat;
use App\Models\seat;
use App\Models\showtime;
use App\Models\theater;
use Illuminate\Http\Request;
use App\Models\movie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SelectionController extends Controller
{
    //
    public function showMovieDetail($id)
    {

        $booking_token = Str::uuid();
        session(['booking_token' => $booking_token]);
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

        return view('Customer.booking', compact('movie', 'theater', 'seats', 'id', 'showtime_id', 'unavailable_seats', 'available_seats'));
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

        $show_id = $showtimes->pluck('showtime_id');
        $time_end = $showtimes->pluck('showtime_end')->first(); // '14:30'
        $time_end = Carbon::parse($time_end)->format('H:i');
        $show_date = $showtimes->pluck('showtime_date')->first(); // '2024-12-04'

        // Concatenate the date and time
        $showtime_end = $show_date . ' ' . $time_end;

        $unavailable_seats = seat::whereIn('seat_id', function ($query) use ($show_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $show_id);
        })->get();

        $unavailable_seat_ids = $unavailable_seats->pluck('seat_id');

        $available_seats = Seat::whereNotIn('seat_id', $unavailable_seat_ids)->get();

        return response()->json([
            'data' => view('Customer.booking_showtime', compact('showtimes'))->render(),
            'unavailable_seats' => $unavailable_seats,
            'available_seats' => $available_seats,
            'show_id' => $show_id,
            'showtime_end' => $showtime_end,
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

    // public function booking_create(Request $request)
    // {
    //     $showtime_id = $request->showtime_id;
    //     $seat_ids = $request->input('seats');
    //     $user_id = Auth::id();
    //     $total_price = 0;

    //     foreach ($seat_ids as $seat_id) {
    //         $seat = seat::findOrFail($seat_id);
    //         $price = $seat->seat_type->price;
    //         $total_price += $price;
    //     }

    //     if (empty($seat_ids)) {
    //         return response()->json(['msg' => "No seats selected"]);
    //     }

    //     $booking = booking::create([
    //         'booking_status' => 'booked',
    //         'u_id' => $user_id,
    //         'showtime_id' => $showtime_id,
    //         'total_price' => $total_price
    //     ]);

    //     $booking->seats()->attach($seat_ids);

    //     return response()->json([
    //         'msg' => "Booking Successful",
    //         'totalprice' => $total_price
    //     ]);
    // }

}