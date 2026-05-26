@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8 flex items-center justify-between">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Add Staff
            </h1>

            <p class="text-gray-500 mt-2">
                Create a new staff account
            </p>

        </div>

        <!-- BACK BUTTON -->
        <a href="{{ route('staff.index') }}"
           class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-2xl transition font-medium">

            ← Back

        </a>

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

            <!-- SALARY -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Salary
                </label>

                <input type="number"
                       name="salary"
                       placeholder="Enter salary"
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

                <select name="responsibility"
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="">
                        Select Responsibility
                    </option>

                    <option value="Handles tenant inquiries and property concerns">
                        Handles tenant inquiries and property concerns
                    </option>

                    <option value="Manages property viewings and client assistance">
                        Manages property viewings and client assistance
                    </option>

                    <option value="Maintains branch operations and documentation">
                        Maintains branch operations and documentation
                    </option>

                    <option value="Processes rental applications and contracts">
                        Processes rental applications and contracts
                    </option>

                    <option value="Coordinates property maintenance and inspections">
                        Coordinates property maintenance and inspections
                    </option>

                    <option value="Monitors rental payments and tenant records">
                        Monitors rental payments and tenant records
                    </option>

                </select>

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