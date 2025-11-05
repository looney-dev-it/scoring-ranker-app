<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ScoreTopic;

class AdminScoreTopicTable extends Component
{

    public $score_topics;
    protected $listeners = ['scoreTopicAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->score_types = ScoreTopic::get(); 
    }

    public function edit($id) 
    {
        $this->dispatch('editScoreTopic', $id);
        $this->dispatch('openScoreTopicModal');
    }

    public function delete($id)
    {
        ScoreTopic::findOrFail($id)->delete();

        $this->score_topics = ScoreTopic::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'ScoreTopic deleted'
        ]);
    }

    public function render()
    {
        $this->score_topics = ScoreTopic::orderBy('created_at','desc')->get();
        return view('livewire.admin-score-topic-table');
    }
}
