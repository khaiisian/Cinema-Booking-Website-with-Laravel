<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\seat;
use App\Models\showtime;
use App\Models\theater;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $showtimes = showtime::where('showtime_date', today())
            ->with('theater', 'movie')
            ->get();

        $showtime = $showtimes->first();
        $showtime_id = $showtime->showtime_id;
        $theater_id = $showtime->theater_id;
        $seats = seat::where('theater_id', $theater_id)->get();

        $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $showtime_id)
                ->where('bookings.booking_status', 'booked');
        })->get();
        return view('Admin.admin_seats', compact('seats', 'showtimes', 'showtime', 'unavailable_seats'));
        // return view('Admin.admin_seats');
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
    public function show(Request $request)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $seat_id = $request->seat_id;

        $validateData = $request->validate([
            'operational_status' => 'required|in:usable,maintenance',
        ]);

        $seat = seat::findOrFail($seat_id);
        $seat->update([
            'seat_status' => $validateData['operational_status'],
        ]);

        return redirect()->route('admin_seats');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function AjaxSeatInfo(Request $request)
    {
        $id = $request->id;
        $seats = seat::where('seat_id', $id)
            ->get();

        $status = $request->status;

        return response()->json([
            'data' => view('Admin.seat_info', compact('seats', 'status'))->render(),
            // 'data' => view('Admin.seat_info', compact('seat'))->render(),
            'seat' => $seats,
            'message' => 'successful',
        ]);
    }

    public function AjaxSeatMonitor(Request $request)
    {
        $monitor_status = $request->monitor_status;
        // $seats = $request->input('seats');
        if ($monitor_status == "Operational") {
            $seats = seat::where('theater_id', 1)->get();
            return response()->json([
                'data' => $seats,
                'view' => view('Admin.operational_seat', compact('seats'))->render(),
            ]);
        } elseif ($monitor_status == "Booking") {

            $showtimes = showtime::where('showtime_date', today())
                ->with('theater', 'movie')
                ->get();

            $showtime = $showtimes->first();
            $showtime_id = $showtime->showtime_id;
            $theater_id = $showtime->theater_id;
            $seats = seat::where('theater_id', $theater_id)->get();

            $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
                $query->select('booking_seats.seat_id')
                    ->from('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                    ->where('bookings.showtime_id', $showtime_id)
                    ->where('bookings.booking_status', 'booked');
            })->get();
            return response()->json([
                'view' => view('Admin.bookingstatus_seat', compact('seats', 'showtimes', 'showtime', 'unavailable_seats'))->render(),
            ]);
        } else {
            $msg = 'nothing';
        }

    }

    public function ajaxTheater(Request $request)
    {
        $theater_id = $request->theater_id;
        $seats = seat::where('theater_id', $theater_id)->get();
        return response()->json([
            'msg' => 'successful',
            'data' => $seats,
            'view' => view('Admin.operational_seat', compact('seats'))->render(),
        ]);
    }

    public function ajaxTheaterShowtime(Request $request)
    {
        $showtime_day = $request->showtime_day;
        if ($showtime_day == 1) {
            $showtimes = showtime::where('showtime_date', today())
                ->with('theater', 'movie')
                ->get();

            $showtime_id = $showtimes->first()->showtime_id;
            $showtime = showtime::with('theater', 'movie')->findOrFail($showtime_id);
            $theater_id = $showtime->theater_id;
            $seats = seat::where('theater_id', $theater_id)->get();

            $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
                $query->select('booking_seats.seat_id')
                    ->from('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                    ->where('bookings.showtime_id', $showtime_id)
                    ->where('bookings.booking_status', 'booked');
            })->get();

        } elseif ($showtime_day == 2) {
            $showtimes = showtime::where('showtime_date', today()->addDay())
                ->with('theater', 'movie')
                ->get();

            $showtime_id = $showtimes->first()->showtime_id;
            $showtime = showtime::with('theater', 'movie')->findOrFail($showtime_id);
            $theater_id = $showtime->theater_id;
            $seats = seat::where('theater_id', $theater_id)->get();

            $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
                $query->select('booking_seats.seat_id')
                    ->from('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                    ->where('bookings.showtime_id', $showtime_id)
                    ->where('bookings.booking_status', 'booked');
            })->get();

        } elseif ($showtime_day == 3) {
            $showtimes = showtime::where('showtime_date', today()->addDays(2))
                ->with('theater', 'movie')
                ->get();

            $showtime_id = $showtimes->first()->showtime_id;
            $showtime = showtime::with('theater', 'movie')->findOrFail($showtime_id);
            $theater_id = $showtime->theater_id;
            $seats = seat::where('theater_id', $theater_id)->get();

            $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
                $query->select('booking_seats.seat_id')
                    ->from('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                    ->where('bookings.showtime_id', $showtime_id)
                    ->where('bookings.booking_status', 'booked');
            })->get();

        } elseif ($showtime_day == 4) {
            $showtimes = showtime::where('showtime_date', today()->addDays(3))
                ->with('theater', 'movie')
                ->get();

            $showtime_id = $showtimes->first()->showtime_id;
            $showtime = showtime::with('theater', 'movie')->findOrFail($showtime_id);
            $theater_id = $showtime->theater_id;
            $seats = seat::where('theater_id', $theater_id)->get();

            $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
                $query->select('booking_seats.seat_id')
                    ->from('booking_seats')
                    ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                    ->where('bookings.showtime_id', $showtime_id)
                    ->where('bookings.booking_status', 'booked');
            })->get();

        } else {
            $showtimes = [];
        }
        return response()->json([
            'msg' => 'successful',
            'data' => $showtime_day,
            'showtimes' => $showtimes,
            'showtime_id' => $showtime_id,
            'unavailable_seats' => $unavailable_seats,
            'seats' => $seats,
            'showtime' => $showtime
        ]);
    }

    public function ajaxShowtimeSeat(Request $request)
    {
        $showtime_id = $request->showtime_id;
        $showtime = showtime::with('theater', 'movie')->findOrFail($showtime_id);

        $theater_id = $showtime->theater_id;
        $seats = seat::where('theater_id', $theater_id)->get();

        $unavailable_seats = Seat::whereIn('seat_id', function ($query) use ($showtime_id) {
            $query->select('booking_seats.seat_id')
                ->from('booking_seats')
                ->join('bookings', 'booking_seats.booking_id', '=', 'bookings.booking_id')
                ->where('bookings.showtime_id', $showtime_id)
                ->where('bookings.booking_status', 'booked');
        })->get();

        return response()->json([
            'msg' => 'successful',
            'unavailable_seats' => $unavailable_seats,
            'seats' => $seats,
            'showtime' => $showtime
        ]);
    }
}