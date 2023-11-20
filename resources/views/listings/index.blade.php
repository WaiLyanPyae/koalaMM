@extends('layouts.app')

@section('title', 'Browse Listings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold text-Primary mb-6 text-center">Explore Listings</h1>

        {{-- Filter Section --}}
        <div class="mb-6">
            <form action="{{ route('listings.index') }}" method="GET">
                <input type="text" name="location" placeholder="Search by location" class="border rounded py-2 px-4">
                <button type="submit" class="bg-Primary hover:bg-Background hover:text-Primary hover:border-white hover:border-2 text-Background font-bold py-2 px-4 rounded">
                    Search
                </button>
            </form>                     
        </div>
        @if ($listings->isEmpty())
            <p>No listings found for the specified location.</p>
        @endif

        {{-- Listings Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($listings as $listing)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    {{-- Image Slider --}}
                    <div class="listing-slider">
                        @foreach (json_decode($listing->images, true) as $image)
                            <div>
                                <img src="{{ Storage::url($image) }}" alt="Listing Image"
                                    class="object-cover h-full w-full rounded">
                            </div>
                        @endforeach
                    </div>
                    {{-- Content --}}
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-bold text-gray-800">{{ $listing->title }}</h3>
                        <p class="text-gray-600">{{ Str::limit($listing->description, 100) }}</p>
                        <div class="mt-2">
                            <span class="text-sm text-gray-600 block mb-2">AUD ${{ $listing->price }}</span>
                            <a href="{{ route('listings.show', $listing->id) }}"
                                class="inline-block bg-Background text-Primary hover:bg-Primary-dark px-4 py-2 rounded-md text-sm transition duration-300 ease-in-out transform hover:scale-105 shadow">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $listings->links() }} {{-- Tailwind styled pagination --}}
        </div>
    </div>
@endsection
