@extends('layouts.app')

@section('title', $listing->title)

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl md:text-4xl font-semibold text-Primary mb-4">{{ $listing->title }}</h1>

        {{-- Image Slider --}}
        <div class="mb-8">
            @if ($listing->images && is_array(json_decode($listing->images, true)))
                <div class="listing-slider slider-detail">
                    @foreach (json_decode($listing->images, true) as $image)
                        <div
                            class="shadow-xl rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ Storage::url($image) }}" alt="Listing Image" class="object-cover w-full h-64 md:h-96">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Listing Details --}}
        <div class="bg-Primary shadow-lg rounded-lg p-6 lg:p-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-Background mb-4">Details</h2>
                    <p class="text-Background">{{ $listing->description }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-Background mb-3">At a Glance</h3>
                    <ul class="list-none space-y-3 text-Background">
                        <li><i class="fas fa-map-marker-alt mr-2"></i><strong>Location:</strong> {{ $listing->location }}
                        </li>
                        <li><i class="fas fa-dollar-sign mr-2"></i><strong>Price:</strong> AUD {{ $listing->price }}</li>
                        <li><i class="fas fa-building mr-2"></i><strong>Property Type:</strong>
                            {{ ucwords($listing->property_type) }}</li>
                        <li><i class="fas fa-bed mr-2"></i><strong>Bedrooms:</strong> {{ $listing->bedrooms }}</li>
                        <li><i class="fas fa-bath mr-2"></i><strong>Bathrooms:</strong> {{ $listing->bathrooms }}</li>
                        <li><i class="fas fa-users mr-2"></i><strong>Max Guests:</strong> {{ $listing->max_guests }}</li>
                        <li>
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <strong>Available From:</strong>
                            {{ \Carbon\Carbon::parse($listing->available_from)->format('M d, Y') }}
                        </li>

                        @if ($listing->available_to)
                            <li>
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <strong>Available To:</strong>
                                {{ \Carbon\Carbon::parse($listing->available_to)->format('M d, Y') }}
                            </li>
                        @endif
                        <li>
                            <i class="fas fa-user mr-2"></i>
                            <strong>Host:</strong> {{ $listing->user->name }}
                        </li>
                        <li>
                            {{-- <i class="fas fa-envelope mr-2"></i>
                            <strong>Email:</strong> {{ $listing->user->email }} --}}
                            <a href="mailto:{{ $listing->user->email }}" class="mr-2 text-Background hover:text-blue-700">
                                <i class="fas fa-paper-plane"></i> Contact
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-clock mr-2"></i>
                            <strong>Term Type:</strong> {{ Str::title(str_replace('_', ' ', $listing->term_type)) }}
                        </li>                        
                    </ul>
                </div>
            </div>

            {{-- Amenities and House Rules --}}
            @if ($listing->amenities)
                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-Background mb-3">Amenities</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach (explode(',', $listing->amenities) as $amenity)
                            <span
                                class="bg-Background text-Primary px-3 py-1 rounded-full text-sm">{{ $amenity }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($listing->house_rules)
                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-Background mb-3">House Rules</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach (explode(',', $listing->house_rules) as $house_rule)
                            <span
                                class="bg-Background text-Primary px-3 py-1 rounded-full text-sm">{{ $house_rule }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- Booking Form --}}
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-Primary mb-4">Booking</h2>

            <form action="{{ route('bookings.store') }}" method="POST"
                class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 mt-6">
                @csrf
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">

                {{-- Date Inputs --}}
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
                        <input type="date" id="start_date" name="start_date"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" required>
                    </div>

                    <div>
                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
                        <input type="date" id="end_date" name="end_date"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none" required>
                    </div>
                </div>

                {{-- Book Now Button --}}
                <div class="text-center mb-4">
                    <button type="submit"
                        class="bg-Background text-white text-lg font-bold py-3 px-6 rounded-full focus:outline-none shadow-md transition duration-300 hover:bg-gradient-to-r from-Background to-Background hover:scale-105">
                        Book Now
                    </button>
                </div>

                {{-- Cancellation Policy Link --}}
                <div class="text-center">
                    <a href="{{ route('cancellation-policy') }}" class="text-blue-500 hover:text-blue-700">
                        View Cancellation Policy
                    </a>
                </div>
            </form>
        </div>

        {{-- Review Section --}}
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-Primary mb-4">Reviews</h2>
        
            {{-- Review Submission Form --}}
            @if (auth()->check())
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <form action="{{ route('reviews.store', $listing->id) }}" method="POST">
                        @csrf
                        <textarea name="review" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-Primary"
                                  placeholder="Write a review" required></textarea>
                        <div class="text-center mt-4">
                            <button type="submit"
                                    class="bg-Background text-white text-lg font-bold py-2 px-6 rounded-lg focus:outline-none shadow transition duration-300 hover:bg-gradient-to-r from-Background to-Background hover:scale-105">
                                Submit Review
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        
            {{-- Displaying Reviews --}}
            @forelse ($listing->reviews as $review)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4 flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-circle text-Background text-5xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg text-Background mb-2">{{ $review->user->name }}</h3>
                        <p class="text-gray-600">{{ $review->review }}</p>
                    </div>
                </div>
            @empty
                <p class="text-Primary">No reviews yet.</p>
            @endforelse
        </div>

    </div>
@endsection
