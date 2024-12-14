<?php

namespace App\Http\Controllers;

use App\Models\seat;
use App\Models\showtime;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    //
    public function booking_details(Request $request)
    {
        $booking_token = session('booking_token');
        if (!$booking_token) {
            return redirect()->route("home");
        }

        $showtime_id = $request->showtime_id;
        $seat_ids = json_decode($request->input('selectedSeats', '[]'), true);
        $total_price = 0;

        if (empty($seat_ids)) {
            return "No seat selected";
        } else {
            $seats = seat::whereIn('seat_id', $seat_ids)->get();
            foreach ($seat_ids as $seat_id) {
                $price = Seat::findOrFail($seat_id)->seat_type->price;
                $total_price += $price;
            }
        }

        $showtime_info = showtime::where('showtime_id', $showtime_id)->with('movie', 'theater')->get();

        $request->session()->put('booking_details', [
            'showtime_info' => $showtime_info,
            'seats' => $seats,
            'total_price' => $total_price,


        ]);

        return redirect()->route('show_booking_details');
    }

    public function show_booking_details(Request $request)
    {
        if (!$request->session()->has('booking_details')) {
            return redirect()->route('home')
                ->with('error', 'Session expired');
        }

        $booking_details = $request->session()->get('booking_details');

        return response()
            ->view('Customer.booking_confirm', compact('booking_details'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    public function booking_create(Request $request)
    {
        if (!$request->session()->has('booking_details')) {
            return redirect()->route('home')
                ->with('error', 'Session expired');
        }

        $booking_details = $request->session()->get('booking_details');

        $user_id = Auth::id();
        $showtime_id = $booking_details['showtime_info'][0]['showtime_id'];
        $total_price = $booking_details['total_price'];
        $seats = $booking_details['seats'];
        $seat_ids = collect($seats)->pluck('seat_id')->toArray();

        $booking = booking::create([
            'booking_status' => 'booked',
            'u_id' => $user_id,
            'showtime_id' => $showtime_id,
            'total_price' => $total_price
        ]);

        $booking->seats()->attach($seat_ids);
        session()->forget('booking_details');

        return redirect()->route("home");

    }
}