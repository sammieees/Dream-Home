<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use App\Models\User;
use App\Models\Branch;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display all tenants
     */
    public function index()
    {
        $tenants = Tenant::with([
            'property',
            'staff',
            'branch'
        ])->get();

        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show create tenant form
     */
    public function create()
    {
        $properties = Property::where(
            'status',
            'Available'
        )->get();

        $staff = User::where(
            'role',
            'staff'
        )->get();

        $branches = Branch::all();

        return view('tenants.create', compact(

            'properties',
            'staff',
            'branches'

        ));
    }

    /**
     * Store new tenant
     */
    public function store(Request $request)
    {
        // VALIDATION
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255',

            'contact' => 'required|string|max:20',

            'property_id' => 'required|exists:properties,id',

            'staff_id' => 'nullable|exists:users,id',

            'branch_id' => 'nullable|exists:branches,id',

            'start_date' => 'required|date',

        ]);

        // CREATE TENANT
        Tenant::create([

            'name' => $request->name,

            'email' => $request->email,

            'contact' => $request->contact,

            'property_id' => $request->property_id,

            'staff_id' => $request->staff_id,

            'branch_id' => $request->branch_id,

            'start_date' => $request->start_date

        ]);

        // AUTO UPDATE PROPERTY STATUS
        Property::find($request->property_id)
                ->update([

                    'status' => 'Rented'

                ]);

        return redirect()
                ->route('tenants.index')
                ->with(
                    'success',
                    'Tenant added successfully.'
                );
    }

    /**
     * Show single tenant
     */
    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show edit form
     */
    public function edit(Tenant $tenant)
    {
        $properties = Property::all();

        $staff = User::where(
            'role',
            'staff'
        )->get();

        $branches = Branch::all();

        return view('tenants.edit', compact(

            'tenant',
            'properties',
            'staff',
            'branches'

        ));
    }

    /**
     * Update tenant
     */
    public function update(Request $request, Tenant $tenant)
    {
        // VALIDATION
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255',

            'contact' => 'required|string|max:20',

            'property_id' => 'required|exists:properties,id',

            'staff_id' => 'nullable|exists:users,id',

            'branch_id' => 'nullable|exists:branches,id',

            'start_date' => 'required|date',

        ]);

        // UPDATE TENANT
        $tenant->update([

            'name' => $request->name,

            'email' => $request->email,

            'contact' => $request->contact,

            'property_id' => $request->property_id,

            'staff_id' => $request->staff_id,

            'branch_id' => $request->branch_id,

            'start_date' => $request->start_date

        ]);

        return redirect()
                ->route('tenants.index')
                ->with(
                    'success',
                    'Tenant updated successfully.'
                );
    }

    /**
     * Delete tenant
     */
    public function destroy(Tenant $tenant)
    {
        // MAKE PROPERTY AVAILABLE AGAIN
        if ($tenant->property) {

            $tenant->property->update([

                'status' => 'Available'

            ]);
        }

        // DELETE TENANT
        $tenant->delete();

        return redirect()
                ->route('tenants.index')
                ->with(
                    'success',
                    'Tenant deleted successfully.'
                );
    }
}