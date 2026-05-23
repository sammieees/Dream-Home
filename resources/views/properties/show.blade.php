@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        @if($property->image)

            <img src="{{ asset('storage/' . $property->image) }}"
                 class="w-full h-[500px] object-cover">

        @endif

        <div class="p-8">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-4xl font-bold">
                    {{ $property->title }}
                </h1>

                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
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