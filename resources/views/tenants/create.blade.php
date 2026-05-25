@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-6">
        Add Tenant
    </h1>

    <form action="{{ route('tenants.store') }}"
          method="POST">

        @csrf

        {{-- Name --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Name
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full border rounded-xl p-3">

        </div>

        {{-- Email --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Email
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="w-full border rounded-xl p-3">

        </div>

        {{-- Contact --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Contact
            </label>

            <input type="text"
                   name="contact"
                   value="{{ old('contact') }}"
                   class="w-full border rounded-xl p-3">

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
                        - ₱{{ number_format($property->rent, 2) }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Assign Staff --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Assign Staff
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

        {{-- Branch --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Branch
            </label>

            <select name="branch_id"
                    class="w-full border rounded-xl p-3">

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

        {{-- Start Date --}}
        <div class="mb-5">

            <label class="block mb-2 font-semibold">
                Start Date
            </label>

            <input type="date"
                   name="start_date"
                   value="{{ old('start_date') }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl">

            Add Tenant

        </button>

    </form>

</div>

@endsection