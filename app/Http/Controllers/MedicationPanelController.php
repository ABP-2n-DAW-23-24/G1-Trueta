<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Medication;

class MedicationPanelController extends Controller
{
    public function index() {
        return Inertia::render('MedicationPanel');
    }

    // get medication
    public function getMedication() {
        $medications = Medication::getAllMedications();
        return response()->json($medications);
    }

    // insert medication
    public function addMedication(Request $request) {
        $data = $request->all();
        $medication = Medication::create($data);
        
    }
}
