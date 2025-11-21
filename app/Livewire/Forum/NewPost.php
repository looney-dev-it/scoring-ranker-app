<?php

namespace App\Livewire\Forum;

use Livewire\Component;

class NewPost extends Component
{

    public $thread;
    public $content;

    public function mount()
    {
        abort_unless(auth()->check(), 403);
    }

    public function submit()
    {
        abort_unless(auth()->check(), 403);

        $this->thread->posts()->create([
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->reset('content');

        // Event to refresh PostsList component
        $this->dispatch('postAdded');
    }

    public function render()
    {
        return view('livewire.forum.new-post');
    }
}
