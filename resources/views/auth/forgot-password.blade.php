<x-auth-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="container py-5">
        <h2>Forgot your password?</h2>
        <p>Enter your email and we’ll send you a reset link.</p>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email">Email address</label>
                <input id="email" type="email" name="email" class="form-control" required autofocus>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Send reset link</button>
        </form>
    </div>
</x-auth-layout>