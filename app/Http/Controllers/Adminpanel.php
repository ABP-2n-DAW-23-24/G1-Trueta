<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Adminpanel extends Controller
{
    public function index() {

        $user = Auth::user();
        return Inertia::render('AdminPanel', [
            "users"=>User::all(),
            'user' => $user
        ]);
    }
    public static function getAllUsers(){
        return response()->json([ 'user' => User::all()]);

    }
}
