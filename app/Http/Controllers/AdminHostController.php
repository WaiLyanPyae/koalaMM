<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminHostController extends Controller
{
    public function index()
    {
        // Define the fee per listing
        $feePerListing = 50;

        // Retrieve hosts and their associated listings
        $hosts = User::where('role', 'host')->with('listings')->paginate(10);

        // Calculate the subscription fee and count of listings for each host
        foreach ($hosts as $host) {
            $host->subscription_fee = $host->listings->count() * $feePerListing;
            $host->listings_count = $host->listings->count();
        }

        return view('auth.admin.hosts.index', compact('hosts', 'feePerListing'));
    }

    public function showListings($id)
    {
        $host = User::findOrFail($id);
        $listings = $host->listings;

        return view('auth.admin.hosts.show_listings', compact('host', 'listings'));
    }

    public function create()
    {
        return view('auth.admin.hosts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'host', // Assign the host role directly
        ]);

        return redirect()->route('admin.hosts.index')->with('success', 'Host created successfully.');
    }


    public function edit($id)
    {
        $host = User::findOrFail($id);
        return view('auth.admin.hosts.edit', compact('host'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $host = User::findOrFail($id);

        $host->name = $validatedData['name'];
        $host->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $host->password = Hash::make($validatedData['password']);
        }

        $host->save();

        return redirect()->route('admin.hosts.index')->with('success', 'Host updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.hosts.index')->with('success', 'User deleted successfully.');
    }
}
