@extends('layouts.app')

@section('page_title', 'Tenants')
@section('page_subtitle', 'Manage all tenants')

@section('header_actions')
    <a href="{{ route('tenants.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Add Tenant
    </a>
@endsection

@section('content')

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
                    <th class="text-left p-5">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tenants as $tenant)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="p-5 font-semibold text-gray-800">{{ $tenant->name }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->email }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->contact }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->property->title ?? 'No Property Assigned' }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->staff->name ?? 'No Staff Assigned' }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->branch->name ?? 'No Branch Assigned' }}</td>
                        <td class="p-5 text-gray-600">{{ $tenant->start_date }}</td>
                        <td class="p-5">
                            <div class="flex gap-3 flex-wrap">
                                <a href="{{ route('tenants.edit', $tenant) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl shadow transition">
                                    Edit
                                </a>
                                <form action="{{ route('tenants.destroy', $tenant) }}" method="POST">
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center p-10 text-gray-500">No tenants found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection