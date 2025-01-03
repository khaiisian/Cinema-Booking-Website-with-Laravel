<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\seat;
use Illuminate\Http\Request;

class AdminSeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seats = seat::all();
        return view('Admin.admin_seats', compact(['seats']));
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
        $seats = seat::where('seat_id', $id)->with('seat_type', 'theater')->get();

        return response()->json([
            'data' => view('Admin.seat_info', compact('seats'))->render(),
            // 'data' => view('Admin.seat_info', compact('seat'))->render(),
            'seat' => $seats,
            'message' => 'successful',
        ]);
    }
}