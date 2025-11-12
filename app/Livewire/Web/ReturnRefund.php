<?php

namespace App\Livewire\Web;

use Livewire\Component;

class ReturnRefund extends Component
{
    public function render()
    {
        return view('livewire.web.return-refund')->layout('web.layouts.app');
    }
}
