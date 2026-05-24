<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyViewing extends Model
{
    protected $fillable = [

        'property_id',
        'tenant_id',
        'viewing_date',
        'viewing_time',
        'remarks',
        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | PROPERTY
    |--------------------------------------------------------------------------
    */

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /*
    |--------------------------------------------------------------------------
    | TENANT
    |--------------------------------------------------------------------------
    */

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}