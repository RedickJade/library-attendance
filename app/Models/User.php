<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function attendances()
    {
        return $this->hasMany(\App\Models\Attendance::class);
    }
}
