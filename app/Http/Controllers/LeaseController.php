<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leases = Lease::with('tenant', 'property')->get();

        return view('leases.index', compact('leases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all();
        $properties = Property::all();

        return view('leases.create', compact('tenants', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required',
            'property_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'monthly_rent' => 'required|numeric',
            'status' => 'required',
        ]);

        Lease::create($request->all());

        return redirect()->route('leases.index')
            ->with('success', 'Lease created successfully.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lease $lease)
    {
        $tenants = Tenant::all();
        $properties = Property::all();

        return view('leases.edit', compact('lease', 'tenants', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lease $lease)
    {
        $request->validate([
            'tenant_id' => 'required',
            'property_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'monthly_rent' => 'required|numeric',
            'status' => 'required',
        ]);

        $lease->update($request->all());

        return redirect()->route('leases.index')
            ->with('success', 'Lease updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lease $lease)
    {
        $lease->delete();

        return redirect()->route('leases.index')
            ->with('success', 'Lease deleted successfully.');
    }
}