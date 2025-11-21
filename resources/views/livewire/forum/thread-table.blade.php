<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Author</th>
                <th>Responses</th>
                <th>Last message</th>
            </tr>
        </thead>
        <tbody>
            @forelse($threads as $thread)
                <tr>
                    <td>{{ $thread->pinned ? "📌" : "" }}</td>
                    <td>
                        <a href="{{ route('forum.thread', [$scoreTopic->id, $thread->id]) }}">
                            {{ $thread->title }}
                        </a>
                    </td>
                    <td><strong><a
                                href="{{ route('user.show', $thread->user->id) }}">{{ $thread->user->name  }}</a></strong>
                    </td>
                    <td>{{ $thread->posts_count ?? 0 }}</td>
                    <td>
                        @if($thread->latest_post)
                            <strong><a
                                    href="{{ route('user.show', $thread->user->id) }}">{{ $thread->user->name  }}</a></strong>
                            – {{ $thread->latest_post->created_at->diffForHumans() }}
                        @else
                            None
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        No threads for this ScoreTopic.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $threads->links() }}
    </div>
</div>