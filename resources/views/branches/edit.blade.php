@extends('layouts.app')

@section('page_title', 'Edit Branch')
@section('page_subtitle', 'Update branch details')

@section('header_actions')
    <a href="{{ route('branches.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form method="POST" action="{{ route('branches.update', $branch->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Branch Name</label>
                <input type="text" name="name" value="{{ old('name', $branch->name) }}" required placeholder="Enter branch name"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Location</label>
                <input type="text" name="location" value="{{ old('location', $branch->location) }}" required placeholder="Enter branch location"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Address</label>
                <input type="text" name="address" value="{{ old('address', $branch->address) }}" required placeholder="Enter branch address"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Contact Number</label>
                <input type="text" name="contact" value="{{ old('contact', $branch->contact) }}" required placeholder="Enter branch contact number"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Branch Manager</label>
                <input type="text" name="manager" value="{{ old('manager', $branch->manager) }}" required placeholder="Enter branch manager"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                    Save Changes
                </button>
                <a href="{{ route('branches.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
