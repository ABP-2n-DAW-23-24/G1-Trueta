<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Medication;
use App\Models\Dose;
use App\Models\Condition;
use App\Models\Criteria;
use App\Models\ConditionsDose;

class MedicationPanelController extends Controller
{
    public function index() {
        return Inertia::render('MedicationPanel');
    }

    // get medication
    public function getMedication() {
        $medications = Medication::get();
        return response()->json($medications);
    }

    // insert medication
    public function addMedication(Request $request) {
        $data = $request->all();
        $medication = Medication::create($data);
        
    }

    // get dose by medication and their condition_dose, condition and criteria
    public function getDoseByMedication($medicationId) {
        $doses = Dose::getAllDoses($medicationId);
        return response()->json($doses);
    }

    // delete condition_dose by condition id and dose id
    public function deleteConditionDose($conditionId, $doseId) {
        $conditionDose = ConditionsDose::where('conditionId', $conditionId)
            ->where('doseId', $doseId)
            ->delete();
    }

    // get criterias
    public function getCriterias() {
        $criterias = Criteria::get();
        return response()->json($criterias);
    }



}
