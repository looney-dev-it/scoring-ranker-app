<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\Score;

class MyScoreTable extends Component
{
    public $filter;
    public $scores;

    protected $listeners = ['scoreAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->loadData();
    }

    public function edit($id) 
    {
        $this->dispatch('editScore', $id);
        $this->dispatch('openScoreModal');
    }

    public function delete($id)
    {
        Score::findOrFail($id)->delete();

        // $this->score_topics = ScoreTopic::all();
        $this->loadData();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'ScoreTopic deleted'
        ]);
    }

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->scores = Score::with('user')
                            ->with('topic')
                            ->where('user_id', auth()->id())
                            ->orderByDesc('created_ad')
                            ->get();
    }

    public function render()
    {
        return view('livewire.score.my-score-table');
    }
}
