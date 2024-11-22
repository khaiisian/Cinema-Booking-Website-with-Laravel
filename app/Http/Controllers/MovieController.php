<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index(Request $request)
    {
        $status = $request->status;
        $allmvovies = movie::all();

        $movies = movie::all();

        $genres = genre::all();

        return view('before_login.movies', compact('allmovies', 'movies', 'genres'));
    }
}