@extends('layouts.app')

@section('page_title', 'Payments')
@section('page_subtitle', 'Manage payment records')

@section('header_actions')
    <a href="{{ route('payments.create') }}"
       class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl shadow-lg transition">
        + Add Payment
    </a>
@endsection

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left p-5">Tenant</th>
                    <th class="text-left p-5">Amount</th>
                    <th class="text-left p-5">Payment Date</th>
                    <th class="text-left p-5">Status</th>
                    <th class="text-left p-5">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="p-5 font-semibold text-gray-800">{{ $payment->tenant->name ?? 'No Tenant' }}</td>
                        <td class="p-5 text-gray-600">₱{{ number_format($payment->amount, 2) }}</td>
                        <td class="p-5 text-gray-600">{{ $payment->payment_date }}</td>
                        <td class="p-5">
                            @if($payment->status == 'Paid')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl font-semibold">Paid</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-xl font-semibold">Unpaid</span>
                            @endif
                        </td>
                        <td class="p-5">
                            <div class="flex gap-3 flex-wrap">
                                <a href="{{ route('payments.edit', $payment->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl shadow transition">Edit</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete payment?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-10 text-gray-500">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection