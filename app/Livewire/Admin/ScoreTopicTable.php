<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ScoreTopic;

class ScoreTopicTable extends Component
{

    public $score_topics;
    protected $listeners = ['scoreTopicSubmitted' => 'refreshTable',
                            'scoreTypeSubmitted' => 'refreshTable'];

    public function refreshTable()
    {
        $this->score_topics = ScoreTopic::get(); 
    }

    public function edit($id) 
    {
        $this->dispatch('editScoreTopic', $id);
    }

    public function delete($id)
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
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
        return view('livewire.admin.score-topic-table');
    }
}
