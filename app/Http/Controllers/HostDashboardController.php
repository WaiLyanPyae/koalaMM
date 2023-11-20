<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HostDashboardController extends Controller
{
    // Show the dashboard
    public function index()
    {
        $listings = Listing::where('user_id', Auth::id())->get();
        return view('auth.host.dashboard', compact('listings'));
    }

    // Show form to create a new listing
    public function create()
    {
        return view('auth.host.listings.create');
    }

    // Store a new listing
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'available_from' => 'required|date',
            'available_to' => 'nullable|date',
            'property_type' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'amenities' => 'required|string',
            'max_guests' => 'required|integer',
            'house_rules' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048', // for multiple images
        ]);

        $listing = new Listing($validatedData);
        $listing->user_id = Auth::id();
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/listings');
                $images[] = $path; // Storing each image path in the array
            }
        }
        $listing->images = json_encode($images); // Assign the array as a JSON string
        $listing->save();

        return redirect()->route('host.dashboard')->with('success', 'Listing created successfully.');
    }

    // Show form to edit an existing listing
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);

        // Ensure images is an array, even when empty
        $listing->images = $listing->images ?? [];

        return view('auth.host.listings.edit', compact('listing'));
    }


    // Update an existing listing
    // public function update(Request $request, $id)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    // 'location' => 'required|string',
    // 'price' => 'required|numeric',
    // 'available_from' => 'required|date',
    // 'available_to' => 'nullable|date',
    // 'property_type' => 'required|string',
    // 'bedrooms' => 'required|integer',
    // 'bathrooms' => 'required|integer',
    // 'amenities' => 'nullable|string',
    // 'max_guests' => 'required|integer',
    // 'house_rules' => 'nullable|string',
    //         'images' => 'nullable|array',
    //         'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048', // for multiple images
    //     ]);

    //     // Find the listing
    //     $listing = Listing::findOrFail($id);

    //     // Update fields manually
    //     $listing->title = $validatedData['title'];
    //     $listing->description = $validatedData['description'];
    //     $listing->location = $validatedData['location'];
    //     $listing->price = $validatedData['price'];
    //     $listing->available_from = $validatedData['available_from'];
    //     $listing->available_to = $validatedData['available_to'];
    //     $listing->property_type = $validatedData['property_type'];
    //     $listing->bedrooms = $validatedData['bedrooms'];
    //     $listing->bathrooms = $validatedData['bathrooms'];
    //     $listing->amenities = $validatedData['amenities'];
    //     $listing->max_guests = $validatedData['max_guests'];
    //     $listing->house_rules = $validatedData['house_rules'];

    //     // Handle images if provided
    //     if ($request->hasFile('images')) {
    //         // Delete old images
    //         $oldImages = json_decode($listing->images, true) ?? [];
    //         foreach ($oldImages as $oldImage) {
    //             Storage::delete($oldImage);
    //         }

    //         // Upload new images
    //         $newImages = [];
    //         foreach ($request->file('images') as $image) {
    //             $path = $image->store('public/listings');
    //             $newImages[] = $path;
    //         }

    //         // Update the images field
    //         $listing->images = json_encode($newImages);
    //     }

    //     // Save the updated listing
    //     $listing->save();

    //     return redirect()->route('host.dashboard')->with('success', 'Listing updated successfully.');
    // }
    public function update(Request $request, $id)
    {
        // Validate the request data for multiple fields
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'property_type' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'amenities' => 'required|string',
            'max_guests' => 'required|integer',
            'house_rules' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'remove_images' => 'nullable|array', // IDs of images to remove
        ]);

        // Find the listing
        $listing = Listing::findOrFail($id);
        // Handle existing images removal
        $currentImages = json_decode($listing->images, true) ?? [];
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $removeImage) {
                if (in_array($removeImage, $currentImages)) {
                    Storage::delete($removeImage);
                    $currentImages = array_diff($currentImages, [$removeImage]);
                }
            }
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/listings');
                $currentImages[] = $path;
            }
        }
        // // Update the fields
        // $listing->title = $validatedData['title'];
        // $listing->description = $validatedData['description'];
        // $listing->location = $validatedData['location'];
        // $listing->price = $validatedData['price'];
        // $listing->property_type = $validatedData['property_type'];
        // $listing->bedrooms = $validatedData['bedrooms'];
        // $listing->bathrooms = $validatedData['bathrooms'];
        // $listing->amenities = $validatedData['amenities'];
        // $listing->max_guests = $validatedData['max_guests'];
        // $listing->house_rules = $validatedData['house_rules'];

        // // Save the updated listing
        // $listing->save();

        $listing->fill($validatedData);
        $listing->images = json_encode($currentImages);
        $listing->save();

        return redirect()->route('host.dashboard')->with('success', 'Listing updated successfully.');
    }

    // Delete a listing
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return redirect()->route('host.dashboard')->with('success', 'Listing deleted successfully.');
    }
}
