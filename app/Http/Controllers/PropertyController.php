<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Owner;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display all properties
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $properties = Property::when($search, function ($query, $search) {

            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");

        })->get();

        return view('properties.index', compact('properties'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $owners = Owner::all();

        $branches = Branch::all();

        return view('properties.create', compact(
            'owners',
            'branches'
        ));
    }

    /**
     * Store new property
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([

            'title' => 'required',
            'type' => 'required',
            'rent' => 'required|numeric',
            'address' => 'required',
            'status' => 'required',

            'owner_id' => 'required|exists:owners,id',
            'branch_id' => 'required|exists:branches,id',

            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imagePath = null;

        // Upload image
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                                 ->store('properties', 'public');
        }

        // Save property
        Property::create([

            'title' => $request->title,
            'type' => $request->type,
            'rent' => $request->rent,
            'address' => $request->address,
            'status' => $request->status,

            'owner_id' => $request->owner_id,
            'branch_id' => $request->branch_id,

            'description' => $request->description,
            'image' => $imagePath

        ]);

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property added successfully.');
    }

    /**
     * Show single property
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    /**
     * Show edit form
     */
    public function edit(Property $property)
    {
        $owners = Owner::all();

        $branches = Branch::all();

        return view('properties.edit', compact(
            'property',
            'owners',
            'branches'
        ));
    }

    /**
     * Update property
     */
    public function update(Request $request, Property $property)
    {
        // Validation
        $request->validate([

            'title' => 'required',
            'type' => 'required',
            'rent' => 'required|numeric',
            'address' => 'required',
            'status' => 'required',

            'owner_id' => 'required|exists:owners,id',
            'branch_id' => 'required|exists:branches,id',

            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imagePath = $property->image;

        // Upload new image
        if ($request->hasFile('image')) {

            // Delete old image
            if ($property->image) {

                Storage::disk('public')->delete($property->image);
            }

            // Save new image
            $imagePath = $request->file('image')
                                 ->store('properties', 'public');
        }

        // Update property
        $property->update([

            'title' => $request->title,
            'type' => $request->type,
            'rent' => $request->rent,
            'address' => $request->address,
            'status' => $request->status,

            'owner_id' => $request->owner_id,
            'branch_id' => $request->branch_id,

            'description' => $request->description,
            'image' => $imagePath

        ]);

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }

    /**
     * Delete property
     */
    public function destroy(Property $property)
    {
        // Delete image
        if ($property->image) {

            Storage::disk('public')->delete($property->image);
        }

        // Delete property
        $property->delete();

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}