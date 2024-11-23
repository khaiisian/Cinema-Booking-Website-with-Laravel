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
        $search_value = $request->search_value;

        $movies = movie::all();

        if ($status and !$search_value) {
            $movies = movie::where('movie_status', $status)->get();
        } elseif ($status and $search_value) {
            $movies = movie::where('movie_status', $status)
                ->where('movie_title', $search_value)
                ->get();
        } elseif (!$status and $search_value) {
            $movies = movie::where('movie_title', $search_value)->get();
        }

        // if ($search_value) {
        //     $movies = movie::where('movie_title', $search_value)->get();
        // }

        return response()->json([
            'movies' => $movies, // You can return the filtered movies if needed
        ]);
    }
}