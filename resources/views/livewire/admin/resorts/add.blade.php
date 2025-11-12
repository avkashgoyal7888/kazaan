@push('css')
    <title>New Resort</title>
    <style>
        .error-text {
            color: red;
            font-size: 0.875rem;
        }
    </style>
@endpush

<div class="flex-grow-1 container mt-4">
    <div class="row justify-content-center">
        <div class="card rounded-4 border-0 px-0 shadow-lg">
            <div class="card-header bg-gradient bg-primary rounded-top-4 py-4">
                <h4 class="fw-bold mb-0">Create New Resort</h4>
            </div>

            <div class="card-body p-4">
                {{-- Error Messages --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Resort Name *</label>
                                <input type="text" wire:model.blur="resort_name"
                                    class="form-control form-control-lg rounded-3 border-2"
                                    placeholder="Enter resort name">
                                @error('resort_name')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Slug *</label>
                                <input type="text" wire:model.blur="slug"
                                    class="form-control form-control-lg rounded-3 border-2" placeholder="resort-slug">
                                @error('slug')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Address *</label>
                        <input type="text" wire:model.blur="resort_address"
                            class="form-control form-control-lg rounded-3 border-2" placeholder="Enter full address">
                        @error('resort_address')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Primary Image *</label>
                        <input type="file" wire:model="primary_img"
                            class="form-control form-control-lg rounded-3 border-2" accept="image/*">
                        @error('primary_img')
                            <div class="error-text">{{ $message }}</div>
                        @enderror

                        <div wire:loading.remove wire:target="primary_img">
                            @if ($primary_img)
                                @php
                                    try {
                                        $preview = $primary_img->temporaryUrl();
                                    } catch (\Exception $e) {
                                        $preview = null;
                                    }
                                @endphp

                                @if ($preview)
                                    <div class="rounded-3 mt-3 border border-2 border-dashed p-3 text-center">
                                        <img src="{{ $preview }}" class="img-fluid rounded-3 shadow-sm"
                                            style="max-height: 200px;" alt="Primary image preview">
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Gallery Images *</label>
                        <div class="row">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium text-sm">Image {{ $i }}</label>
                                    <input type="file" wire:model="img_{{ $i }}"
                                        class="form-control rounded-3 border-2" accept="image/*">
                                    @error("img_$i")
                                        <div class="error-text">{{ $message }}</div>
                                    @enderror

                                    <div wire:loading.remove wire:target="img_{{ $i }}">
                                        @if (${"img_$i"})
                                            @php
                                                try {
                                                    $preview = ${"img_$i"}->temporaryUrl();
                                                } catch (\Exception $e) {
                                                    $preview = null;
                                                }
                                            @endphp

                                            @if ($preview)
                                                <div
                                                    class="rounded-3 mt-2 border border-2 border-dashed p-2 text-center">
                                                    <img src="{{ $preview }}"
                                                        class="img-fluid rounded-3 shadow-sm" style="max-height: 150px;"
                                                        alt="Image {{ $i }} preview">
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-4" wire:ignore>
                        <label class="form-label fw-semibold">Resort Details *</label>
                        <textarea wire:model="detail" id="mytextarea" rows="6" class="form-control rounded-3 border-2"
                            placeholder="Enter detailed description of the resort"></textarea>
                        @error('detail')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end pt-3">
                        <button type="submit" class="btn btn-success btn-lg rounded-3 fw-semibold px-4 py-2"
                            wire:loading.attr="disabled" wire:target="store">
                            <span wire:loading.remove wire:target="store">
                                <i class="bi bi-plus-circle me-2"></i>Create Resort
                            </span>
                            <span wire:loading wire:target="store">
                                <span class="spinner-border spinner-border-sm me-2" role="status"
                                    aria-hidden="true"></span>
                                Creating Resort...
                            </span>
                        </button>
                    </div>
                </form>
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
                                @this.set('detail', editor.getContent());
                            });
                        }
                    });
                }
            }, 100);
        }
        document.addEventListener('DOMContentLoaded', initTiny);
        document.addEventListener('livewire:init', () => {
            initTiny();
            Livewire.on('resortCreated', (data) => {
                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success'
                }).then(() => {
                    Livewire.navigate('/admin/resorts');
                });
            });
            Livewire.on('resortError', (data) => {
                Swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error'
                });
            });
        });
        document.addEventListener('livewire:navigating', destroyTiny);
        document.addEventListener('livewire:navigated', initTiny);
    </script>
@endpush
