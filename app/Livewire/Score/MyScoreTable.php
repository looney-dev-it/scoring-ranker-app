<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\Score;
use Livewire\WithPagination;

class MyScoreTable extends Component
{
    use WithPagination;

    public $filter;
    protected $listeners = ['scoreAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->resetPage();
    }

    public function edit($id) 
    {
        abort_unless(auth()->check(), 403);
        
        $this->dispatch('editScore', $id);
        $this->dispatch('openScoreModal');
    }

    public function delete($id)
    {
        abort_unless(auth()->check(), 403);
        
        Score::findOrFail($id)->delete();

        $this->refreshTable();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'ScoreTopic deleted'
        ]);
    }

    public function render()
    {
        return view('livewire.score.my-score-table', [
            'scores' => Score::with('user')
                            ->with('topic')
                            ->where('user_id', auth()->id())
                            ->orderByDesc('created_at')
                            ->paginate(5)
        ]);
    }
}
