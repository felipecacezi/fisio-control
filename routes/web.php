<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PatientEvolutionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/patient/getPatient', [PatientController::class, 'getPatient'])->name('patient.getPatient');
    Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
    Route::get('/patient/{id}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/update', [PatientController::class, 'update'])->name('patient.update');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
    Route::delete('/patient/{id}/destroy', [PatientController::class, 'destroy'])->name('patient.destroy');

    Route::post('/patient/evolution/store', [PatientEvolutionController::class, 'store'])->name('patientevolution.store');
    Route::put('/patient/evolution/update', [PatientEvolutionController::class, 'update'])->name('patientevolution.update');
    Route::get('/patient/evolution/create/{id}', [PatientEvolutionController::class, 'create'])->name('patientevolution.create');
    Route::get('/patient/evolution/{id}/edit', [PatientEvolutionController::class, 'edit'])->name('patientevolution.edit');
    Route::delete('/patient/evolution/{id}/{patient_id}/destroy', [PatientEvolutionController::class, 'destroy'])->name('patientevolution.destroy');
    Route::get('/patient/evolution/{id}', [PatientEvolutionController::class, 'index'])->name('patientevolution.index');

    Route::get('/schedule/events/create', [ScheduleController::class, 'create'])->name('patientschedule.create');
    Route::post('/schedule/events/store', [ScheduleController::class, 'store'])->name('patientschedule.store');
    Route::get('/schedule/events/{id?}', [ScheduleController::class, 'getEvents'])->name('patientschedule.getEvents');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
});

require __DIR__.'/auth.php';
