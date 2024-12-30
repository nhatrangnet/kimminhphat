<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySettings extends Model
{
    protected $table = 'mysettings';
    protected $fillable = [
        'key',
        'value',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
