<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Medication;
use App\Models\Dose;
use App\Models\Condition;
use App\Models\Criteria;
use App\Models\ConditionsDose;
use App\Models\MedicationDosage;
use Illuminate\Support\Facades\Auth;

class MedicationPanelController extends Controller
{
    public function index() {
        $traduccionjson=file_get_contents("lang/".Auth::user()->language."/".Auth::user()->language.".json");     

        $user = auth()->user();
        return Inertia::render('MedicationPanel', [
            'user' => $user,
            "traduccionjson"=>$traduccionjson

        ]);
    }

    // get medication
    public function getMedication() {
        $medications = Medication::where('deleted', 'false')->get();
        return response()->json($medications);
    }

    // insert medication
    public function addMedication(Request $request) {
        $data = $request->all();
        $medication = Medication::create($data);
        // create a "null" dosage for the medication with the new id
        $medicationDosage = MedicationDosage::create([
            'medicationId' => $medication->id,
            'dosage' => null
        ]);

    }

    // get dose by medication and their condition_dose, condition and criteria
    public function getDoseByMedication($medicationId) {
        $doses = Dose::getAllDoses($medicationId);
        return response()->json($doses);
    }

    // get criterias
    public function getCriterias() {
        $criterias = Criteria::get();
        return response()->json($criterias);
    }

      // delete dose by dose id and his condition_doses
      public function deleteDose($doseId) {
       $ConditionDose = ConditionsDose::where('doseId', $doseId)->delete();
       $dose = Dose::where('id', $doseId)->delete();
       return response()->json(['message' => 'Dose deleted successfully']);
    }

    // delete condition_dose by dose id and condition id
    public function deleteConditionDose($doseId, $conditionId) {
        $ConditionDose = ConditionsDose::where('doseId', $doseId)->where('conditionId', $conditionId)->delete();
        return response()->json(['message' => 'ConditionDose deleted successfully']);
    }

    // add condition, if not exists, and condition_dose
    public function addConditionDose(Request $request) {
        $data = $request->all();
    
        $condition = Condition::firstOrCreate([
            'criteriaId' => $data['criteriaId'],
            'min' => $data['min'],
            'max' => $data['max']
        ]);
        $data['conditionId'] = $condition->id;
        $conditionDose = ConditionsDose::firstOrCreate([
            
            'doseId' => $data['doseId'],
            'conditionId' => $data['conditionId']
        ]);
    }

    // add dose and their condition, if not exists, and condition_doses
    public function addDose(Request $request) {
        $data = $request->all();
        
        $dose = Dose::create([
            'medicationId' => $data['medicationId'],
            'dose' => $data['dose']
        ]);
       
        $data['doseId'] = $dose->id;
        
        for ($i = 0; $i < count($data['conditions']); $i++) {
            $condition = Condition::firstOrCreate([
                'criteriaId' => $data['conditions'][$i]['criteriaId'],
                'min' => $data['conditions'][$i]['min'],
                'max' => $data['conditions'][$i]['max']
            ]);
            $data['conditionId'] = $condition->id;

            $conditionDose = ConditionsDose::firstOrCreate([
                'doseId' => $data['doseId'],
                'conditionId' => $data['conditionId']
            ]);
        }
    }

    // edit condition by condition id, if already exists, it will put error message
    public function editCondition(Request $request) {
        $data = $request->all();
        for ($i = 0; $i < count($data['conditions']); $i++) {
            $condition = Condition::where('id', $data['conditions'][$i]['conditionId'])->first();
            if ($condition) {
                $condition->update([
                    'criteriaId' => $data['conditions'][$i]['criteriaId'],
                    'min' => $data['conditions'][$i]['min'],
                    'max' => $data['conditions'][$i]['max']
                ]);
            } else {
                return response()->json(['message' => 'Condition not found']);
            }
        }   
    
    }

    // get medication dosage by medication id
    public function getMedicationDosage($medicationId) {
        $medicationDosage = MedicationDosage::where('medicationId', $medicationId)->get();
        return response()->json($medicationDosage);
    }

    // edit medication dosage by medication id
    public function editMedicationDosage(Request $request) {
        $data = $request->all();
        $medicationDosage = MedicationDosage::where('medicationId', $data['medicationId'])->first();
        if ($medicationDosage) {
            $medicationDosage->update([
                'dosage' => $data['dosage']
            ]);
        } else {
            $medicationDosage = MedicationDosage::create([
                'medicationId' => $data['medicationId'],
                'dosage' => $data['dosage']
            ]);
        }
    }

    // change deleted status of medication by medication id
    public function deleteMedication($medicationId) {
        $medication = Medication::where('id', $medicationId)->first();
        if ($medication) {
            $medication->update([
                'deleted' => 'true'
            ]);
        } else {
            return response()->json(['message' => 'Medication not found']);
        }
    }
}