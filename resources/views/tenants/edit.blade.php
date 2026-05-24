@extends('layouts.app')

@section('page_title', 'Edit Tenant')
@section('page_subtitle', 'Update tenant information')

@section('header_actions')
    <a href="{{ route('tenants.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <form action="{{ route('tenants.update', $tenant) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $tenant->name) }}"
                   class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $tenant->email) }}"
                   class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Contact</label>
            <input type="text" name="contact" value="{{ old('contact', $tenant->contact) }}"
                   class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', $tenant->start_date) }}"
                   class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                Update Tenant
            </button>
            <a href="{{ route('tenants.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-2xl transition font-semibold">
                Cancel
            </a>
        </div>
    </form>

</div>

@endsection