<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'client_id',
        'start',
        'end',
        'notes',
    ];

    protected $dates = [
        'start',
        'end',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByStart', function ($query) {
            $query->orderBy('start', 'asc');
        });
    }
}
