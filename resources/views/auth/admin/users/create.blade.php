{{-- resources/views/auth/admin/users/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-Primary mb-6">Create New User</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-Primary text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-Primary text-sm font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-Primary text-sm font-bold mb-2">Password:</label>
                <input type="password" id="password" name="password" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-Primary text-sm font-bold mb-2">ReType Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>


            <!-- Role Field -->
            <div class="mb-4">
                <label for="role" class="block text-Primary text-sm font-bold mb-2">Role:</label>
                <select id="role" name="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="user">User</option>
                    <option value="host">Host</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create User
            </button>
        </form>
    </div>
@endsection