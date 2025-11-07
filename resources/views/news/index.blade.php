<x-layout>
   <x-slot:title>
        News Feed
    </x-slot:title>

    
     <div class="row">
        <div class="col-8">
        <h1 class="text-3xl font-bold mt-8">News</h1>
        <div class="container mt-4">
            @forelse ($news as $item)
                <div class="card mb-4 shadow-sm">
                    @if ($item->image_path)
                        <img src="{{asset('storage/' . $item->image_path) }}" alt="News image" class="card-img-top img-fluid"
     style="max-height: 300px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>                        
                        @php
                            $lines = explode("\n", $item->content);
                            $preview = implode("\n", array_slice($lines, 0, 3))."\n";
                        @endphp
                        <p class="card-text" style="white-space: pre-line;">{{ $preview }}</p>
                        <a href="{{ route('news.show', $item->id) }}">...</a>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                Published {{ $item->published_at->format('d/m/Y') }} by <a href="{{ route('user.show', ['id' => $item->author->id ]) }}">{{ $item->author->name }}</a>
                            </small>
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-outline-primary">More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="hero py-12">
                        <div class="hero-content text-center">
                            <div>
                                <p class="mt-4 text-base-content/60">No news yet!</p>
                            </div>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
</x-layout>