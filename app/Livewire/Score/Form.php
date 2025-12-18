<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\ScoreType;
use App\Models\ScoreTopic;
use App\Models\Score;
use Livewire\Attributes\On;

class Form extends Component
{
    public $scoretopics;
    public $scoreId;
    public $score;
    public $topic_id;
    public $user_id;


    /* trigger record pre-load if edit */
    #[On('editScore')]
    public function loadScore($id)
    {
        $score = Score::findOrFail($id);
        $this->scoreId = $score->id;
        $this->score = $score->score;        
        $this->topic_id = $score->topic_id;
    }

    public function closeAddModal()
    {
        $this->reset();
        $this->scoretopics = ScoreTopic::pluck('title', 'id');
        $this->dispatch('hide-modal', ['id' => 'newScoreModal']);
    }

    public function submit() 
    {
        if (!auth()->check()) {
            $this->dispatch('show-toast', [
                'type' => 'danger',
                'message' => 'You must be identified & admin to perform this!'
            ]);
            return; 
        }

        $validatedData = $this->validate([
                'score' => 'required',
                'topic_id' => 'required',
            ]);
        
        Score::updateOrCreate(
            ['id' => $this->scoreId],
            [
                'score' => $this->score,
                'topic_id' => $this->topic_id,
                'user_id' => auth()->id(),
            ]
        );
        
        if($this->scoreId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Scope Updated'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Scope Added'
            ]);
        }
        $this->dispatch('scoreAdded');
        $this->closeAddModal();
    }

    public function mount() 
    {
        $this->scoretopics = ScoreTopic::pluck('title', 'id');
    }

    public function render()
    {
        return view('livewire.score.form');
    }
}
