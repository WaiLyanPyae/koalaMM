@extends('layouts.app')

@section('title', 'Create Listing')

@section('content')
    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <h1 class="text-2xl md:text-3xl font-semibold text-Primary mb-6 text-center">Create New Listing</h1>

        <form action="{{ route('host.listings.store') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="w-full p-2 border rounded" required>
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 border rounded" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}"
                    class="w-full p-2 border rounded" required>
                @error('location')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price per Night ($):</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                    class="w-full p-2 border rounded" required>
                @error('price')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="available_from" class="block text-gray-700 text-sm font-bold mb-2">Available From:</label>
                <input type="date" id="available_from" name="available_from" value="{{ old('available_from') }}"
                    class="w-full p-2 border rounded" required>
                @error('available_from')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="available_to" class="block text-gray-700 text-sm font-bold mb-2">Available To:</label>
                <input type="date" id="available_to" name="available_to" value="{{ old('available_to') }}"
                    class="w-full p-2 border rounded">
                @error('available_to')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="property_type" class="block text-gray-700 text-sm font-bold mb-2">Property Type:</label>
                <select id="property_type" name="property_type" class="w-full p-2 border rounded">
                    <option value="apartment" {{ old('property_type') == 'apartment' ? 'selected' : '' }}>Apartment
                    </option>
                    <option value="house" {{ old('property_type') == 'house' ? 'selected' : '' }}>House</option>
                </select>
                @error('property_type')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bedrooms" class="block text-gray-700 text-sm font-bold mb-2">Bedrooms:</label>
                <input type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}"
                    class="w-full p-2 border rounded" required>
                @error('bedrooms')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bathrooms" class="block text-gray-700 text-sm font-bold mb-2">Bathrooms:</label>
                <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}"
                    class="w-full p-2 border rounded" required>
                @error('bathrooms')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amenities" class="block text-gray-700 text-sm font-bold mb-2">Amenities:</label>
                <textarea id="amenities" name="amenities" rows="3" class="w-full p-2 border rounded">{{ old('amenities') }}</textarea>
                @error('amenities')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="max_guests" class="block text-gray-700 text-sm font-bold mb-2">Max Guests:</label>
                <input type="number" id="max_guests" name="max_guests" value="{{ old('max_guests') }}"
                    class="w-full p-2 border rounded" required>
                @error('max_guests')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="house_rules" class="block text-gray-700 text-sm font-bold mb-2">House Rules:</label>
                <textarea id="house_rules" name="house_rules" rows="3" class="w-full p-2 border rounded">{{ old('house_rules') }}</textarea>
                @error('house_rules')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="term_type" class="block text-gray-700 text-sm font-bold mb-2">Term Type:</label>
                <select id="term_type" name="term_type" class="w-full p-2 border rounded">
                    <option value="short_term" {{ old('term_type') == 'short_term' ? 'selected' : '' }}>Short Term</option>
                    <option value="long_term" {{ old('term_type') == 'long_term' ? 'selected' : '' }}>Long Term</option>
                </select>
                @error('term_type')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Images:</label>
                <input type="file" id="images" name="images[]" multiple class="w-full p-2 border rounded">
                @error('images')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                    Listing</button>
                <a href="{{ route('host.dashboard') }}"
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Return to
                    Dashboard</a>
            </div>
        </form>
    </div>
@endsection
