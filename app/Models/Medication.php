<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name'
    ];

    // get all medicaions with scope
    public function scopeGetAllMedications($query) {
        return $query->get();
    }


    // insert medication
    public function scopeAddMedication($query, $data) {
        return $query->insert($data);
    }
}