<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('medical_records.index') }}">{{ $active }}</a></li>
                <li class="breadcrumb-item active">Add Medical Record</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-body">

                    <h1 class="card-title text-center fs-2">Add Medical Record</h1>

                    <form method="POST" action="{{ route('medical_records.store') }}">
                        @csrf
                        <div class="row mb-4">

                            <div class="col-md">
                                <select name="patient_id" class="form-select p-3" data-bs-toggle="tooltip"
                                    data-bs-title="Patient Name">
                                    <option disabled selected>Patient Name</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}" @selected(old('patient_id') == $patient->id)>
                                            {{ $patient->name }}</option>
                                    @endforeach
                                </select>

                                @error('patient_id')
                                    <span class="text-danger font-weight-bold">The patient name field is required.</span>
                                @enderror
                            </div>

                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="date_of_consultation"
                                        name="date_of_consultation" value="{{ old('date_of_consultation') }}">
                                    <label for="date_of_consultation">Date of Consultation</label>
                                </div>

                                @error('date_of_consultation')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="reason_for_consultation"
                                        name="reason_for_consultation" value="{{ old('reason_for_consultation') }}"
                                        placeholder="Ex. Headache">
                                    <label for="reason_for_consultation">Reason for Consultation</label>
                                </div>

                                @error('reason_for_consultation')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-2 mb-4">

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="diagnosis" name="diagnosis"
                                        placeholder="Ex. 09123456789" value="{{ old('diagnosis') }}">
                                    <label for="diagnosis">Diagnosis</label>
                                </div>

                                @error('diagnosis')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="prescription" name="prescription"
                                        placeholder="Ex. Antiobiotics" value="{{ old('prescription') }}">
                                    <label for="prescription">Prescription</label>
                                </div>

                                @error('prescription')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="follow_up_appointment"
                                        name="follow_up_appointment" placeholder="Ex. Asthma, Hypertension"
                                        value="{{ old('follow_up_appointment') }}">
                                    <label for="follow_up_appointment">Follow-up Appointment</label>
                                </div>

                                @error('follow_up_appointment')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <select name="health_worker_id" class="form-select p-3" data-bs-toggle="tooltip"
                                    data-bs-title="Health Worker Assigned">
                                    <option disabled selected>Health Worker Assigned</option>
                                    @foreach ($health_workers as $health_worker)
                                        <option value="{{ $health_worker->id }}" @selected(old('health_worker_id') == $health_worker->id)>
                                            {{ $health_worker->name }}</option>
                                    @endforeach
                                </select>

                                @error('health_worker_id')
                                    <span class="text-danger font-weight-bold">The health worker assigned field is
                                        required.</span>
                                @enderror
                            </div>

                        </div>

                        <a class="btn btn-secondary" href="{{ route('medical_records.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
