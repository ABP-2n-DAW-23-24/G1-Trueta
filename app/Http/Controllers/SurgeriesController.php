<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surgery;

class SurgeriesController extends Controller
{
    public function surgeriesWithOperations() {
        $surgeries = Surgery::with('operations')->get()->toArray();

        return response()->json($surgeries);
    }
}
