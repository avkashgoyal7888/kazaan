<?php

namespace App\Livewire\Web;

use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.web.homepage')->layout('web.layouts.app');
    }
}
