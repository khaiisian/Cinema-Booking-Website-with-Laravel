<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\seat_type;
use Illuminate\Http\Request;

class AdminSeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seat_types = seat_type::all();
        return view('Admin.admin_seat_type', compact('seat_types'));
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
            'seat_type' => 'required|string|max:255',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        seat_type::create([
            'seat_type' => $validatedData['seat_type'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->route('admin_seat_type');
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
        $seat_type = seat_type::findOrFail($id);
        return view('Admin.seat_type_edit', compact('seat_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'seat_type' => 'required|string|max:255',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $seat_type = seat_type::findOrFail($request->seat_type_id);
        $seat_type->update([
            'seat_type' => $validatedData['seat_type'],
            'price' => $validatedData['price'],
        ]);

        return redirect()->route('admin_seat_type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $seat_type = seat_type::findOrFail($id);
        $seat_type->delete();
        return redirect()->route('admin_seat_type');
    }
}