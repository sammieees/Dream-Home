@extends('layouts.app')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-gray-800">
        Staff Dashboard
    </h1>

    <p class="text-gray-500 mt-2">
        Staff management panel
    </p>

</div>

<!-- QUICK ACTIONS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <!-- Properties -->
    <a href="{{ route('properties.index') }}"
       class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">

        <div class="text-5xl mb-4">
            🏢
        </div>

        <h2 class="text-2xl font-bold text-gray-800">
            Properties
        </h2>

        <p class="text-gray-500 mt-2">
            Manage property listings
        </p>

    </a>

    <!-- Tenants -->
    <a href="{{ route('tenants.index') }}"
       class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">

        <div class="text-5xl mb-4">
            👨‍👩‍👧
        </div>

        <h2 class="text-2xl font-bold text-gray-800">
            Tenants
        </h2>

        <p class="text-gray-500 mt-2">
            Manage tenants
        </p>

    </a>

    <!-- Payments -->
    <a href="{{ route('payments.index') }}"
       class="bg-white p-8 rounded-3xl shadow-xl hover:scale-105 transition">

        <div class="text-5xl mb-4">
            💳
        </div>

        <h2 class="text-2xl font-bold text-gray-800">
            Payments
        </h2>

        <p class="text-gray-500 mt-2">
            Record rental payments
        </p>

    </a>

</div>

@endsection