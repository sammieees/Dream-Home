@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Edit Owner
        </h1>

        <p class="text-gray-500 mt-2">
            Update owner information
        </p>

    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-3xl shadow-xl p-8">

        <form method="POST"
              action="{{ route('owners.update', $owner) }}">

            @csrf
            @method('PUT')

            <!-- OWNER NAME -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Owner Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ $owner->name }}"
                       required
                       placeholder="Enter owner name"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- EMAIL -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ $owner->email }}"
                       required
                       placeholder="Enter owner email"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- CONTACT -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Contact Number
                </label>

                <input type="text"
                       name="contact"
                       value="{{ $owner->contact }}"
                       required
                       placeholder="Enter contact number"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- ADDRESS -->
            <div class="mb-8">

                <label class="block text-gray-700 font-semibold mb-2">
                    Address
                </label>

                <textarea name="address"
                          rows="4"
                          required
                          placeholder="Enter owner address"
                          class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $owner->address }}</textarea>

            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4">

                <!-- UPDATE BUTTON -->
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Update Owner

                </button>

                <!-- CANCEL BUTTON -->
                <a href="{{ route('owners.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection