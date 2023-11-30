{{-- resources/views/auth/host/listings/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Listing')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4 text-Primary">Edit Listing</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('host.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-bold mb-2 text-Primary">Title:</label>
                <input type="text" id="title" name="title" value="{{ $listing->title }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2 text-Primary">Description:</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md">{{ $listing->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-bold mb-2 text-Primary">Location:</label>
                <input type="text" id="location" name="location" value="{{ $listing->location }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-bold mb-2 text-Primary">Price:</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ $listing->price }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="available_from" class="block text-sm font-bold mb-2 text-Primary">Available From:</label>
                <input type="date" id="available_from" name="available_from" value="{{ $listing->available_from->format('Y-m-d') }}"
                       class="w-full p-2 border rounded" required>
                @error('available_from')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="available_to" class="block text-sm font-bold mb-2 text-Primary">Available To:</label>
                <input type="date" id="available_to" name="available_to" value="{{ $listing->available_to ? $listing->available_to->format('Y-m-d') : '' }}"
                       class="w-full p-2 border rounded">
                @error('available_to')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Property Type -->
            <div class="mb-4">
                <label for="property_type" class="block text-sm font-bold mb-2 text-Primary">Property Type:</label>
                <input type="text" id="property_type" name="property_type" value="{{ $listing->property_type }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('property_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bedrooms -->
            <div class="mb-4">
                <label for="bedrooms" class="block text-sm font-bold mb-2 text-Primary">Bedrooms:</label>
                <input type="number" id="bedrooms" name="bedrooms" value="{{ $listing->bedrooms }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('bedrooms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bathrooms -->
            <div class="mb-4">
                <label for="bathrooms" class="block text-sm font-bold mb-2 text-Primary">Bathrooms:</label>
                <input type="number" id="bathrooms" name="bathrooms" value="{{ $listing->bathrooms }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('bathrooms')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amenities -->
            <div class="mb-4">
                <label for="amenities" class="block text-sm font-bold mb-2 text-Primary">Amenities:</label>
                <textarea id="amenities" name="amenities" rows="2" class="w-full p-2 border border-gray-300 rounded-md">{{ $listing->amenities }}</textarea>
                @error('amenities')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Max Guests -->
            <div class="mb-4">
                <label for="max_guests" class="block text-sm font-bold mb-2 text-Primary">Max Guests:</label>
                <input type="number" id="max_guests" name="max_guests" value="{{ $listing->max_guests }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
                @error('max_guests')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- House Rules -->
            <div class="mb-4">
                <label for="house_rules" class="block text-sm font-bold mb-2 text-Primary">House Rules:</label>
                <textarea id="house_rules" name="house_rules" rows="3" class="w-full p-2 border border-gray-300 rounded-md">{{ $listing->house_rules }}</textarea>
                @error('house_rules')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Term Type (Long term / Short term) -->
            <div class="mb-4">
                <label for="term_type" class="block text-sm font-bold mb-2 text-Primary">Term Type:</label>
                <select id="term_type" name="term_type" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="short_term" {{ $listing->term_type == 'short_term' ? 'selected' : '' }}>Short Term
                    </option>
                    <option value="long_term" {{ $listing->term_type == 'long_term' ? 'selected' : '' }}>Long Term
                    </option>
                </select>
                @error('term_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Display Current Images with Removal Option --}}
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2 text-Primary">Current Images:</label>
                <div class="flex space-x-2">
                    @php
                        $images = json_decode($listing->images, true);
                    @endphp
                    @if ($images && is_array($images))
                        @foreach ($images as $image)
                            <div class="relative">
                                <img src="{{ Storage::url($image) }}" alt="Image"
                                    class="w-32 h-32 object-cover rounded-md">
                                <input type="checkbox" name="remove_images[]" value="{{ $image }}"> Remove
                            </div>
                        @endforeach
                    @else
                        <p>No images available.</p>
                    @endif
                </div>
            </div>

            <!-- Images Upload -->
            <div class="mb-4">
                <label for="images" class="block text-sm font-bold mb-2 text-Primary">Update Images:</label>
                <input type="file" id="images" name="images[]" multiple
                    class="w-full p-2 border border-gray-300 rounded-md">
                <!-- Inform users how they can manage images -->
                @error('images')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                    Listing</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="{{ route('host.dashboard') }}">
                        Return to Dashboard
                    </a>
                </button>
            </div>
        </form>
    </div>
@endsection
