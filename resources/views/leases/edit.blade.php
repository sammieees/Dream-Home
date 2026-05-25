@extends('layouts.app')

@section('content')

<div class="bg-white p-8 rounded-2xl shadow-lg max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        Edit Lease Agreement
    </h1>

    @if ($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">

            <ul class="list-disc pl-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('leases.update', $lease->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- Tenant --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Tenant
            </label>

            <select name="tenant_id"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                @foreach($tenants as $tenant)

                    <option value="{{ $tenant->id }}"
                        {{ $lease->tenant_id == $tenant->id ? 'selected' : '' }}>

                        {{ $tenant->name }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Property --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Property
            </label>

            <select name="property_id"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                @foreach($properties as $property)

                    <option value="{{ $property->id }}"
                        {{ $lease->property_id == $property->id ? 'selected' : '' }}>

                        {{ $property->title }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Start Date --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Start Date
            </label>

            <input type="date"
                   name="start_date"
                   value="{{ $lease->start_date }}"
                   class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        {{-- End Date --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                End Date
            </label>

            <input type="date"
                   name="end_date"
                   value="{{ $lease->end_date }}"
                   class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        {{-- Monthly Rent --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold text-gray-700">
                Monthly Rent
            </label>

            <input type="number"
                   name="monthly_rent"
                   value="{{ $lease->monthly_rent }}"
                   class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Enter monthly rent">

        </div>

        {{-- Status --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold text-gray-700">
                Status
            </label>

            <select name="status"
                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="Active"
                    {{ $lease->status == 'Active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="Completed"
                    {{ $lease->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

        </div>

        {{-- Buttons --}}
        <div class="flex gap-3">

            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl transition">

                Update Lease

            </button>

            <a href="{{ route('leases.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection