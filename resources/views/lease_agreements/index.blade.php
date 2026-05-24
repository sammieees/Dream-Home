@extends('layouts.app')

@section('page_title', 'Lease Agreements')
@section('page_subtitle', 'View active contracts and status updates')

@section('header_actions')
    <a href="{{ route('lease-agreements.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Create Lease
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($leases as $lease)
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $lease->property->title }}</h2>
                <p class="text-gray-700 mb-2">👤 Tenant: <span class="font-semibold">{{ $lease->tenant->name }}</span></p>
                <p class="text-gray-700 mb-2">📅 Start: {{ $lease->start_date }}</p>
                <p class="text-gray-700 mb-4">📅 End: {{ $lease->end_date }}</p>
                <p class="text-green-600 text-2xl font-bold mb-4">₱{{ number_format($lease->monthly_rent, 2) }}</p>
                @if($lease->terms)
                    <div class="mb-4">
                        <p class="text-gray-600">{{ $lease->terms }}</p>
                    </div>
                @endif
                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold @if($lease->status == 'Active') bg-green-100 text-green-700 @elseif($lease->status == 'Expired') bg-yellow-100 text-yellow-700 @else bg-red-100 text-red-700 @endif">
                    {{ $lease->status }}
                </span>
                <form action="{{ route('lease-agreements.destroy', $lease->id) }}" method="POST" class="mt-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this lease agreement?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            </div>
        @empty
            <div class="col-span-3">
                <div class="bg-white p-10 rounded-2xl shadow text-center">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No Lease Agreements Yet</h2>
                    <p class="text-gray-500">Create your first lease agreement.</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection