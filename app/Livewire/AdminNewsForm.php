<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use Livewire\Attributes\On;

class AdminNewsForm extends Component
{
    public $newsId;
    public $title;
    public $content;
    public $is_published = false;

    public function closeAddModel()
    {
        $this->reset();
        $this->dispatch('newsSubmitted');
    }

    #[On('editNews')]
    public function loadNews($id)
    {
        $news = News::findOrFail($id);
        $this->newsId = $news->id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->is_published = (bool) $news->is_published;
    }

    public function submit()
    {
         if(is_null($this->newsId)) {
            // New News
            $validatedData = $this->validate([
                'title' => 'required|min:5',
                'content' => 'required|min:10',
                'is_published' => 'required'
            ]);
            if((boolean)$validatedData['is_published'])
                $published_at = now();
            else
                $published_at = NULL;
            News::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'is_published' => (boolean)$validatedData['is_published'],
                'published_at' => $published_at
            ]);
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'News added'
            ]);
        } else {
            // News update
            $validatedData = $this->validate([
                'title' => 'required|min:5',
                'content' => 'required|min:10',
                'is_published' => 'required'
            ]);
            if((boolean)$validatedData['is_published'])
                $published_at = now();
            else
                $published_at = NULL;
            $news = News::findOrFail($this->newsId);
            $news->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'is_published' => (boolean)$validatedData['is_published'],
                'published_at' => $published_at
            ]);
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'News Updated'
            ]);
        }
        
        $this->reset();
        $this->dispatch('newsSubmitted');
        $this->dispatch('newsAdded');
    }

    public function render()
    {
        return view('livewire.admin-news-form');
    }
}
