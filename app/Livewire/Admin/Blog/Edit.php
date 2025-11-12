<?php

namespace App\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Blog;
use Cloudinary\Cloudinary;

class Edit extends Component
{
    use WithFileUploads;

    public $blog;
    public $title, $sub_title, $slug, $content, $status;
    public $image, $existingImage;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', $slug)->firstOrFail();

        $this->title = $this->blog->title;
        $this->sub_title = $this->blog->sub_title;
        $this->slug = $this->blog->slug;
        $this->content = $this->blog->content;
        $this->status = $this->blog->status;
        $this->existingImage = $this->blog->image;
    }

    public function updatedTitle()
    {
        if (empty($this->slug)) {
            $this->slug = Str::slug($this->title);
        }
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $this->blog->id,
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:Active,InActive',
        ];
    }

    public function update()
    {
        $this->validate();

        $imageUrl = $this->existingImage;

        if ($this->image) {
            if ($this->existingImage) {
                $cloudinary = new Cloudinary(config('cloudinary.cloud_url'));
                $publicId = pathinfo($this->existingImage)['filename'];
                $cloudinary->uploadApi()->destroy("kazan/blog/{$publicId}");
            }

            $uploaded = (new Cloudinary(config('cloudinary.cloud_url')))
                ->uploadApi()
                ->upload($this->image->getRealPath(), [
                    'folder' => 'kazan/blog',
                    'format' => 'webp',
                ]);

            $imageUrl = $uploaded['secure_url'];
        }

        $this->blog->update([
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'slug' => Str::slug($this->slug),
            'content' => $this->content,
            'image' => $imageUrl,
            'status' => $this->status,
        ]);
        $this->dispatch('blogUpdated', message: 'Blog updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.blog.edit')->layout('admin.layouts.app');
    }
}
