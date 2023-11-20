{{-- resources/views/auth/admin/hosts/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Edit Host')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-Primary mb-6">Edit Host</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.hosts.update', $host->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-Primary text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ $host->name }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-Primary text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ $host->email }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Host
            </button>
        </form>
    </div>
@endsection
