<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /* Register */
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

        return redirect('/');
    }
    /* Login */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['login' => 'Login failed, please check your username and password again.']);
        }
    }
    /* Logout */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/Login');
    }
}
