<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the 3 most recent listings
        $recentListings = Listing::latest()->take(3)->get();

        // Fetch the 5 latest reviews
        $testimonials = Review::latest()->take(5)->get();

        // Pass both variables to a single view
        return view('landingpage', compact('recentListings', 'testimonials'));
    }

    public function showDash()
    {
        $userId = auth()->id();
        $bookings = Booking::where('user_id', $userId)->get();

        return view('dashboard', compact('bookings'));
    }
}
