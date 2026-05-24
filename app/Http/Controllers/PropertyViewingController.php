<?php

namespace App\Http\Controllers;

use App\Models\PropertyViewing;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class PropertyViewingController extends Controller
{
    /**
     * Display all viewing records
     */
    public function index()
    {
        $viewings = PropertyViewing::latest()->get();

        return view('property_viewings.index', compact('viewings'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $properties = Property::all();

        $tenants = Tenant::all();

        return view('property_viewings.create', compact(
            'properties',
            'tenants'
        ));
    }

    /**
     * Store viewing record
     */
    public function store(Request $request)
    {
        $request->validate([

            'property_id' => 'required|exists:properties,id',

            'tenant_id' => 'required|exists:tenants,id',

            'viewing_date' => 'required|date',

            'viewing_time' => 'required',

            'status' => 'required',

        ]);

        PropertyViewing::create([

            'property_id' => $request->property_id,

            'tenant_id' => $request->tenant_id,

            'viewing_date' => $request->viewing_date,

            'viewing_time' => $request->viewing_time,

            'remarks' => $request->remarks,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('property-viewings.index')
            ->with('success', 'Viewing scheduled successfully.');
    }

    /**
     * Show single viewing
     */
    public function show(PropertyViewing $propertyViewing)
    {
        return view(
            'property_viewings.show',
            compact('propertyViewing')
        );
    }

    /**
     * Show edit form
     */
    public function edit(PropertyViewing $propertyViewing)
    {
        $properties = Property::all();

        $tenants = Tenant::all();

        return view(
            'property_viewings.edit',
            compact(
                'propertyViewing',
                'properties',
                'tenants'
            )
        );
    }

    /**
     * Update viewing
     */
    public function update(
        Request $request,
        PropertyViewing $propertyViewing
    )
    {
        $request->validate([

            'property_id' => 'required|exists:properties,id',

            'tenant_id' => 'required|exists:tenants,id',

            'viewing_date' => 'required|date',

            'viewing_time' => 'required',

            'status' => 'required',

        ]);

        $propertyViewing->update([

            'property_id' => $request->property_id,

            'tenant_id' => $request->tenant_id,

            'viewing_date' => $request->viewing_date,

            'viewing_time' => $request->viewing_time,

            'remarks' => $request->remarks,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('property-viewings.index')
            ->with('success', 'Viewing updated successfully.');
    }

    /**
     * Delete viewing
     */
    public function destroy(PropertyViewing $propertyViewing)
    {
        $propertyViewing->delete();

        return redirect()
            ->route('property-viewings.index')
            ->with('success', 'Viewing deleted successfully.');
    }
}