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
                    <p class="text-end my-4">
                        <a class="text-decoration-none" href="{{ route('patients.create') }}">
                            <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Add Patient">
                                <i class="bi bi-plus-square mx-1"></i>
                                Add Patient
                            </button>
                        </a>
                    </p>

                    <div class="table-responsive">
                        <!-- Default Table -->
                        <table class="table table-hover text-center mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Medical History</th>
                                    <th scope="col">Allergies</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($patients as $patient)
                                    <tr class="align-middle">
                                        <th class="text-start">{{ $patient->name }}</th>
                                        <td>{{ $patient->age }}</td>
                                        <td>
                                            @if ($patient->sex == 0)
                                                Male
                                            @elseif ($patient->sex == 1)
                                                Female
                                            @else
                                                Others
                                            @endif
                                        </td>
                                        <td>{{ date_format(date_create($patient->date_of_birth), 'M j, Y') }}</td>
                                        <td>{{ $patient->contact_number }}</td>
                                        <td>{{ $patient->medical_history }}</td>
                                        <td>{{ $patient->allergies }}</td>
                                        <td>
                                            <a href="{{ route('patients.edit', $patient->id) }}">
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit Patient">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </a>
    
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-name="{{ $patient->name }}" data-id="{{ $patient->id }}"
                                                data-bs-target="#delete_modal" title="Delete Patient">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
    
                                            <div class="modal fade" id="delete_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Delete Patient</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the patient named <span
                                                                id="name" class="fw-bold"></span>?
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
                        {{ $patients->links() }}
                    </div>
                </div>

            </div>
    </section>

    <script>
        var modal = document.getElementById('delete_modal');
        modal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var name = button.getAttribute('data-name'); // Extract info from data-* attributes
            var id = button.getAttribute('data-id');
            var form = modal.querySelector('form');
            document.getElementById('name').textContent = name; // Update the modal's content
            form.setAttribute('action', `patients/${id}`)
        });
    </script>
</x-layout>
