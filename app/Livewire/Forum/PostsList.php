<?php

namespace App\Livewire\Forum;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Thread;


class PostsList extends Component
{
    public $threadId;
    use WithPagination;

    protected $listeners = ['postAdded' => 'goToLatestPage'];
    protected $paginationTheme = 'bootstrap';

    public function mount(Thread $thread) 
    {
        $this->threadId = $thread->id;
    }


    public function goToLatestPage()
    {
        $totalPosts = Thread::find($this->threadId)->posts()->count();
        $postsPerPage = 10;
        $lastPage = ceil($totalPosts / $postsPerPage);
        $this->setPage($lastPage);
    }

    public function toggleLike($postId)
    {
        abort_unless(auth()->check(), 403);
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
    
    public function deletePost($postId)
    {
        $post = \App\Models\Post::findOrFail($postId);

        $post->delete();
        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Post deleted successfully!'
        ]);
        $this->render();
    }

    public function render()
    {
        $posts = Thread::find($this->threadId)
                    ->posts()
                    ->orderBy('created_at')
                    ->paginate(10);
        return view('livewire.forum.posts-list', [
                'posts' => $posts,
            ]);
    }
}
