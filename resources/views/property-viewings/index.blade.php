@extends('layouts.app')

@section('content')

<div class="bg-white p-8 rounded-2xl shadow-lg">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            Property Viewings
        </h1>

        <a href="{{ route('property-viewings.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl transition">

            + Add Viewing

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="overflow-x-auto">

        <table class="w-full border-collapse">

            <thead>

                <tr class="bg-gray-100">

                    <th class="p-4 text-left">
                        Tenant
                    </th>

                    <th class="p-4 text-left">
                        Property
                    </th>

                    <th class="p-4 text-left">
                        Staff
                    </th>

                    <th class="p-4 text-left">
                        Viewing Date
                    </th>

                    <th class="p-4 text-left">
                        Feedback
                    </th>

                    <th class="p-4 text-left">
                        Status
                    </th>

                    <th class="p-4 text-center">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($viewings as $viewing)

                <tr class="border-b hover:bg-gray-50">

                    {{-- Tenant --}}
                    <td class="p-4 text-gray-700">

                        {{ $viewing->tenant->name }}

                    </td>

                    {{-- Property --}}
                    <td class="p-4 text-gray-700">

                        {{ $viewing->property->title }}

                    </td>

                    {{-- Staff --}}
                    <td class="p-4 text-gray-700">

                        {{ $viewing->staff->name }}

                    </td>

                    {{-- Viewing Date --}}
                    <td class="p-4 text-gray-700">

                        {{ $viewing->viewing_date }}

                    </td>

                    {{-- Feedback --}}
                    <td class="p-4 text-gray-700">

                        {{ $viewing->feedback ?? 'No Feedback' }}

                    </td>

                    {{-- Status --}}
                    <td class="p-4">

                        @if($viewing->status == 'Completed')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Completed

                            </span>

                        @elseif($viewing->status == 'Pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Pending

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Cancelled

                            </span>

                        @endif

                    </td>

                    {{-- Actions --}}
                    <td class="p-4">

                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('property-viewings.edit', $viewing->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg transition">

                                Edit

                            </a>

                            <form action="{{ route('property-viewings.destroy', $viewing->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this viewing?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center p-6 text-gray-500">

                        No property viewings found.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection