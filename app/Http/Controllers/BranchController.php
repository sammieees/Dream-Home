<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::latest()->get();

        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'address' => 'required',

            'contact' => 'required',

            'manager' => 'required',

        ]);

        Branch::create($request->all());

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([

            'name' => 'required',

            'address' => 'required',

            'contact' => 'required',

            'manager' => 'required',

        ]);

        $branch->update($request->all());

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}