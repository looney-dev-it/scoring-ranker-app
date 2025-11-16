<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class CommentsListProfile extends Component
{
    public $profile;

    protected $listeners = ['commentAdded' => '$refresh'];

    public function render()
    {
        return view('livewire.profile.comments-list-profile', [
            'comments' => $this->profile->comments()->latest()->get(),
        ]);
    }
}
