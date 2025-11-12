<?php

namespace App\Livewire\Web\Blogs;

use App\Models\Blog;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Detail extends Component
{
    public string $slug;
    public Blog $blog;
    public $nexts;

    public function mount(string $slug)
    {
        $this->slug = $slug;
        $this->blog = Blog::where('slug', $slug)->firstOrFail();

        $allBlogs = Blog::orderBy('id')->get();

        $currentIndex = $allBlogs->search(fn($item) => $item->id === $this->blog->id);

        $nextBlogs = $allBlogs->slice($currentIndex + 1)->take(10);
        if ($nextBlogs->count() < 10) {
            $remaining = 10 - $nextBlogs->count();
            $nextBlogs = $nextBlogs->concat($allBlogs->take($remaining));
        }

        $this->nexts = $nextBlogs->values();
    }

    public function render()
    {
        return view('livewire.web.blogs.detail')
            ->layout('web.layouts.app');
    }
}
