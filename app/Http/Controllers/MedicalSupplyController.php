<?php

namespace App\Http\Controllers;

use App\Models\MedicalSupply;
use Illuminate\Http\Request;

class MedicalSupplyController extends Controller
{
    // Show all medical supplies
    public function index() {
        return view('medical_supplies.index', [
            'title' => "Medical Supplies - Tricalare",
            'active' => "Medical Supplies",
            'medical_supplies' => MedicalSupply::latest()->paginate(5)
        ]);
    }

    // Show create medical supply form
    public function create() {
        return view('medical_supplies.create', [
            'title' => "Add Medical Supply - Tricalare",
            'active' => "Medical Supplies",
        ]);
    }

    // Store new medical supply
    public function store() {
        $formFields = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);

        MedicalSupply::create($formFields);

        return redirect(route('medical_supplies.index'))->with('message', 'Medical Supply created successfully!');
    }

    // Show edit medical supply form
    public function edit(MedicalSupply $medical_supply) {
        return view('medical_supplies.edit', [
            'title' => "Add Medical Supply - Tricalare",
            'active' => "Medical Supplies",
            'medical_supply' => $medical_supply
        ]);
    }

    // Update medical supply
    public function update(MedicalSupply $medical_supply) {
        $formFields = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required'
        ]);

        $medical_supply->update($formFields);

        return redirect(route('medical_supplies.index'))->with('message', 'Medical Supply edited successfully!');
    }

    // Delete medical supply
    public function destroy(MedicalSupply $medical_supply) {
        $medical_supply->delete();
        return redirect(route('medical_supplies.index'))->with('message', 'Medical Supply deleted successfully!');
    }
}
