@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Add Owner
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

    <form action="{{ route('owners.store') }}"
          method="POST"
          class="space-y-5">

        @csrf

        <!-- NAME -->
        <div>

            <label class="block font-semibold mb-2">
                Owner Name
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring focus:ring-blue-200"
                   required>

        </div>

        <!-- EMAIL -->
        <div>

            <label class="block font-semibold mb-2">
                Email
            </label>

            <input type="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring focus:ring-blue-200">

        </div>

        <!-- CONTACT -->
        <div>

            <label class="block font-semibold mb-2">
                Contact Number
            </label>

            <input type="text"
                   name="contact"
                   value="{{ old('contact') }}"
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring focus:ring-blue-200">

        </div>

        <!-- ADDRESS -->
        <div>

            <label class="block font-semibold mb-2">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring focus:ring-blue-200">{{ old('address') }}</textarea>

        </div>

        <!-- BUTTON -->
        <div class="pt-4">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl shadow transition">

                Save Owner

            </button>

        </div>

    </form>

</div>

@endsection