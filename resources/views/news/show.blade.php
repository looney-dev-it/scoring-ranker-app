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
                            by <a href="/profile/{{ $news->author->id }}">{{ $news->author->name }}</a>
                        </div>

                        <p class="card-text fs-5" style="white-space: pre-line;">
                            {{ $news->content }}
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
                                ← Back to News
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
