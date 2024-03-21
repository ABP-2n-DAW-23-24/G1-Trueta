<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Dose;

use App\Models\Surgery;
use App\Models\Operation;
use App\Models\Question;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;



class IndexController extends Controller
{
    public function index() {      
        $surgeries = Surgery::with('operations')->get()->toArray();
        $user = Auth::user();

        return Inertia::render('Index', [
            'surgeries' => $surgeries,
            'user' => $user
        ]);
    }

    public function getQuestions($operationId) {
        $questionsOperation = Resume::with('question')->where('operationId', $operationId)->get()->pluck('question')->toArray();
        
        return response()->json([
            'questionsOperation' => $questionsOperation
        ]);
    }
}
