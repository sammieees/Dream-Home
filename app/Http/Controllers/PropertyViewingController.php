<?php

namespace App\Http\Controllers;

use App\Models\PropertyViewing;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyViewingController extends Controller
{
    /**
     * Display all property viewings
     */
    public function index()
    {
        $viewings = PropertyViewing::with([
            'tenant',
            'property',
            'staff'
        ])->get();

        return view(
            'property-viewings.index',
            compact('viewings')
        );
    }

    /**
     * Show create form
     */
    public function create()
    {
        $tenants = Tenant::all();

        $properties = Property::all();

        $staff = User::where(
            'role',
            'staff'
        )->get();

        return view(
            'property-viewings.create',
            compact(
                'tenants',
                'properties',
                'staff'
            )
        );
    }

    /**
     * Store viewing
     */
    public function store(Request $request)
    {
        $request->validate([

            'tenant_id' => 'required',

            'property_id' => 'required',

            'staff_id' => 'required',

            'viewing_date' => 'required|date',

            'viewing_time' => 'required',

            'feedback' => 'nullable',

            'status' => 'required'

        ]);

        PropertyViewing::create([

            'tenant_id' => $request->tenant_id,

            'property_id' => $request->property_id,

            'staff_id' => $request->staff_id,

            'viewing_date' => $request->viewing_date,

            'viewing_time' => $request->viewing_time,

            'feedback' => $request->feedback,

            'status' => $request->status

        ]);

        return redirect()
                ->route('property-viewings.index')
                ->with(
                    'success',
                    'Viewing recorded successfully.'
                );
    }

    /**
     * Show single viewing
     */
    public function show(PropertyViewing $propertyViewing)
    {
        return view(
            'property-viewings.show',
            compact('propertyViewing')
        );
    }

    /**
     * Show edit form
     */
    public function edit(PropertyViewing $propertyViewing)
    {
        $tenants = Tenant::all();

        $properties = Property::all();

        $staff = User::where(
            'role',
            'staff'
        )->get();

        return view(
            'property-viewings.edit',
            compact(
                'propertyViewing',
                'tenants',
                'properties',
                'staff'
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

            'tenant_id' => 'required',

            'property_id' => 'required',

            'staff_id' => 'required',

            'viewing_date' => 'required|date',

            'viewing_time' => 'required',

            'feedback' => 'nullable',

            'status' => 'required'

        ]);

        $propertyViewing->update([

            'tenant_id' => $request->tenant_id,

            'property_id' => $request->property_id,

            'staff_id' => $request->staff_id,

            'viewing_date' => $request->viewing_date,

            'viewing_time' => $request->viewing_time,

            'feedback' => $request->feedback,

            'status' => $request->status

        ]);

        return redirect()
                ->route('property-viewings.index')
                ->with(
                    'success',
                    'Viewing updated successfully.'
                );
    }

    /**
     * Delete viewing
     */
    public function destroy(PropertyViewing $propertyViewing)
    {
        $propertyViewing->delete();

        return redirect()
                ->route('property-viewings.index')
                ->with(
                    'success',
                    'Viewing deleted successfully.'
                );
    }
}