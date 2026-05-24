@extends('layouts.app')

@section('page_title', 'Staff Dashboard')
@section('page_subtitle', 'Staff management panel')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <a href="{{ route('properties.index') }}" class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">
        <div class="text-5xl mb-4">🏢</div>
        <h2 class="text-2xl font-bold text-gray-800">Properties</h2>
        <p class="text-gray-500 mt-2">Manage property listings</p>
    </a>

    <a href="{{ route('tenants.index') }}" class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">
        <div class="text-5xl mb-4">👨‍👩‍👧</div>
        <h2 class="text-2xl font-bold text-gray-800">Tenants</h2>
        <p class="text-gray-500 mt-2">Manage tenants</p>
    </a>

    <a href="{{ route('payments.index') }}" class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">
        <div class="text-5xl mb-4">💳</div>
        <h2 class="text-2xl font-bold text-gray-800">Payments</h2>
        <p class="text-gray-500 mt-2">Record rental payments</p>
    </a>

</div>

@endsection