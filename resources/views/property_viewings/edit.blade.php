@extends('layouts.app')

@section('page_title', 'Edit Viewing Schedule')
@section('page_subtitle', 'Update viewing appointment details')

@section('header_actions')
    <a href="{{ route('property-viewings.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form method="POST" action="{{ route('property-viewings.update', $propertyViewing->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-lg font-semibold mb-2">Property</label>
                <select name="property_id" class="w-full border rounded-2xl p-4">
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}" {{ $propertyViewing->property_id == $property->id ? 'selected' : '' }}>{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Tenant</label>
                <select name="tenant_id" class="w-full border rounded-2xl p-4">
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ $propertyViewing->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Viewing Date</label>
                <input type="date" name="viewing_date" value="{{ $propertyViewing->viewing_date }}" class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Viewing Time</label>
                <input type="time" name="viewing_time" value="{{ $propertyViewing->viewing_time }}" class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Remarks</label>
                <textarea name="remarks" rows="4" class="w-full border rounded-2xl p-4">{{ $propertyViewing->remarks }}</textarea>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Status</label>
                <select name="status" class="w-full border rounded-2xl p-4">
                    <option value="Pending" {{ $propertyViewing->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $propertyViewing->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Completed" {{ $propertyViewing->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $propertyViewing->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Update Viewing
                </button>
                <a href="{{ route('property-viewings.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection