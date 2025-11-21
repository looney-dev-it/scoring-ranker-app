<?php

namespace App\Livewire\News;

use Livewire\Component;

class NewCommentNews extends Component
{
    public $news;
    public $content;

    public function mount()
    {
        abort_unless(auth()->check(), 403);
    }

    public function submit()
    {
        abort_unless(auth()->check(), 403);

        $this->news->comments()->create([
            'user_id' => auth()->id(),
            'news_id' => $this->news->id,
            'content' => $this->content,
        ]);

        $this->reset('content');
        // Refresh comment list
        $this->dispatch('commentAdded');
    }

    public function render()
    {
        return view('livewire.news.new-comment-news');
    }
}
