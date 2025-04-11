<div class="container mt-5" style="max-width: 600px;">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="card p-4 shadow-sm rounded-4">
        <h4 class="mb-4 text-center">Contact Us</h4>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input wire:model.defer="name" type="text" id="name" class="form-control rounded-pill">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input wire:model.defer="email" type="email" id="email" class="form-control rounded-pill">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input wire:model.defer="subject" type="text" id="subject" class="form-control rounded-pill">
            @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea wire:model.defer="message" id="message" rows="4" class="form-control rounded-3"></textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 rounded-pill">Send Message</button>
    </form>
</div>
