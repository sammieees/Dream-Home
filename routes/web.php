<?php

use Illuminate\Support\Facades\Route;

use App\Models\Property;
use App\Models\Tenant;
use App\Models\Payment;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PropertyViewingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LeaseAgreementController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $totalProperties = Property::count();

        $availableProperties = Property::where(
            'status',
            'Available'
        )->count();

        $rentedProperties = Property::where(
            'status',
            'Rented'
        )->count();

        $totalTenants = Tenant::count();

        $totalRevenue = Payment::sum('amount');

        $monthlyRevenue = Payment::whereMonth(
            'payment_date',
            now()->month
        )->sum('amount');

        return view('dashboard', compact(
            'totalProperties',
            'availableProperties',
            'rentedProperties',
            'totalTenants',
            'totalRevenue',
            'monthlyRevenue'
        ));

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | REPORTS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/reports',
            [ReportController::class, 'index']
        )->name('reports.index');

        /*
        |--------------------------------------------------------------------------
        | OWNERS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'owners',
            OwnerController::class
        );

        /*
        |--------------------------------------------------------------------------
        | BRANCHES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'branches',
            BranchController::class
        );

        /*
        |--------------------------------------------------------------------------
        | STAFF MANAGEMENT
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'staff',
            StaffController::class
        );

        Route::patch(
            '/staff/{id}/salary',
            [StaffController::class, 'updateSalary']
        )->name('staff.updateSalary');

    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN + STAFF ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin,staff')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | PROPERTIES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'properties',
            PropertyController::class
        );

        /*
        |--------------------------------------------------------------------------
        | TENANTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'tenants',
            TenantController::class
        );

        /*
        |--------------------------------------------------------------------------
        | PROPERTY VIEWINGS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'property-viewings',
            PropertyViewingController::class
        );

        /*
        |--------------------------------------------------------------------------
        | FEEDBACK
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'feedback',
            FeedbackController::class
        );

        /*
        |--------------------------------------------------------------------------
        | LEASE AGREEMENTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'lease-agreements',
            LeaseAgreementController::class
        );

        /*
        |--------------------------------------------------------------------------
        | PAYMENTS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'payments',
            PaymentController::class
        );

    });

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';