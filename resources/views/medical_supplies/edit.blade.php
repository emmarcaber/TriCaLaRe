<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">{{ $active }}</a></li>
                <li class="breadcrumb-item active">Edit Medical Supply</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="col-lg-12">
            <div class="card p-2">
                <div class="card-body">

                    <h1 class="card-title text-center fs-2">Edit Medical Supply</h1>

                    <form method="POST" action="{{ route('medical_supplies.update', $medical_supply->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Ex. Face Masks" value="{{ $medical_supply->name }}">
                                    <label for="name">Medical Supply Name</label>

                                    @error('name')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="description"
                                        placeholder="Ex. Surgical masks" value="{{ $medical_supply->description }}">
                                    <label for="description">Description</label>

                                    @error('description')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="quantity" name="quantity"
                                        placeholder="Ex. 500 pieces" value="{{ $medical_supply->quantity }}">
                                    <label for="quantity">Quantity</label>

                                    @error('quantity')
                                        <span class="text-danger font-weight-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('medical_supplies.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
