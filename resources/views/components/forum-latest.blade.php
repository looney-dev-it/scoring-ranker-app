<div class="card shadow-sm mb-4">
    <div class="card-header">
        <a class="text-dark text-decoration-none" href="{{route('forum')}}">
            <h5 class="mb-0">Latest Threads from the Forum</h5>
        </a>
    </div>
    <ul class="list-group list-group-flush">
        @forelse($threads as $thread)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong><a
                                href="{{  route('forum.thread', [$thread->topic->id, $thread->id])}}">{{ $thread->title }}</a></strong><br>
                        <small>
                            by <a
                                href="{{  route('user.show', ['id' => $thread->user->id]) }}">{{ $thread->user->name }}</a>
                            •
                            {{ $thread->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <div class="text-muted">
                        {{ $thread->posts_count }} posts
                    </div>
                </div>
                @if($thread->posts->isNotEmpty())
                    <div class="mt-2 ps-3 border-start">
                        <small>
                            latest post :
                            {{ $thread->posts->first()->created_at->diffForHumans() }}
                            by <a
                                href="route('user.show', ['id' => $thread->posts->first()->user->id ])">{{ $thread->posts->first()->user->name }}</a>
                        </small>
                    </div>
                @endif
            </li>
        @empty
            <li class="list-group-item text-center text-muted">
                No thread for the moment
            </li>
        @endforelse
    </ul>
</div>