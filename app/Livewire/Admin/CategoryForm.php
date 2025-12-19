<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Category;

class CategoryForm extends Component
{
    public $categoryId;
    public $name;


    public function mount()
    {
        $user = auth()->user();

        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
    }

    public function closeAddModel()
    {
        $this->reset();
        $this->dispatch('hide-modal', 'newCategoryModal');
    }

    #[On('editCategory')]
    public function loadCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name; 
        $this->dispatch('show-modal', 'newCategoryModal');
    }

    public function submit() 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        
        $validatedData = $this->validate([
                'name' => 'required|min:3',
            ]);
        
        Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->name,
            ]
        );
        
        if($this->categoryId) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Category Updated'
            ]);
        } else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Category Added'
            ]);
        }
        $this->closeAddModel();
        $this->dispatch('categorySubmitted');
    }

    public function render()
    {
        return view('livewire.admin.category-form');
    }
}
