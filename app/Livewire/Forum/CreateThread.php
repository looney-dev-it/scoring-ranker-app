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
    public $pinned = false;

    protected $rules = [
        'title' => 'required|string|min:3|max:255',
        'content' => 'required|string|min:5',
    ];

    public function mount()
    {
        abort_unless(auth()->check(), 403);
    }
    
    public function store()
    {
        abort_unless(auth()->check(), 403);
        
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
            'pinned' => $this->pinned,
        ]);

        $this->reset(['title', 'content']);

        $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Thread created successfully'
            ]);
        $this->dispatch('hide-modal', 'createThreadModal');
        $this->dispatch('threadAdded');
    }

    public function render()
    {
        return view('livewire.forum.create-thread');
    }
}
