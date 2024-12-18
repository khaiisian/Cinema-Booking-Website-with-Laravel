<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index()
    {
        $genres = genre::all();
        // return view('Customer.movies', compact('genres'));
        return $genres;
    }
}