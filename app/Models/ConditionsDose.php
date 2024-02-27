<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class conditionsDose extends Model
{
    protected $fillable = [
        'medicationId',
        'doseId',
    ];
}
