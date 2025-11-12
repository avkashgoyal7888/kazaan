<?php

namespace App\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class PayuTransactions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $short = 10;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function updatedShort()
    {
        $this->resetPage();
    }
    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }
    public function render()
    {
        $query = Payment::query();
        if (!empty(trim($this->search))) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('contact', 'like', "%{$this->search}%");
            });
        }
        $payments = $query->orderByDesc('id')->paginate($this->short);
        return view('livewire.admin.payu-transactions',compact('payments'))->layout('admin.layouts.app');
    }
}
