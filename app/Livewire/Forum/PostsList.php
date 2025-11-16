<?php

namespace App\Livewire\Forum;

use Livewire\Component;

class PostsList extends Component
{
    public $thread;

    protected $listeners = ['postAdded' => '$refresh'];

    public function toggleLike($postId)
    {
        $user = auth()->user();
        $post = \App\Models\Post::findOrFail($postId);

        if ($post->likedByUsers()->where('user_id', $user->id)->exists()) {
            $post->likedByUsers()->detach($user->id);
        } else {
            $post->likedByUsers()->attach($user->id);
        }

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Like updated!'
        ]);
    }
    public function render()
    {
        
        return view('livewire.forum.posts-list', [
                'posts' => $this->thread->posts()->latest()->get(),
            ]);
    }
}
