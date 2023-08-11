<?php

namespace App\Livewire\Dashboard\News;

use Livewire\WithPagination;
use Livewire\Component;

class NewsShow extends Component
{
    public $news;
    public function mount($news)
    {
        $this->news = $news;
    }

    public function render()
    {
        return view('livewire.dashboard.news.news-show');
    }

}
