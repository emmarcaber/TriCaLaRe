@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
