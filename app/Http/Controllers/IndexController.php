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
        $traduccionjson=file_get_contents("lang/".Auth::user()->language."/".Auth::user()->language.".json");

        return Inertia::render('Index', [
            'surgeries' => $surgeries,
            'user' => $user,
            'traductions'=>$traduccionjson
        ]);
    }

    public function getQuestions($operationId) {
        $questionsOperation = Resume::with('question')->where('operationId', $operationId)->get()->pluck('question')->toArray();
        
        return response()->json([
            'questionsOperation' => $questionsOperation
        ]);
    }

    // get resumes by operationId and questionId
    public function getResume($operationId, $questionId) {
      
        $resume = Resume::where('operationId', $operationId)->where('questionId', $questionId)->get()->toArray();
        return response()->json([
            'resume' => $resume
        ]);
    }

}
       
    
        
