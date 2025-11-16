<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreTopic;
use App\Models\Score;

class ScoreController extends Controller
{
    public $scoretopics;
    
    public function index()
    {
        $this->scoretopics = ScoreTopic::get();
        return view('score',  [
                    'scoretopics' => $this->scoretopics,
                    ]);
    }
}
