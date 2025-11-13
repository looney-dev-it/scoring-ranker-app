<x-layout>
    <x-slot:title>
        Contact
    </x-slot:title>

    <div class="container my-5">
        <h2 class="mb-4">Contact Us</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @else
            <form action="{{ route('contact.send') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="from" class="form-label">Name</label>
                    <input type="text" class="form-control @error('from') is-invalid @enderror" id="from" name="from"
                        value="{{ old('from') }}" required>
                    @error('from')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        placeholder="example@domain.com" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                        name="subject" placeholder="Message subject" value="{{ old('subject') }}" required>
                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                        rows="5" placeholder="Your message..." value="{{ old('message') }}" required></textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        @endif
    </div>
</x-layout>