@extends('layouts.app')

@section('page_title', 'Schedule Viewing')
@section('page_subtitle', 'Create a new property viewing appointment')

@section('header_actions')
    <a href="{{ route('property-viewings.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form method="POST" action="{{ route('property-viewings.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-lg font-semibold mb-2">Select Property</label>
                <select name="property_id" required class="w-full border rounded-2xl p-4">
                    <option value="">Choose Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Select Tenant</label>
                <select name="tenant_id" required class="w-full border rounded-2xl p-4">
                    <option value="">Choose Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Viewing Date</label>
                <input type="date" name="viewing_date" required class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Viewing Time</label>
                <input type="time" name="viewing_time" required class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Remarks</label>
                <textarea name="remarks" rows="4" class="w-full border rounded-2xl p-4" placeholder="Enter remarks..."></textarea>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Viewing Status</label>
                <select name="status" class="w-full border rounded-2xl p-4">
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Schedule Viewing
                </button>
                <a href="{{ route('property-viewings.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection