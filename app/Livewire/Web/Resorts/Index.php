<?php

namespace App\Livewire\Web\Resorts;

use App\Models\Resort;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $scrollToTop = false;

    public function render()
    {
        $resorts = Resort::where('status','Active')->orderBy('id', 'desc')->paginate(12);
        return view('livewire.web.resorts.index', compact('resorts'))->layout('web.layouts.app');
    }
}
