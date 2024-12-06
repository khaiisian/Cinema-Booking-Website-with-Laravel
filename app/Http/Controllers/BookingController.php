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
    public function ShowBookingDetail(Request $request)
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

        return view('Customer.booking_confirm', compact('seats', 'showtime_info', 'total_price'));
    }

    public function booking_create(Request $request)
    {

        $user_id = Auth::id();
        $showtime_id = $request->showtime_id;
        $total_price = $request->total_price;
        $seats = json_decode($request->input('seat_ids', '[]'), true);
        $seat_ids = array_column($seats, 'seat_id');

        $booking = booking::create([
            'booking_status' => 'booked',
            'u_id' => $user_id,
            'showtime_id' => $showtime_id,
            'total_price' => $total_price
        ]);

        $booking->seats()->attach($seat_ids);
        session()->forget('booking_token');

        return redirect()->route("home");

    }
}