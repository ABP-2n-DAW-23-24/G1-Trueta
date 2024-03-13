<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MedicationPanelController;
use App\Http\Controllers\SurgeriesController;
use App\Http\Controllers\Adminpanel;
use App\Http\Controllers\UserController;


Route::get('/medication-panel', [MedicationPanelController::class, 'index'])->name('medication-panel');
Route::get('/medication-panel/get-medication', [MedicationPanelController::class, 'getMedication'])->name('get-medication');
Route::post('/medication-panel/add-medication', [MedicationPanelController::class, 'addMedication'])->name('add-medication');

Route::get('/admin-panel', [Adminpanel::class, 'index'])->name('admin_panel');
Route::post('/adduser',[UserController::class, 'createUser'] )->name('adduser');
Route::post('/editUser',[UserController::class, 'editUser'] )->name('editUser');
Route::post('/deleteUser',[UserController::class, 'deleteUser'] )->name('deleteUser');

Route::post('/getUsers',[Adminpanel::class, 'getAllUsers'] )->name('getUsers');

Route::get('/medication-panel/get-dose-medication/{medicationId}', [MedicationPanelController::class, 'getDoseByMedication'])->name('get-dose-medication');
Route::get('/medication-panel/get-criterias', [MedicationPanelController::class, 'getCriterias'])->name('get-criterias');
Route::delete('/medication-panel/delete-dose/{doseId}', [MedicationPanelController::class, 'deleteDose'])->name('delete-dose');
Route::delete('/medication-panel/delete-condition-dose/{doseId}/{conditionId}', [MedicationPanelController::class, 'deleteConditionDose'])->name('delete-condition-dose');
Route::post('/medication-panel/add-condition-dose', [MedicationPanelController::class, 'addConditionDose'])->name('add-condition-dose');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [IndexController::class, 'index'])->name('index');
});


Route::get('/json/surgeriesWithOperations', [SurgeriesController::class, 'surgeriesWithOperations'])->name('surgeriesWithOperations');

require __DIR__.'/auth.php';
