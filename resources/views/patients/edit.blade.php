<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">{{ $active }}</a></li>
                <li class="breadcrumb-item active">Edit Patient</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-body">

                    <h1 class="card-title text-center fs-2">Edit Patient</h1>

                    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $patient->name }}">
                                    <label for="name">Patient Name</label>

                                    @error('name')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="age" name="age"
                                        placeholder="Ex. Emmar Caber" value="{{ $patient->age }}">
                                    <label for="age">Age</label>

                                    @error('age')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <label class="form-label">Gender</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="male"
                                        value="0" {{ $patient->sex == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="female"
                                        value="1" {{ $patient->sex == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="others"
                                        value="2" {{ $patient->sex == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="others">Others</label>
                                </div>

                                <br />
                                @error('sex')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                        value="{{ $patient->date_of_birth }}">
                                    <label for="date_of_birth">Date of Birth</label>
                                </div>

                                @error('date_of_birth')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="contact_number" name="contact_number"
                                        placeholder="Ex. 09123456789" value="{{ $patient->contact_number }}">
                                    <label for="contact_number">Contact Number</label>
                                </div>

                                @error('contact_number')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="allergies" name="allergies"
                                        placeholder="Ex. Penicillin" value="{{ $patient->allergies }}">
                                    <label for="allergies">Allergies</label>
                                </div>

                                @error('allergies')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="medical_history"
                                        name="medical_history" placeholder="Ex. Asthma, Hypertension"
                                        value="{{ $patient->medical_history }}">
                                    <label for="medical_history">Medical History</label>
                                </div>

                                @error('medical_history')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('patients.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
