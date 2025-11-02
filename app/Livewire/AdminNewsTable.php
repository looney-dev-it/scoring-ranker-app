<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;

class AdminNewsTable extends Component
{
    public $all_news;
    protected $listeners = ['newsAdded' => 'refreshTable'];

    public function refreshTable()
    {
        $this->all_news = News::get(); 
    }

    public function edit($id) 
    {
        $this->dispatch('editNews', $id);
        $this->dispatch('openNewsModal');
    }

    public function delete($id)
    {
        News::findOrFail($id)->delete();

        $this->all_news = News::all();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'message' => 'News deleted'
        ]);
    }

    public function render()
    {
        $this->all_news = News::orderBy('created_at','desc')->get();
        return view('livewire.admin-news-table');
    }
}
