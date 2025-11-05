<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Scoring Ranker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link {{ Request::is('score*') ? 'active' : '' }}" href="/score">Score</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('news*') ? 'active' : '' }}" href="/news">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('forum*') ? 'active' : '' }}" href="/forum">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('faq*') ? 'active' : '' }}" href="/faq">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="/contact">Contact</a>
      </li>
      @auth
        @if(auth()->user()->admin)
        <li class="nav-item">
              <a class="nav-link {{ Request::is('admin*') ? 'active' : '' }}" href="/admin">Admin</a>
        </li>
        @endif
      @endauth
    </ul>
        @auth
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/myprofile">My Page</a></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="dropdown-item">Logout</button>
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
        @else
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-ghost btn-sm" href="{{ route('login') }}">Sign in</a>
                </li>
            </ul>
        @endauth
  </div>
</nav>