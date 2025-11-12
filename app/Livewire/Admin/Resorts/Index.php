<?php

namespace App\Livewire\Admin\Resorts;

use App\Models\Resort;
use Livewire\Component;
use Livewire\WithPagination;
use Cloudinary\Cloudinary;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $resort_name, $resort_address, $primary_img, $img_1, $img_2, $img_3, $img_4, $img_5, $detail, $status, $slug;
    public $short = 10;
    public $showModal = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedShort()
    {
        $this->resetPage();
    }

    protected $listeners = [
        'deleteResort' => 'deleteResort',
        'showDeleteAlert' => 'showDeleteAlert'
    ];

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function resetInputFields()
    {
        $this->resort_name = '';
        $this->resort_address = '';
        $this->primary_img = '';
        $this->img_1 = '';
        $this->img_2 = '';
        $this->img_3 = '';
        $this->img_4 = '';
        $this->img_5 = '';
        $this->detail = '';
    }

    public function toggleStatus($id)
    {
        $banner = Resort::find($id);

        if ($banner) {
            $banner->status = $banner->status === 'InActive' ? 'Active' : 'InActive';
            $banner->save();
            session()->flash('success', 'Resort Update Successfully...');
        }
    }

    public function viewBlog($id)
    {
        $blog = Resort::findOrFail($id);
        $this->fill($blog->toArray());
        $this->showModal = true;
        $this->dispatch('modalOpened');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetInputFields();
        $this->dispatch('modalClosed');
    }

    public function confirmDeleteResort($id)
    {
        $this->dispatch('showDeleteAlert', id: $id);
    }

    public function deleteResort($id)
    {
        try {
            $resort = Resort::findOrFail($id);
            if ($resort->primary_img) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->primary_img)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            if ($resort->img_1) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->img_1)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            if ($resort->img_2) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->img_2)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            if ($resort->img_3) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->img_3)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            if ($resort->img_4) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->img_4)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            if ($resort->img_5) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($resort->img_5)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/resorts/{$publicId}");
            }
            $resort->delete();
            $this->dispatch('resortDeleted', message: 'Resort deleted successfully.');
        } catch (\Exception $e) {
            $this->dispatch('resortDeleteError', message: 'Failed to delete blog.');
        }
    }

    public function updateSlug()
    {
        $resorts = Resort::all();

        foreach ($resorts as $resort) {
            $resort->slug = Str::slug($resort->resort_name);
            $resort->save();
        }
        session()->flash('success', 'Resort Update Successfully...');
    }

    public function render()
    {
        $query = Resort::query();

        if (!empty(trim($this->search))) {
            $query->where(function ($q) {
                $q->where('resort_name', 'like', "%{$this->search}%")
                    ->orWhere('resort_address', 'like', "%{$this->search}%");
            });
        }

        $resorts = $query->orderByDesc('id')->paginate($this->short);
        return view('livewire.admin.resorts.index', compact('resorts'))->layout('admin.layouts.app');
    }
}
