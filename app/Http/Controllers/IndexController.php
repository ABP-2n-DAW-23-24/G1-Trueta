<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Dose;

class IndexController extends Controller
{
    public function index() {        
        // $dose = Dose::getDose(7, 65, 90, 30);

        // dd([$dose]);

        return Inertia::render('Index');
    }
}
