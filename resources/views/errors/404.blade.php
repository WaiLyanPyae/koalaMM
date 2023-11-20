{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-6">
    <div class="max-w-lg w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800">404</h1>
            <p class="text-2xl font-semibold text-gray-600">Page Not Found</p>
        </div>
        <div class="mt-6 text-center">
            <p class="text-gray-600">Sorry, we couldn't find the page you're looking for.</p>
            <a href="{{ url('/') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mt-4">
                Go Back Home
            </a>
        </div>
    </div>
</div>
@endsection
