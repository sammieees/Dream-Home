<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StaffController;

use App\Models\Property;
use App\Models\Payment;
use App\Models\Tenant;

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    // ONLY ADMIN CAN ACCESS
    if (auth()->user()->role !== 'admin') {

        return redirect()->route('staff.dashboard');

    }

    $totalProperties = Property::count();

    $availableProperties = Property::where(
        'status',
        'Available'
    )->count();

    $rentedProperties = Property::where(
        'status',
        'Rented'
    )->count();

    $totalRevenue = Payment::sum('amount');

    $totalTenants = Tenant::count();

    return view('dashboard', compact(

        'totalProperties',
        'availableProperties',
        'rentedProperties',
        'totalRevenue',
        'totalTenants'

    ));

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| STAFF DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/staff-dashboard', function () {

    // ONLY STAFF CAN ACCESS
    if (auth()->user()->role !== 'staff') {

        return redirect()->route('dashboard');

    }

    return view('staff.dashboard');

})->middleware(['auth'])->name('staff.dashboard');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | PROPERTIES
    |--------------------------------------------------------------------------
    */

    Route::resource('properties', PropertyController::class);

    /*
    |--------------------------------------------------------------------------
    | OWNERS
    |--------------------------------------------------------------------------
    */

    Route::resource('owners', OwnerController::class);

    /*
    |--------------------------------------------------------------------------
    | BRANCHES
    |--------------------------------------------------------------------------
    */

    Route::resource('branches', BranchController::class);

    /*
    |--------------------------------------------------------------------------
    | STAFF
    |--------------------------------------------------------------------------
    */

    Route::resource('staff', StaffController::class);

    // UPDATE STAFF SALARY
    Route::patch(
        '/staff/{id}/salary',
        [StaffController::class, 'updateSalary']
    )->name('staff.updateSalary');

    /*
    |--------------------------------------------------------------------------
    | TENANTS
    |--------------------------------------------------------------------------
    */

    Route::resource('tenants', TenantController::class);

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS
    |--------------------------------------------------------------------------
    */

    Route::resource('payments', PaymentController::class);

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | REPORTS
    |--------------------------------------------------------------------------
    */

    Route::get('/reports', function () {

        // ONLY ADMIN CAN ACCESS REPORTS
        if (auth()->user()->role !== 'admin') {

            abort(403);

        }

        return app(ReportController::class)->index();

    })->name('reports.index');

});

require __DIR__.'/auth.php';