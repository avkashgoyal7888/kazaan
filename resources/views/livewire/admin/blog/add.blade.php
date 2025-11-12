@push('css')
    <title>New Blog</title>
    <style>
        .error-text {
            color: red;
            font-size: 0.875rem;
        }
    </style>
@endpush

<div>
    <div class="flex-grow-1 container mt-4">
        <div class="justify-content-center px-0">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary rounded-top-4 py-4">
                    <h4 class="mb-0 py-2">Create New Blog</h4>
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title *</label>
                            <input type="text" wire:model.blur="title" class="form-control">
                            @error('title')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Sub Title</label>
                            <input type="text" wire:model.blur="sub_title" class="form-control">
                            @error('sub_title')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Slug</label>
                            <input type="text" wire:model.blur="slug" class="form-control">
                            @error('slug')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Image</label>
                            <input type="file" wire:model="image" class="form-control" accept="image/*">
                            @error('image')
                                <div class="error-text">{{ $message }}</div>
                            @enderror

                            <div wire:loading.remove wire:target="image">
                                @if ($image)
                                    @php
                                        try {
                                            $preview = $image->temporaryUrl();
                                        } catch (\Exception $e) {
                                            $preview = null;
                                        }
                                    @endphp

                                    @if ($preview)
                                        <div class="mt-3 text-center">
                                            <img src="{{ $preview }}" class="img-fluid rounded shadow-sm"
                                                style="max-height: 250px;">
                                        </div>
                                    @endif
                                @endif
                            </div>

                            <div wire:loading wire:target="image" class="text-muted">Uploading preview...</div>
                        </div>

                        <div class="mb-3" wire:ignore>
                            <label class="form-label fw-semibold">Content *</label>
                            <textarea wire:model="content" id="mytextarea" rows="6" class="form-control"></textarea>
                            @error('content')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select wire:model.blur="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">Inactive</option>
                            </select>
                            @error('status')
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success d-flex align-items-center"
                                wire:loading.attr="disabled" wire:target="store">
                                <span wire:loading.remove wire:target="store">
                                    <i class="bi bi-upload me-1"></i> Publish Blog
                                </span>
                                <span wire:loading wire:target="store">
                                    <span class="spinner-border spinner-border-sm me-1" role="status"
                                        aria-hidden="true"></span>
                                    Publishing...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/dm1ic3ib99gpagxidwdwfmrqmxt1ynhkizor80onhmzyk2j2/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function destroyTiny() {
            if (tinymce.get('mytextarea')) {
                tinymce.get('mytextarea').destroy();
            }
        }

        function initTiny() {
            destroyTiny();

            setTimeout(() => {
                if (document.getElementById('mytextarea')) {
                    tinymce.init({
                        selector: '#mytextarea',
                        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                        height: 400,
                        setup: function(editor) {
                            editor.on('change', () => {
                                @this.set('content', editor.getContent());
                            });
                        }
                    });
                }
            }, 100);
        }
        document.addEventListener('DOMContentLoaded', initTiny);
        document.addEventListener('livewire:init', () => {
            initTiny();
            Livewire.on('blog:created', () => {
                Swal.fire({
                    title: 'Success!',
                    text: 'Blog created successfully.',
                    icon: 'success'
                }).then(() => {
                    Livewire.navigate('/admin/blogs');
                });
            });
        });
        document.addEventListener('livewire:navigating', destroyTiny);
        document.addEventListener('livewire:navigated', initTiny);
    </script>
@endpush
