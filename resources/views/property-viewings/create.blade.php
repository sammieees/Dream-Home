@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-6">
        Add Property Viewing
    </h1>

    <form action="{{ route('property-viewings.store') }}"
          method="POST">

        @csrf

        {{-- Tenant --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Tenant
            </label>

            <select name="tenant_id"
                    class="w-full border rounded-xl p-3">

                <option value="">
                    Select Tenant
                </option>

                @foreach($tenants as $tenant)

                    <option value="{{ $tenant->id }}">

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

                <option value="">
                    Select Property
                </option>

                @foreach($properties as $property)

                    <option value="{{ $property->id }}">

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

                <option value="">
                    Select Staff
                </option>

                @foreach($staff as $member)

                    <option value="{{ $member->id }}">

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
                   class="w-full border rounded-xl p-3">

        </div>

        {{-- Viewing Time --}}
        <div class="mb-5">

             <label class="block mb-2 font-semibold">
                     Viewing Time
             </label>

            <input type="time"
           name="viewing_time"
           class="w-full border rounded-xl p-3">

        </div>

        {{-- Feedback --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Feedback
            </label>

            <textarea name="feedback"
                      rows="4"
                      class="w-full border rounded-xl p-3"
                      placeholder="Enter tenant feedback or comments"></textarea>

        </div>

        {{-- Status --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select name="status"
                    class="w-full border rounded-xl p-3">

                <option value="Pending">
                    Pending
                </option>

                <option value="Completed">
                    Completed
                </option>

                <option value="Cancelled">
                    Cancelled
                </option>

            </select>

        </div>

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl">

            Save Viewing

        </button>

    </form>

</div>

@endsection