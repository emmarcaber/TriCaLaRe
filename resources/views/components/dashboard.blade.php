<x-layout :title="$title" :active="$active">
    <div class="pagetitle">
        <h1>{{ $active }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">{{ $active }}</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="col-lg-12">
            <div class="row">

                <!-- Patients Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <a href="{{ route('patients.index') }}" class="text-decoration-none">
                            <div class="card-body">

                                <h5 class="card-title">
                                    Patients
                                </h5>


                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="text-primary">{{ $patients_count }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div><!-- End Patients Card -->

                <!-- Health Workers Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <a href="{{ route('health_workers.index') }}" class="text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">Health Workers</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-hearts text-success"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="text-success">{{ $health_workers_count }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div><!-- End Health Workers Card -->

                <!-- Medical Records Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <a href="{{ route('medical_records.index') }}" class="text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">Medical Records</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-clipboard2-pulse-fill text-info"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="text-info">{{ $medical_records_count }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div><!-- End Medical Records Card -->


            </div>

            <div class="row">
                <!-- Medical Equipments Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <a href="{{ route('medical_equipments.index') }}" class="text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">Medical Equipments</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-hospital-fill text-warning"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="text-warning">{{ $medical_equipments_count }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div><!-- End Medical Equipments Card -->

                <!-- Medical Supplies Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <a href="{{ route('medical_supplies.index') }}" class="text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title">Medical Supplies</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bandaid text-danger"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 class="text-danger">{{ $medical_supplies_count }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div><!-- End Medical Supplies Card -->
            </div>
        </div>
    </section>
</x-layout>
