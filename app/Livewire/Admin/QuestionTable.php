<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Question;

class QuestionTable extends Component
{
    public $questions;
    protected $listeners = ['questionAdded' => 'refreshTable'];

    public function mount() 
    {
        $this->questions = Question::with('category')->get();
    }
    
    public function refreshTable()
    {
        $this->questions = Question::with('category')->get();
    }

    public function edit($id) 
    {
        $this->dispatch('questionTopic', $id);
        $this->dispatch('openQuestionModal');
    }

    public function delete($id)
    {
        Question::findOrFail($id)->delete();

        $this->refreshTable();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Question deleted'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.question-table');
    }
}
