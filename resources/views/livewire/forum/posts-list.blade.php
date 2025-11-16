<div>
    @foreach($thread->posts as $post)
        <div class="card mb-3">
            <div class="card-header">
                <strong><a href="{{ route('user.show', $thread->user->id) }}">{{ $thread->user->name  }}</a></strong>
                <span class="text-muted">– {{ $post->created_at->diffForHumans() }}</span>
            </div>
            <div class="card-body">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    @endforeach
</div>