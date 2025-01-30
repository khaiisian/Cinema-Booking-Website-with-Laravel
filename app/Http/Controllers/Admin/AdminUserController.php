<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('u_type', 'customer')->get();
        $admins = User::where('u_type', 'admin')->get();
        return view('Admin.admin_user', compact('users', 'admins'));
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
        //
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
        $user = User::findOrFail($id);
        return view('Admin.admin_user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        //
        $id = $request->u_id;
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'u_name' => ['required', 'string', 'max:150'],
            'acc_name' => ['required', 'string', 'max:150'],
        ]);

        $user->update([
            'u_name' => $validatedData['u_name'],
            'acc_name' => $validatedData['acc_name'],
        ]);

        if ($request->password == null && $request->email != $user->email) {
            $validatedData = $request->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            ]);
            $user->update([
                'email' => $validatedData['email'],
            ]);
        } else if ($request->password != null && $request->email != $user->email) {
            $validatedData = $request->validate([
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required' | 'confirmed', Rules\Password::defaults()],
            ]);
            $user->update([
                'u_name' => $validatedData['u_name'],
                'acc_name' => $validatedData['acc_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
        }

        return redirect()->route('admin_users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin_users');
    }
}