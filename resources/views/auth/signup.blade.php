@extends('layouts.app')

@section('title', 'User Sign Up')
@section('content')
    <div
        style="background-image: url('{{ asset('images/hero_1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="flex h-screen bg-gray-900 bg-opacity-60 backdrop-blur-sm">
            <div class="m-auto bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">User Sign Up</h1>

                <form action="{{ route('signup') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="text" name="name" placeholder="Name"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="email" name="email" placeholder="Email"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="password" name="password" placeholder="Password"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit"
                        class="w-full bg-Background hover:bg-Background text-white font-bold py-3 px-4 rounded">Sign
                        Up</button>
                </form>

                <p class="text-center mt-6 text-sm text-gray-500">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-Background hover:text-blue-600">Login</a>
                </p>
            </div>
        </div>
    </div>

@endsection
