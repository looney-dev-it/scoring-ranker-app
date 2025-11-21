<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ScoreType;

class ScoreTypeForm extends Component
{
    public $typeId;
    public $name;


    public function mount()
    {
        $user = auth()->user();

        if (!$user || !$user->is_admin) {
            abort(403);
        }
    }

    #[On('editScoreType')]
    public function loadScoreType($id)
    {
        $scoretype = ScoreType::findOrFail($id);
        $this->typeId = $scoretype->id;
        $this->name = $scoretype->name;        
    }

    public function submit() 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);

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
    }

    public function render()
    {
        return view('livewire.admin.score-type-form');
    }
}
