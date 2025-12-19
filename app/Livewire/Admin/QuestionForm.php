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

    public function closeAddModel()
    {
        $this->reset();
        $this->categories = Category::pluck('name', 'id');
        $this->dispatch('hide-modal', 'newQuestionModal');
    }

    #[On('editQuestion')]
    public function loadQuestion($id)
    {
        $question = Question::findOrFail($id);
        $this->questionId = $question->id;
        $this->question = $question->question;        
        $this->category_id = $question->category_id;
        $this->answer = $question->answer;
        $this->dispatch('show-modal', 'newQuestionModal');
    }

    public function submit() 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);

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
        $this->closeAddModel();
        $this->dispatch('questionSubmitted');
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
