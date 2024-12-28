<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\seat;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bookings = Booking::with('seats', 'showtimes.movie', 'showtimes.theater', 'user')->get();
        return view('Admin.admin_booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $booking = booking::with('seats', 'showtimes.movie', 'showtimes.theater', 'user')
            ->findOrFail($id);

        $seats = $booking->seats;
        $seat_list = [];
        // $seat_codes = implode(', ', $booking->seats->seat_code);
        foreach ($seats as $seat) {

            $seat_list[] = $seat->seat_code;
        }
        $seat_codes = implode(', ', $seat_list);
        $qrContent = "Booking_Code: " . $booking->booking_code . "\n" .
            "Movie: " . $booking->showtimes->movie->movie_title . "\n" .
            "Showtime: " . $booking->showtimes->showtime_id . "\n" .
            "Theater: " . $booking->showtimes->theater->theater_name . "\n" .
            "Seats: " . $seat_codes;

        $qrCode = QrCode::size(160)
            ->generate($qrContent);

        return view('Admin.booking_show', compact('booking', 'qrCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $booking_id = $id;
        $booking = booking::findOrFail($booking_id);
        $booking->booking_status = 'canceled';
        $booking->save();

        return redirect()->route('admin_booking');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}