<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\News;

class NewsTable extends Component
{
    public $all_news;
    protected $listeners = ['newsSubmitted' => 'refreshTable'];

    public function refreshTable()
    {
        $this->all_news = News::get(); 
    }

    public function edit($id) 
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);

        $this->dispatch('editNews', $id);
        $this->dispatch('show-modal', 'newNewsModal');
    }

    public function delete($id)
    {
        abort_unless(auth()->check() && auth()->user()->is_admin, 403);
        
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
        return view('livewire.admin.news-table');
    }
}
