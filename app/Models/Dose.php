<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Dose extends Model
{
    protected $fillable = [
        'dose',
        'medicationId'
    ];

    public function scopeGetDose($query, $medicationId, $realWeight, $adjustedWeight, $glomerularFiltration) {
        $rawQuery = "
            SELECT d.dose
            FROM doses d
            WHERE d.medicationId = :medicationId
            AND EXISTS (
                SELECT 1
                FROM conditions_doses cd
                INNER JOIN conditions c ON cd.conditionId = c.id
                WHERE cd.doseId = d.id
                AND (
                    (c.criteriaId = (SELECT id FROM criterias WHERE name = 'Pes real') AND :realWeight BETWEEN c.min AND c.max)
                    OR (c.criteriaId = (SELECT id FROM criterias WHERE name = 'Pes ajustat') AND :adjustedWeight BETWEEN c.min AND c.max)
                    OR (c.criteriaId = (SELECT id FROM criterias WHERE name = 'Filtrat glomerular') AND :glomerularFiltration BETWEEN c.min AND c.max)
                )
                GROUP BY cd.doseId
                HAVING COUNT(DISTINCT c.id) = (SELECT COUNT(DISTINCT conditionId) FROM conditions_doses WHERE doseId = d.id)
            )
            LIMIT 1;
        ";
    
        return \DB::select($rawQuery, [
            'medicationId' => $medicationId,
            'realWeight' => $realWeight,
            'adjustedWeight' => $adjustedWeight,
            'glomerularFiltration' => $glomerularFiltration,
        ])[0];
    }


    // get all doses by medication id
    public function scopeGetAllDoses($query, $medicationId)
    {
        return $query
        ->where('medicationId', $medicationId)
        ->with(['conditions' => function ($query) {
            $query
                ->select(
                    'conditions.*',
                    'criterias.name as criteriaName',
                    'criterias.unity as criteriaUnity'
                    )
                ->join('criterias', 'conditions.criteriaId', '=', 'criterias.id');
        }])
        ->get()
        ->toArray();
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'conditions_doses', 'doseId', 'conditionId');
    }
}
