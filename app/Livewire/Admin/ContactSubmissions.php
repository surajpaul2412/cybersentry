<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ContactSubmission;

class ContactSubmissions extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $submissions = ContactSubmission::query()
            ->when($this->search, function ($query) {
                $query->where('email', 'like', '%' . $this->search . '%')
                      ->orWhere('subject', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.contact-submissions', [
            'submissions' => $submissions
        ]);
    }
}
