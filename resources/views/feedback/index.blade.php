@extends('layouts.app')

@section('page_title', 'Property Feedback')
@section('page_subtitle', 'Collect and review tenant comments')

@section('header_actions')
    <a href="{{ route('feedback.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Add Feedback
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($feedbacks as $feedback)
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $feedback->property->title }}</h2>
                <p class="text-gray-700 mb-4">👤 <span class="font-semibold">{{ $feedback->tenant->name }}</span></p>
                <div class="text-yellow-500 text-2xl mb-4">
                    @for($i = 0; $i < $feedback->rating; $i++) ⭐ @endfor
                </div>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $feedback->comment }}</p>
                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this feedback?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            </div>
        @empty
            <div class="col-span-3">
                <div class="bg-white p-10 rounded-2xl shadow text-center">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">No Feedback Yet</h2>
                    <p class="text-gray-500">Submit your first property feedback.</p>
                </div>
            </div>
        @endforelse
    </div>

@endsection