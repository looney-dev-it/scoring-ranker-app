<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\Score;

class LatestScores extends Component
{
    public $scores;
    public function render()
    {
        $this->scores = Score::latestScores(5);
        return view('livewire.score.latest-scores');
    }
}
