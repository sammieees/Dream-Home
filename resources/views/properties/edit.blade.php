@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Edit Property
            </h1>

            <p class="text-gray-500 mt-2">
                Update property details and information
            </p>

        </div>

        <a href="{{ route('properties.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-xl shadow transition">

            Back

        </a>

    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <form method="POST"
              action="{{ route('properties.update', $property->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Current Image -->
            @if($property->image)

                <div class="relative">

                    <img src="{{ asset('storage/' . $property->image) }}"
                         class="w-full h-80 object-cover">

                    <div class="absolute top-4 right-4">

                        <span class="bg-black/70 text-white px-4 py-2 rounded-full text-sm">
                            Current Image
                        </span>

                    </div>

                </div>

            @endif

            <div class="p-8">

                <!-- Change Image -->
                <div class="mb-8">

                    <label class="block text-lg font-semibold mb-3 text-gray-700">
                        Change Property Image
                    </label>

                    <input type="file"
                           name="image"
                           class="w-full border border-gray-300 rounded-xl p-3 bg-gray-50">

                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Title -->
                    <div>

                        <label class="block text-lg font-semibold mb-2 text-gray-700">
                            Property Title
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ $property->title }}"
                               class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    </div>

                    <!-- Type -->
                    <div>

                        <label class="block text-lg font-semibold mb-2 text-gray-700">
                            Property Type
                        </label>

                        <input type="text"
                               name="type"
                               value="{{ $property->type }}"
                               class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    </div>

                    <!-- Rent -->
                    <div>

                        <label class="block text-lg font-semibold mb-2 text-gray-700">
                            Monthly Rent
                        </label>

                        <input type="number"
                               name="rent"
                               value="{{ $property->rent }}"
                               class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                    </div>

                    <!-- Status -->
                    <div>

                        <label class="block text-lg font-semibold mb-2 text-gray-700">
                            Property Status
                        </label>

                        <select name="status"
                                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                            <option value="Available"
                                {{ $property->status == 'Available' ? 'selected' : '' }}>
                                Available
                            </option>

                            <option value="Reserved"
                                {{ $property->status == 'Reserved' ? 'selected' : '' }}>
                                Reserved
                            </option>

                            <option value="Rented"
                                {{ $property->status == 'Rented' ? 'selected' : '' }}>
                                Rented
                            </option>

                        </select>

                    </div>

                </div>

                <!-- Address -->
                <div class="mt-6">

                    <label class="block text-lg font-semibold mb-2 text-gray-700">
                        Property Address
                    </label>

                    <input type="text"
                           name="address"
                           value="{{ $property->address }}"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

                </div>

                <!-- OWNER -->
<div class="mb-6">

    <label class="block text-lg font-semibold mb-2">
        Owner
    </label>

    <select name="owner_id"
            class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <option value="">
            Select Owner
        </option>

        @foreach($owners as $owner)

            <option value="{{ $owner->id }}"
                {{ $property->owner_id == $owner->id ? 'selected' : '' }}>

                {{ $owner->name }}

            </option>

        @endforeach

    </select>

</div>

<!-- BRANCH -->
<div class="mb-6">

    <label class="block text-lg font-semibold mb-2">
        Branch
    </label>

    <select name="branch_id"
        class="w-full border rounded-lg p-3">

    <option value="">Select Branch</option>

    @foreach($branches as $branch)

        <option value="{{ $branch->id }}"
            {{ $property->branch_id == $branch->id ? 'selected' : '' }}>

            {{ $branch->name }}

        </option>

    @endforeach

</select>

</div>

                <!-- Description -->
                <div class="mt-6">

                    <label class="block text-lg font-semibold mb-2 text-gray-700">
                        Property Description
                    </label>

                    <textarea name="description"
                              rows="6"
                              class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $property->description }}</textarea>

                </div>

                <!-- Buttons -->
                <div class="flex gap-4 mt-10">

                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl shadow-lg transition">

                        Update Property

                    </button>

                    <a href="{{ route('properties.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-xl shadow-lg transition">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection