<x-layout>
    <x-slot:title>
        Forum
    </x-slot:title>

    <div class="container mt-4">
        <h2 class="mb-4">ScoreTopics Forum</h2>

        @foreach($scoreTypes as $scoreType)
            <div class="mb-5">
                <h3 class="border-bottom pb-2">{{ $scoreType->name }}</h3>
                <p class="text-muted">{{ $scoreType->description ?? '' }}</p>

                <div class="list-group">
                    @forelse($scoreType->topics as $topic)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">
                                    <a href="{{ route('forum.topic', $topic->id) }}">
                                        {{ $topic->title }}
                                    </a>
                                </h5>
                                <p class="mb-1 text-muted">{{ $topic->description }}</p>
                            </div>
                            <div class="text-end">
                                <small class="text-muted">
                                    Threads: {{ $topic->threads_count ?? 0 }} |
                                    Latest post:
                                    @if($topic->latest_post)
                                        {{ $topic->latest_post->created_at->diffForHumans() }}
                                    @else
                                        None
                                    @endif
                                </small>
                            </div>
                        </div>
                    @empty
                        <div class="list-group-item text-muted">
                            No Topics for this ScoreType
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</x-layout>