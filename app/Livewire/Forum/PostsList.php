<?php

namespace App\Livewire\Forum;

use Livewire\Component;

class PostsList extends Component
{
    public $thread;

    protected $listeners = ['postAdded' => '$refresh'];

    public function render()
    {
        
        return view('livewire.forum.posts-list', [
                'posts' => $this->thread->posts()->latest()->get(),
            ]);
    }
}
