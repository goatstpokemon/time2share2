<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;

            if ($request->expectsJson()) {
                return response()->json([
                    'token' => $token
                ]);
            } else {
                $request->session()->regenerate();
                return redirect('/');
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Invalid login credentials'
            ], 401);
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->expectsJson()) {
            $request->user()->tokens()->delete();
            return response()->json([
                'success' => 'Registration successful',
                'token' => $user->createToken('authToken')->plainTextToken,
            ]);
        } else {
            return redirect('/')->with([
                'success' => 'Registration successful',
                'token' => $user->createToken('authToken')->plainTextToken,
            ]);
        }
    }
    public function logout(Request $request)
    {


        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
