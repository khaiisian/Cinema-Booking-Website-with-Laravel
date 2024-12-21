<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = movie::with('genres')->get();
        $genres = genre::all();
        return view('Admin.admin_movie', compact('movies', 'genres'));
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
        $validatedData = $request->validate([
            'movie_title' => 'required|string|max:255',
            'movie_content' => 'required|string|max:255',
            'movie_image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'movie_duration' => 'required|numeric|min:1',
            'release_date' => 'required|date',
            'status' => 'required|in:Showing,Upcoming',
            'genres' => 'required|array',
            'genres.*' => 'not_in:0|integer',
            'age_rating' => 'required|string|max:255',
        ]);

        $releaseDate = Carbon::createFromFormat('m/d/Y', $validatedData['release_date'])->format('Y-m-d');
        $movie_image = $validatedData['movie_image']->getClientOriginalName();

        $movie = movie::create([
            'movie_title' => $validatedData['movie_title'],
            'movie_content' => $validatedData['movie_content'],
            'movie_image' => $movie_image,
            'movie_duration' => $validatedData['movie_duration'],
            'release_date' => $releaseDate,
            'movie_status' => $validatedData['status'],
            'age_rating' => $validatedData['age_rating'],
        ]);

        if ($movie) {
            $destinationPath = 'images';
            $validatedData['movie_image']->move($destinationPath, $validatedData['movie_image']->getClientOriginalName());
        }

        $genres = $validatedData['genres'];
        foreach ($genres as $genre) {
            $movie->genres()->attach($genre);
        }


        // session()->put('message', 'Form submitted successfully!');
        // $request->session()->put('validatedData', $validatedData);
        return redirect()->route('admin_movie');
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
        $genres = genre::all();
        $movie = movie::findOrFail($id);
        return view('Admin.movie_edit', compact('genres', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'movie_title' => 'required|string|max:255',
            'movie_content' => 'required|string|max:255',
            'movie_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'movie_duration' => 'required|numeric|min:1',
            'release_date' => 'required|date',
            'status' => 'required|in:Showing,Upcoming',
            'genres' => 'required|array',
            'genres.*' => 'not_in:0|integer',
            'age_rating' => 'required|string|max:255',
        ]);

        $movie = movie::findOrFail($request->movie_id);

        if (!$request->hasFile('movie_image')) {
            $movie_image = $movie->movie_image;
            $movie->update([
                'movie_title' => $validatedData['movie_title'],
                'movie_content' => $validatedData['movie_content'],
                'movie_duration' => $validatedData['movie_duration'],
                'release_date' => $validatedData['release_date'],
                'movie_status' => $validatedData['status'],
                'age_rating' => $validatedData['age_rating'],
                'movie_image' => $movie_image,
            ]);
        } else {
            $pre_image = $movie->movie_image;
            $movie_image = $validatedData['movie_image']->getClientOriginalName();
            $movie->update([
                'movie_title' => $validatedData['movie_title'],
                'movie_content' => $validatedData['movie_content'],
                'movie_duration' => $validatedData['movie_duration'],
                'release_date' => $validatedData['release_date'],
                'movie_status' => $validatedData['status'],
                'age_rating' => $validatedData['age_rating'],
                'movie_image' => $movie_image,
            ]);

            $destinationPath = 'images';
            $validatedData['movie_image']->move($destinationPath, $movie_image);

            $old_path = public_path('images/' . $pre_image);

            if (File::exists($old_path)) {
                File::delete($old_path);
            }
        }

        $genres = $validatedData['genres'];
        $movie->genres()->sync($genres);

        return redirect()->route('admin_movie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $movie = movie::findOrFail($id);
        $movie_image = $movie->movie_image;
        $path = public_path('images/' . $movie_image);

        if (File::exists($path)) {
            File::delete($path);
        }

        $movie->delete();
        return redirect()->route('admin_movie');
    }
}