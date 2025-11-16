{{-- resources/views/forum/thread.blade.php --}}
<x-layout>
    <x-slot:title>
        {{ $thread->title }}
    </x-slot:title>

    <div class="container mt-4">
        <h2 class="mb-4">{{ $thread->title }}</h2>
        <p class="text-muted">
            Posted by <strong><a
                    href="{{ route('user.show', $thread->user->id) }}">{{ $thread->user->name  }}</a></strong>
            on {{ $thread->created_at->format('d/m/Y H:i') }}
        </p>
        <a href="{{ route("forum.topic", $thread->scoretopic_id) }}">Back to thread</a>
        <h5 class="mb-3">Posts ({{ $thread->posts->count() }})</h5>

        <livewire:forum.posts-list :thread="$thread" />

        <livewire:forum.new-post :thread="$thread" />
    </div>
</x-layout>