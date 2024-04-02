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
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ResumesController;

Route::middleware('auth')->group(function () {
    Route::middleware('IsAdmin')->group(function () {
        Route::get('/admin-panel', [Adminpanel::class, 'index'])->name('admin_panel');
        Route::post('/getUsers', [Adminpanel::class, 'getAllUsers'])->name('getUsers');
        Route::post('/adduser', [UserController::class, 'createUser'])->name('adduser');
        Route::post('/editUser', [UserController::class, 'editUser'])->name('editUser');
        Route::post('/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::post('/searchUser', [UserController::class, 'searchUser'])->name('searchUser');
    });

    Route::middleware('IsManager')->group(function () {
        Route::get('/medication-panel', [MedicationPanelController::class, 'index'])->name('medication-panel');
        Route::get('/medication-panel/get-medication', [MedicationPanelController::class, 'getMedication'])->name('get-medication');
        Route::post('/medication-panel/add-medication', [MedicationPanelController::class, 'addMedication'])->name('add-medication');
        Route::get('/medication-panel/get-dose-medication/{medicationId}', [MedicationPanelController::class, 'getDoseByMedication'])->name('get-dose-medication');
        Route::get('/medication-panel/get-criterias', [MedicationPanelController::class, 'getCriterias'])->name('get-criterias');
        Route::delete('/medication-panel/delete-dose/{doseId}', [MedicationPanelController::class, 'deleteDose'])->name('delete-dose');
        Route::delete('/medication-panel/delete-condition-dose/{doseId}/{conditionId}', [MedicationPanelController::class, 'deleteConditionDose'])->name('delete-condition-dose');
        Route::post('/medication-panel/add-condition-dose', [MedicationPanelController::class, 'addConditionDose'])->name('add-condition-dose');
        Route::post('/medication-panel/add-dose', [MedicationPanelController::class, 'addDose'])->name('add-dose');
        Route::post('/medication-panel/edit-dose-condition', [MedicationPanelController::class, 'editCondition'])->name('edit-dose-condition');
        Route::get('/medication-panel/get-medication-dosage/{medicationId}', [MedicationPanelController::class, 'getMedicationDosage'])->name('get-medication-dosage');
        Route::post('/medication-panel/edit-medication-dosage', [MedicationPanelController::class, 'editMedicationDosage'])->name('edit-medication-dosage');
        Route::post('/wizard/question/add', [QuestionsController::class, 'addQuestion'])->name('add-question');
        Route::post('/wizard/resume/delete', [ResumesController::class, 'deleteResume'])->name('delete-resume');
    });


    Route::post('/idiom_save', [UserController::class, 'setIdiom'])->name('idiom_save');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/get-questions/{operationId}', [IndexController::class, 'getQuestions'])->name('getQuestions');
    Route::get('/json/surgeriesWithOperations', [SurgeriesController::class, 'surgeriesWithOperations'])->name('surgeriesWithOperations');
    Route::get('/get-resumes/{operationId}/{questionId}', [IndexController::class, 'getResume'])->name('getResume');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';