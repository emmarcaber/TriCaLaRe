<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HealthWorkerController;
use App\Http\Controllers\MedicalEquipmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicalSupplyController;
use App\Models\HealthWorker;
use App\Models\MedicalEquipment;
use App\Models\MedicalRecord;
use App\Models\MedicalSupply;
use App\Models\Patient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('components.dashboard', [
        'title' => 'Dashboard - Tricalare',
        'active' => 'Dashboard',
        'patients_count' => count(Patient::all()),
        'health_workers_count' => count(HealthWorker::all()),
        'medical_records_count' => count(MedicalRecord::all()),
        'medical_equipments_count' => count(MedicalEquipment::all()),
        'medical_supplies_count' => count(MedicalSupply::all()),
    ]);
});


// ------------------------------- Patient Routes -------------------------------------- //
Route::prefix('patients')->group(function () {

    // Show all patients
    Route::get('/', [PatientController::class, 'index'])->name('patients.index');

    // Show create patient form
    Route::get('/create', [PatientController::class, 'create'])->name('patients.create');

    // Store new patient
    Route::post('/store', [PatientController::class, 'store'])->name('patients.store');

    // Show edit patient form
    Route::get('/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');

    // Update patient
    Route::put('/{patient}', [PatientController::class, 'update'])->name('patients.update');

    // Delete patient
    Route::delete('/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
});
// ------------------------------- End of Patient Routes -------------------------------------- //



// ------------------------------- Health Worker Routes -------------------------------------- //
Route::prefix('health_workers')->group(function() {
    // Show all health workers
    Route::get('/', [HealthWorkerController::class, 'index'])->name('health_workers.index');

    // Show create health worker form
    Route::get('/create', [HealthWorkerController::class, 'create'])->name('health_workers.create');

    // Store new health worker
    Route::post('/store', [HealthWorkerController::class, 'store'])->name('health_workers.store');

    // Show edit health worker form
    Route::get('/{health_worker}/edit', [HealthWorkerController::class, 'edit'])->name('health_workers.edit');

    // Update health worker
    Route::put('/{health_worker}', [HealthWorkerController::class, 'update'])->name('health_workers.update');

    // Delete health worker
    Route::delete('/{health_worker}', [HealthWorkerController::class, 'destroy'])->name('health_workers.destroy');
});
// ------------------------------- End of Health Worker Routes -------------------------------------- //



// ------------------------------- Medical Record Routes -------------------------------------- //
Route::prefix('medical_records')->group(function () {

    // Show all medical records
    Route::get('/', [MedicalRecordController::class, 'index'])->name('medical_records.index');

    // Show create medical record form
    Route::get('/create', [MedicalRecordController::class, 'create'])->name('medical_records.create');

    // Store new medical record
    Route::post('/store', [MedicalRecordController::class, 'store'])->name('medical_records.store');

    // Show edit medical record form
    Route::get('/{medical_record}/edit', [MedicalRecordController::class, 'edit'])->name('medical_records.edit');

    // Update medical record
    Route::put('/{medical_record}', [MedicalRecordController::class, 'update'])->name('medical_records.update');

    // Delete medical record
    Route::delete('/{medical_record}', [MedicalRecordController::class, 'destroy'])->name('medical_records.destroy');
});
// ------------------------------- End of Medical Record Routes -------------------------------------- //



// ------------------------------- Medical Equipment Routes -------------------------------------- //
Route::prefix('medical_equipments')->group(function () {
    
    // Show all medical equipments
    Route::get('/', [MedicalEquipmentController::class, 'index'])->name('medical_equipments.index');

    // Show create medical equipment form
    Route::get('/create', [MedicalEquipmentController::class, 'create'])->name('medical_equipments.create');

    // Store new medical equipment
    Route::post('/store', [MedicalEquipmentController::class, 'store'])->name('medical_equipments.store');

    // Show edit medical equipment form
    Route::get('/{medical_equipment}/edit', [MedicalEquipmentController::class, 'edit'])->name('medical_equipments.edit');

    // Update medical equipment
    Route::put('/{medical_equipment}', [MedicalEquipmentController::class, 'update'])->name('medical_equipments.update');

    // Delete medical equipment
    Route::delete('/{medical_equipment}', [MedicalEquipmentController::class, 'destroy'])->name('medical_equipments.destroy');
});
// ------------------------------- End of Medical Equipment Routes -------------------------------------- //

// ------------------------------- Medical Supply Routes -------------------------------------- //
Route::prefix('medical_supplies')->group(function() {

    // Show all medical supplies
    Route::get('/', [MedicalSupplyController::class, 'index'])->name('medical_supplies.index');

    // Show create medical supply form
    Route::get('/create', [MedicalSupplyController::class, 'create'])->name('medical_supplies.create');

    // Store new medical supply
    Route::post('/store', [MedicalSupplyController::class, 'store'])->name('medical_supplies.store');

    // Show edit medical supply form
    Route::get('/{medical_supply}/edit', [MedicalSupplyController::class, 'edit'])->name('medical_supplies.edit');

    // Update medical supply
    Route::put('/{medical_supply}', [MedicalSupplyController::class, 'update'])->name('medical_supplies.update');
    
    // Delete medical supply
    Route::delete('/{medical_supply}', [MedicalSupplyController::class, 'destroy'])->name('medical_supplies.destroy');
});
// ------------------------------- End of Medical Supply Routes -------------------------------------- //