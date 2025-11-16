<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Question;
use App\Models\Category;
use Livewire\Attributes\On;

class QuestionForm extends Component
{
    public $categories;
    public $questionId;
    public $question;
    public $category_id;
    public $answer;


    #[On('editQuestion')]
    public function loadQuestion($id)
    {
        $question = Question::findOrFail($id);
        $this->questionId = $question->id;
        $this->question = $question->question;        
        $this->category_id = $question->category_id;
        $this->answer = $question->answer;
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
                'question' => 'required|min:10',
                'category_id' => 'required',
                'answer' => 'required|min:2',
            ]);
        
        Question::updateOrCreate(
            ['id' => $this->questionId],
            [
                'question' => $this->question,
                'category_id' => $this->category_id,
                'answer' => $this->answer,
            ]
        );
        
        if($this->questionId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Question Updated'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Question Added'
            ]);
        }
        $this->reset();
        $this->categories = Category::pluck('name', 'id');
        $this->dispatch('questionSubmitted');
        $this->dispatch('questionAdded');
    }

    public function mount()
    {
        $user = auth()->user();

        if (!$user || !$user->is_admin) {
            abort(403);
        }
        $this->categories = Category::pluck('name', 'id');
    }
    
    public function render()
    {
        return view('livewire.admin.question-form');
    }
}
