<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Property;
use App\Models\Payment;
use App\Models\User;
use App\Models\Branch;

class Tenant extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [

        'name',
        'email',
        'contact',
        'property_id',
        'staff_id',
        'branch_id',
        'start_date'

    ];

    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | PROPERTY RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /*
    |--------------------------------------------------------------------------
    | STAFF RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    /*
    |--------------------------------------------------------------------------
    | BRANCH RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    
}