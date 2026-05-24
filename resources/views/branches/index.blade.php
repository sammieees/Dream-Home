@extends('layouts.app')

@section('page_title', 'Branches')
@section('page_subtitle', 'Manage all branch records')

@section('header_actions')
    <a href="{{ route('branches.create') }}"
       class="inline-flex items-center bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Add Branch
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-5">Branch Name</th>
                    <th class="text-left p-5">Location</th>
                    <th class="text-left p-5">Address</th>
                    <th class="text-left p-5">Contact</th>
                    <th class="text-left p-5">Manager</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branches as $branch)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="p-5 font-semibold text-gray-800">{{ $branch->name }}</td>
                        <td class="p-5 text-gray-600">{{ $branch->location }}</td>
                        <td class="p-5 text-gray-600">{{ $branch->address }}</td>
                        <td class="p-5 text-gray-600">{{ $branch->contact }}</td>
                        <td class="p-5 text-gray-600">{{ $branch->manager }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-10 text-gray-500">No branches found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection