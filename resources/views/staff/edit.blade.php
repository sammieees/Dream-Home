@extends('layouts.app')

@section('page_title', 'Edit')
@section('page_subtitle', 'Update staff profile and compensation details')

@section('header_actions')
    <a href="{{ route('staff.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-3xl mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8">
        <form action="{{ route('staff.update', $staff->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-slate-700 font-semibold mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $staff->name) }}" class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200" />
            </div>

            <div>
                <label class="block text-slate-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $staff->email) }}" class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200" />
            </div>

            <div>
                <label class="block text-slate-700 font-semibold mb-2">Role</label>
                <select name="role" class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="staff" {{ old('role', $staff->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="admin" {{ old('role', $staff->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div>
                <label class="block text-slate-700 font-semibold mb-2">Salary</label>
                <input type="number" step="0.01" name="salary" value="{{ old('salary', $staff->salary) }}" class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-200" />
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-blue-600 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-blue-700">
                    Update
                </button>
                <a href="{{ route('staff.index') }}" class="inline-flex items-center justify-center rounded-2xl bg-gray-200 px-6 py-3 text-slate-700 font-semibold transition hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

@endsection