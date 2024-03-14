<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Adminpanel extends Controller
{
    public function index() {
        
            $traduccionjson=file_get_contents("lang/".Auth::user()->language."/".Auth::user()->language.".json");     
    

        $user = Auth::user();
        return Inertia::render('AdminPanel', [
            "users"=>User::all(),
            'user' => $user,
            "traduccionjson"=>$traduccionjson

        ]);
    }
    public static function getAllUsers(){
        return response()->json([ 'user' => User::all()]);

    }
}
