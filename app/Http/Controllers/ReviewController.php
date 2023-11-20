<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $listingId)
    {
        $request->validate(['review' => 'required|string']);

        Review::create([
            'user_id' => auth()->id(),
            'listing_id' => $listingId,
            'review' => $request->review,
        ]);

        return back()->with('success', 'Review added successfully.');
    }

    public function index($listingId)
    {
        $reviews = Review::where('listing_id', $listingId)->latest()->get();
        return view('reviews.index', compact('reviews'));
    }
}
