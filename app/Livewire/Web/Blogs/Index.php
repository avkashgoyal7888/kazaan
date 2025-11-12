<?php

namespace App\Livewire\Web\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $scrollToTop = false;

    public function render()
    {
        $blogs = Blog::where('status', 'Active')->orderBy('id', 'desc')->paginate(1);
        return view('livewire.web.blogs.index', compact('blogs'))->layout('web.layouts.app');
    }
}
