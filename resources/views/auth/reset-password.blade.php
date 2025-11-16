<x-auth-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="container py-5">
        <h2>Reset your password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>New password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset password</button>
        </form>
    </div>

</x-auth-layout>