<?php

namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News;

class LatestNews extends Component
{
    public $news;

    public function render()
    {
        $this->news = News::latestNews();
        return view('livewire.news.latest-news');
    }
}
