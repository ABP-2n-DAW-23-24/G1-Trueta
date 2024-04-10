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

    // add new operation
    public function addOperation(Request $request) {
        // name and surgeryId
        $data = $request->all();
        
        $operation = new Operation();
        $operation->name = $data['name'];
        $operation->surgeryId = $data['surgeryId'];
        $operation->profilaxis = $data['profilaxis'];
        $operation->save();
        $surgeries = Surgery::with('operations')->get()->toArray();

        return response()->json([
            'operation' => $operation,
        ]);
    }

    // add new surgery
    public function addSurgery(Request $request) {
        $data = $request->all();
        $surgeries = Surgery::get();
        // get a random color for the new surgery by the color of the random surgery
        $randomSurgery = $surgeries->random();
        $color = $randomSurgery->color;


        $surgery = new Surgery();
        $surgery->name = $data['name'];
        $surgery->color = $color;
        $surgery->save();
        $surgeries = Surgery::with('operations')->get()->toArray();

        //Create operation with the same name as the surgery
        $operation = new Operation();
        $operation->name = $data['name'];
        $operation->surgeryId = $surgery->id;
        $operation->save();

        // return the data to the frontend
        return response()->json([
            'surgery' => $surgery,
            'operation' => $operation,
        ]);
    }
}