<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\Branch;

class Property extends Model
{
    protected $fillable = [

        'title',
        'type',
        'rent',
        'address',
        'status',
        'image',
        'description',
        'owner_id',
        'branch_id',

    ];

    /*
    |--------------------------------------------------------------------------
    | PROPERTY HAS MANY TENANTS
    |--------------------------------------------------------------------------
    */

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /*
    |--------------------------------------------------------------------------
    | PROPERTY BELONGS TO OWNER
    |--------------------------------------------------------------------------
    */

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    /*
    |--------------------------------------------------------------------------
    | PROPERTY BELONGS TO BRANCH
    |--------------------------------------------------------------------------
    */

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}