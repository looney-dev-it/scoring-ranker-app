<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoryTable extends Component
{
    public $categories;
    protected $listeners = ['categorySubmitted' => 'refreshTable'];

    public function refreshTable()
    {
        $this->categories = Category::get(); 
    }

    public function edit($id) 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        $this->dispatch('editCategory', $id);
    }

    public function delete($id)
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        Category::findOrFail($id)->delete();

        $this->categories = Category::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Category deleted'
        ]);

        // Force refresh of quetions if category is deleted
        $this->dispatch('questionSubmitted');
    }

    public function render()
    {
        $this->refreshTable();
        return view('livewire.admin.category-table');
    }
}
