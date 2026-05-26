<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'role',
        'salary',
        'branch_id',
        'responsibility',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [

        'password',
        'remember_token',

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }

    /**
     * Branch relationship
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Staff assigned tenants
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'staff_id');
    }

    /**
     * Staff property viewings
     */
    public function propertyViewings()
    {
        return $this->hasMany(PropertyViewing::class, 'staff_id');
    }
}