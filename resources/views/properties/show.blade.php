@extends('layouts.app')

@section('page_title', $property->title)
@section('page_subtitle', 'Property details and current status')
@section('breadcrumbs')
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('properties.index') }}" class="hover:text-slate-900">Properties</a>
        <span>/</span>
        <span>{{ $property->title }}</span>
    </div>
@endsection

@section('header_actions')
    <a href="{{ route('properties.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        @if($property->image)

            <img src="{{ asset('storage/' . $property->image) }}"
                 class="w-full h-[500px] object-cover">

        @endif

        <div class="p-8">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                <div>
                    <p class="text-lg uppercase tracking-[0.3em] text-slate-500 font-semibold">Property details</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">
                        {{ $property->title }}
                    </h2>
                </div>

                <span class="inline-flex items-center justify-center rounded-full bg-green-100 text-green-700 px-4 py-2 text-sm font-semibold">
                    {{ $property->status }}
                </span>

            </div>

            <div class="grid grid-cols-2 gap-6 text-lg">

                <div>
                    <strong>Type:</strong>
                    {{ $property->type }}
                </div>

                <div>
                    <strong>Monthly Rent:</strong>
                    ₱{{ number_format($property->rent, 2) }}
                </div>

                <div class="col-span-2">
                    <strong>Address:</strong>
                    {{ $property->address }}
                </div>

            </div>

            <div class="mt-8">

                <h2 class="text-2xl font-bold mb-3">
                    Description
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Beautiful and modern rental property located in a prime area.
                    Perfect for families and professionals.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection