<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Resume;

class QuestionsController extends Controller
{
    public function addQuestion(Request $request)
    {
        // var_dump($request->question);

        $question = $request->question;
        $resume = $request->resume;
        $operation_id = $request->operationId;

        $created_question = Question::create([
            'question' => $question
        ]);


        $created_resume = Resume::create([
            'resume' => $resume,
            'questionId' => $created_question->id,
            'operationId' => $operation_id
        ]);

        return response()->json([
            'question' => $created_question->question,
            'resume' => $created_resume->resume
        ]);
    }
}
