@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- BACK BUTTON -->
    <a href="{{ route('properties.index') }}"
       class="inline-flex items-center gap-2 mb-6 bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-3 rounded-xl transition shadow-md">

        <span>←</span>

        <span>
            Back to Properties
        </span>

    </a>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- PROPERTY IMAGE -->
        @if($property->image)

            <img src="{{ asset('storage/' . $property->image) }}"
                 class="w-full h-[500px] object-cover">

        @endif

        <div class="p-8">

            <!-- TITLE & STATUS -->
            <div class="flex justify-between items-center mb-6">

                <h1 class="text-4xl font-bold text-gray-800">
                    {{ $property->title }}
                </h1>

                <span class="bg-green-100 text-green-700 px-5 py-2 rounded-full font-semibold">

                    {{ $property->status }}

                </span>

            </div>

            <!-- PROPERTY DETAILS -->
            <div class="grid grid-cols-2 gap-6 text-lg">

                <div>

                    <strong class="text-gray-700">
                        Type:
                    </strong>

                    <span class="text-gray-600">
                        {{ $property->type }}
                    </span>

                </div>

                <div>

                    <strong class="text-gray-700">
                        Monthly Rent:
                    </strong>

                    <span class="text-cyan-600 font-semibold">
                        ₱{{ number_format($property->rent, 2) }}
                    </span>

                </div>

                <div class="col-span-2">

                    <strong class="text-gray-700">
                        Address:
                    </strong>

                    <span class="text-gray-600">
                        {{ $property->address }}
                    </span>

                </div>

            </div>

            <!-- DESCRIPTION -->
            <div class="mt-10">

                <h2 class="text-2xl font-bold mb-3 text-gray-800">
                    Description
                </h2>

                <p class="text-gray-600 leading-relaxed text-lg">

                    Beautiful and modern rental property located in a prime area.
                    Perfect for families and professionals.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection