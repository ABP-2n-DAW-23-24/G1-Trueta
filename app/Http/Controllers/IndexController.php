<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Dose;

use App\Models\Surgery;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;



class IndexController extends Controller
{
    public function index() {
        $surgeries = Surgery::with('operations')->get()->toArray();

        return Inertia::render('Index', [
            'surgeries' => $surgeries
        ]);
    }
}
