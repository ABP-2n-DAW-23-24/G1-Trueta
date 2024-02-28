<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Dose;

class MedicationPanelController extends Controller
{
    public function index() {
        return Inertia::render('MedicationPanel');
    }
}
