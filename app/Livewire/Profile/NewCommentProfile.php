<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class NewCommentProfile extends Component
{
     public $profile;
    public $content;

    public function mount()
    {
        abort_unless(auth()->check(), 403);
    }

    public function submit()
    {
        abort_unless(auth()->check(), 403);
        $this->profile->comments()->create([
            'user_id' => auth()->id(),
            'profile_id' => $this->profile->id,
            'content' => $this->content,
        ]);

        $this->reset('content');

        // Refresh comments list
        $this->dispatch('commentAdded');
    }
    public function render()
    {
        return view('livewire.profile.new-comment-profile');
    }
}
