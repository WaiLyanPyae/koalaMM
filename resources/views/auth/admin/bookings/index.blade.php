{{-- resources/views/admin/bookings/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Manage Bookings')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl md:text-4xl font-semibold text-Primary mb-6 text-center">All Bookings</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-6 rounded-lg shadow-lg" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Bookings Table -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full leading-normal bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Listing
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Dates
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Total Price
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $booking->user->name }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $booking->listing->title }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $booking->start_date->format('M d, Y') }} - {{ $booking->end_date->format('M d, Y') }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                ${{ $booking->total_price }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ ucfirst($booking->status) }}
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 text-sm">
                                <div class="flex items-center justify-center space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $bookings->links() }} {{-- Tailwind styled pagination --}}
        </div>
    </div>
@endsection
