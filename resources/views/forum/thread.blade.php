<x-layout>
    <x-slot:title>
        {{ $thread->title }}
    </x-slot:title>

    <div class="container mt-4">
        <h2 class="mb-4">{{ $thread->title }}</h2>
        @if(auth()->user()->admin)
        Delete Thread ?
            <form action="{{ route('forum.thread.destroy', [$thread->scoretopic_id, $thread->id]) }}" 
                method="POST" 
                class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit" 
                        class="btn-close" 
                        aria-label="Delete"
                        onclick="return confirm('Are you sure you want to delete this thread?')">
                </button>
            </form>
        @endif
        <p class="text-muted">
            Posted by <strong><a
                    href="{{ route('user.show', $thread->user->id) }}">{{ $thread->user->name  }}</a></strong>
            on {{ $thread->created_at->format('d/m/Y H:i') }}
        </p>
        <a href="{{ route("forum.topic", $thread->scoretopic_id) }}">Back to thread</a>
        <h5 class="mb-3">Posts ({{ $thread->posts->count() }})</h5>

        <livewire:forum.posts-list :thread="$thread" />
        @auth
            <livewire:forum.new-post :thread="$thread" />
        @else
            <p><small>Please login to post a reply</small></p>
        @endauth
    </div>
</x-layout>