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

    <x-flash-message />

    <section class="section">

        <div class="col-lg-12">

            <div class="card p-2">
                <div class="card-body">
                    <p class="text-end my-3">
                        <a class="text-decoration-none" href="{{ route('medical_records.create') }}">
                            <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Add Medical Record">
                                <i class="bi bi-plus-square mx-1"></i>
                                Add Medical Record
                            </button>
                        </a>
                    </p>

                    <div class="table-responsive">
                        <!-- Default Table -->
                        <table class="table table-hover text-center mt-3">
                            <thead>
                                <tr class="align-middle">
                                    <th scope="col">ID</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Date of Consultation</th>
                                    <th scope="col">Reason for Consultation</th>
                                    <th scope="col">Diagnosis</th>
                                    <th scope="col">Prescription</th>
                                    <th scope="col">Follow-up Appointment</th>
                                    <th scope="col">Health Worker Assigned</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($medical_records as $medical_record)
                                    <tr class="align-middle">
                                        <th>{{ $medical_record->id }}</th>
                                        <td>{{ $medical_record->patient }}</td>
                                        <td>{{ date_format(date_create($medical_record->date_of_consultation), 'M j, Y') }}
                                        </td>
                                        <td>{{ $medical_record->reason_for_consultation }}</td>
                                        <td>{{ $medical_record->diagnosis }}</td>
                                        <td>{{ $medical_record->prescription }}</td>
                                        <td>
                                            @if ($medical_record->follow_up_appointment == null)
                                                None
                                            @else
                                                {{ date_format(date_create($medical_record->follow_up_appointment), 'M j, Y') }}
                                            @endif
                                        </td>
                                        <td>{{ $medical_record->health_worker }}</td>
                                        <td>
                                            <a href="{{ route('medical_records.edit', $medical_record->id) }}">
                                                <button class="btn btn-outline-warning mb-1" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit Medical Record">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </a>
    
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-id="{{ $medical_record->id }}" data-bs-target="#delete_modal"
                                                title="Delete Medical Record">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
    
                                            <div class="modal fade" id="delete_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Delete Medical Record</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the medical record with ID
                                                            #<span id="name" class="fw-bold"></span>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $medical_records->links() }}
                    </div>
                </div>

            </div>
    </section>

    <script>
        var modal = document.getElementById('delete_modal');
        modal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var form = modal.querySelector('form');
            document.getElementById('name').textContent = id; // Update the modal's content
            form.setAttribute('action', `medical_records/${id}`)
        });
    </script>
</x-layout>
