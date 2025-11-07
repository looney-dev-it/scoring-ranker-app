<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ScoreType;

class ScoreTypeTable extends Component
{

    public $score_types;
    protected $listeners = ['scoreTypeAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->score_types = ScoreType::get(); 
    }

    public function edit($id) 
    {
        $this->dispatch('editScoreType', $id);
        $this->dispatch('openScoreTypeModal');
    }

    public function delete($id)
    {
        ScoreType::findOrFail($id)->delete();

        $this->score_types = ScoreType::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'ScoreType deleted'
        ]);
    }

    public function render()
    {
        $this->score_types = ScoreType::orderBy('created_at','desc')->get();
        return view('livewire.admin.score-type-table');
    }

}
