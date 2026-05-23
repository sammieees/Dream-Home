@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Add Tenant
        </h1>

        <p class="text-gray-500 mt-2">
            Register a new tenant into the rental system
        </p>

    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-3xl shadow-xl p-8">

        <form method="POST"
              action="{{ route('tenants.store') }}"
              onsubmit="disableButton()">

            @csrf

            <!-- NAME -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Tenant Name
                </label>

                <input type="text"
                       name="name"
                       required
                       placeholder="Enter tenant name"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- EMAIL -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       required
                       placeholder="Enter email"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- CONTACT -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Contact Number
                </label>

                <input type="text"
                       name="contact"
                       required
                       placeholder="Enter contact number"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- PROPERTY -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Select Property
                </label>

                <select name="property_id"
                        required
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="">
                        Choose Property
                    </option>

                    @foreach($properties as $property)

                        <option value="{{ $property->id }}">

                            {{ $property->title }}
                            - ₱{{ number_format($property->rent, 2) }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- START DATE -->
            <div class="mb-8">

                <label class="block text-gray-700 font-semibold mb-2">
                    Start Date
                </label>

                <input type="date"
                       name="start_date"
                       required
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4">

                <!-- SAVE BUTTON -->
                <button type="submit"
                        id="submitBtn"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Save Tenant

                </button>

                <!-- CANCEL BUTTON -->
                <a href="{{ route('tenants.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

<script>

    function disableButton() {

        let btn = document.getElementById('submitBtn');

        btn.disabled = true;

        btn.innerHTML = 'Saving...';
    }

</script>

@endsection