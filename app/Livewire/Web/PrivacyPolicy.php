<?php

namespace App\Livewire\Web;

use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.web.privacy-policy')->layout('web.layouts.app');
    }
}
