<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id', 'day_note',
        'morning_in', 'morning_out',
        'afternoon_in', 'afternoon_out',
        'evening_in', 'evening_out',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
