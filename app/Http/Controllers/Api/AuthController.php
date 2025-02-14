<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = User::where('email', $request->email)->first();
        // email check
        if (!$email) {
            return response()->json([
                'status' => 'error',
                'message' => 'User Email not found'
            ], 404);
        }
        // password check
        $password = Hash::check($request->password, $email->password);

        if (!$password) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password is not match'
            ], 404);
        }

        // pass
        $token = $email->createToken('token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $email
        ]);

    }

    function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'logout successfully'
        ]);

    }
}
