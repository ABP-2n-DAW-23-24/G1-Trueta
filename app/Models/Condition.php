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

    // get all conditions and criteria name by medication id 
    public function scopeGetAllConditions($query, $medicationId)
    {
        $results = Condition::join('conditions_doses', 'conditions.id', '=', 'conditions_doses.conditionId')
        ->join('doses', 'conditions_doses.doseId', '=', 'doses.id')
        ->where('doses.medicationId', $medicationId)
        ->join('criterias', 'conditions.criteriaId', '=', 'criterias.id')
        ->orderBy('doses.dose', 'asc')
        ->orderBy('conditions_doses.id', 'asc')
        ->get();
    
    $groupedResults = [];
    
    foreach ($results as $result) {
        $doseId = $result->doseId;
    
        if (!array_key_exists($doseId, $groupedResults)) {
            $groupedResults[$doseId] = [];
        }
    
        $groupedResults[$doseId][] = $result;
    }
    return $groupedResults;
    }

    
   
}
