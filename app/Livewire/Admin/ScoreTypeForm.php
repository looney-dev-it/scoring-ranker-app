<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ScoreType;

class ScoreTypeForm extends Component
{
    public $typeId;
    public $name;


    #[On('editScoreType')]
    public function loadScoreType($id)
    {
        $scoretype = ScoreType::findOrFail($id);
        $this->typeId = $scoretype->id;
        $this->name = $scoretype->name;        
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
                'name' => 'required|min:3',
            ]);
        
        ScoreType::updateOrCreate(
            ['id' => $this->typeId],
            [
                'name' => $this->name,
            ]
        );
        
        if($this->typeId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'ScopeType Updated'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'ScopeType Added'
            ]);
        }
        $this->reset();
        $this->dispatch('scoreTypeSubmitted');
        $this->dispatch('scoreTypeAdded');
    }

    public function render()
    {
        return view('livewire.admin.score-type-form');
    }
}
