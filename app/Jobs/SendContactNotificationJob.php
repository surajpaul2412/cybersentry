<?php

namespace App\Jobs;

use App\Models\ContactSubmission;
use App\Mail\ContactSubmissionMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $submission;

    public function __construct(ContactSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function handle()
    {
        // Send email
        Mail::to('admin@example.com')->send(
            new ContactSubmissionMail($this->submission)
        );

        // Third-party API call
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $this->submission->subject,
            'body' => $this->submission->message,
            'userId' => 1
        ]);

        // Log the API response
        Log::info('Third-party API Response:', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);
    }
}
