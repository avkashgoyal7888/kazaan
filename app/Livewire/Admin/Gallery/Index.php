<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery as GalleryModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Cloudinary\Cloudinary;
use Livewire\Attributes\Validate;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $short = 10;
    public $showModal = false;
    public $type;
    public $images = [];
    public $video;
    public $video_thumb;

    protected $listeners = [
        'deleteGallery' => 'deleteGallery',
        'showDeleteAlert' => 'showDeleteAlert'
    ];

    public function rules()
    {
        $rules = [
            'type' => 'required|in:Image,Video',
        ];

        if ($this->type === 'Image') {
            $rules['images'] = 'required|array';
            $rules['images.*'] = 'image|mimes:jpg,jpeg,png,webp|max:2048';
        }

        if ($this->type === 'Video') {
            $rules['video'] = 'required|mimetypes:video/mp4,video/avi,video/mpeg|max:51200';
            $rules['video_thumb'] = 'required|image|mimes:jpg,jpeg,png,webp|max:2048';
        }

        return $rules;
    }

    public function updatedShort()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->resetForm();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['type', 'images', 'video', 'video_thumb']);
        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate();

        try {
            if ($this->type === 'Image' && !empty($this->images)) {
                foreach ($this->images as $imageFile) {
                    $name = substr(uniqid(), 0, 9);
                    $path = $imageFile->getRealPath();

                    $uploadedImage = (new Cloudinary())->uploadApi()->upload($path, [
                        'folder' => 'kazan/gallery',
                        'format' => 'webp',
                        'public_id' => $name,
                    ])['secure_url'];

                    GalleryModel::create([
                        'type' => $this->type,
                        'image' => $uploadedImage,
                        'video' => null,
                        'video_thumb' => null,
                        'status' => 'Active'
                    ]);
                }
            }

            if ($this->type === 'Video') {
                $videoName = uniqid();
                $videoPath = $this->video->getRealPath();

                $videoUrl = (new Cloudinary())->uploadApi()->upload($videoPath, [
                    'folder' => 'kazan/gallery',
                    'resource_type' => 'video',
                    'public_id' => $videoName,
                ])['secure_url'];

                $thumbName = substr(uniqid(), 0, 9);
                $thumbPath = $this->video_thumb->getRealPath();

                $thumbUrl = (new Cloudinary())->uploadApi()->upload($thumbPath, [
                    'folder' => 'kazan/gallery',
                    'format' => 'webp',
                    'public_id' => $thumbName,
                ])['secure_url'];

                GalleryModel::create([
                    'type' => $this->type,
                    'image' => null,
                    'video' => $videoUrl,
                    'video_thumb' => $thumbUrl,
                    'status' => 'Active'
                ]);
            }

            session()->flash('success', 'Gallery created successfully!');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create gallery: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $gallery = GalleryModel::find($id);

        if ($gallery) {
            $gallery->status = $gallery->status === 'InActive' ? 'Active' : 'InActive';
            $gallery->save();
            session()->flash('success', 'Gallery Update Successfully...');
        }
    }

    public function confirmDeleteGallery($id)
    {
        $this->dispatch('showDeleteAlert', id: $id);
    }

    public function deleteGallery($id)
    {
        try {
            $gallery = GalleryModel::findOrFail($id);
            $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));

            if ($gallery->image) {
                $publicId = pathinfo(parse_url($gallery->image, PHP_URL_PATH), PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("kazan/gallery/{$publicId}", ['resource_type' => 'image']);
            }
            if ($gallery->video) {
                $videoID = pathinfo(parse_url($gallery->video, PHP_URL_PATH), PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("kazan/gallery/{$videoID}", ['resource_type' => 'video']);
            }
            if ($gallery->video_thumb) {
                $thumbID = pathinfo(parse_url($gallery->video_thumb, PHP_URL_PATH), PATHINFO_FILENAME);
                $cloudinary->uploadApi()->destroy("kazan/gallery/{$thumbID}", ['resource_type' => 'image']);
            }

            $gallery->delete();
            $this->dispatch('galleryDeleted', message: 'Gallery deleted successfully.');
        } catch (\Exception $e) {
            $this->dispatch('galleryDeleteError', message: 'Failed to delete gallery.');
        }
    }

    public function render()
    {
        $galleries = GalleryModel::orderByDesc('id')->paginate($this->short);
        return view('livewire.admin.gallery.index', compact('galleries'))->layout('admin.layouts.app');
    }
}
