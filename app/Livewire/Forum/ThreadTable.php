<?php

namespace App\Livewire\Forum;

use Livewire\Component;

class ThreadTable extends Component
{
    public $threads;
    public $scoreTopic;

    protected $listeners = ['threadAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->threads = $this->scoreTopic->threads()
            ->withCount('posts')
            ->with(['posts' => function ($query) {
                $query->latest()->limit(1);
            }, 'user'])
            ->get();

        $this->threads->map(function ($thread) {
            $thread->latest_post = $thread->posts->sortByDesc('created_at')->first();
            return $thread;
        });
    }
    public function render()
    {
        $this->refreshTable();
        return view('livewire.forum.thread-table');
    }
}
