<?php

namespace App\Livewire\Admin;

use App\Models\Booking as BookingModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Booking extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $type, $membership_no, $name, $guest, $contact, $email, $destination, $number_of_rooms, $adults, $child_below_6_years, $check_in, $check_out;
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

    public function resetinputfields()
    {
        $this->type = '';
        $this->membership_no = '';
        $this->name = '';
        $this->guest = '';
        $this->contact = '';
        $this->email = '';
        $this->destination = '';
        $this->number_of_rooms = '';
        $this->adults = '';
        $this->child_below_6_years = '';
        $this->check_in = '';
        $this->check_out = '';
    }

    public function viewBooking(int $id): void
    {
        $booking = BookingModel::findOrFail($id);
        $this->fill($booking->toArray());
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
        $query = BookingModel::query();
        if (!empty(trim($this->search))) {
            $searchTerm = trim($this->search);
            $query->where(function ($q) use ($searchTerm) {
                $q->where('membership_no', 'like', '%' . $searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('contact', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $bookings = $query->orderByDesc('id')->paginate($this->short);

        return view('livewire.admin.booking', compact('bookings'))
            ->layout('admin.layouts.app');
    }
}
