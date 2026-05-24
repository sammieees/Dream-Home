@extends('layouts.app')

@section('page_title', 'Property Viewing Records')
@section('page_subtitle', 'Track upcoming and completed viewings')

@section('header_actions')
    <a href="{{ route('property-viewings.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Schedule Viewing
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($viewings as $viewing)
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $viewing->property->title }}</h2>
                <p class="text-gray-700 mb-2">👤 Tenant: <span class="font-semibold">{{ $viewing->tenant->name }}</span></p>
                <p class="text-gray-700 mb-2">📅 {{ $viewing->viewing_date }}</p>
                <p class="text-gray-700 mb-4">⏰ {{ $viewing->viewing_time }}</p>
                @if($viewing->remarks)
                    <div class="mb-4">
                        <p class="text-gray-600 leading-relaxed">{{ $viewing->remarks }}</p>
                    </div>
                @endif
                <div class="mb-6">
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold @if($viewing->status == 'Pending') bg-yellow-100 text-yellow-700 @elseif($viewing->status == 'Approved') bg-blue-100 text-blue-700 @elseif($viewing->status == 'Completed') bg-green-100 text-green-700 @else bg-red-100 text-red-700 @endif">
                        {{ $viewing->status }}
                    </span>
                </div>
                <div class="flex gap-3 flex-wrap">
                    <a href="{{ route('property-viewings.edit', $viewing->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg shadow transition">Edit</a>
                    <form action="{{ route('property-viewings.destroy', $viewing->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this viewing record?')" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-3">
                <div class="bg-white p-10 rounded-2xl shadow text-center">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No Viewing Records</h2>
                    <p class="text-gray-500">Schedule your first property viewing.</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection