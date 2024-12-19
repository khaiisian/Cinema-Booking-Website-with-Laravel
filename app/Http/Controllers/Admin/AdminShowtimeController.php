<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\showtime;
use App\Models\movie;
use App\Models\theater;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class AdminShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $showtimes = showtime::all();
        $movies = movie::all();
        $theaters = theater::all();
        return view('Admin.admin_showtime', compact('showtimes', 'movies', 'theaters'));
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
        $validatedData = $request->validate([
            'movies' => 'required',
            'theaters' => 'required',
            'showtime_start' => 'required|date_format:H:i',
            'showtime_end' => 'required|date_format:H:i',
            'showtime_date' => 'required|date',
        ]);

        $showtime_date = (new DateTime($validatedData['showtime_date']))->format('Y-m-d');
        $showtime = showtime::create([
            'movie_id' => $validatedData['movies'],
            'theater_id' => $validatedData['theaters'],
            'showtime_start' => $validatedData['showtime_start'],
            'showtime_end' => $validatedData['showtime_end'],
            'showtime_date' => $showtime_date,
        ]);

        return redirect()->route('admin_showtime');
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
        $showtime = showtime::findOrFail($id);
        $movies = movie::all();
        $theaters = theater::all();
        return view('Admin.showtime_edit', compact('showtime', 'movies', 'theaters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'movies' => 'required',
            'theaters' => 'required',
            'showtime_start' => 'required',
            'showtime_end' => 'required',
            'showtime_date' => 'required|date',
        ]);
        $showtime_id = $request->showtime_id;
        $showtime = showtime::findOrFail($showtime_id);

        $showtime_date = (new DateTime($validatedData['showtime_date']))->format('Y-m-d');
        $showtime->update([
            'movie_id' => $validatedData['movies'],
            'theater_id' => $validatedData['theaters'],
            'showtime_start' => $validatedData['showtime_start'],
            'showtime_end' => $validatedData['showtime_end'],
            'showtime_date' => $showtime_date,
        ]);

        return redirect()->route('admin_showtime');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $showtime = showtime::findOrFail($id);
        $showtime->delete();
        return redirect()->route('admin_showtime');
    }
}