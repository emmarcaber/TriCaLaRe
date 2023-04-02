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
                        <a class="text-decoration-none" href="{{ route('health_workers.create') }}">
                            <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-title="Add Health Worker">
                                <i class="bi bi-plus-square mx-1"></i>
                                Add Health Worker
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
                                    <th scope="col">Position</th>
                                    <th scope="col">Work Experience</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($health_workers as $health_worker)
                                    <tr class="align-middle">
                                        <th class="text-start">{{ $health_worker->name }}</th>
                                        <td>{{ $health_worker->age }}</td>
                                        <td>
                                            @if ($health_worker->sex == 0)
                                                Male
                                            @elseif ($health_worker->sex == 1)
                                                Female
                                            @else
                                                Others
                                            @endif
                                        </td>
                                        <td>{{ date_format(date_create($health_worker->date_of_birth), 'M j, Y') }}</td>
                                        <td>{{ $health_worker->contact_number }}</td>
                                        <td>{{ $health_worker->position }}</td>
                                        <td>{{ $health_worker->work_experience }} years</td>
                                        <td>
                                            <a href="{{ route('health_workers.edit', $health_worker->id) }}">
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit Health Worker">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </a>
    
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-name="{{ $health_worker->name }}" data-id="{{ $health_worker->id }}"
                                                data-bs-target="#delete_modal" title="Delete Health Worker">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
    
                                            <div class="modal fade" id="delete_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Delete Health Worker</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the Health Worker named <span
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
                        {{ $health_workers->links() }}
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
            form.setAttribute('action', `health_workers/${id}`)
        });
    </script>
</x-layout>
