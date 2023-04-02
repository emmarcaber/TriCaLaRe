<?php

namespace App\Http\Controllers;

use App\Models\HealthWorker;
use Illuminate\Http\Request;

class HealthWorkerController extends Controller
{
    // Show all health workers
    public function index() {
        return view('health_workers.index', [
            'title' => "Health Workers - Tricalare",
            'active' => "Health Workers",
            'health_workers' => HealthWorker::latest()->paginate(5)
        ]);
    }

     // Show create health worker form
     public function create() {
        return view('health_workers.create', [
            'title' => "Add Health Worker - Tricalare",
            'active' => "Health Workers",
        ]);
    }

    // Store new health worker
    public function store() {
        $formFields = request()->validate([
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required|min:11|max:11|starts_with:09',
            'position' => 'required',
            'work_experience' => 'required',
        ]);

        HealthWorker::create($formFields);

        return redirect(route('health_workers.index'))->with('message', 'Health Worker created successfully!');
    }

    // Show edit health worker form
    public function edit(HealthWorker $health_worker) {
        return view('health_workers.edit', [
            'title' => "Edit Health Worker - TriCaLaRe",
            'active' => 'Health Workers',
            'health_worker' => $health_worker,
        ]);
    }

    // Update health worker
    public function update(HealthWorker $health_worker) {
        $formFields = request()->validate([
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'contact_number' => 'required|min:11|max:11|starts_with:09',
            'position' => 'required',
            'work_experience' => 'required',
        ]);

        $health_worker->update($formFields);

        return redirect(route('health_workers.index'))->with('message', 'Health Worker edited successfully!');
    }

    // Delete health worker
    public function destroy(HealthWorker $health_worker) {
        $health_worker->delete();
        return redirect(route('health_workers.index'))->with('message', 'Health Worker deleted successfully!');
    }
}