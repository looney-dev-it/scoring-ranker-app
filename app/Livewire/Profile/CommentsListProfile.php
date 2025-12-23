<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\CommentProfile;

class CommentsListProfile extends Component
{
    public $profile;

    protected $listeners = ['commentAdded' => '$refresh'];


    public function deleteComment($commend_id)
    {
        $comment = CommentProfile::findOrFail($commend_id);

        // Check if comment is part of the current profile
        if($comment->profile_id !== $this->profile->id){
            abort(403);
        }

        $comment->delete();
        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Comment deleted successfully!'
        ]);
        $this->render();
    }

    public function render()
    {
        return view('livewire.profile.comments-list-profile', [
            'comments' => $this->profile->comments()->latest()->get(),
        ]);
    }
}
