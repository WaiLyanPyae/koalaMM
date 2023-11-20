{{-- resources/views/errors/403.blade.php --}}
@extends('layouts.app')

@section('title', '403 Forbidden')

@section('content')
<div class="container">
    <h1>403 Forbidden</h1>
    <p>Access denied. You do not have permission to access this page.</p>
    <a href="{{ url('/') }}">Back to Home</a>
</div>
@endsection
