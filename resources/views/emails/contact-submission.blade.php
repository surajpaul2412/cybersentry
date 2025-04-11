<div>
	<p>You received a new contact message:</p>

	<p><strong>Name:</strong> {{ $submission->name }}</p>
	<p><strong>Email:</strong> {{ $submission->email }}</p>
	<p><strong>Subject:</strong> {{ $submission->subject }}</p>
	<p><strong>Message:</strong><br>{{ $submission->message }}</p>
</div>
