@extends('layouts.app')

@section('title', 'Koala MaMa')

@section('content')
    <section class="container relative w-full min-h-screen md:h-screen flex">
        <!-- Background Sliding Images -->
        <div class="absolute inset-0 z-10 slideshow">
            <div class="flex justify-center items-center overflow-hidden h-full slider">
                <!-- Sliding images -->
                <div class="w-full item">
                    <img class="h-full w-auto object-cover slider-background" src="{{ asset('images/hero_1.jpg') }}"
                        alt="">
                </div>
                <div class="w-full item">
                    <img class="h-full w-auto object-cover slider-background" src="{{ asset('images/hero_2.jpg') }}"
                        alt="">
                </div>
                <div class="w-full item">
                    <img class="h-full w-auto object-cover slider-background" src="{{ asset('images/hero_3.jpg') }}"
                        alt="">
                </div>
                <div class="w-full item">
                    <img class="h-full w-auto object-cover slider-background" src="{{ asset('images/hero_4.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>

        <!-- Content Above Background -->
        <div class="absolute inset-0 z-20 flex justify-center items-center top-40">
            <div
                class="glassmorphism-container flex flex-col items-center text-center p-4 md:p-6 rounded-lg max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl mx-auto relative">
                <h2 class="text-Primary text-2xl md:text-3xl lg:text-4xl xl:text-5xl mb-4 md:mb-6">Welcome to Koala MaMa
                </h2>
                <img src="{{ asset('images/logo-no-background.png') }}" alt="Logo"
                    class="w-16 md:w-20 lg:w-24 xl:w-28 mb-3 motion-safe:animate-bounce">
                <p class="text-Secondary text-sm md:text-base lg:text-lg mb-4 md:mb-6">Discover and book amazing stays
                    and experiences.</p>
                <div class="flex justify-center flex-wrap gap-4 md:gap-6">
                    <button type="button" class="btn btn-primary hover:bg-Primary hover:text-Background"><a href="{{ route('listings.index') }}">Explore</a></button>
                </div>
                <!-- Property Search Section -->
                <div class="mt-6">
                    <form action="{{ route('listings.index') }}" method="GET" class="max-w-md mx-auto">
                        @csrf
                        <div class="flex flex-wrap gap-4">
                            <input type="text" name="location" placeholder="Search by location"
                                class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="submit"
                                class="bg-Background hover:bg-Primary hover:text-Background text-white font-bold py-3 px-6 rounded">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End of Property Search Section -->
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="bg-Primary py-12">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-Background">Discover the Story of Koala MaMa</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="order-2 md:order-1">
                    <p class="text-lg md:text-xl mb-6">
                        Koala MaMa began in 2018 as a vision to connect travelers with authentic, local experiences. Our
                        journey,
                        initiated by a group of passionate adventurers, has blossomed into a thriving community marketplace
                        for
                        extraordinary accommodations and experiences worldwide.
                    </p>
                    <p class="mb-6">
                        We're on a mission to make travel joyful and accessible, fostering a sense of belonging wherever you
                        go.
                        Join us in embracing inclusive and sustainable tourism, creating unforgettable moments for both
                        guests and hosts.
                    </p>
                    <a href="{{ route('about') }}"
                        class="inline-block bg-Background text-white hover:bg-Primary-dark px-6 py-3 rounded-full font-bold transition duration-300 shadow-lg">
                        Learn More About Us
                    </a>
                </div>
                <div class="order-1 md:order-2 mb-6 md:mb-0">
                    <!-- Image or Illustration -->
                    <img src="{{ asset('images/logo-color.png') }}" alt="Koala MaMa Story" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>


    <!-- Listings Section -->
    <section class="bg-Background py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-Primary">Explore Our Listings</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($recentListings as $listing)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <!-- Image (Placeholder or actual image) -->
                        <div class="listing-slider">
                            @foreach (json_decode($listing->images, true) as $image)
                                <div>
                                    <img src="{{ Storage::url($image) }}" alt="Listing Image"
                                        class="object-cover h-full w-full rounded">
                                </div>
                            @endforeach
                        </div>

                        <!-- Content -->
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-bold text-Background ">{{ $listing->title }}</h3>
                            <p class="text-Background ">{{ Str::limit($listing->description, 100) }}</p>
                            <div class="mt-2">
                                <span class="text-sm text-Background block mb-2">AUD ${{ $listing->price }}</span>
                                <a href="{{ route('listings.show', $listing->id) }}"
                                    class="inline-block bg-Background text-Primary hover:bg-Primary-dark px-4 py-2 rounded-md text-sm transition duration-300 ease-in-out transform hover:scale-105 shadow">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Explore All Button -->
            <div class="mt-6 flex items-center justify-center">
                <a href="{{ route('listings.index') }}"
                    class="inline-block bg-Primary text-Background hover:bg-Primary-dark hover:text-Background px-6 py-3 rounded-full font-bold transition duration-300 shadow-lg transform hover:scale-110">
                    Explore All
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-Primary py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-Background">What Our Customers Say</h2>
            <div class="flex flex-wrap justify-center">
                @forelse ($testimonials as $testimonial)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg m-4">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $testimonial->user->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $testimonial->review }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p>No testimonials available.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Host Advertisement Section -->
    <section class="bg-Background py-12">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-Primary">Host with Koala MaMa</h2>
            <p class="text-md md:text-lg mb-6 text-Primary">Turn your property into a profitable venture. Join our
                community of hosts and
                start sharing your space with travelers from around the world.</p>

            <div class="flex justify-center flex-wrap gap-4 md:gap-6">
                <a href="{{ route('host.login') }}" class="btn bg-Primary text-Background hover:bg-Primary-dark">Login</a>
                <a href="{{ route('host.signup') }}" class="btn bg-Accent text-Background hover:bg-Accent-dark">Sign Up</a>
            </div>

            <div class="mt-6">
                <p class="italic text-Primary">Not sure where to start? <a href="{{ route('contact') }}"
                        class="text-Primary hover:underline">Contact us</a> and we’ll guide you through the process.</p>
            </div>
        </div>
    </section>
@endsection
