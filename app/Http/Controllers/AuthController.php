<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            $message = "Giriş başarılı. Hoş geldiniz, " . auth()->user()->username . "!";
            return redirect('/')->with('success', $message);
        }

        $errorMessage = 'Invalid credentials.';
        return redirect()->back()->withInput()->withErrors(['loginError' => $errorMessage]);
    }
}

