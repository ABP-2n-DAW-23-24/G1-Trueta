<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MedicationPanelController;


Route::get('/', [IndexController::class, 'index'])->name('footer');

Route::get('/medication-panel', [MedicationPanelController::class, 'index'])->name('medication-panel');
Route::get('/medication-panel/get-medication', [MedicationPanelController::class, 'getMedication'])->name('get-medication');
Route::post('/medication-panel/add-medication', [MedicationPanelController::class, 'addMedication'])->name('add-medication');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
