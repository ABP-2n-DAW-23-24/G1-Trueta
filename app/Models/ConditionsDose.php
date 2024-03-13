<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class conditionsDose extends Model
{
    protected $fillable = [
        'medicationId',
        'doseId',
        'conditionId',
    ];


    // conditions
    public function conditions() {
        return $this->belongsToMany(Condition::class, 'conditions_doses', 'doseId', 'conditionId');
    }
}
