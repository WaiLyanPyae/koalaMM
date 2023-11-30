{{-- resources/views/errors/403.blade.php --}}
@extends('layouts.app')

@section('title', '403 Forbidden')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-6">
    <div class="max-w-lg w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800">403 Forbidden</h1>
            <p class="text-2xl font-semibold text-gray-600">Access denied. You do not have permission to access this page.</p>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mt-4">
                Go Back Home
            </a>
        </div>
    </div>
</div>
@endsection
