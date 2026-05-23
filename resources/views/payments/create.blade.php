@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Add Payment
        </h1>

        <p class="text-gray-500 mt-1">
            Record tenant payment
        </p>

    </div>

    <!-- CARD -->
    <div class="bg-white p-8 rounded-3xl shadow-xl">

        <form action="{{ route('payments.store') }}"
              method="POST"
              class="space-y-6">

            @csrf

            <!-- TENANT -->
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Tenant
                </label>

                <select name="tenant_id"
                        required
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="">
                        Select Tenant
                    </option>

                    @foreach($tenants as $tenant)

                        <option value="{{ $tenant->id }}">

                            {{ $tenant->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- AMOUNT -->
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Amount
                </label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       required
                       placeholder="Enter payment amount"
                       class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- PAYMENT DATE -->
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Payment Date
                </label>

                <input type="date"
                       name="payment_date"
                       required
                       class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- STATUS -->
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Status
                </label>

                <select name="status"
                        required
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="Paid">
                        Paid
                    </option>

                    <option value="Unpaid">
                        Unpaid
                    </option>

                </select>

            </div>

            <!-- BUTTON -->
            <div class="pt-4">

                <button type="submit"
                        id="submitBtn"
                        onclick="disableButton()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg transition font-semibold">

                    Save Payment

                </button>

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