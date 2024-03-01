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
        // $dose = Dose::getDose(7, 65, 90, 30);
        // dd([$dose]);

     
            $surgeries = Surgery::with('operations')->get();
    
            $groupedSurgeries = $surgeries->map(function ($surgery) {
                return [
                    'surgery_name' => $surgery->name,
                    'operations' => $surgery->operations->pluck('name')->all(),
                ];
            });
    
            return Inertia::render('Index', [
                'Surgeries' => $groupedSurgeries,
                'Auth'=>Auth::user(),

            ]);
        
    }


}
