<div>
    @foreach($news->comments as $comment)
        <div class="card mb-3">
            <div class="card-header">
                <strong><a href="{{ route('user.show', $comment->user->id) }}">{{ $comment->user->name  }}</a></strong>
                <span class="text-muted">– {{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="card-body">
                {!! nl2br(e($comment->content)) !!}
            </div>
        </div>
    @endforeach
</div>