@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Owners
        </h1>

        <p class="text-gray-500 mt-1">
            Manage property owners
        </p>

    </div>

    <a href="{{ route('owners.create') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

        + Add Owner

    </a>

</div>

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">Name</th>
                <th class="text-left p-5">Email</th>
                <th class="text-left p-5">Contact</th>
                <th class="text-left p-5">Address</th>
                <th class="text-left p-5">Properties</th>
                <th class="text-left p-5">Branch</th>
                <th class="text-left p-5">Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($owners as $owner)

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NAME -->
                    <td class="p-5 font-semibold">

                        {{ $owner->name }}

                    </td>

                    <!-- EMAIL -->
                    <td class="p-5">

                        {{ $owner->email }}

                    </td>

                    <!-- CONTACT -->
                    <td class="p-5">

                        {{ $owner->contact }}

                    </td>

                    <!-- ADDRESS -->
                    <td class="p-5">

                        {{ $owner->address }}

                    </td>

                    <!-- PROPERTIES -->
                    <td class="p-5">

                        @forelse($owner->properties as $property)

                            <div class="mb-1">

                                {{ $property->title }}

                            </div>

                        @empty

                            No Property

                        @endforelse

                    </td>

                    <!-- BRANCH -->
                    <td class="p-5">

                        @forelse($owner->properties as $property)

                            <div class="mb-1">

                                {{ $property->branch->name ?? 'No Branch' }}

                            </div>

                        @empty

                            No Branch

                        @endforelse

                    </td>

                    <!-- ACTIONS -->
                    <td class="p-5">

                        <div class="flex gap-3">

                            <!-- EDIT -->
                            <a href="{{ route('owners.edit', $owner) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl">

                                Edit

                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('owners.destroy', $owner) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete owner?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        class="text-center p-10 text-gray-500">

                        No owners found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection