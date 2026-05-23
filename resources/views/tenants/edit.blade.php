@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-6">
        Edit Tenant
    </h1>

    <form action="{{ route('tenants.update', $tenant) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Name
            </label>

            <input type="text"
                   name="name"
                   value="{{ $tenant->name }}"
                   class="w-full border rounded-xl p-3">
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Email
            </label>

            <input type="email"
                   name="email"
                   value="{{ $tenant->email }}"
                   class="w-full border rounded-xl p-3">
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Contact
            </label>

            <input type="text"
                   name="contact"
                   value="{{ $tenant->contact }}"
                   class="w-full border rounded-xl p-3">
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-semibold">
                Start Date
            </label>

            <input type="date"
                   name="start_date"
                   value="{{ $tenant->start_date }}"
                   class="w-full border rounded-xl p-3">
        </div>

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl">

            Update Tenant

        </button>

    </form>

</div>

@endsection