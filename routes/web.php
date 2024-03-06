<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MedicationPanelController;
use App\Http\Controllers\SurgeriesController;


Route::get('/medication-panel', [MedicationPanelController::class, 'index'])->name('medication-panel');
Route::get('/medication-panel/get-medication', [MedicationPanelController::class, 'getMedication'])->name('get-medication');
Route::post('/medication-panel/add-medication', [MedicationPanelController::class, 'addMedication'])->name('add-medication');
Route::get('/medication-panel/get-dose-medication/{medicationId}', [MedicationPanelController::class, 'getDoseByMedication'])->name('get-dose-medication');
Route::delete('/medication-panel/delete-condition-dose/{conditionId}/{doseId}', [MedicationPanelController::class, 'deleteConditionDose'])->name('delete-condition-dose');
Route::get('/medication-panel/get-criterias', [MedicationPanelController::class, 'getCriterias'])->name('get-criterias');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [IndexController::class, 'index'])->name('footer');
});


Route::get('/json/surgeriesWithOperations', [SurgeriesController::class, 'surgeriesWithOperations'])->name('surgeriesWithOperations');

require __DIR__.'/auth.php';
