@push('css')
    <title>Blog's</title>
@endpush
<div>
    <div class="container-xxl flex-grow-1 container-p-y mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header d-flex justify-content-between align-items-center py-4" id="blog-table">
                            <h3 class="mb-0">Blog's</h3>
                            <a href="{{ route('admin.new.blog') }}" wire:navigate class="btn btn-outline-success">
                                <i class="bi bi-plus-circle me-1"></i> New Blog
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <!-- Success/Error Messages -->
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

                        <!-- Blogs Table -->
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
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}
                                            </td>
                                            <td>
                                                @if ($blog->image)
                                                    <img src="{{ $blog->image }}" alt="{{ $blog->title }}"
                                                        class="img-thumbnail"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($blog->title, 30) }}</td>
                                            <td>{{ Str::limit($blog->sub_title, 30) }}</td>
                                            <td>{{ Str::limit($blog->slug, 30) }}</td>
                                            <td>
                                                <button
                                                    class="btn btn-sm {{ $blog->status === 'Active' ? 'btn-success' : 'btn-secondary' }}"
                                                    wire:click="toggleStatus({{ $blog->id }})">
                                                    {{ $blog->status }}
                                                </button>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-info btn-sm"
                                                        wire:click="viewBlog({{ $blog->id }})" title="View">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button> &nbsp;&nbsp;
                                                    <a href="{{ route('admin.edit.blog', $blog->slug) }}"
                                                        class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="bi bi-pen-fill"></i>
                                                    </a>&nbsp;&nbsp;
                                                    <button class="btn btn-danger btn-sm"
                                                        wire:click="confirmDeleteBlog({{ $blog->id }})"
                                                        title="Delete">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No blogs found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $blogs->links(data: ['scrollTo' => '#blog-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Blog Modal -->
    @if ($showModal)
        <div class="modal-backdrop fade show" wire:click="closeModal" wire:ignore.self></div>
        <div class="modal fade show d-block livewire-modal my-5 py-5" tabindex="-1" role="dialog"
            wire:click="closeModal" wire:ignore.self
            style="background: linear-gradient(135deg,rgba(0, 0, 0, 0.4),rgba(0, 0, 0, 0.6));backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" class="btn-close position-absolute end-0 top-0 m-4 p-2"
                            wire:click="closeModal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-0">
                            @if ($image)
                                <div class="col-lg-5">
                                    <div class="position-relative h-100 overflow-hidden">
                                        <img src="{{ $image }}" alt="{{ $title }}"
                                            class="img-fluid w-100 h-100 object-fit-cover" />
                                        <div class="position-absolute end-0 top-0 m-3">
                                            <span
                                                class="badge {{ $status === 'Active' ? 'bg-success' : ($status === 'InActive' ? 'bg-warning text-dark' : 'bg-secondary') }} px-3 py-2">
                                                <i
                                                    class="bi bi-{{ $status === 'Active' ? 'check-circle' : ($status === 'InActive' ? 'pencil' : 'clock') }} me-1"></i>
                                                {{ ucfirst($status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-{{ $image ? '7' : '12' }}">
                                <div class="p-4">
                                    <h3 class="fw-bold text-primary mb-2">
                                        {{ $title ?: 'Untitled Blog Post' }}
                                    </h3>
                                    @if ($sub_title)
                                        <h6 class="fw-normal">{{ $sub_title }}</h6>
                                    @endif

                                    <div class="mb-3 mt-4">
                                        <strong>Slug:</strong> {{ $slug ?: 'not-set' }}
                                    </div>

                                    <div class="card border-primary mb-4">
                                        <div class="card-header bg-primary py-2 text-white">
                                            <h6 class="card-title mb-0">
                                                <i class="bi bi-file-text me-2"></i>Content
                                            </h6>
                                        </div>
                                        <div class="card-body" style="max-height: 300px; overflow-y: auto">
                                            @if ($content)
                                                <div class="text-break">{!! $content !!}</div>
                                            @else
                                                <p class="text-muted">No content available</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-4 text-center">
                                            <div class="fs-4 fw-bold text-primary">
                                                {{ $content ? str_word_count(strip_tags($content)) : 0 }}
                                            </div>
                                            <small>Words</small>
                                        </div>
                                        <div class="col-4 text-center">
                                            <div class="fs-4 fw-bold text-success">
                                                {{ $content ? ceil(str_word_count(strip_tags($content)) / 200) : 0 }}
                                            </div>
                                            <small>Min Read</small>
                                        </div>
                                        <div class="col-4 text-center">
                                            <div class="fs-4 fw-bold text-info">
                                                {{ $content ? strlen(strip_tags($content)) : 0 }}
                                            </div>
                                            <small>Characters</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">
                            Close
                        </button>
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
