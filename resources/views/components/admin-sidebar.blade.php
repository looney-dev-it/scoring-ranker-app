<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px; height: 80vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : 'text-dark' }}">
                👤 User
            </a>
        </li>
        <li>
            <a href="/admin/news" class="nav-link {{ Request::is('admin/news*') ? 'active' : 'text-dark' }}">
                📰 News
            </a>
        </li>
        <li>
            <a href="/admin/score" class="nav-link {{ Request::is('admin/score*') ? 'active' : 'text-dark' }}">
                🎮 Score
            </a>
        </li>
        <li>
            <a href="/admin/faq" class="nav-link {{ Request::is('admin/faq*') ? 'active' : 'text-dark' }}">
                ❓ FAQ
            </a>
        </li>
        <li>
            <a href="/admin/contact" class="nav-link {{ Request::is('admin/contact*') ? 'active' : 'text-dark' }}">
                📬 Contact
            </a>
        </li>
    </ul>
</div>