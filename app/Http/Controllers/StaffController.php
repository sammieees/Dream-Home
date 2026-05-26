<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display all staff
     */
    public function index()
    {
        $staffs = User::where('role', 'staff')
                    ->with('branch')
                    ->latest()
                    ->get();

        return view('staff.index', compact('staffs'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $branches = Branch::all();

        return view('staff.create', compact('branches'));
    }

    /**
     * Store new staff
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'branch_id' => 'nullable|exists:branches,id',
            'responsibility' => 'nullable|string',

        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
            'branch_id' => $request->branch_id,
            'responsibility' => $request->responsibility,

        ]);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(User $staff)
    {
        $branches = Branch::all();

        return view('staff.edit', compact('staff', 'branches'));
    }

    /**
     * Update staff
     */
    public function update(Request $request, User $staff)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'branch_id' => 'nullable|exists:branches,id',
            'responsibility' => 'nullable|string',

        ]);

        $staff->update([

            'name' => $request->name,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
            'responsibility' => $request->responsibility,

        ]);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff updated successfully.');
    }

     /**
        * Update salary
    */
        public function updateSalary(Request $request, User $staff)
    {
            $request->validate([

         'salary' => 'required|numeric|min:0',

    ]);

    $staff->update([

        'salary' => $request->salary,

    ]);

    return redirect()
        ->route('staff.index')
        ->with('success', 'Salary updated successfully.');
}

    /**
     * Delete staff
     */
    public function destroy(User $staff)
    {
        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff deleted successfully.');
    }
}