<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use Cloudinary\Cloudinary;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $short = 10;
    public $title = '', $sub_title = '', $content = '', $image = '', $slug = '', $status = '';
    public $showModal = false;
    public $selectedBlogId = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedShort()
    {
        $this->resetPage();
    }

    protected $listeners = [
        'deleteBlog' => 'deleteBlog',
        'showDeleteAlert' => 'showDeleteAlert'
    ];

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->sub_title = '';
        $this->content = '';
        $this->image = '';
        $this->slug = '';
        $this->status = '';
        $this->selectedBlogId = null;
    }

    public function toggleStatus($id)
    {
        $banner = Blog::find($id);

        if ($banner) {
            $banner->status = $banner->status === 'InActive' ? 'Active' : 'InActive';
            $banner->save();
            session()->flash('success', 'Blog Update Successfully...');
        }
    }

    public function viewBlog($id)
    {
        $blog = Blog::findOrFail($id);
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

    public function confirmDeleteBlog($id)
    {
        $this->dispatch('showDeleteAlert', id: $id);
    }

    public function deleteBlog($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            if ($blog->image) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($blog->image)['filename'];
                (new Cloudinary(config('cloudinary.cloud_url')))
                    ->uploadApi()
                    ->destroy("kazan/blog/{$publicId}");
            }
            $blog->delete();
            $this->dispatch('blogDeleted', message: 'Blog deleted successfully.');
        } catch (\Exception $e) {
            $this->dispatch('blogDeleteError', message: 'Failed to delete blog.');
        }
    }

    public function render()
    {
        $query = Blog::query();

        if (!empty(trim($this->search))) {
            $query->where(function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                    ->orWhere('sub_title', 'like', "%{$this->search}%")
                    ->orWhere('content', 'like', "%{$this->search}%")
                    ->orWhere('slug', 'like', "%{$this->search}%");
            });
        }

        $blogs = $query->orderByDesc('id')->paginate($this->short);

        return view('livewire.admin.blog.index', compact('blogs'))
            ->layout('admin.layouts.app');
    }
}
