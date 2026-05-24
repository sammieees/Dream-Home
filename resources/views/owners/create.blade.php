@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">

    <h1 class="text-4xl font-bold mb-8">
        Add Owner
    </h1>

    <form method="POST"
          action="{{ route('owners.store') }}">

        @csrf

        <!-- Name -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Owner Name
            </label>

            <input type="text"
                   name="name"
                   placeholder="Enter owner name"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Email -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Email
            </label>

            <input type="email"
                   name="email"
                   placeholder="Enter email"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Contact -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Contact
            </label>

            <input type="text"
                   name="contact"
                   placeholder="Enter contact number"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Address -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      placeholder="Enter address"
                      class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

        </div>

        <!-- Buttons -->
        <div class="flex gap-4">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg shadow">

                Save Owner

            </button>

            <a href="{{ route('owners.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection