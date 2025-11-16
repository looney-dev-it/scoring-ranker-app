<?php

namespace App\Livewire\Forum;

use Livewire\Component;

class NewPost extends Component
{

    public $thread;
    public $content;

    public function submit()
    {
        $this->thread->posts()->create([
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->reset('content');

        // Émet l’événement pour rafraîchir PostsList
        $this->dispatch('postAdded');
    }

    public function render()
    {
        return view('livewire.forum.new-post');
    }
}
