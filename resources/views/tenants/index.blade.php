@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Tenants
        </h1>

        <p class="text-gray-500 mt-1">
            Manage all tenants
        </p>

    </div>

    <!-- ONLY ADMIN CAN ADD -->
    @if(auth()->user()->role == 'admin')

        <a href="{{ route('tenants.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

            + Add Tenant

        </a>

    @endif

</div>

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">Tenant</th>
                <th class="text-left p-5">Email</th>
                <th class="text-left p-5">Contact</th>
                <th class="text-left p-5">Property</th>
                <th class="text-left p-5">Staff</th>
                <th class="text-left p-5">Branch</th>
                <th class="text-left p-5">Start Date</th>

                <!-- ONLY ADMIN CAN SEE ACTIONS -->
                @if(auth()->user()->role == 'admin')

                    <th class="text-left p-5">Actions</th>

                @endif

            </tr>

        </thead>

        <tbody>

            @forelse($tenants as $tenant)

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- NAME -->
                    <td class="p-5 font-semibold text-gray-800">
                        {{ $tenant->name }}
                    </td>

                    <!-- EMAIL -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->email }}
                    </td>

                    <!-- CONTACT -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->contact }}
                    </td>

                    <!-- PROPERTY -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->property->title ?? 'No Property Assigned' }}
                    </td>

                    <!-- STAFF -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->staff->name ?? 'No Staff Assigned' }}
                    </td>

                    <!-- BRANCH -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->branch->name ?? 'No Branch Assigned' }}
                    </td>

                    <!-- START DATE -->
                    <td class="p-5 text-gray-600">
                        {{ $tenant->start_date }}
                    </td>

                    <!-- ACTIONS -->
                    @if(auth()->user()->role == 'admin')

                        <td class="p-5">

                            <div class="flex gap-3">

                                <!-- EDIT -->
                                <a href="{{ route('tenants.edit', $tenant) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl shadow transition">

                                    Edit

                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('tenants.destroy', $tenant) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this tenant?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow transition">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    @endif

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="text-center p-10 text-gray-500">

                        No tenants found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection