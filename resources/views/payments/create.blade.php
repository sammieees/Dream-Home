@extends('layouts.app')

@section('page_title', 'Add Payment')
@section('page_subtitle', 'Record tenant payment')

@section('header_actions')
    <a href="{{ route('payments.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-2xl mb-6">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-8 rounded-3xl shadow-xl">
        <form action="{{ route('payments.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Tenant</label>
                <select name="tenant_id" required
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Tenant</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required placeholder="Enter payment amount"
                       class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Payment Date</label>
                <input type="date" name="payment_date" value="{{ old('payment_date') }}" required
                       class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Status</label>
                <select name="status" required
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Paid" {{ old('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ old('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" id="submitBtn"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg transition font-semibold">
                    Save Payment
                </button>
                <a href="{{ route('payments.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-4 rounded-2xl transition font-semibold">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

<script>
    function disableButton() {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.innerHTML = 'Saving...';
        btn.form.submit();
    }
</script>

@endsection