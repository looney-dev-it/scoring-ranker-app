<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ScoreType;
use App\Models\ScoreTopic;
use Livewire\Attributes\On;

class ScoreTopicForm extends Component
{
    public $scoretypes;
    public $topicId;
    public $title;
    public $type_id;
    public $unit;

    protected $listeners = ['scoreTypeSubmitted' => 'refreshScoreTypes'];

    public function refreshScoreTypes()
    {
        $this->scoretypes = ScoreType::pluck('name', 'id');
    }
    
    public function closeAddModel()
    {
        $this->reset();
        $this->scoretypes = ScoreType::pluck('name', 'id');
        $this->dispatch('hide-modal', 'newScoreTopicModal');
    }

    #[On('editScoreTopic')]
    public function loadScoreTopic($id)
    {
        $scoretopic = ScoreTopic::findOrFail($id);
        $this->topicId = $scoretopic->id;
        $this->title = $scoretopic->title;        
        $this->type_id = $scoretopic->type_id;
        $this->unit = $scoretopic->unit;
        $this->dispatch('show-modal', 'newScoreTopicModal');
    }

    public function submit() 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);

        $validatedData = $this->validate([
                'title' => 'required|min:3',
                'type_id' => 'required',
                'unit' => 'required',
            ]);
        
        ScoreTopic::updateOrCreate(
            ['id' => $this->topicId],
            [
                'title' => $this->title,
                'type_id' => $this->type_id,
                'unit' => $this->unit,
            ]
        );
        
        if($this->topicId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'ScopeTopic Updated'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'ScopeTopic Added'
            ]);
        }
        $this->reset();
        $this->scoretypes = ScoreType::pluck('name', 'id');
        $this->dispatch('scoreTopicSubmitted');
        $this->dispatch('hide-modal', 'newScoreTopicModal');
    }

    public function mount() 
    {
        $user = auth()->user();

        if (!$user || !$user->is_admin) {
            abort(403);
        }
        $this->scoretypes = ScoreType::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.admin.score-topic-form');
    }
}
