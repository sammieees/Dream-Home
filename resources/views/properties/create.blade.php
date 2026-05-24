@extends('layouts.app')

@section('page_title', 'Add Property')
@section('page_subtitle', 'Create a new property listing')
@section('breadcrumbs')
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('properties.index') }}" class="hover:text-slate-900">Properties</a>
        <span>/</span>
        <span>Add Property</span>
    </div>
@endsection

@section('header_actions')
    <a href="{{ route('properties.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-2xl mx-auto bg-white border border-slate-200 p-8 rounded-2xl shadow-sm">

    <form method="POST"
          action="{{ route('properties.store') }}"
          enctype="multipart/form-data">

        @csrf

        <!-- Image -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Property Image
            </label>

            <input type="file"
                   name="image"
                   class="w-full border rounded-lg p-2">

        </div>

        <!-- Title -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Title
            </label>

            <input type="text"
                   name="title"
                   class="w-full border rounded-lg p-3">

        </div>

        <!-- Type -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Type
            </label>

            <input type="text"
                   name="type"
                   class="w-full border rounded-lg p-3">

        </div>

        <!-- Owner -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Property Owner
            </label>

            <select name="owner_id"
                    class="w-full border rounded-lg p-3">

                @foreach($owners as $owner)

                    <option value="{{ $owner->id }}">

                        {{ $owner->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Branch -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Branch
            </label>

            <select name="branch_id"
                    class="w-full border rounded-lg p-3">

                @foreach($branches as $branch)

                    <option value="{{ $branch->id }}">

                        {{ $branch->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Rent -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Rent
            </label>

            <input type="number"
                   name="rent"
                   class="w-full border rounded-lg p-3">

        </div>

        <!-- Address -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Address
            </label>

            <input type="text"
                   name="address"
                   class="w-full border rounded-lg p-3">

        </div>

        <!-- Status -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Status
            </label>

            <select name="status"
                    class="w-full border rounded-lg p-3">

                <option value="Available">Available</option>
                <option value="Reserved">Reserved</option>
                <option value="Rented">Rented</option>

            </select>

        </div>

        <!-- Description -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Description
            </label>

            <textarea name="description"
                      rows="5"
                      class="w-full border rounded-lg p-3"></textarea>

        </div>

        <!-- Buttons -->
        <div class="flex gap-4">

            <button type="submit"
                    class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-cyan-700">

                Save Property

            </button>

            <a href="{{ route('properties.index') }}"
               class="inline-flex items-center justify-center rounded-2xl bg-slate-500 px-6 py-3 text-white font-semibold shadow-sm transition hover:bg-slate-600">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection