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
                        <a class="text-decoration-none" href="{{ route('medical_equipments.create') }}">
                            <button class="btn btn-success" data-bs-toggle="tooltip"
                                data-bs-title="Add Medical Equipment">
                                <i class="bi bi-plus-square mx-1"></i>
                                Add Medical Equipment
                            </button>
                        </a>
                    </p>

                    <div class="table-responsive">
                        <!-- Default Table -->
                        <table class="table table-hover text-start mt-3">
                            <thead>
                                <tr class="align-middle">
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Handled By</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($medical_equipments as $medical_equipment)
                                    <tr class="align-middle">
                                        <th>{{ $medical_equipment->name }}</th>
                                        <td>{{ $medical_equipment->brand }}</td>
                                        <td>{{ $medical_equipment->model }}</td>
                                        <td>{{ $medical_equipment->quantity }}</td>
                                        <td>{{ $medical_equipment->health_worker }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('medical_equipments.edit', $medical_equipment->id) }}">
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit Medical Equipment">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </a>
    
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-id="{{ $medical_equipment->id }}"
                                                data-name="{{ $medical_equipment->name }}"
                                                data-brand="{{ $medical_equipment->brand }}" data-bs-target="#delete_modal"
                                                title="Delete Medical Equipment">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
    
                                            <div class="modal fade" id="delete_modal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Delete Medical Equipment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the medical equipment <span
                                                                id="brand_name" class="fw-bold"></span>?
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
                        {{ $medical_equipments->links() }}
                    </div>
                </div>

            </div>
    </section>

    <script>
        var modal = document.getElementById('delete_modal');
        modal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var brand = button.getAttribute('data-brand');
            var form = modal.querySelector('form');
            document.getElementById('brand_name').textContent = `${brand} ${name}`;
            form.setAttribute('action', `medical_equipments/${id}`)
        });
    </script>
</x-layout>
