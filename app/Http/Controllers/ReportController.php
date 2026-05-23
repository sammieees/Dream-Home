<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Payment;

class ReportController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();

        $availableProperties = Property::where('status', 'Available')->count();

        $rentedProperties = Property::where('status', 'Rented')->count();

        $totalTenants = Tenant::count();

        $totalRevenue = Payment::sum('amount');

        $monthlyRevenue = Payment::whereMonth(
            'payment_date',
            now()->month
        )->sum('amount');

        return view('reports.index', compact(
            'totalProperties',
            'availableProperties',
            'rentedProperties',
            'totalTenants',
            'totalRevenue',
            'monthlyRevenue'
        ));
    }
}