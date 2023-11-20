@extends('layouts.app')

@section('title', 'Host Dashboard')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl md:text-3xl font-semibold text-Primary mb-6">{{ Auth::user()->name }}'s Listings</h1>

        <a href="{{ route('host.listings.create') }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-300">
            Create New Listing
        </a>

        @forelse ($listings as $listing)
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md grid grid-cols-1 md:grid-cols-3 gap-4 min-h-[500px]">
                {{-- Image Column --}}
                <div class="md:col-span-2">
                    @if ($listing->images && is_array(json_decode($listing->images, true)))
                        <div class="slick-slider-container relative h-full">
                            <div class="slick-slider-host h-full">
                                @foreach (json_decode($listing->images, true) as $image)
                                    <div>
                                        <img src="{{ Storage::url($image) }}" alt="Listing Image"
                                            class="object-cover h-full w-full rounded">
                                    </div>
                                @endforeach
                            </div>
                            <button class="slick-custom-prev"><i class="fa fa-arrow-left"></i></button>
                            <button class="slick-custom-next"><i class="fa fa-arrow-right"></i></button>
                        </div>
                    @endif
                </div>

                {{-- Content and Buttons Column --}}
                <div class="flex flex-col justify-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $listing->title }}</h2>
                        <p class="text-gray-600 mb-2">{{ Str::limit($listing->description, 100) }}</p>
                        <p class="text-sm text-gray-500 italic">{{ $listing->location }}</p>
                        <p class="text-sm text-gray-500 italic">AUD: ${{ $listing->price }}</p>
                    </div>
                    <div class="flex items-center space-x-4 mt-4">
                        <a href="{{ route('host.listings.edit', $listing->id) }}"
                            class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Listing
                        </a>
                        <button type="button" onclick="confirmDelete({{ $listing->id }})"
                            class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                            <i class="fas fa-trash-alt mr-2"></i>
                            Delete Listing
                        </button>
                    </div>
                </div>
            </div>

            <form id="deleteForm-{{ $listing->id }}" action="{{ route('host.listings.destroy', $listing->id) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @empty
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-600">There haven't been any listings yet. Start by creating one!</p>
            </div>
        @endforelse
    </div>
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full items-center justify-center">
        <div class="h-screen flex items-center justify-center">
            <div
                class="relative p-5 border shadow-lg rounded-md bg-white w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl mx-auto">
                <div class="text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Confirm Delete</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">Are you sure you want to delete this listing? This action cannot be
                            undone.</p>
                    </div>
                    <div class="flex items-center justify-center space-x-4 px-4 py-3">
                        <button id="deleteConfirm"
                            class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Delete
                        </button>
                        <button onclick="closeModal()"
                            class="px-4 py-2 bg-gray-300 text-gray-900 text-base font-medium rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete(listingId) {
        // Display the modal
        document.getElementById('deleteModal').style.display = 'block';

        // Find the delete confirmation button and add an event listener
        document.getElementById('deleteConfirm').onclick = function() {
            document.getElementById('deleteForm-' + listingId).submit();
        };
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
