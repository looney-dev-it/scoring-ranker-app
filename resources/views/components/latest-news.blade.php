<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h5 class="mb-0">Latest News</h5>
    </div>

    <div class="card-body">
        @if($news->isEmpty())
            <div class="alert alert-warning text-center mb-0">
                No news available at the moment.
            </div>
        @else
            <ul class="list-group list-group-flush">
                @foreach ($news as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('news.show', $item->id) }}" class="text-decoration-none">
                            {{ $item->title }}
                        </a>
                        <span class="badge bg-secondary">
                            {{ $item->published_at->format('d/m/Y') }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('news') }}" class="btn btn-sm btn-outline-primary">
            View all news →
        </a>
    </div>
</div>
