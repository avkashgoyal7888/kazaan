<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactUs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search, $name, $email, $phone, $subject, $message;
    public $short = 10;
    public $showModal = false;
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
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
    }
    public function viewBlog($id)
    {
        $detail = Contact::findOrFail($id);
        $this->phone = $detail->contact;
        $this->fill($detail->toArray());
        $this->showModal = true;
        $this->dispatch('modalOpened');
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetInputFields();
        $this->dispatch('modalClosed');
    }
    public function render()
    {
        $query = Contact::query();
        if (!empty(trim($this->search))) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%")
                    ->orWhere('contact', 'like', "%{$this->search}%");
            });
        }
        $contacts = $query->orderByDesc('id')->paginate($this->short);
        return view('livewire.admin.contact-us', compact('contacts'))->layout('admin.layouts.app');
    }
}
