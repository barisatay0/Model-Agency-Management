<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $ip = $request->ip();

        $validatedData = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required|min:4',
        ]);

        if (User::where('username', $request->username)->exists()) {
            return redirect()->back()->withInput()->withErrors(['username' => 'This username already exists.']);
        }

        $user = new User();
        $user->role = 'Moderator';
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->date = now();
        $user->ipaddress = $ip;

        $user->save();

        return redirect('/')->with('success', 'Registration completed successfully.');
    }
}