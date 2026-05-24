@extends('layouts.app')

@section('page_title', 'Add Staff')
@section('page_subtitle', 'Create a new staff member')

@section('header_actions')
    <a href="{{ route('staff.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    @if($errors->any())
        <div class="bg-red-100 text-red-700 px-6 py-4 rounded-2xl mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl p-8">
        <form action="{{ route('staff.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Role</label>
                <select name="role" class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring focus:ring-blue-200">
                    <option value="">Select Role</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Salary</label>
                <input type="number" step="0.01" name="salary" value="{{ old('salary') }}" placeholder="Enter salary"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring focus:ring-blue-200">
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                    Save Staff
                </button>
                <a href="{{ route('staff.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-2xl transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

@endsection