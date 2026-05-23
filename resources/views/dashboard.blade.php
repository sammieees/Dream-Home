@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Total Properties -->
    <div class="bg-blue-500 text-white p-6 rounded-xl shadow-lg">

        <h2 class="text-xl font-semibold">
            Total Properties
        </h2>

        <p class="text-4xl font-bold mt-4">
            {{ $totalProperties }}
        </p>

    </div>

    <!-- Available -->
    <div class="bg-green-500 text-white p-6 rounded-xl shadow-lg">

        <h2 class="text-xl font-semibold">
            Available
        </h2>

        <p class="text-4xl font-bold mt-4">
            {{ $availableProperties }}
        </p>

    </div>

    <!-- Rented -->
    <div class="bg-yellow-500 text-white p-6 rounded-xl shadow-lg">

        <h2 class="text-xl font-semibold">
            Rented
        </h2>

        <p class="text-4xl font-bold mt-4">
            {{ $rentedProperties }}
        </p>

    </div>

    <!-- Revenue -->
    <div class="bg-red-500 text-white p-6 rounded-xl shadow-lg">

        <h2 class="text-xl font-semibold">
            Total Revenue
        </h2>

        <p class="text-3xl font-bold mt-4">
            ₱{{ number_format($totalRevenue, 2) }}
        </p>

    </div>

</div>

@endsection