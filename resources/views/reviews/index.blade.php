@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold mb-6">Reviews</h1>

        @forelse ($reviews as $review)
            <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                <strong class="font-bold">{{ $review->user->name }}</strong>
                <p>{{ $review->review }}</p>
            </div>
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </div>
@endsection
