<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display payments
     */
    public function index()
    {
        $payments = Payment::with('tenant')->get();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $tenants = Tenant::all();

        return view('payments.create', compact('tenants'));
    }

    /**
     * Store payment
     */
    public function store(Request $request)
    {
        $request->validate([

            'tenant_id' => 'required|exists:tenants,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'

        ]);

        Payment::create([

            'tenant_id' => $request->tenant_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'status' => $request->status

        ]);

        return redirect()
                ->route('payments.index')
                ->with('success', 'Payment added successfully.');
    }

    /**
     * Edit payment
     */
    public function edit(Payment $payment)
    {
        $tenants = Tenant::all();

        return view('payments.edit', compact('payment', 'tenants'));
    }

    /**
     * Update payment
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([

            'tenant_id' => 'required|exists:tenants,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'

        ]);

        $payment->update([

            'tenant_id' => $request->tenant_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'status' => $request->status

        ]);

        return redirect()
                ->route('payments.index')
                ->with('success', 'Payment updated successfully.');
    }

    /**
     * Delete payment
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
                ->route('payments.index')
                ->with('success', 'Payment deleted successfully.');
    }
}