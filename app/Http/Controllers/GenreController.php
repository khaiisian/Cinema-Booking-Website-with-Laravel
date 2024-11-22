<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index()
    {
        $genres = genre::all();
        // return view('before_login.movies', compact('genres'));
        return $genres;
    }
}