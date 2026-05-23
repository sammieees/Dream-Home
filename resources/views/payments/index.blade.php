@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-gray-800">
            Payments
        </h1>

        <p class="text-gray-500 mt-1">
            Manage payment records
        </p>

    </div>

    <!-- ONLY ADMIN CAN ADD PAYMENT -->
    @if(auth()->user()->role == 'admin')

        <a href="{{ route('payments.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg transition">

            + Add Payment

        </a>

    @endif

</div>

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <table class="w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-5">
                    Tenant
                </th>

                <th class="text-left p-5">
                    Amount
                </th>

                <th class="text-left p-5">
                    Payment Date
                </th>

                <th class="text-left p-5">
                    Status
                </th>

                <!-- ONLY ADMIN CAN SEE ACTIONS -->
                @if(auth()->user()->role == 'admin')

                    <th class="text-left p-5">
                        Actions
                    </th>

                @endif

            </tr>

        </thead>

        <tbody>

            @forelse($payments as $payment)

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- TENANT -->
                    <td class="p-5 font-semibold">

                        {{ $payment->tenant->name }}

                    </td>

                    <!-- AMOUNT -->
                    <td class="p-5">

                        ₱{{ number_format($payment->amount, 2) }}

                    </td>

                    <!-- PAYMENT DATE -->
                    <td class="p-5">

                        {{ $payment->payment_date }}

                    </td>

                    <!-- STATUS -->
                    <td class="p-5">

                        @if($payment->status == 'Paid')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl">
                                Paid
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-xl">
                                Unpaid
                            </span>

                        @endif

                    </td>

                    <!-- ACTIONS -->
                    @if(auth()->user()->role == 'admin')

                        <td class="p-5">

                            <div class="flex gap-3">

                                <!-- EDIT BUTTON -->
                                <a href="{{ route('payments.edit', $payment->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl shadow transition">

                                    Edit

                                </a>

                                <!-- DELETE BUTTON -->
                                <form action="{{ route('payments.destroy', $payment->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete payment?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl shadow transition">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    @endif

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center p-10 text-gray-500">

                        No payments found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection