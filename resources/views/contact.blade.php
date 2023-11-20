@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <section class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4 text-Primary text-center">Contact Us</h1>
        <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="4" class="mt-1 p-2 w-full border rounded-md" required></textarea>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-Background text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection