<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    /**
     * Display staff list.
     */
    public function index()
    {
        $staff = User::where('role', 'staff')
            ->orWhere('role', 'admin')
            ->get();

        return view('staff.index', compact('staff'));
    }

    /**
     * Update salary.
     */
    public function updateSalary(Request $request, $id)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0'
        ]);

        $user = User::findOrFail($id);

        $user->salary = $request->salary;

        $user->save();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Salary updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    
    {
    $staff = User::findOrFail($id);

    $staff->delete();

    return redirect()->route('staff.index')
        ->with('success', 'Staff deleted successfully.');
}
}