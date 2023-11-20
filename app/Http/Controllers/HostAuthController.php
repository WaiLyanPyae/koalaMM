<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import your User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HostAuthController extends Controller
{
    // Show the host signup form
    public function showSignupForm()
    {
        return view('auth.host.signup');
    }

    // Handle the host signup request
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'host',
        ]);
        // dd($user)
        // Redirect after successful signup
        return redirect('/host/login');
    }

    // Show the host login form
    public function showLoginForm()
    {
        return view('auth.host.login');
    }

    // Handle the host login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'host') {
                return redirect()->intended('/host/dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
