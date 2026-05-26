@extends('layouts.app')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-10">

    <div>

        <h1 class="text-4xl font-extrabold text-gray-800">
            Properties
        </h1>

        <p class="text-gray-500 mt-1">
            Manage all available rental properties
        </p>

    </div>

    <a href="{{ route('properties.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl shadow-lg transition duration-300">

        + Add Property

    </a>

</div>

<!-- SEARCH BAR -->
<form method="GET"
      action="{{ route('properties.index') }}"
      class="mb-10">

    <div class="flex gap-4">

        <input type="text"
               name="search"
               placeholder="Search properties..."
               value="{{ request('search') }}"
               class="w-full border border-gray-300 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-8 rounded-2xl shadow">

            Search

        </button>

    </div>

</form>

<!-- PROPERTY GRID -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

    @foreach($properties as $property)

        <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1">

            <!-- IMAGE -->
            <div class="relative overflow-hidden">

                <a href="{{ route('properties.show', $property->id) }}">

                    @if($property->image)

                        <img src="{{ asset('storage/' . $property->image) }}"
                             class="w-full h-64 object-cover hover:scale-110 transition duration-500">

                    @else

                        <div class="w-full h-64 bg-gray-300 flex items-center justify-center">

                            <span class="text-gray-600 text-lg">
                                No Image Available
                            </span>

                        </div>

                    @endif

                </a>

                <!-- STATUS -->
                <div class="absolute top-4 right-4">

                    @if($property->status == 'Available')

                        <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow">
                            Available
                        </span>

                    @elseif($property->status == 'Rented')

                        <span class="bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow">
                            Rented
                        </span>

                    @else

                        <span class="bg-yellow-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow">
                            Reserved
                        </span>

                    @endif

                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-6">

                <!-- TITLE -->
                <div class="flex justify-between items-start mb-3">

                    <div>

                        <h2 class="text-2xl font-bold text-gray-800">
                            {{ $property->title }}
                        </h2>

                        <p class="text-gray-500 mt-1">
                            {{ $property->type }}
                        </p>

                    </div>

                    <div class="text-right">

                        <p class="text-sm text-gray-400">
                            Monthly Rent
                        </p>

                        <h3 class="text-xl font-bold text-blue-600">
                            ₱{{ number_format($property->rent, 2) }}
                        </h3>

                    </div>

                </div>

                <!-- ADDRESS -->
                <div class="mt-4">

                    <p class="text-gray-700">
                        📍 {{ $property->address }}
                    </p>

                </div>


              <!-- OWNER -->
<div class="mt-3">

    <p class="text-gray-700">

        Owner:
        <span class="font-semibold">

            {{ $property->owner->name ?? 'No Owner Assigned' }}

        </span>

    </p>

</div>

                <!-- BRANCH -->
                <div class="mt-2">

                    <p class="text-gray-700">

                         Branch:
                        <span class="font-semibold">

                            {{ $property->branch->name ?? 'No Branch Assigned' }}

                        </span>

                    </p>

                </div>

                <!-- DESCRIPTION -->
                <div class="mt-5">

                    <p class="text-gray-600 leading-relaxed">

                        {{ $property->description }}

                    </p>

                </div>

                <!-- BUTTONS -->
                <div class="flex justify-between items-center mt-8">

                    <!-- VIEW DETAILS -->
                    <a href="{{ route('properties.show', $property->id) }}"
                       class="text-blue-600 hover:text-blue-800 font-semibold">

                        View Details →

                    </a>

                    <!-- ACTION BUTTONS -->
                    <div class="flex gap-3">

                        <a href="{{ route('properties.edit', $property->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl shadow transition">

                            Edit

                        </a>

                        <form action="{{ route('properties.destroy', $property->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this property?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow transition">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection