<?php

namespace App\Livewire\News;

use Livewire\Component;

class NewCommentNews extends Component
{
    public $news;
    public $content;

    public function mount()
    {
        if (!auth()->check()) {
            abort(403);
        }
    }

    public function submit()
    {
        $this->news->comments()->create([
            'user_id' => auth()->id(),
            'news_id' => $this->news->id,
            'content' => $this->content,
        ]);

        $this->reset('content');

        // Émet l’événement pour rafraîchir PostsList
        $this->dispatch('commentAdded');
    }

    public function render()
    {
        return view('livewire.news.new-comment-news');
    }
}
