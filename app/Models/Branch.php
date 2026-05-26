<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [

        'name',
        'address',
        'location',
        'contact',
        'manager',

    ];

    public function properties()
    {
    return $this->hasMany(Property::class);
    }
}