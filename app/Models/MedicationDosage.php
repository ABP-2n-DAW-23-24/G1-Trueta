<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MedicationDosage extends Model
{
    use HasFactory;

    protected $table = 'medications_dosages';

    protected $fillable = [
        'medicationId',
        'dosage',
    ];

    public function medication()
    {
        return $this->belongsTo(Medication::class, 'medicationId');
    }

    
}
