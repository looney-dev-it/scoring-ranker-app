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


    #[On('editScoreTopic')]
    public function loadScoreTopic($id)
    {
        $scoretopic = ScoreTopic::findOrFail($id);
        $this->topicId = $scoretopic->id;
        $this->title = $scoretopic->title;        
        $this->type_id = $scoretopic->type_id;
        $this->unit = $scoretopic->unit;
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
        $this->dispatch('scoreTopicAdded');
    }

    public function mount() 
    {
        $this->scoretypes = ScoreType::pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.admin.score-topic-form');
    }
}
