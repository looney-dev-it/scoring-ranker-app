<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreTopic;
use App\Models\Score;

class ScoreController extends Controller
{
    public $scoretopics;
    public $latest_scores;
    //
    public function index()
    {
        $this->scoretopics = ScoreTopic::get();
        $this->latest_scores = Score::latestScores(5);
        return view('score',  [
                    'scoretopics' => $this->scoretopics,
                    'latestScores' => $this->latest_scores,
                    ]);
    }
}
