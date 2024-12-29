<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\theater;
use Illuminate\Http\Request;

class AdminTheaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $theaters = theater::all();
        return view('Admin.admin_theater', compact('theaters'));
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
            'theater_name' => 'required|string|max:255',
            'capacity' => 'required|numeric',
        ]);
        theater::create([
            'theater_name' => $validatedData['theater_name'],
            'capacity' => $validatedData['capacity'],
        ]);
        return redirect()->route('admin_theater');
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
        $theater = theater::findOrFail($id);
        return view('Admin.theater_edit', compact('theater'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'theater_name' => 'required|string|max:255',
            'capacity' => 'required|numeric',
        ]);
        $theater = theater::findOrFail($request->theater_id);
        $theater->update([
            'theater_name' => $validatedData['theater_name'],
            'capacity' => $validatedData['capacity'],
        ]);
        return redirect()->route('admin_theater');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $theater = theater::findOrFail($id);
        $theater->delete();
        return redirect()->route('admin_theater');
    }
}