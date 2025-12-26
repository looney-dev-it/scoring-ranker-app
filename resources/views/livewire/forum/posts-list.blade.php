<div>
    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>
                        <a href="{{ route('user.show', $post->user->id) }}">
                            {{ $post->user->name }}
                        </a>
                    </strong>
                    <span class="text-muted">– {{ $post->created_at->diffForHumans() }}</span>
                    @auth
                        @if(auth()->user()->admin)
                            <button 
                                type="button"
                                class="btn-close"
                                aria-label="Delete"
                                wire:click="deletePost({{ $post->id }})"
                            ></button>
                        @endif
                    @endauth
                </div>
                <div>
                    <!-- Bouton Like -->
                    <button wire:click="toggleLike({{ $post->id }})"
                        class="btn btn-sm {{ $post->likedByUsers->contains(auth()->id()) ? 'btn-danger' : 'btn-outline-danger' }}">
                        ❤️
                    </button>
                    <span class="ms-1">{{ $post->likedByUsers->count() }}</span>
                </div>
            </div>
            <div class="card-body">
                {!! nl2br(e($post->content)) !!}
            </div>
        </div>
    @endforeach
    <div class="mt-3">
        {{ $posts->links() }}
    </div>
</div>