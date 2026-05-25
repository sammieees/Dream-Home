@extends('layouts.app')

@section('content')

<div class="bg-white p-8 rounded-2xl shadow-lg">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            Lease Agreements
        </h1>

        <a href="{{ route('leases.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-xl transition">

            + Add Lease

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

                    <th class="p-4 text-left">Tenant</th>
                    <th class="p-4 text-left">Property</th>
                    <th class="p-4 text-left">Start Date</th>
                    <th class="p-4 text-left">End Date</th>
                    <th class="p-4 text-left">Monthly Rent</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($leases as $lease)

                <tr class="border-b hover:bg-gray-50">

                    {{-- Tenant --}}
                    <td class="p-4 text-gray-700">
                        {{ $lease->tenant->name }}
                    </td>

                    {{-- Property --}}
                    <td class="p-4 text-gray-700">
                        {{ $lease->property->property_name }}
                    </td>

                    {{-- Start Date --}}
                    <td class="p-4 text-gray-700">
                        {{ \Carbon\Carbon::parse($lease->start_date)->format('M d, Y') }}
                    </td>

                    {{-- End Date --}}
                    <td class="p-4 text-gray-700">
                        {{ \Carbon\Carbon::parse($lease->end_date)->format('M d, Y') }}
                    </td>

                    {{-- Monthly Rent --}}
                    <td class="p-4 font-semibold text-blue-600">
                        ₱{{ number_format($lease->monthly_rent, 2) }}
                    </td>

                    {{-- Status --}}
                    <td class="p-4">

                        @if($lease->status == 'Active')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Active

                            </span>

                        @else

                            <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Completed

                            </span>

                        @endif

                    </td>

                    {{-- Actions --}}
                    <td class="p-4">

                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('leases.edit', $lease->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg transition">

                                Edit

                            </a>

                            <form action="{{ route('leases.destroy', $lease->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this lease agreement?')">

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

                        No lease agreements found.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection