@extends('layouts.app')

@section('page_title', 'Edit Owner')
@section('page_subtitle', 'Update owner information')
@section('breadcrumbs')
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('owners.index') }}" class="hover:text-slate-900">Owners</a>
        <span>/</span>
        <span>Edit Owner</span>
    </div>
@endsection

@section('header_actions')
    <a href="{{ route('owners.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto bg-white border border-slate-200 rounded-3xl shadow-sm">

    <!-- ERRORS -->
    @if($errors->any())

        <div class="bg-red-100 text-red-700 px-6 py-4 rounded-2xl mb-6">

            <ul class="list-disc pl-5">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- FORM -->
    <div class="bg-white rounded-3xl shadow-xl p-8">

        <form action="{{ route('owners.update', $owner->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>

                <label class="block text-gray-700 font-semibold mb-2">

                    Full Name

                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $owner->name) }}"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3">

            </div>

            <!-- EMAIL -->
            <div>

                <label class="block text-gray-700 font-semibold mb-2">

                    Email

                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $owner->email) }}"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3">

            </div>

            <!-- CONTACT -->
            <div>

                <label class="block text-gray-700 font-semibold mb-2">

                    Contact Number

                </label>

                <input type="text"
                       name="contact"
                       value="{{ old('contact_number', $owner->contact_number ?? $owner->contact) }}"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3">

            </div>

            <!-- ADDRESS -->
            <div>

                <label class="block text-gray-700 font-semibold mb-2">

                    Address

                </label>

                <textarea name="address"
                          rows="4"
                          class="w-full border border-gray-300 rounded-2xl px-4 py-3">{{ old('address', $owner->address) }}</textarea>

            </div>

            <!-- BUTTONS -->
            <div class="flex gap-4 pt-4">

                <button type="submit"
                        class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-cyan-700">

                    Update Owner

                </button>

                <a href="{{ route('owners.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-slate-500 px-6 py-3 text-white font-semibold shadow-sm transition hover:bg-slate-600">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection