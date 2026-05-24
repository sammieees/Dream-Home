@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">

    <!-- Property Image -->
    @if($property->image)

        <img src="{{ asset('storage/' . $property->image) }}"
             class="w-full h-80 object-cover">

    @endif

    <div class="p-10">

        <h1 class="text-4xl font-bold mb-8">
            Edit Property
        </h1>

        <form method="POST"
              action="{{ route('properties.update', $property->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Change Image -->
            <div class="mb-8">

                <label class="block text-lg font-semibold mb-3">
                    Change Property Image
                </label>

                <input type="file"
                       name="image"
                       class="w-full border rounded-xl p-4">

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Title -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Property Title
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ $property->title }}"
                           class="w-full border rounded-xl p-4">

                </div>

                <!-- Type -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Property Type
                    </label>

                    <input type="text"
                           name="type"
                           value="{{ $property->type }}"
                           class="w-full border rounded-xl p-4">

                </div>

                <!-- OWNER -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Property Owner
                    </label>

                    <select name="owner_id"
                            class="w-full border rounded-xl p-4">

                        @foreach($owners as $owner)

                            <option value="{{ $owner->id }}"
                                {{ $property->owner_id == $owner->id ? 'selected' : '' }}>

                                {{ $owner->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- BRANCH -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Branch
                    </label>

                    <select name="branch_id"
                            class="w-full border rounded-xl p-4">

                        @foreach($branches as $branch)

                            <option value="{{ $branch->id }}"
                                {{ $property->branch_id == $branch->id ? 'selected' : '' }}>

                                {{ $branch->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Rent -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Monthly Rent
                    </label>

                    <input type="number"
                           name="rent"
                           value="{{ $property->rent }}"
                           class="w-full border rounded-xl p-4">

                </div>

                <!-- Status -->
                <div>

                    <label class="block text-lg font-semibold mb-2">
                        Property Status
                    </label>

                    <select name="status"
                            class="w-full border rounded-xl p-4">

                        <option value="Available"
                            {{ $property->status == 'Available' ? 'selected' : '' }}>

                            Available

                        </option>

                        <option value="Rented"
                            {{ $property->status == 'Rented' ? 'selected' : '' }}>

                            Rented

                        </option>

                        <option value="Reserved"
                            {{ $property->status == 'Reserved' ? 'selected' : '' }}>

                            Reserved

                        </option>

                    </select>

                </div>

            </div>

            <!-- Address -->
            <div class="mt-6">

                <label class="block text-lg font-semibold mb-2">
                    Property Address
                </label>

                <input type="text"
                       name="address"
                       value="{{ $property->address }}"
                       class="w-full border rounded-xl p-4">

            </div>

            <!-- Description -->
            <div class="mt-6">

                <label class="block text-lg font-semibold mb-2">
                    Property Description
                </label>

                <textarea name="description"
                          rows="5"
                          class="w-full border rounded-xl p-4">{{ $property->description }}</textarea>

            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-8">

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-xl shadow-lg">

                    Update Property

                </button>

                <a href="{{ route('properties.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-xl shadow-lg">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection