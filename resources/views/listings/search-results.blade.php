@extends('layouts.app')

@section('title', 'Search Results')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold text-Primary mb-6 text-center">Search Results</h1>

        {{-- Display search results --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($listings as $listing)
                {{-- Individual listing card --}}
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
            @empty
                <p>No listings found for your search criteria.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $listings->links() }}
        </div>
    </div>
@endsection
