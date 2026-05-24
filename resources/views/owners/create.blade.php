@extends('layouts.app')

@section('page_title', 'Add Owner')
@section('page_subtitle', 'Create a new property owner')
@section('breadcrumbs')
    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
        <a href="{{ route('owners.index') }}" class="hover:text-slate-900">Owners</a>
        <span>/</span>
        <span>Add Owner</span>
    </div>
@endsection

@section('header_actions')
    <a href="{{ route('owners.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-2xl mx-auto bg-white border border-slate-200 p-8 rounded-2xl shadow-sm">

    <form method="POST"
          action="{{ route('owners.store') }}">

        @csrf

        <!-- Name -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Owner Name
            </label>

            <input type="text"
                   name="name"
                   placeholder="Enter owner name"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Email -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Email
            </label>

            <input type="email"
                   name="email"
                   placeholder="Enter email"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Contact -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Contact
            </label>

            <input type="text"
                   name="contact"
                   placeholder="Enter contact number"
                   class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        </div>

        <!-- Address -->
        <div class="mb-6">

            <label class="block text-lg font-semibold mb-2">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      placeholder="Enter address"
                      class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

        </div>

        <!-- Buttons -->
        <div class="flex gap-4">

            <button type="submit"
                    class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-cyan-700">

                Save Owner

            </button>

            <a href="{{ route('owners.index') }}"
               class="inline-flex items-center justify-center rounded-2xl bg-slate-500 px-6 py-3 text-white font-semibold shadow-sm transition hover:bg-slate-600">

                Cancel

            </a>

        </div>

    </form>

</div>

@endsection