<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class CategoryTable extends Component
{
    public $categories;
    protected $listeners = ['categoryAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->categories = Category::get(); 
    }

    public function edit($id) 
    {
        $this->dispatch('editCategory', $id);
        $this->dispatch('openCategoryModal');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        $this->categories = Category::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'Category deleted'
        ]);
    }

    public function render()
    {
        $this->refreshTable();
        return view('livewire.admin.category-table');
    }
}
