{{-- resources/views/bookings/index.blade.php --}}
@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-primary mb-6 text-center text-Primary">My Bookings</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($bookings as $booking)
                <div class="bg-white shadow-md hover:shadow-lg rounded-lg overflow-hidden transition-shadow duration-300">
                    <div class="p-5">
                        <h2 class="text-2xl text-Background font-bold ttext-Background mb-3">{{ $booking->listing->title }}
                        </h2>
                        <p class="text-Background mb-2"><i class="fas fa-map-marker-alt"></i>
                            {{ $booking->listing->location }}
                        </p>
                        <p class="text-Background mb-2"><i class="fas fa-calendar-alt"></i>
                            {{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}</p>
                        <p class="text-Background mb-4"><i class="fas fa-dollar-sign"></i> {{ $booking->total_price }}</p>
                        <p class="text-Background mb-3"><i class="fas fa-credit-card"></i>
                            @switch($booking->status)
                                @case('confirmed')
                                    <i class="fas fa-check-circle text-green-500"></i> Confirmed
                                @break

                                @case('cancelled')
                                    <i class="fas fa-times-circle text-red-500"></i> Cancelled
                                @break

                                @case('pending')
                                    <i class="fas fa-clock text-yellow-500"></i> Pending
                                @break

                                @default
                                    Unknown Status
                            @endswitch
                        </p>
                        <a href="{{ route('listings.show', $booking->listing_id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-300">View
                            Listing</a>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-evenly px-3 py-3 bg-gray-100 text-sm">
                        <!-- Pay Now Button (only if the booking status is pending) -->
                        @if ($booking->status === 'pending')
                            <a href="{{ route('bookings.pay', $booking->id) }}"
                                class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-300 flex items-center">
                                <i class="fas fa-credit-card mr-2"></i> Pay
                            </a>
                        @elseif ($booking->status === 'cancelled')
                            <a href="{{ route('bookings.pay', $booking->id) }}"
                                class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300 flex items-center">
                                <i class="fas fa-credit-card mr-2"></i> Try Again
                            </a>
                        @endif
                    
                        <!-- Edit Button -->
                        <a href="{{ route('bookings.edit', $booking->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded-md transition duration-300 flex items-center ml-2">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                    
                        <!-- Delete Button -->
                        <button onclick="showDeleteModal({{ $booking->id }})"
                            class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-md transition duration-300 flex items-center ml-2">
                            <i class="fas fa-trash-alt mr-2"></i> Delete
                        </button>
                    
                        <!-- Delete Form for each booking -->
                        <form id="deleteForm-{{ $booking->id }}" action="{{ route('bookings.destroy', $booking->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>                    
                </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-gray-600">No bookings have been made yet.</p>
                        <a href="{{ route('listings.index') }}" class="text-blue-500 hover:text-blue-700">Browse Listings</a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal"
            class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h3>
                <p>Are you sure you want to delete this booking? This action cannot be undone.</p>
                <div class="flex justify-between mt-4">
                    <button onclick="closeModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">Cancel</button>
                    <button id="confirmDelete"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-r">Delete</button>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let bookingIdToDelete = null;

                // Ensure the element exists before adding an event listener
                var confirmDeleteButton = document.getElementById('confirmDelete');
                if (confirmDeleteButton) {
                    confirmDeleteButton.addEventListener('click', function() {
                        if (bookingIdToDelete) {
                            document.getElementById('deleteForm-' + bookingIdToDelete).submit();
                        }
                    });
                }

                window.showDeleteModal = function(bookingId) {
                    bookingIdToDelete = bookingId;
                    document.getElementById('deleteModal').classList.remove('hidden');
                };

                window.closeModal = function() {
                    document.getElementById('deleteModal').classList.add('hidden');
                };
            });
        </script>
    @endsection
