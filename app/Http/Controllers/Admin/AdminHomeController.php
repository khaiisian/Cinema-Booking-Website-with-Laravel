<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\contactus;
use App\Models\movie;
use App\Models\seat;
use App\Models\seat_type;
use App\Models\theater;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = movie::all();
        $customers = User::where('u_type', 'customer')->get();
        $admins = User::where('u_type', 'admin')->get();
        $theaters = theater::all();
        $bookings = booking::all();
        $messages = contactus::all();
        $seat_types = seat_type::all();
        $seats = seat::all();

        $startWeek = Carbon::now()->startOfWeek();
        $weekDates = [];
        $weekRevenue = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $startWeek->copy()->addDays($i);
            $weekDates[] = [
                'date' => $date->toDateString(),
                'day' => $date->format('l')
            ];

            $revenue = booking::whereDate('created_at', $date->toDateString())
                ->where('booking_status', 'booked')
                ->sum('total_price');

            $weekRevenue[$date->toDateString()] = $revenue;
        }

        $popular_movies = Movie::select('movies.movie_title', \DB::raw('COUNT(booking_seats.booking_seat_id) as total_booking_seats'))
            ->join('showtimes', 'movies.movie_id', '=', 'showtimes.movie_id')
            ->join('bookings', 'showtimes.showtime_id', '=', 'bookings.showtime_id')
            ->join('booking_seats', 'bookings.booking_id', '=', 'booking_seats.booking_id')
            ->groupBy('movies.movie_id', 'movies.movie_title')
            ->orderByDesc('total_booking_seats')
            ->get();

        return view('Admin.admin_home', compact('movies', 'customers', 'admins', 'theaters', 'bookings', 'messages', 'seat_types', 'seats', 'popular_movies', 'weekDates', 'weekRevenue'));
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
    public function update(Request $request, string $id)
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