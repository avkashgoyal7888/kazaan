<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactUs extends Component
{
    public $name = '';
    public $contact = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $isSubmitting = false;

    public function contactUsSubmit()
    {
        $this->isSubmitting = true;

        $this->validate();

        try {
            $data = Contact::create([
                'name' => $this->name,
                'contact' => $this->contact,
                'subject' => $this->subject,
                'email' => $this->email,
                'message' => $this->message,
            ]);

            if ($data) {
                // Send email
                // Mail::send('web.pages.email.contactEmail', [
                //     'name' => $data->name,
                //     'contact' => $data->contact,
                //     'content' => $data->message
                // ], function ($message) use ($data) {
                //     $message->to('kumaraneesh600@gmail.com');
                //     $message->subject($data->subject);
                // });

                $this->reset(['name', 'contact', 'email', 'subject', 'message']);
                $this->dispatch('show-success-alert');
            } else {
                $this->dispatch('show-error-alert', message: 'Something went wrong. Try again later....');
            }
        } catch (\Exception $e) {
            $this->dispatch('show-error-alert', message: 'Something went wrong. Try again later....');
        }

        $this->isSubmitting = false;
    }

    public function render()
    {
        return view('livewire.web.contact-us')->layout('web.layouts.app');
    }
}
