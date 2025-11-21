<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use Livewire\Attributes\On;
use Illuminate\Http\UploadedFile;

class NewsForm extends Component
{
    use WithFileUploads;    

    public $newsId;
    public $title;
    public $content;
    public $image_path;
    public $is_published = false;
    public $existingImagePath;

    public function mount()
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
    }

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
        //$this->image_path = $news->image_path;
        $this->is_published = (bool) $news->is_published;
        $this->existingImagePath = $news->image_path; 
    }

    public function submit()
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        
        $validatedData = $this->validate([
                'title' => 'required|min:5',
                'content' => 'required|min:10',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_published' => 'required'
            ]);

        if ($this->image_path instanceof UploadedFile) {
            $path = $this->image_path->store('news_images', 'public');
        } else {
            $path = $this->existingImagePath ?? null;
        }
        
        News::updateOrCreate(
            ['id' => $this->newsId],
            [
                'title' => $this->title,
                'content' => $this->content,
                'is_published' => $this->is_published,
                'published_at' => $this->is_published ? now() : null,
                'image_path' => $path,
                'user_id' => auth()->id(),
            ]
        );
         
        if($this->newsId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'News Added'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'News Updated'
            ]);
        }
        $this->reset();
        $this->dispatch('newsSubmitted');
    }

    public function render()
    {
        return view('livewire.admin.news-form');
    }
}
