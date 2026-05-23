<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'contact',
        'property_id',
        'start_date'
    ];

    public $timestamps = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}