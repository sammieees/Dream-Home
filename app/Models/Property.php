<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;
use App\Models\Owner;

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

    ];

    /**
     * PROPERTY HAS MANY TENANTS
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /**
     * PROPERTY BELONGS TO OWNER
     */
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}