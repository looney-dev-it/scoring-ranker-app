
<x-auth-layout>
        <x-slot:title>
            Register
        </x-slot:title>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Create Your Account</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="register">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" class="form-control" required minlength="5" name="name" placeholder="Mike Brandt">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" class="form-control" required minlength="5" name="email" placeholder="you@example.com">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="••••••••">
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="••••••••">
                                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already have an account? <a href="{{ route('login') }}">Log in</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>