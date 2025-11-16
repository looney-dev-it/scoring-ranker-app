<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\Score;
use Illuminate\Support\Facades\DB;

class ScoreTable extends Component
{
    public $filter;
    public $scores;

    protected $listeners = ['scoreAdded' => 'refreshTable'];

    public function mount($filter)
    {
        $this->filter = $filter;
        $this->loadData();
    }

    public function refreshTable()
    {
        $this->loadData();
    }
    
    public function loadData()
    {
        $this->scores = Score::with('user')
                            ->select('user_id', DB::raw('SUM(score) as total_score'))
                            ->where('topic_id', $this->filter)
                            ->groupBy('user_id')
                            ->orderByDesc('total_score')
                            ->get();
    }


    public function render()
    {
        return view('livewire.score.score-table');
    }
}
