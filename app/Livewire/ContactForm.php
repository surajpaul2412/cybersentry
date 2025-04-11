<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactSubmission;
use App\Jobs\SendContactNotificationJob;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:5',
    ];

    public function submit()
    {
        $this->validate();

        $submission = ContactSubmission::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Dispatch the email job
        SendContactNotificationJob::dispatch($submission);

        session()->flash('success', 'Your message has been sent successfully.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
