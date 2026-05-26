<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffPerformanceController extends Controller
{
    public function index()
    {
        $staff = User::where('role', 'staff')
            ->withCount([
                'tenants',
                'propertyViewings'
            ])
            ->get();

        return view(
            'staff-performance.index',
            compact('staff')
        );
    }
}