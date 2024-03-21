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

    // get resumes by operationId and form with questions (true or false)
    public function getResumes($operationId, Request $request) {
        $data = $request->all();
    
        $questionIds = [
            'question_0' => 1,
            'question_1' => 2,
            'question_2' => 3,
        ];
    
        $questionsTrueId = array_keys($data, 'true');
        $questionsTrueId = array_map(function($question) use ($questionIds) {
            return $questionIds[$question];
        }, $questionsTrueId);

        //get resume
        $resume = Resume::where('operationId', $operationId)
            ->where(function($query) use ($questionsTrueId) {
                $query->whereIn('questionId', $questionsTrueId);
            })
            ->get();
        
        return response()->json([
            'test' => 2
        ]);
    }
}
       
    
        
