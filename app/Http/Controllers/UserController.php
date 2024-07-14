<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function check(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if(auth()->attempt(array('email' => $email, 'password' => $password)))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
        }
        else
        {
            return response()->json([ [3] ]);
        }
    }

    public function logout(Request $request) {
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete(); // Revoke all tokens

            Auth::logout(); // Logout the user from the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return view('auth.login');
    }

    public function login() {
        if (Auth::user()->role == 1) {
            return view('home');
        } else {
            return view('welcome');
        }
        
    }
}
