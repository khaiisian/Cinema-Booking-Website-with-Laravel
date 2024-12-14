<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\movie;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingRecordController extends Controller
{
    //
    public function showBookingRecord()
    {
        $currentTime = Carbon::now()->format('H:i:s');

        $bookings = Booking::whereHas('showtimes', function ($query) use ($currentTime) {
            $query->where('showtime_date', '>', today())
                ->orWhere(function ($subQuery) use ($currentTime) {
                    $subQuery->where('showtime_date', '=', today())
                        ->where('showtime_start', '>', $currentTime);
                });
        })
            ->where('booking_status', 'booked')
            ->with([
                'showtimes' => function ($query) {
                    $query->with('movie', 'theater');
                }
            ])
            ->get();


        $movie = movie::with('showtimes')->get();
        return view('Customer.booking_record', compact('bookings', 'movie'));
    }

    public function ajaxBookingRecord(Request $request)
    {
        $status = $request->status;
        $currentTime = Carbon::now()->format('H:i:s');
        if ($status == 'upcoming') {
            $bookings = Booking::whereHas('showtimes', function ($query) use ($currentTime) {
                $query->where('showtime_date', '>', today())
                    ->orWhere(function ($subQuery) use ($currentTime) {
                        $subQuery->where('showtime_date', '=', today())
                            ->where('showtime_start', '>', $currentTime);
                    });
            })
                ->where('booking_status', 'booked')
                ->with([
                    'showtimes' => function ($query) {
                        $query->with('movie', 'theater');
                    }
                ])
                ->get();

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
                ->with([
                    'showtimes' => function ($query) {
                        $query->with('movie', 'theater');
                    }
                ])->get();
        }

        return response()->json([
            'data' => view('Customer.booking_record_data', compact('bookings'))->render()
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
}