<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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

        return view('Customer.movies', compact('movies', 'genres'));
    }

    public function ajax(Request $request)
    {
        $status = $request->status;
        $genre_id = $request->genre_id;
        $search_value = $request->search_value;

        // $movies = movie::all();

        // if ($genre_id == 0) {
        //     if ($status and !$search_value) {
        //         $movies = movie::where('movie_status', $status)->get();
        //         // $movies = movie::where('movie_status', '=', $status)->get();
        //     } elseif ($status and $search_value) {
        //         $movies = movie::where('movie_status', $status)
        //             ->where(function ($query) use ($search_value) {
        //                 $query->where('movie_title', '=', $search_value)
        //                     ->orWhere('movie_title', 'LIKE', "%$search_value%");
        //             })
        //             ->get();
        //     } elseif (!$status and $search_value) {
        //         $movies = movie::where('movie_title', '=', $search_value)
        //             ->orWhere('movie_title', 'LIKE', "%$search_value%")
        //             ->get();
        //     } else {
        //         $movies = movie::with('genres')->get();
        //     }
        // }




        // if ($search_value) {
        //     $movies = movie::where('movie_title', $search_value)->get();
        // }

        // $movies = movie::where('movie_status', "Upcoming")->with('genres')->get();

        // $genre_id=2;
        // $movies = movie::where('movie_status', "Nowshowing")->whereHas('genres', function ($query) use ($genre_id) {$query->where('genre_id', $genre_id);})->with('genres')->get();

        // $genre_id = 10;
        // $movies = movie::where('movie_status', 'Upcoming')->whereHas('genres', function ($query) use ($genre_id) {
        //     $query->where('genres.genre_id', $genre_id);
        // })->with('genres')->get();




        if ($status and !$search_value) {
            if ($genre_id == 0) {
                $movies = movie::where('movie_status', $status)
                    ->with('genres')
                    ->get();
            } else {
                $movies = movie::where('movie_status', $status)
                    ->whereHas('genres', function ($query) use ($genre_id) {
                        $query->where('genres.genre_id', $genre_id);
                    })->with('genres')->get();
            }

        } elseif ($status and $search_value) {
            if ($genre_id == 0) {
                $movies = movie::where('movie_status', $status)
                    ->where(function ($query) use ($search_value) {
                        $query->where('movie_title', '=', $search_value)
                            ->orWhere('movie_title', 'LIKE', "%$search_value%");
                    })
                    ->with('genres')
                    ->get();
            } else {
                $movies = movie::where('movie_status', $status)
                    ->where(function ($query) use ($search_value) {
                        $query->where('movie_title', '=', $search_value)
                            ->orWhere('movie_title', 'LIKE', "%$search_value%");
                    })
                    ->whereHas('genres', function ($query) use ($genre_id) {
                        $query->where('genres.genre_id', $genre_id);
                    })
                    ->with('genres')
                    ->get();
            }
        } elseif (!$status and $search_value) {
            if ($genre_id == 0) {
                $movies = movie::where('movie_title', '=', $search_value)
                    ->orWhere('movie_title', 'LIKE', "%$search_value%")
                    ->with('genres')
                    ->get();
            } else {
                $movies = movie::where('movie_title', '=', $search_value)
                    ->orWhere('movie_title', 'LIKE', "%$search_value%")
                    ->whereHas('genres', function ($query) use ($genre_id) {
                        $query->where('genres.genre_id', $genre_id);
                    })
                    ->with('genres')
                    ->get();
            }
        } else {
            if ($genre_id == 0) {
                $movies = movie::with('genres')->get();
            } else {
                $movies = movie::whereHas('genres', function ($query) use ($genre_id) {
                    $query->where('genres.genre_id', $genre_id);
                })->with('genres')->get();
            }
        }

        // return response()->json([
        //     'movies' => $movies, // You can return the filtered movies if needed
        // ]);

        return response()->json([
            'data' => view('Customer.movie_data', compact('movies'))->render(),
        ]);
    }
}