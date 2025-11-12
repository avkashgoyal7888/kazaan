<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Blog;
use Cloudinary\Cloudinary;

class Add extends Component
{
    use WithFileUploads;
    public $title = '';
    public $sub_title = '';
    public $slug = '';
    public $content = '';
    public $image;
    public $status = '';

    protected $rules = [
        'title' => 'required|string|max:255',
        'sub_title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
    ];

    public function store()
    {
        $this->validate();

        $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
        $imageUrl = null;

        if ($this->image) {
            $uploaded = $cloudinary->uploadApi()->upload($this->image->getRealPath(), [
                'folder' => 'kazan/blog',
                'format' => 'webp',
            ]);
            $imageUrl = $uploaded['secure_url'];
        }

        Blog::create([
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'slug' => Str::slug($this->slug),
            'content' => $this->content,
            'image' => $imageUrl,
        ]);

        $this->reset();
        $this->dispatch('blog:created');
    }

    public function render()
    {
        return view('livewire.admin.blog.add')->layout('admin.layouts.app');
    }
}
