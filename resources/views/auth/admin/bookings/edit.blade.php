{{-- resources/views/admin/bookings/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold text-Primary mb-6">Edit Booking</h1>

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

    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Booking Details Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="start_date" class="block text-Primary text-sm font-bold mb-2">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="{{ $booking->start_date->format('Y-m-d') }}" class="shadow border rounded w-full py-2 px-3 text-Background focus:outline-none" required>
            </div>
            <div>
                <label for="end_date" class="block text-Primary text-sm font-bold mb-2">End Date:</label>
                <input type="date" id="end_date" name="end_date" value="{{ $booking->end_date->format('Y-m-d') }}" class="shadow border rounded w-full py-2 px-3 text-Background focus:outline-none" required>
            </div>
        </div>

        <!-- Update Button -->
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Booking
            </button>
        </div>
    </form>
</div>
@endsection
