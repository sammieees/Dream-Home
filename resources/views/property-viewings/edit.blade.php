@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-6">
        Edit Property Viewing
    </h1>

    <form action="{{ route('property-viewings.update', $propertyViewing) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- Tenant --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Tenant
            </label>

            <select name="tenant_id"
                    class="w-full border rounded-xl p-3">

                @foreach($tenants as $tenant)

                    <option value="{{ $tenant->id }}"
                        {{ $propertyViewing->tenant_id == $tenant->id ? 'selected' : '' }}>

                        {{ $tenant->name }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Property --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Property
            </label>

            <select name="property_id"
                    class="w-full border rounded-xl p-3">

                @foreach($properties as $property)

                    <option value="{{ $property->id }}"
                        {{ $propertyViewing->property_id == $property->id ? 'selected' : '' }}>

                        {{ $property->title }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Staff --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Assigned Staff
            </label>

            <select name="staff_id"
                    class="w-full border rounded-xl p-3">

                @foreach($staff as $member)

                    <option value="{{ $member->id }}"
                        {{ $propertyViewing->staff_id == $member->id ? 'selected' : '' }}>

                        {{ $member->name }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Viewing Date --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Viewing Date
            </label>

            <input type="date"
                   name="viewing_date"
                   value="{{ $propertyViewing->viewing_date }}"
                   class="w-full border rounded-xl p-3">

        </div>

        {{-- Viewing Time --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Viewing Time
            </label>

            <input type="time"
                   name="viewing_time"
                   value="{{ $propertyViewing->viewing_time }}"
                   class="w-full border rounded-xl p-3">

        </div>

        {{-- Feedback --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Feedback
            </label>

            <textarea name="feedback"
                      rows="4"
                      class="w-full border rounded-xl p-3">{{ $propertyViewing->feedback }}</textarea>

        </div>

        {{-- Status --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select name="status"
                    class="w-full border rounded-xl p-3">

                <option value="Pending"
                    {{ $propertyViewing->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ $propertyViewing->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

                <option value="Cancelled"
                    {{ $propertyViewing->status == 'Cancelled' ? 'selected' : '' }}>
                    Cancelled
                </option>

            </select>

        </div>

        <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

            Update Viewing

        </button>

    </form>

</div>

@endsection