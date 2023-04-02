<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">{{ $active }}</a></li>
                <li class="breadcrumb-item active">Add Medical Equipment</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-body">

                    <h1 class="card-title text-center fs-2">Add Medical Equipment</h1>

                    <form method="POST" action="{{ route('medical_equipments.store') }}">
                        @csrf
                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Ex. Thermometer" value="{{ old('name') }}">
                                    <label for="name">Medical Equipment Name</label>

                                    @error('name')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="brand" name="brand"
                                        placeholder="Ex. Catalina Cylinders" value="{{ old('brand') }}">
                                    <label for="brand">Brand</label>

                                    @error('brand')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-2 mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="model" name="model"
                                        value="{{ old('model') }}" placeholder="Ex. Guide">
                                    <label for="model">Model</label>
                                </div>

                                @error('model')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="Ex. 09123456789" value="{{ old('quantity') }}">
                                    <label for="quantity">Quantity</label>
                                </div>

                                @error('quantity')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">

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
                                    <span class="text-danger font-weight-bold">The health worker name field is
                                        required.</span>
                                @enderror
                            </div>

                        </div>

                        <a class="btn btn-secondary" href="{{ route('medical_equipments.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
