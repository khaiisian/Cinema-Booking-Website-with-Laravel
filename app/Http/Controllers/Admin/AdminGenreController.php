<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\genre;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $genres = genre::all();
        return view('Admin.admin_genres', compact('genres'));
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
            'genre' => 'required|string|max:255',
            'genre_description' => 'required|string|max:255'
        ]);
        genre::create([
            'genre' => $validatedData['genre'],
            'genre_description' => $validatedData['genre_description']
        ]);

        return redirect()->route('admin_genre');
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
        $genre = genre::findOrFail($id);
        return view('Admin.genre_edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'genre' => 'required|string|max:255',
            'genre_description' => 'required|string|max:255'
        ]);
        $genre = genre::findOrFail($request->genre_id);
        $genre->update([
            'genre' => $validatedData['genre'],
            'genre_description' => $validatedData['genre_description'],
        ]);

        return redirect()->route('admin_genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $genre = genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('admin_genre');
    }
}