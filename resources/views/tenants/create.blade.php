@extends('layouts.app')

@section('page_title', 'Add Tenant')
@section('page_subtitle', 'Register a new tenant into the rental system')

@section('header_actions')
    <a href="{{ route('tenants.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-xl p-8">
        <form method="POST" action="{{ route('tenants.store') }}" onsubmit="disableButton()" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Tenant Name</label>
                <input type="text" name="name" required placeholder="Enter tenant name"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" required placeholder="Enter email"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Contact Number</label>
                <input type="text" name="contact" required placeholder="Enter contact number"
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Select Property</label>
                <select name="property_id" required
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Choose Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }} - ₱{{ number_format($property->rent, 2) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Assign Staff</label>
                <select name="staff_id"
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Staff</option>
                    @foreach($staff as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Assign Branch</label>
                <select name="branch_id"
                        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Branch</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Start Date</label>
                <input type="date" name="start_date" required
                       class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" id="submitBtn"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                    Save Tenant
                </button>
                <a href="{{ route('tenants.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

<script>
    function disableButton() {
        let btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = 'Saving...';
    }
</script>

@endsection