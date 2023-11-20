{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Us - Koala MaMa')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Hero Section -->
        <div class="text-center mb-10 bg-hero-pattern bg-cover bg-center h-64 flex items-center justify-center relative"
            style="background-image: url({{ asset('images/hero_3.jpg') }});">
            <!-- Glassmorphism Effect Layer -->
            <div class="absolute inset-0 bg-white/30 backdrop-blur-sm"></div>

            <!-- Content -->
            <div class="relative z-10">
                <h1 class="text-4xl font-bold text-Primary mb-3">About Koala MaMa</h1>
                <p class="text-lg text-white">Embark on a Journey of Discovery with Us</p>
            </div>
        </div>

        <!-- History Section -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-Primary mb-5">Our Journey</h2>
            <p class="text-Primary mb-4">It all began in a quaint Melbourne café back in 2018. A group of travel enthusiasts,
                united by a shared passion for exploration and sustainability, laid the foundation of what would become
                Koala MaMa. Their vision: to revolutionize the travel experience by intertwining the comforts of home with
                the thrill of discovery.</p>
            <p class="text-Primary">Today, Koala MaMa stands as a beacon for sustainable tourism, offering a tapestry of
                unique accommodations and experiences across Australia, each telling its own story and offering a window
                into the local culture.</p>
        </section>

        <!-- Mission Section -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-Primary mb-5">Our Mission</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 pr-4 mb-6 md:mb-0">
                    <p class="text-Primary">Our mission is simple yet profound: To craft journeys that are not just trips,
                        but transformative experiences. At Koala MaMa, we believe travel should be more than just visiting a
                        place; it should be an immersion into new worlds, cultures, and ideas. We're dedicated to making
                        travel both accessible and meaningful, connecting you with the heart of destinations while
                        respecting their unique natural and cultural landscapes.</p>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/logo-color.png') }}" alt="Our Mission" class="rounded-lg shadow-xl">
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-Primary mb-5">Our Core Values</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow text-center hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-bold text-Background mb-2">Sustainability</h3>
                    <p class="text-Background">At the forefront of our ethos is sustainability. We champion eco-friendly
                        travel, encouraging and facilitating practices that respect and preserve the beauty and integrity of
                        nature and local cultures.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow text-center hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-bold text-Background mb-2">Community</h3>
                    <p class="text-Background">Community is the heart of Koala MaMa. We're committed to building and
                        nurturing strong connections, creating a network of travelers and hosts who share, learn, and grow
                        together, fostering a global family.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow text-center hover:shadow-lg transition-shadow duration-300">
                    <h3 class="text-lg font-bold text-Background mb-2">Inclusivity</h3>
                    <p class="text-Background">Diversity and inclusivity are the cornerstones of our philosophy. We strive
                        to create a welcoming space for all, celebrating the rich tapestry of cultures, perspectives, and
                        experiences that our travelers and hosts bring to the Koala MaMa community.</p>
                </div>
            </div>
        </section>
    </div>
@endsection
