@push('css')
    <title>Gallery</title>
    <style>
        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 5px;
            border-radius: 5px;
        }

        #videoPreview {
            max-width: 100%;
            max-height: 200px;
            display: none;
        }
    </style>
@endpush

<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex justify-content-between align-items-center py-4"
                            id="booking-table">
                            <h3 class="mb-0">Gallery</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                id="success-alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Gallery Table -->
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between py-3">
                                <div class="mr-auto p-2">
                                    <select class="form-select" wire:model.live="short">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="p-2">
                                    <button wire:click="openModal" class="btn btn-outline-success">
                                        <i class="bi bi-plus-circle me-1"></i> New Gallery
                                    </button>
                                </div>
                            </div>

                            <table class="table-bordered table-hover table text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Preview</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galleries as $key => $gallery)
                                        <tr>
                                            <td>{{ ($galleries->currentPage() - 1) * $galleries->perPage() + $key + 1 }}
                                            </td>
                                            <td>
                                                @if ($gallery->type === 'Image')
                                                    <img src="{{ $gallery->image }}" alt="Gallery Image"
                                                        class="img-fluid img-thumbnail"
                                                        style="max-height: 160px; object-fit: cover;">
                                                @else
                                                    <video src="{{ $gallery->video }}"
                                                        poster="{{ $gallery->video_thumb }}"
                                                        class="w-100 rounded border" controls muted
                                                        style="max-height: 160px; object-fit: cover;">
                                                    </video>
                                                @endif
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-sm {{ $gallery->status === 'Active' ? 'btn-success' : 'btn-danger' }}"
                                                    wire:click="toggleStatus({{ $gallery->id }})">
                                                    {{ $gallery->status }}
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="confirmDeleteGallery({{ $gallery->id }})"
                                                    title="Delete">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $galleries->links(data: ['scrollTo' => '#booking-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Adding Gallery -->
    @if ($showModal)
        <div class="modal fade show d-block livewire-modal my-5 py-5" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Gallery</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select wire:model.live="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="Image">Image</option>
                                    <option value="Video">Video</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($type === 'Image')
                                <div class="mb-3">
                                    <label class="form-label">Images <span class="text-danger">*</span></label>
                                    <input type="file" wire:model="images" class="form-control" accept="image/*"
                                        multiple>
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('images.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @if ($images)
                                        <div class="d-flex mt-2 flex-wrap">
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" class="preview-img"
                                                    alt="Preview">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if ($type === 'Video')
                                <div class="mb-3">
                                    <label class="form-label">Video <span class="text-danger">*</span></label>
                                    <input type="file" wire:model="video" class="form-control" accept="video/*">
                                    @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @if ($video)
                                        <video controls class="mt-2" style="max-width: 100%; max-height: 200px;">
                                            <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                                        </video>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Video Thumbnail <span
                                            class="text-danger">*</span></label>
                                    <input type="file" wire:model="video_thumb" class="form-control"
                                        accept="image/*">
                                    @error('video_thumb')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @if ($video_thumb)
                                        <img src="{{ $video_thumb->temporaryUrl() }}" class="preview-img mt-2"
                                            alt="Thumbnail Preview">
                                    @endif
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                        <button type="button" class="btn btn-success" wire:click="store">
                            <span wire:loading.remove wire:target="store">Publish Gallery</span>
                            <span wire:loading wire:target="store">Publishing...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
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
                        Livewire.dispatch('deleteGallery', {
                            id: data.id
                        });
                    }
                });
            });

            Livewire.on('galleryDeleted', (data) => {
                Swal.fire({
                    title: 'Deleted!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            });

            Livewire.on('galleryDeleteError', (data) => {
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
