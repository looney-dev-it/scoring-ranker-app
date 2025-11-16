<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class NewCommentProfile extends Component
{
     public $profile;
    public $content;

    public function mount()
    {
        if (!auth()->check()) {
            abort(403);
        }
    }

    public function submit()
    {
        $this->profile->comments()->create([
            'user_id' => auth()->id(),
            'profile_id' => $this->profile->id,
            'content' => $this->content,
        ]);

        $this->reset('content');

        // Émet l’événement pour rafraîchir PostsList
        $this->dispatch('commentAdded');
    }
    public function render()
    {
        return view('livewire.profile.new-comment-profile');
    }
}
