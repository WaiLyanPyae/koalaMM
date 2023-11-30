{{-- resources/views/cancellation-policy.blade.php --}}

@extends('layouts.app')

@section('title', 'Cancellation Policy')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl md:text-4xl font-semibold text-Primary mb-4">Cancellation Policy</h1>
        <div class="bg-white shadow-lg rounded-lg p-6 lg:p-8">
            <h2 class="text-2xl font-bold mb-4">General Cancellation Policy</h2>
            <p class="mb-4">
                We understand that sometimes plans change and flexibility is important. 
                Therefore, we have the following cancellation policy to help accommodate your needs.
            </p>
            <h3 class="text-xl font-semibold mb-3">Flexible Cancellation</h3>
            <p class="mb-4">
                Guests can cancel up to 24 hours before check-in for a full refund. 
                If you cancel less than 24 hours before check-in, the first night plus service fees will be non-refundable.
            </p>
            <h3 class="text-xl font-semibold mb-3">Moderate Cancellation</h3>
            <p class="mb-4">
                Guests can cancel up to 5 days before check-in for a full refund. 
                If you cancel less than 5 days in advance, the first night is non-refundable, 
                but 50% of the accommodation fees for remaining nights will be refunded.
            </p>
            <h3 class="text-xl font-semibold mb-3">Strict Cancellation</h3>
            <p class="mb-4">
                Guests can cancel within 48 hours of booking and at least 14 full days before check-in to receive a full refund. 
                If you cancel less than 14 days in advance, there will be no refund.
            </p>
            <h3 class="text-xl font-semibold mb-3">Special Circumstances</h3>
            <p class="mb-4">
                In case of special circumstances like emergencies or unforeseen situations, 
                please contact us for potential exception considerations.
            </p>
            <p class="mb-4">
                For any further information or clarification regarding our cancellation policy, 
                please contact us at <a href="mailto:admin@koalamama.com" class="text-blue-500 hover:text-blue-700">KoalaMaMa Admin/Support</a>.
            </p>
        </div>
    </div>
@endsection