<?php

namespace App\Http\Controllers;

use App\Models\contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatUsController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'subject' => 'required|min:3|max:50',
        //     'message' => 'required|min:10'
        // ]);

        $contact_title = $request->subject;
        $contact_msg = $request->message;
        $uid = Auth::id();

        contactus::create([
            'contact_title' => $contact_title,
            'contact_msg' => $contact_msg,
            'u_id' => $uid,
        ]);

        // return response()->json(['message' => 'Feedback submitted successfully!']);
        return redirect('contactus');
    }
}