<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function updateRole(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Validate the role value
    $request->validate([
        'role' => 'required|integer|in:0,1', // Adjust this as needed
    ]);

    // Update the user's role
    $user->role = $request->input('role');
    $user->save();

    return response()->json(['user' => $user]);
}

    public function disable($id) {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return response()->json([
            "success" => "user updated successfully.",
            "user" => $user,
            "status" => 200
        ]);
    }
    public function enable($id) {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        return response()->json([
            "success" => "user updated successfully.",
            "user" => $user,
            "status" => 200
        ]);
    }

    public function retrieve() {
        $data = User::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    public function check(Request $request) {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Fetch the authenticated user
            $user = Auth::user();
    
            // Check the user's status
            if ($user->status === 0) {
                // If status is 0, prevent login and return an error response
                Auth::logout(); // Log out the user if they are logged in
                return response()->json([
                    'message' => 'Your account is inactive.',
                ], 403); // 403 Forbidden
            }
    
            // Generate a new token for the user
            $token = $user->createToken('authToken')->plainTextToken;
    
            // Return the success response with the token
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'login' => 'success',
            ]);
        } else {
            // If authentication fails, return an error response
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401); // 401 Unauthorized
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
        return view('welcome');
    }
}
