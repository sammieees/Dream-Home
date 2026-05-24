<?php

namespace App\Http\Controllers;

use App\Models\LeaseAgreement;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class LeaseAgreementController extends Controller
{
    /**
     * Display all lease agreements
     */
    public function index()
    {
        $leases = LeaseAgreement::latest()->get();

        return view('lease_agreements.index', compact('leases'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $properties = Property::all();

        $tenants = Tenant::all();

        return view('lease_agreements.create', compact(
            'properties',
            'tenants'
        ));
    }

    /**
     * Store lease agreement
     */
    public function store(Request $request)
    {
        $request->validate([

            'property_id' => 'required',

            'tenant_id' => 'required',

            'start_date' => 'required|date',

            'end_date' => 'required|date',

            'monthly_rent' => 'required|numeric',

            'status' => 'required',

        ]);

        LeaseAgreement::create([

            'property_id' => $request->property_id,

            'tenant_id' => $request->tenant_id,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'monthly_rent' => $request->monthly_rent,

            'terms' => $request->terms,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('lease-agreements.index')
            ->with('success', 'Lease agreement created successfully.');
    }

    /**
     * Show single lease
     */
    public function show(LeaseAgreement $leaseAgreement)
    {
        //
    }

    /**
     * Show edit form
     */
    public function edit(LeaseAgreement $leaseAgreement)
    {
        //
    }

    /**
     * Update lease
     */
    public function update(Request $request, LeaseAgreement $leaseAgreement)
    {
        //
    }

    /**
     * Delete lease
     */
    public function destroy(LeaseAgreement $leaseAgreement)
    {
        $leaseAgreement->delete();

        return redirect()
            ->route('lease-agreements.index')
            ->with('success', 'Lease agreement deleted successfully.');
    }
}