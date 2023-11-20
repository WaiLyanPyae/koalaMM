@extends('layouts.app')

@section('title', 'User Login')

@section('content')
    <div
        style="background-image: url('{{ asset('images/hero_1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="flex h-screen bg-gray-900 bg-opacity-60 backdrop-blur-sm">
            <div class="m-auto bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">User Login</h1>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="email" name="email" placeholder="Email"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="password" name="password" placeholder="Password"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit"
                        class="w-full bg-Background hover:bg-Background text-white font-bold py-3 px-4 rounded">Login</button>
                </form>

                <p class="text-center mt-6 text-sm text-gray-500">
                    Don't have an account? <a href="{{ route('signup') }}" class="text-Background hover:text-blue-600">Sign
                        Up</a>
                </p>
            </div>
        </div>
    </div>
@endsection
