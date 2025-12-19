<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Question;

class QuestionTable extends Component
{
    public $questions;
    protected $listeners = ['questionSubmitted' => 'refreshTable'];

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
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        $this->dispatch('editQuestion', $id);
    }

    public function delete($id)
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
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
