@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 bg-Background text-white">
                <h1 class="text-3xl leading-6 font-medium">
                    <i class="fas fa-tachometer-alt mr-2"></i>Admin Dashboard
                </h1>
                <p class="mt-1 max-w-2xl text-sm">
                    Manage users and hosts.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-users mr-2 text-lg text-Background"></i>Users
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ route('admin.users.index') }}" class="text-Background hover:text-blue-900 flex items-center">
                                <i class="fas fa-cogs mr-2"></i>Manage Users
                            </a>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-user-tie mr-2 text-lg text-Background"></i>Hosts
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ route('admin.hosts.index') }}" class="text-Background hover:text-blue-900 flex items-center">
                                <i class="fas fa-tools mr-2"></i>Manage Hosts
                            </a>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500 flex items-center">
                            <i class="fas fa-book mr-2 text-lg text-Background"></i>Bookings
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ route('admin.bookings.index') }}" class="text-Background hover:text-blue-900 flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>Manage Bookings
                            </a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
