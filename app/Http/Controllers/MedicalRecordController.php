<?php

namespace App\Http\Controllers;

use App\Models\HealthWorker;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\DB;

class MedicalRecordController extends Controller
{
    // Show all medical records
    public function index() {
        $medical_records = DB::table('medical_records')
                            ->join('patients', 'medical_records.patient_id', '=', 'patients.id')
                            ->join('health_workers', 'medical_records.health_worker_id', '=', 'health_workers.id')
                            ->select('medical_records.id as id', 'patients.name as patient', 'health_workers.name as health_worker', 
                                        'date_of_consultation', 'reason_for_consultation',
                                        'diagnosis', 'prescription', 'follow_up_appointment', 'medical_records.created_at')
                            ->latest()->paginate(5);

        return view('medical_records.index', [
            'title' => "Medical Records - Tricalare",
            'active' => "Medical Records",
            'medical_records' => $medical_records
        ]);
    }

    // Show create medical record form
    public function create() {
        $patients = Patient::all();
        $health_workers = HealthWorker::all();

        return view('medical_records.create', [
            'title' => 'Add Medical Record - Tricalare',
            'active' => 'Medical Records',
            'patients' => $patients,
            'health_workers' => $health_workers
        ]);
    }

    // Store new medical record
    public function store() {
        $formFields = request()->validate([
            'patient_id' => 'required',
            'health_worker_id' => 'required',
            'date_of_consultation' => 'required',
            'reason_for_consultation' => 'required', 
            'diagnosis' => 'required',
            'prescription' => 'required',
        ]);

        MedicalRecord::create($formFields);

        return redirect(route('medical_records.index'))->with('message', 'Medical Record created successfully!');
    }

    // Show edit medical record form
    public function edit(MedicalRecord $medical_record) {
        $patients = Patient::all();
        $health_workers = HealthWorker::all();

        return view('medical_records.edit', [
            'title' => 'Edit Medical Record - Tricalare',
            'active' => 'Medical Records',
            'patients' => $patients,
            'health_workers' => $health_workers,
            'medical_record' => $medical_record
        ]);
    }

    // Update medical record
    public function update(MedicalRecord $medical_record) {
        $formFields = request()->validate([
            'patient_id' => 'required',
            'health_worker_id' => 'required',
            'date_of_consultation' => 'required',
            'reason_for_consultation' => 'required', 
            'diagnosis' => 'required',
            'prescription' => 'required',
        ]);

        $medical_record->update($formFields);

        return redirect(route('medical_records.index'))->with('message', 'Medical Record edited successfully!');
    }

    // Delete medical record
    public function destroy(MedicalRecord $medical_record) {
        $medical_record->delete();
        return redirect(route('medical_records.index'))->with('message', 'Medical Record deleted successfully!');
    }
}
