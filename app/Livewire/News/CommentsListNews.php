<?php

namespace App\Livewire\News;

use Livewire\Component;
use App\Models\CommentNews;

class CommentsListNews extends Component
{
    public $news;

    protected $listeners = ['commentAdded' => '$refresh'];

    public function deleteComment($commend_id)
    {
        $comment = CommentNews::findOrFail($commend_id);

        $comment->delete();
         $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Comment deleted successfully!'
        ]);
        $this->render();
    }

    public function render()
    {
        return view('livewire.news.comments-list-news', [
            'comments' => $this->news->comments()->latest()->get(),
        ]);
    }
}
