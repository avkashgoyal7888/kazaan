@push('css')
    <title>Contact Us</title>
@endpush
<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex justify-content-between align-items-center py-4"
                            id="contact-table">
                            <h3 class="mb-0">Contact Us</h3>
                        </div>
                    </div>
                    <div class="card-body">
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
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Subject</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}
                                            </td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->contact }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-info btn-sm"
                                                        wire:click="viewBlog({{ $contact->id }})" title="View">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Contact Us found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{ $contacts->links(data: ['scrollTo' => '#contact-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Contaact Modal-->
    @if ($showModal)
        {{-- <div class="modal-backdrop fade show" wire:click="closeModal" wire:ignore.self></div> --}}
        <div class="modal fade show d-block livewire-modal my-5 py-5" tabindex="-1" role="dialog" wire:ignore.self
            style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)); backdrop-filter: blur(10px);">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                    <div class="modal-header position-relative border-0 p-0">
                        <div class="w-100 d-flex align-items-center justify-content-between p-4">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h4 class="fw-bold mb-0">Contact Details</h4>
                                    <p class="small mb-0 text-opacity-75">Message from {{ $name }}
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-close ms-auto" wire:click="closeModal"
                                aria-label="Close">
                            </button>
                        </div>
                        <div class="position-absolute w-100 bottom-0 start-0"
                            style="height: 20px; background: white; clip-path: polygon(0 100%, 100% 100%, 100% 0, 0 80%);">
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class="p-4 pt-3">
                            <div class="row g-4 mb-4">
                                <div class="col-12">
                                    <div class="bg-light rounded-4 border-start border-5 border-primary p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-primary rounded-circle me-3 bg-opacity-10 p-2">
                                                <i class="bi bi-person-circle text-primary fs-5"></i>
                                            </div>
                                            <h5 class="text-primary fw-bold mb-0">{{ $name }}</h5>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-envelope me-2"></i>
                                                    <span>Email</span>
                                                </div>
                                                <div class="fw-medium">{{ $email }}</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-telephone me-2"></i>
                                                    <span>Phone</span>
                                                </div>
                                                <div class="fw-medium">{{ $phone }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="card bg-warning border-0 bg-opacity-10">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-chat-square-text text-warning me-2"></i>
                                            <h6 class="text-warning fw-bold mb-0">Subject</h6>
                                        </div>
                                        <p class="fw-medium mb-0">{{ $subject }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="card bg-info border-0 bg-opacity-10">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="bi bi-chat-dots text-info me-2"></i>
                                            <h6 class="text-info fw-bold mb-0">Message</h6>
                                        </div>
                                        <div class="rounded-3 border-start border-3 border-info p-3">
                                            <p class="lh-lg mb-0" style="white-space: pre-line;">{{ $message }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <a href="mailto:{{ $email }}"
                                        class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope me-2"></i>
                                        Reply via Email
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="tel:{{ $phone }}"
                                        class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-telephone me-2"></i>
                                        Call Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light rounded-bottom-4 border-0 p-3">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary px-4" wire:click="closeModal">
                                <i class="bi bi-x-circle me-2"></i>Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('js')
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
                        Livewire.dispatch('deleteBlog', {
                            id: data.id
                        });
                    }
                });
            });
            Livewire.on('blogDeleted', (data) => {
                Swal.fire({
                    title: 'Deleted!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            });
            Livewire.on('blogDeleteError', (data) => {
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
