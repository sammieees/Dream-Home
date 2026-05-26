<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyViewing extends Model
{
    protected $fillable = [

        'tenant_id',
        'property_id',
        'staff_id',
        'viewing_date',
        'viewing_time',
        'feedback',
        'status'

    ];

    /**
     * Tenant relationship
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Property relationship
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Staff relationship
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}