@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Add Staff
        </h1>

        <p class="text-gray-500 mt-2">
            Create a new staff account
        </p>

    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-3xl shadow-xl p-8">

        <form method="POST"
              action="{{ route('staff.store') }}">

            @csrf

            <!-- NAME -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Staff Name
                </label>

                <input type="text"
                       name="name"
                       required
                       placeholder="Enter staff name"
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

            <!-- PASSWORD -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       placeholder="Enter password"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- BRANCH -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Branch
                </label>

                <select name="branch_id"
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

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

            <!-- RESPONSIBILITY -->
            <div class="mb-8">

                <label class="block text-gray-700 font-semibold mb-2">
                    Responsibility
                </label>

                <input type="text"
                       name="responsibility"
                       placeholder="Enter responsibility"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4">

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Save Staff

                </button>

                <a href="{{ route('staff.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection