@extends('layouts.app')

@section('page_title', 'Properties')
@section('page_subtitle', 'Browse and manage property listings')

@section('header_actions')
    <a href="{{ route('properties.create') }}"
       class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-5 py-3 text-white font-semibold shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-700">
        + Add Property
    </a>
@endsection

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Search -->
    <form method="GET"
          action="{{ route('properties.index') }}"
          class="mb-8">

        <div class="flex gap-4">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Search property..."
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit"
                    class="inline-flex items-center justify-center rounded-2xl bg-slate-700 px-6 py-3 text-white font-semibold shadow-sm transition hover:bg-slate-800">

                Search

            </button>

        </div>

    </form>

    <!-- Success Message -->
    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <!-- Properties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($properties as $property)

            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

                <!-- Property Image -->
                @if($property->image)

                    <img src="{{ asset('storage/' . $property->image) }}"
                         alt="Property Image"
                         class="w-full h-56 object-cover">

                @else

                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center">

                        <span class="text-gray-500">
                            No Image
                        </span>

                    </div>

                @endif

                <!-- Card Body -->
                <div class="p-6">

                    <!-- Title -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">

                        {{ $property->title }}

                    </h2>

                    <!-- Type -->
                    <p class="text-blue-500 font-semibold mb-3">

                        {{ $property->type }}

                    </p>

                    <!-- Rent -->
                    <p class="text-2xl font-bold text-green-600 mb-4">

                        ₱{{ number_format($property->rent) }}

                    </p>

                    <!-- Status -->
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold

                        @if($property->status == 'Available')

                            bg-green-100 text-green-700

                        @elseif($property->status == 'Reserved')

                            bg-yellow-100 text-yellow-700

                        @else

                            bg-red-100 text-red-700

                        @endif

                    ">

                        {{ $property->status }}

                    </span>

                    <!-- Address + Owner + Branch -->
                    <div class="mt-4 space-y-2">

                        <!-- Address -->
                        <p class="text-gray-700">

                            📍 {{ $property->address }}

                        </p>

                        <!-- Owner -->
                        <p class="text-gray-700">

                            👤 Owner:
                            <span class="font-semibold">

                                {{ $property->owner->name ?? 'N/A' }}

                            </span>

                        </p>

                        <!-- Branch -->
                        <p class="text-gray-700">

                            🏢 Branch:
                            <span class="font-semibold">

                                {{ $property->branch->name ?? 'N/A' }}

                            </span>

                        </p>

                    </div>

                    <!-- Description -->
                    @if($property->description)

                        <div class="mt-4">

                            <p class="text-gray-600 text-sm leading-relaxed">

                                {{ $property->description }}

                            </p>

                        </div>

                    @endif

                    <!-- Buttons -->
                    <div class="flex gap-3 mt-6">

                        <!-- Edit -->
                        <a href="{{ route('properties.edit', $property->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <!-- Delete -->
                        <form action="{{ route('properties.destroy', $property->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this property?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-3">

                <div class="bg-white p-10 rounded-2xl shadow text-center">

                    <h2 class="text-2xl font-bold text-gray-700 mb-2">
                        No Properties Found
                    </h2>

                    <p class="text-gray-500">
                        Try adding a new property.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection