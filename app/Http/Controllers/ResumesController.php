<?php

namespace App\Http\Controllers;

use App\Models\Resume;

use Illuminate\Http\Request;

class ResumesController extends Controller
{
    public function deleteResume(Request $request)
    {
        $operationId = $request->input('operationId');
        $questionId = $request->input('questionId');

        $resume = Resume::where('operationId', $operationId)
            ->where('questionId', $questionId)
            ->first();

        if ($resume) {
            $resume->delete();
            return response()->json(['message' => 'Entrada eliminada amb èxit']);
        } else {
            return response()->json(['error' => 'No s\'ha trobat cap entrada per a aquests IDs'], 404);
        }
    }
}
