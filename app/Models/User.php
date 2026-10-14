<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [

        'name',

        'age',

        'address',

        'birthdate',

        'phone_number',

        'email',

        'password',

        'role',

        'profile_picture',
    ];


    /*
    |--------------------------------------------------------------------------
    | ROLE HELPERS
    |--------------------------------------------------------------------------
    */

    public function isAdmin()
    {
        return $this->role === 'admin';
    }


    public function isStaff()
    {
        return $this->role === 'staff';
    }


    public function isCustomer()
    {
        return $this->role === 'customer';
    }
}