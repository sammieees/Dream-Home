@extends('layouts.app')

@section('page_title', 'Create Lease Agreement')
@section('page_subtitle', 'Capture new rental contract details')

@section('header_actions')
    <a href="{{ route('lease-agreements.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form method="POST" action="{{ route('lease-agreements.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-lg font-semibold mb-2">Property</label>
                <select name="property_id" required class="w-full border rounded-2xl p-4">
                    <option value="">Select Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Tenant</label>
                <select name="tenant_id" required class="w-full border rounded-2xl p-4">
                    <option value="">Select Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Lease Start Date</label>
                <input type="date" name="start_date" required class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Lease End Date</label>
                <input type="date" name="end_date" required class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Monthly Rent</label>
                <input type="number" name="monthly_rent" required placeholder="Enter monthly rent" class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Lease Status</label>
                <select name="status" required class="w-full border rounded-2xl p-4">
                    <option value="Active">Active</option>
                    <option value="Expired">Expired</option>
                    <option value="Terminated">Terminated</option>
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Lease Terms & Conditions</label>
                <textarea name="terms" rows="6" class="w-full border rounded-2xl p-4" placeholder="Enter lease terms..."></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Save Lease Agreement
                </button>
                <a href="{{ route('lease-agreements.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection