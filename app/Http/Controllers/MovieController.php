<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function getMovies()
    {
        $movies = movie::all();
    }
}