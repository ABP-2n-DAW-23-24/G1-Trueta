<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'criteriaId',
        'min',
        'max'
    ];
    
    
    public function criteria() {
        return $this->belongsTo(Criteria::class, 'criteriaId');
    }
}
