<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show all patients
    public function index() {
        return view('patients.index', [
            'title' => "Patients - Tricalare",
            'active' => "Patients",
            'patients' => Patient::latest()->paginate(5)
        ]);
    }

    // Show create patient form
    public function create() {
        return view('patients.create', [
            'title' => "Add Patient - Tricalare",
            'active' => "Patients",
        ]);
    }

    // Store new patient
    public function store() {
        $formFields = request()->validate([
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required|min:11|max:11|starts_with:09',
            'medical_history' => 'required',
            'allergies' => 'required',
        ]);

        Patient::create($formFields);

        return redirect(route('patients.index'))->with('message', 'Patient created successfully!');
    }

    public function edit(Patient $patient) {
        return view('patients.edit', [
            'title' => "Edit Patient - TriCaLaRe",
            'active' => 'Patients',
            'patient' => $patient,
        ]);
    }

    public function update(Patient $patient) {
        $formFields = request()->validate([
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required|min:11|max:11|starts_with:09',
            'medical_history' => 'required',
            'allergies' => 'required',
        ]);

        $patient->update($formFields);

        return redirect(route('patients.index'))->with('message', 'Patient edited successfully!');
    }

    public function destroy(Patient $patient) {
        $patient->delete();
        return redirect(route('patients.index'))->with('message', 'Patient deleted successfully!');
    }
}
