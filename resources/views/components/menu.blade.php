<nav class="navbar bg-base-100">
    <div class="navbar-start">
        <a href="/" class="btn btn-ghost text-xl">Home</a>
        <a href="/" class="btn btn-ghost text-xl">News</a>
        <a href="/" class="btn btn-ghost text-xl">Forum</a>
        <a href="/" class="btn btn-ghost text-xl">FAQ</a>
        <a href="/" class="btn btn-ghost text-xl">Contact</a>
    </div>
    <div class="navbar-end gap-2">
        @auth
            @if(auth()->user()->admin)
                <a href="/" class="btn btn-ghost text-xl">Admin</a>
            @endif
            <span class="text-sm">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
        @endauth
    </div>
</nav>