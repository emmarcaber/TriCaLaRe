<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">{{ $active }}</a></li>
                <li class="breadcrumb-item active">Edit Health Worker</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-body">

                    <h1 class="card-title text-center fs-2">Edit Health Worker</h1>

                    <form method="POST" action="{{ route('health_workers.update', $health_worker->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Ex. Emmar Caber" value="{{ $health_worker->name }}">
                                    <label for="name">Health Worker Name</label>

                                    @error('name')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="age" name="age"
                                        placeholder="Ex. Emmar Caber" value="{{ $health_worker->age }}">
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
                                        value="0" {{ $health_worker->sex == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="female"
                                        value="1" {{ $health_worker->sex == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="others"
                                        value="2" {{ $health_worker->sex == 2 ? 'checked' : '' }}>
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
                                        value="{{ $health_worker->date_of_birth }}">
                                    <label for="date_of_birth">Date of Birth</label>
                                </div>

                                @error('date_of_birth')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="contact_number" name="contact_number"
                                        placeholder="Ex. 09123456789" value="{{ $health_worker->contact_number }}">
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
                                    <input type="text" class="form-control" id="position" name="position"
                                        placeholder="Ex. Barangay Health Worker"
                                        value="{{ $health_worker->position }}">
                                    <label for="position">Position</label>
                                </div>

                                @error('position')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="work_experience"
                                        name="work_experience" placeholder="Ex. 7"
                                        value="{{ $health_worker->work_experience }}">
                                    <label for="work_experience">Work Experience</label>
                                </div>

                                @error('work_experience')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <a class="btn btn-secondary" href="{{ route('health_workers.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
