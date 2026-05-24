@extends('layouts.app')

@section('page_title', 'Reports')
@section('page_subtitle', 'System analytics and financial reports')

@section('header_actions')
    <a href="{{ route('reports.index') }}"
       class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-5 py-3 text-white font-semibold shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-700">
        Refresh Reports
    </a>
@endsection

@section('content')

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

    <!-- TOTAL PROPERTIES -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Total Properties
                </h2>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $totalProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-sky-50 text-sky-600 grid place-items-center text-2xl">🏠</div>
        </div>

    </div>

    <!-- AVAILABLE -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Available Properties
                </h2>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $availableProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-emerald-50 text-emerald-600 grid place-items-center text-2xl">✅</div>
        </div>

    </div>

    <!-- RENTED -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Rented Properties
                </h2>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $rentedProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-red-50 text-red-600 grid place-items-center text-2xl">🏘️</div>
        </div>

    </div>

    <!-- TENANTS -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Total Tenants
                </h2>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $totalTenants }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-violet-50 text-violet-600 grid place-items-center text-2xl">👥</div>
        </div>

    </div>

    <!-- TOTAL REVENUE -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Total Revenue
                </h2>
                <p class="mt-5 text-4xl font-bold text-slate-900">
                    ₱{{ number_format($totalRevenue, 2) }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-amber-50 text-amber-600 grid place-items-center text-2xl">💰</div>
        </div>

    </div>

    <!-- MONTHLY REVENUE -->
    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">

        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-slate-500 text-sm uppercase tracking-[0.35em]">
                    Monthly Revenue
                </h2>
                <p class="mt-5 text-4xl font-bold text-slate-900">
                    ₱{{ number_format($monthlyRevenue, 2) }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-indigo-50 text-indigo-600 grid place-items-center text-2xl">📈</div>
        </div>

    </div>

</div>

<!-- REVENUE CHART -->
<div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-sm mt-10">

    <div class="mb-6">

        <h2 class="text-3xl font-bold text-slate-900">
            Revenue Overview
        </h2>

        <p class="text-slate-500 mt-1">
            Compare total and monthly revenue.
        </p>

    </div>

    <div class="h-[400px]">

        <canvas id="revenueChart"></canvas>

    </div>

</div>

<!-- PROPERTY STATUS CHART -->
<div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-sm mt-10">

    <div class="mb-6">

        <h2 class="text-3xl font-bold text-slate-900">
            Property Status Overview
        </h2>

        <p class="text-slate-500 mt-1">
            Compare available and rented properties.
        </p>

    </div>

    <div class="h-[400px]">

        <canvas id="propertyChart"></canvas>

    </div>

</div>

<!-- RECENT PAYMENTS -->
<div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-sm mt-10">

    <h2 class="text-3xl font-bold text-slate-900 mb-6">
        Recent Payments
    </h2>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr class="text-slate-700">

                    <th class="text-left p-4">
                        Tenant
                    </th>

                    <th class="text-left p-4">
                        Amount
                    </th>

                    <th class="text-left p-4">
                        Date
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse(\App\Models\Payment::latest()->take(5)->get() as $payment)

                    <tr class="border-t border-slate-200">

                        <td class="p-4 font-semibold text-slate-900">

                            {{ $payment->tenant->name ?? 'No Tenant' }}

                        </td>

                        <td class="p-4 text-emerald-600 font-bold">

                            ₱{{ number_format($payment->amount, 2) }}

                        </td>

                        <td class="p-4 text-slate-500">

                            {{ $payment->payment_date }}

                        </td>

                        <td class="p-4">

                            @if($payment->status == 'Paid')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl">

                                    Paid

                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-xl">

                                    Unpaid

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center p-8 text-slate-500">

                            No recent payments found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // REVENUE CHART
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

    // PROPERTY STATUS CHART
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