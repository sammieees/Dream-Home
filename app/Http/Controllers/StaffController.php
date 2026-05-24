<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display staff list
     */
    public function index()
    {
        $staff = User::where('role', 'staff')
                     ->orWhere('role', 'admin')
                     ->get();

        return view('staff.index', compact('staff'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store new staff
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'salary' => 'nullable|numeric'

        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,

            // DEFAULT PASSWORD
            'password' => Hash::make('staff123'),

            'role' => $request->role,
            'salary' => $request->salary

        ]);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff added successfully.');
    }

    /**
     * Edit staff
     */
    public function edit($id)
    {
        $staff = User::findOrFail($id);

        return view('staff.edit', compact('staff'));
    }

    /**
     * Update staff
     */
    public function update(Request $request, $id)
    {
        $staff = User::findOrFail($id);

        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'salary' => 'nullable|numeric'

        ]);

        $staff->update([

            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'salary' => $request->salary

        ]);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff updated successfully.');
    }

    /**
     * Delete staff
     */
    public function destroy($id)
    {
        $staff = User::findOrFail($id);

        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff deleted successfully.');
    }

    /**
     * Update salary only
     */
    public function updateSalary(Request $request, $id)
    {
        $request->validate([

            'salary' => 'required|numeric'

        ]);

        $staff = User::findOrFail($id);

        $staff->salary = $request->salary;

        $staff->save();

        return redirect()
            ->back()
            ->with('success', 'Salary updated successfully.');
    }
}