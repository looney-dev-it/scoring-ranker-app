<?php 
namespace App\Livewire\Forum;

use Livewire\Component;
use App\Models\Thread;
use App\Models\Post;

class CreateThread extends Component
{
    public $scoreTopic;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|min:3|max:255',
        'content' => 'required|string|min:5',
    ];

    public function store()
    {
        $this->validate();

        $thread = Thread::create([
            'scoretopic_id' => $this->scoreTopic,
            'title' => $this->title,
            'user_id' => auth()->id(),
        ]);

        Post::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);

        $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Thread created successfully'
            ]);
        $this->dispatch('threadAdded');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.forum.create-thread');
    }
}
