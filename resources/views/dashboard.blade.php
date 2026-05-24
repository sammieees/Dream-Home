@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_subtitle', 'Overview of property performance')

@section('content')

<div class="grid grid-cols-1 gap-6 xl:grid-cols-4">

    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">
                    Total Properties
                </p>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $totalProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-cyan-50 text-cyan-600 grid place-items-center text-2xl">🏠</div>
        </div>
        <p class="mt-4 text-sm text-slate-500">
            Total properties registered in the system.
        </p>
    </div>

    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">
                    Available
                </p>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $availableProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-emerald-50 text-emerald-600 grid place-items-center text-2xl">✅</div>
        </div>
        <p class="mt-4 text-sm text-slate-500">
            Currently available properties that are ready to rent.
        </p>
    </div>

    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">
                    Rented
                </p>
                <p class="mt-5 text-5xl font-bold text-slate-900">
                    {{ $rentedProperties }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-amber-50 text-amber-600 grid place-items-center text-2xl">🏘️</div>
        </div>
        <p class="mt-4 text-sm text-slate-500">
            Properties that are currently occupied.
        </p>
    </div>

    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.35em] text-slate-500">
                    Total Revenue
                </p>
                <p class="mt-5 text-4xl font-bold text-slate-900">
                    ₱{{ number_format($totalRevenue, 2) }}
                </p>
            </div>
            <div class="h-12 w-12 rounded-3xl bg-rose-50 text-rose-600 grid place-items-center text-2xl">₱</div>
        </div>
        <p class="mt-4 text-sm text-slate-500">
            Total amount collected from paid leases.
        </p>
    </div>

</div>

@endsection