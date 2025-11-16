<?php

namespace App\Livewire\Forum;

use Livewire\Component;
use Livewire\WithPagination;
class ThreadTable extends Component
{
    use WithPagination;
    public $scoreTopic;

    protected $listeners = ['threadAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->resetPage();
    }
    public function render()
    {
        $threads = $this->scoreTopic->threads()
            ->withCount('posts')
            ->with(['posts' => function ($query) {
                $query->latest()->limit(1);
            }, 'user'])
            ->orderByDesc('created_at')
            ->paginate(10); // nombre de threads par page

        // Ajouter latest_post à chaque thread
        $threads->getCollection()->transform(function ($thread) {
            $thread->latest_post = $thread->posts->sortByDesc('created_at')->first();
            return $thread;
        });

        return view('livewire.forum.thread-table', [
            'threads' => $threads,
        ]);
    }
}
