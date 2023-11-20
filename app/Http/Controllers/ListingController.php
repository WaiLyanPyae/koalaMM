<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        // Check if a search query is provided in the request
        $searchTerm = $request->input('location', '');
    
        // Validate the input
        $request->validate([
            'location' => 'string|max:255',
        ]);
    
        // Query listings based on the search term
        $listings = Listing::when($searchTerm, function ($query) use ($searchTerm) {
            return $query->where('location', 'like', '%' . $searchTerm . '%');
        })->paginate(10);
    
        return view('listings.index', compact('listings'));
    }
    

    public function show($id)
    {
        $listing = Listing::with('user')->findOrFail($id);
        return view('listings.show', compact('listing'));
    }

    public function search(Request $request)
    {
        return "Search route is working";
        // $searchTerm = $request->input('location', '');

        // // Validate the input
        // $request->validate([
        //     'location' => 'string|max:255',
        // ]);

        // $listings = Listing::where('location', 'like', '%' . $searchTerm . '%')->paginate(10);

        // return view('listings.search-results', compact('listings'));
    }
}
