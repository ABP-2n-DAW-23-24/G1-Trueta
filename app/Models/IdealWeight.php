<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdealWeight extends Model
{
    protected $fillable = [
        'gender',
        'minHeight',
        'maxHeight',
        'weight'
    ];

    public function scopeGetIdealWeight($query, $gender, $height) {
        return $query->where("gender", $gender)
            ->where("minHeight", "<=", $height)
            ->where("maxHeight", ">=", $height)
            ->first();
    }
}
