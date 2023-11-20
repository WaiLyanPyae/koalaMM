<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->route('landing'); // Redirect to the landing page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
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
        ]);
        // Optional: Add a flash message for successful signup
        session()->flash('success', 'Signup successful. Please login.');

        // Redirect to the login page
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function update(Request $request) {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'password' => 'nullable|min:6',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Update the user's name
        $user->name = $validatedData['name'];
    
        // Update the password if provided
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        // Save the changes
        $user->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'User information updated successfully.');
    }    
}
