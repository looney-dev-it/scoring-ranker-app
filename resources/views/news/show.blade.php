<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    @if ($news->image_path)
                        <img src="{{ asset('storage/' . $news->image_path) }}" alt="News image"
                            class="card-img-top img-fluid" style="max-height: 400px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $news->title }}</h2>

                        <div class="text-muted mb-4">
                            Published on {{ $news->published_at->format('d/m/Y') }}
                            by <a href="route('user.show', ['id' => $news->author->id ])">{{ $news->author->name }}</a>
                        </div>

                        <p class="card-text fs-5" style="white-space: pre-line;">
                            {{ $news->content }}
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('news') }}" class="btn btn-outline-secondary">
                                ← Back to News
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-8">
                <h5>Comments</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-1"></div>
            <div class="col-lg-8">
                <livewire:news.comments-list-news :news="$news" />
                @auth
                    <livewire:news.new-comment-news :news="$news" />
                @else
                    <p><small>Please login to post a comment</small></p>
                @endauth
            </div>
        </div>
    </div>
</x-layout>