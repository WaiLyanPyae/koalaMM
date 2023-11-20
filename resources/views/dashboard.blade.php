@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-Primary mb-8 text-center">Your Dashboard</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Whoops!</strong>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- User Details Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-Background mb-4">Update Profile</h2>
            <form action="{{ route('user.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-Background mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                        class="block w-full px-4 py-2 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-Background mb-2">New Password
                        (optional):</label>
                    <input type="password" id="password" name="password"
                        class="block w-full px-4 py-2 border rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>

                <button type="submit"
                    class="bg-Background hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Update Profile
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            @if (Auth::user()->isSuperuser())
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-block bg-Primary hover:bg-indigo-600 hover:text-Primary text-Background py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Manage Your Dashboard
                </a>
            @else
                <a href="{{ route('bookings.index') }}"
                    class="inline-block bg-Primary hover:bg-indigo-600 hover:text-Primary text-Background py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Manage Your Bookings
                </a>
            @endif
        </div>

        <!-- Display "Manage Your Listings" for Hosts -->
        <div class="text-center mt-6">
            @if (Auth::user()->isHost())
                <a href="{{ route('host.dashboard') }}"
                    class="inline-block bg-Primary hover:bg-indigo-600 hover:text-Primary text-Background py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Manage Your Listings
                </a>
            @else
                {{-- <a href="{{ route('bookings.index') }}"
                    class="inline-block bg-Primary hover:bg-indigo-600 hover:text-Primary text-Background py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    Manage Your Bookings
                </a> --}}
            @endif
        </div>


        {{-- <!-- Booking Listings -->
        <div class="mt-10">
            <h2 class="text-2xl font-semibold text-Primary mb-4">Your Bookings</h2>
            <div class="space-y-4">
                @forelse ($bookings as $booking)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h3 class="text-xl font-bold">{{ $booking->listing->title }}</h3>
                        <p>Date: {{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}
                        </p>
                        <p>Total Price: ${{ $booking->total_price }}</p>
                        <p>Status: {{ ucfirst($booking->status) }}</p>
                        <!-- Actions -->
                        <div class="flex space-x-2 mt-3">
                            <a href="{{ route('bookings.edit', $booking->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Edit</a>
                            <a href="{{ route('bookings.pay', $booking->id) }}"
                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Pay</a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>No bookings found.</p>
                @endforelse
            </div>
        </div> --}}
    </div>
@endsection
