<?php

namespace App\Livewire\News;

use Livewire\Component;

class CommentsListNews extends Component
{
    public $news;

    protected $listeners = ['commentAdded' => '$refresh'];

    public function render()
    {
        return view('livewire.news.comments-list-news', [
            'comments' => $this->news->comments()->latest()->get(),
        ]);
    }
}
