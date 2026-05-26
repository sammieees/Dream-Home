@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">

    <h1 class="text-4xl font-bold mb-8">
        Add Property
    </h1>

    <form method="POST"
          action="{{ route('properties.store') }}"
          enctype="multipart/form-data">

        @csrf

        <!-- Image Upload -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Property Image
            </label>

            <input type="file"
                   name="image"
                   class="w-full border rounded-lg p-2 bg-gray-50">

        </div>

        <!-- Title -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Title
            </label>

            <input type="text"
                   name="title"
                   placeholder="Enter property title"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Type -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Type
            </label>

            <input type="text"
                   name="type"
                   placeholder="Condominium, Apartment, House..."
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Rent -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Rent
            </label>

            <input type="number"
                   name="rent"
                   placeholder="Enter monthly rent"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Address -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Address
            </label>

            <input type="text"
                   name="address"
                   placeholder="Enter address"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

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

            <option value="{{ $owner->id }}">

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
            class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <option value="">
            Select Branch
        </option>

        @foreach($branches as $branch)

            <option value="{{ $branch->id }}">

                {{ $branch->name }}

            </option>

        @endforeach

    </select>

</div>

        <!-- Status -->
        <div class="mb-8">

            <label class="block text-lg font-semibold mb-2">
                Status
            </label>

            <select name="status"
                    class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="Available">
                    Available
                </option>

                <option value="Rented">
                    Rented
                </option>

                <option value="Reserved">
                    Reserved
                </option>

            </select>

        </div>

        <div class="mb-6">

         <label class="block mb-2 font-semibold">
        Description
          </label>

        <textarea name="description"
              rows="5"
              class="w-full border rounded-xl p-3"></textarea>

        </div>

        <!-- Buttons -->
        <div class="flex gap-4">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow">

                Save Property

            </button>

            <a href="{{ route('properties.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection