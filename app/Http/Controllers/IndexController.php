<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(): Response
    {
        return Inertia::render('Index');
    }
}
