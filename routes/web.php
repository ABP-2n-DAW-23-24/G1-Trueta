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
