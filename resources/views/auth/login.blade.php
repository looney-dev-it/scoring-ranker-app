
<x-auth-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Welcome Back</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autofocus>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Forgot your password? <a href="{{ route('password.request') }}">forgot</a></small>
                </div>
                <div class="card-footer text-center">
                    <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</x-auth-layout>