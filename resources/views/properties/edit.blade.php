@extends('layouts.app')

@section('page_title', 'Edit Property')
@section('page_subtitle', 'Update property details')
@section('breadcrumbs')
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('properties.index') }}" class="hover:text-slate-900">Properties</a>
        <span>/</span>
        <span>Edit Property</span>
    </div>
@endsection

@section('header_actions')
    <a href="{{ route('properties.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-5xl mx-auto bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

    <!-- Property Image -->
    @if($property->image)

        <img src="{{ asset('storage/' . $property->image) }}"
             class="w-full h-80 object-cover">

    @endif

    <div class="p-10">

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
                        class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-8 py-4 text-white font-semibold shadow-lg transition hover:bg-cyan-700">

                    Update Property

                </button>

                <a href="{{ route('properties.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-500 px-8 py-4 text-white font-semibold shadow-sm transition hover:bg-slate-600">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection