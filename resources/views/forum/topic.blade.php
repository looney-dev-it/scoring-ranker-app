<x-layout>
    <x-slot:title>
        {{ $scoreTopic->title }}
    </x-slot:title>

    <div class="container mt-4">
        <h2 class="mb-4">{{ $scoreTopic->title }}</h2>
        <p class="text-muted">{{ $scoreTopic->description }}</p>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Threads</h5>
            @auth
                <livewire:forum.create-thread :scoreTopic="$scoreTopic->id" />
            @else
                <p><small>Please login to start a new thread</small></p>
            @endauth
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route("forum") }}">Back to topics</a>
        </div>
        <livewire:forum.thread-table :scoreTopic="$scoreTopic" />
    </div>
</x-layout>