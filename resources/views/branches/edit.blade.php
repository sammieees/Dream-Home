@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-8">
        Edit Branch
    </h1>

    <form action="{{ route('branches.update', $branch->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <!-- BRANCH NAME -->
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Branch Name
            </label>

            <input type="text"
                   name="name"
                   value="{{ $branch->name }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <!-- LOCATION -->
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Location
            </label>

            <input type="text"
                   name="location"
                   value="{{ $branch->location }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <!-- ADDRESS -->
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Address
            </label>

            <input type="text"
                   name="address"
                   value="{{ $branch->address }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <!-- CONTACT -->
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Contact
            </label>

            <input type="text"
                   name="contact"
                   value="{{ $branch->contact }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <!-- MANAGER -->
        <div class="mb-8">

            <label class="block mb-2 font-semibold">
                Manager
            </label>

            <input type="text"
                   name="manager"
                   value="{{ $branch->manager }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <div class="flex gap-4">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl">

                Update Branch

            </button>

            <a href="{{ route('branches.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection