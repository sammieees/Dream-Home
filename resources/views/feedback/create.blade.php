@extends('layouts.app')

@section('page_title', 'Submit Feedback')
@section('page_subtitle', 'Add a new property feedback entry')

@section('header_actions')
    <a href="{{ route('feedback.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form method="POST" action="{{ route('feedback.store') }}" class="space-y-6">
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
                <label class="block text-lg font-semibold mb-2">Rating</label>
                <select name="rating" required class="w-full border rounded-2xl p-4">
                    <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                    <option value="4">⭐⭐⭐⭐ - Very Good</option>
                    <option value="3">⭐⭐⭐ - Good</option>
                    <option value="2">⭐⭐ - Fair</option>
                    <option value="1">⭐ - Poor</option>
                </select>
            </div>

            <div>
                <label class="block text-lg font-semibold mb-2">Feedback Comment</label>
                <textarea name="comment" rows="5" required class="w-full border rounded-2xl p-4" placeholder="Enter feedback..."></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Submit Feedback
                </button>
                <a href="{{ route('feedback.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-2xl shadow-lg">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection