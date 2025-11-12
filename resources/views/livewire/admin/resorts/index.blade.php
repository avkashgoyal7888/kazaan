@push('css')
    <title>Resort's</title>
@endpush
<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex justify-content-between align-items-center py-4" id="blog-table">
                            <h3 class="mb-0">Resort's</h3>
                            <a href="{{ route('admin.new.resorts') }}" wire:navigate class="btn btn-outline-success">
                                <i class="bi bi-plus-circle me-1"></i> New Resort
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                id="success-alert" wire:ignore>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between py-3">
                                <div class="mr-auto p-2">
                                    <select class="form-select" id="exampleFormControlSelect1"
                                        aria-label="Default select example" wire:model.live="short">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="p-2">
                                    <div class="input-group input-group-merge" style="width:250px">
                                        <input type="text" class="form-control" placeholder="Search bookings..."
                                            wire:model.live.debounce.300ms="search" value="{{ $search }}">
                                        @if (!empty($search))
                                            <button class="btn btn-outline-secondary" type="button"
                                                wire:click="clearSearch">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <table class="table-bordered table-hover table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($resorts as $resort)
                                        <tr>
                                            <td>{{ $loop->iteration + ($resorts->currentPage() - 1) * $resorts->perPage() }}
                                            </td>

                                            <td>
                                                @if ($resort->primary_img)
                                                    <img src="{{ $resort->primary_img }}"
                                                        alt="{{ $resort->resort_name }}" class="img-thumbnail"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $resort->resort_name }}</td>
                                            <td>{{ $resort->resort_address }}</td>
                                            <td>{{ $resort->slug }}</td>
                                            <td>
                                                <button
                                                    class="btn btn-sm {{ $resort->status === 'Active' ? 'btn-success' : 'btn-secondary' }}"
                                                    wire:click="toggleStatus({{ $resort->id }})">
                                                    {{ $resort->status }}
                                                </button>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-info btn-sm"
                                                        wire:click="viewBlog({{ $resort->id }})" title="View">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>&nbsp;&nbsp;

                                                    <a href="{{ route('admin.edit.resort', $resort->slug) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="bi bi-pen-fill"></i>
                                                    </a>&nbsp;&nbsp;

                                                    <button class="btn btn-danger btn-sm"
                                                        wire:click="confirmDeleteResort({{ $resort->id }})"
                                                        title="Delete">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No resorts found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $resorts->links(data: ['scrollTo' => '#blog-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($showModal)
        <div class="modal fade show d-block livewire-modal my-5 py-5" tabindex="-1" role="dialog" wire:click.self="closeModal"
            style="background: rgba(15, 23, 42, 0.85);">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content rounded-4 overflow-hidden border-0 shadow-lg">
                    <div class="modal-header position-relative border-0 p-0 "
                        style="background: linear-gradient(135deg, #0d6efd 0%, #084298 100%); min-height: 120px;">

                        <div class="container-fluid h-100 d-flex align-items-center py-4">
                            <div class="row w-100 align-items-center">
                                <div class="col-10">
                                    <h2 class="fw-bold display-6 mb-2">{{ $resort_name }}</h2>
                                    <p class=" fs-5 mb-0">
                                        <i class="bi bi-geo-alt-fill me-2"></i>{{ $resort_address }}
                                    </p>
                                </div>
                                <div class="col-2 text-end">
                                    <span
                                        class="badge fs-6 rounded-pill {{ $status === 'Active' ? 'bg-success' : ($status === 'InActive' ? 'bg-warning text-dark' : 'bg-secondary') }} px-3 py-2">
                                        <i
                                            class="bi bi-{{ $status === 'Active' ? 'check-circle' : ($status === 'InActive' ? 'clock' : 'x-circle') }} me-1"></i>
                                        {{ ucfirst($status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn-close btn-close position-absolute end-0 top-0 m-4"
                            wire:click="closeModal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-4">
                            @if ($primary_img)
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <img id="mainImage" src="{{ $primary_img }}" alt="{{ $resort_name }}"
                                            class="img-fluid w-100 rounded-3 shadow-sm"
                                            style="height: 300px; object-fit: cover;" />
                                    </div>
                                    <div class="row g-2">
                                        @foreach ([$img_1, $img_2, $img_3, $img_4, $img_5] as $index => $img)
                                            @if ($img)
                                                <div class="col-2">
                                                    <img src="{{ $img }}"
                                                        alt="Resort view {{ $index + 1 }}"
                                                        class="img-fluid w-100 rounded-2 border border-2 shadow-sm thumbnail-img"
                                                        style="height: 60px; object-fit: cover; cursor: pointer;"
                                                        onmouseover="this.style.borderColor='#0d6efd'"
                                                        onmouseout="this.style.borderColor='#dee2e6'"
                                                        onclick="switchMainImage('{{ $img }}')" />
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-{{ $primary_img ? '6' : '12' }}">
                                <div class="card rounded-3 mb-4 border-0 shadow-sm">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-primary rounded-circle me-3 bg-opacity-10 p-2">
                                                <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                                            </div>
                                            <h5 class="fw-bold text-dark mb-0">Resort Information</h5>
                                        </div>

                                        <div class="mb-3">
                                            <small class="text-muted d-block mb-2">Resort Slug</small>
                                            <span class="badge text-dark rounded-pill border bg-white px-3 py-2"
                                                style="font-family: 'Courier New', monospace;">
                                                {{ $slug ?: 'not-set' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card rounded-3 border-0 shadow-sm">
                                    <div class="card-header border-0 bg-transparent px-4 pb-0 pt-4">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success rounded-circle me-3 bg-opacity-10 p-2">
                                                <i class="bi bi-file-text-fill text-success fs-5"></i>
                                            </div>
                                            <h5 class="fw-bold text-dark mb-0">Description</h5>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 pt-3" style="max-height: 250px; overflow-y: auto;">
                                        @if ($detail)
                                            <div class="text-break lh-lg" style="font-size: 0.95rem; color: #6c757d;">
                                                {!! $detail !!}
                                            </div>
                                        @else
                                            <div class="py-5 text-center">
                                                <i class="bi bi-file-text text-muted display-1 opacity-25"></i>
                                                <p class="text-muted mb-0 mt-3">No description available</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4">
                        <div class="w-100 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-outline-secondary rounded-pill me-2 px-4"
                                    wire:click="closeModal">
                                    <i class="bi bi-x-lg me-1"></i>Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('js')
<script>
    function switchMainImage(imageUrl) {
        const mainImage = document.getElementById('mainImage');
        if (mainImage) {
            mainImage.src = imageUrl;
        }
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function setupSweetAlertEvents() {
            Livewire.on('showDeleteAlert', (data) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteResort', {
                            id: data.id
                        });
                    }
                });
            });
            Livewire.on('resortDeleted', (data) => {
                Swal.fire({
                    title: 'Deleted!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            });
            Livewire.on('resortDeleteError', (data) => {
                Swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
        document.addEventListener('DOMContentLoaded', setupSweetAlertEvents);
        document.addEventListener('livewire:init', setupSweetAlertEvents);
        document.addEventListener('livewire:navigated', setupSweetAlertEvents);
    </script>
@endpush
