@extends('layouts.app')

@section('title', 'Host Login')

@section('content')
    <div
        style="background-image: url('{{ asset('images/hero_1.jpg') }}'); background-size: cover; background-position: center;">
        <div class="flex h-screen justify-center items-center bg-gray-900 bg-opacity-60 backdrop-blur-md">
            <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
                <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Host Login</h1>
                <form method="POST" action="{{ route('host.login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-Background hover:bg-indigo-700 rounded-lg text-white font-semibold focus:outline-none transition-colors">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
