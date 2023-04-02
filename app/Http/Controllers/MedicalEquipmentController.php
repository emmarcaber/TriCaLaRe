<?php

namespace App\Http\Controllers;

use App\Models\HealthWorker;
use App\Models\MedicalEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalEquipmentController extends Controller
{
    // Show all medical equipments
    public function index()
    {
        $medical_equipments = DB::table('medical_equipment')
            ->join('health_workers', 'medical_equipment.health_worker_id', '=', 'health_workers.id')
            ->select(
                'medical_equipment.id as id',
                'health_workers.name as health_worker',
                'medical_equipment.name as name',
                'brand',
                'model',
                'quantity',
                'medical_equipment.created_at'
            )
            ->latest()->paginate(5);

        return view('medical_equipments.index', [
            'title' => "Medical Equipments - Tricalare",
            'active' => "Medical Equipments",
            'medical_equipments' => $medical_equipments
        ]);
    }

    // Show create medical equipment form
    public function create()
    {
        $health_workers = HealthWorker::all();

        return view('medical_equipments.create', [
            'title' => 'Add Medical Equipment - Tricalare',
            'active' => 'Medical Equipments',
            'health_workers' => $health_workers
        ]);
    }

    // Store new medical equipment
    public function store() {
        $formFields = request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'quantity' => 'required|min:1',
            'health_worker_id' => 'required',
        ]);

        MedicalEquipment::create($formFields);

        return redirect(route('medical_equipments.index'))->with('message', 'Medical Equipment created successfully!');
    }

    // Show edit medical equipment form
    public function edit(MedicalEquipment $medical_equipment) {
        $health_workers = HealthWorker::all();

        return view('medical_equipments.edit', [
            'title' => 'Edit Medical Equipment - Tricalare',
            'active' => 'Medical Equipments',
            'health_workers' => $health_workers,
            'medical_equipment' => $medical_equipment
        ]);
    }

    // Update medical equipment
    public function update(MedicalEquipment $medical_equipment) {
        $formFields = request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'quantity' => 'required|min:1',
            'health_worker_id' => 'required',
        ]);

        $medical_equipment->update($formFields);

        return redirect(route('medical_equipments.index'))->with('message', 'Medical Equipment edited successfully!');
    }
    
    // Delete medical equipment
    public function destroy(MedicalEquipment $medical_equipment) {
        $medical_equipment->delete();
        return redirect(route('medical_equipments.index'))->with('message', 'Medical Equipment deleted successfully!');
    }
}
