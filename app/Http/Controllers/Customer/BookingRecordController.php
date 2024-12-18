<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class BookingRecordController extends Controller
{
    //
    public function showBookingRecord()
    {
        $u_id = Auth::id();
        $currentTime = Carbon::now()->format('H:i:s');
        $booking_period = 'upcoming';

        $bookings = Booking::whereHas('showtimes', function ($query) use ($currentTime) {
            $query->where('showtime_date', '>', today())
                ->orWhere(function ($subQuery) use ($currentTime) {
                    $subQuery->where('showtime_date', '=', today())
                        ->where('showtime_start', '>', $currentTime);
                });
        })
            ->where('booking_status', 'booked')
            ->where('u_id', $u_id)
            ->with([
                'showtimes' => function ($query) {
                    $query->with('movie', 'theater');
                }
            ])
            ->get();


        $movie = movie::with('showtimes')->get();
        return view('Customer.booking_record', compact('bookings', 'movie', 'booking_period'));
    }

    public function ajaxBookingRecord(Request $request)
    {
        $status = $request->status;
        $currentTime = Carbon::now()->format('H:i:s');
        $u_id = Auth::id();
        if ($status == 'upcoming') {
            $bookings = Booking::whereHas('showtimes', function ($query) use ($currentTime) {
                $query->where('showtime_date', '>', today())
                    ->orWhere(function ($subQuery) use ($currentTime) {
                        $subQuery->where('showtime_date', '=', today())
                            ->where('showtime_start', '>', $currentTime);
                    });
            })
                ->where('booking_status', 'booked')
                ->where('u_id', $u_id)
                ->with([
                    'showtimes' => function ($query) {
                        $query->with('movie', 'theater');
                    }
                ])
                ->get();


            $booking_period = 'upcoming';

        } else if ($status == 'past') {
            $bookings = Booking::whereHas('showtimes', function ($query) use ($currentTime) {
                $query->where(function ($subQuery) use ($currentTime) {
                    $subQuery->where('showtime_date', '<', today())
                        ->orWhere(function ($nestedQuery) use ($currentTime) {
                            $nestedQuery->where('showtime_date', '=', today())
                                ->where('showtime_start', '<', $currentTime);
                        });
                });
            })
                ->where('booking_status', 'booked')
                ->where('u_id', $u_id)
                ->with([
                    'showtimes' => function ($query) {
                        $query->with('movie', 'theater');
                    }
                ])->get();


            $booking_period = 'past';
        }

        return response()->json([
            'data' => view('Customer.booking_record_data', compact('bookings', 'booking_period'))->render()
        ]);
    }

    public function cancelBookingRecord(Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = booking::findOrFail($booking_id);
        $booking->booking_status = 'canceled';
        $booking->save();

        return redirect()->route('bookingrecord');
    }

    public function showBookingTicet(Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = Booking::with('seats', 'showtimes.movie', 'showtimes.theater')->findOrFail($booking_id);
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
        return view('Customer.booking_ticket', compact('booking', 'qrCode'));
    }

}