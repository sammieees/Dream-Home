@extends('layouts.app')

@section('content')

<div class="mb-10">

    <h1 class="text-4xl font-bold text-gray-800">
        Reports Dashboard
    </h1>

    <p class="text-gray-500 mt-2">
        System analytics and financial reports
    </p>

</div>

<!-- CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

    <!-- TOTAL PROPERTIES -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Total Properties
        </h2>

        <p class="text-5xl font-bold mt-4 text-blue-500">
            {{ $totalProperties }}
        </p>

    </div>

    <!-- AVAILABLE -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Available Properties
        </h2>

        <p class="text-5xl font-bold mt-4 text-green-500">
            {{ $availableProperties }}
        </p>

    </div>

    <!-- RENTED -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Rented Properties
        </h2>

        <p class="text-5xl font-bold mt-4 text-red-500">
            {{ $rentedProperties }}
        </p>

    </div>

    <!-- TENANTS -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Total Tenants
        </h2>

        <p class="text-5xl font-bold mt-4 text-purple-500">
            {{ $totalTenants }}
        </p>

    </div>

    <!-- TOTAL REVENUE -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Total Revenue
        </h2>

        <p class="text-4xl font-bold mt-4 text-yellow-500">
            ₱{{ number_format($totalRevenue, 2) }}
        </p>

    </div>

    <!-- MONTHLY REVENUE -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <h2 class="text-gray-500 text-lg">
            Monthly Revenue
        </h2>

        <p class="text-4xl font-bold mt-4 text-indigo-500">
            ₱{{ number_format($monthlyRevenue, 2) }}
        </p>

    </div>

</div>

<!-- REVENUE CHART -->
<div class="bg-white p-8 rounded-3xl shadow-xl mt-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-2">
        Revenue Overview
    </h2>

    <p class="text-gray-500 mb-6">
        Compare total and monthly revenue
    </p>

    <!-- FIXED HEIGHT -->
    <div class="h-[400px]">

        <canvas id="revenueChart"></canvas>

    </div>

</div>

<!-- PROPERTY STATUS CHART -->
<div class="bg-white p-8 rounded-3xl shadow-xl mt-10">

    <h2 class="text-3xl font-bold text-gray-800 mb-2">
        Property Status Overview
    </h2>

    <p class="text-gray-500 mb-6">
        Compare available and rented properties
    </p>

    <!-- FIXED HEIGHT -->
    <div class="h-[400px]">

        <canvas id="propertyChart"></canvas>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // REVENUE BAR CHART
    const revenueChart = new Chart(
        document.getElementById('revenueChart'),
        {
            type: 'bar',

            data: {
                labels: [
                    'Total Revenue',
                    'Monthly Revenue'
                ],

                datasets: [{
                    label: 'Revenue',

                    data: [
                        {{ $totalRevenue }},
                        {{ $monthlyRevenue }}
                    ],

                    backgroundColor: [
                        '#facc15',
                        '#4f46e5'
                    ],

                    borderRadius: 15
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    );

    // PROPERTY DOUGHNUT CHART
    const propertyChart = new Chart(
        document.getElementById('propertyChart'),
        {
            type: 'doughnut',

            data: {
                labels: [
                    'Available',
                    'Rented'
                ],

                datasets: [{
                    data: [
                        {{ $availableProperties }},
                        {{ $rentedProperties }}
                    ],

                    backgroundColor: [
                        '#22c55e',
                        '#ef4444'
                    ]
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    );

</script>

@endsection