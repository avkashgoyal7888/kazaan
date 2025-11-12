<?php

namespace App\Livewire\Web\Resorts;

use App\Models\Resort;
use Livewire\Component;

class Detail extends Component
{
    public string $slug;
    public Resort $resorts;
    public $nexts;

    public function mount(string $slug)
    {
        $this->slug = $slug;
        $this->resorts = Resort::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.web.resorts.detail')->layout('web.layouts.app');
    }
}
