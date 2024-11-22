<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index()
    {

        $movies = movie::all();

        $genres = genre::all();

        return view('before_login.movies', compact('movies', 'genres'));
    }

    public function ajax(Request $request)
    {
        $status = $request->status;

        $movies = movie::all();

        if ($status) {
            $movies = movie::where('movie_status', $status)->get();
        }

        return response()->json([
            'movies' => $movies, // You can return the filtered movies if needed
        ]);
    }
}