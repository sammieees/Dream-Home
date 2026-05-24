@extends('layouts.app')

@section('page_title', 'Edit Payment')
@section('page_subtitle', 'Update payment details')

@section('header_actions')
    <a href="{{ route('payments.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-2xl transition font-semibold">
        Back
    </a>
@endsection

@section('content')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xl">

    <form action="{{ route('payments.update', $payment->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Tenant</label>
            <select name="tenant_id" required
                    class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400">
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}" {{ $payment->tenant_id == $tenant->id ? 'selected' : '' }}>
                        {{ $tenant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ $payment->amount }}" required
                   class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Payment Date</label>
            <input type="date" name="payment_date" value="{{ $payment->payment_date }}" required
                   class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Status</label>
            <select name="status" required
                    class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400">
                <option value="Paid" {{ $payment->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="Unpaid" {{ $payment->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                Update Payment
            </button>
            <a href="{{ route('payments.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">
                Cancel
            </a>
        </div>
    </form>

</div>

@endsection