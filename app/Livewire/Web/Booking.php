<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;
use App\Models\Booking as BookingModel;
use Illuminate\Support\Facades\Mail;

#[Layout('web.layouts.app')]
class Booking extends Component
{
    public $type = '';
    public $membership_no = '';
    public $name = '';
    public $guest = '';
    public $contact = '';
    public $email = '';
    public $destination = '';
    public $number_of_rooms = '';
    public $adults = '';
    public $child_below_6_years = 0;
    public $check_in = '';
    public $check_out = '';

    public function updatedType()
    {
        if ($this->type === 'non-member') {
            $this->membership_no = '';
        }
    }

    public function submit()
    {
        $this->validate();
        try {
            $booking = new BookingModel();
            $booking->type = $this->type;
            $booking->membership_no = $this->membership_no;
            $booking->name = $this->name;
            $booking->guest = $this->guest;
            $booking->contact = $this->contact;
            $booking->email = $this->email;
            $booking->destination = $this->destination;
            $booking->number_of_rooms = $this->number_of_rooms;
            $booking->adults = $this->adults;
            $booking->child_below_6_years = $this->child_below_6_years;
            $booking->check_in = $this->check_in;
            $booking->check_out = $this->check_out;

            $savedData = $booking->save();

            if ($savedData) {
                // Optional: Send email notification
                // Mail::send('web.mail.new_booking', ['booking' => $booking], function ($message) use ($booking) {
                //     $message->to('nancy@kazanlifestyle.com');
                //     $message->subject('New Booking');
                // });

                $this->reset();

                $this->dispatch(
                    'booking-success',
                    title: 'Booking Successful!',
                    message: 'Your booking has been submitted successfully. We will contact you soon.',
                    redirect: route('web.home')
                );
            } else {
                $this->dispatch(
                    'booking-error',
                    title: 'Error!',
                    message: 'Something went wrong. Please try again later.'
                );
            }
        } catch (\Exception $e) {
            $this->dispatch(
                'booking-error',
                title: 'Error!',
                message: 'Something went wrong. Please try again later.'
            );
        }
    }

    public function render()
    {
        return view('livewire.web.booking')->layout('web.layouts.app');
    }
}
