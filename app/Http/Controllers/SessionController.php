<?php

namespace App\Http\Controllers;

use App\Models\session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function index()
    {
        $todaySessions = session::where('session_date', today())->with('movie', 'theater')->get();
        return view('before_login.bhome', compact('todaySessions'));
    }
}